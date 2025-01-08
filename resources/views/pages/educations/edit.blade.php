@extends('layouts.layout')

@section('section')
    @include('components.pagetitle', ['title' => $title])

    <div class="card">
        <div class="card-body">
            <form method="POST" action="{{ route('educations.update', $data->id) }}">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label for="name" class="form-label">Education Name</label>
                    <input type="text" class="form-control" id="name" name="name" placeholder="Enter name"
                        value="{{ $data->name }}">
                </div>
                <div class="mb-3">
                    <label for="major" class="form-label">Major</label>
                    <input type="text" class="form-control" id="major" name="major" placeholder="Enter major"
                        value="{{ $data->major }}">
                </div>
                <div class="mb-3">
                    <label for="start_date" class="form-label">Start Date</label>
                    <input type="month" class="form-control" id="start_date" name="start_date"
                        value="{{ $data->start_date }}">
                </div>
                <div class="mb-3">
                    <label for="end_date" class="form-label">End Date</label>
                    <input type="month" class="form-control" id="end_date" name="end_date" value="{{ $data->end_date }}">
                </div>
                <div class="mb-5 form-check">
                    <input class="form-check-input" type="checkbox" value="" id="current_date"
                        {{ $data->end_date == null ? 'checked' : '' }}>
                    <label class="form-check-label" for="current_date">
                        current education
                    </label>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
@endsection
