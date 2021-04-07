@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Daftar Gejala</h1>
@stop

@section('content')
<div class="card">
    <div class="card-header">
      <h3 class="card-title">DataTable</h3>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
        <div id="example1_wrapper" class="dataTables_wrapper dt-bootstrap4">
            <table id="dataTable" class="table table-striped">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Question</th>
                        <th>Order</th>
                    </tr>
                </thead>
                <tbody>
                </tbody>
            </table>
        </div>
    </div>
    <!-- /.card-body -->
</div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script>
        var dataTable;

        $(document).ready(function() {
            dataTable = $('#dataTable').DataTable({
                DisplayLength: 50,
                processing: true,
                serverSide: true,
                deferRender : true,
                stateSave: true,
                language: {
                    search: '<i class="fa fa-search" aria-hidden="true"></i>',
                    searchPlaceholder: 'Search FAQ'
                },
                ajax: {

                },
                columnDefs: [{
                    searchable: false,
                    orderable: false,
                    targets: 0
                }],
                order:[[2,'asc']],
                columns: [
                    { data: "DT_RowIndex" },
                    { data: "question" },
                    { data: "order" },
                ],
            });
        });
    </script>
@stop

@section('plugins.Datatables', true)
