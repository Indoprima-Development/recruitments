@extends('default')

@section('content2')

	@if($errors->any())
		<div class="alert alert-danger">
			@foreach ($errors->all() as $error)
				{{ $error }} <br>
			@endforeach
		</div>
	@endif

	{{ Form::model($exam, array('route' => array('exams.update', $exam->id), 'method' => 'PUT')) }}

		<div class="mb-3">
			{{ Form::label('project_id', 'Project_id', ['class'=>'form-label']) }}
			{{ Form::text('project_id', null, array('class' => 'form-control')) }}
		</div>
		<div class="mb-3">
			{{ Form::label('user_id', 'User_id', ['class'=>'form-label']) }}
			{{ Form::text('user_id', null, array('class' => 'form-control')) }}
		</div>
		<div class="mb-3">
			{{ Form::label('exam_name', 'Exam_name', ['class'=>'form-label']) }}
			{{ Form::text('exam_name', null, array('class' => 'form-control')) }}
		</div>
		<div class="mb-3">
			{{ Form::label('date_start', 'Date_start', ['class'=>'form-label']) }}
			{{ Form::text('date_start', null, array('class' => 'form-control')) }}
		</div>
		<div class="mb-3">
			{{ Form::label('date_end', 'Date_end', ['class'=>'form-label']) }}
			{{ Form::text('date_end', null, array('class' => 'form-control')) }}
		</div>

		{{ Form::submit('Edit', array('class' => 'btn btn-primary')) }}

	{{ Form::close() }}
@stop
