@extends('default')

@section('content')

	@if($errors->any())
		<div class="alert alert-danger">
			@foreach ($errors->all() as $error)
				{{ $error }} <br>
			@endforeach
		</div>
	@endif

	{!! Form::open(['route' => 'datakemampuans.store']) !!}

		<div class="mb-3">
			{{ Form::label('user_id', 'User_id', ['class'=>'form-label']) }}
			{{ Form::text('user_id', null, array('class' => 'form-control')) }}
		</div>
		<div class="mb-3">
			{{ Form::label('kemampuan', 'Kemampuan', ['class'=>'form-label']) }}
			{{ Form::textarea('kemampuan', null, array('class' => 'form-control')) }}
		</div>
		<div class="mb-3">
			{{ Form::label('level', 'Level', ['class'=>'form-label']) }}
			{{ Form::textarea('level', null, array('class' => 'form-control')) }}
		</div>


		{{ Form::submit('Create', array('class' => 'btn btn-primary')) }}

	{{ Form::close() }}


@stop