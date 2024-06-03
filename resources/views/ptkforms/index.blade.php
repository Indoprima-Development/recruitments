@extends('default')

@section('content')
@section('cardClass', "bg-light-primary")
	<div class="row">
        <div class="col-sm-6 col-md-8">
        <div class="mb-2">
            <h5 class="mb-0">Form PTK</h5>
        </div>
        <p class="card-subtitle mb-3">
            Permintaan Tenaga Kerja
        </p>
    </div>

        <div class="col-sm-6 col-md-4">
            <div class="d-flex justify-content-end mb-3"><a href="{{ route('ptkforms.create') }}" class="btn btn-info">Create</a></div>
        </div>
    </div>

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
			@foreach($ptkforms as $i => $ptkform)

				<tr>
					<td>{{ $i+1 }}</td>
					<td>{{ $ptkform->division->division_name }}</td>
					<td>{{ $ptkform->jobtitle->jobtitle_name }}</td>
					<td>{{ $ptkform->date_startwork }}</td>
					<td>
                        @if($ptkform->status == 0)
                            <span class="badge bg-primary">Created</span>
                        @else
                            <span class="badge bg-success">Distujui</span>
                        @endif
                    </td>

					<td>
						<div class="d-flex gap-2">
                            <a href="{{ route('ptkforms.show', [$ptkform->id]) }}" class="btn btn-sm btn-info">Show</a>
                            <a href="{{ route('ptkforms.edit', [$ptkform->id]) }}" class="btn btn-sm btn-primary">Edit</a>
                            {!! Form::open(['method' => 'DELETE','route' => ['ptkforms.destroy', $ptkform->id]]) !!}
                                {!! Form::submit('Delete', ['class' => 'btn btn-sm btn-danger']) !!}
                            {!! Form::close() !!}
                        </div>
					</td>
				</tr>

			@endforeach
		</tbody>
	</table>

@stop
