<div class="tab-pane fade" id="pills-lain" role="tabpanel" aria-labelledby="pills-security-tab" tabindex="0">
    <div class="row">
        <div class="col-md-4 d-flex align-items-stretch">
            <a href="{{ route('dataolahragas.create') }}" class="card bg-success text-white w-100 card-hover">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <i class="ti ti-ball-baseball display-6"></i>
                        <div class="ms-auto">
                            <i class="ti ti-plus fs-8"></i>
                        </div>
                    </div>
                    <div class="mt-4">
                        <h4 class="card-title mb-1 text-white">Hobi</h4>

                    </div>
                </div>
            </a>
        </div>

        <div class="col-md-4 d-flex align-items-stretch">
            <a href="{{ route('datadetails.create') }}" class="card bg-warning text-white w-100 card-hover">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <i class="ti ti-circles-relation display-6"></i>
                        <div class="ms-auto">
                            <i class="ti ti-plus fs-8"></i>
                        </div>
                    </div>
                    <div class="mt-4">
                        <h4 class="card-title mb-1 text-white">Referensi/Rekomendasi</h4>

                    </div>
                </div>
            </a>
        </div>

        <div class="col-md-4 d-flex align-items-stretch">
            <a href="{{ route('datakesehatans.create') }}" class="card bg-danger text-white w-100 card-hover">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <i class="ti ti-first-aid-kit display-6"></i>
                        <div class="ms-auto">
                            <i class="ti ti-plus fs-8"></i>
                        </div>
                    </div>
                    <div class="mt-4">
                        <h4 class="card-title mb-1 text-white">Riwayat Kesehatan</h4>

                    </div>
                </div>
            </a>
        </div>
    </div>
    <div class="card">
        <div class="card-body">
            <div class="row">
                <h4>Hobi</h4>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Hobi</th>
                            <th>Level</th>

                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($dataolahragas as $i => $dataolahraga)
                            <tr>
                                <td>{{ $i + 1 }}</td>
                                <td>{{ $dataolahraga->olahraga }}</td>
                                <td>{{ $dataolahraga->level }}</td>

                                <td>
                                    <div class="d-flex gap-2">
                                        <a href="{{ route('dataolahragas.edit', [$dataolahraga->id]) }}"
                                            class="btn btn-sm btn-primary">Edit</a>
                                        {!! Form::open(['method' => 'DELETE', 'route' => ['dataolahragas.destroy', $dataolahraga->id]]) !!}
                                        {!! Form::submit('Delete', ['class' => 'btn btn-sm btn-danger']) !!}
                                        {!! Form::close() !!}
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

                @if (false)
                    <div class="col-lg-8">
                        <div class="card bg-primary">
                            <div class="card-body p-4">
                                <div class="mb-3">
                                    {{ Form::label('ekspektasi_gaji', 'Ekspektasi_gaji', ['class' => 'form-label']) }}
                                    {{ Form::text('ekspektasi_gaji', null, ['class' => 'form-control']) }}
                                </div>
                                <div class="mb-3">
                                    {{ Form::label('fasilitas_harapan', 'Fasilitas_harapan', ['class' => 'form-label']) }}
                                    {{ Form::textarea('fasilitas_harapan', null, ['class' => 'form-control']) }}
                                </div>
                                <div class="mb-3">
                                    {{ Form::label('kesediaan_penempatan', 'Kesediaan_penempatan', ['class' => 'form-label']) }}
                                    {{ Form::textarea('kesediaan_penempatan', null, ['class' => 'form-control']) }}
                                </div>
                                <div class="mb-3">
                                    {{ Form::label('kesediaan_mulai_bekerja', 'Kesediaan_mulai_bekerja', ['class' => 'form-label']) }}
                                    {{ Form::textarea('kesediaan_mulai_bekerja', null, ['class' => 'form-control']) }}
                                </div>
                                <div class="mb-3">
                                    {{ Form::label('image_jabatan_terakhir', 'Image_jabatan_terakhir', ['class' => 'form-label']) }}
                                    {{ Form::textarea('image_jabatan_terakhir', null, ['class' => 'form-control']) }}
                                </div>
                                <div class="mb-3">
                                    {{ Form::label('keterangan_jabatan_terakhir', 'Keterangan_jabatan_terakhir', ['class' => 'form-label']) }}
                                    {{ Form::textarea('keterangan_jabatan_terakhir', null, ['class' => 'form-control']) }}
                                </div>
                            </div>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>

    <div class="card">
        <div class="card-body">
            <div class="row">
                <h4>Referensi dan Rekomendasi</h4>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Tipe</th>
                            <th>Nama</th>
                            <th>Jabatan</th>
                            <th>Hubungan</th>

                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($datadetails as $i => $datadetail)
                            <tr>
                                <td>{{ $i + 1 }}</td>
                                <td>{{ $datadetail->tipe }}</td>
                                <td>{{ $datadetail->nama }}</td>
                                <td>{{ $datadetail->jabatan }}</td>
                                <td>{{ $datadetail->hubungan }}</td>

                                <td>
                                    <div class="d-flex gap-2">
                                        <a href="{{ route('datadetails.edit', [$datadetail->id]) }}"
                                            class="btn btn-sm btn-primary">Edit</a>
                                        {!! Form::open(['method' => 'DELETE', 'route' => ['datadetails.destroy', $datadetail->id]]) !!}
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

    <div class="card">
        <div class="card-body">
            <div class="row">
                <h4>Riwayat Kesehatan</h4>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Riwayat Kesehatan</th>
                            <th>Keterangan</th>

                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($datakesehatans as $i => $datakesehatan)
                            <tr>
                                <td>{{ $i + 1 }}</td>
                                <td>{{ $datakesehatan->kesehatan }}</td>
                                <td>{{ $datakesehatan->keterangan }}</td>

                                <td>
                                    <div class="d-flex gap-2">
                                        <a href="{{ route('datakesehatans.show', [$datakesehatan->id]) }}"
                                            class="btn btn-info">Show</a>
                                        <a href="{{ route('datakesehatans.edit', [$datakesehatan->id]) }}"
                                            class="btn btn-sm btn-primary">Edit</a>
                                        {!! Form::open(['method' => 'DELETE', 'route' => ['datakesehatans.destroy', $datakesehatan->id]]) !!}
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
