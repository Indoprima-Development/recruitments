@extends('default')

@section('content')

	@if($errors->any())
		<div class="alert alert-danger">
			@foreach ($errors->all() as $error)
				{{ $error }} <br>
			@endforeach
		</div>
	@endif

	{!! Form::open(['route' => 'datapengalamankerjas.store']) !!}

		<div class="mb-3">
			{{ Form::label('user_id', 'User_id', ['class'=>'form-label']) }}
			{{ Form::text('user_id', null, array('class' => 'form-control')) }}
		</div>
		<div class="mb-3">
			{{ Form::label('perusahaan', 'Perusahaan', ['class'=>'form-label']) }}
			{{ Form::textarea('perusahaan', null, array('class' => 'form-control')) }}
		</div>
		<div class="mb-3">
			{{ Form::label('jabatan_awal', 'Jabatan_awal', ['class'=>'form-label']) }}
			{{ Form::textarea('jabatan_awal', null, array('class' => 'form-control')) }}
		</div>
		<div class="mb-3">
			{{ Form::label('jabatan_terakhir', 'Jabatan_terakhir', ['class'=>'form-label']) }}
			{{ Form::textarea('jabatan_terakhir', null, array('class' => 'form-control')) }}
		</div>
		<div class="mb-3">
			{{ Form::label('gaji_awal', 'Gaji_awal', ['class'=>'form-label']) }}
			{{ Form::text('gaji_awal', null, array('class' => 'form-control')) }}
		</div>
		<div class="mb-3">
			{{ Form::label('gaji_akhir', 'Gaji_akhir', ['class'=>'form-label']) }}
			{{ Form::text('gaji_akhir', null, array('class' => 'form-control')) }}
		</div>
		<div class="mb-3">
			{{ Form::label('date_start', 'Date_start', ['class'=>'form-label']) }}
			{{ Form::textarea('date_start', null, array('class' => 'form-control')) }}
		</div>
		<div class="mb-3">
			{{ Form::label('date_end', 'Date_end', ['class'=>'form-label']) }}
			{{ Form::textarea('date_end', null, array('class' => 'form-control')) }}
		</div>
		<div class="mb-3">
			{{ Form::label('alasan_keluar', 'Alasan_keluar', ['class'=>'form-label']) }}
			{{ Form::textarea('alasan_keluar', null, array('class' => 'form-control')) }}
		</div>
		<div class="mb-3">
			{{ Form::label('surat_pengalaman', 'Surat_pengalaman', ['class'=>'form-label']) }}
			{{ Form::textarea('surat_pengalaman', null, array('class' => 'form-control')) }}
		</div>


		{{ Form::submit('Create', array('class' => 'btn btn-primary')) }}

	{{ Form::close() }}


@stop