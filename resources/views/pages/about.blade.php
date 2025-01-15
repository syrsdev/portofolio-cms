@extends('layouts.layout')

@section('section')
    @include('components.pagetitle', ['title' => $title])

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    @if ($isDataExist)
                        <form action="{{ route('about.update', $data->id) }}" method="POST" id="aboutForm">
                            @csrf
                            @method('PUT')
                            <div class="mb-3">
                                <label for="dark" class="form-label">About me</label>
                                <textarea id="dark" cols="30" rows="10" name="about">{!! $data->about !!}</textarea>
                            </div>
                            <div class="mb-3">
                                <label for="address" class="form-label">Address</label>
                                <input type="text" class="form-control" id="address" name="address"
                                    value="{{ $data->address }}">
                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    @else
                        <form action="{{ route('about.post') }}" method="POST" id="aboutForm">
                            @csrf
                            <div class="mb-3">
                                <label for="dark" class="form-label">About me</label>
                                <textarea id="dark" cols="30" rows="10" name="about"></textarea>
                            </div>
                            <div class="mb-3">
                                <label for="address" class="form-label">Address</label>
                                <input type="text" class="form-control" id="address" name="address">
                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection

@section('style')
    <style>
        .tox .tox-promotion {
            display: none !important;
        }
    </style>
@endsection

@section('script')
    <script src="{{ asset('/dist/assets/extensions/tinymce/tinymce.min.js') }}"></script>
    <script src="{{ asset('/dist/assets/static/js/pages/tinymce.js') }}"></script>
@endsection
