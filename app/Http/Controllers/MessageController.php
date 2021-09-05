<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Message;
// use Barryvdh\DomPDF\PDF;
use Barryvdh\DomPDF\PDF;
use Brick\Math\BigInteger;
use Illuminate\Support\Arr;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
// use Barryvdh\DomPDF\PDF;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;




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
        public function print(Request $request,$id)
        {
            // set_time_limit(0);

            // $message = Message::latest()->paginate(5);
            $message = Message::all();
            $friends = DB::select("CALL pr_messages_friends( ".Auth::User()->id.")");
            // dd($friends);
            $unread_messages = DB::select("CALL pr_unread_messages( ".Auth::User()->id.")");
            $friend = User::findOrFail($id);
            $friend_name = User::find($friend->id);
            $friend_id = Message::find($id);
            $messages = DB::table('messages')->where([
                ['friend_id', $friend->id],
                ['user_id', Auth::User()->id],
            ])->orwhere([
                ['friend_id', Auth::User()->id],
                ['user_id', $friend->id],])->orderBy('created_at','DESC')->get();
                $users = User::all();
            // dd($friends);
            $data = [
                'message' => $message,
                // 'friends' => $friends,
                // 'unread_messages' => $unread_messages,
                // 'friend_name'  => $friend_name,
                // 'friend_id'  => $friend_id,
                // 'messages'  => $messages,
                // 'users' => $users

            ];
            // dd($data);
            // if($request->has('download'))
            // {
                $pdf = app('dompdf.wrapper');
                // dd("here");
                // dd($pdf);
                // $pdf->loadView('message.showw',compact('message'));
                // $pdf->loadView('message.showw',$data);

                // $pdf = PDF::loadView('message.showw',$data);
                // $pdf->loadView('message.showw',$data);
                // $pdf = PDF::LoadView('frontend.pdf', $data);
                // $pdf->save(public_path(path:$message->message_number,'.pdf'));
                // dd($pdf->download('pdfview.pdf'));
                // return $pdf->download('pdfview.pdf');
                // return $pdf->stream('pdfview'.'.pdf');
                // view()->share('message.showw',$data);
                // $pdf = app('dompdf.wrapper');
                $pdf->loadView('message.showw', ['data' => $data,'users' => $users,'friends' => $friends,'unread_messages' => $unread_messages,'friend_name'  => $friend_name,'friend_id'  => $friend_id,'messages'  => $messages]);
                $pdf->save(public_path($friend_name.'.pdf'));
                $path= public_path($friend_name.'.pdf');
                header( 'Content-type: application/pdf');
                // set_time_limit(3000);
                return response()->file($path);
                // set_time_limit(300);
                // return $pdf->download('pdfview.pdf');
            // }
            // return view('message.showw',compact('data'));
            // return view('message.showw',['unread_messages' => $unread_messages,'friends'=> $friends, 'messages'=> $messages,'users'=>$users,'friend_name'=>$friend_name->name,'friend_id'=>$friend->id ]);

        }
    // }

    // }

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
        // $messages = $message->groupBy(function($date) {
        //     return Carbon::parse($date->created_at)->format('Y-m-d'); });
            // $messages = $message->groupBy('created_at');
            // ->groupBy(function($date) {
                // return Carbon::parse($date->created_at)->format('Y-m-d'); });
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
        return view('message.showw',['count_unread_messages'=>$count_unread_messages,'unread_messages' => $unread_messages,'friends'=> $friends, 'messages'=> $messages,'users'=>$users,'friend_name'=>$friend_name->name,'friend_id'=>$friend->id ]);
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
