<!doctype html>
<html lang="{{ app()->getLocale() }}">

<head>
    <meta charset="utf-8" />
    <base href="{{ URL::asset('/') }}" target="_top">
    <link rel="apple-touch-icon" sizes="76x76" href="{{ url('img/STEM.png') }}">
    <link rel="icon" type="image/png" href="{{ url('img/favicon.png') }}" >
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />
    <!-- Bootstrap core CSS     -->
    <link rel="stylesheet" href="{{ url('css/bootstrap.min.css') }}">    
    <!--  Material Dashboard CSS    -->
    <link rel="stylesheet" href="{{ url('css/material-dashboard.css?v=1.2.0') }}">    
    <!--  CSS for Demo Purpose, don't include it in your project     -->
    <link rel="stylesheet" href="{{ url('css/demo.css') }}">    
    <!--     Fonts and icons     -->
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Roboto:400,700,300|Material+Icons' rel='stylesheet' type='text/css'>
    @yield('styles')
</head>

<body>
    <div class="wrapper">
        <div class="sidebar" data-active-color="rose" data-background-color="white" data-image="{{ url('img/sidebar-1.jpg') }}">
        
            <div class="logo">
                <a href="{{ url('/')}}" class="simple-text">
                    <img id="mainLogo" src="{{ url('img/STEM.png') }}" alt="STEM">
                </a>
            </div>
            <div class="sidebar-wrapper">
                <ul class="nav">
                    <li>
                        <a href="{{ url('/dashboard')}}">
                            <i class="material-icons">dashboard</i>
                            <p>Dashboard</p>
                        </a>
                    </li>
                    <li>
                        <a data-toggle="collapse" href="#weeklyprep" aria-expanded="false" class="collapsed">
                            <i class="material-icons">event_note</i>
                            <p>Weekly Prep
                                <b class="caret"></b>
                            </p>

                        </a>
                        <div class="collapse" id="weeklyprep" aria-expanded="false" style="height: 0px;">
                            <ul class="nav">
                                <li><a href="#" style="background-color: rgba(0,0,0,.075);">Sessions Prep</a></li>
                                <li><a href="#" style="background-color: rgba(0,0,0,.075);">Tasks</a></li>
                            </ul>
                        </div>
                    </li>

                    <li>
                        <a data-toggle="collapse" href="#inventory" aria-expanded="false" class="collapsed">
                            <i class="material-icons">store</i>
                            <p>Inventory
                                <b class="caret"></b>
                            </p>

                        </a>
                        <div class="collapse" id="inventory" aria-expanded="false" style="height: 0px;">
                            <ul class="nav">
                                <li><a href="#" style="background-color: rgba(0,0,0,.075);">View Inventory</a></li>
                                <li><a href="#" style="background-color: rgba(0,0,0,.075);">Add to Inventory</a></li>
                            </ul>
                        </div>
                    </li>
                    <li>
                        <a data-toggle="collapse" href="#students" aria-expanded="false" class="collapsed">
                            <i class="material-icons">content_paste</i>
                            <p>Students
                                <b class="caret"></b>
                            </p>

                        </a>
                        <div class="collapse" id="students" aria-expanded="false" style="height: 0px;">
                            <ul class="nav">
                                <li>
                                    <a href="{{ route('students.create') }}"  style="background-color: rgba(0,0,0,.075);">
                                        <p>Add Student</p>
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ url('/students')}}" style="background-color: rgba(0,0,0,.075);">
                                        <p>View All Students</p>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <li>
                        <a data-toggle="collapse" href="#bursary" aria-expanded="false" class="collapsed">
                            <i class="material-icons">attach_money</i>
                            <p>Bursary
                                <b class="caret"></b>
                            </p>

                        </a>
                        <div class="collapse" id="bursary" aria-expanded="false" style="height: 0px;">
                            <ul class="nav">
                                <li><a href="{{ url('/busaries/NCMA') }}" style="background-color: rgba(0,0,0,.075);">NCMA</a></li>
                                <li><a href="{{ url('/busaries/ECMA') }}" style="background-color: rgba(0,0,0,.075);">ECMA</a></li>
                                <li><a href="{{ url('/busaries/CBLOCK') }}" style="background-color: rgba(0,0,0,.075);">Central Block</a></li>
                            </ul>
                        </div>
                    </li>
                    <li>
                        <a data-toggle="collapse" href="#centers" aria-expanded="false" class="collapsed">
                            <i class="material-icons">school</i>
                            <p>STEM Centers
                                <b class="caret"></b>
                            </p>

                        </a>
                        <div class="collapse" id="centers" aria-expanded="false" style="height: 0px;">
                            <ul class="nav">
                                <li>
                                    <a href="{{ url('/')}}" style="background-color: rgba(0,0,0,.075);">
                                        <p>Student Support</p>
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ url('/')}}" style="background-color: rgba(0,0,0,.075);">
                                        <p>Technical Training</p>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <!--<li>
                        <a href="{{ url('/')}}">
                            <i class="material-icons">school</i>
                            <p>Schools</p>

                        </a>
                    </li>-->
                    <li>
                        <a data-toggle="collapse" href="#staff" aria-expanded="false" class="collapsed">
                            <i class="material-icons">work</i>
                            <p>Staff
                                <b class="caret"></b>
                            </p>

                        </a>
                        <div class="collapse" id="staff" aria-expanded="false" style="height: 0px;">
                            <ul class="nav">
                                <li>
                                    <a href="{{ route('employees.create') }}" style="background-color: rgba(0,0,0,.075);">
                                        <p>Add Staff Member</p>
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ url('/employees/supportStaff') }}" style="background-color: rgba(0,0,0,.075);">
                                        <p>Support Staff</p>
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ url('/employees/facilitators') }}" style="background-color: rgba(0,0,0,.075);">
                                        <p>Facilitators</p>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <li>
                        <a data-toggle="collapse" href="#schedule" aria-expanded="false" class="collapsed">
                            <i class="material-icons">event_note</i>
                            <p>Schedule
                                <b class="caret"></b>
                            </p>

                        </a>
                        <div class="collapse" id="schedule" aria-expanded="false" style="height: 0px;background-color: rgba(0,0,0,.075);">
                            <ul class="nav">
                                <li><a data-toggle="collapse" href="#year" aria-expanded="false" class="collapsed">
                                        <p>2017
                                            <b class="caret"></b>
                                        </p>

                                    </a>
                                    <div class="collapse" id="year" aria-expanded="false" style="height: 0px;">
                                        <ul class="nav">
                                            <li><a href="#" style="background-color: rgba(0,0,0,.075);">Term 1</a></li>
                                            <li><a href="#" style="background-color: rgba(0,0,0,.075);">Term 2</a></li>
                                            <li><a href="#" style="background-color: rgba(0,0,0,.075);">Term 3</a></li>
                                        </ul>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <li>
                        <a data-toggle="collapse" href="#reports" aria-expanded="false" class="collapsed">
                            <i class="material-icons">report</i>
                            <p>Reports
                                <b class="caret"></b>
                            </p>

                        </a>
                        <div class="collapse" id="reports" aria-expanded="false" style="height: 0px;">
                            <ul class="nav">
                                <li><a href="#" style="background-color: rgba(0,0,0,.075);">Trimester</a></li>
                                <li><a href="#" style="background-color: rgba(0,0,0,.075);">Yearly</a></li>
                            </ul>
                        </div>
                    </li>
                    <li>
                        <a data-toggle="collapse" href="#camp" aria-expanded="false" class="collapsed">
                            <i class="material-icons">event</i>
                            <p>Camp
                                <b class="caret"></b>
                            </p>

                        </a>
                        <div class="collapse" id="camp" aria-expanded="false" style="height: 0px;">
                            <ul class="nav">
                                <li><a href="#" style="background-color: rgba(0,0,0,.075);">Easter</a></li>
                                <li><a href="#" style="background-color: rgba(0,0,0,.075);">Summer</a></li>
                            </ul>
                        </div>
                    </li>
                    <li>
                        <a data-toggle="collapse" href="#field" aria-expanded="false" class="collapsed">
                            <i class="material-icons">terrain</i>
                            <p>Field Trips
                                <b class="caret"></b>
                            </p>

                        </a>
                        <div class="collapse" id="field" aria-expanded="false" style="height: 0px;">
                            <ul class="nav">
                                <li><a href="#" style="background-color: rgba(0,0,0,.075);">New Field Trip</a></li>
                                <li><a href="#" style="background-color: rgba(0,0,0,.075);">Past Field Trips</a></li>
                            </ul>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
        <div class="main-panel">
            <nav class="navbar navbar-transparent navbar-absolute">
                <div class="container-fluid">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle" data-toggle="collapse">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <a class="navbar-brand" href="#"> Welcome {{ Auth::user()->fname }} </a>
                    </div>
                    <div class="collapse navbar-collapse">
                        <ul class="nav navbar-nav navbar-right">
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                    <i class="material-icons">notifications</i>
                                    <span class="notification">5</span>
                                    <p class="hidden-lg hidden-md">Notifications</p>
                                </a>
                                <ul class="dropdown-menu">
                                    <li>
                                        <a href="#">Mike John responded to your email</a>
                                    </li>
                                    <li>
                                        <a href="#">You have 5 new students</a>
                                    </li>
                                    <li>
                                        <a href="#">Incident at Woodbrook Secondary</a>
                                    </li>
                                    <li>
                                        <a href="#">Another Notification</a>
                                    </li>
                                    <li>
                                        <a href="#">Another One</a>
                                    </li>
                                </ul>
                            </li>
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                    <i class="material-icons">person</i>
                                    <p class="hidden-lg hidden-md">User</p>
                                </a>
                                <ul class="dropdown-menu">
                                    <li>
                                        <a href="{{ route('logout') }}"
                                           onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            Logout
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                        <form class="navbar-form navbar-right" role="search">
                            <div class="form-group  is-empty">
                                <input type="text" class="form-control" placeholder="Search">
                                <span class="material-input"></span>
                            </div>
                            <button type="submit" class="btn btn-white btn-round btn-just-icon">
                                <i class="material-icons">search</i>
                                <div class="ripple-container"></div>
                            </button>
                        </form>
                    </div>
                </div>
            </nav>
            <div class="content">
                @include('partials.errors')
                @include('partials.success')
                @yield('content')
            </div>
            <footer class="footer">
                <div class="container-fluid">
                    <nav class="pull-left">
                        <ul>
                            <li>
                                <a href="#">
                                    Home
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    Company
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    Portfolio
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    Blog
                                </a>
                            </li>
                        </ul>
                    </nav>
                    <p class="copyright pull-right">
                        &copy;
                        <script>
                            document.write(new Date().getFullYear())
                        </script>
                        <a href="http://www.creative-tim.com">Creative Tim</a>, made with love for a better web
                    </p>
                </div>
            </footer>
        </div>
    </div>


<!--   Core JS Files   -->
<script src="{{ url('js/jquery-3.2.1.min.js') }}" type="text/javascript"></script>
<script src="{{ url('js/jquery.validate.min.js') }}" type="text/javascript"></script>

<script src="{{ url('js/bootstrap.min.js') }}" type="text/javascript"></script>
<script src="{{ url('js/material.min.js') }}" type="text/javascript"></script>
<!--  Dynamic Elements plugin -->
<script src="{{ url('js/arrive.min.js') }}"></script>
<!--  PerfectScrollbar Library -->
<script src="{{ url('js/perfect-scrollbar.jquery.min.js') }}"></script>
<script src="{{ url('js/moment.min.js') }}"></script>
<script src="{{ url('js/bootstrap-datetimepicker.js') }}"></script>
<!--  Notifications Plugin    -->
<script src="{{ url('js/bootstrap-notify.js') }}"></script>
<!-- Material Dashboard javascript methods -->
<script src="{{ url('js/material-dashboard.js?v=1.2.0') }}"></script>
<!-- Material Dashboard DEMO methods, don't include it in your project! -->
<script src="{{ url('js/demo.js') }}"></script>
@yield('javascripts')
</body>
</html>