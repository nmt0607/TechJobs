<div class="container ">
    <div class="row no-gutters">
        <div class="col-md-4 border-right">
            <div class="settings-tray">
                <img class="profile-image" src="https://www.clarity-enhanced.net/wp-content/uploads/2020/06/filip.jpg" alt="Profile img">
                <span class="settings-tray--right">
                    <i class="fa fa-bars"></i>  
                </span>
            </div>
            <div class="list-friend-chat scroll">
                @foreach($listFriend as $friend)
                    <div class="friend-drawer friend-drawer--onhover" wire:click="selectFriend({{$friend->id}})">
                        <img class="profile-image" src="https://www.clarity-enhanced.net/wp-content/uploads/2020/06/robocop.jpg" alt="">
                        <div class="text">
                            <h6>{{$friend->name}}</h6>
                            <p class="text-muted">Hey, you're arrested!</p>
                        </div>
                        <span class="time text-muted small">13:21</span>
                    </div>
                    <hr>
                @endforeach
            </div>
        </div>
        <div class="col-md-8">
            <div class="settings-tray">
                <div class="friend-drawer no-gutters friend-drawer--grey">
                    <img class="profile-image" src="https://www.clarity-enhanced.net/wp-content/uploads/2020/06/robocop.jpg" alt="">
                    <div class="text">
                        <h6>{{$selectedUserName}}</h6>
                        <p class="text-muted">Layin' down the law since like before Christ...</p>
                    </div>
                    <span class="settings-tray--right">
                    </span>
                </div>
            </div>
            <div class="chat-panel">
                <div class="list-msg scroll">
                    @foreach($listMsg as $msg)
                        <div class="row no-gutters">
                            @if($msg->from_id == auth()->id())
                                <div class="col-md-3 offset-md-9">     
                                    <div class="chat-bubble chat-bubble--right">
                                        {{$msg->content}}
                                    </div>
                                </div>
                            @else
                                <div class="col-md-3">
                                    <div class="chat-bubble chat-bubble--left">
                                        {{$msg->content}}
                                    </div>
                                </div>
                            @endif
                        </div>
                    @endforeach
                </div>
                
                <div class="row">
                    <div class="col-12">
                        <div class="chat-box-tray">
                            <i class="fa fa-smile"></i>
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
    $(".list-msg").animate({ scrollTop: 2000 }, 1000);
    window.livewire.on('scroll-bottom', () => {
        $(".list-msg").animate({ scrollTop: 2000  }, 1000);
    });
    $('#inputMsg').keypress(function (e) {
    var key = e.which;
    if(key == 13)  // the enter key code
        {
            @this.emit('sendMessage');
        }
        });   
    });
$( '.friend-drawer--onhover' ).on( 'click',  function() {
  
  $( '.chat-bubble' ).hide('slow').show('slow');
  
});
</script>