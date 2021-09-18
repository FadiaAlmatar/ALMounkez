<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Group;
use App\Models\Message;
use Mpdf\HTMLParserMode;
use Brick\Math\BigInteger;
use Dompdf\Adapter\PDFLib;
use Illuminate\Support\Arr;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\App;
use niklasravnsborg\LaravelPdf\PDF;
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
        $friend = User::findOrFail($id);
        $friend_name = User::find($friend->id);
        $messages = DB::table('messages')->where([
            ['friend_id', $friend->id],
            ['user_id', Auth::User()->id],
        ])->orwhere([
            ['friend_id', Auth::User()->id],
            ['user_id', $friend->id],])->orderBy('created_at','DESC')->get();
        $users = User::all();
        $html = view('message.chat-pdf',['users' => $users,'friend_name'  => $friend_name,'messages'  => $messages])->render();
        $pdf = new \Mpdf\Mpdf([
            'mode' => 'utf-8',
            'format' => 'A4',
            'default_font' => 'fontawesome',
            'margin_left' => 15,
            'margin_right' => 10,
            'margin_top' => 16,
            'margin_bottom' => 15,
            'margin_header' => 10,
            'margin_footer' => 10
    ]);
        $pdf->AddPage("P");
        $pdf->SetHTMLFooter('<p style="text-align: center">{PAGENO} of {nbpg}</p>');
        $pdf->WriteHTML('.fa { font-family: fontawesome;}',1);
        $pdf->WriteHTML($html);
        return  $pdf->Output("chat-PDF.pdf","D");
        }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users = User::all();
        $friends = DB::select("CALL pr_messages_friends( ".Auth::User()->id.")");
        $groups = Group::all();
        $unread_messages = DB::select("CALL pr_unread_messages( ".Auth::User()->id.")");
        $count_unread_messages = DB::select("CALL pr_count_unread_messages( ".Auth::User()->id.")");
        return view('message.create',['users'=>$users,'count_unread_messages'=>$count_unread_messages,'unread_messages' => $unread_messages,'groups'=>$groups,'friends'=>$friends]);
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
        $message->user_id = Auth::User()->id;//sender
        if($request->group_id == 0){
            $message->friend_id= $request->friend_id;
            $message->seen = false;
            $message->group_id = 0;
            }
        else{
            $message->friend_id= 0;
            $message->seen = false;
            $message->group_id = $request->group_id;
            }
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
        $users = User::all();
        $groups = Group::all();
        return view('message.show',[ 'messages'=> $messages,'users'=> $users,'groups'=>$groups]);
    }
    public function chat($id)//friend_id
    {
        $friend = User::findOrFail($id);
        $messages = DB::table('messages')->where([
            ['friend_id', $friend->id],
            ['user_id', Auth::User()->id],
        ])->orwhere([
            ['friend_id', Auth::User()->id],
            ['user_id', $friend->id],])->orderBy('created_at','DESC')->simplePaginate(3);
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
        $groups = Group::all();
        return view('message.show',['group_name'=>"",'group_id'=>0,'groups'=>$groups,'count_unread_messages'=>$count_unread_messages,'unread_messages' => $unread_messages,'friends'=> $friends, 'messages'=> $messages,'users'=>$users,'friend_name'=>$friend_name->name,'friend_id'=>$friend->id ]);
    }
   public function chatgroup($id)//group_id
   {
        $messages = DB::table('messages')->where('group_id', $id)->orderBy('created_at','DESC')->simplePaginate(3);
        $friends = DB::select("CALL pr_messages_friends( ".Auth::User()->id.")");
        $unread_messages = DB::select("CALL pr_unread_messages( ".Auth::User()->id.")");
        $count_unread_messages = DB::select("CALL pr_count_unread_messages( ".Auth::User()->id.")");
        $groups = Group::all();
        $users = User::all();
        $group = Group::findOrFail($id);
        $group_name = Group::find($group->id);
        return view('message.show',['group_name'=>$group_name->group_name,'friend_name'=>"",'group_id'=> $group->id ,'user_id'=> Auth::User()->id,'friend_id'=> 0,'messages'=>$messages,'groups'=>$groups,'count_unread_messages'=>$count_unread_messages,'unread_messages' => $unread_messages,'friends'=> $friends,'users'=>$users]);
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
