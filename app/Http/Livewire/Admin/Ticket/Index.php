<?php

namespace app\Http\Livewire\Admin\Ticket;

use Livewire\Component;
use App\Http\Livewire\Base\BaseLive;
use App\Models\Ticket;
use Excel;
use App\Exports\TicketExport;


class Index extends BaseLive {

    public $mode = 'create';
    public $editId;
    public $deleteId;
    public $key_name='id', $sortingName='desc';
    public $require_code;
    public $title;
    public $require_id;
    public $customer_id;
    public $product_id;
    public $status_type;
    public $priority_type;
    public $sla_id;
    public $delegate_id;
    public $type;
    public $user_category_id;
    public $user_id;
    public $solution;
    public $rate;
    public $feedback;


    protected $rules = [
        'require_code' => 'required',
        'title' => 'required',
        'require_id' => 'required',
        'customer_id' => 'required',
        'product_id' => 'required',
        'status_type' => 'required',
        'priority_type' => 'required',
        'sla_id' => 'required',
        'delegate_id' => 'required',
        'type' => 'required',
        'user_category_id' => 'required',
        'user_id' => 'required',
        'solution' => 'required',
        'rate' => 'required',
        'feedback' => 'required',
    ];

    protected $messages = [
        'require_code.required' => 'Mã yêu cầu bắt buộc',
        'title.required' => 'Tiêu đề bắt buộc',
        'require_id.required' => 'Require Id bắt buộc',
        'customer_id.required' => 'Customer Id bắt buộc',
        'product_id.required' => 'Product Id bắt buộc',
        'status_type.required' => 'Trạng thái bắt buộc',
        'priority_type.required' => 'Độ ưu tiên bắt buộc',
        'sla_id.required' => ' bắt buộc',
        'delegate_id.required' => 'Delegate Id bắt buộc',
        'type.required' => 'Type bắt buộc',
        'user_category_id.required' => 'User Category Id bắt buộc',
        'user_id.required' => 'User Id bắt buộc',
        'solution.required' => 'Giải pháp bắt buộc',
        'rate.required' => 'Đánh giá bắt buộc',
        'feedback.required' => 'Phản hồi bắt buộc',
    ];


    public $search;
    public $searchRequireCode;
    public $searchTitle;


    public function mount(){
        $this->perPage = 50;
    }

    public function render(){
        $query = Ticket::query();
        if($this->search) {
        }

        if($this->searchRequireCode) {
            $query->where("require_code", "like", "%".$this->searchRequireCode."%");
        }
        if($this->searchTitle) {
            $query->where("title", "like", "%".$this->searchTitle."%");
        }

        $data = $query->orderBy($this->key_name,$this->sortingName)->paginate($this->perPage);
        return view('livewire.admin.Ticket.index', [
            'data'=> $data,
        ]);
    }

    public function updatedSearch(){
        $this->resetPage();
    }

    public function resetValidate(){
        $this->require_code = "";
        $this->title = "";
        $this->require_id = "";
        $this->customer_id = "";
        $this->product_id = "";
        $this->status_type = "";
        $this->priority_type = "";
        $this->sla_id = "";
        $this->delegate_id = "";
        $this->type = "";
        $this->user_category_id = "";
        $this->user_id = "";
        $this->solution = "";
        $this->rate = "";
        $this->feedback = "";
        $this->resetValidation();
    }

    public function create (){
        $this->mode = 'create';
    }

    public function saveData (){
        $this->standardData();
        $this->validate();
        if($this->mode=='create'){
            Ticket::create([
                "require_code" => $this->require_code,
                "title" => $this->title,
                "require_id" => $this->require_id,
                "customer_id" => $this->customer_id,
                "product_id" => $this->product_id,
                "status_type" => $this->status_type,
                "priority_type" => $this->priority_type,
                "sla_id" => $this->sla_id,
                "delegate_id" => $this->delegate_id,
                "type" => $this->type,
                "user_category_id" => $this->user_category_id,
                "user_id" => $this->user_id,
                "solution" => $this->solution,
                "rate" => $this->rate,
                "feedback" => $this->feedback,
            ]);

        }
        else {
            Ticket::where("id",$this->editId)->update([
                "require_code" => $this->require_code,
                "title" => $this->title,
                "require_id" => $this->require_id,
                "customer_id" => $this->customer_id,
                "product_id" => $this->product_id,
                "status_type" => $this->status_type,
                "priority_type" => $this->priority_type,
                "sla_id" => $this->sla_id,
                "delegate_id" => $this->delegate_id,
                "type" => $this->type,
                "user_category_id" => $this->user_category_id,
                "user_id" => $this->user_id,
                "solution" => $this->solution,
                "rate" => $this->rate,
                "feedback" => $this->feedback,
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
        $this->require_code = $row["require_code"];
        $this->title = $row["title"];
        $this->require_id = $row["require_id"];
        $this->customer_id = $row["customer_id"];
        $this->product_id = $row["product_id"];
        $this->status_type = $row["status_type"];
        $this->priority_type = $row["priority_type"];
        $this->sla_id = $row["sla_id"];
        $this->delegate_id = $row["delegate_id"];
        $this->type = $row["type"];
        $this->user_category_id = $row["user_category_id"];
        $this->user_id = $row["user_id"];
        $this->solution = $row["solution"];
        $this->rate = $row["rate"];
        $this->feedback = $row["feedback"];

    }

    public function standardData(){
        $this->require_code = trim($this->require_code);
        $this->title = trim($this->title);
        $this->require_id = trim($this->require_id);
        $this->customer_id = trim($this->customer_id);
        $this->product_id = trim($this->product_id);
        $this->status_type = trim($this->status_type);
        $this->priority_type = trim($this->priority_type);
        $this->sla_id = trim($this->sla_id);
        $this->delegate_id = trim($this->delegate_id);
        $this->type = trim($this->type);
        $this->user_category_id = trim($this->user_category_id);
        $this->user_id = trim($this->user_id);
        $this->solution = trim($this->solution);
        $this->rate = trim($this->rate);
        $this->feedback = trim($this->feedback);

    }

    public function delete(){
        Ticket::find($this->deleteId)->delete();
        $this->dispatchBrowserEvent('show-toast', ["type" => "success", "message" => 'Xóa thành công']);
    }

    public function resetSearch(){
        $this->search = "";
        $this->searchRequireCode = "";
        $this->searchTitle = "";
        $this->reset('key_name');
        $this->reset('sortingName');
    }

    public function export(){
        $today = date("d_m_Y");
        return Excel::download(new TicketExport($this->key_name, $this->sortingName, $this->search, $this->searchRequireCode, $this->searchTitle), "Ticket-export-".$today.".xlsx");
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
    public function detail($row){
        $this->mode = 'detail';
        $this->editId = $row['id'];
        $this->require_code = $row["require_code"];
        $this->title = $row["title"];
        $this->require_id = $row["require_id"];
        $this->customer_id = $row["customer_id"];
        $this->product_id = $row["product_id"];
        $this->status_type = $row["status_type"];
        $this->priority_type = $row["priority_type"];
        $this->sla_id = $row["sla_id"];
        $this->delegate_id = $row["delegate_id"];
        $this->type = $row["type"];
        $this->user_category_id = $row["user_category_id"];
        $this->user_id = $row["user_id"];
        $this->solution = $row["solution"];
        $this->rate = $row["rate"];
        $this->feedback = $row["feedback"];
    }
    
}
