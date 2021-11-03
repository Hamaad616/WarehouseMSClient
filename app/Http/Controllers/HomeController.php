<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return Application|Renderable|RedirectResponse|Redirector
     */
    public function index(Request $request)
    {
        $email = $request->email;
        $password = Hash::make($request->password);


     $users=    DB::select("select * from clients where client_email='$email' and password='$password'");
        dd($users);
        if (empty($users)) {
            return redirect("/");
        } else {
            foreach ($users as $user) {
                $request->session()->put('username', $user->name);
                $request->session()->put('id', $user->id);
                $request->session()->put('email', $user->email);
                $request->session()->put('flag', 1);
                // $request->session()->put('reg_id', $user->reg_id);
                // $request->session()->put('sch_id', $user->sch_id);
            }

            return view("home");
        }
    }

}
