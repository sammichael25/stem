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
                            <th data-sortable="true" data-field="mname">Middle Name</th>
                            <th data-sortable="true" data-field="lname">Last Name</th>
                            <th data-sortable="true" data-field="sex">Sex</th>
                            <th data-sortable="true" data-field="degree">Degree</th>
                            <th data-sortable="true" data-field="contact">Contact</th>
                            <th data-sortable="true" data-field="driver">Driver</th>
                            <th data-sortable="true" data-field="status">Status</th>
                            <th>Action</th>
                            </thead>
                            <tbody>
                            @foreach($employees as $employee)
                                <tr>
                                    <td>{{ $employee->fname }}</td>
                                    <td>{{ $employee->mname }}</td>
                                    <td>{{ $employee->lname }}</td>
                                    <td>{{ $employee->sex }}</td>
                                    <td>{{ $employee->degree }}</td>
                                    <td>{{ $employee->contact->mobile1 }}</td>
                                    <td>{{ $employee->driver }}</td>
                                    @if($employee->status == 'Active')                                    
                                        <td class="success">{{ $employee->status }}</td>   
                                    @else
                                        <td class="danger">{{ $employee->status }}</td>
                                    @endif
                                    <td class="td-actions ">
                                        <button type="button" onclick="edit({{$employee->id}})" rel="tooltip" title="" class="btn btn-primary btn-simple btn-xs" data-original-title="Edit">
                                            <i class="material-icons">edit</i>
                                            <div class="ripple-container"></div></button>
                                        <button type="button" onclick="dprompt();"
                                                rel="tooltip" title="" class="btn btn-danger btn-simple btn-xs" data-original-title="Remove">
                                            <i class="material-icons">close</i>
                                        </button>

                                        <form id="delete-form" action="{{route('employees.destroy',[$employee->id])}}"
                                        method="post" style="display: none;">
                                            <input type="hidden" name="_method" value="delete">
                                            {{csrf_field()}}

                                        </form>
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
            //$('#employeeDatatable').DataTable();
        } );
    </script>
    <script type="text/javascript">
        function edit(id){
            return location.href='/employees/'+id+'/edit';
        }

        function destroy(id){
            return location.href='/employees/'+id;
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
                    document.getElementById('delete-form').submit();
                });
        };
    </script>
    <!-- Latest compiled and minified Locales -->
    <script src="{{ url('js/bootstrap-table.js') }}"></script>
    <script src="{{ url('js/tableExport.js') }}"></script>
    <script src="{{ url('js/bootstrap-table-export.js') }}"></script>
    <script src="{{ url('js/bootstrap-table-key-events.js') }}"></script>
    <script src="{{ url('js/jquery.base64.js') }}"></script>
@endsection