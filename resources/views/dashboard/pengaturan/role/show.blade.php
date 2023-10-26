@extends('layouts.dashboard_partial.index')
@section('title','Detail Role')
@section('content')

<div class="content-wrapper pb-0">
    <div class="page-header flex-wrap">
        <div class="header-left">
            <h2>Ganti Role</h2>
        </div>
        <div class="header-right d-flex flex-wrap mt-2 mt-sm-0">
            <div class="d-flex align-items-center">

            </div>
        </div>
    </div>
    <div class="row">
    <div class="col-lg-12 grid-margin">
        <!-- Form Basic -->
        <div class="card mb-4">
            @if ($errors->any())
            <div class="alert alert-danger alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <h5><i class="icon fas fa-ban"></i> Alert!</h5>
                <strong>{!! implode('', $errors->all('<div>:message</div>')) !!}</strong>
            </div>
            @endif
            <div class="card-body">
                <form action="{{ route('dashboard.pengaturan.role.update', $role->slug) }}" method="post">
                    @csrf
                    @method('PUT')
                    <input type="hidden" name="slug" value="{{ $role->slug }}">
                    <div class="form-group">
                        <label for="name">Nama role</label>
                        <input type="text" class="form-control" id="name" aria-describedby="role" name="name"
                            placeholder="Masukan Nama role" value="{{ $role->name }}">
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <label>Pilih Hak Akses <code>*</code></label>
                            @if ($errors->has('permissions'))
                            <div class="row">
                                <div class="text-danger">{{ $errors->first('permissions') }}</div>
                            </div>
                            @endif
                            <table class="table table-bordered table-striped mb-5" border='10' style=" text-align:center;">
                                <thead>
                                    <tr>
                                        <th scope="col" class="text-center" style="vertical-align:middle">Tugas</th>
                                        <th scope="col" colspan="5" class="text-center">Hak Akses</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($tasks as $task)
                                    <tr>
                                        <td scope="row">{{ $task->description }}</td>
                                        <th scope="col" class="text-center">
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input {{ $errors->has('permissions') ? 'is-invalid' : '' }} checkAll checkAll{{ $task->slug }}" id="checkAllCustom{{ $task->slug }}" name="izin" value="{{ $task->slug }}">
                                                <label for="checkAllCustom{{ $task->slug }}" class="form-check-label custom-control-label">Pilih Semua</label>
                                            </div>
                                        </th>
                                        @foreach ($task->permissions as $permission)
                                        <td class="{{ $task->slug }}">
                                            <div class=" hak{{ $task->slug }}">
                                                <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input {{ $errors->has('permissions') ? 'is-invalid' : '' }} check{{ $task->slug }} hakakses" id="{{ $permission->name }}" name="permissions[]" value="{{ $permission->id }}" {{ in_array($permission->name, $permissions) ? 'checked' : '' }}>
                                                    <label for="{{ $permission->name }}" class="form-check-label custom-control-label">{{ explode(' ', $permission->name)[0] }}</label>
                                                </div>
                                            </div>
                                        </td>
                                        @endforeach
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <a href="{{ route('dashboard.pengaturan.role.index') }}" class="btn btn-danger">Kembali</a>
                    <button type="submit" class="btn btn-primary float-lg-right">Ubah Role</button>
                </form>
            </div>
        </div>
    </div>
</div>

@push('js')
<script>
    $(function () {
        $("#nama").keypress(function () {
            $("#nama").removeClass("is-invalid");
            $("#textNama").html("");
        });

        $(".checkAll").on('change', function () {
            if ($(this).is(':checked')) {
                $(".check" + this.value).prop('checked', true);
            } else {
                $(".check" + this.value).prop('checked', false);
            }
        });
        $(".hakakses").on('click', function () {
            var header = $(this).attr('class');
            var classParent = header.replace(" hakakses", "");
            var countChecked = $('.' + classParent + ':checked').length;
            var parentClass = $(this).closest('td').attr('class');
            if (countChecked == 4) {
                $(".checkAll" + parentClass).prop('checked', true);
            } else {
                $(".checkAll" + parentClass).prop('checked', false);
            }
        });
    });
</script>
@endpush

@endsection
