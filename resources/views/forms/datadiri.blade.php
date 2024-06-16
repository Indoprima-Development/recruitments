<div class="tab-pane fade show active" id="pills-account" role="tabpanel" aria-labelledby="pills-account-tab" tabindex="0">
    <div class="card w-100 position-relative overflow-hidden mb-0">
        <div class="card-body p-4">
            {{ Form::model($datadiri, ['url' => ['datadiris/store', Auth::user()->id], 'method' => 'POST']) }}
            <div class="row">
                <div class="col-sm-12 col-md-8">
                    <h5 class="card-title fw-semibold">Data Diri</h5>
                    <p class="card-subtitle mb-4">To change your personal detail , edit and save from here</p>
                </div>
                <div class="col-sm-12 col-md-4 text-end">
                    {{ Form::submit('Simpan Data Diri', ['class' => 'btn btn-primary']) }}
                </div>
            </div>
            <div class="row">
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
                        @foreach (\App\Constants\DatadiriConst::Agama as $d)
                            <option value="{{ $d }}" {{ $datadiri && $datadiri->agama == $d ? 'selected' : '' }}>
                                {{ $d }}</option>
                        @endforeach
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
                        @foreach (\App\Constants\DatadiriConst::StatusRumah as $d)
                            <option value="{{ $d }}" {{ $datadiri && $datadiri->status_rumah == $d ? 'selected' : '' }}>
                                {{ $d }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3 col-sm-12 col-md-4">
                    {{ Form::label('golongan_darah', 'Golongan Darah', ['class' => 'form-label']) }}
                    <select class="form-select" name="golongan_darah">
                        @foreach (\App\Constants\DatadiriConst::GolonganDarah as $d)
                            <option value="{{ $d }}"
                                {{ $datadiri && $datadiri->golongan_darah == $d ? 'selected' : '' }}>{{ $d }}
                            </option>
                        @endforeach
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
                    @foreach (\App\Constants\DatadiriConst::Kendaraan as $d)
                        <div class="form-check">
                            <input name="kendaraan[]" value="{{ $d }}" type="checkbox"
                                class="form-check-input" id="kendaraan{{ $d }}"
                                {{ $datadiri && in_array($d, json_decode($datadiri->kendaraan)) ? 'checked' : '' }}>
                            <label class="form-check-label"
                                for="kendaraan{{ $d }}">{{ $d }}</label>
                        </div>
                    @endforeach
                </div>

                <div class="mb-3 col-sm-12 col-md-6">
                    {{ Form::label('sim', 'SIM (Surat Izin Mengemudi)', ['class' => 'form-label']) }}
                    @foreach (\App\Constants\DatadiriConst::SIM as $d)
                        <div class="form-check">
                            <input name="sim[]" value="{{ $d }}" type="checkbox" class="form-check-input"
                                id="sim{{ $d }}"
                                {{ $datadiri && in_array($d, json_decode($datadiri->sim)) ? 'checked' : '' }}>
                            <label class="form-check-label" for="sim{{ $d }}">{{ $d }}</label>
                        </div>
                    @endforeach
                </div>
            </div>
            {{ Form::close() }}
        </div>
    </div>
</div>
