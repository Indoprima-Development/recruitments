@extends('default')

@section('content')

	@if($errors->any())
		<div class="alert alert-danger">
			@foreach ($errors->all() as $error)
				{{ $error }} <br>
			@endforeach
		</div>
	@endif

	{{ Form::model($datadetail, array('route' => array('datadetails.update', Crypt::encryptString($datadetail->id)), 'method' => 'PUT')) }}

		{{ Form::hidden('user_id', null, array('class' => 'form-control')) }}
		<div class="mb-3">
			{{ Form::label('tipe', 'Tipe', ['class'=>'form-label']) }}
			{{ Form::textarea('tipe', null, array('class' => 'form-control')) }}
		</div>
		<div class="mb-3">
			{{ Form::label('nama', 'Nama', ['class'=>'form-label']) }}
			{{ Form::textarea('nama', null, array('class' => 'form-control')) }}
		</div>
		<div class="mb-3">
			{{ Form::label('jabatan', 'Jabatan', ['class'=>'form-label']) }}
			{{ Form::textarea('jabatan', null, array('class' => 'form-control')) }}
		</div>
		<div class="mb-3">
			{{ Form::label('hubungan', 'Hubungan', ['class'=>'form-label']) }}
			{{ Form::textarea('hubungan', null, array('class' => 'form-control')) }}
		</div>

		{{ Form::submit('Edit', array('class' => 'btn btn-primary')) }}

	{{ Form::close() }}
@stop
