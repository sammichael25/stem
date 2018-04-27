@if (session()->has('success'))
    <script src="{{ url('js/jquery-3.2.1.min.js') }}" type="text/javascript"></script>
    <script src="{{ url('js/bootstrap-notify.js') }}"></script>
    <script>
    $(document).ready(function($) {

        function showNotification(from, align){

            $.notify({
                icon: "add_alert",
                message: "{!! session()->get('success') !!}"

            },{
                type: 'success',
                delay: 1000,
                timer: 1000,
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