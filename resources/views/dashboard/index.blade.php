@extends('layouts.dashboard_partial.index')
@section('title', 'Dashboard')
@section('content')
<div class="content-wrapper pb-0">
    <div class="row">
        @if(Auth::user()->roles == 'Guru' || Auth::user()->roles == 'Mahasiswa' || Auth::user()->roles == 'Siswa')
        <div class="col-xl-12 stretch-card grid-margin">
            <div class="card text-center">
                <div class="card-body">
                    <div class="col-md-4">
                        <div class="d-flex border-bottom mb-4 pb-2">
                            <div class="hexagon">
                                <div class="hex-mid hexagon-warning">
                                    <i class="mdi mdi-book-outline"></i>
                                </div>
                            </div>
                            <div class="pl-4">
                                <h4 class="font-weight-bold text-warning mb-0">Jumlah Karya </h4>
                                <h6 class="text-muted"> {{ $count_file_karya }} Karya</h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @else
        <div class="col-md-12 stretch-card grid-margin">
            <div class="card">
                <div class="card-body text-center justify-content-center align-items-center">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="d-flex border-bottom mb-4 pb-2">
                                <div class="hexagon">
                                    <div class="hex-mid hexagon-warning">
                                        <i class="mdi mdi-newspaper"></i>
                                    </div>
                                </div>
                                <div class="pl-4">
                                    <h4 class="font-weight-bold text-warning mb-0">Jumlah Berita </h4>
                                    <h6 class="text-muted"> {{ $count_file_karya }} Berita</h6>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="d-flex border-bottom mb-4 pb-2">
                                <div class="hexagon">
                                    <div class="hex-mid hexagon-warning">
                                        <i class="mdi mdi-book-outline"></i>
                                    </div>
                                </div>
                                <div class="pl-4">
                                    <h4 class="font-weight-bold text-warning mb-0">Jumlah Karya </h4>
                                    <h6 class="text-muted"> {{ $count_file_karya }} Karya</h6>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="d-flex border-bottom mb-4 pb-2">
                                <div class="hexagon">
                                    <div class="hex-mid hexagon-success">
                                        <i class="mdi mdi-book-outline"></i>
                                    </div>
                                </div>
                                <div class="pl-4">
                                    <h4 class="font-weight-bold text-warning mb-0">Buku </h4>
                                    <h6 class="text-muted"> {{ $count_buku_literasi }} Buku</h6>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="d-flex border-bottom mb-4 pb-2">
                                <div class="hexagon">
                                    <div class="hex-mid hexagon-secondary">
                                        <i class="mdi mdi-book-outline"></i>
                                    </div>
                                </div>
                                <div class="pl-4">
                                    <h4 class="font-weight-bold text-warning mb-0">Kategori </h4>
                                    <h6 class="text-muted"> {{ $count_kategori }} Kategori</h6>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="d-flex border-bottom mb-4 pb-2">
                                <div class="hexagon">
                                    <div class="hex-mid hexagon-danger">
                                        <i class="mdi mdi-book-outline"></i>
                                    </div>
                                </div>
                                <div class="pl-4">
                                    <h4 class="font-weight-bold text-warning mb-0">Jurnal </h4>
                                    <h6 class="text-muted"> {{ $count_jurnal }} Jurnal</h6>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="d-flex border-bottom mb-4 pb-2">
                                <div class="hexagon">
                                    <div class="hex-mid hexagon-info">
                                        <i class="mdi mdi-human-male"></i>
                                    </div>
                                </div>
                                <div class="pl-4">
                                    <h4 class="font-weight-bold text-warning mb-0">User </h4>
                                    <h6 class="text-muted"> {{ $count_user }} User</h6>
                                </div>
                            </div>
                        </div>
                </div>
            </div>
        </div>
    </div>
    @endif
</div>
</div>
@endsection
