@extends('layouts.master')
@section('title')Sets @endsection
@section('styles')

    <link href="{{URL::asset('css/plugins/datatables/jquery.dataTables.css')}}" rel="stylesheet">
    <link href="{{URL::asset('js/plugins/datatables/extensions/Buttons/css/buttons.dataTables.css')}}" rel="stylesheet">

@endsection

@section('content')

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h2>Sets List</h2>
                </div>
                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                    @if (session('edit'))
                        <div class="alert alert-success">
                            {{ session('edit') }} updated successfully
                        </div>
                    @endif
                    <div class="table-responsive">
                            <table class="table table-striped table-bordered table-hover dataTables-example dataTable" id="DataTables_Table_0" aria-describedby="DataTables_Table_0_info" role="grid">
                                <thead>
                                <tr role="row">
                                    <th>Name</th>
                                    <th>Type</th>
                                    <th>Level</th>
                                    <th>Team</th>
                                    <th>Category</th>
                                    <th>Settings</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($rows as $row)
                                    <tr class="gradeA" role="row">

                                        <td>{{ $row->name  }}</td>
                                        <td>{{ $row->type  }}</td>
                                        <td>
                                            @php
                                            switch ($row->level)
                                            {
                                            case 1:
                                                echo '<div class="alert alert-success">Low level</div>';
                                            break;
                                            case 2:
                                                echo '<div class="alert alert-warning">MID level</div>';
                                            break;
                                            case 3:
                                            echo '<div class="alert alert-danger">High level</div>';
                                            break;
                                            }
                                            @endphp
                                        </td>
                                        <td>{{ $row->team->name  }}</td>
                                        <td>{{ $row->category->name  }}</td>
                                        <td>
                                            <a href="{{ route('question.set-create', $row->id) }}" class="btn btn-blue"><span class="fa fa-question-circle"></span> Add new question </a>
                                            <a href="{{ route('question.set', $row->id) }}" class="btn btn-black"><span class="fa fa-question-circle"></span> Questions </a>
                                            <a href="{{ route('sets.edit', $row->id) }}" class="btn btn-info"><span class="fa fa-pencil-square"></span> Edit </a>
                                        </td>

                                    </tr>

                                @endforeach


                                </tbody>
                                <tfoot>
                                <tr role="row">
                                    <th>Name</th>
                                    <th>Type</th>
                                    <th>Level</th>
                                    <th>Team</th>
                                    <th>Category</th>
                                    <th>Settings</th>
                                </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>



@endsection

@section('scripts')

    <script src="{{URL::asset('js/plugins/datatables/jquery.dataTables.min.js')}}"></script>
    <script src="{{URL::asset('js/plugins/datatables/dataTables.bootstrap.min.js')}}"></script>
    <script src="{{URL::asset('js/plugins/datatables/extensions/Buttons/js/dataTables.buttons.min.js')}}"></script>
    <script src="{{URL::asset('js/plugins/datatables/jszip.min.js')}}"></script>
    <script src="{{URL::asset('js/plugins/datatables/pdfmake.min.js')}}"></script>
    <script src="{{URL::asset('js/plugins/datatables/vfs_fonts.js')}}"></script>
    <script src="{{URL::asset('js/plugins/datatables/extensions/Buttons/js/buttons.html5.js')}}"></script>
    <script src="{{URL::asset('js/plugins/datatables/extensions/Buttons/js/buttons.colVis.js')}}"></script>
    <script>
        $(document).ready(function () {
            $('.dataTables-example').DataTable({
                dom: '<"html5buttons" B>lTfgitp',
                buttons: [
                    {
                        extend: 'copyHtml5',
                        exportOptions: {
                            columns: [ 0, ':visible' ]
                        }
                    },
                    {
                        extend: 'excelHtml5',
                        exportOptions: {
                            columns: ':visible'
                        }
                    },
                    {
                        extend: 'pdfHtml5',
                        exportOptions: {
                            columns: [ 0, 1, 2, 3, 4 ]
                        }
                    },
                    'colvis'
                ]
            });
        });
    </script>


@endsection
