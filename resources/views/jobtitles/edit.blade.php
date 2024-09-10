@extends('default')

@section('content')

	@if($errors->any())
		<div class="alert alert-danger">
			@foreach ($errors->all() as $error)
				{{ $error }} <br>
			@endforeach
		</div>
	@endif

	{{ Form::model($jobtitle, array('route' => array('jobtitles.update', $jobtitle->id), 'method' => 'PUT')) }}
		<div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="mb-3 col-sm-6">
                        {{ Form::label('section_id', 'Section', ['class' => 'form-label']) }}
                        <select class="form-select" name="section_id">
                            @foreach($sections as $d)
                            <option value="{{$d->id}}" {{$d->id == $jobtitle->section_id ? 'selected' : ''}}>{{$d->section_name}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-3 col-sm-6">
                        {{ Form::label('jobtitle_name', 'Jobtitle Name', ['class' => 'form-label']) }}
                        {{ Form::text('jobtitle_name', null, ['class' => 'form-control', 'required']) }}
                    </div>

                    <div class="col-sm-12 text-end">
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                            + Questions
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <div class="card">
            <div class="card-body text-end">
                <table class="table text-start">
                    <thead>
                        <tr>
                            <th>Type</th>
                            <th>Pertanyaan</th>
                            <th>Jawaban</th>
                            <th>Score</th>
                            <th>Option</th>
                        </tr>
                    </thead>
                    <tbody id="tbody">
                        <?php
                            $dts = json_decode($jobtitle->questions);
                        ?>

                        @foreach ($dts->pertanyaan as $index => $d)
                            <tr id="tr{{$index}}">
                                <td>{{$dts->type[$index]}}</td>
                                <td>{{$dts->pertanyaan[$index]}}</td>
                                <td>{{$dts->jawaban[$index]}}</td>
                                <td>{{$dts->score[$index]}}</td>
                                <td><button type="button" class="btn btn-sm btn-danger btn-delete" data-index="{{$index}}">Delete</button></td>

                                <input type="hidden" name="type[]" value="{{$dts->type[$index]}}">
                                <input type="hidden" name="pertanyaan[]" value="{{$dts->pertanyaan[$index]}}">
                                <input type="hidden" name="jawaban[]" value="{{$dts->jawaban[$index]}}">
                                <input type="hidden" name="score[]" value="{{$dts->score[$index]}}">
                            </tr>
                        @endforeach
                    </tbody>
                </table>

                {{ Form::submit('Edit', array('class' => 'btn btn-primary')) }}
            </div>
        </div>
	{{ Form::close() }}

    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-sm-12 mb-2">
                            <label for="" class="form-label">Type</label>
                            <select name="type" id="formRating" class="form-control" required>
                                <option value="" disabled selected>Pilih</option>
                                <option value="YaTidak">Ya/Tidak</option>
                                <option value="Rating">Rating</option>
                            </select>
                        </div>

                        <div class="col-sm-12 mb-2">
                            <label for="" class="form-label">Pertanyaan</label>
                            <input id="formPertanyaan" type="text" class="form-control" name="pertanyaan" id="">
                        </div>

                        <div class="col-sm-6 mb-2">
                            <label for="" class="form-label">Jawaban</label>
                            <select name="jawaban" id="formJawaban" class="form-control" required>
                                <option value="" disabled selected>Pilih</option>
                                <option value="TidakAda">Tidak Ada</option>
                                <option value="Ya">Ya</option>
                                <option value="Tidak">Tidak</option>
                            </select>
                        </div>

                        <div class="col-sm-6 mb-2">
                            <label for="" class="form-label">Score</label>
                            <input id="formScore" type="number" class="form-control" name="score" id="">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button id="btnSaveQuestion" type="button" class="btn btn-primary">Submit</button>
                </div>
            </div>
        </div>
    </div>
@stop

@section('addJs')
    <script>
        var indexBtn = "{{count($dts->pertanyaan)+1}}";
        $("#btnSaveQuestion").on("click", function() {
            //get data from form modal
            var rating = $('#formRating').val()
            var pertanyaan = $('#formPertanyaan').val()
            var jawaban = $('#formJawaban').val()
            var score = $('#formScore').val()

            var html = `
                <tr id="tr${indexBtn}">
                    <td>${rating}</td>
                    <td>${pertanyaan}</td>
                    <td>${jawaban}</td>
                    <td>${score}</td>
                    <td><button type="button" class="btn btn-sm btn-danger btn-delete" data-index="${indexBtn}">Delete</button></td>

                    <input type="hidden" name="type[]" value="${rating}">
                    <input type="hidden" name="pertanyaan[]" value="${pertanyaan}">
                    <input type="hidden" name="jawaban[]" value="${jawaban}">
                    <input type="hidden" name="score[]" value="${score}">
                </tr>
            `
            //add index for next button
            indexBtn += 1

            //append to html
            $('#tbody').append(html)
            $('#exampleModal').modal('hide')
        });

        $(document).on('click', ".btn-delete", function() {
            var index = $(this).data('index')
            $(`#tr${index}`).remove()
        });
    </script>
@endsection
