@extends('default')

@section('addCss')
<link rel="stylesheet" href="{{asset('package/dist/libs/datatables.net-bs5/css/dataTables.bootstrap5.min.css')}}">
@endsection

@section('addJs')
<script src="{{asset('package/dist/libs/datatables.net/js/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('package/dist/js/datatable/datatable-basic.init.js')}}"></script>
@endsection

@section('content2')
<div class="card bg-light-info shadow-none position-relative overflow-hidden">
	<div class="card-body px-4 py-3">
		<div class="row align-items-center">
			<div class="col-12">
				<h4 class="fw-semibold mb-8">{{$project->project_name}}</h4>
			</div>
		</div>
	</div>
</div>
<div class="d-flex justify-content-end mb-3"><a href="{{ route('exams.create') }}" class="btn btn-info">Create</a></div>

<table id="zero_config" class="table border table-bordered text-nowrap">
	<thead>
		<tr>
			<th>No</th>
			<th>Exam name</th>
			<th>Start</th>
			<th>End</th>

			<th>Action</th>
		</tr>
	</thead>
	<tbody>
		@foreach($exams as $exam)

		<tr>
			<td>{{ $exam->id }}</td>
			<td>{{ $exam->exam_name }}</td>
			<td>{{ $exam->date_start }}</td>
			<td>{{ $exam->date_end }}</td>

			<td>
				<div class="d-flex gap-2">
					<a href="{{ url('exams',EncryptData($exam->id)) }}/qnas" class="btn btn-sm btn-info">Show</a>
					<a href="{{ route('exams.edit', [$exam->id]) }}" class="btn btn-sm btn-primary">Edit</a>
					{!! Form::open(['method' => 'DELETE','route' => ['exams.destroy', $exam->id]]) !!}
					{!! Form::submit('Delete', ['class' => 'btn btn-sm btn-danger']) !!}
					{!! Form::close() !!}
					<a href="{{ url('rank-test',EncryptData($exam->id)) }}" class="btn btn-sm btn-success">Rank</a>
				</div>
			</td>
		</tr>

		@endforeach
	</tbody>
</table>

@stop