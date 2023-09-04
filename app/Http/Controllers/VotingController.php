<?php

namespace App\Http\Controllers;

use App\Models\Candidates;
use App\Models\User;
use App\Models\Voting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon as CarbonCarbon;

use App\Notifications\MppNotification;
use Illuminate\Support\Facades\Notification;

class VotingController extends Controller
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
        $candidates = Candidates::pluck('cand_name', 'id');

        return view('voting.create', compact('candidates'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = Auth::user()->id;  //current user's id
        $status = DB::table('users')->where('id', $user)->value('status');

        //if user's status voted / not voted (aka 1 voter = 1 vote only)
        if ($status == "Voted")
        {
            //error message pop-up
            return redirect()->route('voting.create')
            ->with('success','');
        }
        else if ($status == "Not Voted")
        {
            //voting process
            $voterEmail = User:: find($user);    //current user's email
            $otp = mt_rand(100000,999999);      //generate 6 digit otp code

            //insert into database
            DB::table('ballot_box')->insert([
                'voter_id' => $user,
                'cand_id' => $request->cand,
                'otp_code' => $otp,
                'created_at' => CarbonCarbon::now()->toDateTimeString(),
                'updated_at' => CarbonCarbon::now()->toDateTimeString()
            ]);

            //send OTP code to the user through email
            $emailData = [
                'receiver' => 'Hello'. ' ' .Auth::user()->name .',',
                'body' => 'This is the OTP Code for the voting verification',
                'code' => $otp,
                'url' => url('/'),
                'note' => 'Use this code to vote for the election. Please do not share your code with anyone.',
            ];

            Notification::send($voterEmail, new MppNotification($emailData));
            //redirect to verify page
            return redirect()->route('verify.create'); 
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Voting  $voting
     * @return \Illuminate\Http\Response
     */
    public function show(Voting $voting)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Voting  $voting
     * @return \Illuminate\Http\Response
     */
    public function edit(Voting $voting)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Voting  $voting
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Voting $voting)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Voting  $voting
     * @return \Illuminate\Http\Response
     */
    public function destroy(Voting $voting)
    {
        //
    }
}
