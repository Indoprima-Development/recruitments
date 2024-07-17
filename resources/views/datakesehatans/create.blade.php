@extends('default')

@section('content')

	@if($errors->any())
		<div class="alert alert-danger">
			@foreach ($errors->all() as $error)
				{{ $error }} <br>
			@endforeach
		</div>
	@endif

	{!! Form::open(['route' => 'datakesehatans.store']) !!}
    {{ Form::hidden('user_id', Auth::user()->id, array('class' => 'form-control')) }}
		<div class="mb-3">
			{{ Form::label('kesehatan', 'Kesehatan', ['class'=>'form-label']) }}
			{{ Form::text('kesehatan', null, array('class' => 'form-control')) }}
		</div>
		<div class="mb-3">
			{{ Form::label('keterangan', 'Keterangan', ['class'=>'form-label']) }}
			{{ Form::text('keterangan', null, array('class' => 'form-control')) }}
		</div>


		{{ Form::submit('Create', array('class' => 'btn btn-primary')) }}

	{{ Form::close() }}


@stop
