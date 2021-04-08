@extends('adminlte::page')

@section('title', 'Gejala')

@section('content_header')
    <h1>{{ isset($evidence) ? 'Edit Informasi Gejala' : 'Tambah Daftar Gejala' }}</h1>
@stop

@section('content')
<div class="card card-info">
    <div class="card-header">
        <h3 class="card-title">Form</h3>
    </div>
    <!-- /.card-header -->

    <!-- form start -->
    <form class="form-horizontal" action="{{ isset($evidence) ? route('evidence.update') : route('evidence.store') }}" method="POST">
        @csrf
        <div class="card-body">
            @if (session('failed'))
                <div class="alert alert-danger alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <h6><i class="icon fas fa-ban"></i>{{ session('failed') }}</h6>
                </div>
            @endif
            <div class="form-group row">
                <label for="name" class="col-sm-1 col-form-label">Nama</label>
                <div class="col-sm-5">
                    <input type="text" class="form-control" id="name" name="name" placeholder="Nama Gejala" value="{{ isset($evidence) ? $evidence->name : '' }}" required>
                </div>
            </div>
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
    <script> console.log('Hi!'); </script>
@stop
