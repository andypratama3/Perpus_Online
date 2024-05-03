@extends('layouts.dashboard_partial.index')
@section('title', 'Berita')
@push('css')
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.css" />
@endpush
@section('content')
<div class="content-wrapper pb-0">
    <div class="page-header flex-wrap">
        <div class="header-left text-center">
            <h2 class="icon-text">Berita</h2>
        </div>
        <div class="header-right d-flex flex-wrap mt-2 mt-sm-0">
            <a href="{{ route('dashboard.master.berita.create') }}" class="btn btn-primary mt-2 mt-sm-0 btn-icon-text">
                <i class="mdi mdi-plus-circle"></i>Tambah Data</a>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12 grid-margin">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-hover" id="table_buku">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Judul</th>
                                    <th>Deskripsi</th>
                                    <th>Create</th>
                                    <th>Update</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<input type="hidden" id="berita_data" value="{{ route('dashboard.master.berita.getBerita') }}">
@push('js')
<script src="https://code.jquery.com/jquery-3.7.0.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.js"></script>
<script>
    $(document).ready(function () {
        function reloadTable(id){
            var table = $(id).DataTable();
            table.cleanData;
            table.ajax.reload();
        }
        $('#table_buku').DataTable({
            ordering: true,
            pagination: true,
            deferRender: true,
            serverSide: true,
            responsive: true,
            processing: true,
            pageLength: 100,
            ajax: {
                'url': $('#berita_data').val(),
            },
            columns: [{ data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false },
            { data: 'name',name: 'name'},
            {
                data: 'body', name: 'body',
                // render: function (data){
                //     console.log(data);

                // }
            },
            { data: 'created_at', name: 'created_at'},
            { data: 'updated_at', name: 'updated_at'},
            // {
            //     data: 'foto',
            //     render: function (data){
            //         return '<a class="btn btn-primary" href="' . asset("storage/img/berita/{$data}") . '">Lihat Foto</a>'

            //     }
            // },
            { data: 'options', name: 'options',orderable: false, searchable: false } ],
        });
        $('#table_buku').on('click', '#btn-delete', function () {
            var slug = $(this).data('id');
            var url = '{{ route("dashboard.master.berita.destroy", ":slug") }}';
            url = url.replace(':slug', slug);
            swal({
                title: 'Anda yakin?',
                text: 'Data yang sudah dihapus tidak dapat dikembalikan!',
                icon: 'warning',
                buttons: true,
                dangerMode: true,
            }).then((willDelete) => {
                if (willDelete) {
                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });
                    $.ajax({
                        method: 'DELETE',
                        data: { slug: slug },
                        url: url,
                        success: function (data) {
                            if (data.status === 'success') {
                                swal('Berhasil', data.message, 'success').then(() => {
                                reloadTable('#table_buku');
                            });
                            } else {
                                // Reload the page with an error message
                                swal('Error', data.message, 'error');
                                reloadTable('#table_buku');
                            }
                        }
                    });
                } else {
                    // If the user cancels the deletion, do nothing
                }
            });
        });
    });
</script>
@endpush
@endsection
