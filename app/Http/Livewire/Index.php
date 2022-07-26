<?php

namespace app\Http\Livewire;

use App\Http\Livewire\Base\BaseLive;
use App\Models\Job;
use App\Models\Tag;
use App\Models\User;
use Illuminate\Database\Eloquent\Builder;
use DB;

class Index extends BaseLive {

    public $tags;
    public $users;
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

    public function mount(){
        $this->listJobId = json_encode(User::where('type', 1)->pluck('id')->toArray());
        \Carbon\Carbon::setLocale('vi');
        if(isset($_GET['type'])){
            $this->type = $_GET['type'];
        }
        if(isset($_GET['type_job'])){
            $this->typeJob = $_GET['type_job'];
        }
        $this->tags = Tag::all();
        $this->users = User::where('type', 1)->get();
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
        $newJobs = Job::query()->orderBy('created_at', 'desc')->get();
        $urgentJobs = Job::query()->orderBy('end_date')->get();
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
        $users = $this->users;
        $listCompany = Job::listCompany();
        return view('livewire.index', compact('data', 'tags', 'listCompany', 'users', 'newJobs', 'urgentJobs'));
    }  
    
}
