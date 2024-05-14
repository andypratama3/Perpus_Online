@extends('layouts.dashboard_partial.index')
@section('title', 'Karya')
@push('css')
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.css" />
@endpush
@section('content')
<div class="content-wrapper pb-0">
    <div class="page-header flex-wrap">
        <div class="header-left text-center">
            <h2 class="icon-text">Karya</h2>
        </div>
        <div class="header-right d-flex flex-wrap mt-2 mt-sm-0">
            <a href="{{ route('dashboard.master.karya.create') }}" class="btn btn-primary mt-2 mt-sm-0 btn-icon-text">
                <i class="mdi mdi-plus-circle"></i>Tambah Data</a>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12 grid-margin">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-hover" id="table_karya">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Judul</th>
                                    <th>Nama Pengirim</th>
                                    <th>Role</th>
                                    <th>Abstract</th>
                                    <th>Status</th>
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
<input type="hidden" id="karya_data" value="{{ route('dashboard.master.karya.getKarya') }}">
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
        $('#table_karya').DataTable({
            ordering: true,
            pagination: true,
            deferRender: true,
            serverSide: true,
            responsive: true,
            processing: true,
            pageLength: 100,
            ajax: {
                'url': $('#karya_data').val(),
            },
            columns: [{ data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false },
            { data: 'title',name: 'title'},
            { data: 'user_name', name: 'user_name' },
            { data: 'role_name', name: 'role_name' },

            { data: 'abstrack', name: 'abstrack'},
            {
                data: 'status', name: 'status',
                render: function (data){
                    if(data == 0 ){
                        return '<p class="btn btn-primary">Menunggu</p>';
                    } else if (data == 1) {
                        return '<p class="btn btn-success">Diterima</p>';
                    } else if (data == 2) {
                        return '<p class="btn btn-danger">Di Tolak</p>';
                    }else{


                    }
                }
            },
            // { data: 'updated_at', name: 'updated_at'},
            { data: 'options', name: 'options',orderable: false, searchable: false } ],
        });
        $('#table_karya').on('click', '#btn-delete', function () {
            var slug = $(this).data('id');
            var url = '{{ route("dashboard.master.karya.destroy", ":slug") }}';
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
                                reloadTable('#table_karya');
                            });
                            } else {
                                // Reload the page with an error message
                                swal('Error', data.message, 'error');
                                reloadTable('#table_karya');
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
