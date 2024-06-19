@extends('default')

@section('content')

	@if($errors->any())
		<div class="alert alert-danger">
			@foreach ($errors->all() as $error)
				{{ $error }} <br>
			@endforeach
		</div>
	@endif

	{{ Form::model($dataolahraga, array('route' => array('dataolahragas.update', $dataolahraga->id), 'method' => 'PUT')) }}

		<div class="mb-3">
			{{ Form::hidden('user_id', Auth::user()->id, array('class' => 'form-control')) }}
		</div>
		<div class="mb-3">
			{{ Form::label('olahraga', 'Hobi', ['class'=>'form-label']) }}
			{{ Form::textarea('olahraga', null, array('class' => 'form-control')) }}
		</div>
		<div class="mb-3">
			{{ Form::label('level', 'Level', ['class'=>'form-label']) }}
			{{ Form::textarea('level', null, array('class' => 'form-control')) }}
		</div>

		{{ Form::submit('Edit', array('class' => 'btn btn-primary')) }}

	{{ Form::close() }}
@stop
