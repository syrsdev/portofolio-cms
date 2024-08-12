@extends('layouts.layout')

@section('section')
    @include('components.pagetitle', ['title' => $title])

    <div class="card">
        <div class="card-body">
            <div class="mb-4 w-100 d-flex justify-content-end">
                <a href="{{ route('projects.create') }}" class="btn btn-primary ">Add Projects</a>
            </div>
            <div class="table-responsive">
                <table class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Image Project</th>
                            <th scope="col">Title</th>
                            <th scope="col">Live Link</th>
                            <th scope="col">Github Link</th>
                            <th scope="col">Figma Link</th>
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
                                    <td><img width="200" src='{{ asset($item->image) }}' alt="{{ $item->image }}"></td>
                                    <td>{{ $item->title }}</td>
                                    <td>{{ $item->link }}</td>
                                    <td>{{ $item->github_link }}</td>
                                    <td>{{ $item->figma_link }}</td>
                                    <td>
                                        <a href="{{ route('projectSkills.index', $item->id) }}"
                                            class="mb-2 w-100 btn btn-secondary">skills</a>
                                        @include('components.actionbtn', [
                                            'edit' => route('projects.edit', $item->id),
                                            'id' => $item->id,
                                            'delete' => route('projects.destroy', $item->id),
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
