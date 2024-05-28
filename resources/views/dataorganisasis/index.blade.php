@extends('default')

@section('content')

	<div class="d-flex justify-content-end mb-3"><a href="{{ route('dataorganisasis.create') }}" class="btn btn-info">Create</a></div>

	<table class="table table-bordered">
		<thead>
			<tr>
				<th>id</th>
				<th>user_id</th>
				<th>nama_organisasi</th>
				<th>tingkat</th>
				<th>start_date</th>
				<th>end_date</th>

				<th>Action</th>
			</tr>
		</thead>
		<tbody>
			@foreach($dataorganisasis as $dataorganisasi)

				<tr>
					<td>{{ $dataorganisasi->id }}</td>
					<td>{{ $dataorganisasi->user_id }}</td>
					<td>{{ $dataorganisasi->nama_organisasi }}</td>
					<td>{{ $dataorganisasi->tingkat }}</td>
					<td>{{ $dataorganisasi->start_date }}</td>
					<td>{{ $dataorganisasi->end_date }}</td>

					<td>
						<div class="d-flex gap-2">
                            <a href="{{ route('dataorganisasis.show', [$dataorganisasi->id]) }}" class="btn btn-info">Show</a>
                            <a href="{{ route('dataorganisasis.edit', [$dataorganisasi->id]) }}" class="btn btn-primary">Edit</a>
                            {!! Form::open(['method' => 'DELETE','route' => ['dataorganisasis.destroy', $dataorganisasi->id]]) !!}
                                {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                            {!! Form::close() !!}
                        </div>
					</td>
				</tr>

			@endforeach
		</tbody>
	</table>

@stop
