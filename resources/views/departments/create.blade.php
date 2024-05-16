@extends('default')

@section('content')

	@if($errors->any())
		<div class="alert alert-danger">
			@foreach ($errors->all() as $error)
				{{ $error }} <br>
			@endforeach
		</div>
	@endif

	{!! Form::open(['route' => 'departments.store']) !!}

		<div class="mb-3">
			{{ Form::label('division_id', 'Division_id', ['class'=>'form-label']) }}
			{{ Form::text('division_id', null, array('class' => 'form-control')) }}
		</div>
		<div class="mb-3">
			{{ Form::label('department_name', 'Department_name', ['class'=>'form-label']) }}
			{{ Form::textarea('department_name', null, array('class' => 'form-control')) }}
		</div>


		{{ Form::submit('Create', array('class' => 'btn btn-primary')) }}

	{{ Form::close() }}


@stop