<form>
    @foreach ($results as $item)
    <div class="row">
        <div class="col-md-12">
            <div class="form-group">
                <label class="control-label"><h2>{{ $item["disease"]->name }} - Keakuratan: <b>{{ $item["percentage"] }}%</b></h2></label>

                @foreach ($item["solutions"] as $key => $solution)
                    <h5><b>Solusi {{ $key + 1 }} :</b></h5>
                    <p class="form-control-static" id="viewTitle">{{ $solution->solution }}</p>
                    <br>
                @endforeach
            </div>
        </div>
    </div>
    @endforeach
</form>
