@extends('default')

@section('content')
<div class="container-fluid">
	<div class="d-flex justify-content-end mb-3"><a href="{{ route('projects.create') }}" class="btn btn-info">Create</a></div>

	<table class="table table-bordered">
		<thead>
			<tr>
				<th>id</th>
				<th>project_name</th>
				<th>created_by</th>
				<th>is_can_take_multiple</th>
				<th>is_open</th>

				<th>Action</th>
			</tr>
		</thead>
		<tbody>
			@foreach($projects as $project)

			<tr>
				<td>{{ $project->id }}</td>
				<td>{{ $project->project_name }}</td>
				<td>{{ $project->created_by }}</td>
				<td>{{ $project->is_can_take_multiple }}</td>
				<td>{{ $project->is_open }}</td>

				<td>
					<div class="d-flex gap-2">
						<a href="{{ route('projects.show', [$project->id]) }}" class="btn btn-info">Show</a>
						<a href="{{ route('projects.edit', [$project->id]) }}" class="btn btn-primary">Edit</a>
						{!! Form::open(['method' => 'DELETE','route' => ['projects.destroy', $project->id]]) !!}
						{!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
						{!! Form::close() !!}
					</div>
				</td>
			</tr>

			@endforeach
		</tbody>
	</table>
</div>
@stop