@extends('default')

@section('content2')

	@if($errors->any())
		<div class="alert alert-danger">
			@foreach ($errors->all() as $error)
				{{ $error }} <br>
			@endforeach
		</div>
	@endif

	{{ Form::model($qna, array('route' => array('qnas.update', $qna->id), 'method' => 'PUT')) }}

		<div class="mb-3">
			{{ Form::label('exam_id', 'Exam_id', ['class'=>'form-label']) }}
			{{ Form::text('exam_id', null, array('class' => 'form-control')) }}
		</div>
		<div class="mb-3">
			{{ Form::label('user_id', 'User_id', ['class'=>'form-label']) }}
			{{ Form::text('user_id', null, array('class' => 'form-control')) }}
		</div>
		<div class="mb-3">
			{{ Form::label('question', 'Question', ['class'=>'form-label']) }}
			{{ Form::textarea('question', null, array('class' => 'form-control')) }}
		</div>
		<div class="mb-3">
			{{ Form::label('answer1', 'Answer1', ['class'=>'form-label']) }}
			{{ Form::textarea('answer1', null, array('class' => 'form-control')) }}
		</div>
		<div class="mb-3">
			{{ Form::label('answer2', 'Answer2', ['class'=>'form-label']) }}
			{{ Form::textarea('answer2', null, array('class' => 'form-control')) }}
		</div>
		<div class="mb-3">
			{{ Form::label('answer3', 'Answer3', ['class'=>'form-label']) }}
			{{ Form::textarea('answer3', null, array('class' => 'form-control')) }}
		</div>
		<div class="mb-3">
			{{ Form::label('answer4', 'Answer4', ['class'=>'form-label']) }}
			{{ Form::textarea('answer4', null, array('class' => 'form-control')) }}
		</div>
		<div class="mb-3">
			{{ Form::label('answer5', 'Answer5', ['class'=>'form-label']) }}
			{{ Form::textarea('answer5', null, array('class' => 'form-control')) }}
		</div>
		<div class="mb-3">
			{{ Form::label('key', 'Key', ['class'=>'form-label']) }}
			{{ Form::text('key', null, array('class' => 'form-control')) }}
		</div>
		<div class="mb-3">
			{{ Form::label('question_img', 'Question_img', ['class'=>'form-label']) }}
			{{ Form::textarea('question_img', null, array('class' => 'form-control')) }}
		</div>
		<div class="mb-3">
			{{ Form::label('answer1_img', 'Answer1_img', ['class'=>'form-label']) }}
			{{ Form::textarea('answer1_img', null, array('class' => 'form-control')) }}
		</div>
		<div class="mb-3">
			{{ Form::label('answer2_img', 'Answer2_img', ['class'=>'form-label']) }}
			{{ Form::textarea('answer2_img', null, array('class' => 'form-control')) }}
		</div>
		<div class="mb-3">
			{{ Form::label('answer3_img', 'Answer3_img', ['class'=>'form-label']) }}
			{{ Form::textarea('answer3_img', null, array('class' => 'form-control')) }}
		</div>
		<div class="mb-3">
			{{ Form::label('answer4_img', 'Answer4_img', ['class'=>'form-label']) }}
			{{ Form::textarea('answer4_img', null, array('class' => 'form-control')) }}
		</div>
		<div class="mb-3">
			{{ Form::label('answer5_img', 'Answer5_img', ['class'=>'form-label']) }}
			{{ Form::textarea('answer5_img', null, array('class' => 'form-control')) }}
		</div>

		{{ Form::submit('Edit', array('class' => 'btn btn-primary')) }}

	{{ Form::close() }}
@stop
