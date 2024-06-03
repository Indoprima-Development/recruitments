@extends('default')

@section('content2')
    <div class="card bg-info shadow-none position-relative overflow-hidden">
        <div class="card-body">
            <div class="row align-items-center">
                <div class="col-8">
                    <h4 class="fw-semibold mb-8 text-white">Formulir Tenaga Kerja</h4>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item text-white">Form PTK</li>
                        </ol>
                    </nav>
                </div>
                <div class="col-4">
                    <div class="text-center">
                        <a href="{{url('ptkforms/create')}}" class="card text-primary btn-outline-success rounded">
                            <div class="card-body">
                                <span>
                                    <i class="ti ti-archive fs-8"></i>
                                </span>
                                <h3 class="card-title text-primary">+ New PTK</h3>
                                <p class="card-text text-primary fw-normal">
                                    Ajukan Permintaan Tenaga Kerja
                                </p>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('content')
@section('cardClass', 'bg-light-primary')

<table id="zero_config" class="table table-bordered">
    <thead>
        <tr>
            <th>No</th>
            <th>Division</th>
            <th>Jobtitle</th>
            <th>Startwork</th>
            <th>Status</th>

            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($ptkforms as $i => $ptkform)
            <tr>
                <td>{{ $i + 1 }}</td>
                <td>{{ $ptkform->division->division_name }}</td>
                <td>{{ $ptkform->jobtitle->jobtitle_name }}</td>
                <td>{{ $ptkform->date_startwork }}</td>
                <td>
                    @if ($ptkform->status == 0)
                        <span class="badge bg-primary">Created</span>
                    @else
                        <span class="badge bg-success">Distujui</span>
                    @endif
                </td>

                <td>
                    <div class="d-flex gap-2">
                        <a href="{{ route('ptkforms.show', [$ptkform->id]) }}" class="btn btn-sm btn-info">Show</a>
                        <a href="{{ route('ptkforms.edit', [$ptkform->id]) }}" class="btn btn-sm btn-primary">Edit</a>
                        {!! Form::open(['method' => 'DELETE', 'route' => ['ptkforms.destroy', $ptkform->id]]) !!}
                        {!! Form::submit('Delete', ['class' => 'btn btn-sm btn-danger']) !!}
                        {!! Form::close() !!}
                    </div>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>

@stop
