@extends('default')

@section('addCss')
    <link rel="stylesheet" href="{{ asset('package/dist/libs/quill/dist/quill.snow.css') }}">
    <link rel="stylesheet" href="{{ asset('package/dist/libs/sweetalert2/dist/sweetalert2.min.css') }}">
    <style>
        .wizard-content .wizard>.steps .current a {
            background: #3a7bd5;
            color: #fff;
            box-shadow: 0 4px 10px rgba(58, 123, 213, 0.4);
        }

        .wizard-content .wizard>.steps .done a {
            background: #e2e8f0;
            color: #3b82f6;
        }

        .wizard-content .wizard>.steps .disabled a {
            background: #f8fafc;
            color: #94a3b8;
        }

        .wizard-content .wizard>.content {
            background: transparent;
            border: none;
            box-shadow: none;
        }

        .ql-container {
            border-bottom-left-radius: 8px;
            border-bottom-right-radius: 8px;
            background: #fff;
        }

        .ql-toolbar {
            border-top-left-radius: 8px;
            border-top-right-radius: 8px;
            background: #f8fafc;
        }

        .form-label {
            font-weight: 600;
            color: #475569;
            margin-bottom: 0.5rem;
        }

        .form-control,
        .form-select {
            border: 1px solid #e2e8f0;
            padding: 0.6rem 1rem;
            border-radius: 8px;
            transition: all 0.2s;
        }

        .form-control:focus,
        .form-select:focus {
            border-color: #3a7bd5;
            box-shadow: 0 0 0 4px rgba(58, 123, 213, 0.1);
        }
    </style>
@endsection

