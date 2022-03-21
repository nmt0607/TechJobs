<?php

namespace app\Http\Livewire\Admin\Test;

use Livewire\Component;
use App\Http\Livewire\Base\BaseLive;
use App\Models\Test;
use Excel;
use App\Exports\TestExport;


class Index extends BaseLive {

    public $mode = 'create';
    public $editId;
    public $deleteId;
    public $key_name='id', $sortingName='desc';
    public $name;
    public $contract_number;
    public $actor_name;
    public $director;
    public $status;


    protected $rules = [
        'name' => 'required',
        'contract_number' => 'required',
        'actor_name' => 'required',
        'director' => 'required',
        'status' => 'required',
    ];

    protected $messages = [
        'name.required' => 'The Name is required',
        'contract_number.required' => 'The Contract Number is required',
        'actor_name.required' => 'The Actor Name is required',
        'director.required' => 'The Director is required',
        'status.required' => 'The Status is required',
    ];


    public $search;
    public $searchActorName;
    public $searchDirector;
    public $searchStatus;


    public function mount(){
        $this->perPage = 50;
    }

    public function render(){
        $query = Test::query();
        if($this->search) {
            $query = $query->where(function ($query) {
                $query->where("name", "like", "%".$this->search."%")->orWhere('contract_number', 'like', '%'.$this->search.'%');
            });
        }

        if($this->searchActorName) {
            $query->where("actor_name", "like", "%".$this->searchActorName."%");
        }
        if($this->searchDirector) {
            $query->where("director", "like", "%".$this->searchDirector."%");
        }
        if($this->searchStatus) {
            $query->where("status", "like", "%".$this->searchStatus."%");
        }

        $data = $query->orderBy($this->key_name,$this->sortingName)->paginate($this->perPage);
        return view('livewire.admin.test.index', [
            'data'=> $data,
        ]);
    }

    public function updatedSearch(){
        $this->resetPage();
    }

    public function resetValidate(){
        $this->name = "";
        $this->contract_number = "";
        $this->actor_name = "";
        $this->director = "";
        $this->status = "";
        $this->resetValidation();
    }

    public function create (){
        $this->mode = 'create';
    }

    public function saveData (){
        $this->standardData();
        $this->validate();
        if($this->mode=='create'){
            Test::create([
                "name" => $this->name,
                "contract_number" => $this->contract_number,
                "actor_name" => $this->actor_name,
                "director" => $this->director,
                "status" => $this->status,
            ]);

        }
        else {
            Test::where("id",$this->editId)->update([
                "name" => $this->name,
                "contract_number" => $this->contract_number,
                "actor_name" => $this->actor_name,
                "director" => $this->director,
                "status" => $this->status,
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
        $this->contract_number = $row["contract_number"];
        $this->actor_name = $row["actor_name"];
        $this->director = $row["director"];
        $this->status = $row["status"];

    }

    public function standardData(){
        $this->name = trim($this->name);
        $this->contract_number = trim($this->contract_number);
        $this->actor_name = trim($this->actor_name);
        $this->director = trim($this->director);
        $this->status = trim($this->status);

    }

    public function delete(){
        Test::find($this->deleteId)->delete();
        $this->dispatchBrowserEvent('show-toast', ["type" => "success", "message" => 'Xóa thành công']);
    }

    public function resetSearch(){
        $this->search = "";
        $this->searchActorName = "";
        $this->searchDirector = "";
        $this->searchStatus = "";
        $this->reset('key_name');
        $this->reset('sortingName');
    }

    public function export(){
        $today = date("d_m_Y");
        return Excel::download(new TestExport($this->key_name, $this->sortingName, $this->search, $this->searchActorName, $this->searchDirector, $this->searchStatus), "Test-export-".$today.".xlsx");
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
