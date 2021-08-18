<x-layouts.app>
    <section class="section" style="height: 100%;width:100%;margin:auto;">
        <div class="container">
        <div style="width:20%;border-color: red;border-style:solid;float:left;display:inline-block;height: 100%">
            {{-- @foreach ($users as $user)
            {{-- friends --}}
                  {{-- @if(Auth::User()->id <> $user->id)
                       <a style="text-decoration:none"href="{{route('messages.chat', $user->id)}}" >{{$user->name}}</a><br>
                  @endif
            @endforeach --}}
            {{-- {{$people = []}}
            @foreach ($messages as $message)
              @if (Auth::User()->id == $message->user_id)
                 {{array_push($people,$message->user_id)}}
              @endif
            @endforeach
            {{$people= array_unique($people)}} --}}
            {{
            // use App\Http\Controllers\MessageController;
            //    $arr = App\Http\Controllers\MessageController::friends(); }}
            {{-- <a style="text-decoration:none"href="{{route('messages.chat', $message->friend_id)}}" >{{ var_dump($people)}}</a><br> --}}
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
