@extends('default')

@section('content')

	@if($errors->any())
		<div class="alert alert-danger">
			@foreach ($errors->all() as $error)
				{{ $error }} <br>
			@endforeach
		</div>
	@endif

	{{ Form::model($section, array('route' => array('sections.update', $section->id), 'method' => 'PUT')) }}

		<div class="mb-3">
			{{ Form::label('department_id', 'Department', ['class'=>'form-label']) }}
            <select class="form-select" name="department_id">
                @foreach($departments as $d)
                <option value="{{$d->id}}" {{$section->department_id == $d->id ? 'selected':''}}>{{$d->department_name}}</option>
                @endforeach
            </select>
		</div>
		<div class="mb-3">
			{{ Form::label('section_name', 'Section Name', ['class'=>'form-label']) }}
			{{ Form::textarea('section_name', null, array('class' => 'form-control')) }}
		</div>

		{{ Form::submit('Edit', array('class' => 'btn btn-primary')) }}

	{{ Form::close() }}
@stop
