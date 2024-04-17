@extends('default')

@section('content2')

@if($errors->any())
<div class="alert alert-danger">
    @foreach ($errors->all() as $error)
    {{ $error }} <br>
    @endforeach
</div>
@endif

{!! Form::open(['route' => 'exams.store']) !!}
{{ Form::hidden('user_id', Auth::user()->id, array('class' => 'form-control')) }}
<div class="mb-3">
    {{ Form::label('project_id', 'Project id', ['class'=>'form-label']) }}
    <select class="form-select" name="project_id">
        @foreach($projects as $p)
        <option value="{{ $p->id }}">{{ $p->project_name }}</option>
        @endforeach
    </select>
</div>
<div class="mb-3">
    {{ Form::label('exam_name', 'Exam name', ['class'=>'form-label']) }}
    {{ Form::text('exam_name', null, array('class' => 'form-control')) }}
</div>
<div class="mb-3">
    {{ Form::label('date_start', 'Date start', ['class'=>'form-label']) }}
    {{ Form::date('date_start', null, array('class' => 'form-control')) }}
</div>
<div class="mb-3">
    {{ Form::label('date_end', 'Date end', ['class'=>'form-label']) }}
    {{ Form::date('date_end', null, array('class' => 'form-control')) }}
</div>


{{ Form::submit('Create', array('class' => 'btn btn-primary')) }}

{{ Form::close() }}


@stop
