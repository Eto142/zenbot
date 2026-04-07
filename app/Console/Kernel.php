<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */

    protected $commands = [
            Commands\CalculateROI::class,
    ];

    protected function schedule(Schedule $schedule)
    {
        
        //everyMinute();
        // $schedule->command('inspire')->hourly();
      //$schedule->command('calculate:roi')->everyMinute();
      //$schedule->command('calculate:roi')->cron('* * * * *');
       $schedule->command('calculate:roi')->daily();

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
