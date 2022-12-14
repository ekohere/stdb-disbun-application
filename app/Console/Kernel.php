<?php

namespace App\Console;

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
    ];

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        // $schedule->command('inspire')->hourly();
        $schedule->command('media-library:delete-old-temporary-uploads')->daily();
        $schedule->command('command:postgre2shp')->everyMinute();

        $schedule->command('command:check-apl')->everyMinute();
        $schedule->command('command:check-rtrw')->everyMinute();
        $schedule->command('command:check-rtrw-gagal')->everyMinute();

        //schedule for STDB Rilis
        $schedule->command('command:create-resource-stdb-rilis')->yearly();
        $schedule->command('command:update-resource-stdb-rilis')->monthly();
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
