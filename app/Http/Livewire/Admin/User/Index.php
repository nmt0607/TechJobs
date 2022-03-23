<?php

namespace app\Http\Livewire\Admin\User;

use Livewire\Component;
use App\Http\Livewire\Base\BaseLive;
use App\Models\User;
use Excel;
use App\Exports\UserExport;


class Index extends BaseLive {

    public $mode = 'create';
    public $editId;
    public $deleteId;
    public $key_name='id', $sortingName='desc';
    public $name;
    public $account;
    public $phone;
    public $email;
    public $date;
    public $sex;
    public $department;


    protected $rules = [
        'name' => 'required',
        'account' => 'required',
        'phone' => 'required',
        'email' => 'required',
        'date' => 'required',
        'sex' => 'required',
        'department' => 'required',
    ];

    protected $messages = [
        'name.required' => 'Họ và tên bắt buộc',
        'account.required' => 'Tài khoản bắt buộc',
        'phone.required' => 'SĐT bắt buộc',
        'email.required' => 'Email bắt buộc',
        'date.required' => 'Ngày sinh bắt buộc',
        'sex.required' => 'Giới tính bắt buộc',
        'department.required' => 'Đơn vị bắt buộc',
    ];


    public $search;
    public $searchName;
    public $searchAccount;
    public $searchPhone;
    public $searchEmail;
    public $searchSex;


    public function mount(){
        $this->perPage = 50;
    }

    public function render(){
        $query = User::query();

        if($this->searchName) {
            $query->where("name", "like", "%".$this->searchName."%");
        }
        if($this->searchAccount) {
            $query->where("account", "like", "%".$this->searchAccount."%");
        }
        if($this->searchPhone) {
            $query->where("phone", "like", "%".$this->searchPhone."%");
        }
        if($this->searchEmail) {
            $query->where("email", "like", "%".$this->searchEmail."%");
        }
        if($this->searchSex) {
            $query->where("sex", "like", "%".$this->searchSex."%");
        }

        $data = $query->orderBy($this->key_name,$this->sortingName)->paginate($this->perPage);
        return view('livewire.admin.user.index', [
            'data'=> $data,
        ]);
    }

    public function updatedSearch(){
        $this->resetPage();
    }

    public function resetValidate(){
        $this->name = "";
        $this->account = "";
        $this->phone = "";
        $this->email = "";
        $this->date = "";
        $this->sex = "";
        $this->department = "";
        $this->resetValidation();
    }

    public function create (){
        $this->mode = 'create';
    }

    public function saveData (){
        $this->standardData();
        $this->validate();
        if($this->mode=='create'){
            User::create([
                "name" => $this->name,
                "account" => $this->account,
                "phone" => $this->phone,
                "email" => $this->email,
                "date" => $this->date,
                "sex" => $this->sex,
                "department" => $this->department,
            ]);

        }
        else {
            User::where("id",$this->editId)->update([
                "name" => $this->name,
                "account" => $this->account,
                "phone" => $this->phone,
                "email" => $this->email,
                "date" => $this->date,
                "sex" => $this->sex,
                "department" => $this->department,
            ]);

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
        $this->account = $row["account"];
        $this->phone = $row["phone"];
        $this->email = $row["email"];
        $this->date = $row["date"];
        $this->sex = $row["sex"];
        $this->department = $row["department"];

    }

    public function standardData(){
        $this->name = trim($this->name);
        $this->account = trim($this->account);
        $this->phone = trim($this->phone);
        $this->email = trim($this->email);
        $this->date = trim($this->date);
        $this->sex = trim($this->sex);
        $this->department = trim($this->department);

    }

    public function delete(){
        User::find($this->deleteId)->delete();
        $this->dispatchBrowserEvent('show-toast', ["type" => "success", "message" => 'Xóa thành công']);
    }

    public function resetSearch(){
        $this->search = "";
        $this->searchName = "";
        $this->searchAccount = "";
        $this->searchPhone = "";
        $this->searchEmail = "";
        $this->searchSex = "";
        $this->reset('key_name');
        $this->reset('sortingName');
    }

    public function export(){
        $today = date("d_m_Y");
        return Excel::download(new UserExport($this->key_name, $this->sortingName, $this->search, $this->searchName, $this->searchAccount, $this->searchPhone, $this->searchEmail, $this->searchSex), "User-export-".$today.".xlsx");
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
    public function detail ($row){
        $this->mode = 'detail';
        $this->editId = $row['id'];
        $this->name = $row["name"];
        $this->account = $row["account"];
        $this->phone = $row["phone"];
        $this->email = $row["email"];
        $this->date = $row["date"];
        $this->sex = $row["sex"];
        $this->department = $row["department"];
    }
    
}
