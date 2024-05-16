@extends('default')

@section('content')

	@if($errors->any())
		<div class="alert alert-danger">
			@foreach ($errors->all() as $error)
				{{ $error }} <br>
			@endforeach
		</div>
	@endif

	{!! Form::open(['route' => 'jobtitles.store']) !!}

		<div class="mb-3">
			{{ Form::label('section_id', 'Section_id', ['class'=>'form-label']) }}
            <select class="form-select" name="section_id">
                @foreach($sections as $d)
                <option value="{{$d->id}}">{{$d->section_name}}</option>
                @endforeach
            </select>
		</div>
		<div class="mb-3">
			{{ Form::label('jobtitle_name', 'Jobtitle_name', ['class'=>'form-label']) }}
			{{ Form::textarea('jobtitle_name', null, array('class' => 'form-control')) }}
		</div>


		{{ Form::submit('Create', array('class' => 'btn btn-primary')) }}

	{{ Form::close() }}


@stop
