@extends('layouts.layout')

@section('section')
    @include('components.pagetitle', ['title' => $title])

    <div class="card">
        <div class="card-body">
            <div class="mb-4 w-100 d-flex justify-content-end">
                <a href="{{ route('skills.create') }}" class="btn btn-primary ">Add Skill</a>
            </div>
            <div class="table-responsive">
                <table class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Image logo</th>
                            <th scope="col">Skill</th>
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
                                    <td><img width="200" src='{{ asset("/images/skills/". $item->image)}}' alt="{{ $item->image }}"></td>
                                    <td>{{ $item->skill }}</td>
                                    <td>
                                        @include('components.actionbtn', [
                                            'edit' => route('skills.edit', $item->id),
                                            'id' => $item->id,
                                            'delete' => route('skills.destroy', $item->id),
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
