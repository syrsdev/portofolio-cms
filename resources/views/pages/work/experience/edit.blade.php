@extends('layouts.layout')

@section('section')
    @include('components.pagetitle', ['title' => $title])

    <div class="card">
        <div class="card-body">
            <form method="POST" action="{{ route('WorkExperience.update', $data->id) }}" id="form">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label for="position" class="form-label">Position</label>
                    <input type="text" class="form-control" id="position" name="position" value="{{ $data->position }}">
                </div>
                <div class="mb-3">
                    <label for="company" class="form-label">Company Name</label>
                    <input type="text" class="form-control" id="company" name="company" value="{{ $data->company }}">
                </div>
                <div class="mb-3">
                    <label for="location" class="form-label">Location</label>
                    <input type="text" class="form-control" id="location" name="location" value="{{ $data->location }}">
                </div>
                <div class="mb-3">
                    <label for="location_type" class="form-label">Location Type</label>
                    <select class="form-select" name="location_type" id="location_type">
                        <option value="onsite" {{ $data->location_type == 'onsite' ? 'selected' : '' }}>onsite</option>
                        <option value="hybrid" {{ $data->location_type == 'hybrid' ? 'selected' : '' }}>hybrid</option>
                        <option value="remote" {{ $data->location_type == 'remote' ? 'selected' : '' }}>remote</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="start_date" class="form-label">Start date</label>
                    <input type="month" class="form-control" id="start_date" name="start_date"
                        value="{{ $data->start_date }}">
                </div>
                <div class="mb-3">
                    <label for="end_date" class="form-label">End date</label>
                    <input type="month" class="form-control" id="end_date" name="end_date" value="{{ $data->end_date }}">
                </div>
                <div class="mb-3 form-check">
                    <input class="form-check-input" type="checkbox" value="" id="current_date"
                        {{ $data->end_date == null ? 'checked' : '' }}>
                    <label class="form-check-label" for="current_date">
                        current education
                    </label>
                </div>
                <div class="mb-3">
                    <label for="status_id" class="form-label">status</label>
                    <select class="form-select" name="status_id" id="status_id">
                        @foreach ($status as $item)
                            <option value="{{ $item->id }}" {{ $data->status_id == $item->id ? 'selected' : '' }}>
                                {{ $item->title }}</option>
                        @endforeach
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
@endsection
