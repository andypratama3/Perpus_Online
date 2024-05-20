@extends('layouts.dashboard_partial.index')
@section('title', 'Karya')
@push('css')
    <link href="https://cdn.jsdelivr.net/npm/quill@2.0.1/dist/quill.snow.css" rel="stylesheet">
@endpush
@section('content')
<div class="content-wrapper pb-0">
    <div class="row">
        <div class="col-xl-12 stretch-card grid-margin">
            <div class="card">
               @include('layouts.flashmessage')
                <div class="card-body">
                    <h4 class="card-title text-center">Tambah Karya</h4>
                    <form action="{{ route('dashboard.master.karya.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="form-label">Judul</label>
                                    <input type="text" class="form-control" name="title" id="title" placeholder="Masukan Judul" value="{{ old('judul') }}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Abstrack</label>
                                    <input type="text" class="form-control" name="abstrack" id="abstrack" value="{{ old('abstrack') }}">
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group text-center">
                                    <label for="">Cover Karya</label>
                                    <input type="file" class="form-control file-input" name="cover_karya" accept="image/*" value="{{ old('cover_karya') }}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group text-center">
                                    <label for="">File Karya</label>
                                    <input type="file" class="form-control file-input" name="file_karya" accept="application/pdf" value="{{ old('file_karya') }}">
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group">
                                    <a href="{{ route('dashboard.master.karya.index') }}" class="btn btn-danger">Kembali   </a>
                                    <button class="btn btn-primary float-right">Submit</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@push('js')
<script src="https://cdn.jsdelivr.net/npm/quill@2.0.1/dist/quill.js"></script>
<script>
    $(document).ready(function () {
        const toolbarOptions = [
            ['bold', 'italic', 'underline', 'strike'],
            ['blockquote', 'code-block'],

            [{
                'header': 1
            }, {
                'header': 2
            }], // custom button values
            [{
                'list': 'ordered'
            }, {
                'list': 'bullet'
            }],
            [{
                'script': 'sub'
            }, {
                'script': 'super'
            }], // superscript/subscript
            [{
                'indent': '-1'
            }, {
                'indent': '+1'
            }], // outdent/indent
            [{
                'direction': 'rtl'
            }], // text direction

            [{
                'size': ['small', false, 'large', 'huge']
            }], // custom dropdown
            [{
                'header': [1, 2, 3, 4, 5, 6, false]
            }],

            [{
                'color': []
            }, {
                'background': []
            }], // dropdown with defaults from theme
            [{
                'font': []
            }],
            [{
                'align': []
            }],

            ['clean']
        ];

        var quil = new Quill('#content-editor', {
            modules: {
                toolbar: toolbarOptions
            },
            theme: 'snow'
        });
        quil.on('text-change', function (delta, oldDelta, source){
            $('#body-content').text($('.ql-editor').html());
        });
    });
</script>
<script src="{{ asset('assets/js/file-upload.js') }}"></script>
@endpush
@endsection
