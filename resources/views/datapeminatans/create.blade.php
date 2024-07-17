@extends('default')

@section('content')

    @if ($errors->any())
        <div class="alert alert-danger">
            @foreach ($errors->all() as $error)
                {{ $error }} <br>
            @endforeach
        </div>
    @endif

    {!! Form::open(['route' => 'datapeminatans.store']) !!}
    {{ Form::hidden('user_id', Auth::user()->id, ['class' => 'form-control']) }}
    <div class="mb-3">
        {{ Form::label('field_id', 'Department Peminatan', ['class' => 'form-label']) }}
        <select name="field_id" class="form-control">
            <option disabled selected>Pilih</option>
            @foreach ($fields as $d)
            <option value="{{$d->id}}">{{$d->field_name}}</option>
            @endforeach
        </select>
    </div>


    {{ Form::submit('Create', ['class' => 'btn btn-primary']) }}

    {{ Form::close() }}


@stop
