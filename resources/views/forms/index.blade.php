@extends('default')

@section('content')
    <div class="card bg-primary text-white w-100 card-hover">
        <div class="card-body">
            <div class="d-flex align-items-center">
                <i class="ti ti-user display-6"></i>
                <div class="ms-auto">
                    <i class="ti ti-setting fs-8"></i>
                </div>
            </div>
            <div class="mt-4">
                <h4 class="card-title mb-1 text-white">
                    CV
                </h4>
                <h6 class="card-text fw-normal text-white-50">
                    Sesuaikan CV anda disini
                </h6>
            </div>
        </div>
    </div>

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
            </div>
        </div>
    </div>
@stop

@section('addJs')
    <script src="https://cdn.jsdelivr.net/npm/iconify-icon@1.0.8/dist/iconify-icon.min.js"></script>
@stop
