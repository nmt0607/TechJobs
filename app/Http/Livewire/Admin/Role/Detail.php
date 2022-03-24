<?php

namespace App\Http\Livewire\Admin\Role;

use App\Http\Livewire\Base\BaseLive;
use App\Models\User;
use App\Models\UserCategory;
use Spatie\Permission\Models\Permission;
use App\Models\Role;

class Detail extends BaseLive
{
    public $mode, $editId;
    public $users, $permissions, $usercategories;
    public $selectedPermissions = [], $selectedUsers = [], $selectedUserCategories = [];
    public $name, $description;

    public function mount($mode, $editId = 0) {
        $this->mode = $mode;
        $this->editId = $editId;
        if ($this->editId) {
            $role = Role::query()->findorfail($editId);
            $this->name = $role->name;
            $this->description = $role->description;
            $this->selectedPermissions = $role->permissions->pluck('id')->toArray();
            $this->selectedUsers = $role->users->pluck('id')->toArray();
            $this->selectedUserCategories = $role->categories->pluck('id')->toArray();
        } else {
            
        }

        $this->permissions = Permission::query()->get()->groupBy('alias')->map(function ($item) {
            return $item->groupBy('alias');
        })->toArray();
        $this->users = User::all();
        $this->usercategories = UserCategory::all();

        
    }

    public function render()
    {
        return view('livewire.admin.role.detail');
    }

    protected $rules = [
        'name' => 'required',
    ];

    protected $messages = [
        'name.required' => 'Tên phân quyền bắt buộc',
    ];

    public function save() {
        $this->standardData();
        $this->validate();
        if($this->mode=='create'){
            $role = Role::create([
                "name" => $this->name,
                "guard_name" => 'web',
                "description" => $this->description,
            ]);
        }
        else {
            Role::findorfail($this->editId)->update([
                "name" => $this->name,
                "description" => $this->description,
            ]);
            $role = Role::findorfail($this->editId);
        }

        $role->syncPermissions($this->selectedPermissions);
        $role->users()->sync($this->selectedUsers);
        $role->categories()->sync($this->selectedUserCategories);
        // foreach
        if($this->mode=='create'){
            $this->dispatchBrowserEvent('show-toast', ["type" => "success", "message" => 'Thêm mới thành công']);
        }
        else {
            $this->dispatchBrowserEvent('show-toast', ["type" => "success", "message" => 'Chỉnh sửa thành công']);
        }
        return redirect()->route('admin.role.index');
    }

    public function standardData(){
        $this->name = trim($this->name);
        $this->description = trim($this->description);
    }

    public function saveListUser() {
        $this->emit('closeModalUsers');
    }

    public function saveListUserCategories() {
        $this->emit('closeModalUserCategories');
    }
}
