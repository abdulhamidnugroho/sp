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
    <form class="form-horizontal" action="{{ isset($base) ? route('disease.update') : route('disease.store') }}" method="POST">
        @csrf
        <div class="card-body">
            @if (session('failed'))
                <div class="alert alert-danger alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <h6><i class="icon fas fa-ban"></i>{{ session('failed') }}</h6>
                </div>
            @endif
            <div class="form-group row">
                <label for="name" class="col-sm-1 col-form-label">Penyakit</label>
                <div class="col-sm-5">
                    <select class="form-control" name="disease" id="disease">
                        @foreach ($diseases as $value)
                            <option value="{{ $value->id }}">{{ $value->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <hr>
            @foreach ($evidences as $key => $item)
            <div class="form-group row">
                <div class="col-sm-8 custom-control custom-checkbox">
                    <input class="custom-control-input" type="checkbox" id="evidence{{ $key + 1 }}" value="option1">
                    <label for="evidence{{ $key + 1 }}" class="custom-control-label">{{ $key + 1 . '. ' . $item->name }}</label>
                </div>
                <div class="col-sm-2">
                    <input type=number step=0.01 min="0" max="1" class="form-control" id="name" name="name" placeholder="CF Expert">
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

    </script>
@stop
