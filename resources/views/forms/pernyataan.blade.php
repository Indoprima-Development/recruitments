<div class="tab-pane fade" id="pills-pernyataan" role="tabpanel" aria-labelledby="pills-security-tab" tabindex="0">
    <div class="card">
        <div class="card-body p-4">
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
                    {{ Form::text('kesediaan_penempatan', null, ['class' => 'form-control']) }}
                </div>
                <div class="mb-3 col-sm-12 col-md-6">
                    {{ Form::label('keterangan_jabatan_terakhir', 'Keterangan Jabatan Terakhir', ['class' => 'form-label']) }}
                    <br><small class="text-danger">Terangkan struktur organisasi anda di perusahaan terakhir</small>
                    {{ Form::text('keterangan_jabatan_terakhir', null, ['class' => 'form-control']) }}
                </div>

                <div class="mb-3 col-sm-12 col-md-6">
                    {{ Form::label('image_jabatan_terakhir', 'Image Jabatan Terakhir', ['class' => 'form-label']) }}
                    <br><small class="text-danger">Gambarkan struktur organisasi anda di perusahaan terakhir</small>
                    {{ Form::textarea('image_jabatan_terakhir', null, ['class' => 'form-control']) }}
                    <select>
                        
                    </select>
                </div>
            </div>
        </div>
    </div>
</div>
