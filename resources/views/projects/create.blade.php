@extends('default')

@section('content2')

	@if($errors->any())
		<div class="alert alert-danger">
			@foreach ($errors->all() as $error)
				{{ $error }} <br>
			@endforeach
		</div>
	@endif

	{!! Form::open(['route' => 'projects.store']) !!}

		<div class="mb-3">
			{{ Form::label('project_name', 'Project_name', ['class'=>'form-label']) }}
			{{ Form::text('project_name', null, array('class' => 'form-control')) }}
		</div>
		<div class="mb-3">
			{{ Form::label('created_by', 'Created_by', ['class'=>'form-label']) }}
			{{ Form::text('created_by', Auth::user()->id, array('class' => 'form-control','readonly')) }}
		</div>
		<div class="mb-3">
			{{ Form::label('is_can_take_multiple', 'Is_can_take_multiple', ['class'=>'form-label']) }}
			{{ Form::text('is_can_take_multiple', null, array('class' => 'form-control')) }}
		</div>
		<div class="mb-3">
			{{ Form::label('is_open', 'Is_open', ['class'=>'form-label']) }}
			{{ Form::text('is_open', null, array('class' => 'form-control')) }}
		</div>


		{{ Form::submit('Create', array('class' => 'btn btn-primary')) }}

	{{ Form::close() }}


@stop
