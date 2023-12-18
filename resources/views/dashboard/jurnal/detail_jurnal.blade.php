@extends('layouts.dashboard_partial.index')
@section('title', 'Baca Jurnal')
@section('content')
<div class="content-wrapper pb-0">
    <div class="page-header flex-wrap">
        <div class="header-left">
            <a href="{{ route('dashboard.jurnal.index') }}" class="btn btn-danger">Kembali</a>
        </div>
    </div>
    <div class="row">
        <div class="col-xl-12 stretch-card grid-margin">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title text-center">Detail Data Jurnal {{ $slug->name }}</h4>
                    <div class="form-group">
                        <a href="{{ asset('storage/jurnal/'. $slug->jurnal) }}" target="_blank">
                            <iframe src="{{ asset('storage/jurnal/'. $slug->jurnal . '#toolbar=0') }}" rel="noopener noreferrer nofollow"  width="100%" height="600">
                        {{-- This browser does not support PDFs. Please download the PDF to view it: <a href="{{ asset('folder/file_name.pdf') }}">Download PDF</a> --}}
                        </a>
                        {{-- <iframe src="{{ asset('storage/buku/'. $jurnal->buku . '#toolbar=0') }}" width="100%" height="600"></iframe> --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
