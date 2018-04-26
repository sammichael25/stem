<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Event;


class EventController extends Controller
{
    public function index(){
        $events = Event::all();

        return view('schedule.schedule', compact('events'));
    }

    public function store(){
        
    }
        

    
}