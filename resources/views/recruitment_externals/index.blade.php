@extends('default')

@section('content')

    <div class="d-flex justify-content-between mb-3">
        <h4>Recruitment Externals</h4>
        <div class="d-flex gap-2">
            <a href="{{ route('recruitment_externals.downloadTemplate') }}" class="btn btn-secondary">Download Template</a>
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#uploadModal">
                Upload Excel
            </button>
        </div>
    </div>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    @if(session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif
    @if($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="table-responsive">
        <table class="table table-bordered table-striped" style="white-space: nowrap;">
            <thead>
                <tr>
                    <th>No.</th>
                    <th>Nama</th>
                    <th>Month</th>
                    <th>Connect Sent</th>
                    <th>Connected</th>
                    <th>Approached</th>
                    <th>Responded</th>
                    <th>Level</th>
                    <th>Position</th>
                    <th>Plant/Division</th>
                    <th>Level Pendidikan</th>
                    <th>Campus</th>
                    <th>Jurusan</th>
                    <th>Sumber</th>
                    <th>PIC</th>
                    <th>Date 1</th>
                    <th>Result/Note 1</th>
                    <th>Date 2</th>
                    <th>Result/Note 2</th>
                    <th>Date 3</th>
                    <th>Result/Note 3</th>
                    <th>Date 4</th>
                    <th>Month 2</th>
                    <th>Result/Note 4</th>
                    <th>Date 5</th>
                    <th>Result Director</th>
                    <th>Interview</th>
                    <th>Connect</th>
                    <th>Approach</th>
                    <th>Committee</th>
                    <th>OK</th>
                    <th>Experience</th>
                    <th>Technical</th>
                    <th>Psikotes</th>
                </tr>
            </thead>
            <tbody>
                @forelse($data as $row)
                    <tr>
                        <td>{{ $row->no }}</td>
                        <td>{{ $row->nama }}</td>
                        <td>{{ $row->month_1 }}</td>
                        <td>{{ $row->connect_sent }}</td>
                        <td>{{ $row->connected }}</td>
                        <td>{{ $row->approached }}</td>
                        <td>{{ $row->responded }}</td>
                        <td>{{ $row->level }}</td>
                        <td>{{ $row->position }}</td>
                        <td>{{ $row->plant_division }}</td>
                        <td>{{ $row->level_pendidikan }}</td>
                        <td>{{ $row->campus }}</td>
                        <td>{{ $row->jurusan }}</td>
                        <td>{{ $row->sumber }}</td>
                        <td>{{ $row->pic }}</td>
                        <td>{{ $row->date_1 }}</td>
                        <td>{{ $row->result_note_1 }}</td>
                        <td>{{ $row->date_2 }}</td>
                        <td>{{ $row->result_note_2 }}</td>
                        <td>{{ $row->date_3 }}</td>
                        <td>{{ $row->result_note_3 }}</td>
                        <td>{{ $row->date_4 }}</td>
                        <td>{{ $row->month_2 }}</td>
                        <td>{{ $row->result_note_4 }}</td>
                        <td>{{ $row->date_5 }}</td>
                        <td>{{ $row->result_director }}</td>
                        <td>{{ $row->interview }}</td>
                        <td>{{ $row->connect }}</td>
                        <td>{{ $row->approach }}</td>
                        <td>{{ $row->committee }}</td>
                        <td>{{ $row->ok }}</td>
                        <td>{{ $row->experience }}</td>
                        <td>{{ $row->technical }}</td>
                        <td>{{ $row->psikotes }}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="34" class="text-center">No data available</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

@stop

@section('modals')
    <!-- Upload Modal -->
    <div class="modal fade" id="uploadModal" tabindex="-1" aria-labelledby="uploadModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form id="uploadForm" action="{{ route('recruitment_externals.upload') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-header">
                        <h5 class="modal-title" id="uploadModalLabel">Upload Excel Data</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="file" class="form-label">Excel File (.xlsx, .xls, .csv)</label>
                            <input type="file" class="form-control" id="file" name="file" required accept=".xlsx, .xls, .csv">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary" id="btnUpload">
                            <span class="spinner-border spinner-border-sm d-none" id="uploadSpinner" role="status" aria-hidden="true"></span>
                            <span id="uploadText">Upload</span>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@stop

@section('addJs')
<script>
    document.getElementById('uploadForm').addEventListener('submit', function() {
        var btn = document.getElementById('btnUpload');
        var spinner = document.getElementById('uploadSpinner');
        var text = document.getElementById('uploadText');
        
        btn.disabled = true;
        spinner.classList.remove('d-none');
        text.innerText = 'Uploading... Please wait...';
    });
</script>
@endsection
