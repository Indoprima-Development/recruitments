@extends('default')

@section('content')

	@if($errors->any())
		<div class="alert alert-danger">
			@foreach ($errors->all() as $error)
				{{ $error }} <br>
			@endforeach
		</div>
	@endif

	{!! Form::open(['route' => 'dataorganisasis.store']) !!}
    {{ Form::hidden('user_id', Auth::user()->id, array()) }}
		<div class="mb-3">
			{{ Form::label('nama_organisasi', 'Nama Organisasi', ['class'=>'form-label']) }}
			{{ Form::text('nama_organisasi', null, array('class' => 'form-control')) }}
		</div>
		<div class="mb-3">
			{{ Form::label('tingkat', 'Tingkat', ['class'=>'form-label']) }}
			<select class="form-select" name="tingkat">
                @foreach(\App\Constants\DataOrganisasi::TingkatOrganisasi as $d)
                    <option value="{{$d}}">{{$d}}</option>
                @endforeach
            </select>
		</div>
		<div class="mb-3">
			{{ Form::label('start_date', 'Mulai', ['class'=>'form-label']) }}
			{{ Form::date('start_date', null, array('class' => 'form-control')) }}
		</div>
		<div class="mb-3">
			{{ Form::label('end_date', 'Akhir', ['class'=>'form-label']) }}
			{{ Form::date('end_date', null, array('class' => 'form-control')) }}
		</div>


		{{ Form::submit('Create', array('class' => 'btn btn-primary')) }}

	{{ Form::close() }}


@stop
