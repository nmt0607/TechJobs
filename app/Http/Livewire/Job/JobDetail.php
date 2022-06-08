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
    public $offer;
    public $statusApply;

    public function mount(){
        $this->job = Job::findOrFail($this->jobId);
        $this->userCreateJob = User::find($this->job->user_id);
    } 

    public function render(){
        $job = $this->job;
        if(auth()->user()->jobs()->where('applications.job_id', $job->id)->first())
            $this->statusApply = auth()->user()->jobs()->where('applications.job_id', $job->id)->first()->pivot->status;
        return view('livewire.job.job-detail', compact('job'));
    }  

    public function apply(){
        $this->validate([
            'offer' => 'required',
        ],[
            'offer.required' => 'Trường này không được bỏ trống',

        ],[]);
        auth()->user()->jobs()->attach($this->jobId, ['status' => 1, 'offer' => $this->offer]);
        $data = [$this->jobId, 2];
        $this->emit('close-modal-apply');
        $this->userCreateJob->notify(new ApplyNotification($data));
        event(new NotificationEvent($this->userCreateJob->id));   
    }

    public function cancelApply(){
        auth()->user()->jobs()->detach($this->jobId);
    }

    public function resetData(){
        $this->resetValidation();
        $this->offer='';
    }
}