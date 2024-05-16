@extends('default')

@section('content')

	<div class="d-flex justify-content-end mb-3"><a href="{{ route('majors.create') }}" class="btn btn-info">Create</a></div>

	<table class="table table-bordered">
		<thead>
			<tr>
				<th>id</th>
				<th>major_name</th>

				<th>Action</th>
			</tr>
		</thead>
		<tbody>
			@foreach($majors as $major)

				<tr>
					<td>{{ $major->id }}</td>
					<td>{{ $major->major_name }}</td>

					<td>
						<div class="d-flex gap-2">
                            <a href="{{ route('majors.show', [$major->id]) }}" class="btn btn-info">Show</a>
                            <a href="{{ route('majors.edit', [$major->id]) }}" class="btn btn-primary">Edit</a>
                            {!! Form::open(['method' => 'DELETE','route' => ['majors.destroy', $major->id]]) !!}
                                {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                            {!! Form::close() !!}
                        </div>
					</td>
				</tr>

			@endforeach
		</tbody>
	</table>

@stop
