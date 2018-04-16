@extends('layouts.layout')

@section('styles')
<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.9.0/fullcalendar.min.css">
<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.9.0/fullcalendar.print.css">
@endsection

@section('content')
<div class="calendar"></div>
@endsection

@section('javascripts')
    <script src="{{ url('js/jquery-3.2.1.min.js') }}" type="text/javascript"></script>
    <script src="{{ url('js/sweetalert2.js') }}"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.9.0/fullcalendar.min.js"></script>
    <script>
        <script>
            $(document).ready(function() {
                $('#calendar').fullCalendar({
                    weekends: true // will hide Saturdays and Sundays
                });
            } );
        </script>
    </script>
@endsection