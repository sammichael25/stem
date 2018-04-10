<?php

namespace App\Http\Controllers;

use App\Stemcenter;
use App\Centerattendance;

use Illuminate\Http\Request;

class StemcentersController extends Controller
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
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function support()
    {
        //
        $attendances = Stemcenter::join('centerattendances', 'centerattendances.stemcenter_id', '=', 'stemcenters.id')->where('type', '=', 'Student Support')->orderBy('name', 'asc')->get();
        $stemcenters = Stemcenter::where('type', '=', 'Student Support')->get();
        return view('center.centers',['stemcenters'=>$stemcenters]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function technical()
    {
        //
        $stemcenters = Stemcenter::where('type', '=', 'Technical Training')->get();
        return view('center.centers',['stemcenters'=>$stemcenters]);
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Stemcenter $stemcenter)
    {
        //
        $attendances = Centerattendance::where('stemcenter_id', '=', $stemcenter->id)->orderBy('last_session_date', 'asc')->get();
        $totalAttendances = array();
        $maleAttendances = array();
        $femaleAttendances = array();
        $attendancesDate = array();
        foreach($attendances as $attendance ){
            array_push($totalAttendances,$attendance->last_session_total);
            array_push($maleAttendances,$attendance->last_session_males);
            array_push($femaleAttendances,$attendance->last_session_females);
            array_push($attendancesDate,$attendance->last_session_date);
        }
        $stemcenter = Stemcenter::find($stemcenter->id);
        return view('center.center',compact('stemcenter','totalAttendances','maleAttendances','femaleAttendances','attendancesDate'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
