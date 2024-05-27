@extends('default')

@section('content')

    @if ($errors->any())
        <div class="alert alert-danger">
            @foreach ($errors->all() as $error)
                {{ $error }} <br>
            @endforeach
        </div>
    @endif

    {!! Form::open(['route' => 'datakeluargas.store']) !!}
    {{ Form::hidden('user_id', Auth::user()->id, ['class' => 'form-control']) }}
    <div class="mb-3">
        {{ Form::label('status_hubungan', 'Status Hubungan', ['class' => 'form-label']) }}
        <div class="mb-3">
            {{ Form::label('tingkat', 'Tingkat', ['class' => 'form-label']) }}
            <select class="form-select" name="status_hubungan">
                @foreach (\App\Constants\DataKeluargaConst::StatusHubungan as $d)
                    <option value="{{ $d }}">{{ $d }}
                    </option>
                @endforeach
            </select>
        </div>
    </div>
    <div class="mb-3">
        {{ Form::label('nama_keluarga', 'Nama', ['class' => 'form-label']) }}
        {{ Form::text('nama_keluarga', null, ['class' => 'form-control']) }}
    </div>
    <div class="mb-3">
        {{ Form::label('tempat_lahir_keluarga', 'Tempat Lahir', ['class' => 'form-label']) }}
        {{ Form::text('tempat_lahir_keluarga', null, ['class' => 'form-control']) }}
    </div>
    <div class="mb-3">
        {{ Form::label('tanggal_lahir_keluarga', 'Tanggal Lahir', ['class' => 'form-label']) }}
        {{ Form::date('tanggal_lahir_keluarga', null, ['class' => 'form-control']) }}
    </div>
    <div class="mb-3">
        {{ Form::label('pekerjaan', 'Pekerjaan', ['class' => 'form-label']) }}
        {{ Form::text('pekerjaan', null, ['class' => 'form-control']) }}
    </div>
    <div class="mb-3">
        {{ Form::label('alamat', 'Alamat', ['class' => 'form-label']) }}
        {{ Form::textarea('alamat', null, ['class' => 'form-control']) }}
    </div>


    {{ Form::submit('Create', ['class' => 'btn btn-primary']) }}

    {{ Form::close() }}


@stop
