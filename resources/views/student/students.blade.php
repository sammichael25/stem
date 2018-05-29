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
                        <h4 class="title">Students Listing</h4>
                        <p class="category">Here is a list of all students</p>
                    </div>
                    <div class="card-content table-responsive">
                        <table class="table" id="allStudentsDatatable" data-toggle="table" data-show-columns="true" data-search="true" data-show-toggle="true" data-show-export="true" data-pagination="true" data-buttons-class="info" data-export-options='{"fileName": "test"}' data-export-types="['csv', 'txt', 'sql', 'excel']">
                            <thead class="text-primary">
                            <th data-sortable="true" data-field="fname">First Name</th>
                            <th data-sortable="true" data-field="lname">Last Name</th>
                            <th data-sortable="true" data-field="dob">DOB</th>
                            <th data-sortable="true" data-field="sex">Sex</th>
                            <th data-sortable="true" data-field="form">Form</th>
                            @if(auth()->user()->can('edit-student') || auth()->user()->can('delete-student'))
                                <th>Action</th>
                            @endif
                            </thead>
                            <tbody>
                            @foreach($students as $student)
                                <tr>
                                    <td>{{ $student->fname }}</td>
                                    <td>{{ $student->lname }}</td>
                                    <td>{{ $student->dob }}</td>
                                    <td>{{ $student->sex }}</td>
                                    <td>{{ $student->form }}</td>
                                    
                                    <td class="td-actions ">
                                    @can('edit-student')
                                        <button type="button" onclick="edit({{$student->id}})" rel="tooltip" title="" class="btn btn-primary btn-simple btn-xs" data-original-title="Edit">
                                            <i class="material-icons">edit</i>
                                            <div class="ripple-container"></div>
                                        </button>
                                    @endcan
                                    @can('delete-student')
                                        <button type="button" onclick="dprompt();"
                                                rel="tooltip" title="" class="btn btn-danger btn-simple btn-xs" data-original-title="Remove">
                                            <i class="material-icons">close</i>
                                        </button>

                                        <form id="delete-form" action="{{route('students.destroy',[$student->id])}}"
                                        method="post" style="display: none;">
                                            <input type="hidden" name="_method" value="delete">
                                            {{csrf_field()}}

                                        </form>
                                        @endcan
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
            //$('#allStudentsDatatable').DataTable();
        } );
    </script>
    <script type="text/javascript">
        function edit(id){
            return location.href='/students/'+id+'/edit';
        }

        function destroy(id){
            return location.href='/students/'+id;
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