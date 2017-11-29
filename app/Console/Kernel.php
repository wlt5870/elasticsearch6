<?php

namespace App\Console;

use App\Console\Commands\CommandTest;
use App\Console\Commands\JobCommand;
use App\Console\Commands\RedisTest;
use App\Console\Commands\TestFirstCommand;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{

    /**
     * The Artisan commands provided by your application.
     *
     * @var array
     */
    protected $commands = [
        //
        CommandTest::class,
        RedisTest::class,
        JobCommand::class,
        TestFirstCommand::class
    ];

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule $schedule
     *
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        // $schedule->command('inspire')
        //          ->hourly();
        $schedule->command('redis:test')->everyMinute();
        $schedule->command('test:test-first')->everyMinute();
    }

    /**
     * Register the Closure based commands for the application.
     *
     * @return void
     */
    //protected function commands()
    //{
    //    require base_path('routes/console.php');
    //}
}
