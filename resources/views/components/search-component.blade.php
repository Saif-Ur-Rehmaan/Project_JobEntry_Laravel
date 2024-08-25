<form method="GET" action="/SearchJobs" class="row g-2">
    <div class="col-md-10">
        <div class="row g-2">
            <div class="col-md-4">
                <input type="text" name="JobName" value="" class="form-control border-0" placeholder="Keyword" />
            </div>
            <div class="col-md-4">
                <select name="JobCategory" class="form-select border-0">
                    <option selected value=" ">All Categories</option>
                    @forelse ($Categories as $cat)
                        <option value="{{ $cat->id }}">{{ $cat->name }}</option>
                    @empty
                        <option value="">No Categories Available</option>
                    @endforelse
                </select>
            </div>
            <div class="col-md-4">
                <select name="JobLocation" class="form-select border-0">
                    <option selected value=" ">All Locations</option>
                    @forelse ($Locations as $loc)
                    {{-- job location= $loc->JobLocation ,job id=$loc->id --}}
                        <option value="{{$loc->JobLocation }}">{{ $loc->JobLocation }}</option>
                    @empty
                        <option value="">No Locations Available</option>
                    @endforelse
                </select>
            </div>
        </div>
    </div>
    <div class="col-md-2">
        <button class="btn btn-dark border-0 w-100">Search</button>
    </div>
</form>
