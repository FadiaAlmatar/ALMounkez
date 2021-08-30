<?php

namespace App\Http\Controllers;

use App\Models\Message;
use App\Models\User;
use Brick\Math\BigInteger;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Illuminate\Support\Arr;
use Illuminate\Support\Collection;


class MessageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users = User::all();
        $messages = Message::all();
        return view('message.create',['users'=> $users, 'messages'=> $messages]);
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
            'user_id'         => 'integer',
        ]);
        $message = new Message();
        $message->message_content= $request->message_content;
        $message->friend_id= $request->friend_id;
        $message->seen = false;
        $message->user_id = Auth::User()->id;//sender
        $message->save();
         $user = User::find(Auth::User()->id);
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Message  $message
     * @return \Illuminate\Http\Response
     */
    public function show(Message $message)
    {
        $messages = Message::all();
        return view('message.show',[ 'messages'=> $messages]);
    }
    public function chat($id)
    {
        $friend = User::findOrFail($id);
        $messages = DB::table('messages')->where([
            ['friend_id', $friend->id],
            ['user_id', Auth::User()->id],
        ])->orwhere([
            ['friend_id', Auth::User()->id],
            ['user_id', $friend->id],])->orderBy('created_at','DESC')->get();
        $friend_name = User::find($friend->id);
        $users = User::all();
        foreach($messages as $message){
          if(($message->user_id <> Auth::User()->id) && (Carbon::now())){
                  $message = Message::find($message->id);
                  $message->seen = true;
                  $message->save();
          }
        }
        $last_message = [];
        $friends = DB::select("CALL pr_messages_friends( ".Auth::User()->id.")");
        $unread_messages = DB::select("CALL pr_unread_messages( ".Auth::User()->id.")");
        $count_unread_messages = DB::select("CALL pr_count_unread_messages( ".Auth::User()->id.")");
        return view('message.show',['count_unread_messages'=>$count_unread_messages,'unread_messages' => $unread_messages,'friends'=> $friends, 'messages'=> $messages,'users'=>$users,'friend_name'=>$friend_name->name,'friend_id'=>$friend->id ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Message  $message
     * @return \Illuminate\Http\Response
     */
    public function edit(Message $message)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Message  $message
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Message $message)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Message  $message
     * @return \Illuminate\Http\Response
     */
    public function destroy(Message $message)
    {
        //
    }
}
