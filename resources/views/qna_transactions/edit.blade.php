@extends('default')

@section('content')

	@if($errors->any())
		<div class="alert alert-danger">
			@foreach ($errors->all() as $error)
				{{ $error }} <br>
			@endforeach
		</div>
	@endif

	{{ Form::model($qna_transaction, array('route' => array('qna_transactions.update', $qna_transaction->id), 'method' => 'PUT')) }}

		<div class="mb-3">
			{{ Form::label('qna_id', 'Qna_id', ['class'=>'form-label']) }}
			{{ Form::text('qna_id', null, array('class' => 'form-control')) }}
		</div>
		<div class="mb-3">
			{{ Form::label('user_id', 'User_id', ['class'=>'form-label']) }}
			{{ Form::text('user_id', null, array('class' => 'form-control')) }}
		</div>
		<div class="mb-3">
			{{ Form::label('answer', 'Answer', ['class'=>'form-label']) }}
			{{ Form::text('answer', null, array('class' => 'form-control')) }}
		</div>
		<div class="mb-3">
			{{ Form::label('is_true', 'Is_true', ['class'=>'form-label']) }}
			{{ Form::string('is_true', null, array('class' => 'form-control')) }}
		</div>

		{{ Form::submit('Edit', array('class' => 'btn btn-primary')) }}

	{{ Form::close() }}
@stop
