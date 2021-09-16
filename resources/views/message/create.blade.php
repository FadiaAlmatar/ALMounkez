{{-- <div>
@foreach ($users as $user)
{{-- friends --}}
      {{-- @if(Auth::User()->id <> $user->id) --}}
           {{-- <a href="{{route('messages.chat', $user->id)}}" >{{$user->name}}</a> --}}
      {{-- @endif --}}
{{-- @endforeach --}}
{{-- </div> --}}
<x-layouts.app>
    <div class="container" style="margin-top: 5px">
        <div class="friends-section" style="overflow:auto;height:600px;">
            <?php $var = false ?>
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
    </div>
</x-layouts.app>


