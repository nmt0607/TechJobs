<ul class="navbar-nav ml-auto">
    <!-- Navbar Search -->

    <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" style="cursor: pointer">
            <i class="far fa-comments" style="font-size: 17px;"></i>
            <span class="badge badge-danger navbar-badge">{{$unseenMessageCount?$unseenMessageCount:''}}</span>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right notification scroll">
            <span style="position: sticky;
top: 0; background-color: white" class="dropdown-item dropdown-header">{{$unseenMessageCount?($unseenMessageCount." tin nhắn chưa đọc"):"Không có tin nhắn mới"}} </span>
            <div class="dropdown-divider"></div>
            @forelse($friendChat as $friend)
            <a href="{{route('chat', ['userId' => $friend->id])}}" class="dropdown-item">
                <!-- Message Start -->
                <div class="media">
                    <img src="{{asset($friend->image)}}" alt="User Avatar" class="img-size-50 mr-3 img-circle">
                    <div class="media-body">
                        <h3 class="dropdown-item-title">
                            <b style="font-weight: 420">{{$friend->name}}</b> <span style="color:red">
                                @if($friend->countUnseenMsg)
                                ({{$friend->countUnseenMsg}})
                            </span>
                            <span class="float-right text-sm text-danger"><i class="fas fa-star"></i></span>
                            @endif
                        </h3>
                        <p class="text-sm">{{strLimit(auth()->user()->lastMessage($friend->id))}}</p>
                        <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i>{{auth()->user()->lastMessageTimeDiff($friend->id)}}</p>
                    </div>
                </div>
                <!-- Message End -->
            </a>
            <div class="dropdown-divider"></div>
            @empty
            @endforelse
            <center><a style="cursor: pointer" wire:click='markAllAsReadMsg' class="dropdown-item dropdown-footer">Đánh dấu tất cả là đã đọc</a></center>
        </div>
    </li>
    <!-- Notifications Dropdown Menu -->
    <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown">
            <i class="far fa-bell" style="font-size: 17px;"></i>
            <span class="badge badge-warning navbar-badge">{{$unseenNotifyCount?$unseenNotifyCount:''}}</span>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right notification scroll" style="min-width: 400px">
            <span style="position: sticky;
top: 0; background-color: white; z-index:1;" class="dropdown-item dropdown-header">{{$unseenNotifyCount?($unseenNotifyCount." thông báo chưa đọc"):"Không có thông báo mới"}}</span>
            @foreach($notify as $notify)
            <div class="dropdown-divider"></div>
            <a style="cursor: pointer"  wire:click="readNotify({{$notify}})" class="dropdown-item" style="padding-top:10px; padding-bottom:10px;">
                <div class="row">
                    <div class="col-md-1">
                        @switch($notify->data['result'])
                            @case(1)
                            <img style="width: 30px; height:30px" src="{{asset('img/apply.svg')}}">
                            @break
                            @case(2)
                            <i class="fas fa-check mt-2" style="margin-left: 2px"></i>
                            @break
                            @case(3)
                            <img class='mt-2' style="width: 20px; height:20px" src="{{asset('img/reject.png')}}">
                            @break
                            @case(4)
                            <img class='mt-2' style="width: 20px; height:20px" src="{{asset('img/finish.png')}}">
                            @break
                        @endswitch
                    </div>
                    <div class="col-md-11">
                        <b style="font-weight: 420">{{$notify->data['job']}}</b>
                        @if(!$notify->read_at)
                        <span class="float-right text-sm text-danger"><i class="fas fa-star"></i></span>
                        @endif
                        <p class="text-sm">{{$notify->data['notify']}}</p>

                    </div>
                </div>
                <span class="float-right text-muted text-sm">{{ $notify->created_at ? $notify->created_at->diffForHumans() : '' }}</span>

            </a>
            @endforeach
            <div class="dropdown-divider"></div>
            <center><a style="cursor: pointer" wire:click='markAllAsRead' class="dropdown-item dropdown-footer">Đánh dấu tất cả là đã đọc</a></center>
        </div>
    </li>
    &nbsp;&nbsp;&nbsp;
    <li class="nav-item" style='margin-right:-13px !important;'>
        <img id='userImage' src="{{asset($imagePath)}}" class="img-circle" style="opacity: 1.0;width:35px; margin-top: 6px;" />
    </li>
    <li class="dropdown dropdown-user">
        <a class="nav-link dropdown-toggle link" data-toggle="dropdown">
            <span id='userName'>{{Auth()->user()->name??''}}</span></a>
        <ul class="dropdown-menu dropdown-menu-right">
            <a href="{{route('user.info', ['id' => auth()->id()])}}" class="dropdown-item" href="" style="font-size:14px; color:#6D7C85; padding-top:10px; padding-bottom:10px;"><i class="fa fa-user mr-2"></i>Trang cá nhân</a>
            <div class="dropdown-divider"></div>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
            </form>
            <a class="dropdown-item" style='font-size:14px; color:#6D7C85; padding-top:10px; padding-bottom:10px;' href='javascript:void(0);' id='logout' onclick="event.preventDefault();
                              document.getElementById('logout-form').submit();"><i class="fa fa-power-off mr-2"></i>Đăng xuất</a>
        </ul>
    </li>
</ul>
<script src="/js/pusher.min.js"></script>
<script>
    //Thay giá trị PUSHER_APP_KEY vào chỗ xxx này nhé
    Pusher.logToConsole = true;
    var pusher = new Pusher("6f774f042487109efc9c", {
        cluster: "ap1"
    });

    // Subscribe to the channel we specified in our Laravel Event
    var channel = pusher.subscribe('send-notify{{ auth()->id() }}');

    // Bind a function to a Event (the full Laravel class)
    channel.bind('notify-event', function() {
        @this.emit('updateRealtime');
    });
</script>