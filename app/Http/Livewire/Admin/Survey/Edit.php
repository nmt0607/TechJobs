<?php

namespace app\Http\Livewire\Admin\Survey;

use Livewire\Component;
use App\Http\Livewire\Base\BaseLive;
use App\Models\Survey;
use Excel;
use App\Exports\SurveyExport;
use App\Enums\ESurveyType;
class Edit extends BaseLive {

    public $editId;
    public $showId;
    public $deleteId;
    public $surveyId;
    public $key_name='id', $sortingName='desc';
    public $customer_name;
    public $content;
    public $rate;
    public $email;
    public $phone;
    public $created_at;

    public $search;
    public $searchCustomerName;
    public $searchPhone;


    public function mount(){
        $this->perPage = 50;
    }

    public function render(){
        $query = Survey::where('survey.id',$this->surveyId)
            ->Join('survey_customer','survey_customer.survey_id','survey.id')
            ->select('survey_customer.*');
        if($this->searchCustomerName){
            $query->where('survey_customer.customer_name','like','%'.$this->searchCustomerName.'%');
        }
        if($this->searchPhone){
            $query->where('survey_customer.phone','like','%'.$this->searchPhone.'%');
        }
        $data = $query->orderBy($this->key_name,$this->sortingName)->paginate($this->perPage);
        $survey = Survey::find($this->surveyId);
        return view('livewire.admin.survey.edit', [
            'data'=> $data,
            'survey' => $survey,
        ]);
    }

    public function updatedSearch(){
        $this->resetPage();
    }

    public function resetValidate(){
        $this->name = "";
        $this->type = "";
        $this->content = "";
        $this->resetValidation();
    }

    public function saveData (){
        $this->standardData();
        $this->validate();
        Survey::where("id",$this->editId)->update([
            "name" => $this->name,
            "type" => $this->type,
            "content" => $this->content,
        ]);
        $this->resetValidate();
        $this->dispatchBrowserEvent('show-toast', ["type" => "success", "message" => 'Chỉnh sửa thành công']);
        $this->emit('closeModalCreateEdit');
    }

    public function edit($row){
        $this->editId = $row['id'];
        $this->rate = $row["rate"];
        $this->content = $row["content"];
        $this->email = $row["email"];
        $this->phone = $row["phone"];
        $this->customer_name = $row["customer_name"];
        $this->created_at = $row["created_at"];
    }

    public function standardData(){
        $this->name = trim($this->name);
        $this->type = trim($this->type);
        $this->content = trim($this->content);
    }


    public function resetSearch(){
        $this->searchCustomerName = "";
        $this->searchPhone = "";
        $this->reset('key_name');
        $this->reset('sortingName');
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
