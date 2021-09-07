<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
        {{-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css"> --}}
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
                /* float:right; */
                /* border:1px solid #220044; */
            }
            /* .right{
                display: inline-block;
            } */
            div{
                border:1px solid #220044;
                width:60%;
                margin:auto;
                margin-bottom: 2px;
                padding:5px;
            }
            span{
                font-weight: bold;
                font-size: 15px;
                /* border:1px solid #220044; */
            }
            .right{
                float:right;
                color: red;
                margin-right: 3px;
            }
            .left{
                float:left;
                color: blue;
                margin-left: 3px;
            }
        </style>
    </head>
    <body>
    {{-- <div style="float:right;"> --}}
    <h5>Chat with {{$friend_name->name}}</h5>
    {{-- <span style="font-family: fontawesome;">&#xf095;</span> --}}
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
               <span class="content"style="background: white;margin:auto">{{$message->message_content}}
               @if(Auth::User()->id == $message->user_id)
                 @if($message->seen == 1)
                   {{-- <i style="font-family:fontawesome;"class="fa fa-check-double fa-xs" aria-hidden="true">&#xf560;</i> --}}
                   <i style="font-family:fontawesome;" class="fa">&#xf560;</i>
                   <i style="font-family:fontawesome;" class="fa">&#xf118;</i>
                  @else
                  <i style="font-family:fontawesome;" class="fa fa-check fa-xs" aria-hidden="true" ></i>
                  <i style="font-family:fontawesome;" class="fa" >&#f00c;</i>

                  @endif
               @endif
               </span>
            {{-- </tr> --}}
            </div>
        {{-- </div> --}}
        @else
        {{-- <div class="card" style="margin-bottom: 3px"> --}}
          <div class="card-content">
             <p class="left">{{ date("Y-m-d h:i A", strtotime($message->created_at))}}</p>
             <p class="right">{{$users->where('id',$message->user_id)->first()->name}} </p>
             <span class="content"style="background: white;margin:auto">{{$message->message_content}}
             @if(Auth::User()->id == $message->user_id)
               @if($message->seen == 1)
                 <i style="font-family:fontawesome;"class="fa">&#xf560;</i>
                @else
                <i style="font-family:fontawesome;"class="fa" >&#f00c;</i>
                @endif
             @endif
             </span>
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
