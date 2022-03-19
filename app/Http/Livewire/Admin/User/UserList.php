<?php

namespace App\Http\Livewire\Admin\User;

use App\Http\Livewire\Base\BaseLive;
use App\Models\User;
use App\Models\Role;
use Livewire\Component;

class UserList extends BaseLive
{
    public $searchName;
    public $searchEmail;
    public function render()
    {
        if($this->reset){
            $this->reset=null;
            $this->searchName = null;
            $this->searchEmail = null;
        }
        $this->searchName = trim($this->searchName); 
        $this->searchEmail = trim($this->searchEmail); 
        $query = User::query();
        if($this->searchName){
            $query->where('users.name','like','%'.$this->searchName.'%');
        }
        if($this->searchEmail){
            $query->where('users.email','like','%'.$this->searchEmail.'%');
        }
        $users = $query->paginate(10);
        $roles = Role::pluck('id');
        foreach ($users as $user) {
            $user->roleDontBelongto = $roles->diff($user->roles()->get()->pluck('id'));
            $user->roleDontBelongto = Role::find($user->roleDontBelongto);
        }
        return view('livewire.admin.user.user-list', ['data'=>$users]);
    }

    public function updatedSearchName()
    {
        $this->resetPage();
    }

    public function updatedSearchEmail()
    {
        $this->resetPage();
    }

    
    public function resetSearch()
    {
        $this->searchName="";
        $this->searchEmail="";
    }

    public function delete(){
        $user = User::findOrFail($this->deleteId);
        $user->delete();
        $this->dispatchBrowserEvent('show-toast', ['type' => 'success', 'message' => 'Xóa người dùng thành công']);
    }
}
