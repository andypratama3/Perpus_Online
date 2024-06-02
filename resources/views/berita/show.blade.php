@extends('layouts.user')
@section('title', 'Berita')
@section('content')
<section id="tabs" class="tabs section" style="margin-top: 50px;">

    <div class="container" data-aos="fade-up" data-aos-delay="100">

      <div class="row">
        <div class="col-lg-12 mt-4 mt-lg-0">
          <div class="tab-content">
            <div class="tab-pane active show" id="tab-1">
              <div class="row">
                <div class="col-lg-8 details order-2 order-lg-1">
                  <h3>{{ $berita->name }}</h3>
                  <p class="fst-italic">{!! $berita->body !!}</p>
                </div>
                <div class="col-lg-4 text-center order-1 order-lg-2">
                  <img src="{{ asset('storage/img/berita/'. $berita->foto) }}" alt="" class="img-fluid" style="border-radius: 15px;">
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

    </div>

  </section><!-- /Tabs Section -->
@endsection
