<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;


class HourlyReminder extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'reminder:hourly';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Artisan Command to send hourly reminder';

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
        //set scheduler action here:

        //API token
        $API_TOKEN = "5876601855:AAEJaocjGiVbCSuatxusqxD-BN4qsQsLO4w";

        //Notification data
        $data = [
            'chat_id' => "@mpp_election",
            'video' => "https://cdn.dribbble.com/users/20079/screenshots/5518477/vote2018_gif03_alt_drib.gif",
            'caption' => " \nThe election have started! Go and vote now! \n \n [ Note: This automated message happens every minute. ]",
        ];

        //Create url 
        $url = "https://api.telegram.org/bot$API_TOKEN/sendVideo?" . http_build_query($data);

        //Run url by executing curl session
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $sendTelegram = curl_exec($ch);
        curl_close($ch);
    
        return $sendTelegram;
    }
}
