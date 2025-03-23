@extends('layouts.layout')

@section('section')
    @include('components.pagetitle', ['title' => $title])

    <div class="page-content">
        <section class="row">
            <div class="col-12 col-lg-9">
                <div class="row">
                    <div class="col">
                        <div class="card">
                            <div class="px-4 card-body py-4-5">
                                <div class="row">
                                    <div class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start ">
                                        <div class="mb-2 stats-icon purple">
                                            <i class="iconly-boldShow"></i>
                                        </div>
                                    </div>
                                    <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                                        <h6 class="font-semibold text-muted">Projects</h6>
                                        <h6 class="mb-0 font-extrabold">{{ $allProjects }}</h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="card">
                            <div class="px-4 card-body py-4-5">
                                <div class="row">
                                    <div class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start ">
                                        <div class="mb-2 stats-icon blue">
                                            <i class="iconly-boldProfile"></i>
                                        </div>
                                    </div>
                                    <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                                        <h6 class="font-semibold text-muted">My skills</h6>
                                        <h6 class="mb-0 font-extrabold">{{ $allCertificates }}</h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="card">
                            <div class="px-4 card-body py-4-5">
                                <div class="row">
                                    <div class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start ">
                                        <div class="mb-2 stats-icon green">
                                            <i class="iconly-boldAdd-User"></i>
                                        </div>
                                    </div>
                                    <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                                        <h6 class="font-semibold text-muted">My Certificates</h6>
                                        <h6 class="mb-0 font-extrabold">{{ $allCertificates }}</h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4>Latest Work Experience</h4>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-hover table-lg">
                                        <thead>
                                            <tr>
                                                <th>Position</th>
                                                <th>Company</th>
                                                <th>Status</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @if ($experience->count() == 0)
                                                <tr>
                                                    <td colspan="3" class="text-center">No Data</td>
                                                </tr>
                                            @else
                                                @foreach ($experience as $item)
                                                    <tr>
                                                        <td class="col-auto">
                                                            {{ $item->position }}
                                                        </td>
                                                        <td class="col-auto">
                                                            {{ $item->company }}
                                                        </td>
                                                        <td class="col-auto">
                                                            {{ $item->status->title }}
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            @endif
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-lg-3">
                <div class="card">
                    <div class="px-4 py-4 card-body">
                        <div class="d-flex align-items-center">
                            <div class="avatar avatar-xl">
                                <img src="./dist/assets/compiled/jpg/1.jpg" alt="Face 1">
                            </div>
                            <div class="ms-3 name text-truncate">
                                <h5 class="font-bold text-truncate">{{ Auth::user()->name }}</h5>
                                <h6 class="mb-0 text-muted text-truncate">{{ Auth::user()->email }}</h6>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header">
                        <h4>Educations</h4>
                    </div>
                    <div class="pb-4 card-content">
                        <div class="px-4 py-3">
                            @if ($education->count() == 0)
                                <p>No Data</p>
                            @else
                                @foreach ($education as $item)
                                    <div class="mb-5">
                                        <h5 class="fs-5 fw-bold">{{ $item->name }}</h5>
                                        <p class="mb-0">{{ $item->start_date }} -
                                            {{ $item->end_date == null ? 'present' : $item->end_date }}</p>
                                    </div>
                                @endforeach
                            @endif
                        </div>
                        <div class="px-4">
                            <a href="{{ route('educations.create') }}"
                                class='mt-3 font-bold btn btn-block btn-xl btn-outline-primary'>add education</a>
                        </div>
                    </div>
                </div>

            </div>
        </section>
    </div>
@endsection
