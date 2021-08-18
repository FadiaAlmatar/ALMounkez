<div>
@foreach ($users as $user)
{{-- friends --}}
      @if(Auth::User()->id <> $user->id)
           <a href="{{route('messages.chat', $user->id)}}" >{{$user->name}}</a>
      @endif
@endforeach
</div>
{{-- <input name="friend_id" value ={{2}} hidden> --}}

{{-- {{route('messages.show',$user)}} --}}
{{-- <form action="{{ route('messages.store') }}" method="POST" >
    @csrf
  <textarea style="width:50%"class=" @error('message_content')is-danger @enderror" name="message_content" placeholder="write here...">{{ old('message_content') }}</textarea><br>
  <button class="button is-dark" style="color: #eb640a;align:center" >send</button>
</form> --}}

