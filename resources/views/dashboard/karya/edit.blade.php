@extends('layouts.dashboard_partial.index')
@section('title', 'Karya')
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
                    <h4 class="card-title text-center">Detail Karya</h4>
                    <form action="{{ route('dashboard.master.karya.update', $karya->slug) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="form-label">Title</label>
                                    <input type="text" class="form-control" name="title" id="title"
                                        value="{{ $karya->title }}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Foto</label>
                                    <div class="input-group">
                                        <input type="file" value="{{ $karya->file_karya }}" class="form-control" name="file_karya"
                                            id="file_karya">
                                        <a href="{{ asset('storage/file/karya/'. $karya->file_karya) }}" target="__blank"
                                            class="btn btn-success">Lihat File</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group text-center">
                                    <label for="">Abstract</label>
                                    <input type="text" class="form-control" name="abstrack" id="abstrack"
                                    value="{{ $karya->abstrack }}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                @if(Auth::user() && Auth::user()->hasRole('superadmin'))
                                <div class="form-group">
                                    <label for="">Status Karya</label>
                                    <select name="status" id="status" class="form-control">
                                        <option disabled="disabled">Pilih Status</option>
                                        <option value="{{ $karya->status }}" selected>{{ $karya->status == 1 ? 'Terima' : 'Tolak' }}</option>
                                        <option value="1">Terima</option>
                                        <option value="2">Tolak</option>
                                    </select>
                                </div>
                                @else
                                @endif
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <a href="{{ route('dashboard.master.karya.index') }}" class="btn btn-danger">Kembali
                                    </a>
                                    <button class="btn btn-primary float-right">Submit</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @push('js')
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
