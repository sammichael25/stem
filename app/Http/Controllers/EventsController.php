<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Event;


class EventsController extends Controller
{
    public function index(){
        $events = Event::all();

        return view('schedule.schedule', compact('events'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
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
        if(Auth::check()){
            $event = Event::create([
                'title'=> $request->input('title'),
                'start_date'=> $request->input('start_date'),
                'end_date'=> $request->input('end_date')
            ]);
            if($event){
                return back()->with('success','Event added');
            }
        }
        return back()->withInput('errors' , 'Event could NOT be added');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
    public function update(Request $request,$id)
    {
        //
        if(Auth::check()){
            //echo($request->input('start_date'));
            $Newevent = Event::where('id', $id)
            ->update([
                'title'=> $request->input('title'),
                'start_date'=> $request->input('start_date'),
                'end_date'=> $request->input('end_date')
            ]);
        if($Newevent != null){
                return redirect()->route('events.index')->with('success','Event updated');
                //return response()->with('success','Event updated');
            }
        }
        return back()->withInput('errors' , 'Event could NOT be updated');
        //echo('error');
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