@extends('layouts.dashboard_partial.index')
@section('title','Detail Task')
@section('content')

<div class="content-wrapper pb-0">
    <div class="page-header flex-wrap">
        <div class="header-left">
            <a href="{{ route('dashboard.pengaturan.task.index') }}" class="btn btn-danger">Kembali</a>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
        <!-- Form Basic -->
        <div class="card mb-4">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
            <h6 class="m-0 font-weight-bold text-primary text-center">Detail Task</h6>
            </div>
            <div class="card-body">
                <form action="{{ route('dashboard.pengaturan.task.update', $task->slug) }}" method="post">
                    @csrf
                    @method('PUT')
                <div class="form-group">
                <label for="name">Nama Task</label>
                <input type="text" class="form-control" id="name" aria-describedby="task" value="{{ $task->name }}" readonly>
                </div>
                <div class="form-group">
                <label for="name">Deskripsi</label>
                <input type="text" class="form-control" id="name" aria-describedby="task" value="{{ $task->description }}" readonly>
                </div>
            </form>
            </div>
        </div>
    </div>
</div>
@endsection
