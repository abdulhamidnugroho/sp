@extends('adminlte::page')

@section('title', 'Penyakit')

@section('content_header')
    <h1>{{ isset($base) ? 'Edit Rule Penyakit' : 'Tambah Rule Penyakit' }}</h1>
@stop

@section('content')
<div class="card card-info">
    <div class="card-header">
        <h3 class="card-title">Form</h3>
    </div>
    <!-- /.card-header -->

    <!-- form start -->
    <form id="baseForm" class="form-horizontal" action="{{ isset($base) ? route('base.update') : route('base.store') }}" method="POST">
        @csrf
        <div class="card-body">
            @if (session('failed'))
                <div class="alert alert-danger alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <h6><i class="icon fas fa-ban"></i>{{ session('failed') }}</h6>
                </div>
            @endif
            @isset($base)
                <input type="hidden" name="disease_id" value="{{ $base }}">
            @endisset
            <div class="form-group row">
                <label for="name" class="col-sm-1 col-form-label">Penyakit</label>
                <div class="col-sm-5">
                    <select class="form-control" name="disease_id" id="disease_id" {{ isset($base) ? 'disabled' : 'required' }} @isset($base) disabled @endisset required>
                        @foreach ($diseases as $value)
                            <option value="{{ $value->id }}"
                            @if (isset($base) && $base == $value->id)
                            selected
                            @endif
                            > {{ $value->name }}
                            </option>
                        @endforeach
                    </select>
                </div>
            </div>
            <hr>
            @foreach ($evidences as $key => $item)
            <div class="form-group row ev-cf">
                <input type="hidden" class="ev_id" value="{{ $item->id }}">
                <label for="name" class="col-sm-8 col-form-label">{{ $key + 1 . '. ' . $item->name }}</label>
                <div class="col-sm-2">
                    @if (isset($base))
                        <input type=number step=0.01 min="0" max="1" class="form-control cf_rule" id="name" value="" placeholder="CF Expert">
                    @else
                        <input type=number step=0.01 min="0" max="1" class="form-control cf_rule" id="name" placeholder="CF Expert">
                    @endif
                </div>
            </div>
            @endforeach
        </div>
        <!-- /.card-body -->
        <div class="card-footer">
            <button type="submit" class="btn btn-info">Submit</button>
        </div>
        <!-- /.card-footer -->
    </form>
</div>
@stop

@section('js')
    <script>
        function evCf() {
            let ev_cf = [];

            $('.ev-cf').each( function (index, value) {
                let ev_id = $(this).find('.ev_id').val();
                let cf_rule = $(this).find('.cf_rule').val();

                if (cf_rule !== '') {
                    let temp = {};
                    temp["ev_id"] = ev_id;
                    temp["cf_rule"] = cf_rule;

                    ev_cf.push(temp);
                }
            });

            return ev_cf;
        }

        $(document).on('submit', '#baseForm', function (e) {
            e.preventDefault();

            var form = $('#baseForm'),
                url  = form.attr('action'),
                data = new FormData(form[0]);

            var arr = evCf();
            var json_arr = JSON.stringify(arr);

            data.append('ev_cf', json_arr);

            $.ajax({
                url: url,
                method: 'post',
                contentType: false,
                processData: false,
                data: data,
                success: function (response) {
                    Swal.fire(
                        'Good job!',
                        'You clicked the button!',
                        'success'
                    );

                    setTimeout(window.location.reload.bind(window.location), 3000);
                },
                error: function (error) {
                    console.log(error);
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: 'Something went wrong!',
                    });

                    setTimeout(window.location.reload.bind(window.location), 3000);
                }
            });
        });
    </script>
@stop

@section('plugins.Sweetalert2', true)
