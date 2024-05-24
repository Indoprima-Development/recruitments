@extends('default')

@section('content')

	<div class="d-flex justify-content-end mb-3"><a href="{{ route('datakeluargas.create') }}" class="btn btn-info">Create</a></div>

	<table class="table table-bordered">
		<thead>
			<tr>
				<th>id</th>
				<th>user_id</th>
				<th>status_hubungan</th>
				<th>nama_keluarga</th>
				<th>tempat_lahir_keluarga</th>
				<th>tanggal_lahir_keluarga</th>
				<th>pekerjaan</th>
				<th>alamat</th>

				<th>Action</th>
			</tr>
		</thead>
		<tbody>
			@foreach($datakeluargas as $datakeluarga)

				<tr>
					<td>{{ $datakeluarga->id }}</td>
					<td>{{ $datakeluarga->user_id }}</td>
					<td>{{ $datakeluarga->status_hubungan }}</td>
					<td>{{ $datakeluarga->nama_keluarga }}</td>
					<td>{{ $datakeluarga->tempat_lahir_keluarga }}</td>
					<td>{{ $datakeluarga->tanggal_lahir_keluarga }}</td>
					<td>{{ $datakeluarga->pekerjaan }}</td>
					<td>{{ $datakeluarga->alamat }}</td>

					<td>
						<div class="d-flex gap-2">
                            <a href="{{ route('datakeluargas.show', [$datakeluarga->id]) }}" class="btn btn-info">Show</a>
                            <a href="{{ route('datakeluargas.edit', [$datakeluarga->id]) }}" class="btn btn-primary">Edit</a>
                            {!! Form::open(['method' => 'DELETE','route' => ['datakeluargas.destroy', $datakeluarga->id]]) !!}
                                {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                            {!! Form::close() !!}
                        </div>
					</td>
				</tr>

			@endforeach
		</tbody>
	</table>

@stop
