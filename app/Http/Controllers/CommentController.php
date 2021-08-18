<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::all();
        $comments = Comment::all();
        return view('comment.index',['posts' => $posts],['comments' => $comments]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([

            'content'         => 'required',
            'post_id'         => 'required|numeric|exists:posts,id',

        ]);
        // $post = Post::find($post_id);
        $comment = new Comment();
        $comment->content= $request->content;
        $comment->post_id = $request->post_id;
        $comment->approved = false;
        $comment->replyto = $request->replyto;
        //  dd($request->replyto);
        $comment->user_id = Auth::User()->id;
        //  dd($request->post_id);
        // $comment->post()->associate($post);
        // dd('hereeeeee');
        $comment->save();
        // dd($request->replyto);
        // dd('hereeeeee');
        $post = Post::find($request->post_id);
        // dd($request->post_id);
        return view('post.show',['post' => $post]);
    }

    public function approval(Request $request)
    {
      $comment = Comment::find($request->comment_id);
      $comment->approved = 1;
      $comment->save();
      return redirect()->back();

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function show(Comment $comment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function edit(Comment $comment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Comment $comment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Comment $comment)
    {
        //
    }
}
