@extends('default')

@section('content')

	@if($errors->any())
		<div class="alert alert-danger">
			@foreach ($errors->all() as $error)
				{{ $error }} <br>
			@endforeach
		</div>
	@endif

	{{ Form::model($location, array('route' => array('locations.update', $location->id), 'method' => 'PUT')) }}

		<div class="mb-3">
			{{ Form::label('location_name', 'Location_name', ['class'=>'form-label']) }}
			{{ Form::textarea('location_name', null, array('class' => 'form-control')) }}
		</div>

		{{ Form::submit('Edit', array('class' => 'btn btn-primary')) }}

	{{ Form::close() }}
@stop
