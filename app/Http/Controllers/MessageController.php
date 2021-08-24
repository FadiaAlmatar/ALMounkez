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
// use App\Http\Controllers\BigInteger;


class MessageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $users = User::all();
        // $messages = Message::all();
        // return view('message.index',['users'=> $users, 'messages'=> $messages]);
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
            // 'message'         => 'required',
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
        // dd($friends);
        // $unread_messages = DB::select("CALL pr_unread_messages( ".Auth::User()->id.")");
        // foreach($friends as $friend){
        //   array_push($last_message ,DB::select("CALL pr_last_message( ".Auth::User()->id.",".$friend->user_id.")"));
        //   dd($last_message);
        // }
        //   dd($last_message);
        return view('message.show',['friends'=> $friends, 'messages'=> $messages,'users'=>$users,'friend_name'=>$friend_name->name,'friend_id'=>$friend->id ]);

        // print_r($friends);
        // print_r($unread_messages);
        // $result = array_diff($friends, $unread_messages);
        // foreach($friends as $friend){
        //      foreach($unread_messages as $unread_message){
        //      if($friend->user_id  <> $unread_message->user_id){

        //         $name = User::where(['id' => $friend->user_id])->pluck('name')->first();
        //         array_push($read_messages,$name);
        //      }
        //     }
        // }
        // foreach ($read_messages as $key => $value ){
            // print_r(array_values($read_messages));
        // }
        // print_r($read_messages);
        // foreach($friends as $friend){
        //   if(Arr::exists( $unread_messages,$friend->user_id) == false){

        //        array_push($array,$friend->user_id);
        // }
        // }

        //  $friendsname = DB::table('users')-> SELECT name FROM users INNER JOIN friends ON id=friends->user_id;
        // dd($unread_messages);
        // foreach($friends as $friend){
        //   DB::table('messages_friends')->insert(['user_id' => $friend->user_id]);
        // }
        // foreach($unread_messages as $unread_message){
        //   DB::table('unread_messages_friends')->insert(['user_id' => $unread_message->user_id]);
        // }
        // SELECT user_id FROM friends INNER JOIN nread_messages ON table1.user_id = table2.user_id;
        // $unread_friends = DB::table('messages_friends')
        //     ->join('unread_messages_friends', 'messages_friends.user_id', '=', 'unread_messages_friends.user_id')
        //     ->select('messages_friends.user_id')
        //     ->get();
        //     dd($unread_friends );
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
