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
                                <label for="full" class="form-label">About me</label>
                                <!-- Quill Editor Container -->
                                <div id="full">{!! $data->about !!}</div>
                                <!-- Hidden Input Field -->
                                <input type="hidden" name="about" id="aboutInput">
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
                                <label for="full" class="form-label">About me</label>
                                <!-- Quill Editor Container -->
                                <div id="full"></div>
                                <!-- Hidden Input Field -->
                                <input type="hidden" name="about" id="aboutInput">
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
    <link rel="stylesheet" href="{{ asset('/dist/assets/extensions/quill/quill.snow.css') }}">
    <link rel="stylesheet" href="{{ asset('/dist/assets/extensions/quill/quill.bubble.css') }}">
@endsection

@section('script')
    <script src="{{ asset('/dist/assets/extensions/quill/quill.min.js') }}"></script>
    <script>
        // Initialize Quill editor
        var quill = new Quill('#full', {
            theme: 'snow'
        });

        // Fill Quill editor with initial content if editing existing data
        @if ($isDataExist)
            quill.root.innerHTML = `{!! $data->about !!}`;
        @endif

        // Handle form submission
        document.getElementById('aboutForm').addEventListener('submit', function () {
            // Copy content from Quill editor to hidden input
            document.getElementById('aboutInput').value = quill.root.innerHTML;
        });
    </script>
@endsection
