@extends('default')

@section('content')

	@if($errors->any())
		<div class="alert alert-danger">
			@foreach ($errors->all() as $error)
				{{ $error }} <br>
			@endforeach
		</div>
	@endif

	{{ Form::model($division, array('route' => array('divisions.update', $division->id), 'method' => 'PUT')) }}

		<div class="mb-3">
			{{ Form::label('division_name', 'Division_name', ['class'=>'form-label']) }}
			{{ Form::textarea('division_name', null, array('class' => 'form-control')) }}
		</div>

		{{ Form::submit('Edit', array('class' => 'btn btn-primary')) }}

	{{ Form::close() }}
@stop
