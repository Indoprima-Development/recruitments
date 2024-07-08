@extends('default')

@section('content')

	<div class="d-flex justify-content-end mb-3"><a href="{{ route('ptk_approvals.create') }}" class="btn btn-info">Create</a></div>

	<table class="table table-bordered">
		<thead>
			<tr>
				<th>id</th>
				<th>department</th>
				<th>divisi</th>
				<th>noreg</th>

				<th>Action</th>
			</tr>
		</thead>
		<tbody>
			@foreach($ptk_approvals as $ptk_approval)

				<tr>
					<td>{{ $ptk_approval->id }}</td>
					<td>{{ $ptk_approval->department }}</td>
					<td>{{ $ptk_approval->divisi }}</td>
					<td>{{ $ptk_approval->noreg }}</td>

					<td>
						<div class="d-flex gap-2">
                            <a href="{{ route('ptk_approvals.show', [$ptk_approval->id]) }}" class="btn btn-info">Show</a>
                            <a href="{{ route('ptk_approvals.edit', [$ptk_approval->id]) }}" class="btn btn-primary">Edit</a>
                            {!! Form::open(['method' => 'DELETE','route' => ['ptk_approvals.destroy', $ptk_approval->id]]) !!}
                                {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                            {!! Form::close() !!}
                        </div>
					</td>
				</tr>

			@endforeach
		</tbody>
	</table>

@stop
