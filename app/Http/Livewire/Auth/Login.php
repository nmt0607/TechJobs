<?php

namespace app\Http\Livewire\Auth;

use App\Http\Livewire\Base\BaseLive;

class Login extends BaseLive {

    public $mode;
    public $email;
    public $password;
    public $name;
    public $password_confirmation;

    public function mount(){
        $this->mode = session('mode')??'login';
        if(isset($_GET['mode'])){
            $this->mode = $_GET['mode'];
        }
    }

    public function render(){
        return view('livewire.auth.login');
    }  

    public function changeMode($mode){
        $this->mode = $mode;
        session(['mode' => $mode]);
        $this->resetData();
    }

    // public function check(){
    //     dd('a');
    //     if($this->mode=='register'){
    //         $this->validate([
    //             'email' => 'required|email',
    //             'password' => 'required|min:6',
    //         ],[
    //             'email.required' => 'Trường này không được bỏ trống',
    //             'password.required' => 'Trường này không được bỏ trống',
    //         ],[]);
    //         $this->emit('register');
    //     }
    // }

    public function resetData(){
        $this->name = '';
        $this->email = '';
        $this->password = '';
        $this->password_confirmation = '';
        $this->resetValidation();
    }
}
