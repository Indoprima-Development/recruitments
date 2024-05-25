<div class="tab-pane fade" id="pills-security" role="tabpanel" aria-labelledby="pills-security-tab" tabindex="0">
    <div class="row">
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
    </div>
</div>
