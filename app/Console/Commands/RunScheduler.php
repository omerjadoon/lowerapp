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
        $this->info('completed, sleeping..');
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
        $current = Carbon::now();
        return 60 -$current->second;
    }
}
