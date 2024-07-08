@extends('default')

@section('content')

	@if($errors->any())
		<div class="alert alert-danger">
			@foreach ($errors->all() as $error)
				{{ $error }} <br>
			@endforeach
		</div>
	@endif

	{{ Form::model($ptk_approval, array('route' => array('ptk_approvals.update', $ptk_approval->id), 'method' => 'PUT')) }}

		<div class="mb-3">
			{{ Form::label('department', 'Department', ['class'=>'form-label']) }}
			{{ Form::textarea('department', null, array('class' => 'form-control')) }}
		</div>
		<div class="mb-3">
			{{ Form::label('divisi', 'Divisi', ['class'=>'form-label']) }}
			{{ Form::textarea('divisi', null, array('class' => 'form-control')) }}
		</div>
		<div class="mb-3">
			{{ Form::label('noreg', 'Noreg', ['class'=>'form-label']) }}
			{{ Form::textarea('noreg', null, array('class' => 'form-control')) }}
		</div>

		{{ Form::submit('Edit', array('class' => 'btn btn-primary')) }}

	{{ Form::close() }}
@stop
