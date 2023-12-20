@extends('layouts.user')
@section('title', 'Detail Buku')
@section('content')

<div class="breadcrumbs" data-aos="fade-in">
    <div class="container">
        <h2>Details</h2>
    </div>
</div>
<!-- ======= Cource Details Section ======= -->
<section id="course-details" class="course-details">
    <div class="container" data-aos="fade-up">

        <div class="row">
            <div class="col-lg-8">
                @php
                // Assuming $buku->cover contains a comma-separated string of cover image filenames
                $coverArray = explode(',', $buku->cover);
                $firstCover = reset($coverArray);
                @endphp
                 <div id="carousel" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-indicators">
                        @foreach ($coverArray as $index => $cov)
                            <button type="button" data-bs-target="#carousel" data-bs-slide-to="{{ $index }}"
                                @if($index === 0) class="active" @endif aria-label="Slide {{ $index + 1 }}"></button>
                        @endforeach
                    </div>
                    <div class="carousel-inner">
                        @foreach ($coverArray as $index => $cov)
                            <div class="carousel-item @if($index === 0) active @endif">
                                <img src="{{ asset('storage/buku/cover/'. trim($cov)) }}" class="img-fluid" alt="Cover Image">
                            </div>
                        @endforeach
                    </div>

                    <button class="carousel-control-prev" type="button" data-bs-target="#carousel" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carousel" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>

                <h3>{{ $buku->name }}</h3>
                <p>
                    {{ $buku->description }}
                </p>
            </div>

            <div class="col-lg-4">

                <div class="course-info d-flex justify-content-between align-items-center">
                    <h5>Trainer</h5>
                    <p><a href="#">Walter White</a></p>
                </div>

                <div class="course-info d-flex justify-content-between align-items-center">
                    <h5>Course Fee</h5>
                    <p>$165</p>
                </div>

                <div class="course-info d-flex justify-content-between align-items-center">
                    <h5>Available Seats</h5>
                    <p>30</p>
                </div>

                <div class="course-info d-flex justify-content-between align-items-center">
                    <h5>Schedule</h5>
                    <p>5.00 pm - 7.00 pm</p>
                </div>

            </div>
        </div>

    </div>
</section><!-- End Cource Details Section -->
@endsection
