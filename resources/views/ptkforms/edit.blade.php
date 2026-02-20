@extends('default')

@section('addCss')
    <link rel="stylesheet" href="{{ asset('package/dist/libs/quill/dist/quill.snow.css') }}">
    <link rel="stylesheet" href="{{ asset('package/dist/libs/sweetalert2/dist/sweetalert2.min.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" />
    <link rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/select2-bootstrap-5-theme@1.3.0/dist/select2-bootstrap-5-theme.min.css" />

    <style>
        :root {
            --primary-color: #3b82f6;
            /* Modern Blue */
            --secondary-color: #64748b;
            /* Slate */
            --accent-color: #f59e0b;
            /* Amber */
            --success-color: #10b981;
            /* Emerald */
            --bg-light: #f8fafc;
            --card-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1), 0 4px 6px -2px rgba(0, 0, 0, 0.05);
            --input-radius: 0.5rem;
        }

        body {
            background-color: #f1f5f9;
        }

        .card-modern {
            border: none;
            border-radius: 1rem;
            box-shadow: var(--card-shadow);
            background: #fff;
            overflow: hidden;
            transition: transform 0.2s;
        }

        .page-header {
            margin-bottom: 2rem;
        }

        .page-title {
            font-size: 1.75rem;
            font-weight: 800;
            color: #1e293b;
            letter-spacing: -0.025em;
        }

        .page-subtitle {
            color: #64748b;
            font-size: 0.95rem;
        }

        /* Wizard Overrides */
        .wizard-content .wizard>.steps {
            margin-bottom: 2rem;
        }

        .wizard-content .wizard>.steps .current a {
            background: var(--primary-color);
            color: #fff;
            border-radius: 50px;
            box-shadow: 0 4px 6px rgba(59, 130, 246, 0.3);
            border: none;
        }

        .wizard-content .wizard>.steps .done a {
            background: #e0f2fe;
            /* Light Blue */
            color: var(--primary-color);
            border-radius: 50px;
            border: none;
        }

        .wizard-content .wizard>.steps .disabled a {
            background: #f1f5f9;
            color: #94a3b8;
            border-radius: 50px;
            border: none;
        }

        .wizard-content .wizard>.steps ul li {
            padding: 0 10px;
            /* Space between steps */
        }


        .wizard-content .wizard>.content {
            background: transparent;
            border: none;
            box-shadow: none;
            min-height: 600px;
            /* Increase minimum height */
            overflow: visible;
            /* Allow overflow */
            display: block;
            /* Ensure it takes up space */
        }

        /* Override potential fixed height from plugin JS if inline styles are applied, or ensure wrapper expands */
        .wizard-content .wizard {
            overflow: visible;
        }

        /* Form Controls */
        .form-label {
            font-weight: 600;
            color: #334155;
            font-size: 0.9rem;
            margin-bottom: 0.5rem;
        }

        .form-control,
        .form-select {
            border: 1px solid #e2e8f0;
            border-radius: var(--input-radius);
            padding: 0.75rem 1rem;
            font-size: 0.95rem;
            transition: all 0.2s ease-in-out;
            background-color: #fff;
        }

        .form-control:focus,
        .form-select:focus {
            border-color: var(--primary-color);
            box-shadow: 0 0 0 3px rgba(59, 130, 246, 0.15);
            outline: none;
        }

        .select2-container--bootstrap-5 .select2-selection {
            border-color: #e2e8f0;
            border-radius: var(--input-radius);
            padding: 0.55rem 1rem;
            /* Adjust to match form-control */
        }

        .select2-container--bootstrap-5 .select2-selection--single {
            height: auto;
            /* Let it grow */
        }

        /* Section Headers */
        .section-header {
            display: flex;
            align-items: center;
            margin-bottom: 1.5rem;
            padding-bottom: 1rem;
            border-bottom: 2px solid #f1f5f9;
        }

        .section-icon {
            width: 40px;
            height: 40px;
            border-radius: 10px;
            background: #eff6ff;
            color: var(--primary-color);
            display: flex;
            align-items: center;
            justify-content: center;
            margin-right: 1rem;
            font-size: 1.25rem;
        }

        .section-title {
            font-size: 1.25rem;
            font-weight: 700;
            color: #1e293b;
            margin: 0;
        }

        /* Cards inside wizard */
        .inner-card {
            background: #f8fafc;
            border: 1px solid #e2e8f0;
            border-radius: 0.75rem;
            padding: 1.5rem;
        }

        /* Experience Items */
        .experience-item {
            background: #fff;
            border: 1px solid #e2e8f0;
            border-left: 4px solid var(--accent-color);
            border-radius: 0.5rem;
            padding: 1.25rem;
            margin-bottom: 1rem;
            transition: all 0.2s;
            position: relative;
        }

        .experience-item:hover {
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.05);
            transform: translateY(-2px);
        }

        .btn-delete-exp {
            position: absolute;
            top: 10px;
            right: 10px;
            color: #ef4444;
            background: #fee2e2;
            border: none;
            width: 28px;
            height: 28px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 12px;
            transition: all 0.2s;
        }

        .btn-delete-exp:hover {
            background: #ef4444;
            color: #fff;
        }

        /* Quill Editor Customization */
        .ql-container {
            border-bottom-left-radius: var(--input-radius);
            border-bottom-right-radius: var(--input-radius);
            background: #fff;
            font-family: inherit;
            font-size: 0.95rem;
        }

        .ql-toolbar {
            border-top-left-radius: var(--input-radius);
            border-top-right-radius: var(--input-radius);
            background: #f8fafc;
        }

        /* Animations */
        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(10px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .animate-fade {
            animation: fadeIn 0.4s ease-out forwards;
        }
    </style>
@endsection

@section('content')
    <div class="container-fluid px-md-4">
        <!-- Header -->
        <div class="d-flex align-items-end justify-content-between page-header animate-fade">
            <div>
                <h1 class="page-title"><i class="ti ti-edit text-primary me-2"></i>Edit Vacancy</h1>
                <p class="page-subtitle mb-0">Refine and update recruitment details for
                    <strong>{{ $ptkform->jobtitle->jobtitle_name ?? 'Position' }}</strong>
                </p>
            </div>
            <a href="{{ route('ptkforms.index') }}"
                class="btn btn-light text-secondary border fw-semibold d-flex align-items-center gap-2 px-4 shadow-sm hover-elevate">
                <i class="ti ti-arrow-left"></i> Back to List
            </a>
        </div>

        <div class="row justify-content-center">
            <div class="col-12 col-xl-11">
                <div class="card card-modern animate-fade" style="animation-delay: 0.1s;">
                    <div class="card-body wizard-content p-0">
                        {{ Form::model($ptkform, ['route' => ['ptkforms.update', $ptkform->id], 'method' => 'PUT', 'id' => 'formptk', 'class' => 'tab-wizard wizard-circle']) }}

                        <!-- Step 1: Position Details -->
                        <h6>Position</h6>
                        <section class="p-4">
                            <div class="section-header">
                                <div class="section-icon"><i class="ti ti-building-skyscraper"></i></div>
                                <h5 class="section-title">Position Details</h5>
                            </div>

                            <div class="row g-4">
                                <!-- Status Badge / Select -->
                                <div class="col-12">
                                    <div class="inner-card d-flex align-items-center justify-content-between p-3">
                                        <div>
                                            <label class="form-label mb-1">Vacancy Current Status</label>
                                            <div class="text-muted small">Controls visibility of this job posting.</div>
                                        </div>
                                        <div style="width: 200px;">
                                            <select
                                                class="form-select fw-bold {{ $ptkform->status == 1 ? 'text-success' : ($ptkform->status == 0 ? 'text-danger' : 'text-warning') }}"
                                                name="status" style="border-width: 2px;">
                                                <option value="1" class="text-success"
                                                    {{ $ptkform->status == 1 ? 'selected' : '' }}>● Open (Active)</option>
                                                <option value="0" class="text-danger"
                                                    {{ $ptkform->status == 0 ? 'selected' : '' }}>● Closed</option>
                                                <option value="2" class="text-warning"
                                                    {{ $ptkform->status == 2 ? 'selected' : '' }}>● Draft</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <!-- Org Structure -->
                                <div class="col-md-6">
                                    <label class="form-label">Division</label>
                                    <select id="division" class="form-select select2-basic" name="division_id">
                                        <option disabled>Select Division</option>
                                        @foreach ($divisions as $d)
                                            <option value="{{ $d->id }}"
                                                {{ $ptkform->division_id == $d->id ? 'selected' : '' }}>
                                                {{ $d->division_name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label">Department</label>
                                    <select id="department" class="form-select select2-basic" name="department_id">
                                        <option disabled>Select Department</option>
                                        @foreach ($departments as $d)
                                            <option class="adjustdivision division_{{ $d->division_id }}"
                                                value="{{ $d->id }}"
                                                {{ $ptkform->department_id == $d->id ? 'selected' : '' }}
                                                style="{{ $ptkform->division_id == $d->division_id ? '' : 'display:none' }}">
                                                {{ $d->department_name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label">Section</label>
                                    <select id="section" class="form-select select2-basic" name="section_id">
                                        <option disabled>Select Section</option>
                                        @foreach ($sections as $d)
                                            <option class="adjustdepartment department_{{ $d->department_id }}"
                                                value="{{ $d->id }}"
                                                {{ $ptkform->section_id == $d->id ? 'selected' : '' }}
                                                style="{{ $ptkform->department_id == $d->department_id ? '' : 'display:none' }}">
                                                {{ $d->section_name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label">Job Title</label>
                                    <select class="form-select select2-basic" name="jobtitle_id">
                                        <option disabled>Select Job Title</option>
                                        @foreach ($jobtitles as $d)
                                            <option class="adjustsection section_{{ $d->section_id }}"
                                                value="{{ $d->id }}"
                                                {{ $ptkform->jobtitle_id == $d->id ? 'selected' : '' }}
                                                style="{{ $ptkform->section_id == $d->section_id ? '' : 'display:none' }}">
                                                {{ $d->jobtitle_name }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="col-md-4">
                                    {{ Form::label('status_pegawai', 'Employment Status', ['class' => 'form-label']) }}
                                    <div class="input-group">
                                        <span class="input-group-text bg-white text-muted"><i class="ti ti-id"></i></span>
                                        {{ Form::select('status_pegawai', ['Staff' => 'Staff', 'Non Staff' => 'Non Staff', 'Internship' => 'Internship', 'LTC' => 'LTC'], null, ['class' => 'form-select']) }}
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    {{ Form::label('jumlah_kebutuhan_pegawai', 'Headcount', ['class' => 'form-label']) }}
                                    <div class="input-group">
                                        <span class="input-group-text bg-white text-muted"><i
                                                class="ti ti-users"></i></span>
                                        {{ Form::number('jumlah_kebutuhan_pegawai', null, ['class' => 'form-control', 'placeholder' => 'Total Needed']) }}
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    {{ Form::label('date_startwork', 'Target Start Date', ['class' => 'form-label']) }}
                                    <div class="input-group">
                                        <span class="input-group-text bg-white text-muted"><i
                                                class="ti ti-calendar"></i></span>
                                        {{ Form::date('date_startwork', \Carbon\Carbon::parse($ptkform->date_startwork), ['class' => 'form-control']) }}
                                    </div>
                                </div>
                            </div>
                        </section>

                        <!-- Step 2: Responsibilities -->
                        <h6>Description</h6>
                        <section class="p-4">
                            <div class="section-header">
                                <div class="section-icon"><i class="ti ti-clipboard-list"></i></div>
                                <h5 class="section-title">Job Description & Hierarchy</h5>
                            </div>

                            <div class="row g-4">
                                <div class="col-md-6">
                                    {{ Form::label('direct_superior', 'Reporting To (Superior)', ['class' => 'form-label']) }}
                                    <div class="input-group">
                                        <span class="input-group-text bg-white text-muted"><i
                                                class="ti ti-user-up"></i></span>
                                        {{ Form::text('direct_superior', null, ['class' => 'form-control', 'placeholder' => 'Position of Superior']) }}
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    {{ Form::label('direct_junior', 'Manages (Subordinates)', ['class' => 'form-label']) }}
                                    <div class="input-group">
                                        <span class="input-group-text bg-white text-muted"><i
                                                class="ti ti-user-down"></i></span>
                                        {{ Form::number('direct_junior', null, ['class' => 'form-control', 'placeholder' => 'Count']) }}
                                    </div>
                                </div>
                                <div class="col-12">
                                    {{ Form::label('responsibility', 'Key Responsibilities', ['class' => 'form-label']) }}
                                    <div class="text-muted small mb-2">Detail the main tasks and expectations for this role.
                                    </div>
                                    {{ Form::hidden('responsibility', null, ['id' => 'responsibility']) }}
                                    <div class="responsibility" style="min-height: 250px;">{!! $ptkform->responsibility !!}</div>
                                </div>
                            </div>
                        </section>

                        <!-- Step 3: Requirements -->
                        <h6>Requirements</h6>
                        <section class="p-4">
                            <div class="section-header">
                                <div class="section-icon"><i class="ti ti-certificate"></i></div>
                                <h5 class="section-title">Qualification & Experience</h5>
                            </div>

                            <div class="row g-4">
                                <div class="col-md-4">
                                    {{ Form::label('education_id', 'Minimum Education', ['class' => 'form-label']) }}
                                    <select class="form-select select2-basic" name="education_id">
                                        @foreach ($educations as $d)
                                            <option value="{{ $d->id }}"
                                                {{ $ptkform->education_id == $d->id ? 'selected' : '' }}>
                                                {{ $d->education_name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-4">
                                    {{ Form::label('major_id', 'Preferred Major', ['class' => 'form-label']) }}
                                    <select class="form-select select2-basic" name="major_id">
                                        @foreach ($majors as $d)
                                            <option value="{{ $d->id }}"
                                                {{ $ptkform->major_id == $d->id ? 'selected' : '' }}>{{ $d->major_name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-4">
                                    {{ Form::label('ipk', 'Minimum GPA', ['class' => 'form-label']) }}
                                    <div class="input-group">
                                        <span class="input-group-text bg-white text-muted">0.00</span>
                                        {{ Form::number('ipk', null, ['class' => 'form-control', 'step' => '0.01', 'placeholder' => 'e.g. 3.00']) }}
                                    </div>
                                </div>

                                <div class="col-12">
                                    <div class="card bg-light border-0 shadow-none">
                                        <div
                                            class="card-header bg-transparent border-0 d-flex justify-content-between align-items-center pb-0">
                                            <h6 class="fw-bold text-dark mb-0"><i
                                                    class="ti ti-briefcase text-muted me-1"></i> Required Experience</h6>
                                            <button id="addPengalaman" type="button"
                                                class="btn btn-sm btn-primary rounded-pill px-3 shadow-sm">
                                                <i class="ti ti-plus me-1"></i> Add Record
                                            </button>
                                        </div>
                                        <div class="card-body pt-3">
                                            <div id="pengalamanContainer">
                                                @if (isset($ptkform->ptkfields))
                                                    @foreach ($ptkform->ptkfields as $field)
                                                        <div
                                                            class="experience-item row align-items-center g-2 animate-fade">
                                                            <button type="button"
                                                                class="btn-delete-exp deletePengalaman"><i
                                                                    class="ti ti-x"></i></button>
                                                            <div class="col-md-6">
                                                                <label
                                                                    class="form-label small text-muted text-uppercase fw-bold letter-spacing-1">Expertise
                                                                    / Field</label>
                                                                <select class="form-select form-select-sm"
                                                                    name="fields[]">
                                                                    @foreach ($fields as $d)
                                                                        <option value="{{ $d->id }}"
                                                                            {{ $field->field_id == $d->id ? 'selected' : '' }}>
                                                                            {{ $d->field_name }}</option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <label
                                                                    class="form-label small text-muted text-uppercase fw-bold letter-spacing-1">Years
                                                                    Required</label>
                                                                <div class="input-group input-group-sm">
                                                                    <input type="number" name="tahun[]"
                                                                        class="form-control" value="{{ $field->year }}"
                                                                        placeholder="0">
                                                                    <span
                                                                        class="input-group-text bg-white text-muted">Years</span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    @endforeach
                                                @endif
                                            </div>
                                            @if (!isset($ptkform->ptkfields) || count($ptkform->ptkfields) == 0)
                                                <div id="noExperienceMsg" class="text-center text-muted py-3 small">
                                                    No specific experience requirements added yet.
                                                </div>
                                            @endif
                                        </div>
                                    </div>
                                </div>

                                <div class="col-12 mt-4">
                                    <div class="section-header mb-3 border-0 pb-0">
                                        <div class="section-icon" style="background: #fff7ed; color: #ea580c;"><i
                                                class="ti ti-star"></i></div>
                                        <h5 class="section-title">Additional Criteria</h5>
                                    </div>
                                    <div class="row g-3">
                                        <div class="col-md-4">
                                            {{ Form::label('gender', 'Gender', ['class' => 'form-label']) }}
                                            <select class="form-select" name="gender">
                                                <option value="0" {{ $ptkform->gender == 0 ? 'selected' : '' }}>Any
                                                    Gender</option>
                                                <option value="1" {{ $ptkform->gender == 1 ? 'selected' : '' }}>Male
                                                </option>
                                                <option value="2" {{ $ptkform->gender == 2 ? 'selected' : '' }}>
                                                    Female</option>
                                            </select>
                                        </div>
                                        <div class="col-md-8">
                                            <label class="form-label">Special Conditions / Skills</label>
                                            {{ Form::hidden('special_conditions', null, ['id' => 'special_conditions']) }}
                                            <div class="special_conditions" style="min-height: 120px; background:white;">
                                                {!! $ptkform->special_conditions !!}</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </section>

                        <!-- Step 4: Logic/Justification -->
                        <h6>Justification</h6>
                        <section class="p-4">
                            <div class="section-header">
                                <div class="section-icon"><i class="ti ti-file-text"></i></div>
                                <h5 class="section-title">Request Justification</h5>
                            </div>

                            <div class="row g-4">
                                <div class="col-md-6">
                                    {{ Form::label('request_basis', 'Basis of Request', ['class' => 'form-label']) }}
                                    {{ Form::select(
                                        'request_basis',
                                        [
                                            'Peningkatan Volume Kerja' => 'Increased Work Volume',
                                            'Pengembangan Struktur Organisasi' => 'Organizational Expansion',
                                        ],
                                        null,
                                        ['class' => 'form-select'],
                                    ) }}
                                </div>

                                <div class="col-md-6">
                                    {{ Form::label('request_basis_for', 'Purpose Category', ['class' => 'form-label']) }}
                                    {{ Form::select(
                                        'request_basis_for',
                                        [
                                            'Resign' => 'Replacement (Resignation)',
                                            'Mutasi' => 'Replacement (Mutation)',
                                            'Promosi' => 'Promotion',
                                            'Lainya' => 'Other',
                                        ],
                                        null,
                                        ['class' => 'form-select'],
                                    ) }}
                                </div>

                                <div class="col-12">
                                    {{ Form::label('general_others', 'Aditional Remarks / Notes', ['class' => 'form-label']) }}
                                    {{ Form::hidden('general_others', null, ['id' => 'general_others']) }}
                                    <div class="general_others" style="min-height: 150px;">{!! $ptkform->general_others !!}</div>
                                </div>
                            </div>
                        </section>
                        {{ Form::close() }}
                    </div>
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
    <!-- Select2 -->
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

    <script>
        function quilInit(className) {
            var quill = new Quill("." + className, {
                theme: "snow",
                placeholder: 'Type details here...',
                modules: {
                    toolbar: [
                        ['bold', 'italic', 'underline', 'strike'],
                        [{
                            'list': 'ordered'
                        }, {
                            'list': 'bullet'
                        }],
                        [{
                            'header': [1, 2, 3, false]
                        }],
                        ['clean']
                    ]
                }
            });

            // Sync content on change
            quill.on('text-change', function() {
                $("#" + className).val(quill.root.innerHTML)
            });
        }

        function adjustOption(idName) {
            $("#" + idName).on("change", function() {
                $(".adjust" + idName).hide();
                var dependentSelect = null;
                if (idName === 'division') dependentSelect = $('#department');
                if (idName === 'department') dependentSelect = $('#section');
                if (idName === 'section') dependentSelect = $('select[name="jobtitle_id"]');

                if (dependentSelect) {
                    dependentSelect.val('').trigger('change'); // trigger select2 update
                    dependentSelect.find('option:first').prop('selected', true);
                }

                $("." + idName + "_" + $(this).val()).show();
            });
        }

        $(document).ready(function() {
            // Init Select2
            $('.select2-basic').select2({
                theme: 'bootstrap-5',
                width: '100%'
            });

            var idQuils = ["responsibility", "special_conditions", "general_others"]
            for (let i = 0; i < idQuils.length; i++) {
                quilInit(idQuils[i])
            }

            var idAdjustOptions = ["division", "department", "section"]
            for (let i = 0; i < idAdjustOptions.length; i++) {
                adjustOption(idAdjustOptions[i])
            }

            $('#addPengalaman').click(function() {
                $('#noExperienceMsg').hide();
                var newElement = `
                <div class="experience-item row align-items-center g-2 animate-fade">
                     <button type="button" class="btn-delete-exp deletePengalaman"><i class="ti ti-x"></i></button>
                    <div class="col-md-6">
                        <label class="form-label small text-muted text-uppercase fw-bold letter-spacing-1">Expertise / Field</label>
                        <select class="form-select form-select-sm" name="fields[]">
                            @foreach ($fields as $d)
                            <option value="{{ $d->id }}">{{ $d->field_name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label small text-muted text-uppercase fw-bold letter-spacing-1">Years Required</label>
                        <div class="input-group input-group-sm">
                            <input type="number" name="tahun[]" class="form-control" placeholder="1">
                            <span class="input-group-text bg-white text-muted">Years</span>
                        </div>
                    </div>
                </div>
            `;
                $('#pengalamanContainer').append(newElement);
            });

            $('#pengalamanContainer').on('click', '.deletePengalaman', function() {
                $(this).closest('.experience-item').fadeOut(300, function() {
                    $(this).remove();
                    if ($('#pengalamanContainer').children().length === 0) {
                        $('#noExperienceMsg').fadeIn();
                    }
                });
            });
        });
    </script>
@endsection
