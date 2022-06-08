<?php

namespace app\Http\Livewire\User;

use App\Http\Livewire\Base\BaseLive;
use App\Models\Job;
use App\Models\Tag;
use App\Models\User;
use Illuminate\Database\Eloquent\Builder;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UserInfo extends BaseLive {
    use WithFileUploads;

    public $user;
    public $imageUpload;
    public $imagePath;
    public $tagSelect = [];
    public $name;
    public $phone;
    public $email;
    public $date;
    public $sex;
    public $password;
    public $level;
    public $exp;
    public $type;
    public $status;
    public $type_job;
    public $salary;
    public $province_id;
    public $address;
    public $oldPassword;
    public $newPassword;
    public $confirmPassword;

    public $listeners = ['resetData'];
    
    public function mount(){
        $this->user = auth()->user();
        $this->imagePath = auth()->user()->image;
        $this->tags = Tag::all();
        $this->tagSelect = $this->user->tags->pluck('id')->toArray();
    }

    public function render(){  
        $user = $this->user;
        $this->name = $user->name;
        $this->phone = $user->phone;
        $this->email = $user->email;
        $this->date = $user->date;
        $this->sex = $user->sex;
        $this->password = $user->password;
        $this->level = $user->level;
        $this->exp = $user->exp;
        $this->type = $user->type;
        $this->status = $user->status;
        $this->type_job = $user->type_job;
        $this->salary = $user->salary;
        $this->province_id = $user->province_id;
        $this->address = $user->address;
        return view('livewire.user.user-info', compact($user));
    }  

    public function updatedImageUpload(){
        $this->imagePath = 'storage/'.$this->imageUpload->storeAs('uploads/image', $this->imageUpload->getFilename(), 'local');
    }

    public function update(){
        $user = $this->user;
        $user->name = $this->name;
        $user->phone = $this->phone;
        $user->date = $this->date;
        $user->sex = $this->sex;
        $user->password = $this->password;
        $user->level = $this->level;
        $user->exp = $this->exp;
        $user->type = $this->type;
        $user->status = $this->status;
        $user->type_job = $this->type_job;
        $user->salary = $this->salary;
        $user->province_id = $this->province_id;
        $user->address = $this->address;
        $user->image = $this->imagePath;
        $user->save();
        $user->tags()->sync($this->tagSelect);
        $this->emit('updateRealtime');
    }

    public function changePassword(){
        $this->validate([
            'oldPassword' => 'required|password_verify',
            'newPassword' => 'required|min:6',
            'confirmPassword' => 'required|same:newPassword',
        ],[
            'oldPassword.required' => 'Trường này không được bỏ trống',
            'newPassword.required' => 'Trường này không được bỏ trống',
            'newPassword.min' => 'Mật khẩu không được ít hơn 6 kí tự',
            'confirmPassword.required' => 'Trường này không được bỏ trống',
            'confirmPassword.same' => 'Mật khẩu không khớp',
        ],[]);

        auth()->user()->update(['password' => Hash::make($this->newPassword)]);
        $this->emit('close-modal');
    }

    public function resetData(){
        $this->resetValidation();
        $this->oldPassword='';
        $this->newPassword='';
        $this->confirmPassword='';
    }
}
