@extends('layouts.user')
@section('title', 'Home')

@section('content')
<!-- karya Section -->
<section id="karya" class="karya section mt-5">

    <!-- Section Title -->
    <div class="container section-title mt-2"  data-aos="fade-up">
        <h2>Karya </h2>
    </div><!-- End Section Title -->

    <div class="container">

        <div class="isotope-layout" data-default-filter="*" data-layout="masonry" data-sort="original-order">

            <ul class="karya-filters isotope-filters" data-aos="fade-up" data-aos-delay="100">
                <li data-filter="*" class="filter-active">All</li>
                @foreach ($roles as $role)
                @if($role->name == 'Siswa' || $role->name == 'Guru' || $role->name == 'Mahasiswa')
                    <li data-filter=".filter-{{ $role->id }}">{{ $role->name }}</li>
                @endif
                @endforeach

            </ul><!-- End karya Filters -->

            <div class="row gy-4 isotope-container" data-aos="fade-up" data-aos-delay="200">
                @foreach ($karyas as $karya)
                    <div class="col-lg-4 col-md-6 karya-item isotope-item filter-{{ $karya->role_id }}">
                        <img src="" class="img-fluid" alt="">
                        <div class="karya-info">
                            <h4>{{ $karya->title }}</h4>
                            <p>{{ $karya->abstrack }}</p>
                            <a href="karya-details.html" title="More Details" class="details-link"><i
                                    class="bi bi-link-45deg"></i></a>
                        </div>
                    </div><!-- End karya Item -->
                @endforeach
                @include('karya.load-karya')
            </div><!-- End karya Container -->

        </div>

    </div>

</section><!-- /karya Section -->
@push('js_user')
<script src="https://unpkg.com/isotope-layout@3/dist/isotope.pkgd.js"></script>
@endpush
@endsection
