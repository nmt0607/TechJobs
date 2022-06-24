<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\User;
use StdClass;

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
        
        $users = User::all();
        $data = [];
        foreach($users as $key => $user){
            $data[$key]['sendTo'] = $user->email;
            $data[$key]['content'] = "User ".$user->name."";
        }
        sendMail($data);  
    }
}
