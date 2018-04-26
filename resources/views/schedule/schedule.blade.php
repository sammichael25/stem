 @extends('layouts.layout')
@section('styles')
<link rel="stylesheet" href="{{ url('css/fullcalendar.css') }}"/>
<link rel="stylesheet" href="{{ url('css/fullcalendar.print.css') }}"  media="print"/>
<link rel="stylesheet" href="{{ url('css/scheduler.css') }}"/>
@endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">Events Schedule</div>
                    <div class="panel-body">
                        <div id='calendar'></div>
                        @include('partials.modals.createEvent')
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('javascripts')
    <script src="{{ url('js/jquery.min.js') }}" type="text/javascript"></script>
    <script src="{{ url('js/moment.min.js') }}" type="text/javascript"></script>
//    <script src="{{ url('js/fullcalendar.js') }}" type="text/javascript"></script>
    <script src='http://fullcalendar.io/js/fullcalendar-2.1.1/fullcalendar.min.js' type="text/javascript"></script>
    <script src="{{ url('js/scheduler.js') }}" type="text/javascript"></script>
    <script src="{{ url('js/gcal.js') }}" type="text/javascript"></script>
    <script src="{{ url('js/material.min.js') }}"></script>
    <script src="{{ url('js/bootstrap-datetimepicker.js') }}"></script>

    <script>
        $(document).ready(function() {
            $('#calendar').fullCalendar({
                themeSystem: 'bootstrap4',
                header: {
                left: 'today',
                center: 'title',
                right: 'prev,next'
                },
                eventColor: 'blue',
                selectable:true,
                editable: true,
                eventDurationEditable: true,
                eventDrop: function(event, delta, revertFunc) {
                
                    alert(event.title + " was dropped on " + event.start.format());

                    if (!confirm("Are you sure about this change?")) {
                    revertFunc();
                    }

                },
                events:[
                    @foreach($events as $event)
                {
                    title : '{{ $event->title }}',
                    start : '{{ $event->start_date }}',
                    end : '{{ $event->end_date }}'
                },
                @endforeach
                ],
                
                dayClick: function(date, jsEvent, view) {
                    $('#createEvent').modal();
                    $(".modal-body #start_date").val(date.format());
                    $(".modal-body #end_date").val(date.format());
                }
            });
        } );
    </script>

    <script type="text/javascript">
        $(function () {
            $('#end_date').datetimepicker({
                icons: {
                    date: "fa fa-calendar",
                    up: "fa fa-chevron-up",
                    down: "fa fa-chevron-down",
                    previous: 'fa fa-chevron-left',
                    next: 'fa fa-chevron-right',
                    today: 'fa fa-screenshot',
                    clear: 'fa fa-trash',
                    close: 'fa fa-remove'
                },viewMode: "days",format:"YYYY/MM/DD"
            });
        });
    </script>

    <script type="text/javascript">
        $(function () {
            $('#start_date').datetimepicker({
                icons: {
                    date: "fa fa-calendar",
                    up: "fa fa-chevron-up",
                    down: "fa fa-chevron-down",
                    previous: 'fa fa-chevron-left',
                    next: 'fa fa-chevron-right',
                    today: 'fa fa-screenshot',
                    clear: 'fa fa-trash',
                    close: 'fa fa-remove'
                },viewMode: "days",format:"YYYY/MM/DD"
            });
        });
    </script>

@endsection