@extends('layouts.layout')

@section('section')
    @include('components.pagetitle', ['title' => $title])

    <div class="card">
        <div class="card-body">
            <div class="mb-4 w-100 d-flex justify-content-end">
                <button type="button" data-bs-toggle="modal" data-bs-target="#skillsModal" class="btn btn-primary ">Add
                    Skills</button>
            </div>
            <div class="table-responsive">
                <table class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Skill</th>
                            <th scope="col" class="text-center">Action</th>
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
                                    <td>{{ $item->skill->skill }}</td>
                                    <td class="d-flex justify-content-center">
                                        <a class=" btn btn-danger" href="{{ route('projectSkills.delete', [$item->project_id, $item->id]) }}"
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

    <div class="modal fade" id="skillsModal" tabindex="-1" aria-labelledby="skillsModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <form method="POST" action="{{ route('projectSkills.post', $projectID) }}" class="modal-content">
                @csrf
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="skillsModalLabel">Add skills</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <div class="mb-3">
                            <label for="skill" class="form-label">Skills</label>
                            <div class="form-group">
                                <select class="choices form-select multiple-remove" multiple="multiple" name="skill_id[]">
                                    @foreach ($skills as $item)
                                        <option value="{{ $item->id }}">{{ $item->skill }}</option>
                                    @endforeach
                                </select>
                            </div>
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

@section('style')
    <link rel="stylesheet" href="{{ asset('/dist/assets/extensions/toastify-js/src/toastify.css') }}">
    <link rel="stylesheet" href="{{ asset('/dist/assets/extensions/choices.js/public/assets/styles/choices.css') }}">
@endsection

@section('script')
    <script src="{{ asset('/dist/assets/extensions/choices.js/public/assets/scripts/choices.js') }}"></script>
    <script src="{{ asset('/dist/assets/static/js/pages/form-element-select.js') }}"></script>
@endsection
