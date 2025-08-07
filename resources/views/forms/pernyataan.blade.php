<div class="tab-pane fade" id="pills-pernyataan" role="tabpanel" aria-labelledby="pills-security-tab" tabindex="0">
    <div class="card">
        <div class="card-body p-4">
            {{ Form::model($datadiri, ['url' => ['datadiris/pernyataan', Auth::user()->id], 'method' => 'POST', 'enctype' => 'multipart/form-data']) }}
            <div class="row">
                <div class="col-sm-12 col-md-8">
                    <h5 class="card-title fw-semibold">Pernyataan</h5>
                </div>
                <div class="col-sm-12 col-md-4 text-end">
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                        data-bs-target="#exampleModal">
                        Simpan Pernyataan
                    </button>
                </div>
            </div>

            <div class="row">
                <div class="mb-3 col-sm-12 col-md-6">
                    {{ Form::label('ekspektasi_gaji', 'Ekspektasi Gaji', ['class' => 'form-label']) }}
                    {{ Form::number('ekspektasi_gaji', null, ['class' => 'form-control']) }}
                </div>
                <div class="mb-3 col-sm-12 col-md-6">
                    {{ Form::label('kesediaan_mulai_bekerja', 'Kesediaan Mulai Bekerja', ['class' => 'form-label']) }}
                    {{ Form::date('kesediaan_mulai_bekerja', null, ['class' => 'form-control']) }}
                </div>
                <div class="mb-3 col-sm-12 col-md-6">
                    {{ Form::label('fasilitas_harapan', 'Fasilitas Harapan', ['class' => 'form-label']) }}
                    <br><small class="text-danger">Tuliskan fasilitas yang diharapkan apabila anda diterima</small>
                    {{ Form::text('fasilitas_harapan', null, ['class' => 'form-control']) }}
                </div>
                <div class="mb-3 col-sm-12 col-md-6">
                    {{ Form::label('kesediaan_penempatan', 'Kesediaan Penempatan', ['class' => 'form-label']) }}
                    <br><small class="text-danger">Apakah bersedia ditempatkan di seluruh unit bisnis PT Indoprima Gelimang</small>
                    <select name="kesediaan_penempatan" class="form-select">
                        <option {{ $datadiri && $datadiri->kesediaan_penempatan == 1 ? 'selected' : '' }}
                            value="1">Ya</option>
                        <option {{ $datadiri && $datadiri->kesediaan_penempatan == 0 ? 'selected' : '' }}
                            value="0">Tidak</option>
                    </select>
                </div>

                {{ Form::hidden('keterangan_jabatan_terakhir', '-', ['class' => 'form-control']) }}

                <div class="mb-3 col-sm-12 col-md-6">
                    {{ Form::label('image_jabatan_terakhir', 'Struktur Organisasi', ['class' => 'form-label']) }}
                    <br><small class="text-danger">(Opsional) Gambarkan struktur organisasi anda di perusahaan
                        terakhir</small>
                    <input type="file" class="form-control" name="image_jabatan_terakhir" accept="image/*" />

                    @if ($datadiri && $datadiri->image_jabatan_terakhir != '-')
                        <img class="w-100 mt-2" src="{{ asset($datadiri->image_jabatan_terakhir) }}" />
                    @endif
                </div>
            </div>

            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Pernyataan</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            Demikian keterangan-keterangan tersebut, saya berikan dengan sebenar-benarnya. Apabila
                            keterangan
                            tersebut menyimpang dari keadaan yang sebenarnya, saya bersedia melepaskan kesempatan saya
                            untuk
                            menjalani tahapan seleksi selanjutnya atau diberhentikan setelah diterima kerja.
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary">Setuju</button>
                        </div>
                    </div>
                </div>
            </div>
            {{ Form::close() }}
        </div>
    </div>

    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-sm-12 col-md-8">
                    <h5 class="card-title fw-semibold">Referensi dan Rekomendasi</h5>
                </div>
                <div class="col-sm-12 col-md-4 text-end">
                    <a href="#" class="btn btn-primary" >
                        + Rekomendasi
                    </a>
                </div>
            </div>
            <div class="row">
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
                                        <a href="{{ route('datadetails.edit', [Crypt::encryptString($datadetail->id)]) }}"
                                            class="btn btn-sm btn-primary">Edit</a>
                                        {!! Form::open(['method' => 'DELETE', 'route' => ['datadetails.destroy', Crypt::encryptString($datadetail->id)]]) !!}
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
