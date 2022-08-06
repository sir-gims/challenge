<?php

namespace App\Console;

use App\Counter;
use App\Jobs\SetCompletedJob;
use Carbon\Carbon;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
use Illuminate\Support\Facades\DB;

class Kernel extends ConsoleKernel
{
    /**
     * The Artisan commands provided by your application.
     *
     * @var array
     */
    protected $commands = [
        //
    ];

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        // $schedule->command('inspire')
        //          ->hourly();
//        $schedule->job(new SetCompletedJob)->everyMinute();
        // this runs only once, because you have to register this in crontab
//        $schedule->call(function () {
//            $currentCount = Counter::where('completed', 0)->first();
//            $currentCount->setCompletedAttribute(true);
//            $currentCount->save();
//
//            $newCounter = new Counter;
//            $newCounter->clicksTally = 0;
//            $newCounter->completed = false;
//            $newCounter->save();
//        })->daily();
    }

    /**
     * Register the commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}