@section('content')
    <div class="row justify-content-center">
        <div class="col-12">
            <div class="d-flex align-items-center justify-content-between mb-4">
                <div>
                    <h4 class="mb-1 fw-bold text-dark">Create New Vacancy</h4>
                    <p class="text-muted mb-0">Fill in the details to open a new recruitment position</p>
                </div>
                <a href="{{ route('ptkforms.index') }}" class="btn btn-outline-secondary d-flex align-items-center gap-2">
                    <i class="ti ti-arrow-left"></i> Back
                </a>
            </div>

            <div class="card card-modern border-0 shadow-lg">
                <div class="card-body wizard-content p-4">
                    {!! Form::open(['route' => 'ptkforms.store', 'id' => 'formptk', 'class' => 'tab-wizard wizard-circle']) !!}

                    <!-- Step 1 -->
                    <h6>Position Details</h6>
                    <section>
                        <h5 class="mb-4 text-primary fw-bold"><i class="ti ti-briefcase me-2"></i>Position Information</h5>
                        <div class="row g-3">
                            <div class="col-md-6">
                                {{ Form::label('status_pegawai', 'Employment Status', ['class' => 'form-label']) }}
                                <select class="form-select" name="status_pegawai">
                                    <option value="Staff">Staff</option>
                                    <option value="Non Staff">Non Staff</option>
                                    <option value="Internship">Internship</option>
                                    <option value="LTC">LTC</option>
                                </select>
                            </div>

                            <div class="col-md-6">
                                {{ Form::label('jumlah_kebutuhan_pegawai', 'Headcount Required', ['class' => 'form-label']) }}
                                {{ Form::number('jumlah_kebutuhan_pegawai', null, ['class' => 'form-control', 'placeholder' => 'e.g. 1']) }}
                            </div>

                            <div class="col-md-6">
                                {{ Form::label('division_id', 'Division', ['class' => 'form-label']) }}
                                <select id="division" class="form-select" name="division_id">
                                    <option disabled selected>Select Division</option>
                                    @foreach ($divisions as $d)
                                        <option value="{{ $d->id }}">{{ $d->division_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-6">
                                {{ Form::label('department_id', 'Department', ['class' => 'form-label']) }}
                                <select id="department" class="form-select" name="department_id">
                                    <option disabled selected>Select Department</option>
                                    @foreach ($departments as $d)
                                        <option class="adjustdivision division_{{ $d->division_id }}" style="display:none;"
                                            value="{{ $d->id }}">
                                            {{ $d->department_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-6">
                                {{ Form::label('section_id', 'Section', ['class' => 'form-label']) }}
                                <select id="section" class="form-select" name="section_id">
                                    <option disabled selected>Select Section</option>
                                    @foreach ($sections as $d)
                                        <option class="adjustdepartment department_{{ $d->department_id }}"
                                            style="display:none;" value="{{ $d->id }}">
                                            {{ $d->section_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-6">
                                {{ Form::label('jobtitle_id', 'Job Title', ['class' => 'form-label']) }}
                                <select class="form-select" name="jobtitle_id">
                                    <option disabled selected>Select Job Title</option>
                                    @foreach ($jobtitles as $d)
                                        <option class="adjustsection section_{{ $d->section_id }}" style="display:none;"
                                            value="{{ $d->id }}">
                                            {{ $d->jobtitle_name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="col-12">
                                {{ Form::label('date_startwork', 'Expected Start Date', ['class' => 'form-label']) }}
                                {{ Form::date('date_startwork', null, ['class' => 'form-control']) }}
                            </div>
                        </div>
                    </section>

                    <!-- Step 2 -->
                    <h6>Responsibilities</h6>
                    <section>
                        <h5 class="mb-4 text-primary fw-bold"><i class="ti ti-list-check me-2"></i>Job Description</h5>
                        <div class="row g-3">
                            <div class="col-md-6">
                                {{ Form::label('direct_superior', 'Direct Supervisor', ['class' => 'form-label']) }}
                                {{ Form::text('direct_superior', null, ['class' => 'form-control', 'placeholder' => 'Name or Position']) }}
                            </div>
                            <div class="col-md-6">
                                {{ Form::label('direct_junior', 'Number of Subordinates', ['class' => 'form-label']) }}
                                {{ Form::number('direct_junior', null, ['class' => 'form-control', 'placeholder' => '0']) }}
                            </div>
                            <div class="col-12">
                                {{ Form::label('responsibility', 'Key Responsibilities', ['class' => 'form-label']) }}
                                {{ Form::hidden('responsibility', null, ['id' => 'responsibility']) }}
                                <div class="responsibility" style="min-height: 200px;"></div>
                            </div>
                        </div>
                    </section>

                    <!-- Step 3 -->
                    <h6>Requirements</h6>
                    <section>
                        <h5 class="mb-4 text-primary fw-bold"><i class="ti ti-school me-2"></i>Education & Experience</h5>
                        <div class="row g-3">
                            <div class="col-md-4">
                                {{ Form::label('education_id', 'Minimum Education', ['class' => 'form-label']) }}
                                <select class="form-select" name="education_id">
                                    @foreach ($educations as $d)
                                        <option value="{{ $d->id }}">{{ $d->education_name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="col-md-4">
                                {{ Form::label('major_id', 'Major Preferred', ['class' => 'form-label']) }}
                                <select class="form-select" name="major_id">
                                    @foreach ($majors as $d)
                                        <option value="{{ $d->id }}">{{ $d->major_name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="col-md-4">
                                {{ Form::label('ipk', 'Minimum GPA (IPK)', ['class' => 'form-label']) }}
                                {{ Form::number('ipk', null, ['class' => 'form-control', 'step' => '0.01', 'placeholder' => 'e.g. 3.00']) }}
                            </div>

                            <div class="col-12">
                                <div class="card bg-light border-0">
                                    <div class="card-body">
                                        <div class="d-flex justify-content-between align-items-center mb-3">
                                            <h6 class="fw-bold mb-0">Experience Requirements</h6>
                                            <button id="addPengalaman" type="button"
                                                class="btn btn-primary btn-sm rounded-pill px-3">
                                                <i class="ti ti-plus me-1"></i> Add Experience
                                            </button>
                                        </div>
                                        <div id="pengalamanContainer"></div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <h5 class="my-4 text-primary fw-bold"><i class="ti ti-info-circle me-2"></i>Additional Requirements
                        </h5>
                        <div class="row g-3">
                            <div class="col-12">
                                {{ Form::label('gender', 'Gender Preference', ['class' => 'form-label']) }}
                                <select class="form-select" name="gender">
                                    <option value="0">Any / No Preference</option>
                                    <option value="1">Male</option>
                                    <option value="2">Female</option>
                                </select>
                            </div>

                            <div class="col-12">
                                {{ Form::label('special_conditions', 'Special Conditions / Skills', ['class' => 'form-label']) }}
                                {{ Form::hidden('special_conditions', null, ['id' => 'special_conditions']) }}
                                <div class="special_conditions" style="min-height: 150px;"></div>
                            </div>
                        </div>
                    </section>

                    <!-- Step 4 -->
                    <h6>Other Details</h6>
                    <section>
                        <h5 class="mb-4 text-primary fw-bold"><i class="ti ti-file-description me-2"></i>Request
                            Justification</h5>
                        <div class="row g-3">
                            <div class="col-12">
                                {{ Form::label('request_basis', 'Basis of Request', ['class' => 'form-label']) }}
                                <select class="form-select" name="request_basis">
                                    <option value="Peningkatan Volume Kerja">Increased Work Volume</option>
                                    <option value="Pengembangan Struktur Organisasi">Organizational Structural Development
                                    </option>
                                </select>
                            </div>

                            <div class="col-12">
                                {{ Form::label('request_basis_for', 'Purpose', ['class' => 'form-label']) }}
                                <select class="form-select" name="request_basis_for">
                                    <option value="Resign">Replacement (Resignation)</option>
                                    <option value="Mutasi">Replacement (Mutation)</option>
                                    <option value="Promosi">Promotion</option>
                                    <option value="Lainya">Other</option>
                                </select>
                            </div>

                            <div class="col-12">
                                {{ Form::label('general_others', 'Other Remarks', ['class' => 'form-label']) }}
                                {{ Form::hidden('general_others', null, ['id' => 'general_others']) }}
                                <div class="general_others" style="min-height: 150px;"></div>
                            </div>
                        </div>
                    </section>
                    {{ Form::close() }}
                </div>
            </div>
        </div>
    </div>
@endsection

@section('addJs')
    <script src="{{ asset('package/dist/libs/quill/dist/quill.min.js') }}"></script>
    <script src="{{ asset('package/dist/libs/jquery-steps/build/jquery.steps.min.js') }}"></script>
    <script src="{{ asset('package/dist/libs/jquery-validation/dist/jquery.validate.min.js') }}"></script>
    <script src="{{ asset('package/dist/libs/sweetalert2/dist/sweetalert2.min.js') }}"></script>
    <script src="{{ asset('package/dist/js/forms/sweet-alert.init.js') }}"></script>
    <script src="{{ asset('package/dist/js/forms/form-wizard.js') }}"></script>
    <script>
        function quilInit(className) {
            var quill = new Quill("." + className, {
                theme: "snow",
                modules: {
                    toolbar: [
                        ['bold', 'italic', 'underline'],
                        [{
                            'list': 'ordered'
                        }, {
                            'list': 'bullet'
                        }]
                    ]
                }
            });

            quill.on('text-change', function() {
                $("#" + className).val(quill.root.innerHTML)
            });
        }

        function adjustOption(idName) {
            $("#" + idName).on("change", function() {
                // Hide all dependent options first
                $(".adjust" + idName).hide();
                // Deselect currently selected value to avoid submission of invalid data
                var dependentSelect = null;
                if (idName === 'division') dependentSelect = $('#department');
                if (idName === 'department') dependentSelect = $('#section');
                if (idName === 'section') dependentSelect = $('select[name="jobtitle_id"]');

                if (dependentSelect) {
                    dependentSelect.val('');
                    dependentSelect.find('option:first').prop('selected', true);
                }

                // Show matching options
                $("." + idName + "_" + $(this).val()).show();
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
                var newElement = `
                <div class="row align-items-end mb-3 g-2 bg-white p-3 rounded shadow-sm border">
                    <div class="col-md-5">
                        <label class="form-label small text-muted">Field of Expertise</label>
                        <select class="form-select form-select-sm" name="fields[]">
                            @foreach ($fields as $d)
                            <option value="{{ $d->id }}">{{ $d->field_name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-5">
                        <label class="form-label small text-muted">Years of Experience</label>
                        <input type="number" name="tahun[]" class="form-control form-control-sm" placeholder="e.g. 2">
                    </div>
                    <div class="col-md-2 text-end">
                        <button type="button" class="btn btn-danger btn-sm rounded px-3 deletePengalaman">
                            <i class="ti ti-trash"></i>
                        </button>
                    </div>
                </div>
            `;
                $('#pengalamanContainer').append(newElement);
            });

            $('#pengalamanContainer').on('click', '.deletePengalaman', function() {
                $(this).closest('.row').remove();
            });
        });
    </script>
@endsection
