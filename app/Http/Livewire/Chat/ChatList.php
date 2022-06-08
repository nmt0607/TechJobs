<?php

namespace app\Http\Livewire\Chat;

use App\Http\Livewire\Base\BaseLive;
use App\Models\Message;
use App\Models\User;
use App\Notifications\MessageNotification;
use App\Events\NotificationEvent;

class ChatList extends BaseLive {

    public $selectedUser;
    public $selectedUserName;
    public $selectedUserImage;
    public $message;
    public $image;
    protected $listeners = ['sendMessage', 'updateRealtime'];

    public function mount(){
        $this->selectedUser = 2;
        $this->image=auth()->user()->image;
    }
    public function render(){
        $this->emit('scroll-bottom');
        $listMsg = auth()->user()->conversation($this->selectedUser);
        $listFriend = auth()->user()->friend();
        $this->selectedUserName = User::find($this->selectedUser)->name;
        $this->selectedUserImage = User::find($this->selectedUser)->image;
        return view('livewire.chat.chat-list', compact('listMsg', 'listFriend'));
    }  

    public function sendMessage(){
        if($this->message) {
            $message = Message::create([
                'content' => $this->message,
                'from_id' => auth()->id(),
                'to_id' => $this->selectedUser
            ]);

            auth()->user()->notify(new MessageNotification($message->id));
            event(new NotificationEvent(auth()->id()));
            $this->message = null;
        }
    }

    public function selectFriend($id){
        $this->selectedUser = $id;
    }

    public function updateRealtime(){
    }
}
