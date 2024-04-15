@extends('default')

@section('content')

	<div class="d-flex justify-content-end mb-3"><a href="{{ route('exam_transactions.create') }}" class="btn btn-info">Create</a></div>

	<table class="table table-bordered">
		<thead>
			<tr>
				<th>id</th>
				<th>exam_id</th>
				<th>user_id</th>
				<th>is_open</th>
				<th>score</th>

				<th>Action</th>
			</tr>
		</thead>
		<tbody>
			@foreach($exam_transactions as $exam_transaction)

				<tr>
					<td>{{ $exam_transaction->id }}</td>
					<td>{{ $exam_transaction->exam_id }}</td>
					<td>{{ $exam_transaction->user_id }}</td>
					<td>{{ $exam_transaction->is_open }}</td>
					<td>{{ $exam_transaction->score }}</td>

					<td>
						<div class="d-flex gap-2">
                            <a href="{{ route('exam_transactions.show', [$exam_transaction->id]) }}" class="btn btn-info">Show</a>
                            <a href="{{ route('exam_transactions.edit', [$exam_transaction->id]) }}" class="btn btn-primary">Edit</a>
                            {!! Form::open(['method' => 'DELETE','route' => ['exam_transactions.destroy', $exam_transaction->id]]) !!}
                                {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                            {!! Form::close() !!}
                        </div>
					</td>
				</tr>

			@endforeach
		</tbody>
	</table>

@stop
