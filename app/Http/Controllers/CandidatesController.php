<?php

namespace App\Http\Controllers;

use App\Models\Candidates;
use Illuminate\Http\Request;

class CandidatesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data=Candidates::all();

        return view('candidates.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('candidates.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data=new Candidates();
        $data -> cand_name=$request->name;
        $data -> cand_ccode=$request->ccode;
        $data -> cand_cname=$request->cname;
        $data-> cand_vote=0;
        $data -> save();
   
        return redirect()->route('candidates.create')
                        ->with('success','');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Candidates  $candidates
     * @return \Illuminate\Http\Response
     */
    public function show(Candidates $candidates)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Candidates  $candidates
     * @return \Illuminate\Http\Response
     */
    public function edit(Candidates $candidate)
    {
        return view('candidates.edit',compact('candidate'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Candidates  $candidates
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $candidate=Candidates::find($id);
        $candidate -> cand_name=$request->name;
        $candidate-> cand_ccode=$request->ccode;
        $candidate-> cand_cname=$request->cname;
        $candidate -> save();
        

        return redirect()->route('candidates.edit', $id)
                            ->with('success','');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Candidates  $candidates
     * @return \Illuminate\Http\Response
     */
    public function destroy(Candidates $candidate)
    {
        $candidate->delete();

        return redirect()->route('candidates.index')
                        ->with('success','');
    }
}
