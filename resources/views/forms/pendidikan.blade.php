<div class="tab-pane fade show" id="pills-pendidikan" role="tabpanel" aria-labelledby="pills-account-tab" tabindex="0">
    <div class="row mb-2">
        <div class="col-12">
            <div class="card w-100 position-relative overflow-hidden mb-0 bg-white">
                <div class="card-body p-4">

                    <div class="row mb-2">
                        <div class="col text-start">
                            <h5 class="card-title fw-semibold">Pendidikan Formal</h5>
                        </div>
                        <div class="col text-end">
                            <a href="{{ url('datapendidikanformals/create') }}"
                                class="btn btn-primary text-white card-hover">
                                <h6 class="text-white">+ Pendidikan Formal</h6>
                            </a>
                        </div>
                    </div>

                    <div class="row">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Tingkat</th>
                                    <th>Instansi</th>
                                    <th>Jurusan</th>
                                    <th>Lulus (tahun)</th>
                                    <th>Nilai</th>

                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($datapendidikanformals as $datapendidikanformal)
                                    <tr>
                                        <td>{{ $datapendidikanformal->id }}</td>
                                        <td>{{ $datapendidikanformal->tingkat }}</td>
                                        <td>{{ $datapendidikanformal->instansi }}</td>
                                        <td>{{ $datapendidikanformal->jurusan }}</td>
                                        <td>{{ $datapendidikanformal->lulus_tahun }}</td>
                                        <td>{{ $datapendidikanformal->nilai }}</td>

                                        <td>
                                            <div class="d-flex gap-2">
                                                <a href="{{ route('datapendidikanformals.edit', [$datapendidikanformal->id]) }}"
                                                    class="btn btn-sm btn-primary">Edit</a>
                                                {!! Form::open(['method' => 'DELETE', 'route' => ['datapendidikanformals.destroy', $datapendidikanformal->id]]) !!}
                                                {!! Form::submit('Delete', ['class' => 'btn btn-sm btn-danger']) !!}
                                                {!! Form::close() !!}
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <div class="mt-3 card w-100 position-relative overflow-hidden mb-0 bg-white">
                <div class="card-body p-4">
                    <div class="row mb-2">
                        <div class="col text-start">
                            <h5 class="card-title fw-semibold">Pendidikan Formal</h5>
                        </div>
                        <div class="col text-end">
                            <a href="{{ url('datapendidikannonformals/create') }}" class="btn btn-primary text-white card-hover">
                                <h6 class="text-white">+ Pendidikan Non Formal</h6>
                            </a>
                        </div>
                    </div>
                    <div class="row">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Jenis</th>
                                    <th>Topik</th>
                                    <th>Instansi</th>
                                    <th>Mulai</th>
                                    <th>Selesai</th>

                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($datapendidikannonformals as $datapendidikannonformal)
                                    <tr>
                                        <td>{{ $datapendidikannonformal->id }}</td>
                                        <td>{{ $datapendidikannonformal->jenis }}</td>
                                        <td>{{ $datapendidikannonformal->tingkat }}</td>
                                        <td>{{ $datapendidikannonformal->instansi }}</td>
                                        <td>{{ $datapendidikannonformal->date_start }}</td>
                                        <td>{{ $datapendidikannonformal->date_end }}</td>

                                        <td>
                                            <div class="d-flex gap-2">
                                                <a href="{{ route('datapendidikannonformals.edit', [$datapendidikannonformal->id]) }}"
                                                    class="btn btn-sm btn-primary">Edit</a>
                                                {!! Form::open([
                                                    'method' => 'DELETE',
                                                    'route' => ['datapendidikannonformals.destroy', $datapendidikannonformal->id],
                                                ]) !!}
                                                {!! Form::submit('Delete', ['class' => 'btn btn-sm btn-danger']) !!}
                                                {!! Form::close() !!}
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
    </div>
</div>
