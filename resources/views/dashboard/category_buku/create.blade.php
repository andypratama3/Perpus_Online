@extends('layouts.dashboard_partial.index')
@section('title', 'Kategori Buku')
@section('content')
<div class="content-wrapper pb-0">
    <div class="page-header flex-wrap">
        <div class="header-left">
            <a href="{{ route('dashboard.category.buku.index') }}" class="btn btn-danger">Kembali</a>
        </div>
    </div>
    <div class="row">
        <div class="col-xl-12 stretch-card grid-margin">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title text-center">Tambah Data Kategori Buku</h4>
                    <form action="{{ route('dashboard.category.buku.store') }}" method="POST" enctype="multipart/form-data"
                        class="forms-sample">
                        @csrf
                        <div class="form-group">
                            <label for="name">Nama Kategori</label>
                            <input type="text" class="form-control" name="name" id="name" placeholder="Nama Kategori" />
                        </div>
                        {{-- <div class="col-md-6">
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Last Name</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" />
                                </div>
                            </div>
                        </div> --}}
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
@endsection
