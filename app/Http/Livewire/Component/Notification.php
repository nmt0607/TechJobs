<?php

namespace App\Http\Livewire\Component;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class Notification extends Component
{
    public $listeners = ['sendNotify'];
    public $unseenNotifyCount;
    public $unseenMessageCount;

    public function mount(){
        $this->unseenNotifyCount = Auth::user()->unreadNotifications()->where('type', 'App\Notifications\ApplyNotification')->count();
        // $this->unseenMessageCount = Auth::user()->unreadNotifications()->where('type', 'App\Notifications\CommentTicketNotification')->count();
    }

    public function render(){
        \Carbon\Carbon::setLocale('vi');
        $unreadNotify = Auth::user()->unreadNotifications()->where('type', 'App\Notifications\ApplyNotification')->get();
        $readNotify = Auth::user()->notifications ()->where('type', 'App\Notifications\ApplyNotification')->whereNotNull('read_at')->get();
        $notify = $unreadNotify->merge($readNotify);
        return view('livewire.component.notification', compact('notify'));
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

    public function sendNotify(){
        $this->unseenNotifyCount = Auth::user()->unreadNotifications()->where('type', 'App\Notifications\ApplyNotification')->count();
    }
}
