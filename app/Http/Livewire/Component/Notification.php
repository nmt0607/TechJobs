<?php

namespace App\Http\Livewire\Component;

use Exception;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class Notification extends Component
{
    public $listeners = ['updateRealtime'];
    public $unseenNotifyCount;
    public $unseenMessageCount;
    public $imagePath;

    public function mount(){
        $this->imagePath = auth()->user()->image; 
        $this->unseenNotifyCount = Auth::user()->unreadNotifications()->where('type', 'App\Notifications\ApplyNotification')->count();
        $this->unseenMessageCount = Auth::user()->unreadNotifications()->where('type', 'App\Notifications\MessageNotification')->count();
    }

    public function render(){
        \Carbon\Carbon::setLocale('vi');
        $unreadNotify = Auth::user()->unreadNotifications()->where('type', 'App\Notifications\ApplyNotification')->get();
        
        $readNotify = Auth::user()->notifications()->where('type', 'App\Notifications\ApplyNotification')->whereNotNull('read_at')->get();
        $notify = $unreadNotify->merge($readNotify);
        try{
            $friendChat = Auth::user()->friendChat();
            foreach($friendChat as $friend){
                $friend->countUnseenMsg = auth()->user()->countUnseenMsg($friend->id);
            }
        } catch(Exception $e){
            $friendChat=[];
        }
        return view('livewire.component.notification', compact('notify', 'friendChat'));
    }

    // public function markAllAsRead(){
    //     Auth::user()->unreadNotifications()->where('type', 'App\Notifications\TicketNotification')->update(['read_at' => now()]);
    //     $this->assignTicketNotifyCount = 0;
    // }

    // public function markAllAsReadComment(){
    //     Auth::user()->unreadNotifications()->where('type', 'App\Notifications\CommentTicketNotification')->update(['read_at' => now()]);
    //     $this->assignTicketNotifyCount = 0;
    //     $this->commentTicketNottifyCount = 0;
    // }

    public function readNotify($notify){
        auth()->user()->unreadNotifications->where('id', $notify['id'])->markAsRead();
        return redirect()->to($notify['data']['route']);
    }

    public function updateRealtime(){
        $this->imagePath = auth()->user()->image; 
        $this->unseenNotifyCount = Auth::user()->unreadNotifications()->where('type', 'App\Notifications\ApplyNotification')->count();
        $this->unseenMessageCount = Auth::user()->unreadNotifications()->where('type', 'App\Notifications\MessageNotification')->count();
    }
}
