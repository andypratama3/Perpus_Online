@extends('layouts.dashboard_partial.index')
@section('title', 'Task')
@section('content')
<div class="content-wrapper pb-0">
    <div class="page-header flex-wrap">
        <div class="header-left">
            <h2>Task</h2>
        </div>
        <div class="header-right d-flex flex-wrap mt-2 mt-sm-0">
            <div class="d-flex align-items-center">
            </div>
            @can('create-task')
            <a href="{{ route('dashboard.pengaturan.task.create') }}" class="btn btn-primary mt-2 mt-sm-0 btn-icon-text">
                <i class="mdi mdi-plus-circle"></i>Tambah Data</a>
            @endcan
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
                        <th>#</th>
                        <th>Nama</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($tasks as $task)
                    <tr>
                        <td>{{ ++$no }}</td>
                        <td>{{ $task->name }}</td>
                        <td>
                            <a href="{{ route('dashboard.pengaturan.task.show', $task->slug) }}" class="btn btn-primary btn-sm" title="Ubah"><i class="fa fa-eye"></i></a>
                            @can('edit-task')
                            <a href="{{ route('dashboard.pengaturan.task.edit', $task->slug) }}" class="btn btn-primary btn-sm" title="Ubah"><i class="fa fa-edit"></i></a>
                            @endcan
                            @can('delete-task')
                            <a href="#" data-id="{{ $task->slug }}" class="btn btn-danger btn-sm swal-delete" title="Hapus">
                                <form action="{{ route('dashboard.pengaturan.task.destroy', $task->slug) }}" id="delete-{{ $task->slug }}" method="POST" enctype="multipart/form-data">
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
@push('js')
@can('delete-task')
    <script>
        $(".swal-delete").click(function (e) {
            slug = e.target.dataset.id;
            swal({
                    title: 'Anda yakin?',
                    text: 'Data yang sudah dihapus tidak dapat dikembalikan!',
                    icon: 'warning',
                    buttons: true,
                    dangerMode: true,
                })
                .then((willDelete) => {
                    if (willDelete) {
                        $(`#delete-${slug}`).submit();
                    } else {
                        // Do Nothing
                    }
                });
        });
    </script>
@endcan
@endpush
@endsection
