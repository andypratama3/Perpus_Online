@extends('layouts.user')
@section('title', 'Jurnal')
@push('css_user')
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<style>
    .jurnal_section {
        margin-top: 50px;
    }

    .jurnal-form {
        background-color: #4e63d7;
        border-radius: 5px;
        padding: 0 16px;
    }

    .jurnal-form .form-control {
        background-color: rgba(255, 255, 255, 0.2);
        border: 0;
        padding: 12px 15px;
        color: #fff;
    }

    .jurnal-form .form-control::-webkit-input-placeholder {
        /* Chrome/Opera/Safari */
        color: #fff;
    }

    .jurnal-form .form-control::-moz-placeholder {
        /* Firefox 19+ */
        color: #fff;
    }

    .jurnal-form .form-control:-ms-input-placeholder {
        /* IE 10+ */
        color: #fff;
    }

    .jurnal-form .form-control:-moz-placeholder {
        /* Firefox 18- */
        color: #fff;
    }

    .jurnal-form .custom-select {
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

    .jurnal-form .custom-select:focus {
        -webkit-box-shadow: none;
        box-shadow: none;
        background-color: #5a85dd
    }

    .jurnal-form .select-container {
        position: relative;
    }

    .jurnal-form .select-container:before {
        position: absolute;
        right: 15px;
        top: calc(50% - 14px);
        font-size: 18px;
        color: #ffffff;
        font-family: "Material-Design-Iconic-Font";
    }

    .filter-result .jurnal-item {
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

    .jurnal-item .img-holder {
        height: 65px;
        width: 65px;
        background-color: #4e63d7;
        background-image: -webkit-gradient(linear, left top, right top, from(rgba(78, 99, 215, 0.9)), to(#5a85dd));
        background-image: linear-gradient(to right, rgba(78, 99, 215, 0.9) 0%, #5a85dd 100%);
        font-family: "Open Sans", sans-serif;
        color: #fff;
        font-size: 22px;
        font-weight: 700;
        display: -webkit-box;
        display: -ms-flexbox;
        display: flex;
        -webkit-box-pack: center;
        -ms-flex-pack: center;
        justify-content: center;
        -webkit-box-align: center;
        -ms-flex-align: center;
        align-items: center;
        border-radius: 65px;
    }

    .jurnal-title {
        background-color: #4e63d7;
        color: #fff;
        padding: 15px;
        text-align: center;
        border-radius: 10px 10px 0 0;
        background-image: -webkit-gradient(linear, left top, right top, from(rgba(78, 99, 215, 0.9)), to(#5a85dd));
        background-image: linear-gradient(to right, rgba(78, 99, 215, 0.9) 0%, #5a85dd 100%);
    }

    .jurnal-overview {
        -webkit-box-shadow: 0 0 35px 0 rgba(130, 130, 130, 0.2);
        box-shadow: 0 0 35px 0 rgba(130, 130, 130, 0.2);
        border-radius: 10px;
    }

    @media (min-width: 992px) {
        .jurnal-overview {
            position: -webkit-sticky;
            position: sticky;
            top: 70px;
        }
    }

    .jurnal-overview .job-detail ul {
        margin-bottom: 28px;
    }

    .jurnal-overview .job-detail ul li {
        opacity: 0.75;
        font-weight: 600;
        margin-bottom: 15px;
    }

    .jurnal-overview .job-detail ul li i {
        font-size: 20px;
        position: relative;
        top: 1px;
    }

    .jurnal-overview .overview-bottom,
    .jurnal-overview .overview-top {
        padding: 35px;
    }

    .job-content ul li {
        font-weight: 600;
        opacity: 0.75;
        border-bottom: 1px solid #ccc;
        padding: 10px 5px;
    }

    @media (min-width: 768px) {
        .job-content ul li {
            border-bottom: 0;
            padding: 0;
        }
    }

    .job-content ul li i {
        font-size: 20px;
        position: relative;
        top: 1px;
    }

    .mb-30 {
        margin-bottom: 30px;
    }

</style>
@endpush
@section('content')
<section class="jurnal_section">
    <div class="container">

        <div class="row">
            <div class="col-lg-10 mx-auto">
                <div class="jurnal-search mb-60">

                    <form action="{{ route('jurnal.index') }}" class="jurnal-form mb-60" method="GET">
                        @csrf
                        <div class="row">
                            <div class="col-md-6 col-lg-6 my-3">
                                <div class="input-group position-relative">
                                    <input type="text" class="form-control" id="search-jurnal" name="search" placeholder="Cari Jurnal ..." value="{{ request()->query('search') }}">
                                </div>
                            </div>
                            <div class="col-md-6 col-lg-4 my-3">
                                <div class="input-group position-relative">
                                    <select name="category" id="select-category" class="form-control Select-container custom-select" aria-placeholder="Pilih Kategori">
                                        <option value="">Pilih Kategori</option>
                                        @foreach ($categorys as $category)
                                            <option value="{{ $category->id }}" {{ request()->query('category_id') == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-2 col-lg-2 my-3 float-end">
                                <button type="submit" class="btn btn-lg btn-block btn-danger btn-custom"
                                    id="contact-submit">
                                    Search <i class="bi bi-search icon my-5"></i>
                                </button>
                            </div>
                        </div>
                    </form>

                    <div class="filter-result">
                        <p class="mb-30 ff-montserrat">Total Jurnal : {{ $jurnals->total() }} Item</p>
                        @foreach ($jurnals as $jurnal)
                            <div class="jurnal-item d-md-flex align-items-center justify-content-between mb-30">
                                <div class="job-left my-4 d-md-flex align-items-center flex-wrap">
                                    <div class="img-holder mr-md-4 mb-md-0 mb-4 mx-auto mx-md-0 d-md-none d-lg-flex">
                                        <i class="bi bi-book"></i>
                                    </div>
                                    <div class="job-content">
                                        <h5 class="text-center text-md-left">{{ $jurnal->name }}   </h5>
                                        <ul class="d-md-flex flex-wrap text-capitalize ff-open-sans">
                                            @foreach ($jurnal->jurnals_category as $category)
                                                <li class="mr-md-4">
                                                    <i class="zmdi zmdi-pin mr-2"></i> {{ $category->name . ' , ' }}
                                                </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                                <div class="job-right my-4 flex-shrink-0">
                                    <a href="{{ route('jurnal.show', $jurnal->slug)  }}" class="btn d-block w-100 d-sm-inline-block btn-success">Lihat Jurnal <i class="bi bi-eye"></i></a>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>

                <!-- START Pagination -->
                <nav aria-label="Page navigation">
                    <ul class="pagination pagination-reset justify-content-end">
                        {{ $jurnals->links() }}
                    </ul>
                </nav> -
                <!-- END Pagination -->
            </div>
        </div>

    </div>
</section>
@push('js_user')

    <script>
        $(document).ready(function () {

        });
    </script>
@endpush
@endsection
