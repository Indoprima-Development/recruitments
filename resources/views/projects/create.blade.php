@extends('default')

@section('content2')

@if($errors->any())
<div class="alert alert-danger">
	@foreach ($errors->all() as $error)
	{{ $error }} <br>
	@endforeach
</div>
@endif

{!! Form::open(['route' => 'projects.store']) !!}
{{ Form::hidden('created_by', Auth::user()->id, array('class' => 'form-control')) }}
<div class="mb-3">
	{{ Form::label('project_name', 'Project_name', ['class'=>'form-label']) }}
	{{ Form::text('project_name', null, array('class' => 'form-control')) }}
</div>
<div class="mb-3">
	{{ Form::label('is_can_take_multiple', 'Is_can_take_multiple', ['class'=>'form-label']) }}
	<select name="is_can_take_multiple" class="form-select">
		<option value="1">Yes</option>
		<option value="0" selected>No</option>
	</select>
</div>
<div class="mb-3">
	{{ Form::label('is_open', 'Is_open', ['class'=>'form-label']) }}
	<select name="is_open" class="form-select">
		<option value="1" selected>Yes</option>
		<option value="0">No</option>
	</select>
</div>


{{ Form::submit('Create', array('class' => 'btn btn-primary')) }}

{{ Form::close() }}


@stop