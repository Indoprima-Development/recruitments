@extends('default')

@section('content')

	@if($errors->any())
		<div class="alert alert-danger">
			@foreach ($errors->all() as $error)
				{{ $error }} <br>
			@endforeach
		</div>
	@endif

	{{ Form::model($datapendidikanformal, array('route' => array('datapendidikanformals.update', $datapendidikanformal->id), 'method' => 'PUT')) }}

		<div class="mb-3">
			{{ Form::label('user_id', 'User_id', ['class'=>'form-label']) }}
			{{ Form::text('user_id', null, array('class' => 'form-control')) }}
		</div>
		<div class="mb-3">
			{{ Form::label('tingkat', 'Tingkat', ['class'=>'form-label']) }}
			{{ Form::textarea('tingkat', null, array('class' => 'form-control')) }}
		</div>
		<div class="mb-3">
			{{ Form::label('instansi', 'Instansi', ['class'=>'form-label']) }}
			{{ Form::textarea('instansi', null, array('class' => 'form-control')) }}
		</div>
		<div class="mb-3">
			{{ Form::label('jurusan', 'Jurusan', ['class'=>'form-label']) }}
			{{ Form::textarea('jurusan', null, array('class' => 'form-control')) }}
		</div>
		<div class="mb-3">
			{{ Form::label('lulus_tahun', 'Lulus_tahun', ['class'=>'form-label']) }}
			{{ Form::textarea('lulus_tahun', null, array('class' => 'form-control')) }}
		</div>
		<div class="mb-3">
			{{ Form::label('nilai', 'Nilai', ['class'=>'form-label']) }}
			{{ Form::textarea('nilai', null, array('class' => 'form-control')) }}
		</div>

		{{ Form::submit('Edit', array('class' => 'btn btn-primary')) }}

	{{ Form::close() }}
@stop
