@extends('default')

@section('content')

	<div class="d-flex justify-content-end mb-3"><a href="{{ route('ptkformactivities.create') }}" class="btn btn-info">Create</a></div>

	<table class="table table-bordered">
		<thead>
			<tr>
				<th>id</th>
				<th>ptkform_id</th>
				<th>user_id</th>
				<th>keterangan</th>

				<th>Action</th>
			</tr>
		</thead>
		<tbody>
			@foreach($ptkformactivities as $ptkformactivity)

				<tr>
					<td>{{ $ptkformactivity->id }}</td>
					<td>{{ $ptkformactivity->ptkform_id }}</td>
					<td>{{ $ptkformactivity->user_id }}</td>
					<td>{{ $ptkformactivity->keterangan }}</td>

					<td>
						<div class="d-flex gap-2">
                            <a href="{{ route('ptkformactivities.show', [$ptkformactivity->id]) }}" class="btn btn-info">Show</a>
                            <a href="{{ route('ptkformactivities.edit', [$ptkformactivity->id]) }}" class="btn btn-primary">Edit</a>
                            {!! Form::open(['method' => 'DELETE','route' => ['ptkformactivities.destroy', $ptkformactivity->id]]) !!}
                                {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                            {!! Form::close() !!}
                        </div>
					</td>
				</tr>

			@endforeach
		</tbody>
	</table>

@stop
