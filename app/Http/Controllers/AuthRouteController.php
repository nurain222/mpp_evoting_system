<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

use Illuminate\Support\Facades\DB;

class AuthRouteController extends Controller
{
    public function index()
    {

        $user = User::find(Auth::user()->id);

        if($user->hasRole('admins'))
        {
            return view ('dashboard');
        }
        else if($user->hasRole('students'))
        {
            date_default_timezone_set("Asia/Kuala_Lumpur");
            $now = date('Y-d-m H:i:s');

            $start_string = DB::table('election_time')->where('id', 1)->value('startTime');
            $start = date('Y-d-m H:i:s', strtotime($start_string));

            $end_string = DB::table('election_time')->where('id', 1)->value('endTime');
            $end = date('Y-d-m H:i:s', strtotime($end_string));

            if($now >= $start && $now <= $end){
                return view ('main');
            }
            else{
                return view ('error');
            }


            
        }
    }
}
