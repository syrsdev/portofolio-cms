@extends('layouts.layout')

@section('section')
    @include('components.pagetitle', ['title' => $title])

    <div class="card">
        <div class="card-body">
            <form method="POST" action="{{ route('WorkExperience.store') }}" id="form">
                @csrf
                <div class="mb-3">
                    <label for="position" class="form-label">Position</label>
                    <input type="text" class="form-control" id="position" name="position">
                </div>
                <div class="mb-3">
                    <label for="company" class="form-label">Company Name</label>
                    <input type="text" class="form-control" id="company" name="company">
                </div>
                <div class="mb-3">
                    <label for="location" class="form-label">Location</label>
                    <input type="text" class="form-control" id="location" name="location">
                </div>
                <div class="mb-3">
                    <label for="location_type" class="form-label">Location Type</label>
                    <select class="form-select" name="location_type" id="location_type">
                        <option value="onsite" selected>onsite</option>
                        <option value="hybrid">hybrid</option>
                        <option value="remote">remote</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="start_date" class="form-label">Start date</label>
                    <input type="date" class="form-control" id="start_date" name="start_date">
                </div>
                <div class="mb-3">
                    <label for="end_date" class="form-label">End date</label>
                    <input type="date" class="form-control" id="end_date" name="end_date">
                </div>
                <div class="mb-3">
                    <label for="status_id" class="form-label">status</label>
                    <select class="form-select" name="status_id" id="status_id">
                        @foreach ($status as $item)
                            <option value="{{ $item->id }}">{{ $item->title }}</option>
                        @endforeach
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
@endsection
