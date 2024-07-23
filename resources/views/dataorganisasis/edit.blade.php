@extends('default')

@section('content')

	@if($errors->any())
		<div class="alert alert-danger">
			@foreach ($errors->all() as $error)
				{{ $error }} <br>
			@endforeach
		</div>
	@endif

	{{ Form::model($dataorganisasi, array('route' => array('dataorganisasis.update', $dataorganisasi->id), 'method' => 'PUT')) }}

		<div class="mb-3">
			{{ Form::label('user_id', 'User_id', ['class'=>'form-label']) }}
			{{ Form::text('user_id', null, array('class' => 'form-control')) }}
		</div>
		<div class="mb-3">
			{{ Form::label('nama_organisasi', 'Nama_organisasi', ['class'=>'form-label']) }}
			{{ Form::text('nama_organisasi', null, array('class' => 'form-control')) }}
		</div>
        <div class="mb-3">
			{{ Form::label('jabatan', 'Jabatan', ['class'=>'form-label']) }}
			{{ Form::text('jabatan', null, array('class' => 'form-control')) }}
		</div>
		<div class="mb-3">
			{{ Form::label('tingkat', 'Tingkat', ['class'=>'form-label']) }}
			{{ Form::textarea('tingkat', null, array('class' => 'form-control')) }}
		</div>
		<div class="mb-3">
			{{ Form::label('start_date', 'Start_date', ['class'=>'form-label']) }}
			{{ Form::textarea('start_date', null, array('class' => 'form-control')) }}
		</div>
		<div class="mb-3">
			{{ Form::label('end_date', 'End_date', ['class'=>'form-label']) }}
			{{ Form::textarea('end_date', null, array('class' => 'form-control')) }}
		</div>

		{{ Form::submit('Edit', array('class' => 'btn btn-primary')) }}

	{{ Form::close() }}
@stop
