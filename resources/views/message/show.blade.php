<x-layouts.app>
        <div class="container" style="margin-top: 5px">
{{-- start section friends list with unread messages --}}
        <div class="friends-section">
            {{-- @if($friends <> null) --}}
               <?php $var = false ?>
               <button style="float:left"class="btn btn-primary"onclick="group()"><i class="fas fa-plus" aria-hidden="true"></i> New Group</button>
               <form action="{{ route('groups.store') }}" method="POST" >
                @csrf
               <input class="group"style="display:none;width:40%;float:right"type="text" name="group_name"  class="form-control pull-right"  placeholder="{{__('enter group name')}}" /><br><br>
              <div class="field">
                <label style="display:none;"class="label group">Add friends</label>
                    <select style="display:none;" name="users[]" class="form-select group  @error('users')is-danger @enderror" aria-label="Default select example" multiple>
                        @foreach ($users as $user)
                           <option value="{{ $user->id }}">{{$user->name}}</option>
                        @endforeach
                      </select>
                @error('users')
                  <p class="help is-danger">{{ $message }}</p>
                @enderror
              </div>
              <button type="submit"style="float:left;display:none;" class="btn btn-primary group">ok</button><br><br>

            </form>
               @foreach ($friends as $friend)
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
                @endforeach
            {{-- @endif --}}
{{-- show my groups --}}
           <hr>
           <p class="mygroup">My Groups</p>
             @foreach($groups as  $group)
             <p style="border-style: solid;border-color:black">
              <a style="text-decoration:none;"href="{{route('messages.chatgroup', $group->id)}}">{{$group->group_name}}</a><br>
              @foreach ($group->users as $user)
               <span>{{$user->name}}</span>
              @endforeach
            </p>
            @endforeach
        </div>
{{-- end section friends list with unread messages --}}
{{-- start section chat --}}
        <div class="chat-section">
          {{-- <h5>{{__('Chat with')}} {{$friend_name}}</h5> --}}
{{-- start form send message --}}
          <form action="{{ route('messages.store') }}" method="POST" >
            @csrf
            <input name="friend_id" value ={{$friend_id}} hidden>
            {{-- @if($request->group_id <> 0) --}}
            <input name="group_id" value ={{$group_id}} hidden>
            {{-- @endif --}}
            <textarea style="width:100%"class=" @error('message_content')is-danger @enderror" name="message_content" placeholder="{{__('write message here...')}}">{{ old('message_content') }}</textarea>
            <button class="btn btn-light chat-send-btn"><i class="fa fa-paper-plane fa-lg" aria-hidden="true"></i></button>
            <a href="{{route('messages.print', $friend_id)}}"><i class="fas fa-file-pdf fa-2x" style="color:red"></i></a>
{{-- pagination --}}
            {{-- <div class="d-flex justify-content-center">
                {!! $messages->links() !!}
            </div> --}}
          </form>
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
                       @if($message->seen == 1)
                         <i class="fa fa-check-double fa-xs" aria-hidden="true"></i>
                        @else
                        <i class="fa fa-check fa-xs" aria-hidden="true" ></i>
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
{{-- </section> --}}
</x-layouts.app>

{{-- <a class="btn btn-primary" style="margin-bottom:13px" href="{{route('messages.print', $friend_id)}}">Download PDF</a> --}}
