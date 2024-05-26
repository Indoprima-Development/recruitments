@extends('default')

@section('content')
<div class="container-fluid">
    <div class="card bg-info-subtle shadow-none position-relative overflow-hidden mb-4">
        <div class="card-body px-4 py-3">
            <div class="row align-items-center">
                <div class="col-9">
                    <h4 class="fw-semibold mb-8">Account Information</h4>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a class="text-muted text-decoration-none" href="{{url('dashboard')}}">Home</a>
                            </li>
                            <li class="breadcrumb-item" aria-current="page">Account Information</li>
                        </ol>
                    </nav>
                </div>
                <div class="col-3">
                    <div class="text-center mb-n5">
                        <img src="../assets/images/breadcrumb/ChatBc.png" alt="" class="img-fluid mb-n4" />
                    </div>
                </div>
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
            </div>
        </div>
    </div>
</div>
@stop

@section('addJs')
<script src="https://cdn.jsdelivr.net/npm/iconify-icon@1.0.8/dist/iconify-icon.min.js"></script>
@stop
