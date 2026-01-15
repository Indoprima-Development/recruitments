@extends('default')

@section('addCss')
    <link rel="stylesheet" href="{{ asset('package/dist/libs/quill/dist/quill.snow.css') }}">
    <link rel="stylesheet" href="{{ asset('package/dist/libs/sweetalert2/dist/sweetalert2.min.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
    <style>
        :root {
            --primary: #2563eb;
            --primary-hover: #1d4ed8;
            --secondary: #64748b;
            --secondary-bg: #f8fafc;
            --success: #10b981;
            --danger: #ef4444;
            --border-color: #e2e8f0;
            --text-main: #0f172a;
            --text-secondary: #475569;
            --bg-body: #f1f5f9;
            --card-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
            --input-shadow: 0 1px 2px 0 rgba(0, 0, 0, 0.05);
            --radius-md: 0.5rem;
            --radius-lg: 0.75rem;
        }

        body {
            background-color: var(--bg-body);
            color: var(--text-main);
            font-family: 'Plus Jakarta Sans', sans-serif;
            /* Setup font if available or fallback */
        }

        /* -------------------------------- */
        /* WIZARD CONTAINER OVERRIDES       */
        /* -------------------------------- */

        .wizard-card {
            background: white;
            border-radius: var(--radius-lg);
            box-shadow: var(--card-shadow);
            padding: 2rem;
            position: relative;
            overflow: hidden;
            /* Prevent overflow but handled carefully */
        }

        /* Fix JQuery Steps Overlapping Content Issue */
        .wizard.vertical>.content {
            display: block;
            /* ensure block display */
            width: 100%;
        }

        /* Ensure the content steps don't collapse */
        .wizard>.content {
            background: transparent;
            border: none;
            min-height: 500px;
            /* Give enough height */
            margin: 0;
            padding: 0;
            overflow: visible;
            /* Important for tooltips/dropdowns */
        }

        /* Reset the body position to static to properly stack content */
        .wizard>.content>.body {
            float: none;
            position: static;
            width: 100%;
            height: auto;
            padding: 1rem 0;
        }

        /* -------------------------------- */
        /* WIZARD HEADER (STEPS INDICATOR)  */
        /* -------------------------------- */

        .wizard>.steps {
            margin-bottom: 2rem;
            border-bottom: 1px solid var(--border-color);
            padding-bottom: 1.5rem;
        }

        .wizard>.steps>ul {
            display: flex;
            justify-content: space-between;
            list-style: none;
            padding: 0;
            margin: 0;
            width: 100%;
            position: relative;
        }

        .wizard>.steps>ul>li {
            position: relative;
            text-align: center;
            flex: 1;
        }

        /* Connector Line Background */
        .wizard>.steps>ul>li::after {
            content: '';
            position: absolute;
            top: 20px;
            /* adjusted to center of circle */
            left: 50%;
            width: 100%;
            height: 3px;
            background-color: var(--border-color);
            z-index: 0;
            transform: translateY(-50%);
        }

        .wizard>.steps>ul>li:last-child::after {
            display: none;
        }

        /* Active Connector Line Color */
        .wizard>.steps>ul>li.current::after,
        .wizard>.steps>ul>li.done::after {
            background-color: var(--primary);
            transition: background-color 0.4s ease;
        }

        /* The Link Styles */
        .wizard>.steps>ul>li>a {
            display: flex;
            flex-direction: column;
            align-items: center;
            text-decoration: none;
            position: relative;
            z-index: 1;
            /* Above line */
        }

        /* The Number Circle */
        .wizard>.steps>ul>li>a .number {
            width: 40px;
            height: 40px;
            background-color: white;
            border: 2px solid var(--border-color);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: 700;
            font-size: 1.1rem;
            color: var(--text-secondary);
            transition: all 0.3s ease;
            margin-bottom: 0.5rem;
        }

        /* Step Label */
        .wizard>.steps>ul>li>a .title-text {
            font-size: 0.85rem;
            font-weight: 600;
            color: var(--text-secondary);
            background-color: white;
            /* Cover line if needed */
            padding: 0.2rem 0.5rem;
            border-radius: 4px;
        }

        /* Current Step State */
        .wizard>.steps>ul>li.current>a .number {
            border-color: var(--primary);
            background-color: var(--primary);
            color: white;
            box-shadow: 0 0 0 4px var(--primary-light);
            transform: scale(1.1);
        }

        .wizard>.steps>ul>li.current>a .title-text {
            color: var(--primary);
            font-weight: 700;
        }

        /* Done Step State */
        .wizard>.steps>ul>li.done>a .number {
            border-color: var(--success);
            background-color: var(--success);
            color: white;
        }

        .wizard>.steps>ul>li.done>a .title-text {
            color: var(--success);
        }

        /* Error Step State */
        .wizard>.steps>ul>li.error>a .number {
            border-color: var(--danger);
            color: var(--danger);
        }


        /* -------------------------------- */
        /* ACTIONS (BUTTONS) FIXED          */
        /* -------------------------------- */

        .wizard>.actions {
            margin-top: 2rem;
            padding-top: 1.5rem;
            border-top: 1px solid var(--border-color);
            text-align: right;
        }

        .wizard>.actions>ul {
            display: inline-flex;
            gap: 1rem;
            list-style: none;
            padding: 0;
            margin: 0;
        }

        .wizard>.actions>ul>li {
            margin: 0;
        }

        .wizard>.actions>ul>li>a {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            padding: 0.75rem 2rem;
            border-radius: 50px;
            font-weight: 600;
            text-decoration: none;
            transition: all 0.2s;
            font-size: 0.95rem;
        }

        /* Previous Button */
        .wizard>.actions>ul>li>a[href="#previous"] {
            background: white;
            color: var(--text-secondary);
            border: 1px solid var(--border-color);
        }

        .wizard>.actions>ul>li>a[href="#previous"]:hover {
            background: var(--secondary-bg);
            border-color: #cbd5e1;
        }

        /* Next Button */
        .wizard>.actions>ul>li>a[href="#next"] {
            background: var(--primary);
            color: white;
            border: 1px solid var(--primary);
            box-shadow: 0 4px 6px -1px rgba(37, 99, 235, 0.3);
        }

        .wizard>.actions>ul>li>a[href="#next"]:hover {
            background: var(--primary-hover);
        }

        /* Finish Button (Distinct Style) */
        .wizard>.actions>ul>li>a[href="#finish"] {
            display: inline-flex !important;
            /* Force display */
            background: var(--success);
            color: white;
            border: 1px solid var(--success);
            box-shadow: 0 4px 6px -1px rgba(16, 185, 129, 0.3);
        }

        .wizard>.actions>ul>li>a[href="#finish"]:hover {
            background: #059669;
            /* darker success */
        }

        /* Disabled Buttons */
        .wizard>.actions>ul>li.disabled>a {
            opacity: 0.5;
            pointer-events: none;
            background: #e2e8f0;
            color: #94a3b8;
            border-color: #e2e8f0;
            box-shadow: none;
        }


        /* -------------------------------- */
        /* FORM COMPONENTS                  */
        /* -------------------------------- */

        .section-header {
            margin-bottom: 1.5rem;
            background: var(--primary-light);
            padding: 1rem;
            border-radius: var(--radius-md);
            border-left: 4px solid var(--primary);
            display: flex;
            align-items: center;
            gap: 0.75rem;
        }

        .section-header i {
            font-size: 1.5rem;
            color: var(--primary);
        }

        .section-header h5 {
            margin: 0;
            font-weight: 700;
            color: var(--primary-dark);
        }

        .form-label {
            font-weight: 600;
            color: var(--text-main);
            margin-bottom: 0.5rem;
            font-size: 0.9rem;
        }

        /* Input Styles */
        .form-control,
        .form-select {
            padding: 0.75rem 1rem;
            border-radius: var(--radius-md);
            border: 1px solid var(--border-color);
            font-size: 0.95rem;
            box-shadow: var(--input-shadow);
            transition: all 0.2s;
        }

        .form-control:focus,
        .form-select:focus {
            border-color: var(--primary);
            box-shadow: 0 0 0 3px rgba(37, 99, 235, 0.15);
            outline: none;
        }

        .input-group-text {
            background-color: #f1f5f9;
            border-color: var(--border-color);
            color: var(--secondary);
        }

        /* Quill Editor Fixes */
        .ql-toolbar.ql-snow {
            border-top-left-radius: var(--radius-md);
            border-top-right-radius: var(--radius-md);
            border-color: var(--border-color);
            background-color: #f8fafc;
        }

        .ql-container.ql-snow {
            border-bottom-left-radius: var(--radius-md);
            border-bottom-right-radius: var(--radius-md);
            border-color: var(--border-color);
            min-height: 150px;
        }

        /* Help Text */
        .help-text {
            font-size: 0.8rem;
            color: var(--text-secondary);
            margin-top: 0.25rem;
        }

        /* Experience Items */
        .experience-card {
            background: #fff;
            border: 1px solid var(--border-color);
            border-radius: var(--radius-md);
            padding: 1.25rem;
            margin-bottom: 1rem;
            position: relative;
            transition: all 0.2s;
            animation: fadeInDown 0.3s ease-out;
        }

        .experience-card:hover {
            border-color: var(--primary);
            box-shadow: var(--input-shadow);
        }

        .experience-card .delete-btn {
            position: absolute;
            top: 10px;
            right: 10px;
            color: var(--danger);
            background: #fee2e2;
            border: none;
            width: 32px;
            height: 32px;
            border-radius: 8px;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: all 0.2s;
            cursor: pointer;
        }

        .experience-card .delete-btn:hover {
            background: var(--danger);
            color: white;
        }

        .btn-add-experience {
            width: 100%;
            background: #f0f9ff;
            border: 2px dashed #bfdbfe;
            color: var(--primary);
            padding: 1rem;
            border-radius: var(--radius-md);
            font-weight: 600;
            transition: all 0.2s;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 0.5rem;
        }

        .btn-add-experience:hover {
            background: #e0f2fe;
            border-color: var(--primary);
        }

        /* Error Label */
        label.error {
            color: var(--danger);
            font-size: 0.8rem;
            margin-top: 0.25rem;
            display: block;
            font-weight: 500;
        }
    </style>
