@forelse ($Data as $JobCat)
    <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.1s">
        <a href="/jobs/{{ $JobCat->name }}" class="cat-item rounded p-4" href="">
            {!! $JobCat->SvgIcon !!}
            <h6 class="mb-3">{{ $JobCat->name }}</h6>
            <p class="mb-0">{{ $JobCat->job_count }} Vacancy</p>
        </a>
    </div>
@empty
    <h1>No categories Available !</h1>
@endforelse
