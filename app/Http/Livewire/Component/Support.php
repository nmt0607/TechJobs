<?php

namespace App\Http\Livewire\Component;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use App\Models\Mail;

class Support extends Component
{
    public $mail;

    public function render(){
        return view('livewire.component.support');
    }

    public function notify(){
        Mail::firstOrCreate(['mail' => $this->mail]);
        $this->mail= '';
        $this->dispatchBrowserEvent('show-toast', ["type" => "success", "message" => 'Đăng ký nhận tin thành công']);
    }
}
