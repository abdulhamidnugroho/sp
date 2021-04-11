@extends('adminlte::page')

@section('title', 'Basis Pengetahuan')

@section('content_header')
    <h1>Basis Pengetahuan</h1>
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
                        <th>Jumlah Rule (Gejala)</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                </tbody>
            </table>
        </div>
    </div>
    <!-- /.card-body -->
</div>
<div class="modal fade" id="modal-lg">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
            <h4 class="modal-title"></h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
            <div class="modal-body">

            </div>
            <div class="modal-footer justify-content-between">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->
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
                    url: "{{ route('base.table') }}",
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
                    { data: "evidence_rules_count", width: "10%" },
                    {
                        orderable: false,
                        className: 'text-center',
                        render: function (data, type, row) {
                            return '<button class="btn btn-block btn-info base-detail" data-id="' + row.id + '" href="#" aria-pressed="false">Detail</a>'+
                            '<a href="{{ route("base.edit", ["id"=>"/"]) }}/' + row.id +'"><button style="margin: 10px 0;" class="btn btn-block btn-secondary" aria-pressed="false">Edit</button></a>'+
                            '<button class="btn btn-block btn-danger" href="javascript:void(0)" onclick=deleteRow('+ row.id +')>Delete</button>';
                        },
                        width: "20%"
                    },
                ],
            });
        });

        $(document).on('click', '.base-detail', function(){
            console.log('teasd de');
            let id = $(this).data('id');

            $('#modal-lg').modal();

            $.ajax({
                url : '{{ env('APP_URL')}}' + 'base/detail/' + id,
                method : 'post',
                data: {
                    _token: "{{ csrf_token() }}",
                },
                success : function (response) {
                    $('#modal-lg .modal-body').empty();
                    $('#modal-lg .modal-title').empty();

                    if (response.modal) {
                        $('#modal-lg .modal-body').html(response.modal);
                        $('#modal-lg .modal-title').append(response.disease);
                    }
                },
                error : function (xhr) {
                    if (xhr.status == 401) {
                        swal({
                            type: "error",
                            title: "Your login status in invalid!",
                            text: "Please do login again.",
                        }, function (isConfirm) {
                            $('#formLogout').submit();
                        });
                    }
                }
            });
        });
    </script>
@stop

@section('plugins.Datatables', true)
