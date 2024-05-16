@extends('default')

@section('content')

	@if($errors->any())
		<div class="alert alert-danger">
			@foreach ($errors->all() as $error)
				{{ $error }} <br>
			@endforeach
		</div>
	@endif

	{!! Form::open(['route' => 'sections.store']) !!}

		<div class="mb-3">
			{{ Form::label('department_id', 'Department_id', ['class'=>'form-label']) }}
			{{ Form::text('department_id', null, array('class' => 'form-control')) }}
		</div>
		<div class="mb-3">
			{{ Form::label('section_name', 'Section_name', ['class'=>'form-label']) }}
			{{ Form::textarea('section_name', null, array('class' => 'form-control')) }}
		</div>


		{{ Form::submit('Create', array('class' => 'btn btn-primary')) }}

	{{ Form::close() }}


@stop