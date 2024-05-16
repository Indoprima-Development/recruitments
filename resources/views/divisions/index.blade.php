@extends('default')

@section('content')

	<div class="d-flex justify-content-end mb-3"><a href="{{ route('divisions.create') }}" class="btn btn-info">Create</a></div>

	<table class="table table-bordered">
		<thead>
			<tr>
				<th>No</th>
				<th>Division Name</th>

				<th>Action</th>
			</tr>
		</thead>
		<tbody>
			@foreach($divisions as $i => $division)

				<tr>
					<td>{{ $i+1 }}</td>
					<td>{{ $division->division_name }}</td>

					<td>
						<div class="d-flex gap-2">
                            <a href="{{ route('divisions.show', [$division->id]) }}" class="btn btn-info">Show</a>
                            <a href="{{ route('divisions.edit', [$division->id]) }}" class="btn btn-primary">Edit</a>
                            {!! Form::open(['method' => 'DELETE','route' => ['divisions.destroy', $division->id]]) !!}
                                {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                            {!! Form::close() !!}
                        </div>
					</td>
				</tr>

			@endforeach
		</tbody>
	</table>

@stop
