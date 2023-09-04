<?php

namespace App\Http\Controllers;

use App\Models\Analytics;

use App\Models\Candidates;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AnalyticsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $studdata=DB::select(DB::raw("select count(*) as total_stud, status from users group by status"));
        $resData=Candidates::all();

        $schartData="";
        $rchartData="";

        foreach($studdata as $list){
            $schartData.="['$list->status', $list->total_stud],";
        }

        $arr1['schartData']=$schartData;

        foreach($resData as $list){
            $rchartData.="['$list->cand_name', $list->cand_vote],";
        }

       $arr2['rchartData']=$rchartData;

        return view('analytics.index',$arr1,$arr2);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Analytics  $analytics
     * @return \Illuminate\Http\Response
     */
    public function show(Analytics $analytics)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Analytics  $analytics
     * @return \Illuminate\Http\Response
     */
    public function edit(Analytics $analytics)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Analytics  $analytics
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Analytics $analytics)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Analytics  $analytics
     * @return \Illuminate\Http\Response
     */
    public function destroy(Analytics $analytics)
    {
        //
    }
}
