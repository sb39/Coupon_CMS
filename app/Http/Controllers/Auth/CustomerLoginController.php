<?php

namespace App\Http\Controllers\Auth;


use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use Validator;

class CustomerLoginController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest:customer');
    }
    public function showLoginForm()
    {
        return view('auth.customer-login');
    }
    public function login(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required|min:6'
        ]);
        // $this->Validator($request, [
        //     'email' => 'required|email',
        //     'password' => 'required|min:6'
        // ]);

        // if(Auth::guard('customer')->attempt(['email' => $request->email, 'password' => $request->password], $request->remember))
        // {
        //     return redirect()->intended(route('customer.dashboard'));
        // }
        // return redirect()->back()->withInput($request->only('email', 'remember'));
        if ($validator->fails()) {
            return 123;
        }
        return redirect()->intended(route('customer.dashboard'));
    }
}
