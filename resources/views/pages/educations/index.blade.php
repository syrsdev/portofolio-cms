@extends('layouts.layout')

@section('section')
    @include('components.pagetitle', ['title' => $title])

    <div class="card">
        <div class="card-body">
            <div class="mb-4 w-100 d-flex justify-content-end">
                <a href="{{ route('educations.create') }}" class="btn btn-primary ">Add Educations</a>
            </div>
            <div class="table-responsive">
                <table class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Name</th>
                            <th scope="col">Start Date</th>
                            <th scope="col">End Date</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if ($data->count() == 0)
                            <tr>
                                <td colspan="4" class="text-center">No Data Found.</td>
                            </tr>
                        @else
                            @foreach ($data as $item)
                                <tr>
                                    <th scope="row">{{ $loop->iteration }}</th>
                                    <td>{{ $item->name }}</td>
                                    <td>{{ $item->start_date }}</td>
                                    <td>{{ $item->end_date == null ? 'Present' : $item->end_date }}</td>
                                    <td>
                                        @include('components.actionbtn', [
                                            'edit' => route('educations.edit', $item->id),
                                            'id' => $item->id,
                                            'delete' => route('educations.destroy', $item->id),
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
