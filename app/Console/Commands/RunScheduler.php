<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Carbon\Carbon;
use Illuminate\Support\Facades\Artisan;
use App\{Country,State,City,User,Contactus,Category,Ad,AdImage,AdRequest};
use Mail;
use DB;
use Auth;
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
        $ad=Ad::where('status',0)->get();

        $this->info('completed, sleeping..\n'.$this->nextMinute());
        sleep($this->nextMinute());
        $this->runScheduler();

    }

    /**
     * Works out seconds until the next minute starts;
     *
     * @return int
     */
    protected function nextMinute()
    {
        date_default_timezone_set('Australia/sydney');
        $date = date('Y-m-d H:i:s', time());
    
       $d1=strtotime($date);
      $dat2= date('Y-m-d 24:00:00');
        
        $d2 = strtotime($dat2);
        $totalSecondsDiff = abs($d1-$d2); 
        
         return $totalSecondsDiff;
    }
}
