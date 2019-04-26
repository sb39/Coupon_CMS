<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Customer;

class CustomerController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:customer');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        // return view('customer');
        $customer_id = auth()->user()->id;
        $customer = Customer::find($customer_id);
        return view('customer')->with('customer_orders', $customer->orders);
        // $customer_details = Customer
    }
}
