@extends('default')

@section('content')

	@if($errors->any())
		<div class="alert alert-danger">
			@foreach ($errors->all() as $error)
				{{ $error }} <br>
			@endforeach
		</div>
	@endif

	{!! Form::open(['route' => 'ptkforms.store']) !!}

		<div class="mb-3">
			{{ Form::label('division_id', 'Division_id', ['class'=>'form-label']) }}
			{{ Form::text('division_id', null, array('class' => 'form-control')) }}
		</div>
		<div class="mb-3">
			{{ Form::label('department_id', 'Department_id', ['class'=>'form-label']) }}
			{{ Form::text('department_id', null, array('class' => 'form-control')) }}
		</div>
		<div class="mb-3">
			{{ Form::label('section_id', 'Section_id', ['class'=>'form-label']) }}
			{{ Form::text('section_id', null, array('class' => 'form-control')) }}
		</div>
		<div class="mb-3">
			{{ Form::label('jobtitle_id', 'Jobtitle_id', ['class'=>'form-label']) }}
			{{ Form::text('jobtitle_id', null, array('class' => 'form-control')) }}
		</div>
		<div class="mb-3">
			{{ Form::label('education_id', 'Education_id', ['class'=>'form-label']) }}
			{{ Form::text('education_id', null, array('class' => 'form-control')) }}
		</div>
		<div class="mb-3">
			{{ Form::label('major_id', 'Major_id', ['class'=>'form-label']) }}
			{{ Form::text('major_id', null, array('class' => 'form-control')) }}
		</div>
		<div class="mb-3">
			{{ Form::label('date_startwork', 'Date_startwork', ['class'=>'form-label']) }}
			{{ Form::textarea('date_startwork', null, array('class' => 'form-control')) }}
		</div>
		<div class="mb-3">
			{{ Form::label('direct_superior', 'Direct_superior', ['class'=>'form-label']) }}
			{{ Form::textarea('direct_superior', null, array('class' => 'form-control')) }}
		</div>
		<div class="mb-3">
			{{ Form::label('direct_junior', 'Direct_junior', ['class'=>'form-label']) }}
			{{ Form::textarea('direct_junior', null, array('class' => 'form-control')) }}
		</div>
		<div class="mb-3">
			{{ Form::label('responsibility', 'Responsibility', ['class'=>'form-label']) }}
			{{ Form::textarea('responsibility', null, array('class' => 'form-control')) }}
		</div>
		<div class="mb-3">
			{{ Form::label('gender', 'Gender', ['class'=>'form-label']) }}
			{{ Form::string('gender', null, array('class' => 'form-control')) }}
		</div>
		<div class="mb-3">
			{{ Form::label('ipk', 'Ipk', ['class'=>'form-label']) }}
			{{ Form::string('ipk', null, array('class' => 'form-control')) }}
		</div>
		<div class="mb-3">
			{{ Form::label('special_conditions', 'Special_conditions', ['class'=>'form-label']) }}
			{{ Form::textarea('special_conditions', null, array('class' => 'form-control')) }}
		</div>
		<div class="mb-3">
			{{ Form::label('general_others', 'General_others', ['class'=>'form-label']) }}
			{{ Form::textarea('general_others', null, array('class' => 'form-control')) }}
		</div>
		<div class="mb-3">
			{{ Form::label('request_basis', 'Request_basis', ['class'=>'form-label']) }}
			{{ Form::textarea('request_basis', null, array('class' => 'form-control')) }}
		</div>
		<div class="mb-3">
			{{ Form::label('request_basis_for', 'Request_basis_for', ['class'=>'form-label']) }}
			{{ Form::textarea('request_basis_for', null, array('class' => 'form-control')) }}
		</div>
		<div class="mb-3">
			{{ Form::label('status', 'Status', ['class'=>'form-label']) }}
			{{ Form::text('status', null, array('class' => 'form-control')) }}
		</div>


		{{ Form::submit('Create', array('class' => 'btn btn-primary')) }}

	{{ Form::close() }}


@stop