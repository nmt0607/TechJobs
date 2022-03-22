<?php

namespace app\Http\Livewire\Admin\Unit;

use Livewire\Component;
use App\Http\Livewire\Base\BaseLive;
use App\Models\Unit;
use Excel;
use App\Exports\UnitExport;
use App\Models\Province;
use App\Models\Ward;
use App\Models\District;
use Illuminate\Support\Facades\DB;

class Index extends BaseLive {

    public $mode = 'create';
    public $editId;
    public $deleteId;
    public $key_name='id', $sortingName='desc';
    public $name;
    public $address;
    public $province;
    public $district;
    public $parent_id;
    public $number_of_staffs;


    protected $rules = [
        'name' => 'required',
        'address' => 'required',
        'province' => 'required',
        'district' => 'required',
        'parent_id' => 'nullable',
        'number_of_staffs' => 'required|numeric|min:1',
    ];

    protected $messages = [
        'name.required' => 'The Name is required',
        'address.required' => 'The Address is required',
        'province.required' => 'The Province is required',
        'district.required' => 'The District is required',
        // 'parent_id.required' => 'The Parent Id is required',
        'number_of_staffs.required' => 'The Number Of Staffs is required',
        'number_of_staffs.numeric' => 'The Number Of Staffs is number',
        'number_of_staffs.min' => 'The Number Of Staffs min is 1',
    ];


    public $search;
    public $searchName;
    public $searchAddress;


    public function mount(){
        $this->perPage = 50;
    }

    public function render(){
        // dd($this->parent_id);
        $query= Unit::leftJoin('ex_province','ex_province.province_code','=','unit.province_id')
        ->leftJoin('ex_district','ex_district.district_code','=','unit.district_id')
        ->select('unit.*',DB::raw('ex_province.short_name as province_name'),
        DB::raw('ex_district.short_name as district_name'));
        if($this->searchName) {
            $query->where("name", "like", "%".$this->searchName."%");
        }
        if($this->searchAddress) {-
            $query->where("address", "like", "%".$this->searchAddress."%");
        }
        $parentUnit = Unit::query()->pluck('name','id')->toArray();
        $parentUnitEdit = [];
        if($this->mode=='update'){
            $id = $this->editId;
            $data = Unit::where('parent_id','!=',$id)->get(); 
            $data = Unit::pluck('parent_id','id');
            $data = json_decode(json_encode($data), true);
            $parent = [];
            $parent1 = [];
            $parent2 = [];
            array_push($parent1, $id);
            foreach($data as $key => $value){
                $parent[$key] = 0;
            }
            $kt = 0;
            while(count($parent1)>0){
                $parent[$parent1[$kt]] = 1;
                foreach($data as $key => $value){
                    if(!$parent[$key]&& $value==$parent1[$kt]){
                        if(!array_search($id, $parent1)){
                            array_push($parent1, $key);
                            array_push($parent2, $key);
                        }
                    }
                }
                unset($parent1[$kt]);
                $kt++;
            }
            $parentUnitEdit = Unit::whereNotIn('id', $parent2)->pluck('name','id')->toArray();
        }
        $parentUnitEdit = $this->mode=='create'?$parentUnit:$parentUnitEdit;
        // dd($parentUnitEdit,$parentUnit,$this->mode);
        // $idEdit = $this->editId;
        
        $districts = [];
        $wards = [];
        $provinces = Province::query()->orderBy('name')->pluck('name','province_code');
        if($this->province)
        {
            $districts = District::query()->where('province_code',$this->province)->orderBy('name')->pluck('name','district_code');
        }
        
        
        $data = $query->orderBy($this->key_name,$this->sortingName)->paginate($this->perPage);
        return view('livewire.admin.unit.index', [
            'data'=> $data,
            'parentUnit' => $parentUnit,
            'provinces' => $provinces,
            'districts' => $districts,
            'parentUnitEdit' => $parentUnitEdit
        ]);
    }

    public function updatedSearch(){
        $this->resetPage();
    }

    public function resetValidate(){
        $this->name = "";
        $this->address = "";
        $this->province = "";
        $this->district = "";
        $this->parent_id = "";
        $this->number_of_staffs = "";
        $this->resetValidation();
    }

    public function create (){
        $this->mode = 'create';
        $this->parent_id = '';
    }

    public function saveData (){
        $this->standardData();
        $this->validate();
        if($this->mode=='create'){
            Unit::create([
                "name" => $this->name,
                "address" => $this->address,
                "province_id" => (int)($this->province),
                "district_id" => (int)($this->district),
                "parent_id" => (int)($this->parent_id),
                "number_of_staffs" => $this->number_of_staffs,
            ]);

        }
        else {
            Unit::where("id",$this->editId)->update([
                "name" => $this->name,
                "address" => $this->address,
                "province_id" => (int)($this->province),
                "district_id" => (int)($this->district),
                "parent_id" => (int)($this->parent_id),
                "number_of_staffs" => $this->number_of_staffs,
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
        $this->address = $row["address"];
        $this->province = $row["province_id"];
        $this->district = $row["district_id"];
        $this->parent_id = $row["parent_id"];
        $this->number_of_staffs = $row["number_of_staffs"];
    }

    public function standardData(){
        $this->name = trim($this->name);
        $this->address = trim($this->address);
        $this->province = trim($this->province);
        $this->district = trim($this->district);
        $this->parent_id = trim($this->parent_id);
        $this->number_of_staffs = trim($this->number_of_staffs);

    }

    public function delete(){
        Unit::find($this->deleteId)->delete();
        $this->dispatchBrowserEvent('show-toast', ["type" => "success", "message" => 'Xóa thành công']);
    }

    public function resetSearch(){
        $this->search = "";
        $this->searchName = "";
        $this->searchAddress = "";
        $this->reset('key_name');
        $this->reset('sortingName');
    }

    public function export(){
        $today = date("d_m_Y");
        return Excel::download(new UnitExport($this->key_name, $this->sortingName, $this->search, $this->searchName, $this->searchAddress), "Unit-export-".$today.".xlsx");
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
