@extends('default')

@section('content2')

	<div class="d-flex justify-content-end mb-3"><a href="{{ route('exams.create') }}" class="btn btn-info">Create</a></div>

	<table class="table table-bordered">
		<thead>
			<tr>
				<th>id</th>
				<th>project_id</th>
				<th>user_id</th>
				<th>exam_name</th>
				<th>date_start</th>
				<th>date_end</th>

				<th>Action</th>
			</tr>
		</thead>
		<tbody>
			@foreach($exams as $exam)

				<tr>
					<td>{{ $exam->id }}</td>
					<td>{{ $exam->project_id }}</td>
					<td>{{ $exam->user_id }}</td>
					<td>{{ $exam->exam_name }}</td>
					<td>{{ $exam->date_start }}</td>
					<td>{{ $exam->date_end }}</td>

					<td>
						<div class="d-flex gap-2">
                            <a href="{{ url('exams',EncryptData($exam->id)) }}/qnas" class="btn btn-info">Show</a>
                            <a href="{{ route('exams.edit', [$exam->id]) }}" class="btn btn-primary">Edit</a>
                            {!! Form::open(['method' => 'DELETE','route' => ['exams.destroy', $exam->id]]) !!}
                                {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                            {!! Form::close() !!}
                        </div>
					</td>
				</tr>

			@endforeach
		</tbody>
	</table>

@stop
