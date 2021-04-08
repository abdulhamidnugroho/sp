<div class="card">
    <div class="card-header">
      <h3 class="card-title">Data Gejala</h3>
    </div>
    <!-- /.card-header -->
    <div class="card-body table-responsive p-0">
        <table class="table table-hover text-nowrap">
            <thead>
            <tr>
                <th>No</th>
                <th>Gejala</th>
                <th>CF Expert</th>
            </tr>
            </thead>
            <tbody>
                @foreach ($evidences as $key => $item)
                <tr>
                    <td>{{ $key + 1 }}</td>
                    <td>{{ $item->evidence->name }}</td>
                    <td>{{ $item->cf_rule }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <!-- /.card-body -->
  </div>
