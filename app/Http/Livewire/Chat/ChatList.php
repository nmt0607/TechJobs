<?php

namespace app\Http\Livewire\Chat;

use App\Http\Livewire\Base\BaseLive;
use App\Models\Message;
use App\Models\User;
use App\Notifications\MessageNotification;
use App\Events\NotificationEvent;

class ChatList extends BaseLive
{

    public $selectedUser;
    public $selectedUserName;
    public $selectedUserImage;
    public $message;
    public $image;
    protected $listeners = ['sendMessage', 'updateRealtime'];

    public function mount()
    {
        if(isset($_GET['userId'])){
            $this->selectFriend($_GET['userId']);
        }
        else{
            $this->selectFriend(auth()->user()->friend()->first()->id ?? null);
        }
        $this->image = auth()->user()->image;
    }
    public function render()
    {
        $this->emit('scroll-bottom');
        
        $listMsg = auth()->user()->conversation($this->selectedUser);
        $listFriend = auth()->user()->friend();
        foreach($listFriend as $friend){
            $friend->countUnseenMsg = auth()->user()->countUnseenMsg($friend->id);
        }
        $this->selectedUserName = User::find($this->selectedUser)->name??'';
        $this->selectedUserImage = User::find($this->selectedUser)->image??'';
        return view('livewire.chat.chat-list', compact('listMsg', 'listFriend'));
    }

    public function sendMessage()
    {
        if ($this->message) {
            $message = Message::create([
                'content' => $this->message,
                'from_id' => auth()->id(),
                'to_id' => $this->selectedUser
            ]);
            
            User::find($this->selectedUser)->notify(new MessageNotification($message->id));
            event(new NotificationEvent($this->selectedUser));
            $this->message = null;
            $msgNotify = auth()->user()->unreadNotifications()->where('type', 'App\Notifications\MessageNotification')->where('data', 'like', '%"fromId":' . $this->selectedUser . '%')->get();
            foreach ($msgNotify as $notify) {
                $notify->markAsRead();
            }
            $this->emit('updateRealtime');
        }
    }

    public function selectFriend($id)
    {
        if ($id) {
            $this->selectedUser = $id;
            $msgNotify = auth()->user()->unreadNotifications()->where('type', 'App\Notifications\MessageNotification')->where('data', 'like', '%"fromId":' . $this->selectedUser . '%')->get();
            foreach ($msgNotify as $notify) {
                $notify->markAsRead();
            }
            $this->emit('updateRealtime');
        }
    }

    public function updateRealtime()
    {
    }
}
