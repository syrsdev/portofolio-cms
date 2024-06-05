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
                                        <h6 class="mb-0 font-extrabold">112.000</h6>
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
                                        <h6 class="mb-0 font-extrabold">183.000</h6>
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
                                <h4>Latest Comments</h4>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-hover table-lg">
                                        <thead>
                                            <tr>
                                                <th>Name</th>
                                                <th>Comment</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td class="col-3">
                                                    <div class="d-flex align-items-center">
                                                        <div class="avatar avatar-md">
                                                            <img src="./dist/assets/compiled/jpg/5.jpg">
                                                        </div>
                                                        <p class="mb-0 font-bold ms-3">Si Cantik</p>
                                                    </div>
                                                </td>
                                                <td class="col-auto">
                                                    <p class="mb-0 ">Congratulations on your graduation!</p>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="col-3">
                                                    <div class="d-flex align-items-center">
                                                        <div class="avatar avatar-md">
                                                            <img src="./dist/assets/compiled/jpg/2.jpg">
                                                        </div>
                                                        <p class="mb-0 font-bold ms-3">Si Ganteng</p>
                                                    </div>
                                                </td>
                                                <td class="col-auto">
                                                    <p class="mb-0 ">Wow amazing design! Can you make another
                                                        tutorial for
                                                        this design?</p>
                                                </td>
                                            </tr>
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
                                <h5 class="font-bold text-truncate">{{Auth::user()->name}}</h5>
                                <h6 class="mb-0 text-muted text-truncate">{{Auth::user()->email}}</h6>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header">
                        <h4>Recent Messages</h4>
                    </div>
                    <div class="pb-4 card-content">
                        <div class="px-4 py-3 recent-message d-flex">
                            <div class="avatar avatar-lg">
                                <img src="./dist/assets/compiled/jpg/4.jpg">
                            </div>
                            <div class="name ms-4">
                                <h5 class="mb-1">Hank Schrader</h5>
                                <h6 class="mb-0 text-muted">@johnducky</h6>
                            </div>
                        </div>
                        <div class="px-4 py-3 recent-message d-flex">
                            <div class="avatar avatar-lg">
                                <img src="./dist/assets/compiled/jpg/5.jpg">
                            </div>
                            <div class="name ms-4">
                                <h5 class="mb-1">Dean Winchester</h5>
                                <h6 class="mb-0 text-muted">@imdean</h6>
                            </div>
                        </div>
                        <div class="px-4 py-3 recent-message d-flex">
                            <div class="avatar avatar-lg">
                                <img src="./dist/assets/compiled/jpg/1.jpg">
                            </div>
                            <div class="name ms-4">
                                <h5 class="mb-1">John Dodol</h5>
                                <h6 class="mb-0 text-muted">@dodoljohn</h6>
                            </div>
                        </div>
                        <div class="px-4">
                            <button class='mt-3 font-bold btn btn-block btn-xl btn-outline-primary'>Start
                                Conversation</button>
                        </div>
                    </div>
                </div>
                
            </div>
        </section>
    </div>
@endsection
