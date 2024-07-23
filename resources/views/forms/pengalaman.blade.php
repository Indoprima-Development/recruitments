<div class="tab-pane fade show" id="pills-pengalaman" role="tabpanel" aria-labelledby="pills-account-tab" tabindex="0">
    <div class="row">
        <div class="col-12">
            <div class="card w-100 position-relative overflow-hidden mb-0 bg-white">
                <div class="card-body p-4">
                    <h5 class="card-title fw-semibold">Pengalaman</h5>
                    <p class="card-subtitle mb-4">To change your personal detail , edit and save from here</p>
                    <div class="table-responsive">
                        <div class="d-flex justify-content-end mb-3">
                            <a href="{{ url('datapengalamankerjas/create') }}" class="btn btn-info">+ Tambah Data</a>
                        </div>

                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Instansi</th>
                                    <th>Jabatan Awal</th>
                                    <th>Jabatan Akhir</th>
                                    <th>Gaji Awal</th>
                                    <th>Gaji Akhir</th>
                                    <th>Mulai</th>
                                    <th>Akhir</th>
                                    <th>Alasan Keluar</th>
                                    <th>Surat</th>

                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($datapengalamankerjas as $datapengalamankerja)
                                    <tr>
                                        <td>{{ $datapengalamankerja->id }}</td>
                                        <td>{{ $datapengalamankerja->perusahaan }}</td>
                                        <td>{{ $datapengalamankerja->jabatan_awal }}</td>
                                        <td>{{ $datapengalamankerja->jabatan_terakhir }}</td>
                                        <td>{{ $datapengalamankerja->gaji_awal }}</td>
                                        <td>{{ $datapengalamankerja->gaji_akhir }}</td>
                                        <td>{{ $datapengalamankerja->date_start }}</td>
                                        <td>{{ $datapengalamankerja->date_end }}</td>
                                        <td>{{ $datapengalamankerja->alasan_keluar }}</td>
                                        <td>
                                            @if ($datapengalamankerja->surat_pengalaman != '-')
                                                <a class="btn btn-outline-success btn-sm" target="_blank"
                                                    href="{{ url($datapengalamankerja->surat_pengalaman) }}">
                                                    <i class="ti ti-file me-2 fs-6"></i>
                                                </a>
                                            @else
                                                -
                                            @endif
                                        </td>

                                        <td>
                                            <div class="d-flex gap-2">
                                                <a href="{{ route('datapengalamankerjas.edit', [$datapengalamankerja->id]) }}"
                                                    class="btn btn-sm btn-primary">Edit</a>
                                                {!! Form::open(['method' => 'DELETE', 'route' => ['datapengalamankerjas.destroy', $datapengalamankerja->id]]) !!}
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
