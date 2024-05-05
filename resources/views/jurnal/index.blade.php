@extends('layouts.user')
@section('title', 'Jurnal')
@section('content')
<!-- Page Title -->
<div class="page-title mx-5" style="margin-top: 40px; border-radius: 20px;" data-aos="fade">
    <nav class="breadcrumbs">
        <div class="container">
           <h2>Jurnal</h2>
        </div>
    </nav>
</div><!-- End Page Title -->

<!-- Courses Section -->
<section id="courses" class="courses section">

    <div class="container">
        <div class="col-md-12 mb-4">
            <div class="form-group">

                <div class="input-group">
                    <input type="text" class="form-control mt-2">
                    <button type="button" class="btn btn-primary">Search</button>
                </div>
            </div>
        </div>
        <div class="row">
            @foreach ($jurnals as $jurnal)
            <div class="col-lg-4 col-md-6 d-flex align-items-stretch" data-aos="zoom-in" data-aos-delay="100">
                <div class="course-item">
                    {{-- <img src="{{ asset('storage/jurnal/'. $jurnal->jurnal . '#toolbar=0') }}" class="img-fluid" alt="..."> --}}
                    <div class="course-content">
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            @foreach ($jurnal->jurnals_category as $category)
                                <p class="category">{{ $category->name }}</p>
                            @endforeach
                        </div>

                        <h3><a href="{{ route('jurnal.show', $jurnal->slug) }}">{{ $jurnal->name }}</a></h3>
                        <p class="description">Et architecto provident deleniti facere repellat nobis iste. Id facere
                            quia quae dolores dolorem tempore.</p>
                        <div class="trainer d-flex justify-content-between align-items-center">
                            <div class="trainer-profile d-flex align-items-center">
                                <img src="assets/img/trainers/trainer-1-2.jpg" class="img-fluid" alt="">
                                <a href="#" class="trainer-link">{{ $jurnal->user->name }}</a>
                            </div>
                            <div class="trainer-rank d-flex align-items-center">
                                <i class="bi bi-person user-icon"></i>&nbsp;50
                                &nbsp;&nbsp;
                                <i class="bi bi-heart heart-icon"></i>&nbsp;65
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section><!-- /Courses Section -->
@endsection
