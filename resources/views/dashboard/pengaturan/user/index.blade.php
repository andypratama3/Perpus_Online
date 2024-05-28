@extends('layouts.dashboard_partial.index')
@section('title', 'User')
@push('css')
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.css" />
@endpush
@section('content')
<div class="content-wrapper pb-0">
    <div class="page-header flex-wrap">
        <div class="header-left">
            <h2>User</h2>
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
                <table class="table table-hover text-center" id="table_user">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Email</th>
                            <th>Role</th>
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
<input type="hidden" id="user_value_data" value="{{ route('dashboard.pengaturan.getuser') }}">
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
    $('#table_user').DataTable({
        ordering: true,
        pagination: true,
        deferRender: true,
        serverSide: true,
        responsive: true,
        processing: true,
        pageLength: 100,
        ajax: {
            'url': $('#user_value_data').val(),
        },
        columns: [
            { data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false },
            { data: 'name', name: 'name' },
            { data: 'email', name: 'email' },
            { data: 'role_name', name: 'role_name' },
            // { data: 'avatar',
            //     render: function (data){
            //         return `<img src="{{ asset('storage/profile/profile.jpg') }}" alt="" srcset="">`;
            //     }
            // },
            {
                data: 'options', name: 'options', orderable: false, searchable: false
            }
        ],
    });
    $('#table_user').on('click', '#btn-delete', function () {
            var slug = $(this).data('id');
            var url = '{{ route("dashboard.pengaturan.user.destroy", ":slug") }}';
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
                                reloadTable('#table_user');
                            });
                            } else {
                                // Reload the page with an error message
                                swal('Error', data.message, 'error');
                                reloadTable('#table_user');
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
