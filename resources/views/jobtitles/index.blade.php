@extends('default')

@section('content')

	<div class="d-flex justify-content-end mb-3"><a href="{{ route('jobtitles.create') }}" class="btn btn-info">Create</a></div>

	<table class="table table-bordered">
		<thead>
			<tr>
				<th>No</th>
				<th>Section</th>
				<th>Jobtitle Name</th>

				<th>Action</th>
			</tr>
		</thead>
		<tbody>
			@foreach($jobtitles as $i => $jobtitle)

				<tr>
					<td>{{ $i+1 }}</td>
					<td>{{ $jobtitle->section->section_name }}</td>
					<td>{{ $jobtitle->jobtitle_name }}</td>

					<td>
						<div class="d-flex gap-2">
                            <a href="{{ route('jobtitles.edit', [$jobtitle->id]) }}" class="btn btn-primary btn-sm">Edit</a>
                            {!! Form::open(['method' => 'DELETE','route' => ['jobtitles.destroy', $jobtitle->id]]) !!}
                                {!! Form::submit('Delete', ['class' => 'btn btn-danger btn-sm']) !!}
                            {!! Form::close() !!}
                        </div>
					</td>
				</tr>

			@endforeach
		</tbody>
	</table>

@stop
