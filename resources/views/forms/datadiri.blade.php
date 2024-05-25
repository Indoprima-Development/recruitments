<div class="tab-pane fade show active" id="pills-account" role="tabpanel" aria-labelledby="pills-account-tab" tabindex="0">
    <div class="row">
        <div class="col-12">
            <div class="card w-100 position-relative overflow-hidden mb-0">
                <div class="card-body p-4">
                    <h5 class="card-title fw-semibold">Personal Details</h5>
                    <p class="card-subtitle mb-4">To change your personal detail , edit and save from here</p>
                    <div class="row">
                        {{ Form::model($datadiri, ['url' => ['datadiris/update', Auth::user()->id], 'method' => 'PUT']) }}
                        <div class="mb-3 col-12">
                            {{ Form::label('name', 'Nama Lengkap', ['class' => 'form-label']) }}
                            {{ Form::text('name', null, ['class' => 'form-control']) }}
                        </div>

                        <div class="mb-3 col-sm-12 col-md-6">
                            {{ Form::label('ktp', 'KTP', ['class' => 'form-label']) }}
                            {{ Form::text('ktp', null, ['class' => 'form-control']) }}
                        </div>

                        <div class="mb-3 col-sm-12 col-md-6">
                            {{ Form::label('agama', 'Agama', ['class' => 'form-label']) }}
                            <select class="form-select" name="agama">
                                <option value="Islam">Islam</option>
                                <option value="Kristen">Kristen</option>
                                <option value="Katolik">Katolik</option>
                                <option value="Hindu">Hindu</option>
                                <option value="Budha">Budha</option>
                                <option value="Konghucu">Konghucu</option>
                            </select>
                        </div>

                        <div class="mb-3 col-sm-12 col-md-4">
                            {{ Form::label('gender', 'Gender', ['class' => 'form-label']) }}
                            <select class="form-select" name="gender">
                                <option value="1">Laki - laki</option>
                                <option value="0">Perempuan</option>
                            </select>
                        </div>
                        <div class="mb-3 col-sm-12 col-md-4">
                            {{ Form::label('tempat_lahir', 'Tempat Lahir', ['class' => 'form-label']) }}
                            {{ Form::text('tempat_lahir', null, ['class' => 'form-control']) }}
                        </div>
                        <div class="mb-3 col-sm-12 col-md-4">
                            {{ Form::label('tanggal_lahir', 'Tanggal Lahir', ['class' => 'form-label']) }}
                            {{ Form::date('tanggal_lahir', null, ['class' => 'form-control']) }}
                        </div>

                        <div class="mb-3 col-sm-12 col-md-6">
                            {{ Form::label('no_hp', 'No. HP', ['class' => 'form-label']) }}
                            {{ Form::text('no_hp', null, ['class' => 'form-control']) }}
                        </div>
                        <div class="mb-3 col-sm-12 col-md-6">
                            {{ Form::label('no_wa', 'No. WA', ['class' => 'form-label']) }}
                            {{ Form::text('no_wa', null, ['class' => 'form-control']) }}
                        </div>
                        <div class="mb-3 col-12">
                            {{ Form::label('alamat', 'Alamat', ['class' => 'form-label']) }}
                            {{ Form::textarea('alamat', null, ['class' => 'form-control']) }}
                        </div>
                        <div class="mb-3">
                            {{ Form::label('status_rumah', 'Status Tempat Tinggal', ['class' => 'form-label']) }}
                            <select class="form-select" name="status_rumah">
                                <option value="Milik Pribadi">Milik Pribadi</option>
                                <option value="Milik Orang Tua">Milik Orang Tua</option>
                                <option value="Kost">Kost</option>
                                <option value="Kontrak">Kontrak</option>
                                <option value="Apartment">Apartment</option>
                            </select>
                        </div>
                        <div class="mb-3 col-sm-12 col-md-4">
                            {{ Form::label('golongan_darah', 'Golongan Darah', ['class' => 'form-label']) }}
                            <select class="form-select" name="golongan_darah">
                                <option value="A">A</option>
                                <option value="B">B</option>
                                <option value="AB">AB</option>
                                <option value="O">O</option>
                            </select>
                        </div>
                        <div class="mb-3 col-sm-12 col-md-4">
                            {{ Form::label('tinggi_badan', 'Tinggi Badan', ['class' => 'form-label']) }}
                            {{ Form::number('tinggi_badan', null, ['class' => 'form-control']) }}
                        </div>
                        <div class="mb-3 col-sm-12 col-md-4">
                            {{ Form::label('berat_badan', 'Berat Badan', ['class' => 'form-label']) }}
                            {{ Form::number('berat_badan', null, ['class' => 'form-control']) }}
                        </div>

                        <div class="mb-3 col-sm-12 col-md-6">
                            {{ Form::label('kendaraan', 'Kendaraan', ['class' => 'form-label']) }}
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" id="customCheck1">
                                <label class="form-check-label" for="customCheck1">Roda Dua</label>
                            </div>

                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" id="customCheck2">
                                <label class="form-check-label" for="customCheck2">Roda Empat</label>
                            </div>
                        </div>

                        <div class="mb-3 col-sm-12 col-md-6">
                            {{ Form::label('sim', 'SIM (Surat Izin Mengemudi)', ['class' => 'form-label']) }}
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" id="sim1">
                                <label class="form-check-label" for="sim1">A</label>
                            </div>

                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" id="sim2">
                                <label class="form-check-label" for="sim2">B1</label>
                            </div>

                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" id="sim3">
                                <label class="form-check-label" for="sim3">B2</label>
                            </div>

                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" id="sim4">
                                <label class="form-check-label" for="sim4">C</label>
                            </div>

                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" id="sim5">
                                <label class="form-check-label" for="sim5">D</label>
                            </div>
                        </div>

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

                        {{ Form::submit('Edit', ['class' => 'btn btn-primary']) }}

                        {{ Form::close() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
