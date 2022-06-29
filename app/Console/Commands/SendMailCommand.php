<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Mail;
use App\Models\Job;
use StdClass;
use Carbon\Carbon;

class SendMailCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'SendMailCommand';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {

        $mail = Mail::all();
        $data = [];
        $dayAgo = Carbon::now()->addDay(-1);
        $countNewJobs = Job::where('created_at', '>=', $dayAgo)->count();

        foreach ($mail as $key => $mail) {
            $data[$key]['sendTo'] = $mail->mail;
            $data[$key]['content'] = "Có " . $countNewJobs . " việc làm mới đăng. Truy cập website: http://localhost:8000/job/index để biết thêm thông tin";
        }
        sendMail($data);
    }
}
