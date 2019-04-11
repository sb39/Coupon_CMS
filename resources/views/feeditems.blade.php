@extends('layouts.app') 


@section('content')
        <h1 class="text-center">Feed food data into your A/C</h1>
        {!! Form::open([]) !!}
                <div class="form-group">
                        {{Form::label('title', 'Title')}}
                        {{Form::text('title','',['class' => 'form-control', 'placeholder' => 'title'])}}
                </div>
                <div class="form-group">
                        {{Form::label('body', 'Enter details')}}
                        {{Form::textarea('body', '', ['class' => 'form-control', 'placeholder' => 'Enter description of the food item'])}}
                </div>
                <div class="form-group">
                        {{Form::label('title', 'Upload food image')}}
                        {{Form::file('cover_image')}}
                </div>
                {{Form::submit('Submit', ['class' => 'btn btn-primary'])}}
        {!! Form::close() !!}
@endsection