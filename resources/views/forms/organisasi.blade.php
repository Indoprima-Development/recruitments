<div class="tab-pane fade show" id="pills-organisasi" role="tabpanel" aria-labelledby="pills-account-tab" tabindex="0">
    <div class="row">
        <div class="col-12">
            <div class="card w-100 position-relative overflow-hidden mb-0 bg-white">
                <div class="card-body p-4">
                    <h5 class="card-title fw-semibold">Organisasi</h5>
                    <p class="card-subtitle mb-4">To change your personal detail , edit and save from here</p>
                    <div class="row">
                        <div class="d-flex justify-content-end mb-3"><a href="{{ route('dataorganisasis.create') }}"
                                class="btn btn-info">+ Tambah Data</a></div>

                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama</th>
                                    <th>Tingkat</th>
                                    <th>Jabatan</th>
                                    <th>Mulai</th>
                                    <th>Akhir</th>

                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($dataorganisasis as $i => $dataorganisasi)
                                    <tr>
                                        <td>{{ $i+1 }}</td>
                                        <td>{{ $dataorganisasi->nama_organisasi }}</td>
                                        <td>{{ $dataorganisasi->tingkat }}</td>
                                        <td>{{ $dataorganisasi->jabatan }}</td>
                                        <td>{{ $dataorganisasi->start_date }}</td>
                                        <td>{{ $dataorganisasi->end_date }}</td>

                                        <td>
                                            <div class="d-flex gap-2">
                                                <a href="{{ route('dataorganisasis.edit', [$dataorganisasi->id]) }}"
                                                    class="btn btn-sm btn-primary">Edit</a>
                                                {!! Form::open(['method' => 'DELETE', 'route' => ['dataorganisasis.destroy', $dataorganisasi->id]]) !!}
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
