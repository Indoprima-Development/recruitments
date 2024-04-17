@extends('default')

@section('content2')

@if($errors->any())
<div class="alert alert-danger">
	@foreach ($errors->all() as $error)
	{{ $error }} <br>
	@endforeach
</div>
@endif

{{ Form::model($project, array('route' => array('projects.update', $project->id), 'method' => 'PUT')) }}
{{ Form::hidden('created_by', null, array('class' => 'form-control')) }}
<div class="mb-3">
	{{ Form::label('project_name', 'Project_name', ['class'=>'form-label']) }}
	{{ Form::text('project_name', null, array('class' => 'form-control')) }}
</div>
<div class="mb-3">
	{{ Form::label('is_can_take_multiple', 'Is can take multiple', ['class'=>'form-label']) }}
	<select name="is_can_take_multiple" class="form-select">
		<option value="1" {{$project->is_can_take_multiple ?? 'selected'}}>Yes</option>
		<option value="0" {{$project->is_can_take_multiple ?? 'selected'}}>No</option>
	</select>
</div>
<div class="mb-3">
	{{ Form::label('is_open', 'Is_open', ['class'=>'form-label']) }}
	<select name="is_open" class="form-select">
		<option value="1" {{$project->is_open ?? 'selected'}}>Yes</option>
		<option value="0" {{$project->is_open ?? 'selected'}}>No</option>
	</select>
</div>

{{ Form::submit('Edit', array('class' => 'btn btn-primary')) }}

{{ Form::close() }}
@stop