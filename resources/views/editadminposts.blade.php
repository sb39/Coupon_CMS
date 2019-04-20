@extends('layouts.app') 


@section('content')
        <h1>Edit Data</h1>
        {!! Form::open(['action' => ['FeedController@update',$feed->id], 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
                <div class="form-group">
                        {{Form::label('title', 'Title')}}
                        {{Form::text('title', $feed->title ,['class' => 'form-control', 'placeholder' => 'title'])}}
                </div>
                <div class="form-group">
                        {{Form::label('body', 'Body')}}
                        {{Form::textarea('body', $feed->body , ['class' => 'form-control', 'placeholder' => 'Enter description of the food item'])}}
                </div>
                <div class="form-group">
                        {{Form::label('price', 'Price')}}
                        {{Form::text('price', $feed->price , ['class' => 'form-control', 'placeholder' => 'Set Amount'])}}
                </div>
                {{Form::hidden('_method', 'PUT')}}
                {{Form::submit('Submit', ['class' => 'btn btn-primary'])}}
        {!! Form::close() !!}
@endsection