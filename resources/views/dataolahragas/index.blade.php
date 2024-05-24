@extends('default')

@section('content')

	<div class="d-flex justify-content-end mb-3"><a href="{{ route('dataolahragas.create') }}" class="btn btn-info">Create</a></div>

	<table class="table table-bordered">
		<thead>
			<tr>
				<th>id</th>
				<th>user_id</th>
				<th>olahraga</th>
				<th>level</th>

				<th>Action</th>
			</tr>
		</thead>
		<tbody>
			@foreach($dataolahragas as $dataolahraga)

				<tr>
					<td>{{ $dataolahraga->id }}</td>
					<td>{{ $dataolahraga->user_id }}</td>
					<td>{{ $dataolahraga->olahraga }}</td>
					<td>{{ $dataolahraga->level }}</td>

					<td>
						<div class="d-flex gap-2">
                            <a href="{{ route('dataolahragas.show', [$dataolahraga->id]) }}" class="btn btn-info">Show</a>
                            <a href="{{ route('dataolahragas.edit', [$dataolahraga->id]) }}" class="btn btn-primary">Edit</a>
                            {!! Form::open(['method' => 'DELETE','route' => ['dataolahragas.destroy', $dataolahraga->id]]) !!}
                                {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                            {!! Form::close() !!}
                        </div>
					</td>
				</tr>

			@endforeach
		</tbody>
	</table>

@stop
