@extends('default')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-lg-6 text-center">
            <h2 class="fw-bolder mb-0 fs-8 lh-base">Thank You</h2>
        </div>
    </div>
    <div class="d-flex align-items-center justify-content-center mb-3">
        <span class="text-dark fw-bolder text-capitalize me-3">You have completed the test</span>
    </div>
    <div class="row">
        <div class="col-sm-12 col-lg-12 text-center">
            <div class="card">
                <div class="card-body">
                    @if(false)
                    <span class="mt-2 badge fw-semibold py-1 bg-primary-subtle text-primary">LOLOS</span>
                    <span class="mt-2 badge fw-semibold py-1 bg-danger-subtle text-danger">TIDAK LOLOS</span>
                    @endif
                    <div class="my-4">
                        <img src="{{asset('package/dist/images/backgrounds/gold.png')}}" alt="" class="img-fluid" width="80" height="80">
                    </div>

                    @if(false)
                    <div class="mb-3 text-center">
                        <h5 class="fw-bolder fs-6 mb-0">Score</h5>
                        <h2 class="fw-bolder fs-12 ms-2 mb-0">{{$data['examTransaction']->score}}</h2>
                    </div>
                    @endif
                    <a href="{{url('/')}}" class="btn btn-primary fw-bolder rounded-2 py-6 w-100 text-capitalize">Exit</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection