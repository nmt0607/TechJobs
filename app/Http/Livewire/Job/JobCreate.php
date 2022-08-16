<?php

namespace app\Http\Livewire\Job;

use Livewire\Component;
use App\Http\Livewire\Base\BaseLive;
use App\Models\Job;
use App\Models\Tag;

class JobCreate extends BaseLive {

    public $jobId;
    public $title;
    public $number = 1;
    public $gender;
    public $description;
    public $requirement;
    public $level;
    public $exp;
    public $salary;
    public $salary_to;
    public $benefit;
    public $type;
    public $address_id;
    public $end_date;
    public $user_id;
    public $status;
    public $tags;
    public $tagSelect = [];

    public function mount(){
        if(auth()->user()->type == 2) abort(403, 'Unauthorized action.');
        if($this->jobId){
            $job = Job::find($this->jobId);
            if($job->user_id != auth()->id()) abort(403, 'Unauthorized action.');
            $this->title = $job->title;
            $this->number = $job->number;
            $this->gender = $job->gender;
            $this->description = $job->description;
            $this->requirement = $job->requirement;
            $this->level = $job->level;
            $this->exp = $job->experience;
            $this->salary = $job->salary;
            $this->salary_to = $job->salary_to;
            $this->benefit = $job->benefit;
            $this->type = $job->type;
            $this->address_id = $job->address_id;
            $this->end_date = $job->end_date;
            $this->user_id = $job->user_id;
            $this->status = $job->status;
            $this->tagSelect = $job->tags->pluck('id')->toArray();
        }
        $this->tags = Tag::all();
        $this->user = auth()->user();
    }

    public function render(){
        $tags = $this->tags;
        $user = $this->user;
        return view('livewire.job.job-create', compact('tags', 'user'));
    }  

    public function create(){
        $this->validate([
            'title' => 'required',
            'number' => 'required',
            'gender' => 'required',
            'description' => 'required',
            'requirement' => 'required',
            'level' => 'required',
            'exp' => 'required',
            'salary' => 'required',
            'salary_to' => 'required|gt:salary',
            'benefit' => 'required',
            'type' => 'required',
            'address_id' => 'required',
            'end_date' => 'required',
        ],[
            'salary_to.gt' => 'Mức giá tối đa phải lớn hơn mức giá tối thiểu.',
        ],[]);
        if($this->jobId){
            $job = Job::find($this->jobId);
            $job->title = $this->title;
            $job->number = $this->number;
            $job->gender = $this->gender;
            $job->description = $this->description;
            $job->requirement = $this->requirement;
            $job->level = $this->level;
            $job->experience = $this->exp;
            $job->salary = $this->salary;
            $job->salary_to = $this->salary_to;
            $job->benefit = $this->benefit;
            $job->type = $this->type;
            $job->address_id = $this->address_id;
            $job->end_date = $this->end_date;
            $job->user_id = $this->user->id;
            $job->status = $this->status;
            $job->save();
            $job->tags()->sync($this->tagSelect);
            $this->dispatchBrowserEvent('show-toast', ["type" => "success", "message" => 'Cập nhật công việc thành công']);

        }
        else {
            $job = Job::create([
                "title" => $this->title,
                "number" => $this->number,
                "gender" => $this->gender,
                "description" => $this->description,
                "requirement" => $this->requirement,
                "level" => $this->level,
                "experience" => $this->exp,
                "salary" => $this->salary,
                "salary_to" => $this->salary_to,
                "benefit" => $this->benefit,
                "type" => $this->type,
                "address_id" => $this->address_id,
                "end_date" => $this->end_date,
                "user_id" => $this->user->id,
                "status" => $this->status,
            ]);
            $job->tags()->attach($this->tagSelect);
            $this->dispatchBrowserEvent('show-toast', ["type" => "success", "message" => 'Tạo mới công việc thành công']);
        }
    }  

    public function back(){
        return redirect()->to('/job/pushlished');
    }
}