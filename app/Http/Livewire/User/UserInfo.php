<?php

namespace app\Http\Livewire\User;

use App\Http\Livewire\Base\BaseLive;
use App\Models\Job;
use App\Models\Tag;
use Illuminate\Database\Eloquent\Builder;

class UserInfo extends BaseLive {

    public function mount(){
    }

    public function render(){
        return view('livewire.user.user-info');
    }  
}
