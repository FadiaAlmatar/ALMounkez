<x-layouts.app>
<div class="container">
    <!-- Content wrapper start -->
    <div class="content-wrapper">
        <!-- Row start -->
        <div class="row gutters">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="card m-0">
                    <!-- Row start -->
                    {{-- start friends list --}}
                    <div class="row no-gutters">
                        <div class="col-xl-4 col-lg-4 col-md-4 col-sm-3 col-3">
                            <div class="users-container">
                                <ul class="users">
                                    @if($friends <> null)
                                    <?php $var = false ?>
                                    @foreach ($friends as $friend)
                                    <li class="person" data-chat="person1">
                                        <p class="name-time">
                                            <?php $var = false ?>
                                            @foreach ($unread_messages as $unread_message)
                                               @if($friend->user_id == $unread_message->user_id)
                                                <a class="name"style="text-decoration: none;color:black;font-weight:bold" href="{{route('messages.chat', $unread_message->user_id)}}">{{ App\Models\User::where(['id' => $unread_message->user_id])->pluck('name')->first() }}</a>
                                                <?php $var = true ?>
                                                @foreach ($count_unread_messages as $count_unread_message)
                                                  @if($unread_message->user_id == $count_unread_message->user_id)
                                                     <span style="color:black;font-weight:bold">{{$count_unread_message->number}}</span><br>
                                                  @else   @continue
                                                  @endif
                                                @endforeach
                                               @continue
                                               @endif
                                            @endforeach
                                       @if($var == false)
                                       <a class="name"style="text-decoration: none;color:blue;font-weight:bold" href="{{route('messages.chat', $friend->user_id)}}">{{ App\Models\User::where(['id' => $friend->user_id])->pluck('name')->first() }}</a><br>
                                       @endif
                                       <?php
                                        $last_message = [];
                                        $last_message = DB::select("CALL pr_last_message( ".Auth::User()->id.",".$friend->user_id.")");
                                        print_r(substr($last_message[0]->message_content,0,10));
                                        ?>
                                        </p>
                                           <span style="float:right">{{ date("Y-m-d H:i", strtotime($last_message[0]->created_at))}}</span>
                                    </li>
                                    @endforeach
                                    @endif
                                </ul>
                            </div>
                        </div>
                        {{-- end friends list --}}
                        {{-- start show messages --}}
                        <div class="col-xl-8 col-lg-8 col-md-8 col-sm-9 col-9">
                            <div class="selected-user">
                                <span>Chat with <span class="name">{{$friend_name}}</span></span>
                            </div>
                            <div class="chat-container">
                                <ul class="chat-box chatContainerScroll">
                                    <div class="form-group mt-3 mb-0" >
                                        <form action="{{ route('messages.store') }}" method="POST" >
                                            @csrf
                                            <input name="friend_id" value ={{$friend_id}} hidden>
                                            <textarea  rows="3" placeholder="Type your message here..." style="width:50%"class=" @error('message_content')is-danger @enderror" name="message_content" >{{ old('message_content') }}</textarea>
                                            <button class="button is-dark" style="align:center" >send</button>
                                        </form>
                                    </div>
                                    <div style="overflow:auto;height:500px">
                                    @foreach($messages as $message)
                                    @if($message->user_id == Auth::User()->id)
                                    <li class="chat-left" >
                                    <div class="chat-text" style="overflow:hidden">
                                        <input value={{$sender = $users->where('id',$message->user_id)->first()}} hidden/>
                                        <div class="chat-name">{{$sender->name}}</div>
                                        <span style="color: #000">{{$message->message_content}}</span>&nbsp;
                                        <span style="font-size: 10px">{{ date("h:i A", strtotime($message->created_at))}}</span>
                                        @if(Auth::User()->id == $message->user_id)
                                            @if($message->seen == 1)
                                                <i class="fa fa-check-double fa-xs" aria-hidden="true"></i>
                                            @else
                                                <i class="fa fa-check fa-xs" aria-hidden="true"></i>
                                            @endif
                                        @endif
                                    </div>
                                    </li>
                                    @else
                                     <li class="chat-right">
                                        <div class="chat-text" style="overflow:hidden">
                                            <input value={{$sender = $users->where('id',$message->user_id)->first()}} hidden/>
                                            <div class="chat-name">{{$sender->name}}</div>
                                            <span style="color: #000">{{$message->message_content}}</span>&nbsp;
                                            <span style="font-size: 10px">{{ date("h:i A", strtotime($message->created_at))}}</span>
                                            @if(Auth::User()->id == $message->user_id)
                                                @if($message->seen == 1)
                                                    <i class="fa fa-check-double fa-xs" aria-hidden="true"></i>
                                                @else
                                                    <i class="fa fa-check fa-xs" aria-hidden="true" ></i>
                                                @endif
                                            @endif
                                        </div>
                                      </li>
                                    @endif
                                    @endforeach
                                </div>
                                </ul>
                            </div>
                        </div>
                        {{-- end show messages --}}
                    </div>
                    <!-- Row end -->
                </div>
            </div>
        </div>
        <!-- Row end -->
    </div>
    <!-- Content wrapper end -->
</div>
</x-layouts.app>
