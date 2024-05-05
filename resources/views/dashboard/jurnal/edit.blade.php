@extends('layouts.dashboard_partial.index')
@section('title', 'Edit Jurnal')
@push('css')
<link rel="stylesheet" href="{{ asset('assets/vendors/select2/select2.min.css') }}" />
<link rel="stylesheet" href="{{ asset('assets/vendors/select2-bootstrap-theme/select2-bootstrap.min.css') }}" />
@endpush
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
               @include('layouts.flashmessage')
                <div class="card-body">
                    <h4 class="card-title text-center">Detail Data Jurnal {{ $jurnal->name }}</h4>
                    <form action="{{ route('dashboard.jurnal.update', $jurnal->slug) }}" method="POST" enctype="multipart/form-data"
                        class="forms-sample">
                        @csrf
                        @method('PUT')
                        <input type="hidden" value="{{ $jurnal->slug }}" name="slug">
                        <div class="form-group">
                            <label for="name">Judul</label>
                            <input type="text" class="form-control" name="name" id="name" value="{{ $jurnal->name }}" placeholder="Judul Buku" />
                        </div>
                        <div class="form-group">
                            <label>Pilih Kategori</label>
                            <select class="kategori-multiple" name="jurnals_category[]" multiple="multiple" style="width: 100%;" aria-placeholder="Pilih Kategori">
                                @foreach ($jurnal->jurnals_category as $category)
                                    <option value="{{ $category->id }}" selected>{{ $category->name }}</option>
                                @endforeach
                                @foreach ($categorys as $category)
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach
                            </select>
                        </div>


                        <div class="form-group">
                            <label>File Jurnal upload</label>
                            <input type="file" name="jurnal" value="{{ $jurnal->jurnal }}"  class="file-upload-default" />
                            <div class="input-group col-xs-12">
                              <input type="text" class="form-control file-upload-info" name="jurnal" disabled placeholder="Upload Image" value="{{ $jurnal->jurnal }}" />
                              <span class="input-group-append">
                                <button class="file-upload-browse btn btn-success" type="button"> Upload </button>
                              </span>
                            </div>
                        </div>
                        <div class="form-group">
                        <iframe src="{{ asset('storage/jurnal/'. $jurnal->jurnal) }}" frameborder="0" style="width: 100%; height: 1000px;"></iframe>
                        </div>
                        <div class="form-group float-right ">
                            <button type="reset" class="btn btn-secondary">Reset</button>
                            <button type="submit" class="btn btn-primary mr-2"> Submit </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@push('js')
<script src="https://code.jquery.com/jquery-3.7.1.slim.js" integrity="sha256-UgvvN8vBkgO0luPSUl2s8TIlOSYRoGFAX4jlCIm9Adc=" crossorigin="anonymous"></script>
<script src="{{ asset('assets/vendors/select2/select2.min.js') }}"></script>
<script>
    $(document).ready(function () {
        $(".kategori-multiple").select2();

    });
</script>
<script src="{{ asset('assets/js/file-upload.js') }}"></script>
@endpush
@endsection
