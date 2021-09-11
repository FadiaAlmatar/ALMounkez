<x-layouts.app>
    {{--start show post --}}
    <section style="height: 100%;width:50%;margin:auto;margin-top:20px" class="form">
        <div class="card"  >
            <div class="card-content">
              <div class="content">
                <p style="color: black">{{$post->content_post}} </p><br>
                <h6><u style="text-transform: capitalize">{{$post->user->name}}</u>&nbsp; {{$post->created_at}}</h6>
              </div>
            </div>
          </div>
    </section>
    {{-- end show post --}}
    {{-- <section class="section" style="height: 100%;width:50%;margin:auto;"> --}}
        @auth
        <section class="section" style="height: 100%;width:50%;margin:auto;">
        <div class="container">
            <form action="{{ route('comments.store') }}" method="POST" >
                @csrf
                <input name="post_id" value ={{$post->id}} hidden>
                <input name="replyto" value ={{0}} hidden>
                {{-- <textarea style="width:50%"class=" @error('content')is-danger @enderror" name="content" placeholder="Comment here...">{{ old('content') }}</textarea><br> --}}
                {{-- <button class="button is-dark" style="color: #eb640a;align:center" >Comment</button> --}}
                <button style="padding: 10px;min-width: 40px;position: absolute;background: rgb(236, 235, 235);border-radius:15px;"><i class="fa fa-paper-plane fa-lg" aria-hidden="true" style="color:blue;"></i></button>
                <input type="text" name="content" class="form-control pull-right"  placeholder="{{__('Write a comment...')}}" style="text-indent:40px;background: rgb(236, 235, 235);border-radius:15px;padding: 10px;width:50%"/>
            </form>
        </div>
        </section>
        @endauth
        <div class="container" style="height: 100%;width:50%;margin:auto;">
            <h5>{{__('Comments')}}:</h5>
            @foreach ($commentlist as $comment)
                <span hidden>{{$var = $comment->id}}</span>
                @if ($comment->replyto == 0)
                 <hr>
                @endif

                <div style="background: rgb(236, 235, 235);border-radius:13px;padding:7px;padding-bottom:0px;margin-bottom:0px;width:fit-content">
                     <span style="color:black;font-weight:bold;font-size:15px">{{ App\Models\User::where(['id' => $comment->user_id])->pluck('name')->first() }}</span><br>
                     <span style="font-size:13px"> {{$comment->content}}</span>
                </div>
                <div>
                @if ($comment->replyto == 0)
                  <span style="color:grey;font-weight:bold;font-size:9px;margin-left:0;padding-left:0;" class="btn" id="replyb" onclick="myFunction({{$var}})">{{__('reply')}}</span>
                @endif
                  <span style="color:grey;font-weight:bold;font-size:9px;margin-left:0;">
                    @if(\Carbon\Carbon::now()->diffInSeconds($comment->created_at) <= 60)
                      {{\Carbon\Carbon::now()->diffInSeconds($comment->created_at)}}<span style="color:grey;font-weight:bold;font-size:9px;margin-left:0;">{{__('s')}}</span>
                    @else
                      @if(\Carbon\Carbon::now()->diffInMonths($comment->created_at) > 12)
                      {{\Carbon\Carbon::now()->diffInYears($comment->created_at)}}<span style="color:grey;font-weight:bold;font-size:9px;margin-left:0;">{{__('y')}}</span>
                      @elseif(\Carbon\Carbon::now()->diffInDays($comment->created_at) > 30)
                      {{\Carbon\Carbon::now()->diffInMonths($comment->created_at)}}<span style="color:grey;font-weight:bold;font-size:9px;margin-left:0;">{{__('mo')}}</span>
                      @elseif(\Carbon\Carbon::now()->diffInHours($comment->created_at) > 24)
                      {{\Carbon\Carbon::now()->diffInDays($comment->created_at)}}<span style="color:grey;font-weight:bold;font-size:9px;margin-left:0;"> {{__('d')}}</span>
                      @elseif(\Carbon\Carbon::now()->diffInMinutes($comment->created_at) > 60)
                      {{\Carbon\Carbon::now()->diffInHours($comment->created_at)}}<span style="color:grey;font-weight:bold;font-size:9px;margin-left:0;"> {{__('h')}}</span>
                      @elseif(\Carbon\Carbon::now()->diffInSeconds($comment->created_at) > 60)
                      {{\Carbon\Carbon::now()->diffInMinutes($comment->created_at)}}<span style="color:grey;font-weight:bold;font-size:9px;margin-left:0;">{{__('m')}}</span>
                     @endif
                     @endif
                </span>
                    {{-- <div id="replybutton" class="btn4 like"><span class="btn reply" id="replyb">Reply</span> </div> --}}
                {{-- <input type="text"  id="reply" class="form-control pull-right"  placeholder="Write a reply..." style="display:none;"/> --}}
            </div>
                @if($comment->replyto == 0)
                    <form class="card-content" action="{{ route('comments.store') }}" method="POST" >
                        @csrf
                        <input name="post_id" value ={{$post->id}} hidden>
                        <input name="replyto" value ={{$var}} hidden>
                        {{-- <textarea style="border-radius:15px;background: rgb(236, 235, 235)"class=" @error('content')is-danger @enderror" name="content" placeholder="Reply here...">{{ old('content') }}</textarea> --}}
                        {{-- <button class="button is-dark" style="color: #eb640a;align:center">Reply</button> --}}
                        <button class="replybtn-{{ $var }}" style="display:none;padding: 10px;min-width: 40px;position: absolute;display:none;background: rgb(236, 235, 235);border-radius:15px;"><i class="fa fa-paper-plane fa-lg" aria-hidden="true" style="color:blue;"></i></button>
                        <input type="text" name="content" class="reply-{{ $var }}" class="form-control pull-right"  placeholder="{{__('Write a reply...')}}" style="text-indent:40px;display:none;background: rgb(236, 235, 235);border-radius:15px;padding: 10px;width:50%"/>
                    </form>
                @endif
                  @endforeach
        </div>
    {{-- </section> --}}

</x-layouts>

