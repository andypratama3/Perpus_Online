@extends('layouts.dashboard_partial.index')
@section('title', 'Jurnal')
@push('css')
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.css" />
@endpush
@section('content')
<div class="content-wrapper pb-0">
    <div class="page-header flex-wrap">
        <div class="header-left">
            <button class="btn btn-primary mb-2 mb-md-0 mr-2"> Create new document </button>
            <button class="btn btn-outline-primary bg-white mb-2 mb-md-0"> Import documents </button>
        </div>
        <div class="header-right d-flex flex-wrap mt-2 mt-sm-0">
            <div class="d-flex align-items-center">
                <a href="#">
                    <p class="m-0 pr-3">Dashboard</p>
                </a>
                <a class="pl-3 mr-4" href="#">
                    <p class="m-0">ADE-00234</p>
                </a>
            </div>
            <a href="{{ route('dashboard.jurnal.create') }}" class="btn btn-primary mt-2 mt-sm-0 btn-icon-text">
                <i class="mdi mdi-plus-circle"></i>Tambah Data</a>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12 grid-margin">
            <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                <table class="table table-hover text-center" id="table_jurnal">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Jurnal</th>
                            <th>Pengguna</th>
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
<input type="hidden" id="table_value_data" value="{{ route('dashboard.jurnal.getjurnal') }}">
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
    $('#table_jurnal').DataTable({
        ordering: true,
        pagination: true,
        deferRender: true,
        serverSide: true,
        responsive: true,
        processing: true,
        pageLength: 100,
        ajax: {
            'url': $('#table_value_data').val(),
        },
        columns: [
            { data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false },
            { data: 'name', name: 'name' },
            { data: 'jurnal', name: 'jurnal' },
            { data: 'user_name', name: 'user_name' },
            {
                data: 'options', name: 'options', orderable: false, searchable: false
            }
        ],
    });
    $('#table_jurnal').on('click', '#btn-delete', function () {
            var slug = $(this).data('id');
            var url = '{{ route("dashboard.jurnal.destroy", ":slug") }}';
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
                                reloadTable('#table_jurnal');
                            });
                            } else {
                                // Reload the page with an error message
                                swal('Error', data.message, 'error');
                                reloadTable('#table_jurnal');
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
