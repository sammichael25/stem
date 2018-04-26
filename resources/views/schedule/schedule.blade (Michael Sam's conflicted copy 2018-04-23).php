 @extends('layouts.layout')

@section('styles')
<link rel="stylesheet" href="{{ url('css/fullcalendar.css') }}"/>
<link rel="stylesheet" href="{{ url('css/fullcalendar.print.css') }}"  media="print"/>
<link rel="stylesheet" href="{{ url('css/scheduler.css') }}"/>
<link rel="stylesheet" href="{{ url('css/sweetalert2.css') }}"/>
@endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">Events Schedule</div>
                    <div class="panel-body">
                        <div id='calendar'></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('javascripts')
    <script src="{{ url('js/jquery.min.js') }}" type="text/javascript"></script>
    <script src="{{ url('js/moment.min.js') }}" type="text/javascript"></script>
    <script src="{{ url('js/fullcalendar.js') }}" type="text/javascript"></script>
    <script src="{{ url('js/scheduler.js') }}" type="text/javascript"></script>
    <script src="{{ url('js/gcal.js') }}" type="text/javascript"></script>
    <script src="{{ url('js/sweetalert2.all.min.js') }}"></script>
    <script src="https://unpkg.com/promise-polyfill@7.1.0/dist/promise.min.js"></script>
    //<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.9.0/moment.min.js"></script>
    //<script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/2.2.7/fullcalendar.min.js"></script>
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
                
                dayClick:async function(date, jsEvent, view) {
                    const {value: formValues} = await swal({
                        title: 'New Event',
                        html:
                            '<input id="title" class="swal2-input"> Title' +
                            '<input id="start_date" class="swal2-input"> Start Date'+
                            '<input id="end_date" class="swal2-input"> End Date',
                        focusConfirm: false,
                        preConfirm: () => {
                            return [
                            document.getElementById('title').value,
                            document.getElementById('start_date').value,
                            document.getElementById('end_date').value
                            ]
                        }
                    });
                    if (formValues) {
                        //$('#calendar').fullCalendar('renderEvent', formValues);
                        swal(JSON.stringify(formValues))
                    }
                    

                }
            });
        } );
    </script>

@endsection