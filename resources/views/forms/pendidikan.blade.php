<div class="tab-pane fade show" id="pills-pendidikan" role="tabpanel" aria-labelledby="pills-account-tab" tabindex="0">
    <div class="row">
        <div class="col-12">
            <div class="card w-100 position-relative overflow-hidden mb-0 bg-white">
                <div class="card-body p-4">
                    <h5 class="card-title fw-semibold">Pendidikan Formal</h5>
                    <p class="card-subtitle mb-4">To change your personal detail , edit and save from here</p>
                    <div class="row">
                        <div class="d-flex justify-content-end mb-3"><a
                                href="{{ url('datapendidikanformals/create') }}" class="btn btn-info">Create</a>
                        </div>
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
                                                    class="btn btn-primary">Edit</a>
                                                {!! Form::open(['method' => 'DELETE', 'route' => ['datapendidikanformals.destroy', $datapendidikanformal->id]]) !!}
                                                {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
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
                    <h5 class="card-title fw-semibold">Pendidikan Non Formal</h5>
                    <p class="card-subtitle mb-4">To change your personal detail , edit and save from here</p>
                    <div class="row">
                        <div class="d-flex justify-content-end mb-3"><a
                                href="{{ url('datapendidikannonformals/create') }}" class="btn btn-info">Create</a>
                        </div>

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
