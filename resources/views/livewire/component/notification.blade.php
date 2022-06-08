<ul class="navbar-nav ml-auto">
    <!-- Navbar Search -->
    
    <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown">
            <i class="far fa-comments" style="font-size: 17px;"></i>
            <span class="badge badge-danger navbar-badge">{{$unseenMessageCount}}</span>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right notification scroll">
        <span style="position: sticky;
top: 0; background-color: white" class="dropdown-item dropdown-header">{{$unseenMessageCount}} Message</span>
            <div class="dropdown-divider"></div>
            @foreach($friendChat as $friend)
            <a href="#" class="dropdown-item">
                <!-- Message Start -->
                <div class="media">
                    <img src="/dist/img/user1-128x128.jpg" alt="User Avatar" class="img-size-50 mr-3 img-circle">
                    <div class="media-body">
                        <h3 class="dropdown-item-title">
                            {{$friend->name}}
                            <span class="float-right text-sm text-danger"><i class="fas fa-star"></i></span>
                        </h3>
                        <p class="text-sm">{{auth()->user()->lastMessage($friend->id)->content}}</p>
                        <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i>{{auth()->user()->lastMessage($friend->id)->created_at->diffForHumans()}}</p>
                    </div>
                </div>
                <!-- Message End -->
            </a>
            <div class="dropdown-divider"></div>
            @endforeach
            
            <a href="#" class="dropdown-item dropdown-footer">See All Messages</a>
        </div>
    </li>
    <!-- Notifications Dropdown Menu -->
    <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown">
            <i class="far fa-bell" style="font-size: 17px;"></i>
            <span class="badge badge-warning navbar-badge">{{$unseenNotifyCount}}</span>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right notification scroll" style="min-width: 400px" >
            <span style="position: sticky;
top: 0; background-color: white" class="dropdown-item dropdown-header">{{$unseenNotifyCount}} Notifications</span>
            @foreach($notify as $notify)
            <div class="dropdown-divider"></div>
            <a href="#" class="dropdown-item" style="padding-top:10px; padding-bottom:10px;">
                <i class="fas fa-envelope mr-2"></i> {{$notify->data['job']}}
                <span class="float-right text-muted text-sm">{{ $notify->created_at ? $notify->created_at->diffForHumans() : '' }}</span>
            </a>
            @endforeach
            <div class="dropdown-divider"></div>
            <a href="#" class="dropdown-item dropdown-footer">See All Notifications</a>
        </div>
    </li>
    <li class="nav-item">
        <a class="nav-link" data-widget="fullscreen" href="#" role="button">
            <i class="fas fa-expand-arrows-alt"></i>
        </a>
    </li>
    <li class="nav-item" style='margin-right:-13px !important;'>
      <img id='userImage' src="{{asset($imagePath)}}"  class="img-circle" style="opacity: 1.0;width:35px; margin-top: 6px;" />
    </li>
    <li class="dropdown dropdown-user">
        <a class="nav-link dropdown-toggle link" data-toggle="dropdown">
        <span id='userName'>{{Auth()->user()->name??''}}</span></a>
        <ul class="dropdown-menu dropdown-menu-right">
            <a class="dropdown-item" href="" style='font-size:14px; color:#6D7C85'><i class="fa fa-user mr-2"></i>Trang cá nhân</a>
            {{--<a class="dropdown-item" href=""><i class="fa fa-support"></i>Hỗ trợ</a> --}}
            <li class="dropdown-divider"></li>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
              @csrf
            </form>
            <a class="dropdown-item" style='font-size:14px; color:#6D7C85' href='javascript:void(0);' id='logout' onclick="event.preventDefault();
                              document.getElementById('logout-form').submit();"><i class="fa fa-power-off mr-2" ></i>Đăng xuất</a>
        </ul>
    </li>
</ul>
<script src="{{asset('/js/pusher.min.js')}}"></script>
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