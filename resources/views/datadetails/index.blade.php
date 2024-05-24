@extends('default')

@section('content')

	<div class="d-flex justify-content-end mb-3"><a href="{{ route('datadetails.create') }}" class="btn btn-info">Create</a></div>

	<table class="table table-bordered">
		<thead>
			<tr>
				<th>id</th>
				<th>user_id</th>
				<th>tipe</th>
				<th>nama</th>
				<th>jabatan</th>
				<th>hubungan</th>

				<th>Action</th>
			</tr>
		</thead>
		<tbody>
			@foreach($datadetails as $datadetail)

				<tr>
					<td>{{ $datadetail->id }}</td>
					<td>{{ $datadetail->user_id }}</td>
					<td>{{ $datadetail->tipe }}</td>
					<td>{{ $datadetail->nama }}</td>
					<td>{{ $datadetail->jabatan }}</td>
					<td>{{ $datadetail->hubungan }}</td>

					<td>
						<div class="d-flex gap-2">
                            <a href="{{ route('datadetails.show', [$datadetail->id]) }}" class="btn btn-info">Show</a>
                            <a href="{{ route('datadetails.edit', [$datadetail->id]) }}" class="btn btn-primary">Edit</a>
                            {!! Form::open(['method' => 'DELETE','route' => ['datadetails.destroy', $datadetail->id]]) !!}
                                {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                            {!! Form::close() !!}
                        </div>
					</td>
				</tr>

			@endforeach
		</tbody>
	</table>

@stop
