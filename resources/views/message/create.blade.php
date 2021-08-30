<div>
@foreach ($users as $user)
{{-- friends --}}
      @if(Auth::User()->id <> $user->id)
           <a href="{{route('messages.chat', $user->id)}}" >{{$user->name}}</a>
      @endif
@endforeach
</div>


