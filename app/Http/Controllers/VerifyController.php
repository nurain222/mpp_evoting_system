<?php

namespace App\Http\Controllers;

use App\Models\Verify;
use App\Models\Voting;
use App\Models\User;
use App\Models\Candidates;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon as CarbonCarbon;
use App\Notifications\MppNotification;
use Illuminate\Support\Facades\Notification;

class VerifyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('verify.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = Auth::user()->id;   //current user's id
        $in_otp = $request->otp;   //input otp code

        //otp timeout process
        $date_string = DB::table('ballot_box')->where('voter_id', $user)->where('otp_code', $in_otp)->value('created_at');
        $date = strtotime($date_string);
        $date = strtotime("+2 minute", $date);
        $otp_limit = date('Y-m-d H:i:s', $date);
        $now = CarbonCarbon::now()->toDateTimeString();

        //find the ballot that id + otp matched
        $matched = DB::select("SELECT * from ballot_box where voter_id = '$user' and otp_code = '$in_otp'");


        if(!$matched){
            //error message pop-up
            return redirect()->route('verify.create')
            ->with('error','');
        }

        if($now >= $otp_limit)
        {
            //remove otp when time limit is reached
            DB::update("UPDATE ballot_box SET otp_code = null WHERE voter_id = '$user'");

            //redirect to otp regeneration page
            return redirect()->route('verify.create')
            ->with('expir','');
        }
        else
        {
            //find the ballot that id + otp matched
            //$matched = DB::select("SELECT * from ballot_box where voter_id = '$user' and otp_code = '$in_otp'");

            if ($matched)
            {
                //take the cand_id from ballot
                $elected = DB::table('ballot_box')->where('voter_id', $user)->where('otp_code', $in_otp)->value('cand_id');
                
                //take total vote from candidates table and increase by 1
                $vote_count_old = DB::table('candidates')->where('id', $elected)->value('cand_vote');
                $vote_count_new = $vote_count_old + 1;

                //update the new vote count
                $candidate=Candidates::find($elected);
                $candidate -> cand_vote=$vote_count_new;
                $candidate -> save();
                
                //generate voter ID
                $hashed = crc32(Auth::user()->email);
                $alpha = chr(rand(65,90));
                $num = random_int(0,9);
                $voterID = $alpha.$hashed.$num;

                //save voter ID into voters_list
                DB::table('voters_list')->insert([
                    'voter_id' => $voterID,
                ]);

                $voterEmail = User:: find($user);   //find current user's email

                //send voter ID to the user through email
                $emailData = [
                    'receiver' => 'Hello'. ' ' .Auth::user()->name .',',
                    'body' => 'Congratulations! You have voted successfully! This is your voter ID.',
                    'code' => $voterID,
                    'url' => url('/'),
                    'note' => 'You can use this code if you want to check your status.'
                ];
        
                Notification::send($voterEmail, new MppNotification($emailData));

                //change/update status from "Not Voted" to "Voted"
                $voter=User::find($user);
                $voter -> status="Voted";
                $voter -> save();

                //delete ballot from table upon a successful vote
                DB::table('ballot_box')->where('voter_id', $user)->where('otp_code', $in_otp)->delete();

                //success message pop-up
                return redirect()->route('verify.create')
                    ->with('success','');
            }
            else
            {
                //error message pop-up
                return redirect()->route('verify.create')
                    ->with('error','');
            }

        }
   
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Verify  $verify
     * @return \Illuminate\Http\Response
     */
    public function show(Verify $verify)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Verify  $verify
     * @return \Illuminate\Http\Response
     */
    public function edit(Verify $verify)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Verify  $verify
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Verify $verify)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Verify  $verify
     * @return \Illuminate\Http\Response
     */
    public function destroy(Verify $verify)
    {
        //
    }
}
