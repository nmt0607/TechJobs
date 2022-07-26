<?php

namespace app\Http\Livewire\Job;

use App\Http\Livewire\Base\BaseLive;
use App\Models\Job;
use App\Models\User;
use App\Models\Rate;
use App\Notifications\ApplyNotification;
use App\Events\NotificationEvent;
use Pusher\Pusher;

class JobApplyList extends BaseLive {

    public $jobId;
    public $user;
    public $userCreateJob;
    public $job;
    public $statusUser;
    public $rate;
    protected $listeners = [
        'selectUser' => 'selectUser',
        'updateRealtime' => 'render',
        'finish' => 'finish',
    ];

    public function mount(){
        $this->userCreateJob = auth()->user();
        $this->job = Job::findOrFail($this->jobId);
    }

    public function render(){
        $job = $this->job;
        $listUserId = json_encode($job->users()->where('applications.status', 1)->orWhere('applications.status', 2)->pluck('users.id')->toArray());
        $data = $job->users()->where('applications.status', 1)->get();
        foreach($data as $user){
            $user->offer = $job->users()->where('applications.status', 1)->where('applications.user_id', $user->id)->first()->pivot->offer;
            $user->applyDate = reFormatDate($job->users()->where('applications.status', 1)->where('applications.user_id', $user->id)->first()->pivot->created_at);
        }
        $acceptedCandidate = $job->users()->where('applications.status', 2)->get();
        foreach($acceptedCandidate as $user){
            $user->offer = $job->users()->where('applications.status', 2)->where('applications.user_id', $user->id)->first()->pivot->offer;
            $user->applyDate = reFormatDate($job->users()->where('applications.status', 2)->where('applications.user_id', $user->id)->first()->pivot->created_at);
        }

        $appliedJobs = auth()->user()->jobs()->where('applications.status', 1)->get();
        $user = $this->user;
        $userCreateJob = $this->userCreateJob;
        if($user) {
            $user->offer = $job->users()->where('applications.user_id', $user->id)->first()->pivot->offer;
        }
        return view('livewire.job.job-apply-list', compact('job', 'appliedJobs', 'data', 'user', 'acceptedCandidate', 'userCreateJob', 'listUserId'));
    }  
    
    public function selectUser($id)
    {
        $this->emit('select-user');
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
        $this->dispatchBrowserEvent('show-toast', ["type" => "success", "message" => 'Đã chấp nhận ứng viên']);
        $this->user = null;
        $this->statusUser = null;
    }

    public function reject()
    {
        $this->job->users()->where('applications.user_id', $this->user->id)->update(['applications.status' => 3]);
        $data = [$this->jobId, 3];
        $this->user->notify(new ApplyNotification($data));
        event(new NotificationEvent($this->user->id));
        $this->dispatchBrowserEvent('show-toast', ["type" => "success", "message" => 'Đã từ chối ứng viên']);
        $this->user = null;
        $this->statusUser = null;
        
    }

    public function finish($rating)
    {
        Rate::create([
            'rate' => $rating,
            'from_id' => auth()->id(),
            'to_id' => $this->user->id,
        ]);
        $this->job->users()->where('applications.user_id', $this->user->id)->update(['applications.status' => 4]);
        $data = [$this->jobId, 4];
        $this->user->notify(new ApplyNotification($data));
        event(new NotificationEvent($this->user->id));
        $this->dispatchBrowserEvent('show-toast', ["type" => "success", "message" => 'Công việc của ứng viên đã được hoàn thành']);
        $this->user = null;
        $this->statusUser = null;
    }
}
