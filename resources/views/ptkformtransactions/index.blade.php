@extends('default')

@section('content')

	<div class="d-flex justify-content-end mb-3"><a href="{{ route('ptkformtransactions.create') }}" class="btn btn-info">Create</a></div>

	<table class="table table-bordered">
		<thead>
			<tr>
				<th>id</th>
				<th>ptkform_id</th>
				<th>status</th>
				<th>user_id</th>

				<th>Action</th>
			</tr>
		</thead>
		<tbody>
			@foreach($ptkformtransactions as $ptkformtransaction)

				<tr>
					<td>{{ $ptkformtransaction->id }}</td>
					<td>{{ $ptkformtransaction->ptkform_id }}</td>
					<td>{{ $ptkformtransaction->status }}</td>
					<td>{{ $ptkformtransaction->user_id }}</td>

					<td>
						<div class="d-flex gap-2">
                            <a href="{{ route('ptkformtransactions.show', [$ptkformtransaction->id]) }}" class="btn btn-info">Show</a>
                            <a href="{{ route('ptkformtransactions.edit', [$ptkformtransaction->id]) }}" class="btn btn-primary">Edit</a>
                            {!! Form::open(['method' => 'DELETE','route' => ['ptkformtransactions.destroy', $ptkformtransaction->id]]) !!}
                                {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                            {!! Form::close() !!}
                        </div>
					</td>
				</tr>

			@endforeach
		</tbody>
	</table>

@stop
