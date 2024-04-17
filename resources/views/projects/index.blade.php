@extends('default')

@section('content')
<div class="container-fluid">
	<div class="d-flex justify-content-end mb-3"><a href="{{ route('projects.create') }}" class="btn btn-info">Create</a></div>

	<table class="table table-bordered">
		<thead>
			<tr>
				<th>No</th>
				<th>Project Name</th>
				<th>Is can take multiple</th>
				<th>Is open</th>

				<th>Action</th>
			</tr>
		</thead>
		<tbody>
			@foreach($projects as $i => $project)

			<tr>
				<td>{{ $i+1 }}</td>
				<td>{{ $project->project_name }}</td>
				<td>
					<span class="badge fw-semibold py-1 w-85 bg-{{ $project->is_can_take_multiple ? 'primary':'danger' }}-subtle text-{{ $project->is_can_take_multiple ? 'primary':'danger' }}">{{ $project->is_can_take_multiple ? 'Yes':'No' }}</span>
				</td>
				<td>
					<span class="badge fw-semibold py-1 w-85 bg-{{ $project->is_open ? 'primary':'danger' }}-subtle text-{{ $project->is_open ? 'primary':'danger' }}">{{ $project->is_open ? 'Open':'Closed' }}</span>
				</td>

				<td>
					<div class="d-flex gap-2">
						<a href="{{ url('projects', EncryptData($project->id)) }}/exams" class="btn btn-sm btn-info">Show</a>
						<a href="{{ route('projects.edit', [$project->id]) }}" class="btn btn-sm btn-primary">Edit</a>
						{!! Form::open(['method' => 'DELETE','route' => ['projects.destroy', $project->id]]) !!}
						{!! Form::submit('Delete', ['class' => 'btn btn-sm btn-danger']) !!}
						{!! Form::close() !!}
					</div>
				</td>
			</tr>

			@endforeach
		</tbody>
	</table>
</div>
@stop