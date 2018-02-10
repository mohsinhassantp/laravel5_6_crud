<?php

namespace App\Http\Controllers;
use App\Comment;
use Illuminate\Http\Request;
use Auth;

class CommentController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        //$comments = Comment::find(2)->User->name;

        //var_dump($comments);
        /*foreach ($comments as $comment) {
        }*/

/*
        $hotels = Hotel::orderBy('id')->with('qualities')->get();
        return View::make('hotels.index')->with(array('hotels' => $hotels));*/

        //App\Book::with('author', 'publisher')->get();

        //$comments = Comment::all()->toArray();
        $comments = Comment::with('user')->get();
        return view('comments.index', compact('comments'));
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate(request(), [
            'comment' => 'required',
        ]);

        $comment = new Comment();
        $comment->userid = Auth::user()->id;
        $comment->comment =  $request->comment;

        //Comment::create($comment);
        $comment->save();

        return back()->with('success', 'Comment has been added');
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('comments.create');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $comment = Comment::find($id);
        return view('comments.edit',compact('comment','id'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $comment = Comment::find($id);
        $this->validate(request(), [
            'comment' => 'required',
        ]);
        $comment->comment = $request->get('comment');
        $comment->save();
        return redirect('comments')->with('success','Comment has been updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $comment = Comment::find($id);
        $comment->delete();
        return redirect('comments')->with('success','Comment has been deleted');
    }
}
