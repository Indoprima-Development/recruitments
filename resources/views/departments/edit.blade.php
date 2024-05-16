@extends('default')

@section('content')

	@if($errors->any())
		<div class="alert alert-danger">
			@foreach ($errors->all() as $error)
				{{ $error }} <br>
			@endforeach
		</div>
	@endif

	{{ Form::model($department, array('route' => array('departments.update', $department->id), 'method' => 'PUT')) }}

		<div class="mb-3">
			{{ Form::label('division_id', 'Division_id', ['class'=>'form-label']) }}
            <select name="division_id" class="form-select">
                @foreach($division as $d)
                    <option value="{{$d->id}}" {{$department->division_id == $d->id ? 'selected' :''}}>{{$d->division_name}}</option>
                @endforeach
            </select>
		</div>
		<div class="mb-3">
			{{ Form::label('department_name', 'Department_name', ['class'=>'form-label']) }}
			{{ Form::textarea('department_name', null, array('class' => 'form-control')) }}
		</div>

		{{ Form::submit('Edit', array('class' => 'btn btn-primary')) }}

	{{ Form::close() }}
@stop
