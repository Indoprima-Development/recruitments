@extends('default')

@section('content')

	@if($errors->any())
		<div class="alert alert-danger">
			@foreach ($errors->all() as $error)
				{{ $error }} <br>
			@endforeach
		</div>
	@endif

	{!! Form::open(['route' => 'datapendidikannonformals.store']) !!}
        {{ Form::hidden('user_id', Auth::user()->id, array()) }}
		<div class="mb-3">
			{{ Form::label('jenis', 'Jenis', ['class'=>'form-label']) }}
			<select class="form-select" name="jenis">
                <option value="Kursus">Kursus</option>
                <option value="Pelatihan">Pelatihan</option>
                <option value="Sertifikasi">Sertifikasi</option>
            </select>
		</div>
		<div class="mb-3">
			{{ Form::label('tingkat', 'Topik', ['class'=>'form-label']) }}
			{{ Form::text('tingkat', null, array('class' => 'form-control')) }}
		</div>
		<div class="mb-3">
			{{ Form::label('instansi', 'Instansi', ['class'=>'form-label']) }}
			{{ Form::text('instansi', null, array('class' => 'form-control')) }}
		</div>
        {{ Form::hidden('jurusan', "-", array('class' => 'form-control')) }}
		<div class="mb-3">
			{{ Form::label('date_start', 'Waktu Dimulai', ['class'=>'form-label']) }}
			{{ Form::date('date_start', null, array('class' => 'form-control')) }}
		</div>
		<div class="mb-3">
			{{ Form::label('date_end', 'Waktu Selesai', ['class'=>'form-label']) }}
			{{ Form::date('date_end', null, array('class' => 'form-control')) }}
		</div>


		{{ Form::submit('Create', array('class' => 'btn btn-primary')) }}

	{{ Form::close() }}


@stop
