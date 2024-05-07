@extends('layouts.user')
@section('title', 'Kontak')
@section('content')

<!-- Contact Section -->
<section id="contact" class="contact section">
    <div class="container">
        <div class="row">
            <div class="col-md-12" style="margin-top: 100px;">
                <div class="form-group">
                    <h1 class="text-center">Kontak</h1>
                    <hr>
                </div>
            </div>
            <div class="col-md-6">
                <div class="info-item d-flex" data-aos="fade-up" data-aos-delay="300">
                    <i class="bi bi-geo-alt flex-shrink-0"></i>
                    <div class="ml-2">
                        <h3>Alamat</h3>
                        <p>Jl. Cipto Mangun Kusumo No.Km 2, Sungai Keledang, Kec. Samarinda Seberang, Kota Samarinda, Kalimantan Timur 75132</p>
                    </div>
                </div><!-- End Info Item -->

                <div class="info-item d-flex" data-aos="fade-up" data-aos-delay="400">
                    <i class="bi bi-telephone flex-shrink-0"></i>
                    <div class="ml-2 mb-2">
                        <h3>Whats App</h3>
                        <p>+1 5589 55488 55</p>
                        <a href="" class="btn btn-success"><i class="bi bi-whatsapp"></i> WhatsApp</a>
                    </div>
                </div><!-- End Info Item -->

                <div class="info-item d-flex" data-aos="fade-up" data-aos-delay="500">
                    <i class="bi bi-envelope flex-shrink-0"></i>
                    <div>
                        <h3>Email Us</h3>
                        <p>A@gmail.com</p>
                    </div>
                </div><!-- End Info Item -->

            </div>
            <div class="col-md-6">
                <div class="mb-5" data-aos="fade-up" data-aos-delay="200">
                    <h2 class="text-center">Maps</h2>
                    <iframe style="border:0; width: 100%; height: 300px;"
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3989.6452770114997!2d117.118936974083!3d-0.5336297994611369!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2df67e2a485a4549%3A0xa41c6c068b0870c6!2sBPMP%20Provinsi%20Kalimantan%20Timur!5e0!3m2!1sid!2sid!4v1714914112317!5m2!1sid!2sid"
                        frameborder="0" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>

                </div><!-- End Google Maps -->
            </div>
        </div>

    </div>
</section><!-- /Contact Section -->

@endsection
