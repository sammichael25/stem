@extends('layout')

@section('content')
    <div id="map"></div>
@endsection

@section('script')
    <script type="text/javascript">
        $(document).ready(function() {
            if ($('.main-panel > .content').length == 0) {
                $('.main-panel').css('height', '100%');
            }


            // Javascript method's body can be found in assets/js/demos.js
            demo.initGoogleMaps();
        });
    </script>
@endsection
