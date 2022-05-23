<?php

namespace app\Http\Livewire\Chat;

use App\Http\Livewire\Base\BaseLive;
use App\Models\Job;
use App\Models\Tag;
use App\Models\Chat;
use App\Models\Message;
use App\Models\User;
use Illuminate\Database\Eloquent\Builder;

class ChatList extends BaseLive {

    public $selectedUser;
    public $selectedUserName;
    public $message;
    protected $listeners = ['sendMessage'];

    public function mount(){
        $this->selectedUser = 2;
    }

    public function render(){
        $this->emit('scroll-bottom');
        $listMsg = auth()->user()->conversation($this->selectedUser);
        $listFriend = auth()->user()->friend();
        $this->selectedUserName = User::find($this->selectedUser)->name;
        return view('livewire.chat.chat-list', compact('listMsg', 'listFriend'));
    }  

    public function sendMessage(){
        if($this->message) {
            Message::create([
                'content' => $this->message,
                'from_id' => auth()->id(),
                'to_id' => $this->selectedUser
            ]);
            $this->message = null;
        }
    }

    public function selectFriend($id){
        $this->selectedUser = $id;
    }
}
