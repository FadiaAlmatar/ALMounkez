<div class="col-xl-8 col-lg-8 col-md-8 col-sm-9 col-9">
    <div class="selected-user">
        <span>Chat with <span class="name">{{$friend_name->name}}</span></span>
    </div>
    <div class="chat-container">
        <ul class="chat-box chatContainerScroll">

            <div style="overflow:auto;height:500px">
            @foreach($messages as $message)
            @if($message->user_id == Auth::User()->id)
            <li class="chat-left" >
            <div class="chat-text" style="overflow:hidden">
                <input value={{$sender = $users->where('id',$message->user_id)->first()}} hidden/>
                <div class="chat-name">{{$sender->name}}</div>
                <span style="color: #000">{{$message->message_content}}</span>&nbsp;
                <span style="font-size: 10px">{{ date("h:i A", strtotime($message->created_at))}}</span>
                @if(Auth::User()->id == $message->user_id)
                    @if($message->seen == 1)
                        <i class="fa fa-check-double fa-xs" aria-hidden="true"></i>
                    @else
                        <i class="fa fa-check fa-xs" aria-hidden="true"></i>
                    @endif
                @endif
            </div>
            </li>
            @else
             <li class="chat-right">
                <div class="chat-text" style="overflow:hidden">
                    <input value={{$sender = $users->where('id',$message->user_id)->first()}} hidden/>
                    <div class="chat-name">{{$sender->name}}</div>
                    <span style="color: #000">{{$message->message_content}}</span>&nbsp;
                    <span style="font-size: 10px">{{ date("h:i A", strtotime($message->created_at))}}</span>
                    @if(Auth::User()->id == $message->user_id)
                        @if($message->seen == 1)
                            <i class="fa fa-check-double fa-xs" aria-hidden="true"></i>
                        @else
                            <i class="fa fa-check fa-xs" aria-hidden="true" ></i>
                        @endif
                    @endif
                </div>
              </li>
            @endif
            @endforeach
        </div>
        </ul>
    </div>
</div>
