<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Carbon\Carbon;
use Illuminate\Support\Facades\Artisan;

class RunScheduler extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'schedule:cron {--queue}';
    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Run the scheduler without cron (For use with Heroku etc)';

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
        $this->info('Waiting '. $this->nextMinute(). ' for next run of scheduler');
        sleep($this->nextMinute());
        $this->runScheduler();
    }
    protected function runScheduler()
    {
        $fn = $this->option('queue') ? 'queue' : 'call';

        $this->info('Running scheduler');
        Artisan::$fn('schedule:run');
        $this->info('completed, sleeping..'.$this->nextMinute());
        $this->handle();
        // sleep($this->nextMinute());
        // $this->runScheduler();

    }

    /**
     * Works out seconds until the next minute starts;
     *
     * @return int
     */
    protected function nextMinute()
    {
        date_default_timezone_set('Asia/Karachi');
        $date = date('Y-m-d H:i:s', time());
        // dd($date);
       $d1=strtotime($date);
      $dat2= date('Y-m-d 18:15:00');
        
        $d2 = strtotime($dat2);
        $totalSecondsDiff = abs($d1-$d2); //42600225
        $totalMinutesDiff = $totalSecondsDiff/60;
         return $totalMinutesDiff;
    }
}
