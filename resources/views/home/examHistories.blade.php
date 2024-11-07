@extends('default')

@section('addCss')
    <link rel="stylesheet" href="{{ asset('package/dist/libs/datatables.net-bs5/css/dataTables.bootstrap5.min.css') }}">
@endsection

@section('content')
    <div class="mb-2">
        <h5 class="mb-0">Caution</h5>
    </div>
    <p class="card-subtitle mb-3">
        Recruitment results are absolute decisions by <code> PT.Indoprima Gemilang</code>.
    </p>
    <div class="table-responsive">
        <table id="zero_config" class="table border table-bordered text-nowrap">
            <thead>
                <!-- start row -->
                <tr>
                    <th class="text-center">No</th>
                    <th class="text-center">Exam</th>
                    <th class="text-center">Date Start</th>
                    <th class="text-center">Date Finish</th>
                    <!-- <th class="text-center">Score</th>
                        <th class="text-center">Status</th> -->
                </tr>
                <!-- end row -->
            </thead>
            <tbody>
                @foreach ($data['examTransaction'] as $i => $d)
                    <tr>
                        <td class="text-center">{{ $i + 1 }}</td>
                        <td class="text-center">{{ $d->exam->exam_name }}</td>
                        <td class="text-center">{{ $d->created_at }}</td>
                        <td class="text-center">{{ $d->updated_at }}</td>
                        @if (false)
                            <td class="text-center">{{ $d->score }}</td>
                            <td class="text-center">
                                @if ($d->score >= 80)
                                    <span class="badge fw-semibold py-1 bg-primary-subtle text-primary">LOLOS</span>
                                @else
                                    <span class="badge fw-semibold py-1 bg-danger-subtle text-danger">TIDAK LOLOS</span>
                                @endif
                            </td>
                        @endif
                    </tr>
                @endforeach
                <!-- end row -->
            </tbody>
        </table>
    </div>
@endsection

@section('addJs')
@endsection
