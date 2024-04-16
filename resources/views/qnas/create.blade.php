@extends('default')

@section('content2')

@if($errors->any())
<div class="alert alert-danger">
	@foreach ($errors->all() as $error)
	{{ $error }} <br>
	@endforeach
</div>
@endif

{!! Form::open(['route' => 'qnas.store']) !!}

<div class="mb-3">
	{{ Form::label('exam_id', 'Exam Id', ['class'=>'form-label']) }}
	<select class="form-select" name="exam_id">
		@foreach($exams as $e)
		<option value="{{$e->id}}">{{$e->exam_name}}</option>
		@endforeach
	</select>
</div>
<div class="mb-3">
	{{ Form::label('user_id', 'User Id', ['class'=>'form-label']) }}
	{{ Form::text('user_id', Auth::user()->id, array('class' => 'form-control','readonly')) }}
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
	<select class="form-select" name="key">
		@for($i=1;$i<=5;$i++)
			<option value="{{$i}}">Answer {{$i}}</option>
		@endfor
	</select>
</div>

{{ Form::submit('Create', array('class' => 'btn btn-primary')) }}

{{ Form::close() }}


@stop