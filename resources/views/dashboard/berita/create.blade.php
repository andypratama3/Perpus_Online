@extends('layouts.dashboard_partial.index')
@section('title', 'Berita')
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
                    <h4 class="card-title text-center">Tambah Berita</h4>
                    <form action="{{ route('dashboard.master.berita.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="form-label">Judul</label>
                                    <input type="text" class="form-control" name="name" id="name" placeholder="Masukan Judul">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Foto</label>
                                    <input type="file" class="form-control" name="foto" id="foto" accept="image/*">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group text-center">
                                    <label for="">Description</label>
                                    <div id="content-editor"></div>
                                    <textarea class="d-none" name="body" id="body-content"></textarea>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <a href="{{ route('dashboard.master.berita.index') }}" class="btn btn-danger">Kembali   </a>
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
