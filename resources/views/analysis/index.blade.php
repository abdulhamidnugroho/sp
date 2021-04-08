@extends('adminlte::page')

@section('title', 'Analisis')

@section('content_header')
    <h1>Analisis</h1>
@stop

@section('content')
<div class="col-12">
    <div class="card card-info">
        <div class="card-header">
            <h3 class="card-title">Analisis Gejala</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form id="analysisForm" class="form-horizontal" action="{{ route('analysis') }}" method="POST">
            @csrf
            <div class="card-body">
                @foreach ($evidences as $item)
                <div class="form-group row">
                    <label for="gejala" class="col-sm-9 col-form-label">{{ $item->name }}</label>
                    <div class="col-sm-3">
                        <select class="form-control" name="evidences[]" id="evidences">
                            @foreach ($user_rule as $key => $value)
                                <option value="{{ $item->id . '-' . $value }}">{{ $key }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                @endforeach
            </div>
            <!-- /.card-body -->
            <div class="card-footer">
                <button type="submit" class="btn btn-info">Submit</button>
                <button type="reset" class="btn btn-default">Reset</button>
            </div>
            <!-- /.card-footer -->
        </form>
      </div>
</div>
<div class="modal fade" id="modal-lg">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Hasil Analisis</h4>
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
    $(document).on('submit', '#analysisForm', function (e) {
        e.preventDefault();
        console.log('submit');
        var form = $('#analysisForm'),
            url  = form.attr('action'),
            data = new FormData(form[0]);

        $.ajax({
            url: url,
            method: 'post',
            contentType: false,
            processData: false,
            data: data,
            success: function (response) {
                console.log(response);
                $('#modal-lg .modal-body').empty();

                if (response.modal) {
                    $('#modal-lg').modal('show')
                    console.log('in');
                    $('#modal-lg .modal-body').append(response.modal);
                }
            },
            error: function (error) {
                console.log(error);
            }
        });
    });
  </script>
@stop

