@extends('layouts.layout')

@section('section')
    @include('components.pagetitle', ['title' => $title])

    <div class="card">
        <div class="card-body">
            <div class="mb-4 w-100 d-flex justify-content-end">
                <button type="button" data-bs-toggle="modal" data-bs-target="#statusModal" class="btn btn-primary ">Add
                    Status</button>
            </div>
            <div class="table-responsive">
                <table class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Status</th>
                            <th scope="col" class="text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if ($data->count() == 0)
                            <tr>
                                <td colspan="3" class="text-center">No Data Found.</td>
                            </tr>
                        @else
                            @foreach ($data as $item)
                                <tr>
                                    <th scope="row">{{ $loop->iteration }}</th>
                                    <td>{{ $item->title }}</td>
                                    <td class="d-flex justify-content-center">
                                        <a class=" btn btn-danger"
                                            href="{{ route('WorkStatus.delete', $item->id) }}"
                                            data-confirm-delete="true">Delete</a>
                                    </td>
                                </tr>
                            @endforeach
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="modal fade" id="statusModal" tabindex="-1" aria-labelledby="statusModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <form method="POST" action="{{ route('WorkStatus.store') }}" class="modal-content">
                @csrf
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="statusModalLabel">Add status</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <div class="mb-3">
                            <label for="title" class="form-label">Status</label>
                            <input type="text" class="form-control" id="title" name="title">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
            </form>
        </div>
    </div>
@endsection
