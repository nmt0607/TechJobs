<?php

namespace app\Http\Livewire\Auth;

use App\Http\Livewire\Base\BaseLive;

class Login extends BaseLive {

    public $mode='login';

    public function mount(){
    }

    public function render(){
        return view('livewire.auth.login');
    }  

    public function changeMode($mode){
        $this->mode = $mode;
    }
}
