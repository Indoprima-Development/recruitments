@extends('default')

@section('content')

	<div class="d-flex justify-content-end mb-3"><a href="{{ route('datakemampuans.create') }}" class="btn btn-info">Create</a></div>

	<table class="table table-bordered">
		<thead>
			<tr>
				<th>id</th>
				<th>user_id</th>
				<th>kemampuan</th>
				<th>level</th>

				<th>Action</th>
			</tr>
		</thead>
		<tbody>
			@foreach($datakemampuans as $datakemampuan)

				<tr>
					<td>{{ $datakemampuan->id }}</td>
					<td>{{ $datakemampuan->user_id }}</td>
					<td>{{ $datakemampuan->kemampuan }}</td>
					<td>{{ $datakemampuan->level }}</td>

					<td>
						<div class="d-flex gap-2">
                            <a href="{{ route('datakemampuans.show', [$datakemampuan->id]) }}" class="btn btn-info">Show</a>
                            <a href="{{ route('datakemampuans.edit', [$datakemampuan->id]) }}" class="btn btn-primary">Edit</a>
                            {!! Form::open(['method' => 'DELETE','route' => ['datakemampuans.destroy', $datakemampuan->id]]) !!}
                                {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                            {!! Form::close() !!}
                        </div>
					</td>
				</tr>

			@endforeach
		</tbody>
	</table>

@stop
