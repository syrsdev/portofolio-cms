@extends('layouts.layout')

@section('section')
    @include('components.pagetitle', ['title' => $title])
    <!-- Button trigger modal -->
    @if ($isDataExist == 0)
        <button type="button" class="mb-5 btn btn-success" data-bs-toggle="modal" data-bs-target="#exampleModal">
            Add Contacts Data
        </button>
    @else
        <button type="button" class="mb-5 btn btn-warning" data-bs-toggle="modal" data-bs-target="#editModal">
            Edit Contacts Data
        </button>
    @endif

    <div class="row">
        <div class="col-4">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex" style="gap: 1rem">
                        <div>
                            <i class="bi bi-whatsapp fs-1"></i>
                        </div>
                        <div class="flex flex-column d-flex w-100">
                            <h4>Whatsapp</h4>
                            <input type="text" disabled class="form-control " value="{{ $telp }}">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-4">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex" style="gap: 1rem">
                        <div>
                            <i class="bi bi-linkedin fs-1"></i>
                        </div>
                        <div class="flex flex-column d-flex w-100">
                            <h4>Linkedin</h4>
                            <input type="text" disabled class="form-control " value="{{ $linkedin }}">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-4">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex" style="gap: 1rem">
                        <div>
                            <i class="bi bi-envelope fs-1"></i>
                        </div>
                        <div class="flex flex-column d-flex w-100">
                            <h4>Email</h4>
                            <input type="text" disabled class="form-control " value="{{ $email }}">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-4">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex" style="gap: 1rem">
                        <div>
                            <i class="bi bi-instagram fs-1"></i>
                        </div>
                        <div class="flex flex-column d-flex w-100">
                            <h4>Instagram</h4>
                            <input type="text" disabled class="form-control " value="{{ $instagram }}">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-4">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex" style="gap: 1rem">
                        <div>
                            <i class="bi bi-github fs-1"></i>
                        </div>
                        <div class="flex flex-column d-flex w-100">
                            <h4>Github</h4>
                            <input type="text" disabled class="form-control " value="{{ $github }}">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-4">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex" style="gap: 1rem">
                        <div>
                            <i class="bi bi-spotify fs-1"></i>
                        </div>
                        <div class="flex flex-column d-flex w-100">
                            <h4>Spotify</h4>
                            <input type="text" disabled class="form-control " value="{{ $spotify }}">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <form method="POST" action="{{ route('contacts.store') }}" class="modal-content">
                @csrf
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Add Contact</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="email" class="col-form-label">Email:</label>
                        <input type="text" class="form-control" id="email" name="email">
                    </div>
                    <div class="mb-3">
                        <label for="whatsapp" class="col-form-label">Whatsapp:</label>
                        <input type="text" class="form-control" id="whatsapp" name="telp">
                    </div>
                    <div class="mb-3">
                        <label for="linkedin" class="col-form-label">Linkedin:</label>
                        <input type="text" class="form-control" id="linkedin" name="linkedin">
                    </div>
                    <div class="mb-3">
                        <label for="instagram" class="col-form-label">Instagram:</label>
                        <input type="text" class="form-control" id="instagram" name="instagram">
                    </div>
                    <div class="mb-3">
                        <label for="github" class="col-form-label">Github:</label>
                        <input type="text" class="form-control" id="github" name="github">
                    </div>
                    <div class="mb-3">
                        <label for="spotify" class="col-form-label">Spotify:</label>
                        <input type="text" class="form-control" id="spotify" name="spotify">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
            </form>
        </div>
    </div>
    <!-- Modal EDIT-->
    <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <form method="POST" action="{{ route('contacts.update', $id) }}" class="modal-content">
                @csrf
                @method('PUT')s
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="editModalLabel">Edit Contact</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="email" class="col-form-label">Email:</label>
                        <input type="text" class="form-control" id="email" name="email"
                            value="{{ $email }}">
                    </div>
                    <div class="mb-3">
                        <label for="whatsapp" class="col-form-label">Whatsapp:</label>
                        <input type="text" class="form-control" id="whatsapp" name="telp"
                            value="{{ $telp }}">
                    </div>
                    <div class="mb-3">
                        <label for="linkedin" class="col-form-label">Linkedin:</label>
                        <input type="text" class="form-control" id="linkedin" name="linkedin"
                            value="{{ $linkedin }}">
                    </div>
                    <div class="mb-3">
                        <label for="instagram" class="col-form-label">Instagram:</label>
                        <input type="text" class="form-control" id="instagram" name="instagram" value="{{ $instagram }}">
                    </div>
                    <div class="mb-3">
                        <label for="github" class="col-form-label">Github:</label>
                        <input type="text" class="form-control" id="github" name="github" value="{{ $github }}">
                    </div>
                    <div class="mb-3">
                        <label for="spotify" class="col-form-label">Spotify:</label>
                        <input type="text" class="form-control" id="spotify" name="spotify" value="{{ $spotify }}">
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
