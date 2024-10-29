@extends('default')

@section('content')
    <div class="row">
        <div class="col-md-6">
            <div class="card bg-primary text-white w-100 card-hover d-flex">
                <div class="card-body">
                    <form method="POST" action="{{ url('datadiris/cv') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col text-start">
                                @if(Auth::user()->cv != null)
                                <a href="{{ url(Auth::user()->cv) }}" class="text-white"><i class="ti ti-file fs-8"></i></a>
                                @else
                                <a href="#" class="text-white"><i class="ti ti-x fs-8"></i></a>
                                @endif
                            </div>
                            <div class="col text-end">
                                <button type="submit" class="btn btn-sm btn-outline-primary bg-white">Upload CV</button>
                            </div>
                        </div>
                        <div class="mt-4">
                            <h6 class="card-text fw-normal text-white-50">
                                <input type="file" name="cv" class="form-control bg-white form-control-sm">
                            </h6>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card bg-info text-white w-100 card-hover d-flex">
                <div class="card-body">
                    <form method="POST" action="{{ url('datadiris/photo') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col text-end">
                                <button type="submit" class="btn btn-sm btn-outline-primary bg-white">Upload Photo</button>
                            </div>
                        </div>
                        <div class="mt-4">
                            <h4 class="card-title mb-1 text-white">
                                <input type="file" name="photo" class="form-control bg-white form-control-sm">
                            </h4>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="col-md-2">
            @if (Auth::user()->photo != '')
                <img style="width: 100%; height:25vh;" src="{{ asset('photo') }}/{{ Auth::user()->id }}.png" alt="">
            @else
                <i class="ti ti-photo display-6"></i>
            @endif
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
