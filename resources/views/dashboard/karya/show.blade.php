@extends('layouts.dashboard_partial.index')
@section('title', 'Berita')
@push('css')
<link href="https://cdn.jsdelivr.net/npm/quill@2.0.1/dist/quill.snow.css" rel="stylesheet">
@endpush
@section('content')
<div class="content-wrapper pb-0">
    <div class="row">
        <div class="col-xl-12 stretch-card grid-margin">
            <div class="card">
                @include('layouts.flashmessage')
                <div class="card-body">
                    <h4 class="card-title text-center">Detail Berita</h4>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="form-label">Judul</label>
                                <input type="text" class="form-control" name="name" id="name"
                                    value="{{ $berita->name }}">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Foto</label>
                                <div class="input-group">
                                    <input type="text" value="{{ $berita->foto }}" class="form-control" name="foto"
                                        id="foto">
                                    <a href="{{ asset('storage/img/berita/'. $berita->foto) }}" target="__blank"
                                        class="btn btn-success">Lihat Foto</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group text-center">
                                <label for="">Description</label>
                                <div id="content-editor">{!! $berita->body !!}</div>
                                <textarea class="d-none" name="body" id="body-content"></textarea>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <a href="{{ route('dashboard.master.berita.index') }}" class="btn btn-danger">Kembali
                                </a>
                                <button class="btn btn-primary float-right">Submit</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @push('js')
    <script src="https://cdn.jsdelivr.net/npm/quill@2.0.1/dist/quill.js"></script>
    <script>
        $(document).ready(function () {
            var quil = new Quill('#content-editor', {
                theme: 'snow'
            });

        });
    </script>
    <script src="{{ asset('assets/js/file-upload.js') }}"></script>
    @endpush
    @endsection
