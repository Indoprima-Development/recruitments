@extends('default')

@section('content')

	@if($errors->any())
		<div class="alert alert-danger">
			@foreach ($errors->all() as $error)
				{{ $error }} <br>
			@endforeach
		</div>
	@endif

	{{ Form::model($section, array('route' => array('sections.update', $section->id), 'method' => 'PUT')) }}

		<div class="mb-3">
			{{ Form::label('department_id', 'Department_id', ['class'=>'form-label']) }}
			{{ Form::text('department_id', null, array('class' => 'form-control')) }}
		</div>
		<div class="mb-3">
			{{ Form::label('section_name', 'Section_name', ['class'=>'form-label']) }}
			{{ Form::textarea('section_name', null, array('class' => 'form-control')) }}
		</div>

		{{ Form::submit('Edit', array('class' => 'btn btn-primary')) }}

	{{ Form::close() }}
@stop
