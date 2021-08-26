<x-layouts.app>
    <section class="section" style="height: 100%;width:100%;margin:auto;">
        <div class="container">
        <div style="text-align:center;width:20%;border-color: red;border-style:solid;float:left;display:inline-block;height: 100%">
            @if($friends <> null)
               <br><span>FRIENDS</span><br>
               <?php $var = false ?>
               @foreach ($friends as $friend)
                  <?php $var = false ?>
                  @foreach ($unread_messages as $unread_message)
                     @if($friend->user_id == $unread_message->user_id)
                      <a style="text-decoration: none;color:black;font-weight:bold" href="{{route('messages.chat', $unread_message->user_id)}}">{{ App\Models\User::where(['id' => $unread_message->user_id])->pluck('name')->first() }}</a>
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
          @endforeach
          @endif
        </div>
        <div style="width:75%;float:right;">
          <h5>Chat with {{$friend_name}}</h5>
          <form action="{{ route('messages.store') }}" method="POST" >
            @csrf
            <input name="friend_id" value ={{$friend_id}} hidden>
          <textarea style="width:50%"class=" @error('message_content')is-danger @enderror" name="message_content" placeholder="write message here...">{{ old('message_content') }}</textarea>
          <button class="button is-dark" style="color: #eb640a;align:center" >send</button>
        </form>
          <div style="overflow:auto;height:500px">
              @foreach($messages as $message)
              <div class="card">
                  <div class="card-content">
                     {{-- <h6><u style="text-transform: capitalize">{{$message->user->name}}</u>&nbsp; {{$message->created_at}}</h6> --}}
                     {{-- {{$sender = User::find($message->user_id)->name}} --}}
                    <input value={{$sender = $users->where('id',$message->user_id)->first()}} hidden/>
                     <h5 style="font-weight: bold">{{$sender->name}} </h5><br>
                         {{-- to {{$message->friend_id}} --}}
                     <span>{{$message->message_content}}</span><br>
                     @if(Auth::User()->id == $message->user_id)
                       @if($message->seen == 1)
                         {{-- <span style="color: red">seen</span> --}}
                         <i class="fa fa-check-double fa-xs" aria-hidden="true"></i>
                        @else
                        {{-- <span style="color: red">not seen</span> --}}
                        <i class="fa fa-check fa-xs" aria-hidden="true" ></i>
                        @endif
                     @endif
                     <span style="color:blue;float: right;">was sent at: {{$message->created_at}}</span>
                  </div>
              </div>
              @endforeach
          </div>
        </div>
        </div>
    </section>
</x-layouts.app>
