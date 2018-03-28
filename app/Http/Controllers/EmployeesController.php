<?php

namespace App\Http\Controllers;

use App\Employee;
use App\Address;
use App\City;
use App\Emgccontact;
use App\Contact;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EmployeesController extends Controller
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

    public function supportStaff()
    {
        //
        $employees = Employee::where('type', '=', 'Support Staff')->get();
        return view('employee.employees',['employees'=>$employees]);
    }

    public function facilitators()
    {
        //
        $employees = Employee::where('type','=','Facilitator')->get();
        return view('employee.employees',['employees'=>$employees]);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $cities = City::orderBy('name', 'asc')->get();
        return view('employee.create',compact('cities'));
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
            $employeeAddress = Address::create([
                'address1'=> $request->input('add1'),
                'address2'=> $request->input('add2'),
                'city_id'=> $request->input('city'),
                'type'=> 'Employee'
            ]);

            $employeeContact = Contact::create([
                'mobile1'=> $request->input('mobile1'),
                'mobile2'=> $request->input('mobile2'),       
                'home'=> $request->input('home'),
                'work'=> $request->input('work'),       
                'email1'=> $request->input('email1'),
                'email2'=> $request->input('email2'),
                'type'=> 'Employee'
            ]);

            $employeeEmgcContact = Contact::create([
                'mobile1'=> $request->input('emgc_mobile'),       
                'email1'=> $request->input('emgc_email'),        
                'work'=> $request->input('emgc_work'),        
                'type'=> 'Emergency'
            ]);

            $employeeEmgc = Emgccontact::create([
                'fname'=> $request->input('emgc_fname'),
                'lname'=> $request->input('emgc_lname'),
                'relation'=> $request->input('relation'),
                'contact_id'=>$employeeEmgcContact->id
            ]);

            $employeeMember = Employee::create([
                'fname'=> $request->input('fname'),
                'mname'=> $request->input('mname'),
                'lname'=> $request->input('lname'),
                'dob'=> $request->input('dob'),
                'sex'=> $request->input('sex'),
                'degree'=> $request->input('degree'),
                'driver'=> $request->input('driver'),
                'status'=> $request->input('status'),
                'career'=> $request->input('career'),
                'shirt'=> $request->input('t-shirt'),
                'allergy'=> $request->input('allergy'),
                'meal'=> $request->input('meal'),
                'type'=> $request->input('s_type'),
                'yr'=> $request->input('stem_yr'),
                'address_id'=>$employeeAddress->id,
                'contact_id'=>$employeeContact->id,
                'emgccontact_id'=>$employeeEmgc->id
            ]);
        if($employeeAddress && $employeeContact && $employeeEmgcContact &&  $employeeEmgc && $employeeMember){
                return redirect()->route('employees.create')
                    ->with('success','Staff Member added successfully');
            }
        }
        return back()->withInput('errors' , 'Staff Member could NOT be added');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Employee $employee)
    {
        //
        //Both would work
        $employee = Employee::where('id', $employee->id )->first();
        //$employee = Employee::find($employee->id);
        return view('employee.employee',['employee'=>$employee]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Employee $employee)
    {
        //
        $employee = Employee::where('id', $employee->id )->first();        
        $cities = City::orderBy('name', 'asc')->get();
        $shirts = array("X-Small", "Small", "Medium", "Large", "X-Large");
        $meals = array("Vegetarian", "Vegan", "Meat", "Fish");
        $types = array("Facilitator", "Support Staff");
        $relations = array("Mother", "Father", "Grandfather", "Grandmother","Aunt","Uncle","Brother","Sister","Guardian");
        return view('employee.edit',compact('employee','cities','shirts','meals','types','relations'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Employee $employee)
    {
        //
        if(Auth::check()){
            $employeeAddress = Address::where('id', $employee->address->id)
            ->update([
                'address1'=> $request->input('add1'),
                'address2'=> $request->input('add2'),
                'city_id'=> $request->input('city'),
                'type'=> 'Employee'
            ]);

            $employeeContact = Contact::where('id', $employee->contact->id)
            ->update([
                'mobile1'=> $request->input('mobile1'),
                'mobile2'=> $request->input('mobile2'),       
                'home'=> $request->input('home'),
                'work'=> $request->input('work'),       
                'email1'=> $request->input('email1'),
                'email2'=> $request->input('email2'),
                'type'=> 'Employee'
            ]);

            $employeeEmgcContact = Contact::where('id', $employee->emgccontact->contact->id)
            ->update([
                'mobile1'=> $request->input('emgc_mobile'),       
                'email1'=> $request->input('emgc_email'),        
                'work'=> $request->input('emgc_work'),        
                'type'=> 'Emergency'
            ]);

            $employeeEmgc = Emgccontact::where('id', $employee->emgccontact->id)
            ->update([
                'fname'=> $request->input('emgc_fname'),
                'lname'=> $request->input('emgc_lname'),
                'relation'=> $request->input('relation'),
                'contact_id'=>$employee->emgccontact->contact->id
            ]);

            $employee->update([
                'fname'=> $request->input('fname'),
                'mname'=> $request->input('mname'),
                'lname'=> $request->input('lname'),
                'dob'=> $request->input('dob'),
                'sex'=> $request->input('sex'),
                'degree'=> $request->input('degree'),
                'driver'=> $request->input('driver'),
                'status'=> $request->input('status'),
                'career'=> $request->input('career'),
                'shirt'=> $request->input('t-shirt'),
                'allergy'=> $request->input('allergy'),
                'meal'=> $request->input('meal'),
                'type'=> $request->input('s_type'),
                'yr'=> $request->input('stem_yr'),
                'address_id'=>$employee->address->id,
                'contact_id'=>$employee->contact->id,
                'emgccontact_id'=>$employee->emgccontact->id
            ]);
        if($employeeAddress && $employeeContact && $employeeEmgcContact &&  $employeeEmgc && $employee){
                return redirect()->route('employees.edit', ['employee'=> $employee->id])
                    ->with('success','Staff Member successfully updated');
            }
        }
        return back()->withInput('errors' , 'Staff Member could NOT be updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Employee $employee)
    {
        //dd($student);
        $findEmployee = Employee::find($employee->id);
        if($findEmployee->type === 'Facilitator' && $findEmployee->delete()){
            //redirect
            return redirect()->action('EmployeesController@facilitators')
                ->with('success' , 'Student deleted successfully');
        }elseif($findEmployee->type === 'Support Staff' && $findEmployee->delete()){
            //redirect
            return redirect()->action('EmployeesController@supportStaff')
                ->with('success' , 'Student deleted successfully');
        } 
        return back()->withInput('errors' , 'Student could NOT be deleted');
    }
}
