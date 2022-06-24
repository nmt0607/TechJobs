<?php

namespace app\Http\Livewire\Job;

use App\Http\Livewire\Base\BaseLive;
use App\Models\Job;
use App\Models\Tag;
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

    public function mount(){
        if(isset($_GET['type'])){
            $this->type = $_GET['type'];
        }
        if(isset($_GET['type_job'])){
            $this->typeJob = $_GET['type_job'];
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
        $query = Job::query();
        if($this->type){
            $query = auth()->user()->jobs();
        }
        
        if($this->searchTag){
            $query->whereHas('tags', function (Builder $query) {
                $query->where('tag_id', 'like', $this->searchTag);
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
        $data = $query->paginate(5);
        $tags = $this->tags;
        $listCompany = Job::listCompany();
        return view('livewire.job.job-list', compact('data', 'tags', 'listCompany'));
    }  
    
    public function search(){
    }
}
