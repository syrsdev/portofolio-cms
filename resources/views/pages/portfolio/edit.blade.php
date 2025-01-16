@extends('layouts.layout')

@section('section')
    @include('components.pagetitle', ['title' => $title])

    <div class="card">
        <div class="card-body">
            <form method="POST" action="{{ route('projects.update', $data->id) }}" id="form"
                enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label for="title" class="form-label">Title</label>
                    <input type="text" class="form-control" id="title" name="title" value="{{ $data->title }}">
                </div>
                <div class="mb-3">
                    <label for="description" class="form-label">Description</label>
                    <textarea id="dark" cols="30" rows="10" name="description">{!! $data->description !!}</textarea>
                </div>
                <div class="mb-3">
                    <label for="link" class="form-label">Demo Link</label>
                    <input type="text" class="form-control" id="link" name="link" value="{{ $data->link }}">
                </div>
                <div class="mb-3">
                    <label for="github_link" class="form-label">Github Link</label>
                    <input type="text" class="form-control" id="github_link" name="github_link"
                        value="{{ $data->github_link }}">
                </div>
                <div class="mb-3">
                    <label for="figma_link" class="form-label">Figma Link</label>
                    <input type="text" class="form-control" id="figma_link" name="figma_link"
                        value="{{ $data->figma_link }}">
                </div>
                <div class="mb-3">
                    <label for="image" class="form-label">Image</label>
                    <input type="file" class="image-preview-filepond" id="image" name="image">
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
@endsection

@section('style')
    <link rel="stylesheet" href="{{ asset('/dist/assets/extensions/filepond/filepond.css') }}">
    <link rel="stylesheet"
        href="{{ asset('/dist/assets/extensions/filepond-plugin-image-preview/filepond-plugin-image-preview.css') }}">
    <link rel="stylesheet" href="{{ asset('/dist/assets/extensions/toastify-js/src/toastify.css') }}">
    <link rel="stylesheet" href="{{ asset('/dist/assets/extensions/quill/quill.snow.css') }}">
    <link rel="stylesheet" href="{{ asset('/dist/assets/extensions/quill/quill.bubble.css') }}">
    <style>
        .tox .tox-promotion {
            display: none !important;
        }
    </style>
@endsection

@section('script')
    <script
        src="{{ asset('/dist/assets/extensions/filepond-plugin-file-validate-size/filepond-plugin-file-validate-size.min.js') }}">
    </script>
    <script
        src="{{ asset('/dist/assets/extensions/filepond-plugin-file-validate-type/filepond-plugin-file-validate-type.min.js') }}">
    </script>
    <script src="{{ asset('/dist/assets/extensions/filepond-plugin-image-crop/filepond-plugin-image-crop.min.js') }}">
    </script>
    <script
        src="{{ asset('/dist/assets/extensions/filepond-plugin-image-exif-orientation/filepond-plugin-image-exif-orientation.min.js') }}">
    </script>
    <script src="{{ asset('/dist/assets/extensions/filepond-plugin-image-filter/filepond-plugin-image-filter.min.js') }}">
    </script>
    <script
        src="{{ asset('/dist/assets/extensions/filepond-plugin-image-preview/filepond-plugin-image-preview.min.js') }}">
    </script>
    <script src="{{ asset('/dist/assets/extensions/filepond-plugin-image-resize/filepond-plugin-image-resize.min.js') }}">
    </script>
    <script src="{{ asset('/dist/assets/extensions/filepond/filepond.js') }}"></script>
    <script src="{{ asset('/dist/assets/extensions/toastify-js/src/toastify.js') }}"></script>
    <script src="{{ asset('/dist/assets/static/js/pages/filepond.js') }}"></script>
    <script src="{{ asset('/dist/assets/extensions/tinymce/tinymce.min.js') }}"></script>
    <script src="{{ asset('/dist/assets/static/js/pages/tinymce.js') }}"></script>
@endsection
