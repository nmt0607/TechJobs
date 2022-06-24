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
    public $benefit;
    public $type;
    public $address_id;
    public $end_date;
    public $user_id;
    public $status;
    public $tags;
    public $tagSelect = [];

    public function mount(){
        if($this->jobId){
            $job = Job::find($this->jobId);
            $this->title = $job->title;
            $this->number = $job->number;
            $this->gender = $job->gender;
            $this->description = $job->description;
            $this->requirement = $job->requirement;
            $this->level = $job->level;
            $this->exp = $job->experience;
            $this->salary = $job->salary;
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
            'benefit' => 'required',
            'type' => 'required',
            'address_id' => 'required',
            'end_date' => 'required',
        ],[],[]);
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
}