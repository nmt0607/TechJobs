<div class="container ">
<div wire:loading class="loader"></div>
    <div class="row no-gutters">
        <div class="col-md-4 border-right">
            <div class="settings-tray">
                <img class="profile-image" src="{{asset($image)}}" alt="Profile img">
                <span class="settings-tray--right">
                    <i class="fa fa-bars"></i>
                </span>
            </div>
            <div class="list-friend-chat scroll">
                @foreach($listFriend as $friend)
                @if($friend->id == $selectedUser)
                <div class="friend-drawer friend-drawer--onhover" style="background-color: white;" wire:click="selectFriend({{$friend->id}})">
                @else
                <div class="friend-drawer friend-drawer--onhover" wire:click="selectFriend({{$friend->id}})">
                @endif
                    <img class="profile-image" src="{{asset($friend->image)}}" alt="">
                    <div class="text">
                        <h6>{{$friend->name}} <span style="color:red">
                                @if($friend->countUnseenMsg)
                                ({{$friend->countUnseenMsg}})
                                @endif
                            </span></h6>
                        <p class="text-muted">{{strLimit(auth()->user()->lastMessage($friend->id))}}</p>
                    </div>
                    <span class="time text-muted small">{{auth()->user()->lastMessageTime($friend->id)}}</span>
                </div>
                <hr>
                @endforeach
            </div>
        </div>
        <div class="col-md-8">
            <div class="settings-tray">
                <div class="friend-drawer no-gutters friend-drawer--grey">
                    <img class="profile-image" src="{{asset($selectedUserImage)}}" alt="">
                    <div class="text">
                        <h6>{{$selectedUserName}}</h6>
                        <p class="text-muted">{{$selectedUserTime}}</p>
                    </div>
                    <span class="settings-tray--right">
                    </span>
                </div>
            </div>
            <div class="chat-panel">

                <ol class="chat scroll">
                    @foreach($listMsg as $msg)
                        @if($msg->from_id == auth()->id())
                        <li class="self">
                        @else
                        <li class="other">
                        @endif
                            <div class="avatar"><img src="{{asset($msg->user->image)}}" draggable="false" /></div>
                            <div class="msg mr-1 ml-1">
                                <p>{{$msg->content}}</p>
                                <time>{{$msg->created_at->format('H:i')}}</time>
                            </div>
                        </li>
                    @endforeach
                </ol>

                <div class="row">
                    <div class="col-12">
                        <div class="chat-box-tray">
                            <i class="fas fa-laugh"></i>
                            <input id='inputMsg' wire:model="message" type="text" placeholder=" Type your message here...">
                            <i class="fa fa-microphone"></i>
                            <i wire:click='sendMessage' class="fa fa-paper-plane send-message"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<br>
<script>
    $("document").ready(() => {
        $(".chat").animate({
            scrollTop: 2000
        }, 1000);
        window.livewire.on('scroll-bottom', () => {
            $(".chat").animate({
                scrollTop: 2000
            }, 1000);
        });
        $('.chat-panel').keypress(function(e) {
            var key = e.which;
            if (key == 13) // the enter key code
            {
                @this.emit('sendMessage');
            }
        });
    });
    $('.friend-drawer--onhover').on('click', function() {

        $('.chat-bubble').hide('slow').show('slow');

    });
</script>