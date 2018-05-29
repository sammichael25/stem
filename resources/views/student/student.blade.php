@extends('layouts.layout')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <form id="UpdateValidationDoc" action="{{ route('students.update',[$student->id]) }}" method="POST">
                    {{ csrf_field() }}
                    <input type="hidden" name="_method" value="put">
                    <div id="rootwizard">
                        <div class="card card-nav-tabs">
                            <div class="card-header" data-background-color="purple">
                                <div class="nav-tabs-navigation">
                                    <div class="nav-tabs-wrapper">
                                        <span class="nav-tabs-title">Student Info:</span>
                                        <ul class="nav nav-tabs" data-tabs="tabs">
                                            <li class="active">
                                                <a href="#tab1" data-toggle="tab">
                                                    <i class="material-icons">child_care</i>
                                                    General
                                                    <div class="ripple-container"></div></a>
                                            </li>
                                            <li class="" >
                                                <a href="#tab2" data-toggle="tab">
                                                    <i class="material-icons">wc</i>
                                                    Parent/Guardian Info
                                                    <div class="ripple-container"></div></a>
                                            </li>
                                            <li class="" >
                                                <a href="#tab3" data-toggle="tab">
                                                    <i class="material-icons">contact_phone</i>
                                                    Contact Info
                                                    <div class="ripple-container"></div></a>
                                            </li>
                                            <li class="" >
                                                <a href="#tab4" data-toggle="tab">
                                                    <i class="material-icons">business_center</i>
                                                    STEM Info
                                                    <div class="ripple-container"></div></a>
                                            </li>
                                            <li class="">
                                                <a href="#tab5" data-toggle="tab">
                                                    <i class="material-icons">local_hospital</i>
                                                    Emergency Info
                                                    <div class="ripple-container"></div></a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="card-content">
                                <div class="tab-content">
                                    <div class="tab-pane active" id="tab1">
                                        <div class="row">
                                                <div class="col-md-4">
                                                    <div class="form-group label-floating">
                                                        <label class="control-label">First Name</label>
                                                        <input type="text"
                                                            name="fname"
                                                            id="student-fname"
                                                            value="{{$student->fname}}"
                                                            class="form-control"
                                                            spellcheck="false"
                                                        >
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group label-floating">
                                                        <label class="control-label">Middle Name</label>
                                                        <input type="text"
                                                            name="mname"
                                                            id="student-mname"
                                                            value="{{$student->mname}}"
                                                            class="form-control"
                                                            spellcheck="false"
                                                        >
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group label-floating">
                                                        <label class="control-label">Last Name</label>
                                                        <input type="text"
                                                            name="lname"
                                                            id="student-lname"
                                                            value="{{$student->lname}}"
                                                            class="form-control"
                                                            spellcheck="false"
                                                        >
                                                    </div>
                                                </div>
                                            </div>
                                            <br>
                                            <hr>
                                            <br>
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <div class="form-group label-floating">
                                                        <label class="col-sm-2 label-on-left">Sex</label>
                                                        <div class="radio">
                                                            <label>
                                                                <input id="male" value="Male" type="radio" name="sex">
                                                                Male
                                                            </label>
                                                            <label>
                                                                <input id="female" value="Female" type="radio" name="sex">
                                                                Female
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group label-floating">
                                                        <label class="control-label">DOB</label>
                                                        <input type="text" id="datetimepicker1" value="{{$student->dob}}" name="dob" class="form-control datetimepicker"/>

                                                    </div>
                                                </div>
                                            </div>
                                            <br>
                                            <hr>
                                            <br>
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <div class="form-group label-floating">
                                                        <label class="control-label">Address 1</label>
                                                        <input type="text" value="{{$student->address->address1}}" class="form-control" name="add1">
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group label-floating">
                                                        <label class="control-label">Address 2</label>
                                                        <input type="text" value="{{$student->address->address2}}" class="form-control" name="add2">
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group label-floating">
                                                        <label  for="student-address-city" class="control-label">City</label>
                                                        <select class="form-control" name="city" id="student-address-city">
                                                            <option selected hidden>Choose City</option>
                                                            @foreach($cities as $city)

                                                                @if($student->address->city_id === $city->id)
                                                                    <option selected value="{{$student->address->city_id}}">{{$city->name}}</option>
                                                                @else
                                                                    <option  value="{{$city->id}}">{{$city->name}}</option>
                                                                @endif

                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <br>
                                            <hr>
                                            <br>
                                            <div class="row" id="tab1finalrow" >
                                                <div class="col-md-4">
                                                    <div class="form-group label-floating">
                                                        <label for="student-school-name" class="control-label">School</label>
                                                        <select onchange="uwiCheck2(this)" class="form-control" name="school" id="student-school-name">
                                                            <option hidden>Choose School</option>
                                                            @foreach($schools as $school)
                                                                @if($student->school->id === $school->id)
                                                                    <option selected value="{{$student->school->id}}">{{$school->name}}</option>
                                                                @else
                                                                    <option value="{{$school->id}}">{{$school->name}}</option>
                                                                @endif
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group label-floating">
                                                        <label for="datetimepicker2"  class="control-label">Year Group</label>
                                                        <input type="text" name="year_group" value='2000' id = "datetimepicker2" class="form-control datetimepicker"/>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group label-floating">
                                                        <label for="form"  class="control-label">Form Class</label>
                                                        <input type="text" value="{{$student->form}}" name="form" id = "form" class="form-control"/>
                                                    </div>
                                                </div>
                                            </div>
                                            
                                            <div class="clearfix"></div>
                                    </div>
                                    <div class="tab-pane" id="tab2">
                                        <div id="parents">
                                            <fieldset id="addSection">
                                                <legend>Parent 1</legend>
                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <div class="form-group label-floating">
                                                            <label class="control-label">First Name</label>
                                                            <input type="text" value="{{$parent1->pfname}}" name="pfname1" id="parent-pfname1" class="form-control" spellcheck="false" > 
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group label-floating">
                                                            <label class="control-label">Last Name</label>
                                                            <input type="text" value="{{$parent1->plname}}" name="plname1" id="parent-plname1" class="form-control" spellcheck="false" > 
                                                        </div> 
                                                    </div>
                                                    <div class="col-md-4">
                                                    <div class="form-group label-floating">
                                                        <label class="col-sm-2 label-on-left">Type</label>
                                                        <div class="radio">
                                                            <label>
                                                                <input id="mother1" value="Mother" type="radio" name="type1">
                                                                Mother
                                                            </label>
                                                            <label>
                                                                <input id="father1" value="Father" type="radio" name="type1">
                                                                Father
                                                            </label>
                                                            <label>
                                                                <input id="guardian1" value="Guardian" type="radio" name="type1">
                                                                Guardian
                                                            </label>
                                                        </div>
                                                    </div>
                                                    </div> 
                                                </div> 
                                                <br> 
                                                <hr> 
                                                <br>
                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <div class="form-group label-floating">
                                                            <label class="control-label">Address 1</label> 
                                                            <input type="text" value="{{$parent1->address->address1}}" class="form-control" name="1add1"> 
                                                        </div> 
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group label-floating"> 
                                                            <label class="control-label">Address 2</label> 
                                                            <input type="text" value="{{$parent1->address->address2}}" class="form-control" name="2add1"> 
                                                        </div> 
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group label-floating"> 
                                                            <label  for="student-address-city1" class="control-label">City</label>
                                                            <select class="form-control" name="city1" id="student-address-city1">
                                                                <option selected hidden>Choose City</option>
                                                                @foreach($cities as $city)

                                                                @if($parent1->address->city->id === $city->id)
                                                                    <option selected value="{{$parent1->address->city->id}}">{{$city->name}}</option>
                                                                @else
                                                                    <option  value="{{$city->id}}">{{$city->name}}</option>
                                                                @endif

                                                            @endforeach
                                                            </select> 
                                                        </div> 
                                                    </div> 
                                                </div> 
                                            </fieldset>
                                            <br>
                                            <hr>
                                            <br>
                                            <fieldset id="addSection">
                                                <legend>Parent 2</legend>
                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <div class="form-group label-floating">
                                                            <label class="control-label">First Name</label>
                                                            <input type="text" @if($parent2 != null)value="{{$parent2->pfname}}"@endif name="pfname2" id="parent-pfname2" class="form-control" spellcheck="false" > 
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group label-floating">
                                                            <label class="control-label">Last Name</label>
                                                            <input type="text" @if($parent2 != null)value="{{$parent2->plname}}"@endif name="plname2" id="parent-plname2" class="form-control" spellcheck="false" > 
                                                        </div> 
                                                    </div>
                                                    <div class="col-md-4">
                                                    <div class="form-group label-floating">
                                                        <label class="col-sm-2 label-on-left">Type</label>
                                                        <div class="radio">
                                                            <label>
                                                                <input id="mother2" value="Mother" type="radio" name="type2">
                                                                Mother
                                                            </label>
                                                            <label>
                                                                <input id="father2" value="Father" type="radio" name="type2">
                                                                Father
                                                            </label>
                                                            <label>
                                                                <input id="guardian2" value="Guardian" type="radio" name="type2">
                                                                Guardian
                                                            </label>
                                                        </div>
                                                    </div>
                                                    </div> 
                                                </div> 
                                                <br> 
                                                <hr> 
                                                <br>
                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <div class="form-group label-floating">
                                                            <label class="control-label">Address 1</label> 
                                                            <input type="text" @if($parent2 != null)value="{{$parent2->address->address1}}"@endif class="form-control" name="1add2"> 
                                                        </div> 
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group label-floating"> 
                                                            <label class="control-label">Address 2</label> 
                                                            <input type="text" @if($parent2 != null)value="{{$parent2->address->address2}}"@endif class="form-control" name="2add2"> 
                                                        </div> 
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group label-floating"> 
                                                            <label  for="student-address-city2" class="control-label">City</label>
                                                            <select class="form-control" name="city2" id="student-address-city2">
                                                                <option selected hidden>Choose City</option>
                                                                @foreach($cities as $city)

                                                                @if($parent2 != null && $parent2->address->city->id === $city->id)
                                                                    <option selected value="{{$parent2->address->city->id}}">{{$city->name}}</option>
                                                                @else
                                                                    <option  value="{{$city->id}}">{{$city->name}}</option>
                                                                @endif

                                                                @endforeach
                                                            </select> 
                                                        </div> 
                                                    </div> 
                                                </div> 
                                            </fieldset>
                                        </div>
                                    </div>
                                    <div class="tab-pane" id="tab3">
                                        <div id="contacts">
                                            <fieldset>
                                                <legend>Student Contact</legend>
                                                <div class="row">
                                                        <div class="col-md-4">
                                                            <div class="form-group label-floating">
                                                                <label class="control-label">Mobile</label>
                                                                <input value="{{$student->contact->mobile1}}" name="mobile" type="text" class="form-control">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <div class="form-group label-floating">
                                                                <label class="control-label">Email</label>
                                                                <input value="{{$student->contact->email1}}" name="email" type="text" class="form-control">
                                                            </div>
                                                        </div>
                                                    </div>
                                                <br>
                                                <hr>
                                                <br>
                                            </fieldset>
                                            <fieldset id="addSection2">
                                                <legend>Parent 1 Contact</legend>
                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <div class="form-group label-floating">
                                                            <label class="control-label">Mobile 1</label>
                                                            <input value="{{$parent1->contact->mobile1}}" name="1mobile1" type="text" class="form-control">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group label-floating">
                                                            <label class="control-label">Mobile 2</label>
                                                            <input value="{{$parent1->contact->mobile2}}" name="2mobile1" type="text" class="form-control">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group label-floating">
                                                            <label class="control-label">Home</label>
                                                            <input value="{{$parent1->contact->home}}" name="home1" type="text" class="form-control">
                                                        </div>
                                                    </div>
                                                </div>
                                                <br>
                                                <hr>
                                                <br>
                                                <div class="row">
                                                        <div class="col-md-4">
                                                            <div class="form-group label-floating">
                                                                <label class="control-label">Work</label>
                                                                <input value="{{$parent1->contact->work}}" name="work1" type="text" class="form-control">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <div class="form-group label-floating">
                                                                <label class="control-label">Email 1</label>
                                                                <input value="{{$parent1->contact->email1}}" name="1email1" type="text" class="form-control">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                                <div class="form-group label-floating">
                                                                <label class="control-label">Email 2</label>
                                                                <input value="{{$parent1->contact->email2}}" name="2email1" type="text" class="form-control">
                                                            </div>
                                                        </div>
                                                    </div>
                                                <br>
                                                <hr>
                                                <br>
                                            </fieldset>
                                            <fieldset id="addSection2">
                                                <legend>Parent 2 Contact</legend>
                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <div class="form-group label-floating">
                                                            <label class="control-label">Mobile 1</label>
                                                            <input @if($parent2 != null)value="{{$parent2->contact->mobile1}}"@endif name="1mobile2" type="text" class="form-control">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group label-floating">
                                                            <label class="control-label">Mobile 2</label>
                                                            <input @if($parent2 != null)value="{{$parent2->contact->mobile2}}"@endif name="2mobile2" type="text" class="form-control">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group label-floating">
                                                            <label class="control-label">Home</label>
                                                            <input @if($parent2 != null)value="{{$parent2->contact->home}}"@endif name="home2" type="text" class="form-control">
                                                        </div>
                                                    </div>
                                                </div>
                                                <br>
                                                <hr>
                                                <br>
                                                <div class="row">
                                                        <div class="col-md-4">
                                                            <div class="form-group label-floating">
                                                                <label class="control-label">Work</label>
                                                                <input @if($parent2 != null)value="{{$parent2->contact->work}}"@endif name="work2" type="text" class="form-control">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <div class="form-group label-floating">
                                                                <label class="control-label">Email 1</label>
                                                                <input @if($parent2 != null)value="{{$parent2->contact->email1}}"@endif name="1email2" type="text" class="form-control">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                                <div class="form-group label-floating">
                                                                <label class="control-label">Email 2</label>
                                                                <input @if($parent2 != null)value="{{$parent2->contact->email2}}"@endif name="2email2" type="text" class="form-control">
                                                            </div>
                                                        </div>
                                                    </div>
                                                <br>
                                                <hr>
                                                <br>
                                            </fieldset>
                                        </div>
                                    </div>
                                    <div class="tab-pane" id="tab4">
                                        <div class="row">
                                                <div class="col-md-4">
                                                    <div class="form-group label-floating">
                                                        <label class="control-label">Career Interest</label>
                                                        <input value="{{$student->addition->career}}"  name="career" id="career" type="text" class="form-control">
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group label-floating">
                                                        <label class="control-label">T-Shirt Size</label>
                                                        <select id="t-shirt" class="form-control"  name="t-shirt">
                                                            <option hidden> Choose Size</option>
                                                            @foreach($shirts as $shirt)

                                                                @if($student->addition->shirt === $shirt)
                                                                    <option selected value="{{$student->addition->shirt}}">{{$shirt}}</option>
                                                                @else
                                                                    <option  value="{{$shirt}}">{{$shirt}}</option>
                                                                @endif

                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group label-floating">
                                                        <label class="control-label">Allergies</label>
                                                        <input value="{{$student->addition->allergy}}" type="text" name="allergy" id="allergy" class="form-control">
                                                    </div>
                                                </div>
                                            </div>
                                            <br>
                                            <hr>
                                            <br>
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <div class="form-group label-floating">
                                                        <label class="control-label">Meal Preference</label>
                                                        <select name="meal" id="meal" class="form-control">
                                                            <option hidden>Choose</option>
                                                            @foreach($meals as $meal)

                                                                @if($student->addition->meal === $meal)
                                                                    <option selected value="{{$student->addition->meal}}">{{$meal}}</option>
                                                                @else
                                                                    <option  value="{{$meal}}">{{$meal}}</option>
                                                                @endif

                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group label-floating">
                                                        <label class="control-label">Student Type</label>
                                                        <select onchange="busaryType2(this)" name="s_type" id="s_type" class="form-control">
                                                            <option hidden>Choose Type</option>
                                                            @foreach($types as $type)

                                                                @if($student->addition->type === $type)
                                                                    <option selected value="{{$student->addition->type}}">{{$type}}</option>
                                                                @else
                                                                    <option  value="{{$type}}">{{$type}}</option>
                                                                @endif

                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group label-floating">
                                                        <label for="datetimepicker2"  class="control-label">Stem Year</label>
                                                        <input type="text" name="stem_yr" value='2000' id = "datetimepicker3" class="form-control datetimepicker"/>
                                                    </div>
                                                </div>
                                            </div>
                                            <br><hr><br>
                                            <div class="row" id="tab4finalrow">
                                                <div class="col-md-4">
                                                    <div class="form-group label-floating">
                                                        <label for="student-school-center" class="control-label">Center Assigned</label>
                                                        <select class="form-control" name="center" id="student-school-center">
                                                            <option hidden>Choose STEM Center</option>
                                                            @foreach($stemcenters as $stemcenter)
                                                                @if($student->addition->stemcenter->id === $stemcenter->id)
                                                                    <option selected value="{{$student->addition->stemcenter->id}}">{{$stemcenter->name}}</option>
                                                                @else
                                                                    <option value="{{$stemcenter->id}}">{{$stemcenter->name}}</option>
                                                                @endif
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                    </div>
                                    <div class="tab-pane" id="tab5">
                                        <fieldset>
                                            <legend>Emergency Contact</legend>
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <div class="form-group label-floating">
                                                        <label for="" class="control-label">First Name</label>
                                                        <input value="{{$student->emgccontact->fname}}" type="text" class="form-control" name="emgc_fname">
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group label-floating">
                                                        <label for="" class="control-label">Last Name</label>
                                                        <input value="{{$student->emgccontact->lname}}" type="text" class="form-control" name="emgc_lname">
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group label-floating">
                                                        <label class="control-label">Relationship to Student</label>
                                                        <select name="relation" id="" class="form-control">
                                                            <option hidden>Choose</option>
                                                            @foreach($relations as $relation)

                                                                @if($student->emgccontact->relation === $relation)
                                                                    <option selected value="{{$student->emgccontact->relation}}">{{$relation}}</option>
                                                                @else
                                                                    <option  value="{{$relation}}">{{$relation}}</option>
                                                                @endif

                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <br>
                                            <hr>
                                            <br>
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <div class="form-group label-floating">
                                                        <label for="" class="control-label">Email</label>
                                                        <input value="{{$student->emgccontact->contact->email1}}" type="email" class="form-control" name="emgc_email">
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group label-floating">
                                                        <label for="" class="control-label">Mobile</label>
                                                        <input value="{{$student->emgccontact->contact->mobile1}}" type="text" class="form-control" name="emgc_mobile">
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group label-floating">
                                                        <label for="" class="control-label">Work</label>
                                                        <input value="{{$student->emgccontact->contact->work}}" type="text" class="form-control" name="emgc_work">
                                                    </div>
                                                </div>
                                            </div>
                                        </fieldset>
                                    </div>
                                    <ul class="pager wizard">
                                        <li class="previous first" style="display:none;"><a >First</a></li>
                                        <li class="previous"><a >Previous</a></li>
                                        <li class="next last" style="display:none;"><a>Last</a></li>
                                        <li class="next"><a >Next</a></li>
                                        <li class="finish pull-right"><a href="javascript:;">Add Student Info</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <input id="submit" type="submit" class="btn btn-primary pull-left hidden" value="Submit"/>
                </form>
            </div>
        </div>
    </div>
    </div>

