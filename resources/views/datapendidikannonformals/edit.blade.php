@extends('default')

@section('content')

    @if ($errors->any())
        <div class="alert alert-danger">
            @foreach ($errors->all() as $error)
                {{ $error }} <br>
            @endforeach
        </div>
    @endif

    {{ Form::model($datapendidikannonformal, ['route' => ['datapendidikannonformals.update', Crypt::encryptString($datapendidikannonformal->id)], 'method' => 'PUT']) }}
    {{ Form::hidden('user_id', null, ['class' => 'form-control']) }}
    <div class="mb-3">
        {{ Form::label('jenis', 'Jenis', ['class' => 'form-label']) }}
        <select class="form-select" name="jenis">
            <option value="Kursus" {{ old('jenis', $datapendidikannonformal->jenis ?? '') == 'Kursus' ? 'selected' : '' }}>Kursus</option>
            <option value="Pelatihan" {{ old('jenis', $datapendidikannonformal->jenis ?? '') == 'Pelatihan' ? 'selected' : '' }}>Pelatihan
            </option>
            <option value="Sertifikasi" {{ old('jenis', $datapendidikannonformal->jenis ?? '') == 'Sertifikasi' ? 'selected' : '' }}>Sertifikasi
            </option>
        </select>

    </div>
    <div class="mb-3">
        {{ Form::label('tingkat', 'Tingkat', ['class' => 'form-label']) }}
        {{ Form::text('tingkat', null, ['class' => 'form-control']) }}
    </div>
    <div class="mb-3">
        {{ Form::label('instansi', 'Instansi', ['class' => 'form-label']) }}
        {{ Form::text('instansi', null, ['class' => 'form-control']) }}
    </div>
    <div class="mb-3">
        {{ Form::label('jurusan', 'Jurusan', ['class' => 'form-label']) }}
        {{ Form::text('jurusan', null, ['class' => 'form-control']) }}
    </div>
    <div class="mb-3">
        {{ Form::label('date_start', 'Waktu Dimulai', ['class' => 'form-label']) }}
        {{ Form::date('date_start', null, ['class' => 'form-control']) }}
    </div>
    <div class="mb-3">
        {{ Form::label('date_end', 'Waktu Selesai', ['class' => 'form-label']) }}
        {{ Form::date('date_end', null, ['class' => 'form-control']) }}
    </div>

    {{ Form::submit('Edit', ['class' => 'btn btn-primary']) }}

    {{ Form::close() }}
@stop
