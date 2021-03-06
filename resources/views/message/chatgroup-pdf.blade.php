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
                font-size: 10px;
                width:20%;
            }
            div{
                border:1px solid #220044;
                width:80%;
                margin:auto;
                margin-bottom: 2px;
                padding:5px;
            }
            span{
                font-weight: bold;
                font-size: 15px;
                background:rgb(229, 234, 235);
            }
            .right{
                float:right;
                color: red;
                padding-right: 10px;
                /* border:1px solid #220044; */
                text-align: right;
            }
            .left{
                float:left;
                color: blue;
                padding-left: 10px;
                /* border:1px solid #220044; */
                text-align: left;
            }
        </style>
    </head>
    <body>
        <h5>chat with {{ $group_name }} group <i style="font-family:fontawesome;">&#xf118;</i> </h5>
        @foreach($messages as $message)
            @if($message->user_id == Auth::User()->id)
                <div>
                    <p class="left">{{$users->where('id',$message->user_id)->first()->name}} </p>
                    <p class="right">{{ date("Y-m-d h:i A", strtotime($message->created_at))}}</p>
                    <span>{{$message->message_content}}
                        @if($message->seen == 1)
                                <i style="font-family:fontawesome;">&#xf00c;<i style="font-family:fontawesome;" >&#xf00c;</i></i> {{-- {{"✓✓"}}</i> --}}
                        @else
                                <i style="font-family:fontawesome;" >&#xf00c;</i>
                        @endif
                    </span>
                </div>
            @else
                <div>
                    <p class="left">{{ date("Y-m-d h:i A", strtotime($message->created_at))}}</p>
                    <p class="right">{{$users->where('id',$message->user_id)->first()->name}}</p>
                    <span>{{$message->message_content}}</span>
                </div>
            @endif
        @endforeach
    </body>
</html>
