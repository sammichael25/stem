<?php

namespace App\Http\Controllers;

use App\Student;
use App\Address;
use App\City;
use App\School;
use App\Emgccontact;
use App\Addition;
use App\Contact;
use App\Scontact;
use App\Pareent;

use Illuminate\Http\Request;
use DB;
use App\Quotation;

class BusariesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function ncma()
    {
        //
        $students = Addition::join('students', 'additions.student_id', '=', 'students.id')->where('additions.btype', '=', 'NCMA')->get();
        return view('student.students',['students'=>$students]);
    }

    public function ecma()
    {
        //
        $students = Addition::join('students', 'additions.student_id', '=', 'students.id')->where('additions.btype', '=', 'ECMA')->get();
        return view('student.students',['students'=>$students]);
    }

    public function cblock()
    {
        //
        $students = Addition::join('students', 'additions.student_id', '=', 'students.id')->where('additions.btype', '=', 'Central Block')->get();
        return view('student.students',['students'=>$students]);
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
