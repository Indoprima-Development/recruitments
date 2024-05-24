@extends('default')

@section('content')

	@if($errors->any())
		<div class="alert alert-danger">
			@foreach ($errors->all() as $error)
				{{ $error }} <br>
			@endforeach
		</div>
	@endif

	{!! Form::open(['route' => 'datadetails.store']) !!}

		<div class="mb-3">
			{{ Form::label('user_id', 'User_id', ['class'=>'form-label']) }}
			{{ Form::text('user_id', null, array('class' => 'form-control')) }}
		</div>
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


		{{ Form::submit('Create', array('class' => 'btn btn-primary')) }}

	{{ Form::close() }}


@stop