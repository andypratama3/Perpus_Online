@extends('layouts.dashboard_partial.index')
@section('title', 'Task')
@section('content')
<div class="content-wrapper pb-0">
    <div class="page-header flex-wrap">
        <div class="header-left">
            <h2>User</h2>
        </div>
        <div class="header-right d-flex flex-wrap mt-2 mt-sm-0">
            <div class="d-flex align-items-center">

            </div>
            <a href="{{ route('dashboard.pengaturan.role.create') }}" class="btn btn-primary mt-2 mt-sm-0 btn-icon-text">
                <i class="mdi mdi-plus-circle"></i>Tambah Data</a>
        </div>
    </div>
    <div class="row">
    <div class="col-lg-12 grid-margin">
        <div class="card">
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-hover text-center" id="dataTable">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Nama</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($roles as $role)
                    <tr>
                        <td>{{ ++$no }}</td>
                        <td>{{ $role->name }}</td>
                        <td>
                            @can('edit-role')
                            <a href="{{ route('dashboard.pengaturan.role.edit', $role->slug) }}" class="btn btn-primary btn-sm" title="Ubah"><i class="fa fa-edit"></i></a>
                            @endcan
                            @can('delete-role')
                            <a href="#" data-id="{{ $role->slug }}" class="btn btn-danger btn-sm swal-delete" title="Hapus">
                                <form action="{{ route('dashboard.pengaturan.role.destroy', $role->slug) }}" id="delete-{{ $role->slug }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    @method('delete')
                                </form>
                                <i class="fa fa-trash"></i>
                            </a>
                            @endcan
                        </td>
                    </tr>
                    @empty
                    <td class="text-center" colspan="3">
                        <strong>0 Data Found</strong>
                    </td>
                    @endforelse
                </tbody>
            </table>
            </div>
          </div>
        </div>
      </div>
    </div>
</div>
@endsection
