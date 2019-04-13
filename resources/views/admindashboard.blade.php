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
                            <th></th>
                            <th></th>
                        </tr>
                        @foreach($feeds as $feed)
                        <tr>
                            <th>{{$feed->title}}</th>
                            <th><a class="btn btn-warning" href="/feeds/{{$feed->id}}/edit">Edit</a></th>
                            <th>
                                    {!!Form::open(['action' => ['FeedController@destroy', $feed->id], 'method' => 'POST', 'class' => 'float-right'])!!}
                                    {{Form::hidden('_method','DELETE')}}
                                    {{Form::submit('Delete', ['class' => 'btn btn-danger'])}}
                                    {!!Form::close()!!}
                            </th>
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
