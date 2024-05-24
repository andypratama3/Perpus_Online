@extends('layouts.user')
@section('title', 'Detail Buku')
@push('css_uer')
    <style>
        .fullScreen {
            width: 100%;
            height: 100%;
            position: absolute;
            top: 0;
            left: 0;
        }
    </style>
@endpush
@section('content')

{{-- <div class="breadcrumbs">
    <a href="{{ route('index') }}" class="btn btn-danger float-lg-start" style="margin-left: 10px;">Kembali</a>
    <div class="container">
        <h2>Membaca {{ $buku->name }}</h2>
    </div>
</div> --}}
<!-- ======= Cource Details Section ======= -->
<section id="course-details" class="course-details mt-5">
    <div class="container" >
        <div class="row">
            <div class="col-lg-12">
                <a href="{{ asset('storage/buku/'. $buku->buku) }}" target="_blank">
                    <iframe id="frame-buku" src="{{ asset('storage/buku/'. $buku->buku . '#toolbar=0') }}" rel="noopener noreferrer nofollow"  allowfullscreen width="100%" height="800">
                    {{-- This browser does not support PDFs. Please download the PDF to view it: <a href="{{ asset('folder/file_name.pdf') }}">Download PDF</a> --}}
                </a>
            </div>
        </div>
    </div>
</section>
@push('js')
    <script>
        document.getElementsByTagName("iframe")[0].className = "fullScreen";

    </script>
@endpush
@endsection
