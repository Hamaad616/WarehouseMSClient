<?php

namespace App\Http\Controllers;

use App\Imports\ExportProducts;
use App\Imports\ImportProducts;
use App\Models\clientProducts;
use App\Models\clients;
use App\Models\ClientStockRequests;
use App\Models\stocked_in_products;
use http\Env\Url;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Facades\Excel;
use Symfony\Component\HttpFoundation\BinaryFileResponse;

class MainController extends Controller
{

    public function index()
   {
      return view('client-home');

   }

    public function checklogin(Request $request)
    {

        if ($request->session()->has("email")) {
            return view("client-home");
        } else {
            return view("auth.client-login");
        }
    }



    public function user_login(Request $request)
    {
        $email = $request->email;
        $password = $request->password;

        $users = clients::where('client_email', '=',$email)->first();
        $user = clients::where('client_email', '=',$email)->get();
        $password = Hash::check($password, $users->password);
        if(empty($users->email) && empty($users->password)){
            return back()->with('danger', 'Email or Password does not exist');
        }
        else if (empty($users) && !Hash::check($password, $users->password)) {
            return redirect("/");
        } else {
            foreach ($user as $user1) {
                $request->session()->put('username', $user1->sch_name);
                $request->session()->put('id', $user1->sch_id);
                $request->session()->put('email', $user1->client_email);
                $request->session()->put('flag', 1);
                // $request->session()->put('reg_id', $user->reg_id);
                // $request->session()->put('sch_id', $user->sch_id);
            }

            return redirect()->intended(route('client.dashboard'));
        }
    }

    public function productRequestInForm(){
        $categories = DB::select('select * from categories where parent_id = ?', [0]);
        return view('client-product-request', ['categories' => $categories]);
    }

    public function productRequestInFormSubmit(Request $request){

        $client_request = new ClientStockRequests;
        $client_request->client_id = $request->client_id;
        $client_request->product_name = $request->product_name;
        $client_request->category_id = $request->category_select;
        $client_request->product_description = $request->product_description;
        $client_request->SKU_ID = $request->product_SKUID;
        $client_request->SKU_BARCODE = $request->product_SKUBCD;
        $client_request->product_reorder_level = $request->product_reorder;
        $client_request->product_retail_price = $request->product_retail_price;
        $client_request->product_width = $request->product_width;
        $client_request->product_height = $request->product_height;
        $client_request->product_length = $request->product_length;
        $client_request->weight = $request->product_weight;
        $picture = $request->file('product_picture');
        $image_name = rand() . '-' . $picture->getClientOriginalName();
        $client_request->product_picture = $image_name;
        $picture->move(public_path('uploads'), $image_name);
        $client_request->save();
        if ($client_request->save()){
            return redirect()->back()->with('success', 'Successfully created client request for product entry');
        }
        else{
            return redirect()->back()->with('danger', 'Something went wrong');
        }
    }

    protected function productImportCsv()
    {
        return view('import-csv');

    }

    public function productImportCsvSubmit(Request $request)
    {
        Excel::import(new ImportProducts,$request->file);
        return back()->with('success', 'Successfully imported record');
    }

    /**
     * @return BinaryFileResponse
     */
    public function fileProductExport(): BinaryFileResponse
    {
        return Excel::download(new ExportProducts(), 'product-collection.xlsx');
    }

    public function getClientProducts(){
        $user_id = session('id');
        $products = DB::table('product_item')->select('*')->where('client_id', '=', $user_id)->simplePaginate(10);
        $product = DB::table('product_item')->select('*')->where('client_id', '=', $user_id)->first();
        $category = DB::table('categories')->select('*')->where('id', '=', $product->category_id)->get();
        return view('client.client-my-products', compact(['products', 'category']));
    }

    public function getRequestedProducts(){
        $requested_products = DB::table('client_stock_requests')->select('*')->where('client_id', '=', session('id'))->simplePaginate(10);
        $pending_requested_products = DB::table('client_stock_requests')->select('*')->where('client_id', '=', session('id'))->where('status', '=', 0)->simplePaginate(10);
        $approved_requested_products = DB::table('client_stock_requests')->select('*')->where('client_id', '=', session('id'))->where('status', '=', 1)->simplePaginate(10);
        $product = DB::table('client_stock_requests')->select('*')->where('client_id', '=', session('id'))->first();
        $category = DB::table('categories')->select('*')->where('id', '=', $product->category_id)->get();

        return view('client.products-requested', ['requested_products' => $requested_products, 'pending_requested_products' =>$pending_requested_products , 'approved_requested_products' =>$approved_requested_products ,'category' => $category]);
    }

    public function getClientInvoices($client_id)
    {
        $stock_in_bill = DB::select('select * from client_stock_in_billing where client_id = ?', [$client_id]);
        return view('invoices', ['stock_in_bill' => $stock_in_bill, 'client_id' => $client_id]);
    }

    public function getClientInvoice($client_id, $created_at){
        $stock_in_invoice = DB::select('select * from client_stock_in_billing where client_id = ? and created_at =?', [$client_id, $created_at]);
        return view('invoice', ['client_id' => $client_id, 'stock_in_invoice' =>$stock_in_invoice]);
    }

    public function logout(Request $request): \Illuminate\Http\RedirectResponse
    {
        $request->session()->forget('email');
        return redirect()->route('client.login');
    }

    public function clientFulfillment($client_id)
    {
        $client_products = clientProducts::all();
        $client_name = clients::where('sch_id', $client_id)->get();
        $sessions = DB::table('academic_session')->select('*')->get();
        $couriers = DB::table('couriers')->select('*')->get();
        return view('client.client-fulfillment', ['client_id' => $client_id, 'client_products' => $client_products, 'client_name' => $client_name, 'sessions' => $sessions, 'couriers' => $couriers]);
    }

    public function createClientFulfillment(Request $request)
    {
        $users2 = DB::select("INSERT INTO `requisition`( `sch_id`, `wh_id`, `po`,`mode`, `deleivery_date_time`, `courier`, `remarks` ,`session_id`) VALUES ('$request->client_id','$request->wh_id','$request->po','$request->mode','$request->date', '$request->couriers', '$request->remarks', '$request->session_id')");
        $last_req_id = DB::getPDO()->lastInsertId();
        $arrayLength = count($request->product_name);
        for ($col = 0; $col < $arrayLength; $col++) {
            $product_code = $request->product_code[$col];
            $product_quantity = $request->product_quantity[$col];

            $data = stocked_in_products::where('product_id', '=' ,$product_code)->first();
            if($data!=""){
            $its = stocked_in_products::find($data->its_id);
                $x = $its->quantity;
                $y = $request->product_quantity[$col];
                $sub = $x-$y;
                $its->quantity = $sub;
                $its->update();
            }
            $users2 = DB::select("INSERT INTO `requisition_details` (`req_id` ,`product_code`, `quantity`) VALUES ('$last_req_id','$product_code','$product_quantity')");
        }
        return response()->json(['code' => 1, 'msg' => 'Successfully created requisition']);
    }

    public function searchProduct(Request $request)
    {
        $code = $request->search_code;
        $client_id = $request->client_id;

        $client_product = DB::table('product_item')->where('client_id', $client_id)->where('pitem_code', $code)->get();
        return response()->json(['details' => $client_product]);
    }

    public function clientProfile(){
        return view('profile', ['client_id' => session('id')]);
    }


}
