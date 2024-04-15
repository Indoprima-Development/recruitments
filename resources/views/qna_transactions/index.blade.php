@extends('default')

@section('content')

	<div class="d-flex justify-content-end mb-3"><a href="{{ route('qna_transactions.create') }}" class="btn btn-info">Create</a></div>

	<table class="table table-bordered">
		<thead>
			<tr>
				<th>id</th>
				<th>qna_id</th>
				<th>user_id</th>
				<th>answer</th>
				<th>is_true</th>

				<th>Action</th>
			</tr>
		</thead>
		<tbody>
			@foreach($qna_transactions as $qna_transaction)

				<tr>
					<td>{{ $qna_transaction->id }}</td>
					<td>{{ $qna_transaction->qna_id }}</td>
					<td>{{ $qna_transaction->user_id }}</td>
					<td>{{ $qna_transaction->answer }}</td>
					<td>{{ $qna_transaction->is_true }}</td>

					<td>
						<div class="d-flex gap-2">
                            <a href="{{ route('qna_transactions.show', [$qna_transaction->id]) }}" class="btn btn-info">Show</a>
                            <a href="{{ route('qna_transactions.edit', [$qna_transaction->id]) }}" class="btn btn-primary">Edit</a>
                            {!! Form::open(['method' => 'DELETE','route' => ['qna_transactions.destroy', $qna_transaction->id]]) !!}
                                {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                            {!! Form::close() !!}
                        </div>
					</td>
				</tr>

			@endforeach
		</tbody>
	</table>

@stop
