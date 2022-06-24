<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use App\Models\Job;

class ApplyNotification extends Notification
{
    use Queueable;
    
    protected $data;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($data)
    {
        $this->data = $data;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['database'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        return (new MailMessage)
                    ->line('The introduction to the notification.')
                    ->action('Notification Action', url('/'))
                    ->line('Thank you for using our application!');
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        $jobId = $this->data[0];
        $result;
        $notify;
        $route;
        if($this->data[1] == 1){
            $notify = 'Có 1 ứng viên vừa ứng tuyển vào công việc của bạn';
            $result = '1';
            $route = "http://localhost:8000/job/apply-list/".$jobId;
        }
        elseif($this->data[1] == 2){
            $notify = 'Đơn ứng tuyển của bạn đã được chấp nhận';
            $result = '2';
            $route = "http://localhost:8000/job/detail/".$jobId;
        }
        elseif($this->data[1] == 3){
            $notify = 'Đơn ứng tuyển của bạn đã bị từ chối';
            $result = '3';
            $route = "http://localhost:8000/job/detail/".$jobId;
        }
        else{
            $notify = 'Công việc của bạn đã hoàn thành';
            $result = '4';
            $route = "http://localhost:8000/job/detail/".$jobId;
        }

        return [
            'job' => Job::find($jobId)->title,
            'result' => $result,
            'route' => $route,
            'notify' => $notify,
        ];
    }
}
