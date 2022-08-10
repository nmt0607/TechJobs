<?php

namespace app\Http\Livewire\Job;

use App\Http\Livewire\Base\BaseLive;
use App\Models\Job;
use App\Models\Tag;
use App\Models\User;
use Illuminate\Database\Eloquent\Builder;

class JobList extends BaseLive {

    public $tags;
    public $searchTag;
    public $searchName;
    public $searchCompany;
    public $searchProvince;
    public $type;
    public $typeJob;
    public $countJobAll;
    public $countJobType1;
    public $countJobType2;
    public $countJobType3;
    public $countJobType4;
    public $countJobType5;
    public $listJobId;
    public $searchRate;
    public $searchSalaryFrom = 1;
    public $searchSalaryTo = 100;
    public $count;

    public function mount(){
        $this->listJobId = json_encode(User::where('type', 1)->pluck('id')->toArray());
        if(isset($_GET['type'])){
            $this->type = $_GET['type'];
        }
        $this->tags = Tag::all();
        $this->countJobAll = Job::all()->count();
        $this->countJobType1 = Job::where('type', 1)->get()->count();
        $this->countJobType2 = Job::where('type', 2)->get()->count();
        $this->countJobType3 = Job::where('type', 3)->get()->count();
        $this->countJobType4 = Job::where('type', 4)->get()->count();
        $this->countJobType5 = Job::where('type', 5)->get()->count();
    }

    public function render(){
        $this->emit('load_page');
        $query = Job::query();
        $this->searchSalary($query);
        
        // preg_match_all('!\d+!', $query->first()->salary, $matches);
        // dd($matches);
        if($this->type){
            $query = auth()->user()->jobs()->where('applications.status', $this->type);
        }
        
        if($this->searchTag){
            $query->whereHas('tags', function (Builder $query) {
                $query->whereIn('tag_id', $this->searchTag);
            });
        }
        if($this->searchName){
            $query->where('title', 'like', '%'.$this->searchName.'%');
        }
        if($this->typeJob){
            $query->where('type', $this->typeJob);
        }

        if($this->searchCompany){
            $query->where('user_id', $this->searchCompany);
        }
        if($this->searchProvince){
            $query->where('address_id', $this->searchProvince);
        }
        if($this->searchRate){
            $query->where('rate', '>=', $this->searchRate);
        }
        $this->count = $query->count();
        $data = $query->paginate(5);
        $tags = $this->tags;
        $listCompany = Job::listCompany();
        return view('livewire.job.job-list', compact('data', 'tags', 'listCompany'));
    }  
    
    public function search(){
    }

    public function setSearchRate($rate){
        $this->searchRate = $rate;
    }

    public function setSearchType($type){
        $this->typeJob = $type;
    }

    public function searchSalary($query){
        $query->where(function($query){
            $query->where(function($query){
                $query->whereBetween('salary', [$this->searchSalaryFrom,$this->searchSalaryTo])
                    ->orWhereBetween('salary_to', [$this->searchSalaryFrom,$this->searchSalaryTo]);
                })->orWhere(function($query){
                $query->where('salary', '<',$this->searchSalaryFrom)
                    ->where('salary_to', '>',$this->searchSalaryTo);
                });
            });
    }
}
