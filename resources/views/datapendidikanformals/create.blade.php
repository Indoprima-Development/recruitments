@extends('default')

@section('content')

    @if ($errors->any())
        <div class="alert alert-danger">
            @foreach ($errors->all() as $error)
                {{ $error }} <br>
            @endforeach
        </div>
    @endif

    {!! Form::open(['route' => 'datapendidikanformals.store']) !!}
    <div class="mb-3">
        {{ Form::label('tingkat', 'Tingkat', ['class' => 'form-label']) }}
        <select class="form-select" name="tingkat">
            @foreach (\App\Constants\DataPendidikanConst::Tingkat as $d)
                <option value="{{ $d }}">{{ $d }}
                </option>
            @endforeach
        </select>
    </div>
    <div class="mb-3">
        {{ Form::label('instansi', 'Instansi', ['class' => 'form-label']) }}
        {{ Form::text('instansi', null, ['class' => 'form-control']) }}
    </div>
    <div class="mb-3">
        {{ Form::label('jurusan', 'Jurusan', ['class' => 'form-label']) }}
        <small class="text-danger">(Berikan tanda "-" apabila tidak ada jurusan)</small>
        {{ Form::text('jurusan', "-", ['class' => 'form-control']) }}
    </div>
    <div class="mb-3">
        {{ Form::label('lulus_tahun', 'Lulus', ['class' => 'form-label']) }}
        <small class="text-danger">(Tahun)</small>
        {{ Form::number('lulus_tahun', null, ['class' => 'form-control']) }}
    </div>
    <div class="mb-3">
        {{ Form::label('nilai', 'Nilai', ['class' => 'form-label']) }}
        <small class="text-danger">(NEM/IPK)</small>
        {{ Form::number('nilai', null, ['class' => 'form-control',"step"=> "any"]) }}
    </div>


    {{ Form::submit('Create', ['class' => 'btn btn-primary']) }}

    {{ Form::close() }}


@stop
