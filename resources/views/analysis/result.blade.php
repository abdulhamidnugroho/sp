<form>
    <div id="accordion">
    @foreach ($results as $key => $item)
        <div class="card card-info">
            <div class="card-header">
              <h4 class="card-title w-100">
                <a class="d-block w-100 collapsed" data-toggle="collapse" href="#collapse{{ $key + 1 }}" aria-expanded="false">
                  {{ $item["disease"]->name }} - <b>{{ $item["percentage"] }}%</b>
                </a>
              </h4>
            </div>
            <div id="collapse{{ $key + 1 }}" class="collapse" data-parent="#accordion" style="">
              <div class="card-body">
                @foreach ($item["solutions"] as $key => $solution)
                    <h5><b>Solusi {{ $key + 1 }} :</b></h5>
                    <p class="form-control-static" id="viewSolution">{{ $solution->solution }}</p>
                    <br>
                @endforeach
              </div>
            </div>
          </div>
        </div>
    @endforeach

</form>
