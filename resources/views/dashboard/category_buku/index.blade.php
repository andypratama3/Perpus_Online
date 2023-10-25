@extends('layouts.dashboard_partial.index')
@section('title', 'Dashboard')
@section('content')
<div class="content-wrapper pb-0">
    <div class="page-header flex-wrap">
        <div class="header-left">
            <h2>Kategori Buku</h2>
        </div>
        <div class="header-right d-flex flex-wrap mt-2 mt-sm-0">
            <div class="d-flex align-items-center">

            </div>
            <a href="{{ route('dashboard.category.buku.create') }}" class="btn btn-primary mt-2 mt-sm-0 btn-icon-text">
                <i class="mdi mdi-plus-circle"></i>Tambah Data</a>
        </div>
    </div>
    <div class="row">
    <div class="col-lg-12 grid-margin">
        <div class="card">
          <div class="card-body">
            {{-- <h4 class="card-title">Hoverable Table</h4>
            <p class="card-description"> Add class <code>.table-hover</code>
            </p> --}}
            <div class="table-responsive">
              <table class="table table-hover text-center">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Kategori</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($categoryBuku as $category)
                    <tr>
                        <td>{{ ++$no }}</td>
                        <td>{{ $category->name }}</td>
                        <td>
                            <a href="{{ route('dashboard.category.buku.edit', $category->slug) }}" class="btn btn-primary btn-sm"><i class="mdi mdi-pen"></i></a>
                            <a href="{{ route('dashboard.category.buku.destroy', $category->slug) }}" class="btn btn-danger btn-sm"><i class="mdi mdi-delete"></i></a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
</div>
@endsection
