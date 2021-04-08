@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Daftar Penyakit</h1>
@stop

@section('content')
<div class="card">
    <div class="card-header">
      <h3 class="card-title">DataTable</h3>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
        @if (session('success'))
            <div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h5><i class="icon fas fa-check"></i>{{ session('success') }}</h5>
            </div>
        @endif
        <div id="example1_wrapper" class="dataTables_wrapper dt-bootstrap4">
            <table id="dataTable" class="table table-striped">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Code</th>
                        <th>Nama Penyakit</th>
                        <th>Deskripsi</th>
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
                    searchPlaceholder: 'Search Penyakit'
                },
                ajax: {
                    url: "{{ route('disease.table') }}",
                    type: "get",
                    dataType: "json",
                },
                columnDefs: [{
                    searchable: false,
                    orderable: false,
                    targets: 0
                }],
                order:[[1,'asc']],
                columns: [
                    { data: "DT_RowIndex" },
                    { data: "code" },
                    { data: "name" },
                    { data: "description", width: "40%" },
                ],
            });
        });
    </script>
@stop

@section('plugins.Datatables', true)
