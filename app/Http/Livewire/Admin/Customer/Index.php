<?php

namespace app\Http\Livewire\Admin\Customer;

use Livewire\Component;
use App\Http\Livewire\Base\BaseLive;
use App\Models\Customer;
use Excel;
use App\Exports\CustomerExport;


class Index extends BaseLive {

    public $mode = 'create';
    public $editId;
    public $deleteId;
    public $key_name='id', $sortingName='desc';
    public $name;
    public $phone;
    public $email;


    protected $rules = [
        'name' => 'required',
        'phone' => 'required',
        'email' => 'required',
    ];

    protected $messages = [
        'name.required' => 'Tên khách hàng bắt buộc',
        'phone.required' => 'Số điện thoại bắt buộc',
        'email.required' => 'Email bắt buộc',
    ];


    public $search;
    public $searchName;
    public $searchPhone;
    public $searchEmail;


    public function mount(){
        $this->perPage = 50;
    }

    public function render(){
        $query = Customer::query();
        if($this->search) {
        }

        if($this->searchName) {
            $query->where("name", "like", "%".$this->searchName."%");
        }
        if($this->searchPhone) {
            $query->where("phone", "like", "%".$this->searchPhone."%");
        }
        if($this->searchEmail) {
            $query->where("email", "like", "%".$this->searchEmail."%");
        }

        $data = $query->orderBy($this->key_name,$this->sortingName)->paginate($this->perPage);
        return view('livewire.admin.customer.index', [
            'data'=> $data,
        ]);
    }

    public function updatedSearch(){
        $this->resetPage();
    }

    public function resetValidate(){
        $this->name = "";
        $this->phone = "";
        $this->email = "";
        $this->resetValidation();
    }

    public function create (){
        $this->mode = 'create';
    }

    public function saveData (){
        $this->standardData();
        $this->validate();
        if($this->mode=='create'){
            Customer::create([
                "name" => $this->name,
                "phone" => $this->phone,
                "email" => $this->email,
            ]);

        }
        else {
            Customer::where("id",$this->editId)->update([
                "name" => $this->name,
                "phone" => $this->phone,
                "email" => $this->email,
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

    public function show($row){
        $this->mode = 'show';
        $this->editId = $row['id'];
        $this->name = $row["name"];
        $this->phone = $row["phone"];
        $this->email = $row["email"];
    }

    public function edit($row){
        $this->mode = 'update';
        $this->editId = $row['id'];
        $this->name = $row["name"];
        $this->phone = $row["phone"];
        $this->email = $row["email"];
    }

    public function standardData(){
        $this->name = trim($this->name);
        $this->phone = trim($this->phone);
        $this->email = trim($this->email);

    }

    public function delete(){
        Customer::find($this->deleteId)->delete();
        $this->dispatchBrowserEvent('show-toast', ["type" => "success", "message" => 'Xóa thành công']);
    }

    public function resetSearch(){
        $this->search = "";
        $this->searchName = "";
        $this->searchPhone = "";
        $this->searchEmail = "";
        $this->reset('key_name');
        $this->reset('sortingName');
    }

    public function export(){
        $today = date("d_m_Y");
        return Excel::download(new CustomerExport($this->key_name, $this->sortingName, $this->search, $this->searchName, $this->searchPhone, $this->searchEmail), "Customer-export-".$today.".xlsx");
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
    
}
