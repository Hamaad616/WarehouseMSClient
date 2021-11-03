<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;
use \App\Http\Middleware\Logger;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [App\Http\Controllers\MainController::class, 'checklogin']);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::post('user-login', [\App\Http\Controllers\ClientController::class, 'user_login'])->name('user-login');


Route::prefix('client')->group(function(){
    Route::get('/login', [\App\Http\Controllers\Auth\ClientLoginController::class, 'showLoginForm'])->name('client.login')->middleware('check_login');
    Route::post('/login', [\App\Http\Controllers\MainController::class, 'user_login'])->name('client.login.submit')->middleware('check_login');
    Route::get('/client-home', [\App\Http\Controllers\MainController::class, 'index'])->name('client.dashboard')->middleware('check_login');
    Route::get('/request/product-in', [\App\Http\Controllers\MainController::class, 'productRequestInForm']);
    Route::post('/request/product-in-submit', [\App\Http\Controllers\MainController::class, 'productRequestInFormSubmit'])->name('client.stock-request');
    Route::get('/product/import-csv', [App\Http\Controllers\MainController::class, 'productImportCsv'])->name('import.csv');
    Route::post('/product/import-csv', [App\Http\Controllers\MainController::class, 'productImportCsvSubmit'])->name('file-import');
    Route::get('/product/export-csv', [App\Http\Controllers\MainController::class, 'fileProductExport'])->name('products.export');
    Route::get('/my-products', [App\Http\Controllers\MainController::class, 'getClientProducts'])->name('client.my-products');
    Route::get('/products/requested', [App\Http\Controllers\MainController::class, 'getRequestedProducts'])->name('products.requested');
    Route::get('/invoices', [App\Http\Controllers\MainController::class, 'getClientInvoices'])->name('client.invoices');
    Route::get('/my-products/ajax', function (){
        $user_id = session('id');
        $products = DB::table('product_item')->select('*')->where('client_id', '=', $user_id)->simplePaginate(10);
        $product = DB::table('product_item')->select('*')->where('client_id', '=', $user_id)->first();
        $category = DB::table('categories')->select('*')->where('id', '=', $product->category_id)->get();
        return view('client.client-my-products', compact(['products', 'category']));
    });
    Route::post('/logout', [\App\Http\Controllers\MainController::class, 'logout'])->name('client.logout');
});


