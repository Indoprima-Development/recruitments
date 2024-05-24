@extends('default')

@section('content')

	<div class="d-flex justify-content-end mb-3"><a href="{{ route('datapendidikanformals.create') }}" class="btn btn-info">Create</a></div>

	<table class="table table-bordered">
		<thead>
			<tr>
				<th>id</th>
				<th>user_id</th>
				<th>tingkat</th>
				<th>instansi</th>
				<th>jurusan</th>
				<th>lulus_tahun</th>
				<th>nilai</th>

				<th>Action</th>
			</tr>
		</thead>
		<tbody>
			@foreach($datapendidikanformals as $datapendidikanformal)

				<tr>
					<td>{{ $datapendidikanformal->id }}</td>
					<td>{{ $datapendidikanformal->user_id }}</td>
					<td>{{ $datapendidikanformal->tingkat }}</td>
					<td>{{ $datapendidikanformal->instansi }}</td>
					<td>{{ $datapendidikanformal->jurusan }}</td>
					<td>{{ $datapendidikanformal->lulus_tahun }}</td>
					<td>{{ $datapendidikanformal->nilai }}</td>

					<td>
						<div class="d-flex gap-2">
                            <a href="{{ route('datapendidikanformals.show', [$datapendidikanformal->id]) }}" class="btn btn-info">Show</a>
                            <a href="{{ route('datapendidikanformals.edit', [$datapendidikanformal->id]) }}" class="btn btn-primary">Edit</a>
                            {!! Form::open(['method' => 'DELETE','route' => ['datapendidikanformals.destroy', $datapendidikanformal->id]]) !!}
                                {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                            {!! Form::close() !!}
                        </div>
					</td>
				</tr>

			@endforeach
		</tbody>
	</table>

@stop
