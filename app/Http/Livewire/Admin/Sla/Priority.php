<?php

namespace app\Http\Livewire\Admin\Sla;

use Livewire\Component;
use App\Http\Livewire\Base\BaseLive;
use App\Models\Sla;
use App\Enums\EPriorityType;
class Priority extends BaseLive {

    public $editId;
    public $type = '';
    public $day;
    public $hour;
    public $minute;
    public $priorityType = [];


    public function mount(){
        $this->perPage = 50;
        $this->priorityType = EPriorityType::getEPriorityType();
    }

    public function render(){
        $query = Sla::query();
        $data = $query->paginate($this->perPage);
        return view('livewire.admin.sla.priority', [
            'data'=> $data
        ]);
    }

    public function updatedSearch(){
        $this->resetPage();
    }

    public function resetValidate(){
        $this->resetValidation();
    }


    public function saveData (){
        if(!$this->day&&!$this->hour&&!$this->minute){
            $this->addError('errorProcessTime', 'Thời gian xử lý phải khác 0');
            return;
        }
        $process_time_json = $this->getProcessTimeJson();
        Sla::where("id",$this->editId)->update([
            "process_time_json" => $process_time_json
        ]);
        $this->resetValidate();
        $this->dispatchBrowserEvent('show-toast', ["type" => "success", "message" => 'Chỉnh sửa thành công']);
        $this->emit('closeModalCreateEdit');
    }

    public function edit($row){
        $this->editId = $row['id'];
        $this->type = $this->priorityType[$row['type']];
        $this->getDayHourMinute($row["process_time_json"]);
    }

    public function getProcessTimeJson(){
        $arrayTime = [
            'day' => $this->day,
            'hour' => $this->hour,
            'minute' => $this->minute,
        ];
        return json_encode($arrayTime);
    }
    public function getDayHourMinute($json){
        $array = json_decode($json);
        $this->day = $array->day;
        $this->hour = $array->hour;
        $this->minute = $array->minute;
    }
}
