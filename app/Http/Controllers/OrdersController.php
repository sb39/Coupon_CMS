<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Order;
use DB;

class OrdersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $orders = Order::orderBy('created_at', 'desc')->paginate('10');
        return view('adminorders')->with('orders', $orders);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     * 
     */
    public function create()
    {
        return view('admindashboard');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'customer_id' => 'required',
            'item_name' => 'required',
            'quantity' => 'required',
            'item_price' => 'required'
        ]);

        // $order = new Order;
        // $order->customer_id = $request->input('customer_id');
        // $order->item_name  = item_name;
        // $order->quantity = $request->input('quantity');
        // $order->item_price = item_price;
        // $order->save();
        
        $order = new Order([
            'customer_id'     => $request->input('customer_id'),
            // 'user_id'   => Auth::user()->id,
            'item_name' => $request->input('item_name'),
            // 'category_id'  => $request->input('category'),
            'quantity'  => $request->input('quantity'),
            'item_price'   => $request->input('item_price')
        ]);
        
        // $cust = $request->input('customer_id'),
        // 'item_name' => $request->input('item_name'),
        //     // 'category_id'  => $request->input('category'),
        //     'quantity'  => $request->input('quantity'),
        //     'item_price'   => $request->input('item_price')
        // $order=array('customer_id'=>$cust,'');
        // $order->save();
        // return redirect()->back()->with("kisdbjab");
        // return 123;
        DB::table('orders')->insert($order);
        return 123;
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // $orders = Order::find($id);
        // return view('viewfeeddetails')->with('orders', $orders);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
