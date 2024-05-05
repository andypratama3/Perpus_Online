@extends('layouts.user')
@section('title', 'Home')
@section('content')
<!-- Karya Section -->
<section id="contact" class="contact section" style="margin-top: 150px;">
    <div class="contact">
        <div class="container" data-aos="fade-up" data-aos-delay="100">
            <h2 class="mb-5">KIRIM KARYA ANDA </h2>
            <div class="row gy-4">
                <div class="col-lg-12">
                    <form action="{{ route('karya.store') }}" method="post" class="php-email-form" data-aos="fade-up"
                        data-aos-delay="200" enctype="multipart/form-data">
                        @csrf
                        <div class="row gy-4">

                            <div class="col-md-6">
                                <input type="text" name="name" class="form-control" placeholder="Your Name" required="">
                            </div>

                            <div class="col-md-6 ">
                                <input type="email" class="form-control" name="email" placeholder="Your Email"
                                    required="">
                            </div>

                            <div class="col-md-12">
                                <input type="text" class="form-control" name="subject" placeholder="Subject"
                                    required="">
                            </div>

                            <div class="col-md-12">
                                <textarea class="form-control" name="message" rows="6" placeholder="Message"
                                    required=""></textarea>
                            </div>

                            <div class="col-md-12 text-center">
                                <div class="loading">Loading</div>
                                <div class="error-message"></div>
                                <div class="sent-message">Your message has been sent. Thank you!</div>

                                <button type="submit">Send Message</button>
                            </div>

                        </div>
                    </form>
                </div><!-- End Contact Form -->

            </div>

        </div>
    </div>

</section><!-- Karya Section -->
@endsection
