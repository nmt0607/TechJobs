<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Http;
use App\Models\FundNAV;


class UpdateVNIndexCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'uploadVNIndex';

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
        Log::info('uploadVNIndex');
        $response = Http::get('https://api.tradingeconomics.com/markets/search/vnindex?c=guest:guest');
        $data = $response->collect()->first();
        FundNAV::updateOrCreate([
            'trading_session_time' => substr($data['Date'], 0, 10),
            'type' => 1,
        ],[
            'amount' => $data['Last'],
        ]);
        Log::info($data['Last'].' '.substr($data['Date'], 0, 10));
    }
}
