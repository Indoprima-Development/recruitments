@extends('default')

@section('content')

	@if($errors->any())
		<div class="alert alert-danger">
			@foreach ($errors->all() as $error)
				{{ $error }} <br>
			@endforeach
		</div>
	@endif

	{{ Form::model($datakemampuan, array('route' => array('datakemampuans.update', Crypt::encryptString($datakemampuan->id)), 'method' => 'PUT')) }}

			{{ Form::hidden('user_id', null, array('class' => 'form-control')) }}
		<div class="mb-3">
			{{ Form::label('kemampuan', 'Kemampuan', ['class'=>'form-label']) }}
			{{ Form::textarea('kemampuan', null, array('class' => 'form-control')) }}
		</div>
		<div class="mb-3">
			{{ Form::label('level', 'Level', ['class'=>'form-label']) }}
			{{ Form::textarea('level', null, array('class' => 'form-control')) }}
		</div>

		{{ Form::submit('Edit', array('class' => 'btn btn-primary')) }}

	{{ Form::close() }}
@stop
