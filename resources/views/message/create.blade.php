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
 <?php $myfriend = false; ?>
@foreach ($users as $user)
    <?php $myfriend = false; ?>
    @foreach ($friends as $friend)
        @if($user->id == $friend->user_id)
            <?php $myfriend = true; ?>
             @break
         @endif
    @endforeach
    @if (($myfriend == false) && (Auth::User()->id <> $user->id))
        <a href="{{route('messages.chat', $user->id)}}" >{{$user->name}}</a><br>
    @endif
 @endforeach
{{-- end show suggested friends --}}
</div>
</div>
</div>
</x-layouts.app>


