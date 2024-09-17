@extends('layouts.default')

@section('cardClass', 'border-1 border-primary')

@section('content')
    <div class="card bg-light-info shadow-none position-relative overflow-hidden">
        <div class="card-body px-4 py-3">
            <div class="row align-items-center">
                <div class="col-9">
                    <h4 class="fw-semibold mb-8">Data Recruitment</h4>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a class="text-muted " href="./index.html">Dashboard</a></li>
                            <li class="breadcrumb-item" aria-current="page">Data Recruitment</li>
                        </ol>
                    </nav>
                </div>

                <div class="col-3 text-end">
                    <a href="{{ url('ptkformtransactions', "all") }}/data" class="btn btn-outline-primary bg-white"><i class="ti ti-box"></i> All Data</a>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-sm-6 col-lg-3 col-xl-3">
            <a href="{{ url('ptkformtransactions', 0) }}/data"
                class="p-4 text-center border-1 border-primary card shadow-none rounded-2 card-hover">
                <img src="{{ asset('package/dist/images/svgs/icon-user-male.svg') }}" width="50" height="50"
                    class="mb-6 mx-auto" alt="">
                <p class="fw-semibold text-primary mb-1">Applicant</p>
                <h4 class="fw-semibold text-primary mb-0">{{ $dataResults[0] }}</h4>
            </a>
        </div>
        <div class="col-sm-6 col-lg-3 col-xl-3">
            <a href="{{ url('ptkformtransactions', 1) }}/data"
                class="p-4 text-center border-1 border-warning card-hover card shadow-none rounded-2">
                <img src="{{ asset('package/dist/images/svgs/icon-briefcase.svg') }}" width="50" height="50"
                    class="mb-6 mx-auto" alt="">
                <p class="fw-semibold text-warning mb-1">Interview HC</p>
                <h4 class="fw-semibold text-warning mb-0">{{ $dataResults[1] }}</h4>
            </a>
        </div>
        <div class="col-sm-6 col-lg-3 col-xl-3">
            <a href="{{ url('ptkformtransactions', 2) }}/data"
                class="p-4 text-center card-hover border-1 border-info card shadow-none rounded-2">
                <img src="{{ asset('package/dist/images/svgs/icon-mailbox.svg') }}" width="50" height="50"
                    class="mb-6 mx-auto" alt="">
                <p class="fw-semibold text-info mb-1">Psikotes</p>
                <h4 class="fw-semibold text-info mb-0">{{ $dataResults[2] }}</h4>
            </a>
        </div>
        <div class="col-sm-6 col-lg-3 col-xl-3">
            <a href="{{ url('ptkformtransactions', 3) }}/data"
                class="p-4 text-center card-hover border-1 border-danger card shadow-none rounded-2">
                <img src="{{ asset('package/dist/images/svgs/icon-favorites.svg') }}" width="50" height="50"
                    class="mb-6 mx-auto" alt="">
                <p class="fw-semibold text-danger mb-1">Interview User</p>
                <h4 class="fw-semibold text-danger mb-0">{{ $dataResults[3] }}</h4>
            </a>
        </div>
        <div class="col-sm-6 col-lg-3 col-xl-3">
            <a href="{{ url('ptkformtransactions', 4) }}/data"
                class="p-4 text-center card-hover border-1 border-success card shadow-none rounded-2">
                <img src="{{ asset('package/dist/images/svgs/icon-speech-bubble.svg') }}" width="50" height="50"
                    class="mb-6 mx-auto" alt="">
                <p class="fw-semibold text-success mb-1">Interview Direksi</p>
                <h4 class="fw-semibold text-success mb-0">{{ $dataResults[4] }}</h4>
            </a>
        </div>
        <div class="col-sm-6 col-lg-3 col-xl-3">
            <a href="{{ url('ptkformtransactions', 5) }}/data"
                class="p-4 text-center card-hover border-1 border-primary card shadow-none rounded-2">
                <img src="{{ asset('package/dist/images/svgs/icon-dd-message-box.svg') }}" width="50" height="50"
                    class="mb-6 mx-auto" alt="">
                <p class="fw-semibold text-primary mb-1">Finalisasi</p>
                <h4 class="fw-semibold text-primary mb-0">{{ $dataResults[5] }}</h4>
            </a>
        </div>
        <div class="col-sm-6 col-lg-3 col-xl-3">
            <a href="{{ url('ptkformtransactions', 6) }}/data"
                class="p-4 text-center card-hover border-1 border-danger card shadow-none rounded-2">
                <img src="{{ asset('package/dist/images/svgs/icon-office-bag.svg') }}" width="50" height="50"
                    class="mb-6 mx-auto" alt="">
                <p class="fw-semibold text-danger mb-1">MCU</p>
                <h4 class="fw-semibold text-danger mb-0">{{ $dataResults[6] }}</h4>
            </a>
        </div>
        <div class="col-sm-6 col-lg-3 col-xl-3">
            <a href="{{ url('ptkformtransactions', 7) }}/data"
                class="p-4 text-center card-hover border-1 border-success card shadow-none rounded-2">
                <img src="{{ asset('package/dist/images/svgs/success.svg') }}" width="50" height="50"
                    class="mb-6 mx-auto" alt="">
                <p class="fw-semibold text-success mb-1">Join</p>
                <h4 class="fw-semibold text-success mb-0">{{ $dataResults[7] }}</h4>
            </a>
        </div>
    </div>
@endsection
