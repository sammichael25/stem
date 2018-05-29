@extends('layouts.layout')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <form id="UpdateValidationDoc" action="{{ route('employees.update',[$employee->id]) }}" method="POST">
                    {{ csrf_field() }}
                    <input type="hidden" name="_method" value="put">
                    <div id="rootwizard">
                        <div class="card card-nav-tabs">
                            <div class="card-header" data-background-color="purple">
                                <div class="nav-tabs-navigation">
                                    <div class="nav-tabs-wrapper">
                                        <span class="nav-tabs-title">Staff Info:</span>
                                        <ul class="nav nav-tabs" data-tabs="tabs">
                                            <li class="active">
                                                <a href="#tab1" data-toggle="tab">
                                                    <i class="material-icons">person</i>
                                                    General
                                                    <div class="ripple-container"></div></a>
                                            </li>
                                            <li class="" >
                                                <a href="#tab2" data-toggle="tab">
                                                    <i class="material-icons">contact_phone</i>
                                                    Contact Info
                                                    <div class="ripple-container"></div></a>
                                            </li>
                                            <li class="" >
                                                <a href="#tab3" data-toggle="tab">
                                                    <i class="material-icons">business_center</i>
                                                    STEM Info
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
                                                            id="employee-fname"
                                                            value="{{$employee->fname}}"
                                                            class="form-control"
                                                            required="true"
                                                            spellcheck="false"
                                                            >
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group label-floating">
                                                        <label class="control-label">Middle Name</label>
                                                        <input type="text"
                                                            name="mname"
                                                            id="employee-mname"
                                                            value="{{$employee->mname}}"
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
                                                            id="employee-lname"
                                                            value="{{$employee->lname}}"
                                                            class="form-control"
                                                            required="true"
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
                                                    <input type="text" id="datetimepicker1" name="dob" value="{{$employee->dob}}" class="form-control datetimepicker"/>

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
                                                        <input type="text" value="{{$employee->address->address1}}" class="form-control"  name="add1">
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group label-floating">
                                                        <label class="control-label">Address 2</label>
                                                        <input type="text" value="{{$employee->address->address2}}" class="form-control" name="add2">
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group label-floating">
                                                        <label  for="employee-address-city" class="control-label">City</label>
                                                        <select class="form-control" name="city" id="employee-address-city">
                                                            <option selected hidden>Choose City</option>
                                                            @foreach($cities as $city)

                                                                @if($employee->address->city_id === $city->id)
                                                                    <option selected value="{{$employee->address->city_id}}">{{$city->name}}</option>
                                                                @else
                                                                    <option  value="{{$city->id}}">{{$city->name}}"</option>
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
                                                        <label class="control-label">Degree</label>
                                                        <input name="degree" value="{{$employee->degree}}" type="text" class="form-control">
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group label-floating">
                                                        <label class="col-sm-2 label-on-left">Driver</label>
                                                        <div class="radio">
                                                            <label>
                                                                <input id="driverYes" value="Yes" type="radio" name="driver">
                                                                Yes
                                                            </label>
                                                            <label>
                                                                <input id="driverNo" value="No" type="radio" name="driver">
                                                                No
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group label-floating">
                                                        <label class="col-sm-2 label-on-left">Status</label>
                                                        <div class="radio">
                                                            <label>
                                                                <input id="statusA" value="Active" type="radio" name="status">
                                                                Active
                                                            </label>
                                                            <label>
                                                                <input id="statusI" value="Inactive" type="radio" name="status">
                                                                Inactive
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="clearfix"></div>
                                    </div>
                                    <div class="tab-pane" id="tab2">
                                        <div id="contacts">
                                            <fieldset>
                                                <legend>Staff Contact</legend>
                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <div class="form-group label-floating">
                                                            <label class="control-label">Mobile 1</label>
                                                            <input name="mobile1" value="{{$employee->contact->mobile1}}" type="text" class="form-control">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group label-floating">
                                                            <label class="control-label">Mobile 2</label>
                                                            <input name="mobile2" value="{{$employee->contact->mobile2}}" type="text" class="form-control">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group label-floating">
                                                            <label class="control-label">Home</label>
                                                            <input name="home" value="{{$employee->contact->home}}" type="text" class="form-control">
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
                                                            <input name="work" value="{{$employee->contact->work}}" type="text" class="form-control">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group label-floating">
                                                            <label class="control-label">Email 1</label>
                                                            <input name="email1" value="{{$employee->contact->email1}}" type="text" class="form-control">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                            <div class="form-group label-floating">
                                                            <label class="control-label">Email 2</label>
                                                            <input name="email2" value="{{$employee->contact->email2}}" type="text" class="form-control">
                                                        </div>
                                                    </div>
                                                </div>
                                                <br>
                                                <hr>
                                                <br>
                                            </fieldset>
                                        </div>
                                    </div>
                                    <div class="tab-pane" id="tab3">
                                        <div class="row">
                                                <div class="col-md-4">
                                                    <div class="form-group label-floating">
                                                        <label class="control-label">Teaching Subject/Field of Interest</label>
                                                        <input name="subject" value="{{$employee->subject}}" id="subject" type="text" class="form-control">
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group label-floating">
                                                        <label class="control-label">T-Shirt Size</label>
                                                        <select id="t-shirt" class="form-control"  name="t-shirt">
                                                            <option hidden> Choose Size</option>
                                                            @foreach($shirts as $shirt)

                                                                @if($employee->shirt === $shirt)
                                                                    <option selected value="{{$employee->shirt}}">{{$shirt}}</option>
                                                                @else
                                                                    <option  value="{{$shirt}}">{{$shirt}}"</option>
                                                                @endif

                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group label-floating">
                                                        <label class="control-label">Allergies</label>
                                                        <input type="text" value="{{$employee->allergy}}" name="allergy" id="allergy" class="form-control">
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

                                                                @if($employee->meal === $meal)
                                                                    <option selected value="{{$employee->meal}}">{{$meal}}</option>
                                                                @else
                                                                    <option  value="{{$meal}}">{{$meal}}</option>
                                                                @endif

                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group label-floating">
                                                        <label class="control-label">Staff Type</label>
                                                        <select name="s_type" id="s_type" class="form-control">
                                                            <option hidden>Choose</option>
                                                            @foreach($types as $type)

                                                                @if($employee->type === $type)
                                                                    <option selected value="{{$employee->type}}">{{$type}}</option>
                                                                @else
                                                                    <option  value="{{$type}}">{{$type}}</option>
                                                                @endif

                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-2">
                                                    <div class="form-group label-floating">
                                                        <label for="datetimepicker2"  class="control-label">Year Joined</label>
                                                    <input type="text" name="stem_yr" value="{{$employee->yr}}" id = "datetimepicker2" class="form-control datetimepicker"/>
                                                    </div>
                                                </div>
                                                <div class="col-md-2">
                                                    <div class="form-group label-floating">
                                                        <label class="control-label">Scheduled Regions</label>
                                                        <select name="region" id="region" class="form-control">
                                                            <option hidden>Choose a Region</option>
                                                            @foreach($regions as $region)

                                                                @if($employee->region === $region)
                                                                    <option selected value="{{$employee->region}}">{{$region}}</option>
                                                                @else
                                                                    <option  value="{{$region}}">{{$region}}</option>
                                                                @endif

                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <br><hr><br>
                                    </div>
                                    <ul class="pager wizard">
                                        <li class="previous first" style="display:none;"><a >First</a></li>
                                        <li class="previous"><a >Previous</a></li>
                                        <li class="next last" style="display:none;"><a>Last</a></li>
                                        <li class="next"><a >Next</a></li>
                                        <li class="finish pull-right"><a href="javascript:;">Add Staff Info</a></li>
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
                },viewMode: "years",format:"YYYY/MM/DD",defaultDate: "{{$employee->dob}}"
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
                },viewMode: "years",format:"YYYY",defaultDate: "{{$employee->yr}}"
            });
        });
    </script>
    <script>
        $(document).ready(function() {
            wiz();
            //setFormValidation('#UpdateValidationDoc');
            radio_button_check("{{$employee->sex}}");
            radio_button_check2("{{$employee->driver}}");
            radio_button_check3("{{$employee->status}}");
        });
        
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
/*
        function setFormValidation(id){
                $(id).validate({
                    errorPlacement: function(error, element) {
                        $(element).parent('div').addClass('has-error');
                    }
                });
        }*/

        function radio_button_check(sex){
                if (sex === 'Male') {
                    $("#male").prop("checked", true);
                }else
                    $("#female").prop("checked", true);
            }
        
        function radio_button_check2(driver){
                if (driver === 'Yes') {
                    $("#driverYes").prop("checked", true);
                }else if(driver === 'No'){
                    $("#driverNo").prop("checked", true);
                }
            } 
            
        function radio_button_check3(status){
                if (status === 'Active') {
                    $("#statusA").prop("checked", true);
                }else if(status === 'Inactive'){
                    $("#statusI").prop("checked", true);
                }
            }

    </script>
    <script src="{{ url('js/bootstrap.min.js') }}"></script>    
    <script src="{{ url('js/jquery.validate.min.js') }}"></script>
    <script src="{{ url('js/jquery.bootstrap.wizard.js') }}"></script>    
    <script src="{{ url('js/jasny-bootstrap.min.js') }}"></script>
    <script src="{{ url('js/sweetalert2.js') }}"></script>
@endsection