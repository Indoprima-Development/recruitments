@extends('default')

@section('content')

	<div class="d-flex justify-content-end mb-3"><a href="{{ route('datapendidikannonformals.create') }}" class="btn btn-info">Create</a></div>

	<table class="table table-bordered">
		<thead>
			<tr>
				<th>id</th>
				<th>user_id</th>
				<th>jenis</th>
				<th>tingkat</th>
				<th>instansi</th>
				<th>jurusan</th>
				<th>date_start</th>
				<th>date_end</th>

				<th>Action</th>
			</tr>
		</thead>
		<tbody>
			@foreach($datapendidikannonformals as $datapendidikannonformal)

				<tr>
					<td>{{ $datapendidikannonformal->id }}</td>
					<td>{{ $datapendidikannonformal->user_id }}</td>
					<td>{{ $datapendidikannonformal->jenis }}</td>
					<td>{{ $datapendidikannonformal->tingkat }}</td>
					<td>{{ $datapendidikannonformal->instansi }}</td>
					<td>{{ $datapendidikannonformal->jurusan }}</td>
					<td>{{ $datapendidikannonformal->date_start }}</td>
					<td>{{ $datapendidikannonformal->date_end }}</td>

					<td>
						<div class="d-flex gap-2">
                            <a href="{{ route('datapendidikannonformals.show', [$datapendidikannonformal->id]) }}" class="btn btn-info">Show</a>
                            <a href="{{ route('datapendidikannonformals.edit', [$datapendidikannonformal->id]) }}" class="btn btn-primary">Edit</a>
                            {!! Form::open(['method' => 'DELETE','route' => ['datapendidikannonformals.destroy', $datapendidikannonformal->id]]) !!}
                                {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                            {!! Form::close() !!}
                        </div>
					</td>
				</tr>

			@endforeach
		</tbody>
	</table>

@stop
