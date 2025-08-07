@extends('default')

@section('content')

	@if($errors->any())
		<div class="alert alert-danger">
			@foreach ($errors->all() as $error)
				{{ $error }} <br>
			@endforeach
		</div>
	@endif

	{{ Form::model($datakesehatan, array('route' => array('datakesehatans.update', Crypt::encryptString($datakesehatan->id)), 'method' => 'PUT')) }}

		{{ Form::hidden('user_id', null, array('class' => 'form-control')) }}
		<div class="mb-3">
			{{ Form::label('kesehatan', 'Kesehatan', ['class'=>'form-label']) }}
			{{ Form::textarea('kesehatan', null, array('class' => 'form-control')) }}
		</div>
		<div class="mb-3">
			{{ Form::label('keterangan', 'Keterangan', ['class'=>'form-label']) }}
			{{ Form::textarea('keterangan', null, array('class' => 'form-control')) }}
		</div>

		{{ Form::submit('Edit', array('class' => 'btn btn-primary')) }}

	{{ Form::close() }}
@stop
