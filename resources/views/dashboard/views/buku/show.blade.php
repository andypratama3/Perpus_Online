@extends('layouts.dashboard_partial.index')
@section('title', 'View Buku')
@section('content')
<div class="content-wrapper pb-0">
    <div class="page-header flex-wrap">
        <div class="header-left">
            <h2>Pengunjung Buku {{ $buku->name }}</h2>
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
                        <th>Nama Pengunjung</th>
                        <th>Jumlah Mengunjungi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($groupedViews as $index => $view)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $view->user->first()->name }}</td>
                        <td>{{ $view->total_visits }}</td>
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

@endsection
