@extends('default')

@section('content')

	<div class="d-flex justify-content-end mb-3"><a href="{{ route('departments.create') }}" class="btn btn-info">Create</a></div>

	<table class="table table-bordered">
		<thead>
			<tr>
				<th>id</th>
				<th>division_id</th>
				<th>department_name</th>

				<th>Action</th>
			</tr>
		</thead>
		<tbody>
			@foreach($departments as $department)

				<tr>
					<td>{{ $department->id }}</td>
					<td>{{ $department->division_id }}</td>
					<td>{{ $department->department_name }}</td>

					<td>
						<div class="d-flex gap-2">
                            <a href="{{ route('departments.show', [$department->id]) }}" class="btn btn-info">Show</a>
                            <a href="{{ route('departments.edit', [$department->id]) }}" class="btn btn-primary">Edit</a>
                            {!! Form::open(['method' => 'DELETE','route' => ['departments.destroy', $department->id]]) !!}
                                {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                            {!! Form::close() !!}
                        </div>
					</td>
				</tr>

			@endforeach
		</tbody>
	</table>

@stop
