@extends('layouts.layouts')

@section('content')
    @if($errors->any())
		<div class="alert alert-danger">
			@foreach ($errors->all() as $error)
				{{ $error }} <br>
			@endforeach
		</div>
	@endif

	<div class="row">
		<div class="col-12 grid-margin stretch-card">
			<div class="card">
				<div class="card-body">
					<h4 class="card-title">Users Data</h4>
                    <table id="tableUsers" class="table table-bordered">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Noreg</th>
                                <th>Name</th>
                                <th>Superior</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($users as $i => $user)

                                <tr>
                                    <td>{{ $i+1 }}</td>
                                    <td>{{ $user->noreg }}</td>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->atasan->name }}</td>
                                    <td>
                                        <div class="d-flex gap-2">
                                            <button type="button" index="{{$i}}" class="btn btn-primary buttonEditUser">
                                                Edit
                                            </button>
                                        </div>
                                    </td>
                                </tr>

                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    

<!-- Modal -->
<div class="modal fade" id="modalEditUser" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Edit User</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
        <form method="POST" action="{{url('users/update')}}">
            @csrf
            <div class="modal-body">
                <div class="form-group">
                    <label for="dateend">User</label>
                    <input id="form0" type="hidden">
                    <input id="form1" disabled type="text" class="form-control">
                </div>

                <div class="form-group">
                    <label for="dateend">Superior</label>
                    <select id="form2" name="atasan_user_id" class="form-select" aria-label="Default select example">
                        @foreach($users as $user)
                            <option value="{{$user->id}}">{{$user->name}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save changes</button>
            </div>
        </form>
    </div>
  </div>
</div>

    
@endsection

@section('addJs')
@include('helpers.dataTable')
@include('helpers.json')

<script>
    $(document).ready(function () {
        var dt = [
            '#tableUsers'
        ]

        for (let i = 0; i < dt.length; i++) {
            InitDataTables(dt[i])
        }
    });

    $(".buttonEditUser").click(function() {
        var users = strToJsObject("{{$users}}");
        var indexUser = $(this).attr('index');

        $('#form0').val(users[indexUser].id)
        $('#form1').val(users[indexUser].name)
        $('#form2').val(users[indexUser].atasan_user_id)
        $("#modalEditUser").modal('show');
    });
</script>
@endsection
