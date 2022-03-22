<?php

namespace app\Http\Livewire\Admin\Role;

use Livewire\Component;
use App\Http\Livewire\Base\BaseLive;
use Spatie\Permission\Models\Role;
use Excel;
use App\Exports\RoleExport;
use App\Models\User;

class Index extends BaseLive {

    public $mode = 'create';
    public $editId;
    public $deleteId;
    public $key_name='id', $sortingName='desc';
    public $name;
    public $guard_name;
    public $description;
    public $userList = [];
    public $listSelected = [];
    public $userAssign = [];


    protected $rules = [
        'name' => 'required'
    ];

    protected $messages = [
        'name.required' => 'Tên nhóm người dùng bắt buộc'
    ];


    public $search;
    public $searchName;
    public $searchDescription;


    public function mount(){
        $this->perPage = 50;
        $this->userList = User::all();
    }

    public function render(){
        $query = Role::query();
        if($this->search) {
            $query = $query->where(function ($query) {
                $query->where("name", "like", "%".$this->search."%")->orWhere('description', 'like', '%'.$this->search.'%');
            });
        }

        if($this->searchName) {
            $query->where("name", "like", "%".$this->searchName."%");
        }
        if($this->searchDescription) {
            $query->where("description", "like", "%".$this->searchDescription."%");
        }

        $data = $query->orderBy($this->key_name,$this->sortingName)->paginate($this->perPage);
        return view('livewire.admin.role.index', [
            'data'=> $data,
        ]);
    }

    public function updatedSearch(){
        $this->resetPage();
    }

    public function resetValidate(){
        $this->name = "";
        $this->description = "";
        $this->listSelected = [];
        $this->userAssign = [];
        $this->resetValidation();
    }

    public function create (){
        $this->mode = 'create';
    }

    public function saveData (){
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
        if ($this->listSelected) {
            foreach ($this->listSelected as $user_id => $value) {
                $user = User::findorfail($user_id);
                if ($value == true) {
                    if (!$user->hasRole($role)) {
                        $user->assignRole($role);
                    }
                } else {
                    $user->removeRole($role);
                }
            }
        }
        $this->resetValidate();
        if($this->mode=='create'){
            $this->dispatchBrowserEvent('show-toast', ["type" => "success", "message" => 'Thêm mới thành công']);
        }
        else {
            $this->dispatchBrowserEvent('show-toast', ["type" => "success", "message" => 'Chỉnh sửa thành công']);
        }
        $this->emit('closeModalCreateEdit');
    }

    public function edit($row){
        $this->mode = 'update';
        $this->editId = $row['id'];
        $this->name = $row["name"];
        $this->description = $row["description"] ??'';
        foreach ($this->userList as $user) {
            if ($user->hasRole($row['id'])) {
                $this->listSelected[$user->id] = true;
                $this->userAssign[] = $user;
            }
        }
    }

    public function standardData(){
        $this->name = trim($this->name);
        $this->description = trim($this->description);

    }

    public function delete(){
        Role::find($this->deleteId)->delete();
        $this->dispatchBrowserEvent('show-toast', ["type" => "success", "message" => 'Xóa thành công']);
    }

    public function resetSearch(){
        $this->search = "";
        $this->searchName = "";
        $this->searchDescription = "";
        $this->reset('key_name');
        $this->reset('sortingName');
    }

    public function export(){
        $today = date("d_m_Y");
        return Excel::download(new RoleExport($this->key_name, $this->sortingName, $this->search, $this->searchName, $this->searchDescription), "Role-export-".$today.".xlsx");
    }

    public function sorting($key){
        if($this->key_name == $key){
            $this->sortingName = $this->getSortName();
        } else {
            $this->sortingName ='desc';
        }
        $this->key_name = $key;
    }
    public function getSortName(){
        return $this->sortingName == "desc" ? "asc" : "desc";
    }

    public function saveListUser() {
        $this->emit('closeModalUsers');
        // dd ($this->listSelected);
    }

    public function unAssignUser($id) {
        $user = User::findorfail($id);
        $role = Role::findorfail($this->editId);
        $user->removeRole($role);
    }
    
}
