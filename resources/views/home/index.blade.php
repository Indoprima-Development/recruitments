@extends('default')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card bg-light-info shadow-none position-relative overflow-hidden">
                <div class="card-body px-4 py-3">
                    <div class="row align-items-center">
                        <div class="col-9">
                            <h4 class="fw-semibold mb-8">Recruitment PT. Indoprima Gemilang</h4>
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"></li>
                                </ol>
                            </nav>
                        </div>
                        <div class="col-3">
                            <div class="text-center mb-n5">
                                <img src="{{asset('package/dist/images/breadcrumb/ChatBc.png')}}" alt="" class="img-fluid mb-n4">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-12 col-12 d-flex align-items-strech">
            <div class="card w-100">
                <div class="card-body p-4">
                    <h5 class="card-title fw-semibold">Recruitment Test</h5>
                    <p class="card-subtitle mb-3">Choose the selection you want to take.</p>
                    <div class="row">
                        @foreach($data["projects"] as $d)
                        <div class="co-sm-6 col-md-3">
                            <div class="card overflow-hidden mb-4 mb-md-0 shadow-none border bg-light-primary">
                                <div class="p-9 text-center">
                                    <div class="d-flex align-items-center mt-3 justify-content-center">
                                        <h5 class="mb-0">
                                            <span class="text-dark fw-bold">{{$d->project_name}}</span>
                                        </h5>
                                    </div>
                                    <button projectId="{{EncryptData($d->id)}}" class="btn btn-primary w-100 mt-3 btnConfirm">Take Test</button>
                                </div>
                            </div>
                        </div>
                        @endforeach
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
                    window.location = "{{url('examination')}}/" + project_id
                }
            });
        });
    });
</script>
@endsection