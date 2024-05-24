@extends('default')

@section('content')

	@if($errors->any())
		<div class="alert alert-danger">
			@foreach ($errors->all() as $error)
				{{ $error }} <br>
			@endforeach
		</div>
	@endif

	{{ Form::model($datadiri, array('route' => array('datadiris.update', $datadiri->id), 'method' => 'PUT')) }}

		<div class="mb-3">
			{{ Form::label('user_id', 'User_id', ['class'=>'form-label']) }}
			{{ Form::text('user_id', null, array('class' => 'form-control')) }}
		</div>
		<div class="mb-3">
			{{ Form::label('name', 'Name', ['class'=>'form-label']) }}
			{{ Form::textarea('name', null, array('class' => 'form-control')) }}
		</div>
		<div class="mb-3">
			{{ Form::label('gender', 'Gender', ['class'=>'form-label']) }}
			{{ Form::string('gender', null, array('class' => 'form-control')) }}
		</div>
		<div class="mb-3">
			{{ Form::label('tempat_lahir', 'Tempat_lahir', ['class'=>'form-label']) }}
			{{ Form::textarea('tempat_lahir', null, array('class' => 'form-control')) }}
		</div>
		<div class="mb-3">
			{{ Form::label('tanggal_lahir', 'Tanggal_lahir', ['class'=>'form-label']) }}
			{{ Form::textarea('tanggal_lahir', null, array('class' => 'form-control')) }}
		</div>
		<div class="mb-3">
			{{ Form::label('agama', 'Agama', ['class'=>'form-label']) }}
			{{ Form::textarea('agama', null, array('class' => 'form-control')) }}
		</div>
		<div class="mb-3">
			{{ Form::label('alamat', 'Alamat', ['class'=>'form-label']) }}
			{{ Form::textarea('alamat', null, array('class' => 'form-control')) }}
		</div>
		<div class="mb-3">
			{{ Form::label('no_hp', 'No_hp', ['class'=>'form-label']) }}
			{{ Form::textarea('no_hp', null, array('class' => 'form-control')) }}
		</div>
		<div class="mb-3">
			{{ Form::label('no_wa', 'No_wa', ['class'=>'form-label']) }}
			{{ Form::textarea('no_wa', null, array('class' => 'form-control')) }}
		</div>
		<div class="mb-3">
			{{ Form::label('status_rumah', 'Status_rumah', ['class'=>'form-label']) }}
			{{ Form::textarea('status_rumah', null, array('class' => 'form-control')) }}
		</div>
		<div class="mb-3">
			{{ Form::label('golongan_darah', 'Golongan_darah', ['class'=>'form-label']) }}
			{{ Form::textarea('golongan_darah', null, array('class' => 'form-control')) }}
		</div>
		<div class="mb-3">
			{{ Form::label('tinggi_badan', 'Tinggi_badan', ['class'=>'form-label']) }}
			{{ Form::string('tinggi_badan', null, array('class' => 'form-control')) }}
		</div>
		<div class="mb-3">
			{{ Form::label('berat_badan', 'Berat_badan', ['class'=>'form-label']) }}
			{{ Form::string('berat_badan', null, array('class' => 'form-control')) }}
		</div>
		<div class="mb-3">
			{{ Form::label('ktp', 'Ktp', ['class'=>'form-label']) }}
			{{ Form::textarea('ktp', null, array('class' => 'form-control')) }}
		</div>
		<div class="mb-3">
			{{ Form::label('kendaraan', 'Kendaraan', ['class'=>'form-label']) }}
			{{ Form::textarea('kendaraan', null, array('class' => 'form-control')) }}
		</div>
		<div class="mb-3">
			{{ Form::label('sim', 'Sim', ['class'=>'form-label']) }}
			{{ Form::textarea('sim', null, array('class' => 'form-control')) }}
		</div>
		<div class="mb-3">
			{{ Form::label('ekspektasi_gaji', 'Ekspektasi_gaji', ['class'=>'form-label']) }}
			{{ Form::text('ekspektasi_gaji', null, array('class' => 'form-control')) }}
		</div>
		<div class="mb-3">
			{{ Form::label('fasilitas_harapan', 'Fasilitas_harapan', ['class'=>'form-label']) }}
			{{ Form::textarea('fasilitas_harapan', null, array('class' => 'form-control')) }}
		</div>
		<div class="mb-3">
			{{ Form::label('kesediaan_penempatan', 'Kesediaan_penempatan', ['class'=>'form-label']) }}
			{{ Form::textarea('kesediaan_penempatan', null, array('class' => 'form-control')) }}
		</div>
		<div class="mb-3">
			{{ Form::label('kesediaan_mulai_bekerja', 'Kesediaan_mulai_bekerja', ['class'=>'form-label']) }}
			{{ Form::textarea('kesediaan_mulai_bekerja', null, array('class' => 'form-control')) }}
		</div>
		<div class="mb-3">
			{{ Form::label('image_jabatan_terakhir', 'Image_jabatan_terakhir', ['class'=>'form-label']) }}
			{{ Form::textarea('image_jabatan_terakhir', null, array('class' => 'form-control')) }}
		</div>
		<div class="mb-3">
			{{ Form::label('keterangan_jabatan_terakhir', 'Keterangan_jabatan_terakhir', ['class'=>'form-label']) }}
			{{ Form::textarea('keterangan_jabatan_terakhir', null, array('class' => 'form-control')) }}
		</div>

		{{ Form::submit('Edit', array('class' => 'btn btn-primary')) }}

	{{ Form::close() }}
@stop
