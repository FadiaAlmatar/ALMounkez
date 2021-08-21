<?php

namespace App\Http\Controllers;

use App\Models\Message;
use App\Models\User;
use Brick\Math\BigInteger;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
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
        // dd(User::all());
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
        // dd($request->message_content);
        $message->seen = false;
        $message->user_id = Auth::User()->id;//sender
        // dd(Auth::User()->id);
        $message->save();
         $user = User::find(Auth::User()->id);
        return redirect()->back();
        // return view('message.show',['message' => $message,'user'=> $user]);

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
        // $messages = Message::all();
        // $messages = DB::table('messages')->where('friend_id', $friend->id)->orWhere('friend_id', Auth::User()->id)->orderBy('created_at')->get();
        $messages = DB::table('messages')->where([
            ['friend_id', $friend->id],
            ['user_id', Auth::User()->id],
        ])->orwhere([
            ['friend_id', Auth::User()->id],
            ['user_id', $friend->id],])->orderBy('created_at','DESC')->get();
        // orWhere('friend_id', Auth::User()->id
        $friend_name = User::find($friend->id);
        // dd($friend_name->name);
        $users = User::all();
        foreach($messages as $message){
          if(($message->user_id <> Auth::User()->id) && (Carbon::now())){
                  $message = Message::find($message->id);
                  $message->seen = true;
                  $message->save();
          }
        }
        // dd(Auth::User()->id );
        // $id = Auth::User()->id;
        $friends = DB::select("CALL pr_messages_friends( ".Auth::User()->id.")");

        $unread_messages = DB::select("CALL pr_unread_messages( ".Auth::User()->id.")");
       dd($unread_messages);
        // $friendsname = DB::table('users')->SELECT name FROM users-> WHERE id = 1;
        // dd(Auth::User()->id );
        // dd($friends()->friend_id);
        // DB::table('messages')->SELECT DISTINCT user_id FROM messages-> WHERE user_id = id
        // UNION
        //  SELECT DISTINCT friend_id FROM messages WHERE user_id = id;
        //  $friends = DB::select('select DISTINCT user_id from messages where user_id = ?
        //                         UNION
        //                         select DISTINCT friend_id FROM messages where user_id = ?', [Auth::User()->id,Auth::User()->id]);
        //   foreach($friends as $friend){
        //       dd($friend->friend_id);}
        return view('message.show',['unread_messages' => $unread_messages],['friends'=> $friends],[ 'messages'=> $messages,'users'=>$users,'friend_name'=>$friend_name->name,'friend_id'=>$friend->id ]);
    }


    // public static function getfriends()
    // {

    //     $friends = DB::select('CALL pr_messages_friends(" Auth::User()->id ")');
    //     return view('message.show',['friends'=> $friends]);

    //     $messages = Message::all();
    //     $people = [];
    //     foreach ($messages as $message){
    //       if (Auth::User()->id == $message->user_id){
    //          array_push($people,$message->user_id);
    //          }
    //         }
    //    $people= array_unique($people);
    //   return $people;
    // }

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
