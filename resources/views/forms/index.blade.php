@extends('default')

@section('content2')
    <div class="card overflow-hidden border-1 border-primary">
        <div class="card-body p-0">
            <img src="{{ asset('photo/header.png') }}" alt="" class="img-fluid">
            <div class="row align-items-center">
                <div class="col-lg-4 order-lg-1 order-2">
                    <div class="d-flex align-items-center justify-content-around m-4">
                        <div class="text-center text-muted">
                            <i class="ti ti-file fs-6 d-block mb-2"></i>
                            <p class="mb-0 fs-4">
                                @if ($users->cv != null)
                                    <a class="btn btn-sm btn-primary" href="{{ url($users->cv) }}">
                                        CV
                                    </a>
                                @else
                                    <a class="btn btn-sm btn-primary" href="3">
                                        CV Not Uploaded
                                    </a>
                                @endif
                            </p>
                        </div>
                        <div class="text-center text-muted">
                            <i class="ti ti-circle-check fs-6 d-block mb-2"></i>
                            <p class="mb-0 fs-4">
                                <b>{{ $ptkformtransactions[0]->ptkform->jobtitle->jobtitle_name ?? '-' }}</b>
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 mt-n3 order-lg-2 order-1">
                    <div class="mt-n5">
                        <div class="d-flex align-items-center justify-content-center mb-2">
                            <div class="linear-gradient d-flex align-items-center justify-content-center rounded-circle"
                                style="width: 110px; height: 110px;";>
                                <div class="border border-4 border-white d-flex align-items-center justify-content-center rounded-circle overflow-hidden"
                                    style="width: 100px; height: 100px;";>
                                    @if ($users->photo != null)
                                        <img src="{{ asset($users->photo) }}" alt="" class="w-100 h-100">
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="text-center">
                            <h5 class="fs-5 mb-0 fw-semibold">{{ $users->name }}</h5>
                            <p class="mb-0 fs-4">
                                <a target="_blank" href="wa.me/{{ $users->no_wa }}">
                                    {{ $users->no_wa }}</a>
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 order-last">
                    <div class="d-flex align-items-center justify-content-around m-4">
                        <div class="text-center text-muted">
                            <i class="ti ti-circle-check fs-6 d-block mb-2"></i>
                            <p class="mb-0 fs-4">
                                <b>
                                    AAA
                                </b>
                            </p>
                        </div>

                        <div class="text-center text-muted">
                            <i class="ti ti-printer fs-6 d-block mb-2"></i>
                            <p class="mb-0 fs-4">
                                <button class="btn btn-sm btn-primary" onclick="saveDivAsPDF()">Save as PDF</button>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6">
            <form method="POST" action="{{ url('datadiris/cv') }}" enctype="multipart/form-data">
                @csrf
                <h4 class="card-title mb-1 text-white">
                    <div class="row">
                        <div class="col text-end">
                            <input type="file" name="cv" class="form-control bg-white form-control-sm">
                        </div>
                        <div class="col">
                            <button type="submit" class="btn btn-sm btn-outline-primary bg-white">Unggah CV</button>
                        </div>
                    </div>
                </h4>
            </form>
        </div>

        <div class="col-md-6">
            <form method="POST" action="{{ url('datadiris/photo') }}" enctype="multipart/form-data">
                @csrf
                <div class="">
                    <h4 class="card-title mb-1 text-white">
                        <div class="row">
                            <div class="col text-end">
                                <input type="file" name="photo" class="form-control bg-white form-control-sm">
                            </div>
                            <div class="col text-start">
                                <button type="submit" class="btn btn-sm btn-outline-primary bg-white">Unggah Foto</button>
                            </div>
                        </div>
                    </h4>
                </div>
            </form>
        </div>
    </div>
@endsection

@section('content')
    <div class="card">
        @include('forms.headbar')

        <div class="card-body bg-light-info">
            <div class="tab-content" id="pills-tabContent">
                @include('forms.datadiri')
                @include('forms.pendidikan')
                @include('forms.keluarga')
                @include('forms.pengalaman')
                @include('forms.kemampuan')
                @include('forms.organisasi')
                @include('forms.lain')
                @include('forms.pernyataan')
            </div>

            <div class="w-100 text-end">
                <button class="btn btn-primary">Selanjutnya</button>
            </div>
        </div>
    </div>
@stop

@section('addJs')
    <script src="https://cdn.jsdelivr.net/npm/iconify-icon@1.0.8/dist/iconify-icon.min.js"></script>
    <script>
        $(document).ready(function() {
            const searchParams = new URLSearchParams(window.location.search);
            var ids = searchParams.get('section')
            $('#pills-' + ids + '-tab').trigger('click');
        });
    </script>
@stop
