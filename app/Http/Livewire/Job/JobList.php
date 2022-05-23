<?php

namespace app\Http\Livewire\Job;

use App\Http\Livewire\Base\BaseLive;
use App\Models\Job;
use App\Models\Tag;
use Illuminate\Database\Eloquent\Builder;

class JobList extends BaseLive {

    public $tags;
    public $searchTag;
    public $searchCompany;

    public function mount(){
        $this->tags = Tag::all();
    }

    public function render(){
        $query = Job::query();
        if($this->searchTag){
            $query->whereHas('tags', function (Builder $query) {
                $query->where('tag_id', 'like', $this->searchTag);
            });
        }
        if($this->searchCompany){
            $query->where('user_id', $this->searchCompany);
        }
        $data = $query->get();
        $tags = $this->tags;
        $listCompany = Job::listCompany();
        return view('livewire.job.job-list', compact('data', 'tags', 'listCompany'));
    }  
    
    public function search(){
    }
}
