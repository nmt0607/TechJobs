<?php

namespace App\Http\Livewire\Component;
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
        $readNotify = Auth::user()->notifications ()->where('type', 'App\Notifications\ApplyNotification')->whereNotNull('read_at')->get();
        $notify = $unreadNotify->merge($readNotify);
        $friendChat = Auth::user()->friendChat();
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

    // public function markAsRead($notify){
    //     auth()->user()->unreadNotifications->where('id', $notify['id'])->markAsRead();
    //     if(Ticket::find($notify['data']['ticket']))
    //         return redirect()->to('/admin/ticket?p=openModalDetail&id='.$notify['data']['ticket']);
    //     else{
    //         $this->dispatchBrowserEvent('show-toast', ["type" => "info", "message" => 'Ticket không tồn tại hoặc đã bị xóa']);
    //     }
    // }

    public function updateRealtime(){
        $this->imagePath = auth()->user()->image; 
        $this->unseenNotifyCount = Auth::user()->unreadNotifications()->where('type', 'App\Notifications\ApplyNotification')->count();
        $this->unseenMessageCount = Auth::user()->unreadNotifications()->where('type', 'App\Notifications\MessageNotification')->count();
    }
}
