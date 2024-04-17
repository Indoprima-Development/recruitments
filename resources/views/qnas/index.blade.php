@extends('default')

@section('content2')

	<div class="d-flex justify-content-end mb-3"><a href="{{ route('qnas.create') }}" class="btn btn-info">Create</a></div>

	<table class="table table-bordered">
		<thead>
			<tr>
				<th>id</th>
				<th>exam_id</th>
				<th>user_id</th>
				<th>question</th>
				<th>answer1</th>
				<th>answer2</th>
				<th>answer3</th>
				<th>answer4</th>
				<th>answer5</th>
				<th>key</th>
				<th>Action</th>
			</tr>
		</thead>
		<tbody>
			@foreach($qnas as $i => $qna)

				<tr>
					<td>{{ $i+1 }}</td>
					<td>{{ $qna->exam_id }}</td>
					<td>{{ $qna->user_id }}</td>
					<td>{{ $qna->question }}</td>
					<td>{{ $qna->answer1 }}</td>
					<td>{{ $qna->answer2 }}</td>
					<td>{{ $qna->answer3 }}</td>
					<td>{{ $qna->answer4 }}</td>
					<td>{{ $qna->answer5 }}</td>
					<td>{{ $qna->key }}</td>
					<td>
						<div class="d-flex gap-2">
                            <a href="{{ route('qnas.show', [$qna->id]) }}" class="btn btn-info">Show</a>
                            <a href="{{ route('qnas.edit', [$qna->id]) }}" class="btn btn-primary">Edit</a>
                            {!! Form::open(['method' => 'DELETE','route' => ['qnas.destroy', $qna->id]]) !!}
                                {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                            {!! Form::close() !!}
                        </div>
					</td>
				</tr>

			@endforeach
		</tbody>
	</table>

@stop
