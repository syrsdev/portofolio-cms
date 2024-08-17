@extends('layouts.layout')

@section('section')
    @include('components.pagetitle', ['title' => $title])

    <div class="card">
        <div class="card-body">
            <div class="mb-4 w-100 d-flex justify-content-end">
                <a href="{{ route('WorkExperience.create') }}" class="btn btn-primary ">Add Experience</a>
            </div>
            <div class="table-responsive">
                <table class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Positon</th>
                            <th scope="col">Company</th>
                            <th scope="col">Location</th>
                            <th scope="col">Date</th>
                            <th scope="col">status</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if ($data->count() == 0)
                            <tr>
                                <td colspan="8" class="text-center">No Data Found.</td>
                            </tr>
                        @else
                            @foreach ($data as $item)
                                <tr>
                                    <th scope="row">{{ $loop->iteration }}</th>
                                    <td>{{ $item->position }}</td>
                                    <td>{{ $item->company }}</td>
                                    <td>{{ $item->location_type . ' - ' . $item->location }}</td>
                                    <td>{{ $item->start_date . ' - ' }}{{ $item->end_date == null ? 'Present' : $item->end_date }}
                                    </td>
                                    <td>{{ $item->status->title }}</td>
                                    <td>
                                        @include('components.actionbtn', [
                                            'edit' => route('WorkExperience.edit', $item->id),
                                            'id' => $item->id,
                                            'delete' => route('WorkExperience.delete', $item->id),
                                        ])
                                    </td>
                                </tr>
                            @endforeach
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
