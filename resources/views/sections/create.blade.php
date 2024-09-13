@extends('default')

@section('content')

	@if($errors->any())
		<div class="alert alert-danger">
			@foreach ($errors->all() as $error)
				{{ $error }} <br>
			@endforeach
		</div>
	@endif

	{!! Form::open(['route' => 'sections.store']) !!}

		<div class="mb-3">
			{{ Form::label('department_id', 'Department', ['class'=>'form-label']) }}
			<select class="form-select" name="department_id">
                @foreach($departments as $d)
                <option value="{{$d->id}}">{{$d->department_name}} - {{$d->division->division_name}}</option>
                @endforeach
            </select>
		</div>
		<div class="mb-3">
			{{ Form::label('section_name', 'Section Name', ['class'=>'form-label']) }}
			{{ Form::textarea('section_name', null, array('class' => 'form-control')) }}
		</div>


		{{ Form::submit('Create', array('class' => 'btn btn-primary')) }}

	{{ Form::close() }}


@stop
