@extends('default')

@section('content')

	<div class="d-flex justify-content-end mb-3"><a href="{{ route('sections.create') }}" class="btn btn-info">Create</a></div>

	<table class="table table-bordered">
		<thead>
			<tr>
				<th>id</th>
				<th>department_id</th>
				<th>section_name</th>

				<th>Action</th>
			</tr>
		</thead>
		<tbody>
			@foreach($sections as $section)

				<tr>
					<td>{{ $section->id }}</td>
					<td>{{ $section->department_id }}</td>
					<td>{{ $section->section_name }}</td>

					<td>
						<div class="d-flex gap-2">
                            <a href="{{ route('sections.show', [$section->id]) }}" class="btn btn-info">Show</a>
                            <a href="{{ route('sections.edit', [$section->id]) }}" class="btn btn-primary">Edit</a>
                            {!! Form::open(['method' => 'DELETE','route' => ['sections.destroy', $section->id]]) !!}
                                {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                            {!! Form::close() !!}
                        </div>
					</td>
				</tr>

			@endforeach
		</tbody>
	</table>

@stop
