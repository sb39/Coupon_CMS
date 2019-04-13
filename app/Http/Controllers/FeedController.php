<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Feed;

class FeedController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $feeds = Feed::orderBy('title','asc')->get();
        $feeds = Feed::orderBy('created_at', 'desc')->paginate(3);
        return view('admin')->with('feeds', $feeds);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('feeditems');
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
            'title' => 'required',
            'body' => 'required',
            'price' => 'required'
        ]);
        // return 123;
        $feed = new Feed;
        $feed->title = $request->input('title');
        $feed->body  = $request->input('body');
        $feed->price = $request->input('price');
        $feed->user_id = auth()->user()->id;
        $feed->save();
        return redirect('/feeds');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $feed = Feed::find($id);
        return view('viewfeeddetails')->with('feed', $feed);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $feed = Feed::find($id);
        
        return view('editadminposts')->with('feed', $feed);
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
        $this->validate($request, [
            'title' => 'required',
            'body' => 'required',
            'price' => 'required'
        ]);
        $feed = Feed::find($id);
        $feed->title = $request->input('title');
        $feed->body = $request->input('body');
        $feed->price = $request->input('price');
        
        $feed->save();
        return redirect('/feeds');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $feed = Feed::find($id);
        $feed->delete();
        return redirect('/feeds');
    }
}
