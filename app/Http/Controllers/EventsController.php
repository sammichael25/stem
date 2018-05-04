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
                'end_date'=> $request->input('end_date'),
                'color'=> $request->input('color')
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
            //echo($id);
            $event = Event::where('id', $id)
            ->update([
                'title'=> $request->input('title'),
                'start_date'=> $request->input('start_date'),
                'end_date'=> $request->input('end_date'),
                'color'=> $request->input('color')
            ]);
        if($event){
                $response = ["success" => 'Event updated'];
                //return redirect()->route('events.index')->with('success','Event updated');
                return json_encode($response);
                //return response()->with('success','Event updated');
            }
        $response = ["error" => 'Event could not be updated'];
        return json_encode($response);
        }
        $response = ["error" => 'You are not authorised to edit data'];
        return json_encode($response);
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
        if(Auth::check()){
            $findEvent = Event::find($id);
            if($findEvent->delete()){
                $response = ["success" => 'Event deleted'];
                return json_encode($response);
            }
            $response = ["error" => 'Event could not be deleted'];
            return json_encode($response);
        }
        $response = ["error" => 'You are not authorised to delete data'];
        return json_encode($response);

    }
        

    
}