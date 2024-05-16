@extends('default')

@section('content')

	<div class="d-flex justify-content-end mb-3"><a href="{{ route('jobtitles.create') }}" class="btn btn-info">Create</a></div>

	<table class="table table-bordered">
		<thead>
			<tr>
				<th>id</th>
				<th>section_id</th>
				<th>jobtitle_name</th>

				<th>Action</th>
			</tr>
		</thead>
		<tbody>
			@foreach($jobtitles as $jobtitle)

				<tr>
					<td>{{ $jobtitle->id }}</td>
					<td>{{ $jobtitle->section_id }}</td>
					<td>{{ $jobtitle->jobtitle_name }}</td>

					<td>
						<div class="d-flex gap-2">
                            <a href="{{ route('jobtitles.show', [$jobtitle->id]) }}" class="btn btn-info">Show</a>
                            <a href="{{ route('jobtitles.edit', [$jobtitle->id]) }}" class="btn btn-primary">Edit</a>
                            {!! Form::open(['method' => 'DELETE','route' => ['jobtitles.destroy', $jobtitle->id]]) !!}
                                {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                            {!! Form::close() !!}
                        </div>
					</td>
				</tr>

			@endforeach
		</tbody>
	</table>

@stop
