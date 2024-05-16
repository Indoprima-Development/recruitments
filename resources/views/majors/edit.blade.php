@extends('default')

@section('content')

	@if($errors->any())
		<div class="alert alert-danger">
			@foreach ($errors->all() as $error)
				{{ $error }} <br>
			@endforeach
		</div>
	@endif

	{{ Form::model($major, array('route' => array('majors.update', $major->id), 'method' => 'PUT')) }}

		<div class="mb-3">
			{{ Form::label('major_name', 'Major_name', ['class'=>'form-label']) }}
			{{ Form::textarea('major_name', null, array('class' => 'form-control')) }}
		</div>

		{{ Form::submit('Edit', array('class' => 'btn btn-primary')) }}

	{{ Form::close() }}
@stop
