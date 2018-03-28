<?php

namespace App\Http\Controllers;


use App\Student;
use App\Address;
use App\City;
use App\Stemcenter;
use App\School;
use App\Emgccontact;
use App\Addition;
use App\Contact;
use App\Scontact;
use App\Pareent;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StudentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $students = Student::all();


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
        $schools = School::orderBy('name', 'asc')->get();
        $cities = City::orderBy('name', 'asc')->get();
        $stemcenters = Stemcenter::orderBy('name', 'asc')->get();
        return view('student.studentform',compact('cities','schools','stemcenters'));
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
                
            $paddress = Address::create([
                'address1'=> $request->input('1add1'),
                'address2'=> $request->input('2add1'),
                'city_id'=> $request->input('city1'),
                'type'=> 'Parent'
            ]);

            $pcontact = Contact::create([
                'mobile1'=> $request->input('1mobile1'),
                'mobile2'=> $request->input('2mobile1'),       
                'home'=> $request->input('home1'),
                'work'=> $request->input('work1'),       
                'email1'=> $request->input('1email1'),
                'email2'=> $request->input('2email1'),
                'type'=> 'Parent'
            ]);

            $parent = Pareent::create([
                'pfname'=> $request->input('pfname1'),
                'plname'=> $request->input('plname1'),
                'type'=> $request->input('type1'),
                'address_id'=> $paddress->id,
                'contact_id'=> $pcontact->id
            ]);


            if(($request->input('pfname2')!= null) && ($request->input('plname2')!= null) ){
                $paddress2 = Address::create([
                    'address1'=> $request->input('1add2'),
                    'address2'=> $request->input('2add2'),
                    'city_id'=> $request->input('city2'),
                    'type'=> 'Parent'
                ]);

                $pcontact2 = Contact::create([
                    'mobile1'=> $request->input('1mobile2'),
                    'mobile2'=> $request->input('2mobile2'),       
                    'home'=> $request->input('home2'),
                    'work'=> $request->input('work2'),       
                    'email1'=> $request->input('1email2'),
                    'email2'=> $request->input('2email2'),
                    'type'=> 'Parent'
                ]);

                $parent2 = Pareent::create([
                    'pfname'=> $request->input('pfname2'),
                    'plname'=> $request->input('plname2'),
                    'type'=> $request->input('type2'),
                    'address_id'=> $paddress2->id,
                    'contact_id'=> $pcontact2->id
                ]);
            }
            
            $st_address = Address::create([
                'address1'=> $request->input('add1'),
                'address2'=> $request->input('add2'),
                'city_id'=> $request->input('city'),
                'type'=> 'Student'
            ]);

            $st_contact = Contact::create([
                'mobile1'=> $request->input('mobile'),       
                'email1'=> $request->input('email'),        
                'type'=> 'Student'
            ]);

            $emgccontact = Contact::create([
                'mobile1'=> $request->input('emgc_mobile'),       
                'email1'=> $request->input('emgc_email'),        
                'work'=> $request->input('emgc_work'),        
                'type'=> 'Emergency'
            ]);

            $emgc = Emgccontact::create([
                'fname'=> $request->input('emgc_fname'),
                'lname'=> $request->input('emgc_lname'),
                'relation'=> $request->input('relation'),
                'contact_id'=>$emgccontact->id
            ]);

            $student = Student::create([
                'fname'=> $request->input('fname'),
                'mname'=> $request->input('mname'),
                'lname'=> $request->input('lname'),
                'sex'=> $request->input('sex'),
                'dob'=> $request->input('dob'),
                'yeargroup'=> $request->input('year_group'),
                'school_id'=>$request->input('school'),
                'address_id'=>$st_address->id,
                'contact_id'=>$st_contact->id,
                'emgccontact_id'=>$emgc->id
            ]);

            $student = Student::find($student->id);
            $student->pareent()->attach($parent->id);
            $student->pareent()->attach($parent2->id);

            $addition = Addition::create([
                'career'=> $request->input('career'),
                'shirt'=> $request->input('t-shirt'),
                'allergy'=> $request->input('allergy'),
                'meal'=> $request->input('meal'),
                'type'=> $request->input('s_type'),
                'btype'=> $request->input('busary_type'),
                'shoe'=> $request->input('shoe_size'),
                'degree'=> $request->input('degree'),
                'stemcenter_id'=> $request->input('center'),
                'yr'=> $request->input('stem_yr'),
                'student_id'=>$student->id
            ]);
            

            if($paddress && $pcontact && $parent &&  $st_address && $st_contact && $student && $addition && $emgccontact && $emgc){
                return redirect()->route('students.create')
                    ->with('success','Student added successfully');
            }
        }
        return back()->withInput('errors' , 'Student could NOT be added');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function show(Student $student)
    {
        //Both would work
        $student = Student::where('id', $student->id )->first();
        //$student = Student::find($student->id);
        return view('student.student',['student'=>$student]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function edit(Student $student)
    {
        //
        $student = Student::where('id', $student->id )->first();
        $schools = School::orderBy('name', 'asc')->get();
        $cities = City::orderBy('name', 'asc')->get();
        $stemcenters = Stemcenter::orderBy('name', 'asc')->get();
        $shirts = array("X-Small", "Small", "Medium", "Large", "X-Large");
        $meals = array("Vegetarian", "Vegan", "Meat", "Fish");
        $types = array("Busary", "Technical", "Academic");
        $btypes = array("NCMA", "ECMA", "Central Block");
        $relations = array("Mother", "Father", "Grandfather", "Grandmother","Aunt","Uncle","Brother","Sister","Guardian");
        return view('student.student', compact('student', 'cities', 'schools', 'shirts','meals','types','btypes','relations','stemcenters'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Student $student)
    {
        //
        if(Auth::check()){
                
            $paddress = Address::where('id', $student->pareent[0]->address->id)
            ->update([
                'address1'=> $request->input('1add1'),
                'address2'=> $request->input('2add1'),
                'city_id'=> $request->input('city1'),
                'type'=> 'Parent'
            ]);

            $pcontact = Contact::where('id', $student->pareent[0]->contact->id)
            ->update([
                'mobile1'=> $request->input('1mobile1'),
                'mobile2'=> $request->input('2mobile1'),       
                'home'=> $request->input('home1'),
                'work'=> $request->input('work1'),       
                'email1'=> $request->input('1email1'),
                'email2'=> $request->input('2email1'),
                'type'=> 'Parent'
            ]);

            $parent = Pareent::where('id', $student->pareent[0]->id)
            ->update([
                'pfname'=> $request->input('pfname1'),
                'plname'=> $request->input('plname1'),
                'type'=> $request->input('type1'),
                'address_id'=> $student->pareent[0]->address->id,
                'contact_id'=> $student->pareent[0]->contact->id
            ]);


            if(($request->input('pfname2')!= null) && ($request->input('plname2')!= null) ){
                $paddress2 = Address::where('id', $student->pareent[1]->address->id)
                ->update([
                    'address1'=> $request->input('1add2'),
                    'address2'=> $request->input('2add2'),
                    'city_id'=> $request->input('city2'),
                    'type'=> 'Parent'
                ]);

                $pcontact2 = Contact::where('id', $student->pareent[1]->contact->id)
                ->update([
                    'mobile1'=> $request->input('1mobile2'),
                    'mobile2'=> $request->input('2mobile2'),       
                    'home'=> $request->input('home2'),
                    'work'=> $request->input('work2'),       
                    'email1'=> $request->input('1email2'),
                    'email2'=> $request->input('2email2'),
                    'type'=> 'Parent'
                ]);

                $parent2 = Pareent::where('id', $student->pareent[1]->id)
                ->update([
                    'pfname'=> $request->input('pfname2'),
                    'plname'=> $request->input('plname2'),
                    'type'=> $request->input('type2'),
                    'address_id'=> $student->pareent[1]->address->id,
                    'contact_id'=> $student->pareent[1]->contact->id
                ]);
            }
            
            $st_address = Address::where('id', $student->address->id)
            ->update([
                'address1'=> $request->input('add1'),
                'address2'=> $request->input('add2'),
                'city_id'=> $request->input('city'),
                'type'=> 'Student'
            ]);

            $st_contact = Contact::where('id', $student->contact->id)
            ->update([
                'mobile1'=> $request->input('mobile'),       
                'email1'=> $request->input('email'),        
                'type'=> 'Student'
            ]);

            $emgccontact = Contact::where('id', $student->emgccontact->contact->id)
            ->update([
                'mobile1'=> $request->input('emgc_mobile'),       
                'email1'=> $request->input('emgc_email'),        
                'work'=> $request->input('emgc_work'),        
                'type'=> 'Emergency'
            ]);

            $emgc = Emgccontact::where('id', $student->emgccontact->id)
            ->update([
                'fname'=> $request->input('emgc_fname'),
                'lname'=> $request->input('emgc_lname'),
                'relation'=> $request->input('relation'),
                'contact_id'=>$student->emgccontact->contact->id
            ]);

            $student->update([
                'fname'=> $request->input('fname'),
                'mname'=> $request->input('mname'),
                'lname'=> $request->input('lname'),
                'sex'=> $request->input('sex'),
                'dob'=> $request->input('dob'),
                'yeargroup'=> $request->input('year_group'),
                'school_id'=>$request->input('school'),
                'address_id'=>$student->address->id,
                'contact_id'=>$student->contact->id,
                'emgccontact_id'=>$student->emgccontact->id
            ]);

            $student->pareent()->attach($student->pareent[0]->id);
            $student->pareent()->attach($student->pareent[1]->id);

            $addition = Addition::where('id', $student->addition->id)
            ->update([
                'career'=> $request->input('career'),
                'shirt'=> $request->input('t-shirt'),
                'allergy'=> $request->input('allergy'),
                'meal'=> $request->input('meal'),
                'type'=> $request->input('s_type'),
                'btype'=> $request->input('busary_type'),
                'shoe'=> $request->input('shoe_size'),
                'degree'=> $request->input('degree'),
                'stemcenter_id'=> $request->input('center'),
                'yr'=> $request->input('stem_yr'),
                'student_id'=>$student->id
            ]);

        if ($paddress && $pcontact && $parent &&  $st_address && $st_contact && $student && $addition && $emgccontact && $emgc){
            return redirect()->route('students.edit', ['student'=> $student->id])
            ->with('success', 'Student info updated successfully');
        }
    }
        return back()->withInput('errors' , 'Student could NOT be updated');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function destroy(Student $student)
    {
        //dd($student);
        $findStudent = Student::find($student->id);
        if($findStudent->delete()){
            //redirect
            return redirect()->route('students.index')
                ->with('success' , 'Student deleted successfully');
        }
        return back()->withInput('errors' , 'Student could NOT be deleted');
    }

}
