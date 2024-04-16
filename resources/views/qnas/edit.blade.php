@extends('default')

@section('content2')
@include('sweetalert::alert')
@if($errors->any())
<div class="alert alert-danger">
	@foreach ($errors->all() as $error)
	{{ $error }} <br>
	@endforeach
</div>
@endif
<form method="POST" action="{{url('qnas-upload-image')}}" enctype="multipart/form-data">
	@csrf
	<input type="hidden" value="{{$qna->id}}" name="qna_id">
	<div class="mb-3">
		{{ Form::label('type', 'Upload Image Type', ['class'=>'form-label']) }}
		<select class="form-select" name="type">
			<option value="question_img">question_img</option>
			<option value="answer1_img">answer1 img</option>
			<option value="answer2_img">answer2 img</option>
			<option value="answer3_img">answer3 img</option>
			<option value="answer4_img">answer4 img</option>
			<option value="answer5_img">answer5 img</option>
		</select>

	</div>

	<div class="mb-3">
		{{ Form::label('file', 'File', ['class'=>'form-label']) }}
		{{ Form::file('file', null, array('class' => 'form-control')) }}
	</div>

	{{ Form::submit('Upload', array('class' => 'btn btn-primary mb-3')) }}
</form>

{{ Form::model($qna, array('route' => array('qnas.update', $qna->id), 'method' => 'PUT')) }}

{{ Form::hidden('exam_id', $qna->exam_id, array('class' => 'form-control')) }}
{{ Form::hidden('user_id', Auth::user()->id, array('class' => 'form-control')) }}

<div class="mb-3">
	{{ Form::label('key', 'Key', ['class'=>'form-label']) }}
	<select class="form-select" name="key">
		@for($i=1;$i<=5;$i++)
			<option value="{{$i}}" {{$i == $qna->key ? 'selected' : ''}}>Answer {{$i}}</option>
		@endfor
	</select>
</div>

<div class="row">
	<div class="col-sm-12 col-md-6">
		<div class="card">
			<div class="card-body border-bottom">
				<p class="text-dark my-3">
					{{ Form::label('question', 'Question', ['class'=>'form-label']) }}
					{{ Form::textarea('question', null, array('class' => 'form-control')) }}
				</p>

				<div class="position-relative mt-2">
					<div class="p-4 rounded-4 text-bg-light mb-3">
						@if($qna->question_img != '' && $qna->question_img != null)
						<img src="{{asset($qna->question_img)}}" alt="modernize-img" width="100%" class="rounded-4 w-100 object-fit-cover">
						@else
						No Image
						@endif
					</div>
				</div>
			</div>
		</div>
	</div>

	<div class="col-sm-12 col-md-6">
		<div class="card">
			<div class="card-body border-bottom">
				<p class="text-dark my-3">
					{{ Form::label('answer1', 'Answer1', ['class'=>'form-label']) }}
					{{ Form::textarea('answer1', null, array('class' => 'form-control')) }}
				</p>

				<div class="position-relative mt-2">
					<div class="p-4 rounded-4 text-bg-light mb-3">
						@if($qna->answer1_img != '' && $qna->answer1_img != null)
						<img src="{{asset($qna->answer1_img)}}" alt="modernize-img" width="100%" class="rounded-4 w-100 object-fit-cover">
						@else
						No Image
						@endif
					</div>
				</div>
			</div>
		</div>
	</div>

	<div class="col-sm-12 col-md-6">
		<div class="card">
			<div class="card-body border-bottom">
				<p class="text-dark my-3">
					{{ Form::label('answer2', 'Answer2', ['class'=>'form-label']) }}
					{{ Form::textarea('answer2', null, array('class' => 'form-control')) }}
				</p>

				<div class="position-relative mt-2">
					<div class="p-4 rounded-4 text-bg-light mb-3">
						@if($qna->answer2_img != '' && $qna->answer2_img != null)
						<img src="{{asset($qna->answer2_img)}}" alt="modernize-img" width="100%" class="rounded-4 w-100 object-fit-cover">
						@else
						No Image
						@endif
					</div>
				</div>
			</div>
		</div>
	</div>

	<div class="col-sm-12 col-md-6">
		<div class="card">
			<div class="card-body border-bottom">
				<p class="text-dark my-3">
					{{ Form::label('answer3', 'Answer3', ['class'=>'form-label']) }}
					{{ Form::textarea('answer3', null, array('class' => 'form-control')) }}
				</p>

				<div class="position-relative mt-2">
					<div class="p-4 rounded-4 text-bg-light mb-3">
						@if($qna->answer3_img != '' && $qna->answer3_img != null)
						<img src="{{asset($qna->answer3_img)}}" alt="modernize-img" width="100%" class="rounded-4 w-100 object-fit-cover">
						@else
						No Image
						@endif
					</div>
				</div>
			</div>
		</div>
	</div>

	<div class="col-sm-12 col-md-6">
		<div class="card">
			<div class="card-body border-bottom">
				<p class="text-dark my-3">
					{{ Form::label('answer4', 'Answer4', ['class'=>'form-label']) }}
					{{ Form::textarea('answer4', null, array('class' => 'form-control')) }}
				</p>

				<div class="position-relative mt-2">
					<div class="p-4 rounded-4 text-bg-light mb-3">
						@if($qna->answer4_img != '' && $qna->answer4_img != null)
						<img src="{{asset($qna->answer4_img)}}" alt="modernize-img" width="100%" class="rounded-4 w-100 object-fit-cover">
						@else
						No Image
						@endif
					</div>
				</div>
			</div>
		</div>
	</div>

	<div class="col-sm-12 col-md-6">
		<div class="card">
			<div class="card-body border-bottom">
				<p class="text-dark my-3">
					{{ Form::label('answer5', 'Answer5', ['class'=>'form-label']) }}
					{{ Form::textarea('answer5', null, array('class' => 'form-control')) }}
				</p>

				<div class="position-relative mt-2">
					<div class="p-4 rounded-4 text-bg-light mb-3">
						@if($qna->answer5_img != '' && $qna->answer5_img != null)
						<img src="{{asset($qna->answer5_img)}}" alt="modernize-img" width="100%" class="rounded-4 w-100 object-fit-cover">
						@else
						No Image
						@endif
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

{{ Form::submit('Edit', array('class' => 'btn btn-primary')) }}

{{ Form::close() }}
@stop