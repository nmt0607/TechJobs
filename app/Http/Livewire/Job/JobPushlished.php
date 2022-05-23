<?php

namespace app\Http\Livewire\Job;

use App\Http\Livewire\Base\BaseLive;
use App\Models\Job;
use App\Models\Tag;
use Illuminate\Database\Eloquent\Builder;

class JobPushlished extends BaseLive {

    public $tags;
    public $jobId;
    public $searchTag;
    public $searchCompany;

    public function mount(){
        $this->tags = Tag::all();
    }

    public function render(){
        $query = Job::where('user_id', auth()->id());
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
        return view('livewire.job.job-pushlished', compact('data', 'tags', 'listCompany'));
    }  
    
    public function detail($id){
        return redirect()->to('job/detail/'.$id);
    }

    public function applyList($id){
        return redirect()->to('job/apply-list/'.$id);
    }

    public function edit($id){
        return redirect()->to('job/edit/'.$id);
    }

    public function setJob($id){
        $this->jobId = $id;
    }

    public function delete(){
        Job::find($this->jobId)->delete();
    }
}
