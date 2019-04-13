@extends('layouts.app') 


@section('content')
        <h1 class="text-center">Feed food data into your A/C</h1>
        {!! Form::open(['action' => 'FeedController@store', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
                <div class="form-group">
                        {{Form::label('title', 'Title')}}
                        {{Form::text('title','',['class' => 'form-control', 'placeholder' => 'title'])}}
                </div>
                <div class="form-group">
                        {{Form::label('body', 'Enter details')}}
                        {{Form::textarea('body', '', ['class' => 'form-control', 'placeholder' => 'Enter description of the food item'])}}
                </div>
                <div class="form-group">
                        {{Form::label('price', 'Price')}}
                        {{Form::text('price','',['class' => 'form-control', 'placeholder' => 'Set Amount'])}}
                </div>
               
                {{Form::submit('Submit', ['class' => 'btn btn-primary'])}}
        {!! Form::close() !!}
@endsection