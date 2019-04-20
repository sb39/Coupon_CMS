@extends('layouts.app') 


@section('content')
        <a href="/feeds" class="btn btn-dark">Back</a>
        <h1>{{$feed->title}}</h1>
        <br>
        <br>
        <div>
            {!!$feed->body!!}
        </div>
        <hr>
        <small>Created on :{{$feed->created_at}}</small>
        <hr>
        {{-- @if(!Auth::guest())
            @if(Auth::user()->id == $feed->user_id) --}}
                <a href="/feeds/{{$feed->id}}/edit" class="btn btn-primary">Edit</a>

                {!!Form::open(['action' => ['FeedController@destroy', $feed->id], 'method' => 'POST', 'class' => 'float-right'])!!}
                    {{Form::hidden('_method','DELETE')}}
                    {{Form::submit('Delete', ['class' => 'btn btn-danger'])}}
                {!!Form::close()!!}
            {{-- @endif
        @endif --}}
@endsection