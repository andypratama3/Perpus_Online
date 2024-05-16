@extends('layouts.user')
@section('title', 'Home')

@section('content')
<!-- karya Section -->
<section id="karya" class="karya section mt-5">
    <!-- Section Title -->
    <div class="container section-title mt-2">
        <h2>Karya </h2>
    </div><!-- End Section Title -->

    <div class="container" data-aos="fade-up">

        <div class="isotope-layout" data-default-filter="*" data-layout="masonry" data-sort="original-order">

            <ul class="karya-filters isotope-filters" data-aos="fade-up" data-aos-delay="100">
                <li data-filter="*" class="filter-active">All</li>
                @foreach ($roles as $role)
                @if($role->name == 'Siswa' || $role->name == 'Guru' || $role->name == 'Mahasiswa')
                <li data-filter=".filter-{{ $role->id }}">{{ $role->name }}</li>
                @endif
                @endforeach

            </ul><!-- End karya Filters -->

            <div class="row gy-4 isotope-container text-center" data-aos="fade-up" data-aos-delay="200">
                @foreach ($karyas as $karya)
                <div class="col-lg-4 col-md-6 karya-item isotope-item filter-{{ $karya->role_id }}">
                    <div class="karya-info">
                        <h4>{{ $karya->title }}</h4>
                        <p>{{ $karya->abstrack }}</p>
                        <a href="{{ route('karya.show', $karya->slug) }}" title="More Details"
                            class="btn btn-primary">Read More</a>
                    </div>
                </div><!-- End karya Item -->
                @endforeach
            </div><!-- End karya Container -->

            <div class="karya-pagination text-center d-flex justify-content-center mt-5">
                {{ $karyas->links() }}
            </div>
        </div>
    </div>

</section><!-- /karya Section -->
@push('js_user')
<script src="https://unpkg.com/isotope-layout@3/dist/isotope.pkgd.js"></script>
<script>
   document.querySelectorAll('.isotope-layout').forEach(function (isotopeItem) {
    let layout = isotopeItem.getAttribute('data-layout') || 'masonry';
    let filter = isotopeItem.getAttribute('data-default-filter') || '*';
    let sort = isotopeItem.getAttribute('data-sort') || 'original-order';

    let initIsotope = new Isotope(isotopeItem.querySelector('.isotope-container'), {
        itemSelector: '.isotope-item',
        layoutMode: layout,
        filter: filter,
        sortBy: sort
    });

    // Event listener for filter items
    document.querySelectorAll('.karya-filters li').forEach(function (filterItem) {
        filterItem.addEventListener('click', function () {
            // Get the filter value from the data-filter attribute
            let filterValue = this.getAttribute('data-filter');

            // Update the active class
            document.querySelectorAll('.karya-filters li').forEach(function (item) {
                item.classList.remove('filter-active');
            });
            this.classList.add('filter-active');

            // Filter the items using Isotope
            initIsotope.arrange({
                filter: filterValue
            });
        });
    });
});

</script>
@endpush
@endsection
