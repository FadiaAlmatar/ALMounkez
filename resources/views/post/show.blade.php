<x-app-layout>
{{--start show post --}}
        <div class="post-show">
            <div class="card-content">
              <div class="content">
                <h6><u>{{$post->user->name}}</u></h6>
                <p>{{$post->content_post}} </p><br>
                <p class="date-post">{{ date("Y-m-d h:i A", strtotime($post->created_at))}}</p>
              </div>
            </div>
          </div><br>
{{-- end show post --}}
{{-- start enter comment --}}
        @auth
        <div class="container" style="height: 100%;width:50%;margin:auto;">
            <form action="{{ route('comments.store') }}" method="POST" >
                @csrf
                <input name="post_id" value ={{$post->id}} hidden>
                <input name="replyto" value ={{0}} hidden>
                <button class="send-comment-btn"><i class="fa fa-paper-plane fa-lg" aria-hidden="true"></i></button>
                <input type="text" name="content" class="form-control pull-right comment-form"  placeholder="{{__('Write a comment...')}}"/>
            </form>
        </div>
        @endauth
{{-- end enter comment --}}
{{-- start show comments with replies --}}
        <div class="container container-comment">
              <h5>{{__('Comments')}}:</h5>
            @foreach ($commentlist as $comment)
                <span hidden>{{$var = $comment->id}}</span>
                @if ($comment->replyto == 0)
                 <hr>
                @endif
                <div class="comment">
                     <span class="comment-name-user">{{ App\Models\User::where(['id' => $comment->user_id])->pluck('name')->first() }}</span><br>
                     <span class="comment-content"> {{$comment->content}}</span>
                </div>
                <div>
                @if ($comment->replyto == 0)
                  <span class="btn comment-reply-word" id="replyb" onclick="myFunction({{$var}})">{{__('reply')}}</span>
                @endif
                  <span class="comment-date"> {{ date("Y-m-d h:i A", strtotime($comment->created_at))}} </span>
            </div>
                @if($comment->replyto == 0)
                    <form class="card-content" action="{{ route('comments.store') }}" method="POST" >
                        @csrf
                        <input name="post_id" value ={{$post->id}} hidden>
                        <input name="replyto" value ={{$var}} hidden>
                        <button class="replybtn-{{ $var }} send-reply-btn"><i class="fa fa-paper-plane fa-lg" aria-hidden="true" style="color:blue;"></i></button>
                        <input type="text" name="content" class="reply-{{ $var }} reply-form" class="form-control pull-right"  placeholder="{{__('Write a reply...')}}" />
                    </form>
                @endif
                  @endforeach
        </div>
{{-- end show comments with replies --}}
    </x-app-layout>


