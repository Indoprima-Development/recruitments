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
                                    <div class="rounded-circle overflow-hidden me-6">
                                        <img src="{{ asset('package/dist/images/profile/user-1.jpg') }}" alt=""
                                            width="40" height="40">
                                    </div>
                                    <h5 class="fw-semibold mb-0 fs-5 text-white">Recruitment PT. Indoprima Gemilang</h5>
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
                                    <img src="{{ asset('package/dist/images/backgrounds/welcome-bg.svg') }}" alt=""
                                        class="img-fluid">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4 d-flex align-items-stretch">
                <div class="card bg-secondary text-white w-100 card-hover">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <i class="ti ti-user display-6"></i>
                            <div class="ms-auto">
                                <i class="ti ti-arrow-right fs-8"></i>
                            </div>
                        </div>
                        <div class="mt-4">
                            <h4 class="card-title mb-1 text-white">
                                CV
                            </h4>
                            <h6 class="card-text fw-normal text-white-50">
                                Manage your curriculum vitae
                            </h6>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-12 col-12 d-flex align-items-strech">
                <div class="card bg-warning w-100">
                    <div class="card-body p-4">
                        <h3 class="text-white">Test Open</h3>
                        <p class="card-subtitle mb-3 text-white">Choose the selection you want to take.</p>
                        <div class="row">
                            @forelse ($data['projects'] as $d)
                                <div class="co-sm-6 col-md-3">
                                    <div class="card overflow-hidden mb-4 mb-md-0 shadow-none border bg-white card-hover">
                                        <div class="p-9 text-center">
                                            <div class="d-flex align-items-center mt-3 justify-content-center">
                                                <h5 class="mb-0">
                                                    <span class="text-primary fw-bold">{{ $d->project_name }}</span>
                                                </h5>
                                            </div>
                                            <button projectId="{{ EncryptData($d->id) }}"
                                                class="btn btn-outline-primary text-primary w-100 mt-3 btnConfirm">Take Test</button>
                                        </div>
                                    </div>
                                </div>
                            @empty
                            <div class="co-sm-12 col-md-12">
                                <div class="card overflow-hidden mb-4 mb-md-0 shadow-none border bg-light-primary text-center">
                                    <h5 class="mb-2 mt-2 text-warning">There is no test open</h5>
                                </div>
                            </div>
                            @endforelse
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
