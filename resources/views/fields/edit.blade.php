@extends('default')

@section('content')

	@if($errors->any())
		<div class="alert alert-danger">
			@foreach ($errors->all() as $error)
				{{ $error }} <br>
			@endforeach
		</div>
	@endif

	{{ Form::model($field, array('route' => array('fields.update', $field->id), 'method' => 'PUT')) }}

		<div class="mb-3">
			{{ Form::label('field_name', 'Field Name', ['class'=>'form-label']) }}
			{{ Form::textarea('field_name', null, array('class' => 'form-control')) }}
		</div>

		{{ Form::submit('Edit', array('class' => 'btn btn-primary')) }}

	{{ Form::close() }}
@stop
