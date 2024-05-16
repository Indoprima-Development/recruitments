@extends('default')

@section('content')

	@if($errors->any())
		<div class="alert alert-danger">
			@foreach ($errors->all() as $error)
				{{ $error }} <br>
			@endforeach
		</div>
	@endif

	{{ Form::model($education, array('route' => array('education.update', $education->id), 'method' => 'PUT')) }}

		<div class="mb-3">
			{{ Form::label('education_name', 'Education_name', ['class'=>'form-label']) }}
			{{ Form::textarea('education_name', null, array('class' => 'form-control')) }}
		</div>

		{{ Form::submit('Edit', array('class' => 'btn btn-primary')) }}

	{{ Form::close() }}
@stop
