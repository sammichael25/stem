@extends('layouts.layout')

@section('styles')
<link rel="stylesheet" href="//cdn.jsdelivr.net/chartist.js/latest/chartist.min.css">
@endsection

@section('content')
    <div class="row">
        <div class="col-lg-3 col-md-6 col-sm-6">
            <div class="card card-stats">
                <div class="card-header" data-background-color="orange">
                    <i class="material-icons">functions</i>
                </div>
                <div class="card-content">
                    <p class="category">All Students</p>
                    <h3 class="title">{{ $stemcenter->males + $stemcenter->females}}
                        <small>in total</small>
                    </h3>
                </div>
                <div class="card-footer">
                    <div class="stats">
                        <i class="material-icons">date_range</i> Last Updated {{ \Carbon\Carbon::parse($stemcenter->updated_at)->diffForHumans()}}
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-6">
            <div class="card card-stats">
                <div class="card-header" data-background-color="green">
                    <i class="fa fa-male"></i>
                </div>
                <div class="card-content">
                    <p class="category">Males</p>
                    <h3 class="title">{{ $stemcenter->males }}
                        <small>boys</small>
                    </h3>
                </div>
                <div class="card-footer">
                    <div class="stats">
                        <i class="material-icons">date_range</i> Last Updated {{ \Carbon\Carbon::parse($stemcenter->updated_at)->diffForHumans()}}
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-6">
            <div class="card card-stats">
                <div class="card-header" data-background-color="blue">
                    <i class="fa fa-female"></i>
                </div>
                <div class="card-content">
                    <p class="category">Females</p>
                    <h3 class="title">{{ $stemcenter->females }}
                        <small>girls</small>
                    </h3>
                </div>
                <div class="card-footer">
                    <div class="stats">
                        <i class="material-icons">update</i> Last Updated {{ \Carbon\Carbon::parse($stemcenter->updated_at)->diffForHumans()}}
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-6">
            <div class="card card-stats">
                <div class="card-header" data-background-color="red">
                    <i class="material-icons">info_outline</i>
                </div>
                <div class="card-content">
                    <p class="category">Incidents</p>
                    <h3 class="title">{{ $stemcenter->incidents }}
                        <small>reported incidents</small>
                    </h3>
                </div>
                <div class="card-footer">
                    <div class="stats">
                        <i class="material-icons">date_range</i> Last Updated {{ \Carbon\Carbon::parse($stemcenter->updated_at)->diffForHumans()}}
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-5">
            <div class="card card-product" data-count="4">
                <div class="card-header card-header-image" data-header-animation="false">
                    <a href="#pablo">
                        <img class="img" src="../{{ $stemcenter->image_location }}">
                    </a>
                </div>
                <div class="card-body">
                    <h4 class="card-title">
                        <a href="#pablo" style= "color:#000000;">{{ $stemcenter->name }}</a>
                    </h4>
                    <div class="card-description">
                        {{ $stemcenter->description }}
                    </div>
                </div>
                <div class="card-footer">
                </div>
            </div>
        </div>
        <div class="col-md-7">
            <div class="card card-stats">
                <div class="card-header" data-background-color="rose">
                    <i class="material-icons">location_on</i>
                </div>
                <div class="card-content">
                    <div id="regularMap" class="map"></div>
                </div>
                <div class="card-footer">
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-5">
            <div class="card card-stats">
                <div id="card-header" class="card-header" data-background-color="purple">
                    <i class="material-icons">pie_chart</i>
                </div>
                
                <div class="card-content">
                    <h4 class="card-title">Male to Female Ratio</h4>
                    <div class="ct-chart">
                    </div>
                </div>
                <div class="card-footer">
                  <div class="row">
                    <div class="col-md-12">
                      <h6 class="card-category">Legend</h6>
                    </div>
                    <div class="col-md-12">
                      <i class="fa fa-circle text-info"></i> Males
                      <i class="fa fa-circle text-danger"></i> Females
                    </div>
                  </div>
                </div>
            </div>
        </div>
        <div class="col-md-7">
            <div class="card card-stats">
                <div id="card-header" class="card-header" data-background-color="grey">
                    <i class="material-icons">show_chart</i>
                </div>
                
                <div class="card-content">
                    <h4 class="card-title">Attendance</h4>
                    <div class="ct-chart chart2">
                    </div>
                </div>
                <div class="card-footer">
                  <div class="row">
                    <div class="col-md-12">
                      <h6 class="card-category">Legend</h6>
                    </div>
                    <div class="col-md-12">
                      <i class="fa fa-circle text-danger"></i> Total
                      <i class="fa fa-circle text-info"></i> Males
                      <i class="fa fa-circle text-success"></i> Females
                    </div>
                  </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        
    </div>
