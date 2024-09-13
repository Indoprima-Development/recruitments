@extends('default')

@section('addCss')
    <link rel="stylesheet" href="{{ asset('package/dist/libs/quill/dist/quill.snow.css') }}">
    <link rel="stylesheet" href="{{ asset('package/dist/libs/sweetalert2/dist/sweetalert2.min.css') }}">
@endsection

@section('content2')
    <div class="card bg-info shadow-none position-relative overflow-hidden">
        <div class="card-body px-4 py-3">
            <div class="row align-items-center">
                <div class="col-9">
                    <h4 class="fw-semibold mb-8 text-white">Formulir Tenaga Kerja</h4>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item text-white">Form PTK</li>
                        </ol>
                    </nav>
                </div>
                <div class="col-3">
                    <div class="text-center mb-n5">
                        <img src="{{ asset('package/dist/images/breadcrumb/ChatBc.png') }}" alt=""
                            class="img-fluid mb-n4">
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('content')
@section('cardClass', 'bg-light-info')
@if ($errors->any())
    <div class="alert alert-danger">
        @foreach ($errors->all() as $error)
            {{ $error }} <br>
        @endforeach
    </div>
@endif

<div class="row">
    <div class="card">
        <div class="card-body wizard-content">
            <h6 class="card-subtitle mb-3"></h6>
            {!! Form::open(['route' => 'ptkforms.store',"id" => "formptk", 'class' => 'tab-wizard wizard-circle']) !!}
            <!-- Step 1 -->
            <h6>Jabatan</h6>
            <section>
                <h5>Jabatan</h5>
                <div class="row">
                    <div class="mb-3 col-6">
                        {{ Form::label('status_pegawai', 'Status Pegawai', ['class' => 'form-label']) }}
                        <select class="form-select bg-white" name="status_pegawai">
                            <option value="Staff" >Staff</option>
                            <option value="Non Staff" >Non Staff</option>
                            <option value="Internship" >Internship</option>
                        </select>
                    </div>

                    <div class="mb-3 col-6">
                        {{ Form::label('jumlah_kebutuhan_pegawai', 'Jumlah Kebutuhan Pegawai', ['class' => 'form-label']) }}
                        {{ Form::number('jumlah_kebutuhan_pegawai', null, ['class' => 'form-control bg-white']) }}
                    </div>

                    <div class="mb-3 col-6">
                        {{ Form::label('division_id', 'Division', ['class' => 'form-label']) }}
                        <select id="division" class="form-select bg-white" name="division_id">
                            <option disabled selected>Pilih</option>
                            @foreach ($divisions as $d)
                                <option value="{{ $d->id }}">{{ $d->division_name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3 col-6">
                        {{ Form::label('department_id', 'Department', ['class' => 'form-label']) }}
                        <select id="department" class="form-select bg-white" name="department_id">
                            <option disabled selected>Pilih</option>
                            @foreach ($departments as $d)
                                <option class="adjustdivision division_{{ $d->division_id }}"
                                    value="{{ $d->id }}">
                                    {{ $d->department_name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3 col-6">
                        {{ Form::label('section_id', 'Section', ['class' => 'form-label']) }}
                        <select id="section" class="form-select bg-white" name="section_id">
                            <option disabled selected>Pilih</option>
                            @foreach ($sections as $d)
                                <option class="adjustdepartment department_{{ $d->department_id }}"
                                    value="{{ $d->id }}">
                                    {{ $d->section_name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3 col-6">
                        {{ Form::label('jobtitle_id', 'Jobtitle', ['class' => 'form-label']) }}
                        <select class="form-select bg-white" name="jobtitle_id">
                            <option disabled selected>Pilih</option>
                            @foreach ($jobtitles as $d)
                                <option class="adjustsection section_{{ $d->section_id }}"
                                    value="{{ $d->id }}">
                                    {{ $d->jobtitle_name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-3 col-12">
                        {{ Form::label('date_startwork', 'Tanggal Mulai Kerja', ['class' => 'form-label']) }}
                        {{ Form::date('date_startwork', null, ['class' => 'form-control bg-white']) }}
                    </div>
                </div>
            </section>
            <!-- Step 2 -->
            <h6>Tugas dan Pekerjaan</h6>
            <section>
                <div class="row">
                    <h5>Uraian Tugas dan Pekerjaan</h5>
                    <div class="mb-3 col-6">
                        {{ Form::label('direct_superior', 'Atasan Langsung', ['class' => 'form-label']) }}
                        {{ Form::text('direct_superior', null, ['class' => 'form-control bg-white']) }}
                    </div>
                    <div class="mb-3 col-6">
                        {{ Form::label('direct_junior', 'Jumlah Bawahan Langsung', ['class' => 'form-label']) }}
                        {{ Form::number('direct_junior', null, ['class' => 'form-control bg-white']) }}
                    </div>
                    <div class="mb-3 col-12">
                        {{ Form::label('responsibility', 'Tanggung Jawab', ['class' => 'form-label']) }}
                        {{ Form::hidden('responsibility', null, ['id' => 'responsibility']) }}
                        <div class="responsibility bg-white"></div>
                    </div>
                </div>
            </section>
            <!-- Step 3 -->
            <h6>Pendidikan dan Pengalaman</h6>
            <section>
                <h5>Pendidikan</h5>
                <div class="row">
                    <div class="mb-3 col-4">
                        {{ Form::label('education_id', 'Education', ['class' => 'form-label']) }}
                        <select class="form-select bg-white" name="education_id">
                            @foreach ($educations as $d)
                                <option value="{{ $d->id }}">{{ $d->education_name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-3 col-4">
                        {{ Form::label('major_id', 'Major', ['class' => 'form-label']) }}
                        <select class="form-select bg-white" name="major_id">
                            @foreach ($majors as $d)
                                <option value="{{ $d->id }}">{{ $d->major_name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-3 col-4">
                        {{ Form::label('ipk', 'IPK', ['class' => 'form-label']) }}
                        {{ Form::number('ipk', null, ['class' => 'form-control bg-white']) }}
                    </div>

                    <div class="card col-12">
                        <div class="card-body bg-light-primary">
                            <h5 class="mt-2">Pengalaman
                                <button id="addPengalaman" type="button" class="btn btn-primary btn-sm">+ Add</button>
                            </h5>

                            <div id="pengalamanContainer">
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <h6>Persyaratan</h6>
            <section>
                <h5>Persyaratan</h5>
                <div class="row">
                    <div class="mb-3 col-12">
                        {{ Form::label('gender', 'Gender', ['class' => 'form-label']) }}
                        <select class="form-select bg-white" name="gender">
                            <option value="0">Semua</option>
                            <option value="1">Laki-laki</option>
                            <option value="2">Perempuan</option>
                        </select>
                    </div>

                    <div class="mb-3 col-12">
                        {{ Form::label('special_conditions', 'Persyaratan Khusus', ['class' => 'form-label']) }}
                        {{ Form::hidden('special_conditions', null, ['id' => 'special_conditions']) }}
                        <div class="special_conditions bg-white"></div>
                    </div>
                </div>
            </section>

            <!-- Step 4 -->
            <h6>Lain</h6>
            <section>
                <div class="row">
                    <div class="mb-3 col-12">
                        {{ Form::label('request_basis', 'Dasar Permintaan', ['class' => 'form-label']) }}
                        <select class="form-select bg-white" name="request_basis">
                            <option value="Peningkatan Volume Kerja">Peningkatan Volume Kerja</option>
                            <option value="Pengembangan Struktur Organisasi">Pengembangan Struktur Organisasi
                            </option>
                        </select>
                    </div>

                    <div class="mb-3 col-12">
                        {{ Form::label('request_basis_for', 'Keperluan Permintaan', ['class' => 'form-label']) }}
                        <select class="form-select bg-white" name="request_basis_for">
                            <option value="Resign">Resign</option>
                            <option value="Mutasi">Mutasi</option>
                            <option value="Mutasi">Promosi</option>
                            <option value="Lainya">Lainya</option>
                        </select>
                    </div>

                    <div class="mb-3 col-12">
                        {{ Form::label('general_others', 'Lain-lain', ['class' => 'form-label']) }}
                        {{ Form::hidden('general_others', null, ['id' => 'general_others']) }}
                        <div class="general_others bg-white"></div>
                    </div>
                </div>
            </section>
            {{ Form::close() }}
        </div>
    </div>
</div>


@stop

@section('addJs')
<script src="{{ asset('package/dist/libs/quill/dist/quill.min.js') }}"></script>
<script src="{{ asset('package/dist/libs/jquery-steps/build/jquery.steps.min.js') }}"></script>
<script src="{{ asset('package/dist/libs/jquery-validation/dist/jquery.validate.min.js') }}"></script>
<script src="{{ asset('package/dist/libs/sweetalert2/dist/sweetalert2.min.js') }}"></script>
<script src="{{ asset('package/dist/js/forms/sweet-alert.init.js') }}"></script>
<script src="{{ asset('package/dist/js/forms/form-wizard.js') }}"></script>
<script>
    $(document).ready(function() {
        $('a[role="menuitem"]').click(function(event) {
            event.preventDefault(); // Prevent the default action
            var hrefValue = $(this).attr('href');
            console.log(hrefValue);
        });
    });

    function quilInit(className) {
        var quill = new Quill("." + className, {
            theme: "snow",
        });

        quill.on('text-change', function() {
            $("#" + className).val(quill.root.innerHTML)
        });
    }

    function adjustOption(idName) {
        $("#" + idName).on("change", function() {
            $(".adjust" + idName).hide()
            $("." + idName + "_" + $(this).val()).show()
        });
    }

    $(document).ready(function() {
        var idQuils = ["responsibility", "special_conditions", "general_others"]
        for (let i = 0; i < idQuils.length; i++) {
            quilInit(idQuils[i])
        }

        var idAdjustOptions = ["division", "department", "section"]
        for (let i = 0; i < idAdjustOptions.length; i++) {
            adjustOption(idAdjustOptions[i])
        }

        $('#addPengalaman').click(function() {
            // Create the new HTML element
            var newElement = `
                <div class="row mb-3">
                    <div class="col-5">
                        <label for="field" class="form-label">Bidang</label>
                        <select class="form-select bg-white" name="fields[]">
                            @foreach ($fields as $d)
                            <option value="{{ $d->id }}">{{ $d->field_name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-5">
                        <label for="tahun" class="form-label">Lama (Tahun)</label>
                        <input type="number" name="tahun[]" class="form-control bg-white">
                    </div>
                    <div class="col-2 d-flex align-items-end">
                        <button type="button" class="btn btn-danger btn-sm deletePengalaman">Delete</button>
                    </div>
                </div>
            `;

            // Append the new element to the container
            $('#pengalamanContainer').append(newElement);
        });

        // Delegate event listener to handle delete button click
        $('#pengalamanContainer').on('click', '.deletePengalaman', function() {
            $(this).closest('.row').remove();
        });
    });
</script>
@endsection
