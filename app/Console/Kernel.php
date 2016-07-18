<?php

namespace App\Console;


use App\Console\Commands\ScanPageLogStatTask;
use Illuminate\Console\Scheduling\Schedule;
use App\Console\Commands\Inspire;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * The Artisan commands provided by your application.
     *
     * @var array
     */
    protected $commands = [
        Inspire::class,
        ScanPageLogStatTask::class
    ];

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        $schedule->command('scan_page_log_stat')->dailyAt('0:00')->timezone('Asia/Shanghai')->when(function(){
            return true;
        })->appendOutputTo(storage_path('/logs/scan_page_log_stat.log'));
    }
}
