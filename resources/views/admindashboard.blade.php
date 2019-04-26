@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>
                <div class="card-body">
                   <div class="row col-md-12">
                        <a class="btn btn-info" href="/feeds/create">Entry data</a>
                        <a href="/feeds" class="btn btn-success ml-auto">Admin Dashboard</a>
                   </div>
                    <hr>
                    @if(count($feeds)>0)
                    <table class="table table-striped">
                        <tr>
                            <th>Title</th>
                            <th>Quantity</th>
                            <th>Cost</th>
                        </tr>
                        {!! Form::open(['action' => 'OrdersController@store', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
                        <tr>
                                <div class="form-group">
                                        {{Form::label('customer_id', 'Customer ID:')}}
                                        {{Form::text('customer_id','',['class' => 'form-control', 'placeholder' => 'enter Customer ID here'])}}
                                </div>
                        </tr>
                        @foreach($feeds as $feed)
                        <tr>
                            <th>{{Form::text('item_name',$feed->title,array('class' => 'form-control ','readonly'))}}</th>
                            <th>
                                {{Form::text('quantity','',['class' => 'form-control', 'placeholder' => 'enter quantity'])}}
                            </th>
                            <th>{{Form::text('item_price',$feed->price,array('class' => 'form-control ','readonly'))}}</th>

                        </tr>
                        
                        @endforeach
                        <tr>
                                <th>{{Form::submit('Order', ['class' => 'btn btn-warning'])}}</th>
                        </tr>
                        {!! Form::close() !!}
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
