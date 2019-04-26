@extends('layouts.customer-app')

@section('content')
<!-- top panel -->
<div class="card">
    <div class="card-body ml-auto mr-auto">
      <div class="row ">
        <div class="card-link"><a href="#">Customer Dashboard</a></div>
        <div class="card-link"><a href="#">Wallet</a></div>
        <div class="card-link"><a href="#">My Account</a></div>
      </div>
  </div>
<!-- /top panel/ -->
<!-- content -->
<div class="col-md-12" >
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Customer Orders</div>
                    <div class="card-body">
                        <hr>
                        @if(count($customer_orders)>0)
                        <table class="table table-striped">
                            <tr>
                                <th>Item_Name</th>
                                <th>Quantity</th>
                                <th>Cost</th>
                            </tr>
                            @foreach($customer_orders as $order)
                            <tr>
                                <th>{{$order->item_name}}</th>
                                <th>{{$order->quantity}}</th>
                                <th>{{$order->item_price}}</th>
                            </tr>
                            @endforeach
                        </table>
                        @else
                            <p>No data</p>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /content/ -->
@endsection