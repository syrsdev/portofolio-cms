@extends('layouts.layout')

@section('section')
    @include('components.pagetitle', ['title' => $title])

    <div class="card">
        <div class="card-body">
            <div class="mb-4 w-100 d-flex justify-content-end">
                <a href="{{ route('certificates.create') }}" class="btn btn-primary ">Add Certificates</a>
            </div>
            <div class="table-responsive">
                <table class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Title</th>
                            <th scope="col">Image</th>
                            <th scope="col">File</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if ($data->count() == 0)
                            <tr>
                                <td colspan="5" class="text-center">No Data Found.</td>
                            </tr>
                        @else
                            @foreach ($data as $item)
                                <tr>
                                    <th scope="row">{{ $loop->iteration }}</th>
                                    <td>{{ $item->title }}</td>
                                    <td><img src="{{ asset($item->image) }}" alt="{{ $item->image }}" width="150"
                                            style="object-fit: contain"></td>
                                    <td><iframe src="{{ asset($item->file) }}" width="150" frameborder="0"></iframe></td>
                                    <td>
                                        @include('components.actionbtn', [
                                            'edit' => route('certificates.edit', $item->id),
                                            'id' => $item->id,
                                            'delete' => route('certificates.destroy', $item->id),
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
