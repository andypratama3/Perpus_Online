@extends('layouts.user')
@section('title', 'Buku')
@push('css_user')
    <link rel="stylesheet" href="{{ asset('assets_user/css/book.css') }}">
    <link rel="stylesheet" href="{{ asset('assets_user/css/mbr.css') }}">
@endpush
@section('content')

<!-- ======= Cource Details Section ======= -->
<section id="course-details" class="course-details" style="margin-top: 50px;">
    <div class="container" data-aos="fade-up">
        <div class="card-title mt-2">
            <h3 class="mbr-section-subtitle mbr-semibold align-center mbr-light mbr-fonts-style display-5">
                BUKU
            </h3>
            <div class="container">
                <ul>
                    <li>a</li>
                    <li>A</li>
                </ul>
            </div>
        </div>

        <div class="row">
            @foreach ($bukus as $buku)
            @php
            $coverArray = explode(',', rtrim($buku->cover, ','));
            $firstCover = reset($coverArray);
            @endphp
            <div class="card col-md-6 col-lg-4">
                <div class="card-img">
                    <img src="{{ asset('storage/buku/cover/'. $firstCover) }}" alt="Mobirise" style="width: 100%;">
                </div>
                <div class="card-box pt-4">
                    <h5 class="card-subtitle align-center pb-4 mbr-fonts-style display-7">Terbit :
                        {{ $buku->tahun_terbit }}
                    </h5>
                    <h4 class="card-title align-center pb-1 mbr-bold mbr-fonts-style display-5">{{ $buku->name }}</h4>
                    <p class="mbr-text align-center pb-3 mbr-fonts-style display-7">
                        {!! Str::limit($buku->description, 100) !!}</p>
                    <h5 class="link align-center mbr-fonts-style display-7">
                        <a href="{{ route('buku.show', $buku->slug) }}" class="text-black btn btn-success btn-sm">
                            READ MORE
                        </a>
                    </h5>
                </div>
            </div>
            @endforeach

        </div>
    </div>
</section>

@endsection
