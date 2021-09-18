<x-layouts.app>
    <div class="container" style="margin-top: 5px">
{{-- start section friends list with unread messages --}}
        <div class="friends-section" style="overflow:auto;height:600px;">
                <?php $var = false ?>
{{-- start create group --}}
                <button style="float:left"class="btn btn-primary"onclick="group()"><i class="fas fa-plus" aria-hidden="true"></i> {{__('New Group')}}</button>
                <form action="{{ route('groups.store') }}" method="POST" >
                    @csrf
                    <input class="group"style="display:none;width:40%;float:right"type="text" name="group_name"  class="form-control pull-right"  placeholder="{{__('enter group name')}}" /><br><br>
                    <div class="field">
                    <label style="display:none;font-size:15px"class="label group">{{__('Add friends')}}</label>
                    <select style="display:none;" name="users[]" class="form-select group  @error('users')is-danger @enderror" aria-label="Default select example" multiple>
                        @foreach ($users as $user)
                              @if(Auth::User()->id <> $user->id)
                                 <option value="{{ $user->id }}">{{$user->name}}</option>
                              @endif
                        @endforeach
                    </select>
                    <button type="submit"style="float:left;display:none;" class="btn btn-primary group">{{__('ok')}}</button><br>
                    </div>
                </form><br>
{{-- end create group --}}
{{-- start show friends --}}
            <div>
               @foreach ($friends as $friend)
               @if ($friend->user_id <> 0)
               <div style="margin-top: 5px;">
                  <?php $var = false ?>
                  @foreach ($unread_messages as $unread_message)
                     @if($friend->user_id == $unread_message->user_id)
                      <a class="unread-friend-name" href="{{route('messages.chat', $unread_message->user_id)}}">{{ App\Models\User::where(['id' => $unread_message->user_id])->pluck('name')->first() }}</a>
                      <?php $var = true ?>
                      @foreach ($count_unread_messages as $count_unread_message)
                        @if($unread_message->user_id == $count_unread_message->user_id)
                           <span class="count-unread-message">{{$count_unread_message->number}}</span><br>
                        @else
                         @continue
                        @endif
                      @endforeach
                     @continue
                     @endif
                  @endforeach
                  @if($var == false)
                    <a class="friend-name" href="{{route('messages.chat', $friend->user_id)}}">{{ App\Models\User::where(['id' => $friend->user_id])->pluck('name')->first() }}</a><br>
                @endif
                    <?php
                    $last_message = [];
                    $last_message = DB::select("CALL pr_last_message( ".Auth::User()->id.",".$friend->user_id.")");
                    print_r(substr($last_message[0]->message_content,0,10));
                    ?><br>
                </div>
                @endif
                @endforeach
                </div>
{{-- end show friends --}}
{{-- start show my groups --}}
        <?php $mygroup = false;?>
        <hr><p class="mygroup">{{__('My Groups')}}</p>
        @foreach($groups as  $group)
            <?php $mygroup = false;?>
            <p>@foreach ($group->users as $user)
                @if($user->id == Auth::User()->id)
                  <?php $mygroup = true; ?>
                  @break
                @endif
                @endforeach
                @if ($mygroup == true)
                <a href="{{route('messages.chatgroup', $group->id)}}">{{$group->group_name}}</a><br>
                @foreach ($group->users as $user)
                    <span>{{$user->name}}</span>
                @endforeach
                @endif </p>
        @endforeach
{{-- end show my groups --}}
{{-- start show suggested friends --}}
       <hr><p class="mygroup">{{__('Suggested friends')}}</p>
        @foreach ($users as $user)
            @if(Auth::User()->id <> $user->id)
                <a href="{{route('messages.chat', $user->id)}}" >{{$user->name}}</a><br>
            @endif
        @endforeach
{{-- end show suggested friends --}}
    </div>
{{-- end show my groups --}}
{{-- end section friends list with unread messages --}}
{{-- start section chat --}}
        <div class="chat-section">
          @if($group_id == 0)<h5>{{__('Chat with')}} {{$friend_name}}</h5>@endif
          @if($group_id <> 0)<h5>{{__('Chat with')}} {{$group_name}} {{__('group')}}</h5>@endif
{{-- start form send message --}}
          <form action="{{ route('messages.store') }}" method="POST" style="display:inline">
            @csrf
            <input name="friend_id" value ={{$friend_id}} hidden>
            <input name="group_id" value ={{$group_id}} hidden>
            <textarea style="width:100%"class=" @error('message_content')is-danger @enderror" name="message_content" placeholder="{{__('write message here...')}}">{{ old('message_content') }}</textarea>
            <button class="btn btn-light chat-send-btn"><i class="fa fa-paper-plane fa-lg" aria-hidden="true"></i></button>
            @if($group_id == 0)<a href="{{route('messages.print', $friend_id)}}"><i class="fas fa-file-pdf fa-2x" style="color:red"></i></a>@endif
            @if($group_id <> 0)<a href="{{route('messages.printgroup', $group_id)}}"><i class="fas fa-file-pdf fa-2x" style="color:red"></i></a>@endif
        </form>
{{-- start add new subscribes --}}
          @if(($group_id <> 0) && ($group_owner == Auth::User()->id))<button class="btn btn-light chat-send-btn"onclick="addsubscribe()"><i class="fas fa-plus" aria-hidden="true"></i></button>@endif
          <form action="{{ route('addsubscribes',$group_id) }}" method="GET" >
            @csrf
            <select style="display:none;" name="users[]" class="form-select subscribe  @error('users')is-danger @enderror" aria-label="Default select example" multiple>
              @foreach ($users as $user)
                    @if(Auth::User()->id <> $user->id)
                       <option value="{{ $user->id }}">{{$user->name}}</option>
                    @endif
              @endforeach
          </select>
          <button type="submit"style="float:left;display:none;" class="btn btn-primary subscribe">{{__('ok')}}</button><br>
        </form>
{{-- end add new subscribes --}}
          {{-- pagination --}}
          <br><span class="d-flex justify-content-center">
            {!! $messages->links() !!}
        </span>
{{--end form send message   --}}
{{-- start show messages --}}
          <div style="overflow:auto;height:500px;">
              @foreach($messages as $message)
               @if($message->user_id == Auth::User()->id)
              <div class="card" style="margin-bottom:3px">
                  <div class="card-content">
                    <input value={{$sender = $users->where('id',$message->user_id)->first()}} hidden/>
                     <span class="sender-name">{{$sender->name}} </span>
                     <span class="message-date-sender">{{ date("Y-m-d h:i A", strtotime($message->created_at))}}</span><br><br>
                     <div class="message-content">{{$message->message_content}}
                      @if ($message->group_id == 0)
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
                   <span class="message-date-receiver">{{ date("Y-m-d h:i A", strtotime($message->created_at))}}</span>
                   <span class="receiver-name">{{$sender->name}} </span><br><br>
                   <div class="message-content">{{$message->message_content}}
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
</x-layouts.app>






{{-- <a class="btn btn-primary" style="margin-bottom:13px" href="{{route('messages.print', $friend_id)}}">Download PDF</a> --}}
