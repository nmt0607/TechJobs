<?php

namespace app\Http\Livewire\Admin\Delegate;

use App\Models\Customer;
use Livewire\Component;
use App\Http\Livewire\Base\BaseLive;
use App\Models\Delegate;
use Excel;
use App\Exports\DelegateExport;


class Index extends BaseLive {

    public $mode = 'create';
    public $editId;
    public $deleteId;
    public $key_name='id', $sortingName='desc';
    public $name;
    public $code;
    public $phone;
    public $email;
    public $position;
    public $customer_id;
    public $note;


    protected $rules = [
        'name' => 'required',
        'phone' => 'required|numeric',
        'email' => 'required|email',
        'position' => 'required',
        'customer_id' => 'required',
    ];

    protected $messages = [
        'name.required' => 'Tên bắt buộc',
        'phone.required' => 'Số điện thoại bắt buộc',
        'email.required' => 'Email bắt buộc',
        'email.email' => 'Email không đúng định dạng',
        'position.required' => 'Chức danh bắt buộc',
        'customer_id.required' => 'Khách hàng bắt buộc',
        'phone.numeric' => 'Số điện thoại không đúng định dạng',
    ];


    public $search;
    public $searchName;
    public $searchCode;
    public $searchPhone;
    public $searchEmail;
    public $searchPosition;
    public $searchCustomerId;
    public $searchNote;


    public function mount(){
        $this->perPage = 50;
    }

    public function render(){
        $query = Delegate::query();
        if($this->search) {
        }

        if($this->searchName) {
            $query->where("name", "like", "%".$this->searchName."%");
        }
        if($this->searchCode) {
            $query->where("code", "like", "%".$this->searchCode."%");
        }
        if($this->searchPhone) {
            $query->where("phone", "like", "%".$this->searchPhone."%");
        }
        if($this->searchEmail) {
            $query->where("email", "like", "%".$this->searchEmail."%");
        }
        if($this->searchPosition) {
            $query->where("position", "like", "%".$this->searchPosition."%");
        }
        if($this->searchCustomerId) {
            $query->where("customer_id", "like", "%".$this->searchCustomerId."%");
        }
        if($this->searchNote) {
            $query->where("note", "like", "%".$this->searchNote."%");
        }
        $query->with('customers');
        $data = $query->orderBy($this->key_name,$this->sortingName)->paginate($this->perPage);
        $customer=$this->getListCustomer();
        $this->emit('setSelect2Input');
        return view('livewire.admin.delegate.index', [
            'data'=> $data,
            'customer'=> $customer,
        ]);
    }

    public function updatedSearch(){
        $this->resetPage();
    }

    public function resetValidate(){
        $this->name = "";
        $this->code = "";
        $this->phone = "";
        $this->email = "";
        $this->position = "";
        $this->customer_id = [];
        $this->note = "";
        $this->resetValidation();
    }

    public function create (){
        $this->mode = 'create';
    }

    public function saveData (){
        $this->standardData();
        $this->validate();
        if($this->mode=='create'){
            $new=Delegate::create([
                "name" => $this->name,
                "code" => $this->code,
                "phone" => $this->phone,
                "email" => $this->email,
                "position" => $this->position,
                "note" => $this->note,
            ]);

            Customer::whereIn('id',$this->customer_id)->update([
                'delegate_id'=>$new->id,
            ]);
        }
        else {
            $update=Delegate::where("id",$this->editId)->update([
                "name" => $this->name,
                "code" => $this->code,
                "phone" => $this->phone,
                "email" => $this->email,
                "position" => $this->position,
                "note" => $this->note,
            ]);
            Customer::whereIn('id',$this->customer_id)->update([
                'delegate_id'=>$this->editId,
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
        $this->code = $row["code"];
        $this->phone = $row["phone"];
        $this->email = $row["email"];
        $this->position = $row["position"];
        $this->customer_id=array_column($row['customers'] , 'id');
        $this->note = $row["note"];

    }

    public function standardData(){
        $this->name = trim($this->name);
        $this->code = trim($this->code);
        $this->phone = trim($this->phone);
        $this->email = trim($this->email);
        $this->position = trim($this->position);
        $this->note = trim($this->note);

    }

    public function delete(){
        Delegate::find($this->deleteId)->delete();
        $this->dispatchBrowserEvent('show-toast', ["type" => "success", "message" => 'Xóa thành công']);
    }

    public function resetSearch(){
        $this->search = "";
        $this->searchName = "";
        $this->searchPhone = "";
        $this->searchEmail = "";
        $this->searchPosition = "";
        $this->searchNote = "";
        $this->reset('key_name');
        $this->reset('sortingName');
    }

    public function export(){
        $today = date("d_m_Y");
        return Excel::download(new DelegateExport($this->key_name, $this->sortingName, $this->search, $this->searchName, $this->searchCode, $this->searchPhone, $this->searchEmail, $this->searchPosition, $this->searchCustomerId, $this->searchNote), "Delegate-export-".$today.".xlsx");
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
    public function getListCustomer(){
        return Customer::pluck('name', 'id');
    }
}
