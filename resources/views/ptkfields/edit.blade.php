@extends('default')

@section('content')

	@if($errors->any())
		<div class="alert alert-danger">
			@foreach ($errors->all() as $error)
				{{ $error }} <br>
			@endforeach
		</div>
	@endif

	{{ Form::model($ptkfield, array('route' => array('ptkfields.update', $ptkfield->id), 'method' => 'PUT')) }}

		<div class="mb-3">
			{{ Form::label('field_id', 'Field_id', ['class'=>'form-label']) }}
			{{ Form::text('field_id', null, array('class' => 'form-control')) }}
		</div>
		<div class="mb-3">
			{{ Form::label('ptkform_id', 'Ptkform_id', ['class'=>'form-label']) }}
			{{ Form::text('ptkform_id', null, array('class' => 'form-control')) }}
		</div>
		<div class="mb-3">
			{{ Form::label('year', 'Year', ['class'=>'form-label']) }}
			{{ Form::text('year', null, array('class' => 'form-control')) }}
		</div>

		{{ Form::submit('Edit', array('class' => 'btn btn-primary')) }}

	{{ Form::close() }}
@stop
