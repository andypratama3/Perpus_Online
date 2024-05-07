@extends('layouts.user')
@section('title', 'Berita')
@section('content')

<section id="events" class="events section" style="margin-top: 50px;">
    <div class="container section-title " data-aos="fade-up">
        <h2>Berita</h2>
        <p class="text-center">Berita</p>

    </div><!-- End Section Title -->
    <div class="container" data-aos="fade-up">
        <div class="row">
            @foreach ($beritas as $berita)
                <div class="col-md-3 d-flex align-items-stretch">
                    <div class="card">
                        <div class="card-img">
                            <a href="{{ asset('storage/img/berita/'. $berita->foto)  }}" target="__blank"><img src="{{ asset('storage/img/berita/'. $berita->foto)  }}" alt="..."></a>
                        </div>
                        <div class="card-body">
                            <h5 class="card-title"><a href="">{{ $berita->name }}</a></h5>
                            <p class="fst-italic text-center">{{ $berita->created_at->diffForHumans() }}</p>
                            <p class="card-text"> {!! Str::limit($berita->body, 100) !!}</p>
                            <div class="read-more"><a href="{{ route('berita.show', $berita->slug) }}" class="btn btn-primary text-white">Read More</a></div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

    </div>

</section><!-- /Events Section -->

@endsection
