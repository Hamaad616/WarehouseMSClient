<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class ClientLoginController extends Controller
{

    public function __construct(){
        $this->middleware('guest:client')->except('logout');
    }
    public function showLoginForm(){
        return view('auth.client-login');
    }

    /**
     * @throws ValidationException
     */
    public function clientLogin(Request $request){
       $this->validate($request, [
           'client_email' => 'required|email',
           'password' => 'required|min:6'
       ]);

       if(Auth::guard('client')->attempt(['client_email' => $request->email, 'password' => $request->password], $request->remember)){
            return redirect()->intended(route('client.dashboard'));
       }
       else{
           return redirect()->back()->withInput($request->only('email', 'remember'));
       }
    }
}
