@extends('layouts.user')
@section('title', 'Detail Buku')
@section('content')

{{-- <div class="breadcrumbs">
    <a href="{{ route('index') }}" class="btn btn-danger float-lg-start" style="margin-left: 10px;">Kembali</a>
    <div class="container">
        <h2>Membaca {{ $slug->name }}</h2>
    </div>
</div> --}}
<!-- ======= Cource Details Section ======= -->
<section id="course-details" class="course-details mt-5">
    <div class="container" >
        <div class="row">
            <div class="col-lg-12">
                <a href="{{ asset('storage/buku/'. $slug->buku) }}" target="_blank">
                    <iframe id="frame-buku" src="{{ asset('storage/buku/'. $slug->buku . '#toolbar=0') }}" rel="noopener noreferrer nofollow"  width="100%" height="800">
                    {{-- This browser does not support PDFs. Please download the PDF to view it: <a href="{{ asset('folder/file_name.pdf') }}">Download PDF</a> --}}
                </a>
            </div>
        </div>
    </div>
</section>
@push('js')
    <script>
        let document = document.getElementById('frame-buku');

    </script>
@endpush
@endsection
