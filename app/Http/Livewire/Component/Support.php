<?php

namespace App\Http\Livewire\Component;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use App\Models\Mail;
use Illuminate\Support\Facades\Validator;

class Support extends Component
{
    public $mail;

    public function render(){
        return view('livewire.component.support');
    }

    public function notify(){
        if(!$this->mail){
        return;
        }
        $data['mail'] = $this->mail;
        $validator = Validator::make($data, [
            'mail' => 'email'
        ]);
        if($validator->fails()){
            $this->dispatchBrowserEvent('show-toast', ["type" => "error", "message" => 'Email không đúng định dạng']);
            return;
        }
        Mail::firstOrCreate(['mail' => $this->mail]);
        $this->mail= '';
        $this->dispatchBrowserEvent('show-toast', ["type" => "success", "message" => 'Đăng ký nhận tin thành công']);
    }
}
