@extends('layouts.dashboard_partial.index')
@section('title', 'Task')
@section('content')
<div class="content-wrapper pb-0">
    <div class="page-header flex-wrap">
        <div class="header-left">
            <a href="{{ route('dashboard.pengaturan.task.index') }}" class="btn btn-danger">Kembali</a>
        </div>
    </div>
    <div class="row">
        <div class="col-xl-12 stretch-card grid-margin">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title text-center">Tambah Data Task</h4>
          <form action="{{ route('dashboard.pengaturan.task.update', $task->slug) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <input type="hidden" name="slug" value="{{ $task->slug }}">
            <div class="form-group">
              <label for="name">Nama Task</label>
              <input type="text" class="form-control" id="name" aria-describedby="task" name="name" placeholder="Masukan Nama Task" value="{{ $task->name }}">
            </div>
            <div class="form-group">
              <label for="name">Deskripsi Task</label>
              <input type="text" class="form-control" id="description" aria-describedby="task" name="description" placeholder="Masukan Deskripsi Task" value="{{ $task->description }}">
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Hak Akses Default <code>*</code></label>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input {{ $errors->has('permissions') ? 'is-invalid' : '' }} checkAll" id="checkAllCustom">
                                    <label for="checkAllCustom" class="form-check-label custom-control-label">Pilih Semua</label>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input {{ $errors->has('permissions') ? 'is-invalid' : '' }} check" id="checkLihat" name="permissions[]" value="View" @isset($view) {{ explode(' ', $view->name)[0] == "View" ? 'checked' : '' }} @endisset>
                                    <label for="checkLihat" class="form-check-label custom-control-label">Lihat</label>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input {{ $errors->has('permissions') ? 'is-invalid' : '' }} check" id="checkTambah" name="permissions[]" value="Create" @isset($create) {{ explode(' ', $create->name)[0] == "Create" ? 'checked' : '' }} @endisset>
                                    <label for="checkTambah" class="form-check-label custom-control-label">Tambah</label>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input {{ $errors->has('permissions') ? 'is-invalid' : '' }} check" id="checkUbah" name="permissions[]" value="Edit" @isset($edit) {{ explode(' ', $edit->name)[0] == "Edit" ? 'checked' : '' }} @endisset>
                                    <label for="checkUbah" class="form-check-label custom-control-label">Ubah</label>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input {{ $errors->has('permissions') ? 'is-invalid' : '' }} check" id="checkHapus" name="permissions[]" value="Delete" @isset($delete) {{ explode(' ', $delete->name)[0] == "Delete" ? 'checked' : '' }} @endisset>
                                    <label for="checkHapus" class="form-check-label custom-control-label">Hapus</label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <table class="table table-bordered text-center" id="dynamicAddRemove">
                        <tr>
                            <th class="w-75">Custom Permission</th>
                            <th class="w-25"><button type="button" id="dynamic-ar" class="btn btn-sm btn-primary"><i class="mdi mdi-plus-box"></i></button></th>
                        </tr>
                        @foreach ($task->permissions as $permission)
                            @if (
                                explode(' ', $permission->name)[0] != "View" &&
                                explode(' ', $permission->name)[0] != "Create" &&
                                explode(' ', $permission->name)[0] != "Edit" &&
                                explode(' ', $permission->name)[0] != "Delete"
                            )
                            <tr>
                                <td>
                                    <input type="text" class="form-control" name="permissions[]" placeholder="Masukkan Custom Permission" value="{{ explode(' ', $permission->name)[0] }}">
                                </td>
                                <td colspan="2">
                                    <button type="button" class="btn btn-sm btn-danger remove-input-field"><i class="mdi mdi-delete-circle"></i></button></td>
                                </td>
                            </tr>
                            @endif
                        @endforeach
                    </table>
                </div>
            </div>
            <div class="col-sm-12 mt-10">
                <button type="submit" class="btn btn-primary float-lg-right">Submit</button>
              </div>
          </form>
        </div>
      </div>
  </div>
</div>
@push('js')
<script>
    $(document).ready(function () {
        $(".checkAll").on('change', function () {
            if ($(this).is(':checked')) {
                $(".check").prop('checked', true);
            } else {
                $(".check").prop('checked', false);
            }
        });

        var i = {{ $count }};
        $("#dynamic-ar").click(function () {
            ++i;
            $("#dynamicAddRemove").append(
                `<tr>
                    <td>
                        <input type="text" class="form-control" name="permissions[]" placeholder="Masukkan Custom Permission">
                    </td>
                    <td colspan="2">
                        <button type="button" class="btn btn-sm btn-danger remove-input-field"><i class="mdi mdi-delete-circle"></i></button></td>
                    </td>
                </tr>`
            );
        });
        $(document).on('click', '.remove-input-field', function () {
            $(this).parents('tr').remove();
            --i;
        });
    });
</script>
@endpush
@endsection