@endsection

@section('content')
    <div class="container-fluid py-4">
        <!-- Header Page -->
        <div class="row mb-4 align-items-center">
            <div class="col-md-8">
                <h3 class="fw-bold text-dark mb-1">Create Job Requisition (PTK)</h3>
                <p class="text-muted mb-0">Fill out the wizard form below to submit a new personnel request.</p>
            </div>
            <div class="col-md-4 text-md-end mt-3 mt-md-0">
                <a href="{{ route('ptkforms.index') }}" class="btn btn-outline-secondary rounded-pill px-4">
                    <i class="ti ti-arrow-left me-2"></i> Back to List
                </a>
            </div>
        </div>

        <!-- Main Wizard Card -->
        <div class="wizard-card">
            {!! Form::open([
                'route' => 'ptkforms.store',
                'id' => 'formptk',
                'class' => 'ptk-wizard',
                'autocomplete' => 'off',
            ]) !!}

            <!-- STEP 1 -->
            <h6>Position</h6>
            <section>
                <div class="section-header">
                    <i class="ti ti-briefcase"></i>
                    <div>
                        <h5>Position Details</h5>
                        <small class="text-dark">Specify the basic information for the position.</small>
                    </div>
                </div>

                <div class="row g-4">
                    <div class="col-md-6">
                        <label class="form-label">Employment Status <span class="text-danger">*</span></label>
                        <select class="form-select" name="status_pegawai" required>
                            <option value="" disabled selected>Select Status</option>
                            <option value="Staff">Staff</option>
                            <option value="Non Staff">Non Staff</option>
                            <option value="Internship">Internship</option>
                            <option value="LTC">LTC</option>
                        </select>
                        <div class="help-text">Type of employment contract.</div>
                    </div>

                    <div class="col-md-6">
                        <label class="form-label">Headcount Required <span class="text-danger">*</span></label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="ti ti-users"></i></span>
                            {{ Form::number('jumlah_kebutuhan_pegawai', null, ['class' => 'form-control', 'placeholder' => '1', 'min' => '1', 'required' => 'required']) }}
                        </div>
                    </div>

                    <div class="col-md-6">
                        <label class="form-label">Division <span class="text-danger">*</span></label>
                        <select id="division" class="form-select" name="division_id" required>
                            <option value="" disabled selected>Select Division</option>
                            @foreach ($divisions as $d)
                                <option value="{{ $d->id }}">{{ $d->division_name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="col-md-6">
                        <label class="form-label">Department <span class="text-danger">*</span></label>
                        <select id="department" class="form-select" name="department_id" required>
                            <option value="" disabled selected>Select Department</option>
                            @foreach ($departments as $d)
                                <option class="adjustdivision division_{{ $d->division_id }}" style="display:none;"
                                    value="{{ $d->id }}">
                                    {{ $d->department_name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="col-md-6">
                        <label class="form-label">Section <span class="text-danger">*</span></label>
                        <select id="section" class="form-select" name="section_id" required>
                            <option value="" disabled selected>Select Section</option>
                            @foreach ($sections as $d)
                                <option class="adjustdepartment department_{{ $d->department_id }}" style="display:none;"
                                    value="{{ $d->id }}">
                                    {{ $d->section_name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="col-md-6">
                        <label class="form-label">Job Position <span class="text-danger">*</span></label>
                        <select class="form-select" name="jobtitle_id" required>
                            <option value="" disabled selected>Select Job Title</option>
                            @foreach ($jobtitles as $d)
                                <option class="adjustsection section_{{ $d->section_id }}" style="display:none;"
                                    value="{{ $d->id }}">
                                    {{ $d->jobtitle_name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="col-12 col-md-6">
                        <label class="form-label">Expected Start Date <span class="text-danger">*</span></label>
                        {{ Form::date('date_startwork', null, ['class' => 'form-control', 'required' => 'required']) }}
                    </div>
                </div>
            </section>

            <!-- STEP 2 -->
            <h6>Responsibility</h6>
            <section>
                <div class="section-header">
                    <i class="ti ti-list-check"></i>
                    <div>
                        <h5>Role Scope & Responsibilities</h5>
                        <small class="text-dark">Define the reporting structure and key duties.</small>
                    </div>
                </div>

                <div class="row g-4">
                    <div class="col-md-6">
                        <label class="form-label">Direct Supervisor <span class="text-danger">*</span></label>
                        {{ Form::text('direct_superior', null, ['class' => 'form-control', 'placeholder' => 'e.g. Manager IT', 'required' => 'required']) }}
                    </div>

                    <div class="col-md-6">
                        <label class="form-label">Number of Subordinates</label>
                        {{ Form::number('direct_junior', null, ['class' => 'form-control', 'placeholder' => '0', 'min' => '0']) }}
                    </div>

                    <div class="col-12">
                        <label class="form-label">Job Description / Key Responsibilities <span
                                class="text-danger">*</span></label>
                        {{ Form::hidden('responsibility', null, ['id' => 'responsibility']) }}
                        <div class="responsibility"></div>
                        <div class="help-text text-end">Please list the main tasks concisely.</div>
                    </div>
                </div>
            </section>

            <!-- STEP 3 -->
            <h6>Requirements</h6>
            <section>
                <div class="section-header">
                    <i class="ti ti-school"></i>
                    <div>
                        <h5>Qualifications & Requirements</h5>
                        <small class="text-dark">Set criteria for the ideal candidate.</small>
                    </div>
                </div>

                <div class="row g-4">
                    <div class="col-md-4">
                        <label class="form-label">Education <span class="text-danger">*</span></label>
                        <select class="form-select" name="education_id" required>
                            <option value="" disabled selected>Min. Education</option>
                            @foreach ($educations as $d)
                                <option value="{{ $d->id }}">{{ $d->education_name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="col-md-4">
                        <label class="form-label">Major <span class="text-danger">*</span></label>
                        <select class="form-select" name="major_id" required>
                            <option value="" disabled selected>Required Major</option>
                            @foreach ($majors as $d)
                                <option value="{{ $d->id }}">{{ $d->major_name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="col-md-4">
                        <label class="form-label">Min. GPA (IPK) <span class="text-danger">*</span></label>
                        {{ Form::number('ipk', null, ['class' => 'form-control', 'step' => '0.01', 'placeholder' => '3.00', 'required' => 'required']) }}
                    </div>

                    <div class="col-md-12">
                        <label class="form-label">Gender Preference</label>
                        <div class="d-flex gap-3">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="gender" id="gender0"
                                    value="0" checked>
                                <label class="form-check-label" for="gender0">Any Gender</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="gender" id="gender1"
                                    value="1">
                                <label class="form-check-label" for="gender1">Male</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="gender" id="gender2"
                                    value="2">
                                <label class="form-check-label" for="gender2">Female</label>
                            </div>
                        </div>
                    </div>

                    <div class="col-12">
                        <label class="form-label">Required Experiences</label>
                        <div id="pengalamanContainer"></div>
                        <button type="button" id="addPengalaman" class="btn-add-experience mt-2">
                            <i class="ti ti-plus"></i> Add Experience
                        </button>
                    </div>

                    <div class="col-12 mt-3">
                        <label class="form-label">Special Skills / Additional Conditions</label>
                        {{ Form::hidden('special_conditions', null, ['id' => 'special_conditions']) }}
                        <div class="special_conditions"></div>
                    </div>
                </div>
            </section>

            <!-- STEP 4 -->
            <h6>Justification</h6>
            <section>
                <div class="section-header">
                    <i class="ti ti-file-text"></i>
                    <div>
                        <h5>Final Justification</h5>
                        <small class="text-dark">Explain why this position is needed.</small>
                    </div>
                </div>

                <div class="row g-4">
                    <div class="col-md-6">
                        <label class="form-label">Basis of Request <span class="text-danger">*</span></label>
                        <select class="form-select" name="request_basis" required>
                            <option value="" disabled selected>Select Basis</option>
                            <option value="Peningkatan Volume Kerja">Workload Increase</option>
                            <option value="Pengembangan Struktur Organisasi">Organizational Structural Development</option>
                        </select>
                    </div>

                    <div class="col-md-6">
                        <label class="form-label">Request Type <span class="text-danger">*</span></label>
                        <select class="form-select" name="request_basis_for" required>
                            <option value="" disabled selected>Select Type</option>
                            <option value="Resign">Replacement (Resignation)</option>
                            <option value="Mutasi">Replacement (Mutation)</option>
                            <option value="Promosi">Promotion</option>
                            <option value="Lainya">Other</option>
                        </select>
                    </div>

                    <div class="col-12">
                        <label class="form-label">Additional Remarks</label>
                        {{ Form::hidden('general_others', null, ['id' => 'general_others']) }}
                        <div class="general_others"></div>
                    </div>

                    <div class="col-12">
                        <div class="alert alert-light-primary d-flex align-items-center" role="alert">
                            <i class="ti ti-info-circle fs-4 me-2"></i>
                            <div>
                                Please review all entered information before submitting. Once submitted, the request will
                                enter the approval workflow.
                            </div>
                        </div>
                    </div>

                    <!-- Manual Submit Button Backup -->
                    <div class="col-12 text-end mt-4">
                        <button type="button" class="btn btn-success rounded-pill px-4 py-2 fw-bold"
                            onclick="submitFormManual()">
                            <i class="ti ti-send me-2"></i> Submit Request
                        </button>
                    </div>
                </div>
            </section>

            {!! Form::close() !!}
        </div>
    </div>
@endsection

@section('addJs')
    <script src="{{ asset('package/dist/libs/quill/dist/quill.min.js') }}"></script>
    <script src="{{ asset('package/dist/libs/jquery-steps/build/jquery.steps.min.js') }}"></script>
    <script src="{{ asset('package/dist/libs/jquery-validation/dist/jquery.validate.min.js') }}"></script>
    <script src="{{ asset('package/dist/libs/sweetalert2/dist/sweetalert2.min.js') }}"></script>

    <script>
        // Define submit function globally so explicit button can call it
        function submitFormManual() {
            var form = $("#formptk");
            if (form.valid()) {
                Swal.fire({
                    title: 'Are you sure?',
                    text: "Do you want to submit this PTK request?",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#10b981',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, Submit!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        form.submit();
                    }
                });
            } else {
                // Show validation error on the last step if any
                form.validate().focusInvalid();
            }
        }

        $(document).ready(function() {
            var form = $("#formptk");

            // 1. Initialize Validation
            form.validate({
                errorClass: "error",
                errorElement: "label",
                highlight: function(element) {
                    $(element).addClass("is-invalid");
                },
                unhighlight: function(element) {
                    $(element).removeClass("is-invalid");
                }
            });

            // 2. Initialize Steps Wizard
            form.children("div").steps({
                headerTag: "h6",
                bodyTag: "section",
                transitionEffect: "fade",
                titleTemplate: '<span class="number">#index#</span> <span class="title-text">#title#</span>',
                labels: {
                    finish: "Submit Request",
                    next: "Next",
                    previous: "Back"
                },
                onStepChanging: function(event, currentIndex, newIndex) {
                    // Always allow going back
                    if (currentIndex > newIndex) {
                        return true;
                    }

                    // Validate current step
                    if (currentIndex < newIndex) {
                        form.find(".body:eq(" + currentIndex + ") label.error").remove();
                        form.find(".body:eq(" + currentIndex + ") .error").removeClass("error");
                    }

                    form.validate().settings.ignore = ":disabled,:hidden";
                    return form.valid();
                },
                onFinishing: function(event, currentIndex) {
                    form.validate().settings.ignore = ":disabled";
                    return form.valid();
                },
                onFinished: function(event, currentIndex) {
                    submitFormManual();
                }
            });

            // 3. Setup Dependent Dropdowns
            function setupDependency(sourceId, targetId, prefix) {
                $("#" + sourceId).change(function() {
                    var val = $(this).val();
                    var target = $("#" + targetId);

                    target.find("option").each(function() {
                        if ($(this).val() == "") {
                            $(this).show(); // Always show placeholder
                        } else if ($(this).hasClass(prefix + val)) {
                            $(this).show();
                        } else {
                            $(this).hide();
                        }
                    });

                    target.val(""); // Reset selection
                });
            }

            setupDependency('division', 'department', 'division_');
            setupDependency('department', 'section', 'department_');

            $("#section").change(function() {
                var val = $(this).val();
                var target = $("select[name='jobtitle_id']");

                target.find("option").each(function() {
                    if ($(this).val() == "") {
                        $(this).show();
                    } else if ($(this).hasClass('section_' + val)) {
                        $(this).show();
                    } else {
                        $(this).hide();
                    }
                });

                target.val("");
            });

            // 4. Initialize Quill Editors
            function initQuill(id) {
                var element = document.querySelector("." + id);
                if (element) {
                    var quill = new Quill(element, {
                        theme: "snow",
                        placeholder: 'Type details here...',
                        modules: {
                            toolbar: [
                                ['bold', 'italic', 'underline'],
                                [{
                                    'list': 'ordered'
                                }, {
                                    'list': 'bullet'
                                }],
                                ['clean']
                            ]
                        }
                    });

                    quill.on('text-change', function() {
                        $("#" + id).val(quill.root.innerHTML);
                    });

                    // Initial load if any
                    var existingVal = $("#" + id).val();
                    if (existingVal) {
                        quill.root.innerHTML = existingVal;
                    }
                }
            }

            ['responsibility', 'special_conditions', 'general_others'].forEach(initQuill);

            // 5. Dynamic Experience
            $("#addPengalaman").click(function() {
                var html = `
                    <div class="experience-card">
                        <button type="button" class="delete-btn deletePengalaman">
                            <i class="ti ti-trash"></i>
                        </button>
                        <div class="row g-3">
                            <div class="col-md-8">
                                <label class="form-label small text-muted">Field of Expertise</label>
                                <select class="form-select form-select-sm" name="fields[]" required>
                                    <option value="" disabled selected>Select Field</option>
                                    @foreach ($fields as $d)
                                    <option value="{{ $d->id }}">{{ $d->field_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-4">
                                <label class="form-label small text-muted">Years</label>
                                <input type="number" name="tahun[]" class="form-control form-control-sm" placeholder="e.g 2" min="1" required>
                            </div>
                        </div>
                    </div>
                `;
                $("#pengalamanContainer").append(html);
            });

            $(document).on("click", ".deletePengalaman", function() {
                $(this).closest(".experience-card").remove();
            });
        });
    </script>
@endsection
