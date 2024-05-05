@extends('layouts.user')
@section('title', 'Kontak')
@section('content')

<!-- Contact Section -->
<section id="contact" class="contact section">
    <div class="container">
        <div class="row">
            <div class="col-md-12" style="margin-top: 100px;">
                <div class="form-group">
                    <h1 class="text-center">Contact</h1>
                </div>
            </div>
            <div class="col-md-6">
                <div class="info-item d-flex" data-aos="fade-up" data-aos-delay="300">
                    <i class="bi bi-geo-alt flex-shrink-0"></i>
                    <div>
                        <h3>Address</h3>
                        <p>A108 Adam Street, New York, NY 535022</p>
                    </div>
                </div><!-- End Info Item -->

                <div class="info-item d-flex" data-aos="fade-up" data-aos-delay="400">
                    <i class="bi bi-telephone flex-shrink-0"></i>
                    <div>
                        <h3>Call Us</h3>
                        <p>+1 5589 55488 55</p>
                    </div>
                </div><!-- End Info Item -->

                <div class="info-item d-flex" data-aos="fade-up" data-aos-delay="500">
                    <i class="bi bi-envelope flex-shrink-0"></i>
                    <div>
                        <h3>Email Us</h3>
                        <p><a href="/cdn-cgi/l/email-protection" class="__cf_email__"
                                data-cfemail="f59c9b939ab5908d9498859990db969a98">[email&#160;protected]</a></p>
                    </div>
                </div><!-- End Info Item -->

            </div>
            <div class="col-md-6">
                <div class="mb-5" data-aos="fade-up" data-aos-delay="200">
                    <iframe style="border:0; width: 100%; height: 300px;"
                        src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d48389.78314118045!2d-74.006138!3d40.710059!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89c25a22a3bda30d%3A0xb89d1fe6bc499443!2sDowntown%20Conference%20Center!5e0!3m2!1sen!2sus!4v1676961268712!5m2!1sen!2sus"
                        frameborder="0" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div><!-- End Google Maps -->
            </div>
        </div>

    </div>
</section><!-- /Contact Section -->

@endsection
