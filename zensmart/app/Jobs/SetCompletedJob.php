<?php

namespace App\Jobs;

use App\Counter;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class SetCompletedJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        // write a logic to set completed field from false to true,
        // when clock is 23:59
        $currentCount = Counter::where('completed', 0)->first();
        $currentCount->setCompletedAttribute(true);
        $currentCount->save();


        $newCounter = new Counter;
        $newCounter->clicksTally = 0;
        $newCounter->completed = false;
        $newCounter->save();
    }
}
