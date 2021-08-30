
<x-layouts.app>
<div class="container">

    <!-- Page header start -->
    <div class="page-title">
        <div class="row gutters">
            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                <h5 class="title">Chat App</h5>
            </div>
            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12"> </div>
        </div>
    </div>
    <!-- Page header end -->

    <!-- Content wrapper start -->
    <div class="content-wrapper">

        <!-- Row start -->
        <div class="row gutters">

            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">

                <div class="card m-0">

                    <!-- Row start -->
                    <div class="row no-gutters">
                        <div class="col-xl-4 col-lg-4 col-md-4 col-sm-3 col-3">
                            <div class="users-container">
                                <div class="chat-search-box">
                                    <div class="input-group">
                                        <input class="form-control" placeholder="Search">
                                        <div class="input-group-btn">
                                            <button type="button" class="btn btn-info">
                                                <i class="fa fa-search"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                                <ul class="users">
                                    @if($friends <> null)
                                    <br><span>FRIENDS</span><br>
                                    <?php $var = false ?>
                                    @foreach ($friends as $friend)
                                    <li class="person" data-chat="person1">
                                        <div class="user">
                                            <img src="https://www.bootdey.com/img/Content/avatar/avatar3.png" alt="Retail Admin">
                                            <span class="status busy"></span>
                                        </div>
                                        <p class="name-time">
                                            <?php $var = false ?>
                                            @foreach ($unread_messages as $unread_message)
                                               @if($friend->user_id == $unread_message->user_id)
                                                <a class="name"style="text-decoration: none;color:black;font-weight:bold" href="{{route('messages.chat', $unread_message->user_id)}}">{{ App\Models\User::where(['id' => $unread_message->user_id])->pluck('name')->first() }}</a>
                                                <?php $var = true ?>
                                                @foreach ($count_unread_messages as $count_unread_message)
                                                  @if($unread_message->user_id == $count_unread_message->user_id)
                                                     <span style="color:black;font-weight:bold">{{$count_unread_message->number}}</span><br>
                                                  @else
                                                   @continue
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
                                        ?><br>
                                        </p>
                                    </li>
                                    @endforeach
                                    @endif
                                    {{-- <li class="person" data-chat="person1">
                                        <div class="user">
                                            <img src="https://www.bootdey.com/img/Content/avatar/avatar1.png" alt="Retail Admin">
                                            <span class="status offline"></span>
                                        </div>
                                        <p class="name-time">
                                            <span class="name">Steve Bangalter</span>
                                            <span class="time">15/02/2019</span>
                                        </p>
                                    </li> --}}

                                </ul>
                            </div>
                        </div>
                        <div class="col-xl-8 col-lg-8 col-md-8 col-sm-9 col-9">
                            <div class="selected-user">
                                <span>Chat with <span class="name">{{$friend_name}}</span></span>

                            </div>
                            <div class="chat-container">
                                <ul class="chat-box chatContainerScroll">
                                    <li class="chat-left">
                                        <div class="chat-avatar">
                                            <img src="https://www.bootdey.com/img/Content/avatar/avatar3.png" alt="Retail Admin">
                                            <div class="chat-name">{{$sender->name}}</div>
                                        </div>
                                        <div class="chat-text">Hello, I'm Russell.
                                            <br>How can I help you today?</div>
                                        <div class="chat-hour">08:55 <span class="fa fa-check-circle"></span></div>
                                    </li>
                                    <li class="chat-right">
                                        <div class="chat-hour">08:56 <span class="fa fa-check-circle"></span></div>
                                        <div class="chat-text">Hi, Russell
                                            <br> I need more information about Developer Plan.</div>
                                        <div class="chat-avatar">
                                            <img src="https://www.bootdey.com/img/Content/avatar/avatar3.png" alt="Retail Admin">
                                            <div class="chat-name">Sam</div>
                                        </div>
                                    </li>
                                    <li class="chat-left">
                                        <div class="chat-avatar">
                                            <img src="https://www.bootdey.com/img/Content/avatar/avatar3.png" alt="Retail Admin">
                                            <div class="chat-name">Russell</div>
                                        </div>
                                        <div class="chat-text">Are we meeting today?
                                            <br>Project has been already finished and I have results to show you.</div>
                                        <div class="chat-hour">08:57 <span class="fa fa-check-circle"></span></div>
                                    </li>


                                </ul>
                                <div class="form-group mt-3 mb-0">
                                    <textarea class="form-control" rows="3" placeholder="Type your message here..."></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Row end -->
                </div>

            </div>

        </div>
        <!-- Row end -->

    </div>
    <!-- Content wrapper end -->

</div>
<x-layouts.app>
