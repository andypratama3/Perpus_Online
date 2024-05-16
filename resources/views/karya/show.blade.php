@extends('layouts.user_partial.user_buku')
@section('title', 'Detail karya')
@section('content')

<div class="breadcrumbs" data-aos="fade-in" style="margin: 0;">
    <a href="{{ route('karya.index') }}" class="btn btn-danger float-lg-start" style="margin-left: 10px;">Kembali</a>
    <div class="container">
        <h2>Detail Karya {{ $karya->name }}</h2>
    </div>
</div>
<!-- ======= Cource Details Section ======= -->
<section id="course-details" class="course-details">
    <div class="container" data-aos="fade-up">

        <div class="row">

            <div class="col-lg-12">

                <div class="course-info d-flex justify-content-between align-items-center">
                    <h5>Karya : {{ $karya->title }}</h5>
                </div>

                <div class="course-info d-flex justify-content-between align-items-center">
                    <h5>Abstract : {{ $karya->abstrack }} </h5>
                </div>

                <div class="course-info d-flex justify-content-between align-items-center">
                    <h5>Karya Dari  : {{ $karya->first()->user->name }} </h5>


                </div>

                <div class="course-info d-flex justify-content-between align-items-center">

                    <div class="input-group mb-3">
                      <div class="input-group-prepend float-end">
                        <span class="input-group-text" id="basic-addon3">{{ $karya->file_karya }}</span>
                      </div>
                      <a target="__blank" href="{{ asset('storage/file/karya/'. $karya->file_karya) }}" download="{{ asset('storage/file/karya/'. $karya->file_karya) }}" class="btn btn-primary text-white">Download</a>
                    </div>
                </div>

                <div class="col-md-12">
                    <h4 class="text-center">Karya</h4>
                    <div class="form-group">
                        <iframe src="{{ asset('storage/file/karya/'. $karya->file_karya) }}" style="width: 100%; height: 1000px;" frameborder="0"></iframe>
                    </div>
                </div>
            </div>
        </div>

    </div>
</section>
<section id="cource-details-tabs" class="cource-details-tabs">
    <div class="container" data-aos="fade-up">
      <div class="row">
        <div class="col-lg-12 mt-2 mt-lg-0">
            {{-- <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Sint animi amet est. Mollitia recusandae necessitatibus sequi iste architecto ad vitae totam sapiente est accusamus ab, qui molestias. Reprehenderit, adipisci eius.</p> --}}
        </div>
      </div>
    </div>
  </section>
@endsection
