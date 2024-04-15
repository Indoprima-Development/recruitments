@extends('default')

@section('content')

	@if($errors->any())
		<div class="alert alert-danger">
			@foreach ($errors->all() as $error)
				{{ $error }} <br>
			@endforeach
		</div>
	@endif

	{!! Form::open(['route' => 'exam_transactions.store']) !!}

		<div class="mb-3">
			{{ Form::label('exam_id', 'Exam_id', ['class'=>'form-label']) }}
			{{ Form::text('exam_id', null, array('class' => 'form-control')) }}
		</div>
		<div class="mb-3">
			{{ Form::label('user_id', 'User_id', ['class'=>'form-label']) }}
			{{ Form::text('user_id', null, array('class' => 'form-control')) }}
		</div>
		<div class="mb-3">
			{{ Form::label('is_open', 'Is_open', ['class'=>'form-label']) }}
			{{ Form::string('is_open', null, array('class' => 'form-control')) }}
		</div>
		<div class="mb-3">
			{{ Form::label('score', 'Score', ['class'=>'form-label']) }}
			{{ Form::text('score', null, array('class' => 'form-control')) }}
		</div>


		{{ Form::submit('Create', array('class' => 'btn btn-primary')) }}

	{{ Form::close() }}


@stop