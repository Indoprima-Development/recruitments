<div class="tab-pane fade" id="pills-pernyataan" role="tabpanel" aria-labelledby="pills-security-tab" tabindex="0">
    <div class="card">
        <div class="card-body p-4">
            {{ Form::model($datadiri, ['url' => ['datadiris/pernyataan', Auth::user()->id], 'method' => 'POST',  'enctype'=>'multipart/form-data']) }}
            <div class="row">
                <div class="col-sm-12 col-md-8">
                    <h5 class="card-title fw-semibold">Pernyataan</h5>
                    <p class="card-subtitle mb-4">To change your personal detail , edit and save from here</p>
                </div>
                <div class="col-sm-12 col-md-4 text-end">
                    {{ Form::submit('Simpan Pernyataan', ['class' => 'btn btn-primary']) }}
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
                    <br><small class="text-danger">Apakah bersedia ditempatkan di seluruh unit bisnis PT. Indoprima Gelimang ?</small>
                    <select name="kesediaan_penempatan" class="form-select">
                        <option {{$datadiri && $datadiri->kesediaan_penempatan == 1 ? "selected" : ""}} value="1">Ya</option>
                        <option {{ $datadiri && $datadiri->kesediaan_penempatan == 0 ? "selected" : ""}} value="0">Tidak</option>
                    </select>
                </div>
                <div class="mb-3 col-sm-12 col-md-6">
                    {{ Form::label('keterangan_jabatan_terakhir', 'Keterangan Jabatan Terakhir', ['class' => 'form-label']) }}
                    <br><small class="text-danger">Terangkan struktur organisasi anda di perusahaan terakhir</small>
                    {{ Form::textarea('keterangan_jabatan_terakhir', null, ['class' => 'form-control']) }}
                </div>

                <div class="mb-3 col-sm-12 col-md-6">
                    {{ Form::label('image_jabatan_terakhir', 'Image Jabatan Terakhir', ['class' => 'form-label']) }}
                    <br><small class="text-danger">Gambarkan struktur organisasi anda di perusahaan terakhir</small>
                    <input type="file" class="form-control" name="image_jabatan_terakhir" />

                    @if($datadiri && $datadiri->image_jabatan_terakhir != "-")
                    <img class="w-100 mt-2" src="{{asset($datadiri->image_jabatan_terakhir)}}" />
                    @endif
                </div>
            </div>
            {{ Form::close() }}
        </div>
    </div>
</div>
