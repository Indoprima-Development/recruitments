@extends('default')

@section('content')

	<div class="d-flex justify-content-end mb-3"><a href="{{ route('ptkfields.create') }}" class="btn btn-info">Create</a></div>

	<table class="table table-bordered">
		<thead>
			<tr>
				<th>id</th>
				<th>field_id</th>
				<th>ptkform_id</th>
				<th>year</th>

				<th>Action</th>
			</tr>
		</thead>
		<tbody>
			@foreach($ptkfields as $ptkfield)

				<tr>
					<td>{{ $ptkfield->id }}</td>
					<td>{{ $ptkfield->field_id }}</td>
					<td>{{ $ptkfield->ptkform_id }}</td>
					<td>{{ $ptkfield->year }}</td>

					<td>
						<div class="d-flex gap-2">
                            <a href="{{ route('ptkfields.show', [$ptkfield->id]) }}" class="btn btn-info">Show</a>
                            <a href="{{ route('ptkfields.edit', [$ptkfield->id]) }}" class="btn btn-primary">Edit</a>
                            {!! Form::open(['method' => 'DELETE','route' => ['ptkfields.destroy', $ptkfield->id]]) !!}
                                {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                            {!! Form::close() !!}
                        </div>
					</td>
				</tr>

			@endforeach
		</tbody>
	</table>

@stop
