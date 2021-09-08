<x-layouts.app>
    {{-- <section class="section" style="height: 100%;width:100%;margin:auto;"> --}}
        <div class="container" style="margin-top: 5px">
            {{-- start section friends list with unread messages --}}
        <div style="text-align:center;width:28%;background: #e6e9ec;float:left;display:inline-block;margin-top:30px;overflow:auto">
            @if($friends <> null)
               <?php $var = false ?>
               @foreach ($friends as $friend)
               <div style="margin-top: 5px;" >
                  <?php $var = false ?>
                  @foreach ($unread_messages as $unread_message)
                     @if($friend->user_id == $unread_message->user_id)
                      <a style="text-decoration: none;color:black;font-weight:bold;" href="{{route('messages.chat', $unread_message->user_id)}}">{{ App\Models\User::where(['id' => $unread_message->user_id])->pluck('name')->first() }}</a>
                      <?php $var = true ?>
                      @foreach ($count_unread_messages as $count_unread_message)
                        @if($unread_message->user_id == $count_unread_message->user_id)
                           <span style="color:black;font-weight:bold">{{$count_unread_message->number}}</span><br>
                        @else
                         @continue
                        @endif
                      @endforeach
                     @continue
                     @endif
                  @endforeach
                  @if($var == false)
                    <a style="text-decoration: none;color:blue;font-weight:bold" href="{{route('messages.chat', $friend->user_id)}}">{{ App\Models\User::where(['id' => $friend->user_id])->pluck('name')->first() }}</a><br>
                @endif
                    <?php
                    $last_message = [];
                    $last_message = DB::select("CALL pr_last_message( ".Auth::User()->id.",".$friend->user_id.")");
                    print_r(substr($last_message[0]->message_content,0,10));
                    ?><br>
                </div>
                @endforeach
            @endif
        </div>
        {{-- end section friends list with unread messages --}}
        {{-- start section chat --}}
        <div style="width:70%;float:right;">
          <h5 style="text-align: center">Chat with {{$friend_name}}</h5>
          {{-- start form send message --}}
          <form action="{{ route('messages.store') }}" method="POST" >
            @csrf
            <input name="friend_id" value ={{$friend_id}} hidden>
            <textarea style="width:100%"class=" @error('message_content')is-danger @enderror" name="message_content" placeholder="write message here...">{{ old('message_content') }}</textarea>
            <button class="btn btn-light" style="color: white;align:center;margin-bottom:13px" ><i class="fa fa-paper-plane fa-lg" aria-hidden="true" style="color:blue"></i></button>
            <a href="{{route('messages.print', $friend_id)}}"><i class="fas fa-file-pdf fa-2x" style="color:red"></i></a>
            {{-- <a class="btn btn-primary" style="margin-bottom:13px" href="{{route('messages.print', $friend_id)}}">Download PDF</a> --}}
          </form>
          {{--end form send message   --}}
          {{-- start show messages --}}
          <div style="overflow:auto;height:500px;">
              @foreach($messages as $message)
               @if($message->user_id == Auth::User()->id)
              <div class="card" style="margin-bottom:3px">
                  <div class="card-content">
                    <input value={{$sender = $users->where('id',$message->user_id)->first()}} hidden/>
                     <span style="font-weight: bold">{{$sender->name}} </span>
                     <span style="font-size: 10px;float: right;">{{ date("Y-m-d h:i A", strtotime($message->created_at))}}</span><br><br>
                     <div style="background: white;margin:auto">{{$message->message_content}}
                     @if(Auth::User()->id == $message->user_id)
                       @if($message->seen == 1)
                         <i class="fa fa-check-double fa-xs" aria-hidden="true"></i>
                        @else
                        <i class="fa fa-check fa-xs" aria-hidden="true" ></i>
                        @endif
                     @endif
                    </div>
                  </div>
              </div>
              @else
              <div class="card" style="margin-bottom: 3px">
                <div class="card-content">
                  <input value={{$sender = $users->where('id',$message->user_id)->first()}} hidden/>
                   <span style="font-size: 10px;float: left;">{{ date("Y-m-d h:i A", strtotime($message->created_at))}}</span>
                   <span style="font-weight: bold;float: right;">{{$sender->name}} </span><br><br>
                   <div style="background: white;margin:auto">{{$message->message_content}}
                   @if(Auth::User()->id == $message->user_id)
                     @if($message->seen == 1)
                       <i class="fa fa-check-double fa-xs" aria-hidden="true"></i>
                      @else
                      <i class="fa fa-check fa-xs" aria-hidden="true" ></i>
                      @endif
                   @endif
                </div>
                </div>
            </div>
              @endif
              @endforeach
          </div>
          {{-- end show messages --}}
        </div>
        {{-- end section chat --}}
        </div>
    {{-- </section> --}}
</x-layouts.app>
