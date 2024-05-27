@extends('default')

@section('content')

	@if($errors->any())
		<div class="alert alert-danger">
			@foreach ($errors->all() as $error)
				{{ $error }} <br>
			@endforeach
		</div>
	@endif

	{!! Form::open(['route' => 'datapengalamankerjas.store', 'enctype'=>'multipart/form-data', "class" => "row"]) !!}
        {{ Form::hidden('user_id', Auth::user()->id, array('class' => 'form-control')) }}
		<div class="mb-3">
			{{ Form::label('perusahaan', 'Perusahaan', ['class'=>'form-label']) }}
			{{ Form::text('perusahaan', null, array('class' => 'form-control')) }}
		</div>
		<div class="mb-3 col-6">
			{{ Form::label('jabatan_awal', 'Jabatan Awal', ['class'=>'form-label']) }}
			{{ Form::text('jabatan_awal', null, array('class' => 'form-control')) }}
		</div>
		<div class="mb-3 col-6">
			{{ Form::label('jabatan_terakhir', 'Jabatan Akhir', ['class'=>'form-label']) }}
			{{ Form::text('jabatan_terakhir', null, array('class' => 'form-control')) }}
		</div>

		<div class="mb-3 col-6">
			{{ Form::label('gaji_awal', 'Gaji Awal', ['class'=>'form-label']) }}
			{{ Form::number('gaji_awal', null, array('class' => 'form-control')) }}
		</div>
		<div class="mb-3 col-6">
			{{ Form::label('gaji_akhir', 'Gaji Akhir', ['class'=>'form-label']) }}
			{{ Form::number('gaji_akhir', null, array('class' => 'form-control')) }}
		</div>

		<div class="mb-3 col-6">
			{{ Form::label('date_start', 'Mulai', ['class'=>'form-label']) }}
			{{ Form::date('date_start', null, array('class' => 'form-control')) }}
		</div>
		<div class="mb-3 col-6">
			{{ Form::label('date_end', 'Selesai', ['class'=>'form-label']) }}
			{{ Form::date('date_end', null, array('class' => 'form-control')) }}
		</div>
        
		<div class="mb-3">
			{{ Form::label('alasan_keluar', 'Alasan Keluar', ['class'=>'form-label']) }}
			{{ Form::textarea('alasan_keluar', null, array('class' => 'form-control')) }}
		</div>
		<div class="mb-3">
			{{ Form::label('surat_pengalaman', 'Surat Pengalaman', ['class'=>'form-label']) }}
            <input type="file" class="form-control" name="surat_pengalaman" />
		</div>


		{{ Form::submit('Create', array('class' => 'btn btn-primary')) }}

	{{ Form::close() }}


@stop
