<?php

namespace app\Http\Livewire\Admin\Survey;

use Livewire\Component;
use App\Http\Livewire\Base\BaseLive;
use App\Models\Survey;
use Excel;
use App\Exports\SurveyExport;
use App\Enums\ESurveyType;
class Edit extends BaseLive {

    public $mode = 'create';
    public $editId;
    public $showId;
    public $deleteId;
    public $key_name='id', $sortingName='desc';
    public $name;
    public $content;
    public $type;
    public $surveyId;


    protected $rules = [
        'name' => 'required',
        'type' => 'required',
        'content' => 'required',
    ];

    protected $messages = [
        'name.required' => 'Tên khảo sát bắt buộc',
        'type.required' => 'Loại khảo sát bắt buộc',
        'content.required' => 'Câu hỏi khảo sát bắt buộc',
    ];


    public $search;
    public $searchName;
    public $searchType;


    public function mount(){
        $this->perPage = 50;
    }

    public function render(){
        $query = Survey::query();
        $surveyType = ESurveyType::getESurveyType();
        if($this->searchName) {
            $query->where("name", "like", "%".$this->searchName."%");
        }
        if($this->searchType) {
            $query->where("type", "like", "%".$this->searchType."%");
        }
        dd($this->surveyId);
        $data = $query->orderBy($this->key_name,$this->sortingName)->paginate($this->perPage);
        return view('livewire.admin.survey.edit', [
            'data'=> $data,
            'surveyType' => $surveyType,
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

    public function create (){
        $this->mode = 'create';
    }

    public function saveData (){
        $this->standardData();
        $this->validate();
        if($this->mode=='create'){
            Survey::create([
                "name" => $this->name,
                "type" => $this->type,
                "content" => $this->content,
                "admin_id" => auth()->id(),
            ]);

        }
        else {
            Survey::where("id",$this->editId)->update([
                "name" => $this->name,
                "type" => $this->type,
                "content" => $this->content,
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
        $this->type = $row["type"];
        $this->content = $row["content"];
    }
    // public function show($row){
    //     $this->mode = 'show';
    //     $this->showId = $row['id'];
    //     $this->name = $row["name"];
    //     $this->type = $row["type"];
    //     $this->content = $row["content"];
    // }

    public function standardData(){
        $this->name = trim($this->name);
        $this->type = trim($this->type);
        $this->content = trim($this->content);

    }

    public function delete(){
        Survey::find($this->deleteId)->delete();
        $this->dispatchBrowserEvent('show-toast', ["type" => "success", "message" => 'Xóa thành công']);
    }

    public function resetSearch(){
        $this->search = "";
        $this->searchName = "";
        $this->searchType = "";
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
