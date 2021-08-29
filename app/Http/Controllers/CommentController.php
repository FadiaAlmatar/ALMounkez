<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Comment;
use Illuminate\Http\Request;
use App\Models\View_CommentList;
use Illuminate\Support\Facades\DB;
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
        $comment = new Comment();
        $comment->content= $request->content;
        $comment->post_id = $request->post_id;
        $comment->approved = false;
        $comment->replyto = $request->replyto;
        $comment->user_id = Auth::User()->id;
        $comment->save();
        $post = Post::find($request->post_id);
        // return view('post.show',['post' => $post]);
        $commentlist = DB::table('view_comment_list')->orderby('code')->orderby('id')->get();
        // $commentlist = View_CommentList::all();
        // foreach($commentlist as $comment){
        //   dd($comment->content);
        // }
        // return view('post.show',['post' => $post,'commentlist' => $commentlist]);
         return redirect()->route('posts.show',$post);
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
