<x-layouts.app>
    {{--start show post --}}
    <section style="height: 100%;width:50%;margin:auto;margin-top:20px" class="form">
        <div class="card"  >
            <div class="card-content">
              <div class="content">
                <p style="color: black">{{$post->content_post}}</p><br>
                <h6><u style="text-transform: capitalize">{{$post->user->name}}</u>&nbsp; {{$post->created_at}}</h6>
              </div>
            </div>
          </div>
    </section>
    {{-- end show post --}}
    <section class="section" style="height: 100%;width:50%;margin:auto;">
        <div class="container">
          <h5>Comments:</h5>
          {{-- <hr> --}}
                  @foreach ($commentlist as $comment)
                  <span hidden>{{$var = $comment->id}}</span>
                  @if ($comment->replyto == 0)
                     <hr>
                   @endif
                  <p> {{$comment->content}}</p>
                  @if($comment->replyto == 0)
                  {{-- <hr> --}}
                  <form class="card-content" action="{{ route('comments.store') }}" method="POST" >
                    @csrf
                    <input name="post_id" value ={{$post->id}} hidden>
                    <input name="replyto" value ={{$var}} hidden>
                    <textarea class=" @error('content')is-danger @enderror" name="content" placeholder="Reply here...">{{ old('content') }}</textarea><br>
                    <button class="button is-dark" style="color: #eb640a;align:center" >Reply</button>
                </form>
                {{-- <hr> --}}
                @endif
                  @endforeach
             </div>
    </section>
            @auth
            <section class="section" style="height: 100%;width:50%;margin:auto;">
            <div class="container">
                <form action="{{ route('comments.store') }}" method="POST" >
                    @csrf
                    <input name="post_id" value ={{$post->id}} hidden>
                    <input name="replyto" value ={{0}} hidden>
                    <textarea style="width:50%"class=" @error('content')is-danger @enderror" name="content" placeholder="Comment here...">{{ old('content') }}</textarea><br>
                    <button class="button is-dark" style="color: #eb640a;align:center" >Comment</button>
                </form>
            </div>
            </section>
            @endauth
</x-layouts>

