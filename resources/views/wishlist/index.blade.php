@extends('layouts.user')
@section('title', 'Detail Buku')
@section('content')
<section id="popular-courses" class="courses text-center">
    <div class="container" data-aos="fade-up">

        <div class="section-title">
            <h2>Wishlist</h2>
            <p>Buku Yang Di Sukai</p>

        </div>
        <div class="row" data-aos="zoom-in" data-aos-delay="100">
            <div class="col-lg-4 col-md-6 d-flex text-center mt-4 ">
                @if ($wishlists > 0)
                @foreach ($wishlists as $wish)
                <div class="course-item">
                    <img src="assets/img/course-1.jpg" class="img-fluid" alt="...">
                    <div class="course-content">
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <h4>Web Development</h4>
                            <p class="price">$169</p>
                        </div>
                        <h3><a href="course-details.html">Website Design</a></h3>
                        <p>Et architecto provident deleniti facere repellat nobis iste. Id facere quia quae dolores
                            dolorem tempore.</p>
                        <div class="trainer d-flex justify-content-between align-items-center">
                            <div class="trainer-profile d-flex align-items-center">
                                <img src="assets/img/trainers/trainer-1.jpg" class="img-fluid" alt="">
                                <span>Antonio</span>
                            </div>
                            <div class="trainer-rank d-flex align-items-center">
                                <i class="bx bx-user"></i>&nbsp;50
                                &nbsp;&nbsp;
                                <i class="bx bx-heart"></i>&nbsp;65
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
                @else
                <div class="course-content text-center d-flex">
                    <h2>Tidak Ada Buku</h2>
                </div>
                @endif

            </div>
        </div>
</section><!-- End Book Section -->
@endsection
