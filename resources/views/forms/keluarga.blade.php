<div class="tab-pane fade show" id="pills-keluarga" role="tabpanel" aria-labelledby="pills-account-tab" tabindex="0">
    <div class="row">
        <div class="col-12">
            <div class="card w-100 position-relative overflow-hidden mb-0 bg-white">
                <div class="card-body p-4">
                    <h5 class="card-title fw-semibold">Keluarga</h5>
                    <p class="card-subtitle mb-4">To change your personal detail , edit and save from here</p>
                    <div class="row">
                        <div class="d-flex justify-content-end mb-3"><a href="{{ url('datakeluargas/create') }}"
                                class="btn btn-info">+ Tambah Data</a></div>

                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Hubungan</th>
                                    <th>Nama</th>
                                    <th>Tempat,Tanggal Lahir</th>
                                    <th>Pekerjaan</th>
                                    <th>Alamat</th>

                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($datakeluargas as $i => $datakeluarga)
                                    <tr>
                                        <td>{{ $i+1 }}</td>
                                        <td>{{ $datakeluarga->status_hubungan }}</td>
                                        <td>{{ $datakeluarga->nama_keluarga }}</td>
                                        <td>{{ $datakeluarga->tempat_lahir_keluarga }}, {{ $datakeluarga->tanggal_lahir_keluarga }}</td>
                                        <td>{{ $datakeluarga->pekerjaan }}</td>
                                        <td>{{ $datakeluarga->alamat }}</td>

                                        <td>
                                            <div class="d-flex gap-2">
                                                <a href="{{ route('datakeluargas.edit', [$datakeluarga->id]) }}"
                                                    class="btn btn-sm btn-primary">Edit</a>
                                                {!! Form::open(['method' => 'DELETE', 'route' => ['datakeluargas.destroy', $datakeluarga->id]]) !!}
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
