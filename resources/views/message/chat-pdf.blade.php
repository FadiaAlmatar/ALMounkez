<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
        <style>
         h5 {
            /* border:1px solid #220044; */
            text-align: center;
            text-decoration: underline;
            font-size: 25px;
            }
            body {
            font-family: 'XBRiyaz', sans-serif;
           }
            .right,.left{
                /* font-weight: bold; */
                font-size: 10px;
                width:30%;
                display: inline-block;
                /* float:right; */
                /* border:1px solid #220044; */
            }
            div{
                border:1px solid #220044;
                width:60%;
                margin:auto;
                margin-bottom: 2px;
                padding:5px;
            }
            .content{
                font-weight: bold;
                font-size: 15px;
            }
            .right{
                float:right;
                color: red;
                margin-right: 1px;
            }
            .left{
                float:left;
                color: blue;
            }
        </style>
    </head>
    <body>
    {{-- <div style="float:right;"> --}}
    <h5>Chat with {{$friend_name->name}}</h5>
    {{-- start show messages --}}
    {{-- <div style="overflow:auto;height:500px;"> --}}
        {{-- <table cellpadding="0" cellspacing="0"> --}}
        @foreach($messages as $message)
         @if($message->user_id == Auth::User()->id)
        {{-- <div class="card" style="margin-bottom:3px"> --}}
            <div class="card-content">
              {{-- <input value={{$sender = $users->where('id',$message->user_id)->first()}} hidden/> --}}
              {{-- <tr> --}}
               <p class="left">{{$users->where('id',$message->user_id)->first()->name}} </p>
               <p class="right">{{ date("Y-m-d h:i A", strtotime($message->created_at))}}</p>
            {{-- </tr> --}}
            {{-- <tr> --}}
               <p class="content"style="background: white;margin:auto">{{$message->message_content}}
               @if(Auth::User()->id == $message->user_id)
                 @if($message->seen == 1)
                   <i class="fa fa-check-double fa-xs" aria-hidden="true"></i>
                  @else
                  <i class="fa fa-check fa-xs" aria-hidden="true" ></i>
                  @endif
               @endif
               </p>
            {{-- </tr> --}}
            </div>
        {{-- </div> --}}
        @else
        {{-- <div class="card" style="margin-bottom: 3px"> --}}
          <div class="card-content">
             <p class="left">{{ date("Y-m-d h:i A", strtotime($message->created_at))}}</p>
             <p class="right">{{$users->where('id',$message->user_id)->first()->name}} </p>
             <p class="content"style="background: white;margin:auto">{{$message->message_content}}
             @if(Auth::User()->id == $message->user_id)
               @if($message->seen == 1)
                 <i class="fa fa-check-double fa-xs" aria-hidden="true"></i>
                @else
                <i class="fa fa-check fa-xs" aria-hidden="true" ></i>
                @endif
             @endif
             </p>
          </div>
      {{-- </div> --}}
        @endif

        @endforeach
    {{-- </table> --}}
    {{-- </div> --}}
    {{-- end show messages --}}
  {{-- </div> --}}
    </body>
</html>
