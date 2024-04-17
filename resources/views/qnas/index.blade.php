@extends('default')

@section('addCss')
<link rel="stylesheet" href="{{asset('package/dist/libs/datatables.net-bs5/css/dataTables.bootstrap5.min.css')}}">
@endsection

@section('addJs')
<script src="{{asset('package/dist/libs/datatables.net/js/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('package/dist/js/datatable/datatable-basic.init.js')}}"></script>
<script>
	new DataTable('#example', {
		scrollX: true
	});
</script>
@endsection

@section('content2')

<div class="d-flex justify-content-end mb-3"><a href="{{ route('qnas.create') }}" class="btn btn-info">Create</a></div>

<table id="example" class="table border table-bordered text-nowrap">
	<thead>
		<tr>
			<th>No</th>
			<th>Action</th>
			<th>exam_id</th>
			<th>question</th>
			<th>answer1</th>
			<th>answer2</th>
			<th>answer3</th>
			<th>answer4</th>
			<th>answer5</th>
			<th>key</th>
		</tr>
	</thead>
	<tbody>
		@foreach($qnas as $i => $qna)

		<tr>
			<td>{{ $i+1 }}</td>
			<td>
				<div class="d-flex gap-2">
					<a href="{{ route('qnas.show', [$qna->id]) }}" class="btn btn-sm btn-info">Show</a>
					<a href="{{ route('qnas.edit', [$qna->id]) }}" class="btn btn-sm btn-primary">Edit</a>
					{!! Form::open(['method' => 'DELETE','route' => ['qnas.destroy', $qna->id]]) !!}
					{!! Form::submit('Delete', ['class' => 'btn btn-sm btn-danger']) !!}
					{!! Form::close() !!}
				</div>
			</td>
			<td>{{ $qna->exam->exam_name }}</td>
			<td>{{ $qna->question }}</td>
			<td>{{ $qna->answer1 }}</td>
			<td>{{ $qna->answer2 }}</td>
			<td>{{ $qna->answer3 }}</td>
			<td>{{ $qna->answer4 }}</td>
			<td>{{ $qna->answer5 }}</td>
			<td>{{ $qna->key }}</td>
		</tr>

		@endforeach
	</tbody>
</table>
@stop