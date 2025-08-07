@extends('default')

@section('content')

    @if ($errors->any())
        <div class="alert alert-danger">
            @foreach ($errors->all() as $error)
                {{ $error }} <br>
            @endforeach
        </div>
    @endif

    {{ Form::model($dataolahraga, ['route' => ['dataolahragas.update', Crypt::encryptString($dataolahraga->id)], 'method' => 'PUT']) }}

    <div class="mb-3">
        {{ Form::hidden('user_id', Auth::user()->id, ['class' => 'form-control']) }}
    </div>
    <div class="mb-3">
        {{ Form::label('olahraga', 'Hobi', ['class' => 'form-label']) }}
        {{ Form::textarea('olahraga', null, ['class' => 'form-control']) }}
    </div>
    <div class="mb-3">
        {{ Form::label('level', 'Level', ['class' => 'form-label']) }}
        <select class="form-select" name="level">
            @foreach (\App\Constants\DataKemampuan::LevelKemampuan as $d)
                <option value="{{ $d }}">{{ $d }}</option>
            @endforeach
        </select>
    </div>

    {{ Form::submit('Edit', ['class' => 'btn btn-primary']) }}

    {{ Form::close() }}
@stop
