@extends('layouts.user')
@section('title', 'Buku')
@push('css_user')
    <link rel="stylesheet" href="{{ asset('assets_user/css/book.css') }}">
    <link rel="stylesheet" href="{{ asset('assets_user/css/mbr.css') }}">

    <style>

        .buku-form {
            background-color: #4e63d7;
            border-radius: 5px;
            padding: 0 16px;
        }

        .buku-form .form-control {
            background-color: rgba(255, 255, 255, 0.2);
            border: 0;
            padding: 12px 15px;
            color: #fff;
        }

        .buku-form .form-control::-webkit-input-placeholder {
            /* Chrome/Opera/Safari */
            color: #fff;
        }

        .buku-form .form-control::-moz-placeholder {
            /* Firefox 19+ */
            color: #fff;
        }

        .buku-form .form-control:-ms-input-placeholder {
            /* IE 10+ */
            color: #fff;
        }

        .buku-form .form-control:-moz-placeholder {
            /* Firefox 18- */
            color: #fff;
        }

        .buku-form .custom-select {
            background-color: rgba(255, 255, 255, 0.2);
            border: 0;
            padding: 12px 15px;
            color: #fff;
            width: 100%;
            border-radius: 5px;
            text-align: left;
            height: auto;
            background-image: none;
        }

        .buku-form .custom-select:focus {
            -webkit-box-shadow: none;
            box-shadow: none;
            background-color: #5a85dd
        }

        .buku-form .select-container {
            position: relative;
        }

        .buku-form .select-container:before {
            position: absolute;
            right: 15px;
            top: calc(50% - 14px);
            font-size: 18px;
            color: #ffffff;
            font-family: "Material-Design-Iconic-Font";
        }

        .filter-result .buku-item {
            background: #fff;
            -webkit-box-shadow: 0 0 35px 0 rgba(130, 130, 130, 0.2);
            box-shadow: 0 0 35px 0 rgba(130, 130, 130, 0.2);
            border-radius: 10px;
            padding: 10px 35px;
        }

        ul {
            list-style: none;
        }

        .list-disk li {
            list-style: none;
            margin-bottom: 12px;
        }

        .list-disk li:last-child {
            margin-bottom: 0;
        }


        .mb-30 {
            margin-bottom: 30px;
        }

    </style>
@endpush
@section('content')

<!-- ======= Cource Details Section ======= -->
<section id="course-details" class="course-details" style="margin-top: 50px;">
    <div class="container" data-aos="fade-up">
        <div class="row">
            <div class="col-lg-12 mx-auto" style="margin-bottom: 100px;">
                <div class="buku-search">
                <form action="{{ route('buku.index') }}" class="buku-form mb-60" method="GET">
                    @csrf
                    <div class="row">
                        <div class="col-md-6 col-lg-6 my-3">
                            <div class="input-group position-relative">
                                <input type="text" class="form-control" id="search-buku" name="search" placeholder="Cari buku ..." value="{{ request()->query('search') }}">
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-4 my-3">
                            <div class="input-group position-relative">
                                <select name="category" id="select-category" class="form-control Select-container custom-select" aria-placeholder="Pilih Kategori">
                                    <option selected disabled>Pilih Kategori</option>
                                    @foreach ($category_bukus as $category)
                                        <option value="{{ $category->id }}" {{ request()->query('category') == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-2 my-3 text-center">
                            <button type="submit" class="btn-sm btn-primary btn-block"
                                id="contact-submit">
                                Search <i class="bi bi-search icon my-5"></i>
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <div class="row">
            @foreach ($bukus as $buku)
            @php
            $coverArray = explode(',', rtrim($buku->cover, ','));
            $firstCover = reset($coverArray);
            @endphp
            <div class="card col-md-6 col-lg-4">
                <div class="card-img">
                    <img src="{{ asset('storage/buku/cover/'. $firstCover) }}" alt="Mobirise" style="width: 100%; border-radius: 10px;">
                </div>
                <div class="card-box pt-4">
                    <h5 class="card-subtitle align-center pb-4 mbr-fonts-style display-7">Terbit :
                        {{ $buku->tahun_terbit }}
                    </h5>
                    <h4 class="card-title align-center pb-1 mbr-bold mbr-fonts-style display-5">{{ $buku->name }}</h4>
                    <p class="mbr-text align-center pb-3 mbr-fonts-style display-7">
                        {!! Str::limit($buku->description, 100) !!}</p>

                    <h5 class="link align-center mbr-fonts-style display-7">
                        <i class="bi bi-eye"></i> {{ $buku->jumlah_pengunjung }}
                        <a href="{{ route('buku.show', $buku->slug) }}" class="text-black btn btn-success btn-sm">
                            READ MORE
                        </a>
                    </h5>
                </div>
            </div>
            @endforeach
        </div>
        <nav aria-label="Page navigation">
            <ul class="pagination pagination-reset justify-content-end">
                {{ $bukus->links() }}
            </ul>
        </nav>
    </div>
</section>

@endsection
