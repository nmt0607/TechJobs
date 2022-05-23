<?php

namespace app\Http\Livewire\Job;

use Livewire\Component;
use App\Http\Livewire\Base\BaseLive;
use App\Models\Job;
use App\Models\User;
use App\Notifications\ApplyNotification;
use App\Events\NotificationEvent;

class JobDetail extends BaseLive {

    public $jobId;
    public $job;
    public $userCreateJob;

    public function mount(){
        $this->job = Job::findOrFail($this->jobId);
        $this->userCreateJob = User::find($this->job->user_id);
    } 

    public function render(){
        $job = $this->job;
        $appliedJobs = auth()->user()->jobs()->where('applications.status', 1)->get();
        return view('livewire.job.job-detail', compact('job', 'appliedJobs'));
    }  

    public function apply(){
        auth()->user()->jobs()->attach($this->jobId, ['status' => 1]);
        $data = [$this->jobId, 2];
        $this->userCreateJob->notify(new ApplyNotification($data));
        event(new NotificationEvent($this->userCreateJob->id));
    }

    public function cancelApply(){
        auth()->user()->jobs()->detach($this->jobId);
    }
}