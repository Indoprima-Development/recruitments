@extends('default')

@section('content')

	<div class="d-flex justify-content-end mb-3"><a href="{{ route('datapengalamankerjas.create') }}" class="btn btn-info">Create</a></div>

	<table class="table table-bordered">
		<thead>
			<tr>
				<th>id</th>
				<th>user_id</th>
				<th>perusahaan</th>
				<th>jabatan_awal</th>
				<th>jabatan_terakhir</th>
				<th>gaji_awal</th>
				<th>gaji_akhir</th>
				<th>date_start</th>
				<th>date_end</th>
				<th>alasan_keluar</th>
				<th>surat_pengalaman</th>

				<th>Action</th>
			</tr>
		</thead>
		<tbody>
			@foreach($datapengalamankerjas as $datapengalamankerja)

				<tr>
					<td>{{ $datapengalamankerja->id }}</td>
					<td>{{ $datapengalamankerja->user_id }}</td>
					<td>{{ $datapengalamankerja->perusahaan }}</td>
					<td>{{ $datapengalamankerja->jabatan_awal }}</td>
					<td>{{ $datapengalamankerja->jabatan_terakhir }}</td>
					<td>{{ $datapengalamankerja->gaji_awal }}</td>
					<td>{{ $datapengalamankerja->gaji_akhir }}</td>
					<td>{{ $datapengalamankerja->date_start }}</td>
					<td>{{ $datapengalamankerja->date_end }}</td>
					<td>{{ $datapengalamankerja->alasan_keluar }}</td>
					<td>{{ $datapengalamankerja->surat_pengalaman }}</td>

					<td>
						<div class="d-flex gap-2">
                            <a href="{{ route('datapengalamankerjas.show', [$datapengalamankerja->id]) }}" class="btn btn-info">Show</a>
                            <a href="{{ route('datapengalamankerjas.edit', [$datapengalamankerja->id]) }}" class="btn btn-primary">Edit</a>
                            {!! Form::open(['method' => 'DELETE','route' => ['datapengalamankerjas.destroy', $datapengalamankerja->id]]) !!}
                                {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                            {!! Form::close() !!}
                        </div>
					</td>
				</tr>

			@endforeach
		</tbody>
	</table>

@stop
