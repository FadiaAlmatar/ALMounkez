<x-layouts.app>
    <section class="section" style="height: 100%;width:100%;margin:auto;">
        <div class="container">
        <div style="text-align:center;width:20%;border-color: red;border-style:solid;float:left;display:inline-block;height: 100%">
            <br><span>FRIENDS</span><BR>
             <?php $array = []; ?>
           <?php foreach($friends as $friend) {
              if(($friend->seen == false)) {  ?>
                 <a style="text-decoration: none;color:red" href="{{route('messages.chat', $friend->user_id)}}">{{ App\Models\User::where(['id' => $friend->user_id])->pluck('name')->first() }}</a><br><br>;
                 <?php array_push($array,$friend->user_id);
                }
                  if(($friend->seen == true) and ( in_array($friend->user_id,$array)) { ?>
                 <a style="text-decoration: none;color:blue" href="{{route('messages.chat', $friend->user_id)}}">{{ App\Models\User::where(['id' => $friend->user_id])->pluck('name')->first() }}</a><br><br>;
                 <?php } ?>
            {{-- @if(($friend->seen == false) && (Auth::User()->id <> $friend->user_id))
           <a style="text-decoration: none;color:red" href="{{route('messages.chat', $friend->user_id)}}">{{ App\Models\User::where(['id' => $friend->user_id])->pluck('name')->first() }}</a><br><br>
           @endif --}}
           <span>message is:</span>
           <?php
            $last_message = [];
            $last_message = DB::select("CALL pr_last_message( ".Auth::User()->id.",".$friend->user_id.")");
           print_r($last_message[0]->message_content);
            ?><br>
            <? } ?>
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
