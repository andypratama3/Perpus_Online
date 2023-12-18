@extends('layouts.dashboard_partial.index')
@section('title', 'Jurnal')
@push('css')
<link rel="stylesheet" href="{{ asset('assets/vendors/select2/select2.min.css') }}" />
<link rel="stylesheet" href="{{ asset('assets/vendors/select2-bootstrap-theme/select2-bootstrap.min.css') }}" />
@endpush
@section('content')
<div class="content-wrapper pb-0">
    <div class="page-header flex-wrap">
        <div class="header-left">
            <a href="{{ route('dashboard.buku.index') }}" class="btn btn-danger">Kembali</a>
        </div>
    </div>
    <div class="row">
        <div class="col-xl-12 stretch-card grid-margin">
            <div class="card">
               @include('layouts.flashmessage')
                <div class="card-body">
                    <h4 class="card-title text-center">Tambah Data Jurnal</h4>
                    <form action="{{ route('dashboard.jurnal.store') }}" method="POST" enctype="multipart/form-data"
                        class="forms-sample">
                        @csrf
                        <div class="form-group">
                            <label for="name">Judul</label>
                            <input type="text" class="form-control" name="name" id="name" value="{{ old('name') }}" placeholder="Judul Buku" />
                        </div>
                        <div class="form-group">
                            <label>Pilih Kategori</label>
                            <select class="kategori-multiple" name="jurnals_category[]" multiple="multiple" style="width: 100%;" aria-placeholder="Pilih Kategori">
                              <option disabled>Pilih Kategori</option>
                                @foreach ($categorys as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label>File Jurnal upload</label>
                            <input type="file" name="jurnal" class="file-upload-default" />
                            <div class="input-group col-xs-12">
                              <input type="text" class="form-control file-upload-info" disabled placeholder="Upload jurnal" value="{{ old('jurnal') }}" />
                              <span class="input-group-append">
                                <button class="file-upload-browse btn btn-success" type="button"> Upload </button>
                              </span>
                            </div>
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
