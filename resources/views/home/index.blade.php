@extends('default')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-8 d-flex align-items-stretch">
                <div class="card w-100 bg-primary overflow-hidden shadow-none card-hover">
                    <div class="card-body position-relative">
                        <div class="row">
                            <div class="col-sm-7">
                                <div class="d-flex align-items-center mb-7">
                                    <h5 class="fw-semibold mb-0 fs-6 text-white">Recruitment PT. Indoprima Gemilang</h5>
                                </div>
                                <div class="d-flex align-items-center">
                                    <div class="border-end pe-4 border-muted border-opacity-10">
                                        <h3 class="mb-1 fw-semibold fs-8 d-flex align-content-center">100%</h3>
                                        <p class="mb-0 text-dark">
                                            Profile Completeness</p>
                                    </div>
                                    <div class="ps-4">
                                        <h3 class="mb-1 fw-semibold fs-8 d-flex align-content-center">35</h3>
                                        <p class="mb-0 text-dark">Taking Test</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-5">
                                <div class="welcome-bg-img mb-n7 text-end">
                                    <img src="{{ asset('package/dist/images/backgrounds/welcome-bg2.png') }}" alt=""
                                        class="img-fluid">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card bg-dark-subtle hover-img">
                    <div class="card-body p-4 text-center border-bottom">
                        @if (Auth::user()->photo != "")
                        <img src="{{ asset(Auth::user()->photo) }}" alt=""
                            class="rounded-circle mb-3" width="80" height="80">
                        @else
                        <img src="{{ asset('package/dist/images/profile/user-1.jpg') }}" alt=""
                            class="rounded-circle mb-3" width="80" height="80">
                        @endif
                        <h5 class="fw-semibold mb-0 fs-5 text-white">{{ Auth::user()->name }}</h5>
                        <span class="text-dark fs-2">{{Auth::user()->ktp}}</span>
                    </div>
                    <a href="{{url('forms')}}" class="px-2 py-2 list-unstyled d-flex align-items-center justify-content-center mb-0">

                        <h6 class="card-text fw-normal text-white">
                            Manage your curriculum vitae
                        </h6>

                        <i class="ti ti-arrow-right fs-8 text-white"></i>
                    </a>
                </div>
            </div>

            <div class="col-xl-12 col-md-12 d-flex align-items-strech">
                <div class="card w-100 bg-light-primary">
                    <div class="card-body">
                        <div class="d-sm-flex d-block align-items-center justify-content-between mb-7">
                            <div class="mb-3 mb-sm-0">
                                <h5 class="card-title fw-semibold">Data Pilihan Recruitment</h5>
                                <p class="card-subtitle mb-0">Pilih salah satu test recruitment yang ingin anda ikuti</p>
                            </div>
                        </div>
                        <div class="table-responsive">
                            <table class="table align-middle text-nowrap mb-0">
                                <thead>
                                    <tr class="text-muted fw-semibold text-center">
                                        <th scope="col" class="ps-0">Assigned</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody class="border-top">
                                    @forelse ($data['projects'] as $d)
                                        <tr>
                                            <td class="text-center">
                                                <div class="align-items-center">
                                                    <div>
                                                        <h6 class="fw-semibold mb-1">{{ $d->project_name }}</h6>
                                                        <p class="text-muted">Web Designer</p>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="text-center">
                                                <button projectId="{{ EncryptData($d->id) }}"
                                                    class="btn btn-outline-primary text-primary mt-3 btnConfirm">Take
                                                    Test</button>
                                            </td>
                                        </tr>
                                    @empty
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>


        </div>
    </div>
@endsection


@section('addJs')
    <script>
        $(document).ready(function() {
            $(".btnConfirm").click(function() {
                let project_id = $(this).attr('projectId')
                Swal.fire({
                    title: "Are you sure?",
                    text: "To take this test",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#5D87FF",
                    cancelButtonColor: "#d33",
                    confirmButtonText: "Yes"
                }).then((result) => {
                    if (result.isConfirmed) {
                        window.location = "{{ url('examination') }}/" + project_id
                    }
                });
            });
        });
    </script>
@endsection
