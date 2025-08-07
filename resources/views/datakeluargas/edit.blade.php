@extends('default')

@section('content')

    @if ($errors->any())
        <div class="alert alert-danger">
            @foreach ($errors->all() as $error)
                {{ $error }} <br>
            @endforeach
        </div>
    @endif

    {{ Form::model($datakeluarga, ['route' => ['datakeluargas.update', Crypt::encryptString($datakeluarga->id)], 'method' => 'PUT']) }}

    {{ Form::hidden('user_id', null, ['class' => 'form-control']) }}
    <div class="mb-3">
        {{ Form::label('status_hubungan', 'Status_hubungan', ['class' => 'form-label']) }}
        {{ Form::textarea('status_hubungan', null, ['class' => 'form-control']) }}
    </div>
    <div class="mb-3">
        {{ Form::label('nama_keluarga', 'Nama_keluarga', ['class' => 'form-label']) }}
        {{ Form::textarea('nama_keluarga', null, ['class' => 'form-control']) }}
    </div>
    <div class="mb-3">
        {{ Form::label('tempat_lahir_keluarga', 'Tempat_lahir_keluarga', ['class' => 'form-label']) }}
        {{ Form::textarea('tempat_lahir_keluarga', null, ['class' => 'form-control']) }}
    </div>
    <div class="mb-3">
        {{ Form::label('tanggal_lahir_keluarga', 'Tanggal_lahir_keluarga', ['class' => 'form-label']) }}
        {{ Form::textarea('tanggal_lahir_keluarga', null, ['class' => 'form-control']) }}
    </div>
    <div class="mb-3">
        {{ Form::label('pekerjaan', 'Pekerjaan', ['class' => 'form-label']) }}
        {{ Form::textarea('pekerjaan', null, ['class' => 'form-control']) }}
    </div>
    <div class="mb-3">
        {{ Form::label('alamat', 'Alamat', ['class' => 'form-label']) }}
        {{ Form::textarea('alamat', null, ['class' => 'form-control']) }}
    </div>

    {{ Form::submit('Edit', ['class' => 'btn btn-primary']) }}

    {{ Form::close() }}
@stop
