@extends('default')

@section('content')

	<div class="d-flex justify-content-end mb-3"><a href="{{ route('locations.create') }}" class="btn btn-info">Create</a></div>

	<table class="table table-bordered">
		<thead>
			<tr>
				<th>No</th>
				<th>Location Name</th>

				<th>Action</th>
			</tr>
		</thead>
		<tbody>
			@foreach($locations as $i => $location)

				<tr>
					<td>{{ $i+1 }}</td>
					<td>{{ $location->location_name }}</td>

					<td>
						<div class="d-flex gap-2">
                            <a href="{{ route('locations.show', [$location->id]) }}" class="btn btn-info">Show</a>
                            <a href="{{ route('locations.edit', [$location->id]) }}" class="btn btn-primary">Edit</a>
                            {!! Form::open(['method' => 'DELETE','route' => ['locations.destroy', $location->id]]) !!}
                                {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                            {!! Form::close() !!}
                        </div>
					</td>
				</tr>

			@endforeach
		</tbody>
	</table>

@stop
