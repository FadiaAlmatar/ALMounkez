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
    {{--start show comments with replies  --}}
    <section class="section" style="height: 100%;width:50%;margin:auto;">
        <div class="container">
          <h5>Comments:</h5>
               @foreach ($post->comments as $comment)
               {{-- Show comments that has been approved  --}}
                 @if(($comment->replyto == 0) &&($comment->approved == true))
                 <span hidden>{{$var = $comment->id}}</span>
                  <div class="card">
                     <div class="card-content">
                        <h6><u style="text-transform: capitalize">{{$comment->user->name}}</u>&nbsp; {{$comment->created_at}}</h6>
                        <p>{{$comment->content}}</p>
                        <h6>Replies:</h6>
                        {{-- start show replies related to this comment--}}
                       @foreach ($post->comments as $comment)
                       {{-- Show replies that has been approved  --}}
                         @if(($comment->replyto <> 0) && ($var == $comment->replyto)&&($comment->approved == true))
                         <div class="card">
                           <div class="card-content">
                             <h6><u style="text-transform: capitalize">{{$comment->user->name}}</u>&nbsp; {{$comment->created_at}}</h6>
                             <p>{{$comment->content}}</p>
                           </div>
                         </div>
                        @endif
                         {{-- start Show Auth::User replies -on others'comment that approved- before they are approved and only he see it--}}
                        @if(($comment->replyto <> 0) && ($var == $comment->replyto)&& (Auth::User()->id == $comment->user->id)&&($comment->approved == false))
                        <div class="card">
                          <div class="card-content">
                            <h6><u style="text-transform: capitalize">{{$comment->user->name}}</u>&nbsp; {{$comment->created_at}}</h6>
                            <p>{{$comment->content}}</p>
                          </div>
                        </div>
                       @endif
                      @endforeach
                      {{-- end show replies related to this comment--}}
                      {{-- send reply on this comment --}}
                        @auth
                        <form class="card-content" action="{{ route('comments.store') }}" method="POST" >
                            @csrf
                        {{-- <input name="comment_id" value ={{$comment->id}} hidden> --}}
                        <input name="post_id" value ={{$post->id}} hidden>
                        <input name="replyto" value ={{$var}} hidden>
                        <textarea class=" @error('content')is-danger @enderror" name="content" placeholder="Reply here...">{{ old('content') }}</textarea><br>
                        <button class="button is-dark" style="color: #eb640a;align:center" >Reply</button>
                        </form>
                        </div>
                        @endauth
        </div>
        @endif
        @endforeach
         {{--end show comments with replies  --}}
        @auth
        @foreach ($post->comments as $comment)
        {{-- start Show Auth::User comments before they are approved and only he see it--}}
                @if(($comment->replyto == 0) &&(Auth::User()->id == $comment->user->id)&&($comment->approved == false))
                <span hidden>{{$var = $comment->id}}</span>
                <div class="card">
                    <div class="card-content">
                    <h6><u style="text-transform: capitalize">{{$comment->user->name}}</u>&nbsp; {{$comment->created_at}}</h6>
                    <p>{{$comment->content}}</p>
                    <h6>Replies:</h6>
                    @foreach ($post->comments as $comment)
                    {{-- start Show Auth::User replies -on his comment- before they are approved and only he see it--}}
                        @if(($comment->replyto <> 0) && ($var == $comment->replyto)&&(Auth::User()->id == $comment->user->id)&&($comment->approved == false))
                        <div class="card">
                        <div class="card-content">
                            <h6><u style="text-transform: capitalize">{{$comment->user->name}}</u>&nbsp; {{$comment->created_at}}</h6>
                            <p>{{$comment->content}}</p>
                        </div>
                        </div>
                    @endif
                    {{-- end Show Auth::User replies--}}
                    @endforeach
                @auth
                <form class="card-content" action="{{ route('comments.store') }}" method="POST" >
                    @csrf
                    {{-- <input name="comment_id" value ={{$comment->id}} hidden> --}}
                    <input name="post_id" value ={{$post->id}} hidden>
                    <input name="replyto" value ={{$var}} hidden>
                    <textarea class=" @error('content')is-danger @enderror" name="content" placeholder="Reply here...">{{ old('content') }}</textarea><br>
                    <button class="button is-dark" style="color: #eb640a;align:center" >Reply</button>
                </form>
                    </div>
                @endauth
            </div>
           @endif
               {{-- end Show Auth::User comments before they are approved and only he see it--}}

             @endforeach
                @endauth
                </div>
            </section>
                {{-- send comment --}}
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

