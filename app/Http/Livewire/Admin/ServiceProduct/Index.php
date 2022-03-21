<?php

namespace App\Http\Livewire\Admin\ServiceProduct;

use Livewire\Component;
use App\Http\Livewire\Base\BaseLive;
use App\Models\ServiceProduct;
use App\Models\User;
use App\Models\Category;
use Excel;
use App\Exports\ServiceProductExport;


class Index extends BaseLive {

    public $mode = 'create';
    public $editId;
    public $showId;
    public $deleteId;
    public $key_name='id', $sortingName='desc';
    public $name = null;
    public $status = null;
    public $category_id = null;
    public $user_id = null;
    public $rate = null;
    public $description = null;

    public $products = [];

    protected $rules = [
        'name' => 'required',
        'status' => 'required',
        'rate' => 'numeric|between:0,5.00',
    ];
    protected $messages = [
        'name.required' => 'Tên sản phẩm bắt buộc',
        'status.required' => 'Trạng thái bắt buộc',
        'rate.numeric' => 'Thang điểm phải là số từ 0 đến 5',
        'rate.between' => 'Thang điểm phải là số từ 0 đến 5',
    ];


    public $search;
    public $searchName;

    public function mount(){
        $this->perPage = 50;
    }
    public function render(){
        $query = $this->getQuery();
        $manager = User::query()->pluck('name','id')->toArray();
        $category = Category::query()->pluck('name','id')->toArray();
        $data = $query->orderBy($this->key_name,$this->sortingName)->paginate($this->perPage);
        return view('livewire.admin.serviceProduct.index', [
            'data'=> $data,
            'manager' => $manager,
            'category' => $category,
        ]);
    }

    public function getQuery(){
        $query = ServiceProduct::query();
        if($this->searchName) {
            $query->where("name", "like", "%".$this->searchName."%");
        }
        return $query;
    }

    public function updatedSearch(){
        $this->resetPage();
    }

    public function resetValidate(){
        $this->name = null;
        $this->status = null;
        $this->category_id = null;
        $this->user_id = null;
        $this->rate = null;
        $this->description = null;
        $this->resetValidation();
    }

    public function create (){
        $this->mode = 'create';
    }

    public function saveData (){
        $this->standardData();
        $this->validate();
        if($this->mode=='create'){
            ServiceProduct::create([
                "name" => $this->name,
                "status" => $this->status,
                "category_id" => $this->category_id?$this->category_id:null,
                "user_id" => $this->user_id?$this->user_id:null,
                "rate" => $this->rate?$this->rate:null,
                "description" => $this->description,
            ]);

        }
        else {
            // dd($this->user_id?$this->user_id:null,$this->user_id);
            ServiceProduct::where("id",$this->editId)->update([
                "name" => $this->name,
                "status" => $this->status,
                "category_id" => $this->category_id?$this->category_id:null,
                "user_id" => $this->user_id?$this->user_id:null,
                "rate" => $this->rate?$this->rate:null,
                "description" => $this->description,
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
        $this->status = $row["status"];
        $this->category_id = $row["category_id"];
        $this->user_id = $row["user_id"];
        $this->rate = $row["rate"];
        $this->description = $row["description"];

    }
    public function show($row){
        // dd('vào',$row);
        $this->mode = 'show';
        $this->showId = $row['id'];
        $this->name = $row["name"];
        $this->status = $row["status"];
        $this->category_id = $row["category_id"];
        $this->user_id = $row["user_id"];
        $this->rate = $row["rate"];
        $this->description = $row["description"];

    }
    public function standardData(){
        $this->name = trim($this->name);
        $this->status = trim($this->status);
        $this->category_id = trim($this->category_id);
        $this->user_id = trim($this->user_id);
        $this->rate = trim($this->rate);
        $this->description = trim($this->description);

    }

    public function delete(){
        ServiceProduct::find($this->deleteId)->delete();
        $this->dispatchBrowserEvent('show-toast', ["type" => "success", "message" => 'Xóa thành công']);
    }

    public function deleteAll(){
        $query = $this->getQuery();
        $productIds = $query->whereIn('service_product.id',$this->products)->pluck('id')->toArray();
        $query = ServiceProduct::whereIn('service_product.id',$productIds)->delete();
        $countDelete = count($productIds);
        $this->products = array_diff($this->products, $productIds);
        $this->dispatchBrowserEvent('show-toast', ["type" => "success", "message" => 'Xóa thành công '.$countDelete.' bản ghi.']);

    }
    public function resetSearch(){
        $this->search = "";
        $this->searchName = "";
        $this->reset('key_name');
        $this->reset('sortingName');
    }

    public function export(){
        $today = date("d_m_Y");
        return Excel::download(new ServiceProductExport($this->key_name, $this->sortingName, $this->search, $this->searchName), "ServiceProduct-export-".$today.".xlsx");
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
