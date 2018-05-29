 @extends('layouts.layout')
@section('styles')
<link rel="stylesheet" href="{{ url('css/fullcalendar.css') }}"/>
<link rel="stylesheet" href="{{ url('css/fullcalendar.print.css') }}"  media="print"/>
<link rel="stylesheet" href="{{ url('css/scheduler.css') }}"/>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-colorpicker/2.2.0/css/bootstrap-colorpicker.css"/>
@endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card card-calendar">
                    <div class="card-body ">
                        <div id='calendar'></div>
                        @if(auth()->user()->can('add-event'))
                            @include('partials.modals.createEvent')
                        @endif
                        @if(auth()->user()->can('edit-event') || auth()->user()->can('delete-event'))
                                @include('partials.modals.updateEvent')
                        @endif
                    </div>
                </div>
            </div>
            
        </div>
    </div>
@endsection

@section('javascripts')
    <script src="{{ url('js/jquery.min.js') }}" type="text/javascript"></script>
    <script src="{{ url('js/moment.min.js') }}" type="text/javascript"></script>
    
    <script src='https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.9.0/fullcalendar.min.js' type="text/javascript"></script>
    <script src="{{ url('js/scheduler.js') }}" type="text/javascript"></script>
    <script src="{{ url('js/gcal.js') }}" type="text/javascript"></script>
    <script src="{{ url('js/material.min.js') }}"></script>
    <script src="{{ url('js/bootstrap-datetimepicker.js') }}"></script>
    <script src="{{ url('js/sweetalert2.js') }}" type="text/javascript"></script>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/bootstrap-colorpicker/2.2.0/js/bootstrap-colorpicker.js' type="text/javascript"></script>
    <script>
        function showNotification(from, align,response,ntype){
            $.notify({
                icon: "add_alert",
                message: response

            },{
                type: ntype,
                timer: 1000,
                delay: 1000,
                placement: {
                    from: from,
                    align: align
                }
            });
        }
    </script>
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
                contentHeight: 580,
                handleWindowResize :true,
                eventResize: function(event, delta, revertFunc) {
                    @can('edit-event')
                        $.ajaxSetup({
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            }
                        });

                        $.ajax({
                            type:'POST',
                            url: '/events/' + event.id,
                            dataType:"html",
                            data: {
                                '_method' : 'PUT',
                                'title': event.title,
                                'start_date': event.start.format(),
                                'end_date': event.end.format(),
                                'color': event.color
                            },
                            success: function(response){
                                response = JSON.parse(response);
                                showNotification('top','center',response.success,'success');
                            },
                            error: function(response){
                                response = JSON.parse(response);
                                console.log(response);
                                $("#updateEvent").modal("hide");
                                showNotification('top','center',response.error,'danger');
                            }
                        });
                    @endcan
                },
                eventClick: function(calEvent, jsEvent, view) {
                    @can('edit-event')
                        $('#updateEvent').modal();
                        $(function () {
                            $('#color2').colorpicker({"color": calEvent.color});
                        });
                        $(".modal-body #eventsUpdate #event_id").val(calEvent.id);
                        $(".modal-body #eventsUpdate #title").val(calEvent.title);
                        $(".modal-body #eventsUpdate #start_date").val(calEvent.start.format());
                        $(".modal-body #eventsUpdate #end_date").val(calEvent.end.format());
                        $(".modal-body #eventsUpdate #color2").val(calEvent.color);
                    @endcan
                },
                eventDrop: function(event, delta, revertFunc) {
                    @can('edit-event')
                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });

                    $.ajax({
                        type:'POST',
                        url: '/events/' + event.id,
                        dataType:"html",
                        data: {
                            '_method' : 'PUT',
                            'title': event.title,
                            'start_date': event.start.format(),
                            'end_date': event.end.format(),
                            'color': event.color
                        },
                        success: function(response){
                            response = JSON.parse(response);
                            showNotification('top','center',response.success,'success');
                        },
                        error: function(response){
                            response = JSON.parse(response);
                            console.log(response);
                            $("#updateEvent").modal("hide");
                            showNotification('top','center',response.error,'danger');
                        }
                    });
                    @endcan
                },
                events:[
                    @foreach($events as $event)
                {
                    id : '{{ $event->id }}',
                    title : '{{ $event->title }}',
                    start : '{{ $event->start_date }}',
                    end : '{{ $event->end_date }}',
                    color : '{{ $event->color }}'
                },
                @endforeach
                ],
                
                dayClick: function(date, jsEvent, view) {
                    @can('add-event')
                    $('#createEvent').modal();
                    $(".modal-body #start_date").val(date.format());
                    $(".modal-body #end_date").val(date.format());
                    @endcan
                },
                select: function(startDate, endDate) {
                    @can('add-event')
                    $('#createEvent').modal();
                    $(".modal-body #start_date").val(startDate.format());
                    $(".modal-body #end_date").val(endDate.format());
                    @endcan
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

    <script type="text/javascript">
        $(function () {
            $('#eventsUpdate #end_date').datetimepicker({
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
            $('#eventsUpdate #start_date').datetimepicker({
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

    <script>
        $(function () {
      $('#color').colorpicker();
    });
    </script>
    <script>
        
    </script>

    <script>
        function update(){
            id = $("#event_id").val()
            $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });
            $.ajax({
                        type:'POST',
                        url: '/events/' + id,
                        dataType:"html",
                        data: {
                            '_method' : 'PUT',
                            'title': $(".modal-body #eventsUpdate #title").val(),
                            'start_date': $(".modal-body #eventsUpdate #start_date").val(),
                            'end_date': $(".modal-body #eventsUpdate #end_date").val(),
                            'color': $(".modal-body #eventsUpdate #color2").val()
                        },
                        success: function(response){
                            response = JSON.parse(response);
                            console.log(response);
                            $("#updateEvent").modal("hide");
                            location.reload();
                            showNotification('top','center',response.success,'success');
                        },
                        error: function(response){
                            response = JSON.parse(response);
                            console.log(response);
                            $("#updateEvent").modal("hide");
                            showNotification('top','center',response.error,'danger');
                        }
                    });

        }
    </script>

    <script>
        function dprompt() {
                swal({
                    title: 'Are you sure?',
                    text: "You won't be able to revert this!",
                    type: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, delete it!'
                }).then(function() {
                    event.preventDefault();
                    deleteEvent();
                });
        };
    </script>

    <script>
        function deleteEvent(){
            id = $("#event_id").val()
            $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });
            $.ajax({
                        type:'POST',
                        url: '/events/' + id,
                        dataType:"html",
                        data: {
                            '_method' : 'DELETE'
                        },
                        success: function(response){
                            response = JSON.parse(response);
                            console.log(response);
                            $("#updateEvent").modal("hide");
                            location.reload();
                            showNotification('top','center',response.success,'success');
                        },
                        error: function(response){
                            response = JSON.parse(response);
                            console.log(response);
                            $("#updateEvent").modal("hide");
                            showNotification('top','center',response.error,'danger');
                        }
                    });

        }
    </script>

@endsection