@extends('default')

@section('content')

	<div class="d-flex justify-content-end mb-3"><a href="{{ route('project_transactions.create') }}" class="btn btn-info">Create</a></div>

	<table class="table table-bordered">
		<thead>
			<tr>
				<th>id</th>
				<th>project_id</th>
				<th>user_id</th>
				<th>is_open</th>

				<th>Action</th>
			</tr>
		</thead>
		<tbody>
			@foreach($project_transactions as $project_transaction)

				<tr>
					<td>{{ $project_transaction->id }}</td>
					<td>{{ $project_transaction->project_id }}</td>
					<td>{{ $project_transaction->user_id }}</td>
					<td>{{ $project_transaction->is_open }}</td>

					<td>
						<div class="d-flex gap-2">
                            <a href="{{ route('project_transactions.show', [$project_transaction->id]) }}" class="btn btn-info">Show</a>
                            <a href="{{ route('project_transactions.edit', [$project_transaction->id]) }}" class="btn btn-primary">Edit</a>
                            {!! Form::open(['method' => 'DELETE','route' => ['project_transactions.destroy', $project_transaction->id]]) !!}
                                {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                            {!! Form::close() !!}
                        </div>
					</td>
				</tr>

			@endforeach
		</tbody>
	</table>

@stop
