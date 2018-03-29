@extends('layouts.layout')

@section('styles')
<!-- <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs/jq-3.2.1/dt-1.10.16/b-1.5.1/b-colvis-1.5.1/b-flash-1.5.1/b-print-1.5.1/r-2.2.1/sc-1.4.3/datatables.min.css"/> -->
<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/bootstrap-table/1.11.1/bootstrap-table.min.css">
@endsection
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header" data-background-color="purple">
                        <h4 class="title">Listing of Stem Centers</h4>
                        <p class="category">Here is a list of all Centers</p>
                    </div>
                    <div class="card-content table-responsive">
                        <table class="table" id="stemcentersDatatable" data-toggle="table" data-show-columns="true" data-search="true" data-show-toggle="true" data-show-export="true" data-pagination="true" data-buttons-class="info" data-export-options='{"fileName": "test"}' data-export-types="['csv', 'txt', 'sql', 'excel']">
                            <thead class="text-primary">
                            <th data-sortable="true" data-field="name">Name of Stem Center</th>
                            <th data-sortable="true" >Wifi</th>
                            <th data-sortable="true" data-field="males">Registered Males</th>
                            <th data-sortable="true" data-field="females">Registered Females</th>
                            <th data-sortable="true" data-field="busary">Busary Students</th>
                            <th data-sortable="true" data-field="incidents">Incidents</th>
                            <th data-sortable="true" data-field="last_session">Last Session Date</th>
                            <th>View</th>
                            </thead>
                            <tbody>
                            @foreach($stemcenters as $stemcenter)
                                <tr>
                                    <td>{{ $stemcenter->name }}</td>
                                    @if($stemcenter->wifiPassword != '')                                    
                                        <td class="success">Yes</td>   
                                    @else
                                        <td class="danger">No</td>
                                    @endif
                                    <td>{{ $stemcenter->males }}</td>
                                    <td>{{ $stemcenter->females }}</td>
                                    <td>{{ $stemcenter->busary }}</td>
                                    <td>{{ $stemcenter->incidents }}</td>
                                    <td>{{ $stemcenter->last_session }}</td>
                                    <td class="td-actions ">
                                        <button type="button" onclick="show({{$stemcenter->id}})" rel="tooltip" title="" class="btn btn-primary btn-simple btn-xs" data-original-title="Show">
                                            <i class="material-icons">open_in_new</i>
                                            <div class="ripple-container"></div>
                                        </button>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @endsection
    @section('javascripts')
    <script src="{{ url('js/jquery-3.2.1.min.js') }}" type="text/javascript"></script>
    <script src="{{ url('js/sweetalert2.js') }}"></script>
    <!-- <script type="text/javascript" src="https://cdn.datatables.net/v/bs/jq-3.2.1/dt-1.10.16/b-1.5.1/b-colvis-1.5.1/b-flash-1.5.1/b-print-1.5.1/r-2.2.1/sc-1.4.3/datatables.min.js"></script> -->
    <script>
        $(document).ready(function() {
            $('#stemcentersDatatable').DataTable();
        } );
    </script>
    <script type="text/javascript">
        function show(id){
            return location.href='/stemcenters/'+id;
        }
    </script>
    <!-- Latest compiled and minified Locales -->
    <script src="{{ url('js/bootstrap-table.js') }}"></script>
    <script src="{{ url('js/tableExport.js') }}"></script>
    <script src="{{ url('js/bootstrap-table-export.js') }}"></script>
    <script src="{{ url('js/bootstrap-table-key-events.js') }}"></script>
    <script src="{{ url('js/jquery.base64.js') }}"></script>
@endsection