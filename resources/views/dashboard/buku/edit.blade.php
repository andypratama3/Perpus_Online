@extends('layouts.dashboard_partial.index')
@section('title', 'Edit Buku')
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
                @if ($errors->any())
                <div class="alert alert-danger alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <h5><i class="icon fas fa-ban"></i> Alert!</h5>
                    <strong>{!! implode('', $errors->all('<div>:message</div>')) !!}</strong>
                </div>
                @endif
                <div class="card-body">
                    <h4 class="card-title text-center">Detail Data Buku {{ $buku->name }}</h4>
                    <form action="{{ route('dashboard.buku.update', $buku->slug) }}" method="POST" enctype="multipart/form-data"
                        class="forms-sample">
                        @csrf
                        @method('PUT')
                        <input type="hidden" value="{{ $buku->slug }}" name="slug">
                        <div class="form-group">
                            <label for="name">Judul Buku</label>
                            <input type="text" class="form-control" name="name" id="name" value="{{ $buku->name }}" placeholder="Judul Buku" />
                        </div>
                        <div class="form-group">
                            <label for="description">Deskripsi</label>
                            <textarea name="description" id="description" cols="10" class="form-control" rows="10" readonly>{{ $buku->description }}</textarea>
                        </div>
                        <div class="form-group">
                            <label>Pilih Kategori</label>
                            <select class="kategori-multiple" name="categoryBukus[]" multiple="multiple" style="width: 100%;" aria-placeholder="Pilih Kategori">
                              @foreach ($buku->categoryBukus as $category)
                              <option value="{{ $category->id }}" selected>{{ $category->name }}</option>
                              @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Pilih Kategori Buku</label>
                            <select class="kategori-multiple" name="role_id[]" multiple="multiple" style="width: 100%;" aria-placeholder="Pilih Kategori">
                              <option disabled>Pilih Role Buku</option>
                              <option value="{{ $buku->roles->id }}" selected>{{ $buku->roles->name }}</option>
                              @foreach ($roles as $role)
                                    @if($role->name == 'Siswa' || $role->name == 'Guru' || $role->name == 'Mahasiswa')
                                    <option value="{{ $role->id }}">{{ $role->name }}</option>
                                    @else
                                    @endif
                                @endforeach

                            </select>
                        </div>
                        <div class="form-group">
                            <label for="name">Penerbit</label>
                            <input type="text" class="form-control" name="penerbit" value="{{ $buku->penerbit }}" id="penerbit" placeholder="Penerbit" />
                        </div>
                        <div class="form-group">
                            <label for="name">Tahun Terbit</label>
                            <input type="date" class="form-control" name="tahun_terbit" id="tahun_terbit" value="{{ $buku->tahun_terbit }}" placeholder="Tahun Terbit" />
                        </div>
                        <div class="form-group">
                            <label for="name">Penulis</label>
                            <input type="text" class="form-control" name="penulis" id="penulis" value="{{ $buku->penulis }}" placeholder="Penulis" />
                        </div>
                        <div class="form-group">
                            <label for="name">Seri Buku</label>
                            <input type="text" class="form-control" name="seri_buku" id="seri_buku" value="{{ $buku->seri_buku }}" placeholder="Seri Buku" />
                        </div>
                        <div class="form-group">
                            <label>File Buku upload</label>
                            <input type="file" name="buku" value="{{ $buku->buku }}"  class="file-upload-default" />
                            <div class="input-group col-xs-12">
                              <input type="text" class="form-control file-upload-info" name="buku" disabled placeholder="Upload Image" value="{{ $buku->buku }}" />
                              <span class="input-group-append">
                                <button class="file-upload-browse btn btn-success" type="button"> Upload </button>
                              </span>
                            </div>
                          </div>
                          <div class="form-group">
                            <iframe src="{{ asset('storage/buku/'. $buku->buku) }}" frameborder="0" style="width: 100%; height: 1000px;"></iframe>
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
