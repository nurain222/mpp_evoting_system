<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use App\Models\Time;

use Illuminate\Support\Facades\Log;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;


use Illuminate\Support\Facades\DB;
use Carbon\Carbon as CarbonCarbon;

class Kernel extends ConsoleKernel
{
    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        // set scheduler repetition here:
        date_default_timezone_set("Asia/Kuala_Lumpur");
        
        $start_string = DB::table('election_time')->where('id', 1)->value('startTime');
        $start = date('Y-d-m H:i:s', strtotime($start_string));
       
        $end_string = DB::table('election_time')->where('id', 1)->value('endTime');
        $end = date('Y-d-m H:i:s', strtotime($end_string));

        $now = date('Y-d-m H:i:s');
     
        $nearEnd = strtotime($end_string);
        $nearEnd = strtotime("-1 minute", $nearEnd);
        $limit = date('Y-d-m H:i:s', $nearEnd);

        $afterEnd = strtotime($end_string);
        $afterEnd = strtotime("+1 minute", $afterEnd);
        $wlimit = date('Y-d-m H:i:s', $afterEnd);

       if($now >= $start && $now <= $limit){
           $schedule->command('reminder:hourly')->everyMinute()->onSuccess(function () {
            Log::channel("alert")->info("Successful: Alert was send to Telegram.");
        })
        ->onFailure(function () {
            Log::channel("alert")->info("Failed: Alert was failed to send to Telegram.");
        });
       }

       if($now >= $end && $now <= $wlimit)
       {
         $schedule->command('check:everyMinute')->onSuccess(function () {
          Log::channel("annoucement")->info("Successful: Annoucement was send to Telegram.");
      })
      ->onFailure(function () {
          Log::channel("announcement")->info("Failed: Annoucement was failed to send to Telegram.");
      });
       }

        //->sendOutputTo('/reminder.txt');

       /*
         //check time and compare to end time
          $schedule->command('check:everyMinute')->when(function() use($end){
            $now = date('Y-d-m H:i:s');
           return CarbonCarbon::createFromFormat('Y-d-m H:i:s', $end)->isPast();
           //return $now <= $end ;
        }); 
        */
       

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
