@extends('default')

@section('addCss')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" />
    <link rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/select2-bootstrap-5-theme@1.3.0/dist/select2-bootstrap-5-theme.min.css" />
    <style>
        .org-tabs .nav-link {
            font-weight: 600;
            color: #64748b;
        }

        .org-tabs .nav-link.active {
            color: #2563eb;
        }

        .org-tab-pane {
            padding-top: 1.25rem;
        }

        .select2-container--bootstrap-5 .select2-selection {
            border-color: #dee2e6;
        }

        /* Keep the No/Action columns the same size and alignment across all org tables. */
        .org-tab-pane table th:first-child,
        .org-tab-pane table td:first-child {
            width: 60px;
            text-align: center;
        }

        .org-tab-pane table th:last-child,
        .org-tab-pane table td:last-child {
            width: 140px;
            text-align: center;
        }

        .org-tab-pane table td:last-child .d-flex {
            justify-content: center;
        }
    </style>
@endsection

@section('content')

    @if ($errors->any())
        <div class="alert alert-danger">
            @foreach ($errors->all() as $error)
                {{ $error }} <br>
            @endforeach
        </div>
    @endif

    <div class="card">
        <div class="card-body">
            <ul class="nav nav-tabs org-tabs" id="orgTabs" role="tablist">
                <li class="nav-item" role="presentation">
                    <a class="nav-link active" id="divisions-tab" data-bs-toggle="tab" href="#divisions" role="tab">Divisions</a>
                </li>
                <li class="nav-item" role="presentation">
                    <a class="nav-link" id="departments-tab" data-bs-toggle="tab" href="#departments" role="tab">Departments</a>
                </li>
                <li class="nav-item" role="presentation">
                    <a class="nav-link" id="sections-tab" data-bs-toggle="tab" href="#sections" role="tab">Sections</a>
                </li>
                <li class="nav-item" role="presentation">
                    <a class="nav-link" id="jobtitles-tab" data-bs-toggle="tab" href="#jobtitles" role="tab">Job Titles</a>
                </li>
                <li class="nav-item" role="presentation">
                    <a class="nav-link" id="locations-tab" data-bs-toggle="tab" href="#locations" role="tab">Locations</a>
                </li>
            </ul>

            <div class="tab-content">
                <!-- DIVISIONS -->
                <div class="tab-pane fade show active org-tab-pane" id="divisions" role="tabpanel">
                    <div class="d-flex justify-content-end mb-3">
                        <button type="button" class="btn btn-info" data-bs-toggle="modal" data-bs-target="#addDivisionModal">
                            <i class="ti ti-plus"></i> Add Division
                        </button>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-bordered align-middle">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Division Name</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($divisions as $i => $division)
                                    <tr>
                                        <td>{{ $i + 1 }}</td>
                                        <td>{{ $division->division_name }}</td>
                                        <td>
                                            <div class="d-flex gap-2">
                                                <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal"
                                                    data-bs-target="#editDivisionModal" data-id="{{ $division->id }}"
                                                    data-name="{{ $division->division_name }}" title="Edit"><i class="ti ti-edit"></i></button>
                                                {!! Form::open(['method' => 'DELETE', 'route' => ['divisions.destroy', $division->id]]) !!}
                                                    <button type="submit" class="btn btn-danger btn-sm" title="Delete" onclick="return confirm('Delete this division?')"><i class="ti ti-trash"></i></button>
                                                {!! Form::close() !!}
                                            </div>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="3" class="text-center text-muted">No divisions yet.</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>

                <!-- DEPARTMENTS -->
                <div class="tab-pane fade org-tab-pane" id="departments" role="tabpanel">
                    <div class="d-flex justify-content-end mb-3">
                        <button type="button" class="btn btn-info" data-bs-toggle="modal" data-bs-target="#addDepartmentModal">
                            <i class="ti ti-plus"></i> Add Department
                        </button>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-bordered align-middle">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Division</th>
                                    <th>Department Name</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($departments as $i => $department)
                                    <tr>
                                        <td>{{ $i + 1 }}</td>
                                        <td>{{ $department->division->division_name ?? '-' }}</td>
                                        <td>{{ $department->department_name }}</td>
                                        <td>
                                            <div class="d-flex gap-2">
                                                <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal"
                                                    data-bs-target="#editDepartmentModal" data-id="{{ $department->id }}"
                                                    data-name="{{ $department->department_name }}"
                                                    data-division-id="{{ $department->division_id }}" title="Edit"><i class="ti ti-edit"></i></button>
                                                {!! Form::open(['method' => 'DELETE', 'route' => ['departments.destroy', $department->id]]) !!}
                                                    <button type="submit" class="btn btn-danger btn-sm" title="Delete" onclick="return confirm('Delete this department?')"><i class="ti ti-trash"></i></button>
                                                {!! Form::close() !!}
                                            </div>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="4" class="text-center text-muted">No departments yet.</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>

                <!-- SECTIONS -->
                <div class="tab-pane fade org-tab-pane" id="sections" role="tabpanel">
                    <div class="d-flex justify-content-end mb-3">
                        <button type="button" class="btn btn-info" data-bs-toggle="modal" data-bs-target="#addSectionModal">
                            <i class="ti ti-plus"></i> Add Section
                        </button>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-bordered align-middle">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Division</th>
                                    <th>Department</th>
                                    <th>Section Name</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($sections as $i => $section)
                                    <tr>
                                        <td>{{ $i + 1 }}</td>
                                        <td>{{ $section->department->division->division_name ?? '-' }}</td>
                                        <td>{{ $section->department->department_name ?? '-' }}</td>
                                        <td>{{ $section->section_name ?? '-' }}</td>
                                        <td>
                                            <div class="d-flex gap-2">
                                                <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal"
                                                    data-bs-target="#editSectionModal" data-id="{{ $section->id }}"
                                                    data-name="{{ $section->section_name }}"
                                                    data-department-id="{{ $section->department_id }}" title="Edit"><i class="ti ti-edit"></i></button>
                                                {!! Form::open(['method' => 'DELETE', 'route' => ['sections.destroy', $section->id]]) !!}
                                                    <button type="submit" class="btn btn-danger btn-sm" title="Delete" onclick="return confirm('Delete this section?')"><i class="ti ti-trash"></i></button>
                                                {!! Form::close() !!}
                                            </div>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="5" class="text-center text-muted">No sections yet.</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>

                <!-- JOB TITLES -->
                <div class="tab-pane fade org-tab-pane" id="jobtitles" role="tabpanel">
                    <div class="d-flex justify-content-end mb-3">
                        <button type="button" class="btn btn-info" data-bs-toggle="modal" data-bs-target="#addJobtitleModal">
                            <i class="ti ti-plus"></i> Add Job Title
                        </button>
                    </div>
                    <p class="text-muted small">Interview question sets can only be configured on the full edit page (link on each row).</p>
                    <div class="table-responsive">
                        <table class="table table-bordered align-middle">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Division</th>
                                    <th>Department</th>
                                    <th>Section</th>
                                    <th>Job Title Name</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($jobtitles as $i => $jobtitle)
                                    <tr>
                                        <td>{{ $i + 1 }}</td>
                                        <td>{{ $jobtitle->section->department->division->division_name ?? '-' }}</td>
                                        <td>{{ $jobtitle->section->department->department_name ?? '-' }}</td>
                                        <td>{{ $jobtitle->section->section_name ?? '-' }}</td>
                                        <td>{{ $jobtitle->jobtitle_name ?? '-' }}</td>
                                        <td>
                                            <div class="d-flex gap-2">
                                                <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal"
                                                    data-bs-target="#editJobtitleModal" data-id="{{ $jobtitle->id }}"
                                                    data-name="{{ $jobtitle->jobtitle_name }}"
                                                    data-section-id="{{ $jobtitle->section_id }}" title="Edit"><i class="ti ti-edit"></i></button>
                                                <a href="{{ route('jobtitles.edit', $jobtitle->id) }}" class="btn btn-secondary btn-sm" title="Configure interview questions"><i class="ti ti-adjustments"></i></a>
                                                {!! Form::open(['method' => 'DELETE', 'route' => ['jobtitles.destroy', $jobtitle->id]]) !!}
                                                    <button type="submit" class="btn btn-danger btn-sm" title="Delete" onclick="return confirm('Delete this job title?')"><i class="ti ti-trash"></i></button>
                                                {!! Form::close() !!}
                                            </div>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="6" class="text-center text-muted">No job titles yet.</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>

                <!-- LOCATIONS -->
                <div class="tab-pane fade org-tab-pane" id="locations" role="tabpanel">
                    <div class="d-flex justify-content-end mb-3">
                        <button type="button" class="btn btn-info" data-bs-toggle="modal" data-bs-target="#addLocationModal">
                            <i class="ti ti-plus"></i> Add Location
                        </button>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-bordered align-middle">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Location Name</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($locations as $i => $location)
                                    <tr>
                                        <td>{{ $i + 1 }}</td>
                                        <td>{{ $location->location_name }}</td>
                                        <td>
                                            <div class="d-flex gap-2">
                                                <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal"
                                                    data-bs-target="#editLocationModal" data-id="{{ $location->id }}"
                                                    data-name="{{ $location->location_name }}" title="Edit"><i class="ti ti-edit"></i></button>
                                                {!! Form::open(['method' => 'DELETE', 'route' => ['locations.destroy', $location->id]]) !!}
                                                    <button type="submit" class="btn btn-danger btn-sm" title="Delete" onclick="return confirm('Delete this location?')"><i class="ti ti-trash"></i></button>
                                                {!! Form::close() !!}
                                            </div>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="3" class="text-center text-muted">No locations yet.</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

