<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CheckController extends Controller
{
    public function index()
    {
        return view('check.index');
    }

    public function store(Request $request)
    {
        $searchIN = $request->search;
        $found= DB::select("SELECT * from voters_list where voter_id = '$searchIN'");
   
        if($found)
        {
            //success message pop-up
            return redirect()->route('check.index')
            ->with('success','');
        }
        else
        {
            //error message pop-up
            return redirect()->route('check.index')
            ->with('error','');
        }
    }

}