@endsection

@section('javascripts')
    <script src="{{ url('js/jquery-3.2.1.min.js') }}" type="text/javascript"></script>
    <script src="{{ url('js/jquery.validate.min.js') }}" type="text/javascript"></script>
    <script src="{{ url('js/moment.min.js') }}"></script>
    <script src="{{ url('js/material.min.js') }}"></script>
    <script src="{{ url('js/bootstrap-datetimepicker.js') }}"></script>
    <script type="text/javascript">
        $(function () {
            $('#datetimepicker1').datetimepicker({
                icons: {
                    date: "fa fa-calendar",
                    up: "fa fa-chevron-up",
                    down: "fa fa-chevron-down",
                    previous: 'fa fa-chevron-left',
                    next: 'fa fa-chevron-right',
                    today: 'fa fa-screenshot',
                    clear: 'fa fa-trash',
                    close: 'fa fa-remove'
                },viewMode: "decades",format:"YYYY/MM/DD",defaultDate: "{{$student->dob}}"
            });
        });
    </script>
    <script type="text/javascript">
        $(function () {
            $('#datetimepicker2').datetimepicker({
                icons: {
                    date: "fa fa-calendar",
                    up: "fa fa-chevron-up",
                    down: "fa fa-chevron-down",
                    previous: 'fa fa-chevron-left',
                    next: 'fa fa-chevron-right',
                    today: 'fa fa-screenshot',
                    clear: 'fa fa-trash',
                    close: 'fa fa-remove'
                },viewMode: "years",format:"YYYY",defaultDate: "{{$student->yeargroup}}"
            });
        });
    </script>
    <script type="text/javascript">
        $(function () {
            $('#datetimepicker3').datetimepicker({
                icons: {
                    date: "fa fa-calendar",
                    up: "fa fa-chevron-up",
                    down: "fa fa-chevron-down",
                    previous: 'fa fa-chevron-left',
                    next: 'fa fa-chevron-right',
                    today: 'fa fa-screenshot',
                    clear: 'fa fa-trash',
                    close: 'fa fa-remove'
                },viewMode: "years",format:"YYYY",defaultDate: "{{$student->addition->yr}}"
            });
        });
    </script>
    <script>
        $(document).ready(function() {
            wiz();
            //setFormValidation('#UpdateValidationDoc');
            radio_button_check("{{$student->sex}}");
            radio_button_check2("{{$parent1->type}}");
            @if($parent2 != null)
                radio_button_check3("{{$parent2->type}}");
            @endif
            busaryType("{{$student->addition->type}}");
            uwiCheck("{{$student->school->name}}");
        });
        
        function radio_button_check(sex){
                if (sex === 'Male') {
                    $("#male").prop("checked", true);
                }else
                    $("#female").prop("checked", true);
            }
        
        function radio_button_check2(type){
                if (type === 'Mother') {
                    $("#mother1").prop("checked", true);
                }else if(type === 'Father'){
                    $("#father1").prop("checked", true);
                }else{
                    $("#guardian1").prop("checked", true);
                }
            } 
            
        function radio_button_check3(type){
                if (type === 'Mother') {
                    $("#mother2").prop("checked", true);
                }else if(type === 'Father'){
                    $("#father2").prop("checked", true);
                }else{
                    $("#guardian2").prop("checked", true);
                }
            }

        function wiz(){
            $('#rootwizard').bootstrapWizard({
                'tabClass': 'nav nav-tabs',
                onTabShow: function(tab, navigation, index) {
                var $total = navigation.find('li').length;
                var $current = index+1;
                var $percent = ($current/$total) * 100;
                $('#rootwizard').find('.bar').css({width:$percent+'%'});
            }
            });

            $('#rootwizard .finish').click(function() {
                $('#submit').trigger('click');
		    });

            
        }

        function setFormValidation(id){
                $(id).validate({
                    errorPlacement: function(error, element) {
                        $(element).parent('div').addClass('has-error');
                    }
                });
        }

        function busaryType(type){
            if(type==='Busary'){
                $("#sinsert").remove();
                htmlstr = '<div class="col-md-4" id="binsert">';
                    htmlstr += '<div class="form-group label-floating">';
                        htmlstr += '<label class="control-label">Busary Group</label>';
                        htmlstr += '<select name="busary_type" id="busary_type" class="form-control">';
                            htmlstr += '<option hidden>Choose Type</option>';
                            htmlstr += '@foreach($btypes as $btype)';
                                htmlstr += '@if($student->addition->btype === $btype)';
                                    htmlstr += '<option selected value="{{$student->addition->btype}}">{{$btype}}</option>';
                                htmlstr += '@else';
                                    htmlstr += '<option  value="{{$btype}}">{{$btype}}</option>';
                                htmlstr += '@endif';
                            htmlstr += '@endforeach';
                        htmlstr += '</select>';
                    htmlstr += '</div>';
                htmlstr += '</div>';
                $("#tab4finalrow").append(htmlstr);
            }else if(type==='Technical'){
                $("#binsert").remove();
                htmlstr = '<div class="col-md-4" id="sinsert">';
                    htmlstr += '<div class="form-group label-floating">';
                        htmlstr += '<label class="control-label">Shoe Size</label>';
                        htmlstr += '<input value="{{$student->addition->shoe}}" type="number" max="15" min="4" name="shoe_size" id="shoe_size" class="form-control">';
                    htmlstr += '</div>';
                htmlstr += '</div>';
                $("#tab4finalrow").append(htmlstr);
            }else{
                $("#binsert").remove();
                $("#sinsert").remove();
            }
        }

        function busaryType2(select){
            if(select.options[select.selectedIndex].text==='Busary'){
                $("#sinsert").remove();
                htmlstr = '<div class="col-md-4" id="binsert">';
                    htmlstr += '<div class="form-group label-floating">';
                        htmlstr += '<label class="control-label">Busary Group</label>';
                        htmlstr += '<select name="busary_type" id="busary_type" class="form-control">';
                            htmlstr += '<option hidden>Choose Type</option>';
                            htmlstr += '@foreach($btypes as $btype)';
                                htmlstr += '@if($student->addition->btype === $btype)';
                                    htmlstr += '<option selected value="{{$student->addition->btype}}">{{$btype}}</option>';
                                htmlstr += '@else';
                                    htmlstr += '<option  value="{{$btype}}">{{$btype}}</option>';
                                htmlstr += '@endif';
                            htmlstr += '@endforeach';
                        htmlstr += '</select>';
                    htmlstr += '</div>';
                htmlstr += '</div>';
                $("#tab4finalrow").append(htmlstr);
            }else if(select.options[select.selectedIndex].text==='Technical'){
                $("#binsert").remove();
                htmlstr = '<div class="col-md-4" id="sinsert">';
                    htmlstr += '<div class="form-group label-floating">';
                        htmlstr += '<label class="control-label">Shoe Size</label>';
                        htmlstr += '<input type="number" max="15" min="4" name="shoe_size" id="shoe_size" class="form-control">';
                    htmlstr += '</div>';
                htmlstr += '</div>';
                $("#tab4finalrow").append(htmlstr);
            }else if(select.options[select.selectedIndex].text==='Academic'){
                $("#binsert").remove();
                $("#sinsert").remove();
            }
        }

        function uwiCheck(check){
            
            if(check==='UWI'){
                htmlstr = '<div class="col-md-4" id="uwiInsert">';
                    htmlstr += '<div class="form-group label-floating">';
                        htmlstr += '<label for="degree" class="control-label">Degree Persued</label>';
                        htmlstr += '<input value="{{$student->addition->degree}}" type="text" name="degree" id="degree" class="form-control">';
                    htmlstr += '</div>';
                htmlstr += '</div>';
                $("#tab1finalrow").append(htmlstr);
            }
        }

        function uwiCheck2(select){
            
            if(select.options[select.selectedIndex].text==='UWI'){
                htmlstr = '<div class="col-md-4" id="uwiInsert">';
                    htmlstr += '<div class="form-group label-floating">';
                        htmlstr += '<label for="degree" class="control-label">Degree Persued</label>';
                        htmlstr += '<input value="{{$student->addition->degree}}" type="text" name="degree" id="degree" class="form-control">';
                    htmlstr += '</div>';
                htmlstr += '</div>';
                $("#tab1finalrow").append(htmlstr);
            }else {
                $("#uwiInsert").remove();
            }
        }
        
    </script>
    <script src="{{ url('js/bootstrap.min.js') }}"></script>    
    <script src="{{ url('js/jquery.validate.min.js') }}"></script>
    <script src="{{ url('js/jquery.bootstrap.wizard.js') }}"></script>    
    <script src="{{ url('js/jasny-bootstrap.min.js') }}"></script>
    <script src="{{ url('js/sweetalert2.js') }}"></script>
@endsection