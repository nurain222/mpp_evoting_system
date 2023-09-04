<?php

namespace App\Http\Controllers;

use App\Models\Time;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;

class TimeController extends Controller
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
        
        return view('time.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        DB::table('election_time')->insert([
            'startTime' => $request->start,
            'endTime' => $request->end,
        ]);

        return redirect()->route('time.create');
    }

   

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Time  $time
     * @return \Illuminate\Http\Response
     */
    public function show(Time $time)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Time  $time
     * @return \Illuminate\Http\Response
     */
    public function edit(Time $time)
    {
        return view('time.edit',compact('time'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Time  $time
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $time=Time::find($id);
        $time -> startTime=$request->start;
        $time-> endTime=$request->end;
        $time -> save();

        return redirect()->route('time.edit',1)
                            ->with('success','');
    }

    public function updating(Request $request)
    {
        $time_loc = DB::table('election_time')->where('id', 1);
        

        if ($time_loc)
        {
            //insert into database
            DB::table('election_time')->update([
                'startTime' => $request->start,
                'endTime' => $request->end,
            ]);
        }

        return redirect()->route('time.create');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Time  $time
     * @return \Illuminate\Http\Response
     */
    public function destroy(Time $time)
    {
        //
    }
}
