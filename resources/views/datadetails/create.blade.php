@extends('default')

@section('content')

    @if ($errors->any())
        <div class="alert alert-danger">
            @foreach ($errors->all() as $error)
                {{ $error }} <br>
            @endforeach
        </div>
    @endif

    {!! Form::open(['route' => 'datadetails.store']) !!}
    {{ Form::hidden('user_id', Auth::user()->id, ['class' => 'form-control']) }}
    <div class="mb-3">
        {{ Form::label('tipe', 'Tipe', ['class' => 'form-label']) }}
        <select class="form-select" name="tipe">
            <option disabled selected>Pilih</option>
            <option value="Referensi">Referensi Indoprima Group</option>
            <option value="Rekomendasi">Rekomendasi Luar Indoprima Group</option>
        </select>
    </div>
    <div class="mb-3">
        {{ Form::label('nama', 'Nama', ['class' => 'form-label']) }}
        {{ Form::text('nama', null, ['class' => 'form-control']) }}
    </div>
    <div class="mb-3">
        {{ Form::label('jabatan', 'Jabatan', ['class' => 'form-label']) }}
        {{ Form::text('jabatan', null, ['class' => 'form-control']) }}
    </div>
    <div class="mb-3">
        {{ Form::label('hubungan', 'Hubungan', ['class' => 'form-label']) }}
        {{ Form::text('hubungan', null, ['class' => 'form-control']) }}
    </div>


    {{ Form::submit('Create', ['class' => 'btn btn-primary']) }}

    {{ Form::close() }}


@stop