@endsection
@section('javascripts')
    <script src="{{ url('js/jquery-3.2.1.min.js') }}" type="text/javascript"></script>
    <script src="https://maps.googleapis.com/maps/api/js" type="text/javascript"></script>
    <script src="//cdn.jsdelivr.net/chartist.js/latest/chartist.min.js"></script>
    <script>
        $(document).ready(function() {
            loadMap({{ $stemcenter->latitude }},{{ $stemcenter->longitude }});
            loadPieChart();
            loadLineChart();
            
        });
    </script>

    <script type="text/javascript">
       function loadMap(lat,long){
        var myLatlng = new google.maps.LatLng(lat, long);
        var mapOptions = {
            zoom: 16,
            center: myLatlng,
            scrollwheel: false, //we disable de scroll over the map, it is a really annoing when you scroll through page
        }

        var map = new google.maps.Map(document.getElementById("regularMap"), mapOptions);

        var marker = new google.maps.Marker({
            position: myLatlng,
        });

        marker.setMap(map);
        }   
    </script>

    <script>
    function loadPieChart(){
        // Drawing a pie chart with padding and labels that are outside the pie
            var sum;
            sum = {{ $stemcenter->males }} + {{ $stemcenter->females }};
            boy = ({{ $stemcenter->males }}/sum) * 100 ;
            girl = ({{ $stemcenter->females }}/sum) * 100 ;
            //boy = 2;
            //girl = 2;
            new Chartist.Pie('.ct-chart', {
                labels: [boy+"%",girl+"%"],
                series: [boy,girl]
            }, {
            classNames: {
                chartPie: 'ct-chart-pie',
                chartDonut: 'ct-chart-donut',
                series: 'ct-series',
                slicePie: 'ct-slice-pie',
                sliceDonut: 'ct-slice-donut',
                sliceDonutSolid: 'ct-slice-donut-solid',
                label: 'ct-label'
            },
            width: '100%',
            height: '230px',
            ignoreEmptyValues: false,
            chartPadding: 10,
            labelPosition: 'inside',
            labelOffset: 0,
            labelDirection: 'explode'
            });

    }
    </script>

    <script>
    function loadLineChart(){
        var totalAttendances = JSON.parse('{{ json_encode($totalAttendances) }}');
        var maleAttendances = JSON.parse('{{ json_encode($maleAttendances) }}');
        var femaleAttendances = JSON.parse('{{ json_encode($femaleAttendances) }}');
        var attendancesDate = {!! json_encode($attendancesDate) !!};

        var chart = new Chartist.Line('.chart2', {
            labels: attendancesDate,
            series: [
                totalAttendances,
                maleAttendances,
                femaleAttendances
            ]
            }, {
                lineSmooth: false,
                low: 0,
                height:'230px'
            });

            // Let's put a sequence number aside so we can use it in the event callbacks
            var seq = 0,
            delays = 80,
            durations = 500;

            // Once the chart is fully created we reset the sequence
            chart.on('created', function() {
            seq = 0;
            });

            // On each drawn element by Chartist we use the Chartist.Svg API to trigger SMIL animations
            chart.on('draw', function(data) {
            seq++;

            if(data.type === 'line') {
                // If the drawn element is a line we do a simple opacity fade in. This could also be achieved using CSS3 animations.
                data.element.animate({
                opacity: {
                    // The delay when we like to start the animation
                    begin: seq * delays + 1000,
                    // Duration of the animation
                    dur: durations,
                    // The value where the animation should start
                    from: 0,
                    // The value where it should end
                    to: 1
                }
                });
            } else if(data.type === 'label' && data.axis === 'x') {
                data.element.animate({
                y: {
                    begin: seq * delays,
                    dur: durations,
                    from: data.y + 100,
                    to: data.y,
                    // We can specify an easing function from Chartist.Svg.Easing
                    easing: 'easeOutQuart'
                }
                });
            } else if(data.type === 'label' && data.axis === 'y') {
                data.element.animate({
                x: {
                    begin: seq * delays,
                    dur: durations,
                    from: data.x - 100,
                    to: data.x,
                    easing: 'easeOutQuart'
                }
                });
            } else if(data.type === 'point') {
                data.element.animate({
                x1: {
                    begin: seq * delays,
                    dur: durations,
                    from: data.x - 10,
                    to: data.x,
                    easing: 'easeOutQuart'
                },
                x2: {
                    begin: seq * delays,
                    dur: durations,
                    from: data.x - 10,
                    to: data.x,
                    easing: 'easeOutQuart'
                },
                opacity: {
                    begin: seq * delays,
                    dur: durations,
                    from: 0,
                    to: 1,
                    easing: 'easeOutQuart'
                }
                });
            } else if(data.type === 'grid') {
                // Using data.axis we get x or y which we can use to construct our animation definition objects
                var pos1Animation = {
                begin: seq * delays,
                dur: durations,
                from: data[data.axis.units.pos + '1'] - 30,
                to: data[data.axis.units.pos + '1'],
                easing: 'easeOutQuart'
                };

                var pos2Animation = {
                begin: seq * delays,
                dur: durations,
                from: data[data.axis.units.pos + '2'] - 100,
                to: data[data.axis.units.pos + '2'],
                easing: 'easeOutQuart'
                };

                var animations = {};
                animations[data.axis.units.pos + '1'] = pos1Animation;
                animations[data.axis.units.pos + '2'] = pos2Animation;
                animations['opacity'] = {
                begin: seq * delays,
                dur: durations,
                from: 0,
                to: 1,
                easing: 'easeOutQuart'
                };

                data.element.animate(animations);
            }
            });

            // For the sake of the example we update the chart every time it's created with a delay of 10 seconds
            chart.on('created', function() {
            if(window.__exampleAnimateTimeout) {
                clearTimeout(window.__exampleAnimateTimeout);
                window.__exampleAnimateTimeout = null;
            }
            window.__exampleAnimateTimeout = setTimeout(chart.update.bind(chart), 12000);
            });
    }
</script>
