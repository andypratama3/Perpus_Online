@extends('layouts.dashboard_partial.index')
@section('title', 'Show jurnal')
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
                @if ($errors->any())
                <div class="alert alert-danger alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <h5><i class="icon fas fa-ban"></i> Alert!</h5>
                    <strong>{!! implode('', $errors->all('<div>:message</div>')) !!}</strong>
                </div>
                @endif
                <div class="card-body">
                    <h4 class="card-title text-center">Detail Data Jurnal {{ $jurnal->name }}</h4>
                    <form action="{{ route('dashboard.jurnal.store') }}" method="POST" enctype="multipart/form-data"
                        class="forms-sample">
                        @csrf
                        <div class="form-group">
                            <label for="name">Judul jurnal</label>
                            <input type="text" class="form-control" name="name" id="name" value="{{ $jurnal->name }}" placeholder="Judul jurnal" readonly />
                        </div>
                        <div class="form-group">
                            <label>Kategori</label>
                            <select class="kategori-multiple" disabled multiple="multiple" style="width: 100%;" aria-placeholder="Pilih Kategori" aria-readonly="">
                              @foreach ($jurnal->jurnals_category as $category)
                              <option value="{{ $category->id }}" selected>{{ $category->name }}</option>
                              @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label>File jurnal upload</label>
                            <input type="file" name="jurnal" class="file-upload-default" />
                            <div class="input-group col-xs-12">
                              <input type="text" class="form-control file-upload-info" disabled placeholder="Upload jurnal" value="{{ $jurnal->jurnal }}" readonly />
                              <span class="input-group-append">
                                <a href="{{ route('dashboard.jurnal.detail_jurnal', $jurnal->slug) }}" class="btn btn-primary">Lihat Jurnal</a>
                              </span>
                            </div>
                          </div>
                        {{-- <div class="form-group float-right ">
                            <button type="reset" class="btn btn-secondary">Reset</button>
                            <button type="submit" class="btn btn-primary mr-2"> Submit </button>
                        </div> --}}
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
