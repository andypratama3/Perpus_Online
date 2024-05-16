@extends('layouts.user_partial.user_buku')
@section('title', 'Detail Buku')
@section('content')

<div class="breadcrumbs" data-aos="fade-in" style="margin: 0;">
    <a href="{{ route('buku.index') }}" class="btn btn-danger float-lg-start" style="margin-left: 10px;">Kembali</a>
    <div class="container">
        <h2>Detail Buku {{ $buku->name }}</h2>
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
                    <h5>Penerbit</h5>
                    <p>{{ $buku->penerbit }}</p>
                </div>

                <div class="course-info d-flex justify-content-between align-items-center">
                    <h5>Penulis</h5>
                    <p>{{ $buku->penulis }}</p>
                </div>

                <div class="course-info d-flex justify-content-between align-items-center">
                    <h5>Seri</h5>
                    <p>{{ $buku->seri_buku }}</p>
                </div>

                <div class="course-info d-flex justify-content-between align-items-center">
                    <h5>Tahun Terbit</h5>
                    <p>{{ $buku->tahun_terbit }}</p>
                </div>
                <div class="course-info d-flex justify-content-between align-items-center">
                    <h5>Jumlah Pengunjung</h5>
                    <p>{{ $buku->jumlah_pengunjung }}</p>
                </div>
                <div class="form-group text-center">
                    <a href="{{ route('buku.baca', $buku->slug) }}" class="btn btn-primary">Baca Buku</a>
                    {{-- @auth
                        <a href="{{ route('buku.baca', $buku->slug) }}" class="btn btn-primary">Baca Buku</a>
                        @else
                        <a href="{{ route('login') }}" class="btn btn-primary">Login</a>
                    @endauth --}}
                </span>
                </div>
            </div>
        </div>

    </div>
</section>
<section id="cource-details-tabs" class="cource-details-tabs">
    <div class="container" data-aos="fade-up">
      <div class="row">
        <div class="col-lg-12 mt-2 mt-lg-0">
            {{-- <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Sint animi amet est. Mollitia recusandae necessitatibus sequi iste architecto ad vitae totam sapiente est accusamus ab, qui molestias. Reprehenderit, adipisci eius.</p> --}}
        </div>
      </div>
    </div>
  </section>
@endsection
