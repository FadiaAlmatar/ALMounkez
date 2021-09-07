<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
// use Dompdf\Dompdf;
use App\Models\User;
use App\Models\Message;
// use Barryvdh\DomPDF\PDF as DomPDFPDF;
use niklasravnsborg\LaravelPdf\PDF;
use Mpdf\HTMLParserMode;
use Brick\Math\BigInteger;
use Dompdf\Adapter\PDFLib;
use Illuminate\Support\Arr;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
        // use phpDocumentor\Reflection\PseudoTypes\True_;
        // require_once __DIR__ . '/vendor/autoload.php';
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
        // ini_set('max_execution_time', 3000);
        $message = Message::all();
        $friends = DB::select("CALL pr_messages_friends( ".Auth::User()->id.")");
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
        $data = [
                'message' => $message,

            ];

        // $pdf = App::make('mpdf.wrapper');
        // $this->load->library('mpdf60/mpdf');
        // require_once __DIR__ . '/vendor/autoload.php';
        $html = view('message.chat-pdf',['data' => $data,'users' => $users,'friends' => $friends,'unread_messages' => $unread_messages,'friend_name'  => $friend_name,'friend_id'  => $friend_id,'messages'  => $messages])->render();
        $pdf = new \Mpdf\Mpdf(['mode' => 'utf-8', 'format' => [290,200]]);
        $pdf->AddPage("P");
        $pdf->setFooter('{PAGENO}');
        // $stylesheet = file_get_contents( asset('css/style.css'));
        // $pdf->WriteHTML($stylesheet,\Mpdf\HTMLParserMode::HEADER_CSS);
        $pdf->WriteHTML($html);
        // $pdf->loadView('message.chat-pdf', ['data' => $data,'users' => $users,'friends' => $friends,'unread_messages' => $unread_messages,'friend_name'  => $friend_name,'friend_id'  => $friend_id,'messages'  => $messages]);
        // ->setOptions(['defaultFont' => 'sans-serif']);
        // ,['data' => $data,'users' => $users,'friends' => $friends,'unread_messages' => $unread_messages,'friend_name'  => $friend_name,'friend_id'  => $friend_id,'messages'  => $messages]);
        return  $pdf->Output("chat-PDF.pdf","D");

        // return $pdf->download('pdfview.pdf');
        // {{-- <?php
            // public_path() require_once __DIR__ . '/vendor/autoload.php';


        // require_once __DIR__ . '/vendor/autoload.php';

        // $mpdf = new \Mpdf\Mpdf(['mode' => 'utf-8', 'format' => [290,100]]);
        // $mpdf->autoScriptToLang = True;
        // $mpdf->autoLangToFont = True;
        // $mpdf->AddPage("P");
        // $stylesheet = file_get_contents('style.css');
        // $mpdf->WriteHTML($stylesheet,\Mpdf\HTMLParserMode::HEADER_CSS);
        // $html = ['data' => $data,'users' => $users,'friends' => $friends,'unread_messages' => $unread_messages,'friend_name'  => $friend_name,'friend_id'  => $friend_id,'messages'  => $messages];
        // $mpdf->WriteHTML($html,\Mpdf\HTMLParserMode::HTML_BODY);
        // $mpdf->Output("myPDF.pdf","D");

        // if($request->has('download'))
            // {
                // $pdf = app('dompdf.wrapper');
                // $pdf = PDF::loadView('message.showw',$data);
                // $pdf->loadView('message.showw',$data);
                // return $pdf->stream('pdfview'.'.pdf');
                // view()->share('message.showw',$data);
                // $pdf = app('dompdf.wrapper');
                // $pdf->save(public_path($friend_name.'.pdf'));
                // $path= public_path($friend_name.'.pdf');
                // header( 'Content-type: application/pdf');
                // return response()->file($path);
            // }
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
