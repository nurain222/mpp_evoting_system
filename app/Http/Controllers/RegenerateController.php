<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon as CarbonCarbon;

use App\Notifications\MppNotification;
use Illuminate\Support\Facades\Notification;

class RegenerateController extends Controller
{
    public function create()
    {
        return view('regenerate.create');
    }

    public function store(Request $request)
    {

        //regenerate otp process
        $user = Auth::user()->id;  //current user's id
        $voterEmail = User:: find($user);    //current user's email
        $otp = mt_rand(100000,999999);    //generate 6 digit otp code
        $user_loc = DB::table('ballot_box')->where('voter_id', $user);
        

        if ($user_loc)
        {
            //insert into database
            DB::table('ballot_box')->update([
                'otp_code' => $otp,
                'created_at' => CarbonCarbon::now()->toDateTimeString(),
                'updated_at' => CarbonCarbon::now()->toDateTimeString()
            ]);

             //send OTP code to the user through email
             $emailData = [
                'receiver' => 'Hello' . ' ' .Auth::user()->name .',',
                'body' => 'This is the newly regenerated OTP Code for the voting verification',
                'code' => $otp,
                'url' => url('/'),
                'note' => 'Use this code to vote for the election. Please do not share your code with anyone.'
            ];

            //Notification::send($voterEmail, new MppNotification($emailData));

            //redirect to verify page
            return redirect()->route('regenerate.create')->with('success','');
        }

        
    }
}
