@extends('default')

@section('content')

	<div class="d-flex justify-content-end mb-3"><a href="{{ route('ptkforms.create') }}" class="btn btn-info">Create</a></div>

	<table class="table table-bordered">
		<thead>
			<tr>
				<th>id</th>
				<th>division_id</th>
				<th>department_id</th>
				<th>section_id</th>
				<th>jobtitle_id</th>
				<th>education_id</th>
				<th>major_id</th>
				<th>date_startwork</th>
				<th>direct_superior</th>
				<th>direct_junior</th>
				<th>responsibility</th>
				<th>gender</th>
				<th>ipk</th>
				<th>special_conditions</th>
				<th>general_others</th>
				<th>request_basis</th>
				<th>request_basis_for</th>
				<th>status</th>

				<th>Action</th>
			</tr>
		</thead>
		<tbody>
			@foreach($ptkforms as $ptkform)

				<tr>
					<td>{{ $ptkform->id }}</td>
					<td>{{ $ptkform->division_id }}</td>
					<td>{{ $ptkform->department_id }}</td>
					<td>{{ $ptkform->section_id }}</td>
					<td>{{ $ptkform->jobtitle_id }}</td>
					<td>{{ $ptkform->education_id }}</td>
					<td>{{ $ptkform->major_id }}</td>
					<td>{{ $ptkform->date_startwork }}</td>
					<td>{{ $ptkform->direct_superior }}</td>
					<td>{{ $ptkform->direct_junior }}</td>
					<td>{{ $ptkform->responsibility }}</td>
					<td>{{ $ptkform->gender }}</td>
					<td>{{ $ptkform->ipk }}</td>
					<td>{{ $ptkform->special_conditions }}</td>
					<td>{{ $ptkform->general_others }}</td>
					<td>{{ $ptkform->request_basis }}</td>
					<td>{{ $ptkform->request_basis_for }}</td>
					<td>{{ $ptkform->status }}</td>

					<td>
						<div class="d-flex gap-2">
                            <a href="{{ route('ptkforms.show', [$ptkform->id]) }}" class="btn btn-info">Show</a>
                            <a href="{{ route('ptkforms.edit', [$ptkform->id]) }}" class="btn btn-primary">Edit</a>
                            {!! Form::open(['method' => 'DELETE','route' => ['ptkforms.destroy', $ptkform->id]]) !!}
                                {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                            {!! Form::close() !!}
                        </div>
					</td>
				</tr>

			@endforeach
		</tbody>
	</table>

@stop