@stop

@section('modals')

    <!-- ===================== MODALS ===================== -->

    <!-- Add Division -->
    <div class="modal fade" id="addDivisionModal" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                {!! Form::open(['route' => 'divisions.store']) !!}
                <div class="modal-header">
                    <h5 class="modal-title">Add Division</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        {{ Form::label('division_name', 'Division Name', ['class' => 'form-label']) }}
                        {{ Form::text('division_name', null, ['class' => 'form-control', 'required' => 'required']) }}
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    {{ Form::submit('Save', ['class' => 'btn btn-primary']) }}
                </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>

    <!-- Edit Division (shared, populated via JS) -->
    <div class="modal fade" id="editDivisionModal" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <form id="editDivisionForm" method="POST" action="">
                    @csrf
                    @method('PUT')
                    <div class="modal-header">
                        <h5 class="modal-title">Edit Division</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3">
                            <label class="form-label">Division Name</label>
                            <input type="text" name="division_name" id="editDivisionName" class="form-control" required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Add Department -->
    <div class="modal fade" id="addDepartmentModal" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                {!! Form::open(['route' => 'departments.store']) !!}
                <div class="modal-header">
                    <h5 class="modal-title">Add Department</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        {{ Form::label('division_id', 'Division', ['class' => 'form-label']) }}
                        {{ Form::select('division_id', $divisions->pluck('division_name', 'id'), null, ['class' => 'form-select select2-basic', 'required' => 'required', 'placeholder' => 'Select Division']) }}
                    </div>
                    <div class="mb-3">
                        {{ Form::label('department_name', 'Department Name', ['class' => 'form-label']) }}
                        {{ Form::text('department_name', null, ['class' => 'form-control', 'required' => 'required']) }}
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    {{ Form::submit('Save', ['class' => 'btn btn-primary']) }}
                </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>

    <!-- Edit Department -->
    <div class="modal fade" id="editDepartmentModal" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <form id="editDepartmentForm" method="POST" action="">
                    @csrf
                    @method('PUT')
                    <div class="modal-header">
                        <h5 class="modal-title">Edit Department</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3">
                            <label class="form-label">Division</label>
                            <select name="division_id" id="editDepartmentDivisionId" class="form-select select2-basic" required>
                                @foreach ($divisions as $d)
                                    <option value="{{ $d->id }}">{{ $d->division_name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Department Name</label>
                            <input type="text" name="department_name" id="editDepartmentName" class="form-control" required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Add Section -->
    <div class="modal fade" id="addSectionModal" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                {!! Form::open(['route' => 'sections.store']) !!}
                <div class="modal-header">
                    <h5 class="modal-title">Add Section</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        {{ Form::label('department_id', 'Department', ['class' => 'form-label']) }}
                        {{ Form::select('department_id', $departments->mapWithKeys(fn ($d) => [$d->id => ($d->division->division_name ?? '-') . ' - ' . $d->department_name]), null, ['class' => 'form-select select2-basic', 'required' => 'required', 'placeholder' => 'Select Department']) }}
                    </div>
                    <div class="mb-3">
                        {{ Form::label('section_name', 'Section Name', ['class' => 'form-label']) }}
                        {{ Form::text('section_name', null, ['class' => 'form-control', 'required' => 'required']) }}
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    {{ Form::submit('Save', ['class' => 'btn btn-primary']) }}
                </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>

    <!-- Edit Section -->
    <div class="modal fade" id="editSectionModal" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <form id="editSectionForm" method="POST" action="">
                    @csrf
                    @method('PUT')
                    <div class="modal-header">
                        <h5 class="modal-title">Edit Section</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3">
                            <label class="form-label">Department</label>
                            <select name="department_id" id="editSectionDepartmentId" class="form-select select2-basic" required>
                                @foreach ($departments as $d)
                                    <option value="{{ $d->id }}">{{ $d->division->division_name ?? '-' }} - {{ $d->department_name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Section Name</label>
                            <input type="text" name="section_name" id="editSectionName" class="form-control" required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Add Job Title -->
    <div class="modal fade" id="addJobtitleModal" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                {!! Form::open(['route' => 'jobtitles.store']) !!}
                <div class="modal-header">
                    <h5 class="modal-title">Add Job Title</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        {{ Form::label('section_id', 'Section', ['class' => 'form-label']) }}
                        {{ Form::select('section_id', $sections->mapWithKeys(fn ($s) => [$s->id => ($s->department->division->division_name ?? '-') . ' - ' . ($s->department->department_name ?? '-') . ' - ' . $s->section_name]), null, ['class' => 'form-select select2-basic', 'required' => 'required', 'placeholder' => 'Select Section']) }}
                    </div>
                    <div class="mb-3">
                        {{ Form::label('jobtitle_name', 'Job Title Name', ['class' => 'form-label']) }}
                        {{ Form::text('jobtitle_name', null, ['class' => 'form-control', 'required' => 'required']) }}
                    </div>
                    <p class="text-muted small mb-0">Interview questions can be added afterwards via the "Advanced" link on the row.</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    {{ Form::submit('Save', ['class' => 'btn btn-primary']) }}
                </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>

    <!-- Edit Job Title (name/section only; questions stay on the full edit page) -->
    <div class="modal fade" id="editJobtitleModal" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <form id="editJobtitleForm" method="POST" action="">
                    @csrf
                    @method('PUT')
                    <div class="modal-header">
                        <h5 class="modal-title">Edit Job Title</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3">
                            <label class="form-label">Section</label>
                            <select name="section_id" id="editJobtitleSectionId" class="form-select select2-basic" required>
                                @foreach ($sections as $s)
                                    <option value="{{ $s->id }}">{{ $s->department->division->division_name ?? '-' }} - {{ $s->department->department_name ?? '-' }} - {{ $s->section_name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Job Title Name</label>
                            <input type="text" name="jobtitle_name" id="editJobtitleName" class="form-control" required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Add Location -->
    <div class="modal fade" id="addLocationModal" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                {!! Form::open(['route' => 'locations.store']) !!}
                <div class="modal-header">
                    <h5 class="modal-title">Add Location</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        {{ Form::label('location_name', 'Location Name', ['class' => 'form-label']) }}
                        {{ Form::text('location_name', null, ['class' => 'form-control', 'required' => 'required']) }}
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    {{ Form::submit('Save', ['class' => 'btn btn-primary']) }}
                </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>

    <!-- Edit Location -->
    <div class="modal fade" id="editLocationModal" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <form id="editLocationForm" method="POST" action="">
                    @csrf
                    @method('PUT')
                    <div class="modal-header">
                        <h5 class="modal-title">Edit Location</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3">
                            <label class="form-label">Location Name</label>
                            <input type="text" name="location_name" id="editLocationName" class="form-control" required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

@stop

@section('addJs')
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script>
        $(document).ready(function() {
            // Init Select2 on the org selects, scoped to their own modal (needed for search input focus inside a Bootstrap modal).
            $('.select2-basic').each(function() {
                $(this).select2({
                    theme: 'bootstrap-5',
                    width: '100%',
                    dropdownParent: $(this).closest('.modal')
                });
            });

            // Keep the right tab active across page reloads (after Add/Edit/Delete submits).
            var hash = window.location.hash;
            if (hash) {
                var tabLink = document.querySelector('.org-tabs a[href="' + hash + '"]');
                if (tabLink) {
                    new bootstrap.Tab(tabLink).show();
                }
            }
            $('.org-tabs a[data-bs-toggle="tab"]').on('shown.bs.tab', function(e) {
                history.replaceState(null, '', e.target.getAttribute('href'));
            });

            // Populate "Edit" modals from the clicked row's data-* attributes.
            $('#editDivisionModal').on('show.bs.modal', function(e) {
                var btn = $(e.relatedTarget);
                var id = btn.data('id');
                $('#editDivisionForm').attr('action', '{{ url("divisions") }}/' + id);
                $('#editDivisionName').val(btn.data('name'));
            });

            $('#editDepartmentModal').on('show.bs.modal', function(e) {
                var btn = $(e.relatedTarget);
                var id = btn.data('id');
                $('#editDepartmentForm').attr('action', '{{ url("departments") }}/' + id);
                $('#editDepartmentName').val(btn.data('name'));
                $('#editDepartmentDivisionId').val(btn.data('division-id')).trigger('change');
            });

            $('#editSectionModal').on('show.bs.modal', function(e) {
                var btn = $(e.relatedTarget);
                var id = btn.data('id');
                $('#editSectionForm').attr('action', '{{ url("sections") }}/' + id);
                $('#editSectionName').val(btn.data('name'));
                $('#editSectionDepartmentId').val(btn.data('department-id')).trigger('change');
            });

            $('#editJobtitleModal').on('show.bs.modal', function(e) {
                var btn = $(e.relatedTarget);
                var id = btn.data('id');
                $('#editJobtitleForm').attr('action', '{{ url("jobtitles") }}/' + id);
                $('#editJobtitleName').val(btn.data('name'));
                $('#editJobtitleSectionId').val(btn.data('section-id')).trigger('change');
            });

            $('#editLocationModal').on('show.bs.modal', function(e) {
                var btn = $(e.relatedTarget);
                var id = btn.data('id');
                $('#editLocationForm').attr('action', '{{ url("locations") }}/' + id);
                $('#editLocationName').val(btn.data('name'));
            });
        });
    </script>
@endsection
