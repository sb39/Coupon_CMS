@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Customer Orders</div>
                <div class="card-body">
                   
                    <hr>
                    @if(count($orders)>0)
                    <table class="table table-striped">
                        <tr>
                            <th>CustomerID</th>
                            <th>Item_Name</th>
                            <th>Quantity</th>
                            <th>Cost</th>
                        </tr>
                        @foreach($orders as $order)
                        <tr>
                            <th>{{$order->customer_id}}</th>
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
@endsection
