@extends('default')

@section('content')

	<div class="d-flex justify-content-end mb-3"><a href="{{ route('datadiris.create') }}" class="btn btn-info">Create</a></div>

	<table class="table table-bordered">
		<thead>
			<tr>
				<th>id</th>
				<th>user_id</th>
				<th>name</th>
				<th>gender</th>
				<th>tempat_lahir</th>
				<th>tanggal_lahir</th>
				<th>agama</th>
				<th>alamat</th>
				<th>no_hp</th>
				<th>no_wa</th>
				<th>status_rumah</th>
				<th>golongan_darah</th>
				<th>tinggi_badan</th>
				<th>berat_badan</th>
				<th>ktp</th>
				<th>kendaraan</th>
				<th>sim</th>
				<th>ekspektasi_gaji</th>
				<th>fasilitas_harapan</th>
				<th>kesediaan_penempatan</th>
				<th>kesediaan_mulai_bekerja</th>
				<th>image_jabatan_terakhir</th>
				<th>keterangan_jabatan_terakhir</th>

				<th>Action</th>
			</tr>
		</thead>
		<tbody>
			@foreach($datadiris as $datadiri)

				<tr>
					<td>{{ $datadiri->id }}</td>
					<td>{{ $datadiri->user_id }}</td>
					<td>{{ $datadiri->name }}</td>
					<td>{{ $datadiri->gender }}</td>
					<td>{{ $datadiri->tempat_lahir }}</td>
					<td>{{ $datadiri->tanggal_lahir }}</td>
					<td>{{ $datadiri->agama }}</td>
					<td>{{ $datadiri->alamat }}</td>
					<td>{{ $datadiri->no_hp }}</td>
					<td>{{ $datadiri->no_wa }}</td>
					<td>{{ $datadiri->status_rumah }}</td>
					<td>{{ $datadiri->golongan_darah }}</td>
					<td>{{ $datadiri->tinggi_badan }}</td>
					<td>{{ $datadiri->berat_badan }}</td>
					<td>{{ $datadiri->ktp }}</td>
					<td>{{ $datadiri->kendaraan }}</td>
					<td>{{ $datadiri->sim }}</td>
					<td>{{ $datadiri->ekspektasi_gaji }}</td>
					<td>{{ $datadiri->fasilitas_harapan }}</td>
					<td>{{ $datadiri->kesediaan_penempatan }}</td>
					<td>{{ $datadiri->kesediaan_mulai_bekerja }}</td>
					<td>{{ $datadiri->image_jabatan_terakhir }}</td>
					<td>{{ $datadiri->keterangan_jabatan_terakhir }}</td>

					<td>
						<div class="d-flex gap-2">
                            <a href="{{ route('datadiris.show', [$datadiri->id]) }}" class="btn btn-info">Show</a>
                            <a href="{{ route('datadiris.edit', [$datadiri->id]) }}" class="btn btn-primary">Edit</a>
                            {!! Form::open(['method' => 'DELETE','route' => ['datadiris.destroy', $datadiri->id]]) !!}
                                {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                            {!! Form::close() !!}
                        </div>
					</td>
				</tr>

			@endforeach
		</tbody>
	</table>

@stop
