<x-layouts.app>
    @auth
 <div>
    @foreach ($comments as $comment)
      @if($comment->approved == 0)
         <form class="card-content" action="{{ route('approve') }}" method="POST" >
          @csrf
            <input name="comment_id" value ={{$comment->id}} hidden>
            comment from: <span style="color: blue">{{$comment->user->name}}</span> need approve <br>
            the comment is: <span style="color: red">{{$comment->content}}</span>
            <button class="button is-dark" style="color: #eb640a;align:center" >approve</button>
         </form>
      @endif
    @endforeach
 </div>
 @endauth
</x-layouts.app>
