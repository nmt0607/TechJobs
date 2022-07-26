<?php

namespace app\Http\Livewire\Job;

use Livewire\Component;
use App\Http\Livewire\Base\BaseLive;
use App\Models\Job;
use App\Models\User;
use App\Models\Rate;
use App\Notifications\ApplyNotification;
use App\Events\NotificationEvent;

class JobDetail extends BaseLive {

    public $jobId;
    public $job;
    public $userCreateJob;
    public $offer;
    public $statusApply;
    public $similarJobs;

    protected $listeners = [
        'updateRealtime' => 'render',
        'resetData',
        'finish',
    ];

    public function mount(){
        $this->job = Job::findOrFail($this->jobId);
        $this->userCreateJob = User::find($this->job->user_id);
        $this->similarJobs = Job::where('type', $this->job->type)->where('id', '!=',$this->job->id)->get();
    } 

    public function render(){
        $job = $this->job;
        $userCreateJob = $this->userCreateJob;
        $similarJobs = $this->similarJobs;
        

        if(auth()->user()->jobs()->where('applications.job_id', $job->id)->first()) {
            $this->statusApply = auth()->user()->jobs()->where('applications.job_id', $job->id)->first()->pivot->status;
        }
        else
            $this->statusApply = null;
        return view('livewire.job.job-detail', compact('job', 'userCreateJob', 'similarJobs'));
    }  

    public function apply(){
        $this->validate([
            'offer' => 'required',
        ],[
            'offer.required' => 'Trường này không được bỏ trống',

        ],[]);
        auth()->user()->jobs()->attach($this->jobId, ['status' => 1, 'offer' => $this->offer]);
        $data = [$this->jobId, 1];
        $this->emit('close-modal-apply');
        $this->dispatchBrowserEvent('show-toast', ["type" => "success", "message" => 'Nộp đơn ứng tuyển thành công']);
        $this->userCreateJob->notify(new ApplyNotification($data));
        event(new NotificationEvent($this->userCreateJob->id));   
    }

    public function cancelApply(){
        auth()->user()->jobs()->detach($this->jobId);
        $this->dispatchBrowserEvent('show-toast', ["type" => "success", "message" => 'Đã hủy ứng tuyển']);
        event(new NotificationEvent($this->userCreateJob->id));
    }

    public function resetData(){
        $this->resetValidation();
        $this->offer='';
    }

    public function finish($rating)
    {
        
        Rate::create([
            'rate' => $rating,
            'from_id' => auth()->id(),
            'to_id' => $this->userCreateJob->id,
        ]);
        $this->userCreateJob->jobsCreate()->update([
            'rate' => $this->userCreateJob->rate(),
        ]);
        $this->dispatchBrowserEvent('show-toast', ["type" => "success", "message" => 'Đánh giá nhà tuyển dụng thành công']);
    }
}