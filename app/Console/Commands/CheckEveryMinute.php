<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

use Illuminate\Support\Facades\DB;

use Carbon\Carbon as CarbonCarbon;

class CheckEveryMinute extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'check:everyMinute';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Check current time and compare to election end time';

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

        //Find highest vote count
        $max = DB::table('candidates')->max('cand_vote');
        
        //Get candidate name, course code, course name with the highest vote count
        $winner = DB::table('candidates')->where('cand_vote', $max)->value('cand_name');
        $winnerCC = DB::table('candidates')->where('cand_vote', $max)->value('cand_ccode');
        $winnerCN = DB::table('candidates')->where('cand_vote', $max)->value('cand_cname');

        //API token
        $API_TOKEN = "5876601855:AAEJaocjGiVbCSuatxusqxD-BN4qsQsLO4w";

        //Notification data
        $data = [
            'chat_id' => "@mpp_election",
            'video' => "https://cdn.dribbble.com/users/69311/screenshots/1226327/congrats-gif-edit.gif",
            'caption' => " \nThe election has come to an end! Congratulations to ". $winner.
                         " from ". $winnerCC. " - ". $winnerCN. " for the win!",
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
