@extends('default')

@section('content')

	<div class="d-flex justify-content-end mb-3"><a href="{{ route('fields.create') }}" class="btn btn-info">Create</a></div>

	<table class="table table-bordered">
		<thead>
			<tr>
				<th>id</th>
				<th>field_name</th>

				<th>Action</th>
			</tr>
		</thead>
		<tbody>
			@foreach($fields as $field)

				<tr>
					<td>{{ $field->id }}</td>
					<td>{{ $field->field_name }}</td>

					<td>
						<div class="d-flex gap-2">
                            <a href="{{ route('fields.show', [$field->id]) }}" class="btn btn-info">Show</a>
                            <a href="{{ route('fields.edit', [$field->id]) }}" class="btn btn-primary">Edit</a>
                            {!! Form::open(['method' => 'DELETE','route' => ['fields.destroy', $field->id]]) !!}
                                {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                            {!! Form::close() !!}
                        </div>
					</td>
				</tr>

			@endforeach
		</tbody>
	</table>

@stop
