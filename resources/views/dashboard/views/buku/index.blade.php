@extends('layouts.dashboard_partial.index')
@section('title', 'View Buku')
@section('content')
<div class="content-wrapper pb-0">
    <div class="page-header flex-wrap">
        <div class="header-left">
            <h2>View Buku</h2>
        </div>
        <div class="header-right d-flex flex-wrap mt-2 mt-sm-0">
            <div class="d-flex align-items-center">
            </div>
        </div>
    </div>
    <div class="row">
    <div class="col-lg-12 grid-margin">
        <div class="card">
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-hover text-center">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Nama Buku</th>
                        <th>Jumlah Pengunjung</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($bukus as $buku)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $buku->name }}</td>
                        <td>{{ $groupedViews[$buku->id]->total_views }}</td>
                        <td>
                            <a href="{{ route('dashboard.views.show', $buku->id) }}" class="btn btn-primary btn-sm"><i class="fa fa-eye"></i></a>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td class="text-center" colspan="4">
                            <strong>0 Data Found</strong>
                        </td>
                    </tr>
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
@endpush
@endsection
