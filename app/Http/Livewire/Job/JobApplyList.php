<?php

namespace app\Http\Livewire\Job;

use App\Http\Livewire\Base\BaseLive;
use App\Models\Job;
use App\Models\User;
use App\Notifications\ApplyNotification;
use App\Events\NotificationEvent;
use Pusher\Pusher;

class JobApplyList extends BaseLive {

    public $jobId;
    public $user;
    public $job;
    public $statusUser;
    protected $listeners = [
        'selectUser' => 'selectUser'
    ];

    public function mount(){
        $this->job = Job::findOrFail($this->jobId);
    }

    public function render(){
        $job = $this->job;
        $data = $job->users()->where('applications.status', 1)->get();
        $acceptedCandidate = $job->users()->where('applications.status', 2)->get();
        $appliedJobs = auth()->user()->jobs()->where('applications.status', 1)->get();
        $user = $this->user;
        return view('livewire.job.job-apply-list', compact('job', 'appliedJobs', 'data', 'user', 'acceptedCandidate'));
    }  
    
    public function selectUser($id)
    {
        $this->user = User::find($id);
        $this->statusUser = $this->job->users()->where('applications.user_id',$id )->first()->pivot->status;
        $this->emit('updateFile2', ['id'=> $id]);
    }

    public function accept()
    {
        $this->job->users()->where('applications.user_id', $this->user->id)->update(['applications.status' => 2]);
        $data = [$this->jobId, 2];
        $this->user->notify(new ApplyNotification($data));
        event(new NotificationEvent($this->user->id));
    }

    public function reject()
    {
        $this->job->users()->where('applications.user_id', $this->user->id)->update(['applications.status' => 3]);
    }

    public function finish()
    {
        $this->job->users()->where('applications.user_id', $this->user->id)->update(['applications.status' => 4]);
    }
}
