@if (isset($errors)&&count($errors) > 0)
    <script src="{{ url('js/jquery-3.2.1.min.js') }}" type="text/javascript"></script>
    <script src="{{ url('js/bootstrap-notify.js') }}"></script>
    <script>
        $(document).ready(function($) {

            function showNotification(from, align){

                $.notify({
                    icon: "add_alert",
                    message: "@foreach($errors->all() as $error)
                        <li><strong>{!! $error !!}</strong></li> @endforeach"

                },{
                    type: 'success',
                    timer: 500,
                    placement: {
                        from: from,
                        align: align
                    }
                });
            }

            showNotification('top','center');
        });
    </script>


@endif

