@extends('default')

@section('content')

	<div class="d-flex justify-content-end mb-3"><a href="{{ route('education.create') }}" class="btn btn-info">Create</a></div>

	<table class="table table-bordered">
		<thead>
			<tr>
				<th>id</th>
				<th>education_name</th>

				<th>Action</th>
			</tr>
		</thead>
		<tbody>
			@foreach($education as $education)

				<tr>
					<td>{{ $education->id }}</td>
					<td>{{ $education->education_name }}</td>

					<td>
						<div class="d-flex gap-2">
                            <a href="{{ route('education.show', [$education->id]) }}" class="btn btn-info">Show</a>
                            <a href="{{ route('education.edit', [$education->id]) }}" class="btn btn-primary">Edit</a>
                            {!! Form::open(['method' => 'DELETE','route' => ['education.destroy', $education->id]]) !!}
                                {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                            {!! Form::close() !!}
                        </div>
					</td>
				</tr>

			@endforeach
		</tbody>
	</table>

@stop
