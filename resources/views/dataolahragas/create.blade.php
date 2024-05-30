@extends('default')

@section('content')

    @if ($errors->any())
        <div class="alert alert-danger">
            @foreach ($errors->all() as $error)
                {{ $error }} <br>
            @endforeach
        </div>
    @endif

    {!! Form::open(['route' => 'dataolahragas.store']) !!}
    {{ Form::hidden('user_id', Auth::user()->id, ['class' => 'form-control']) }}

    <div class="mb-3">
        {{ Form::label('olahraga', 'Olahraga', ['class' => 'form-label']) }}
        {{ Form::text('olahraga', null, ['class' => 'form-control']) }}
    </div>
    <div class="mb-3">
        {{ Form::label('level', 'Level', ['class' => 'form-label']) }}
        <select class="form-select" name="level">
            @foreach(\App\Constants\DataKemampuan::LevelKemampuan as $d)
                <option value="{{$d}}">{{$d}}</option>
            @endforeach
        </select>
    </div>


    {{ Form::submit('Create', ['class' => 'btn btn-primary']) }}

    {{ Form::close() }}


@stop
