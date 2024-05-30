<div class="tab-pane fade" id="pills-lain" role="tabpanel" aria-labelledby="pills-security-tab" tabindex="0">
    <div class="row">
        <div class="d-flex justify-content-end mb-3"><a href="{{ route('dataolahragas.create') }}"
                class="btn btn-info">Create</a></div>

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Olahraga</th>
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
                                    class="btn btn-xs btn-primary">Edit</a>
                                {!! Form::open(['method' => 'DELETE', 'route' => ['dataolahragas.destroy', $dataolahraga->id]]) !!}
                                {!! Form::submit('Delete', ['class' => 'btn btn-xs btn-danger']) !!}
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

    <div class="row">
        <div class="d-flex justify-content-end mb-3"><a href="{{ route('datadetails.create') }}"
                class="btn btn-info">Create</a></div>

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
                                    class="btn btn-primary">Edit</a>
                                {!! Form::open(['method' => 'DELETE', 'route' => ['datadetails.destroy', $datadetail->id]]) !!}
                                {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                                {!! Form::close() !!}
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div class="row">
        <div class="d-flex justify-content-end mb-3"><a href="{{ route('datakesehatans.create') }}"
                class="btn btn-info">Create</a></div>

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
                        <td>{{ $i+1 }}</td>
                        <td>{{ $datakesehatan->kesehatan }}</td>
                        <td>{{ $datakesehatan->keterangan }}</td>

                        <td>
                            <div class="d-flex gap-2">
                                <a href="{{ route('datakesehatans.show', [$datakesehatan->id]) }}"
                                    class="btn btn-info">Show</a>
                                <a href="{{ route('datakesehatans.edit', [$datakesehatan->id]) }}"
                                    class="btn btn-primary">Edit</a>
                                {!! Form::open(['method' => 'DELETE', 'route' => ['datakesehatans.destroy', $datakesehatan->id]]) !!}
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
