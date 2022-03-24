<?php

namespace app\Http\Livewire\Admin\Sla;

use Livewire\Component;
use App\Http\Livewire\Base\BaseLive;
use App\Models\Sla;
use App\Models\Requirement;
use App\Enums\EPriorityType;

class PriorityPlyc extends BaseLive {

    public $mode = 'create';
    public $name;
    public $requirement_id;
    public $sla_id;
    public $deleteId;

    public function mount(){
        $this->perPage = 50;
        $this->priorityType = EPriorityType::getEPriorityType();
        $this->requirement = Requirement::whereNull('sla_id')->get();
        $this->sla = Sla::all();
    }

    public function render()
    {
        $query = Requirement::whereNotNull('sla_id');
        $data = $query->paginate($this->perPage);
        return view('livewire.admin.sla.priority-plyc', [
            'data'=> $data
        ]);
    }

    public function create(){
        $this->requirement = Requirement::whereNull('sla_id')->get();
        $this->sla = Sla::all();
        $this->requirement_id = $this->requirement->first()->id??null;
        $this->sla_id = $this->sla->first()->id;Sla::all();
        $this->mode = 'create';
    }

    public function edit($row){
        $this->mode = 'edit';
        $this->name = $row['name'];
        $this->requirement_id = $row['id'];
        $this->sla_id = $row['sla_id']; 
    }

    public function saveData (){
        //dd($this->product_id, $this->sla_id);
        if($this->mode == 'edit'){
            Requirement::where('id', $this->requirement_id)->update(['sla_id' => $this->sla_id]);
            $this->dispatchBrowserEvent('show-toast', ["type" => "success", "message" => 'Chỉnh sửa thành công']);
        }
        else {
            Requirement::where('id', $this->requirement_id)->update(['sla_id' => $this->sla_id]);
            $this->dispatchBrowserEvent('show-toast', ["type" => "success", "message" => 'Tạo mới thành công']);
        }
        $this->resetValidate();
        $this->emit('closeModalCreateEdit');
    }

    public function resetValidate(){
        $this->name = "";
        $this->requirement_id = "";
        $this->sla_id = "";
        $this->resetValidation();
    }

    public function delete(){
        Requirement::where('id', $this->deleteId)->update(['sla_id' => null]);
        $this->dispatchBrowserEvent('show-toast', ["type" => "success", "message" => 'Xóa thành công']);
    }
}
