<div class="tab-pane fade show active" id="pills-account" role="tabpanel" aria-labelledby="pills-account-tab" tabindex="0">

    <!-- Hero / Intro Section for Data Diri -->
    <div class="mb-4">
        <h4 class="fw-bolder text-dark mb-1">Informasi Personal</h4>
        <p class="text-muted small">Lengkapi data diri Anda dengan informasi yang valid dan terbaru.</p>
    </div>

    <!-- Main Data Diri Form -->
    <div class="card border-0 shadow-sm rounded-4 bg-white mb-5 position-relative overflow-hidden">
        <div class="position-absolute top-0 start-0 w-100 h-1 bg-primary"></div> <!-- Top Accent Line -->

        <div class="card-body p-4 p-lg-5">
            @if ($errors->any())
                <div
                    class="alert alert-danger border-0 bg-danger bg-opacity-10 text-danger mb-4 rounded-3 d-flex align-items-center">
                    <i class="ti ti-alert-circle fs-4 me-3"></i>
                    <div>
                        <ul class="mb-0 ps-3">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            @endif

            {{ Form::model($datadiri, ['url' => ['datadiris/store', Auth::user()->id], 'method' => 'POST', 'class' => 'needs-validation', 'novalidate']) }}

            <!-- Section: Identitas Utama -->
            <div class="mb-5">
                <div class="d-flex align-items-center mb-4">
                    <span class="bg-primary bg-opacity-10 text-primary rounded-circle p-2 me-3">
                        <i class="ti ti-id fs-5"></i>
                    </span>
                    <h5 class="fw-bold mb-0">Identitas Utama</h5>
                </div>

                <div class="row g-4">
                    <div class="col-12">
                        <div class="form-floating">
                            {{ Form::text('name', null, ['class' => 'form-control bg-light-subtle border-light shadow-none fw-medium', 'placeholder' => 'Nama Lengkap', 'required', 'id' => 'name']) }}
                            {{ Form::label('name', 'Nama Lengkap (Sesuai KTP)') }}
                            <div class="invalid-feedback">Nama wajib diisi.</div>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-floating">
                            {{ Form::text('ktp', null, ['class' => 'form-control bg-light-subtle border-light shadow-none fw-medium', 'placeholder' => 'Nomor KTP', 'required', 'id' => 'ktp']) }}
                            {{ Form::label('ktp', 'Nomor KTP') }}
                            <div class="invalid-feedback">Nomor KTP wajib diisi.</div>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-floating">
                            <select class="form-select bg-light-subtle border-light shadow-none fw-medium"
                                name="agama" id="agama" required>
                                <option value="" disabled selected>Pilih Agama</option>
                                @foreach (\App\Constants\DatadiriConst::Agama as $d)
                                    <option value="{{ $d }}"
                                        {{ $datadiri && $datadiri->agama == $d ? 'selected' : '' }}>{{ $d }}
                                    </option>
                                @endforeach
                            </select>
                            {{ Form::label('agama', 'Agama') }}
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="form-floating">
                            <select class="form-select bg-light-subtle border-light shadow-none fw-medium"
                                name="gender" id="gender" required>
                                <option value="" disabled selected>Pilih Gender</option>
                                <option value="1" {{ $datadiri && $datadiri->gender == 1 ? 'selected' : '' }}>
                                    Laki-laki</option>
                                <option value="0" {{ $datadiri && $datadiri->gender == 0 ? 'selected' : '' }}>
                                    Perempuan</option>
                            </select>
                            {{ Form::label('gender', 'Jenis Kelamin') }}
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="form-floating">
                            {{ Form::text('tempat_lahir', null, ['class' => 'form-control bg-light-subtle border-light shadow-none fw-medium', 'placeholder' => 'Tempat Lahir', 'required', 'id' => 'tempat_lahir']) }}
                            {{ Form::label('tempat_lahir', 'Tempat Lahir') }}
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="form-floating">
                            {{ Form::date('tanggal_lahir', null, ['class' => 'form-control bg-light-subtle border-light shadow-none fw-medium', 'required', 'id' => 'tanggal_lahir']) }}
                            {{ Form::label('tanggal_lahir', 'Tanggal Lahir') }}
                        </div>
                    </div>
                </div>
            </div>

            <hr class="border-light my-5">

            <!-- Section: Kontak & Alamat -->
            <div class="mb-5">
                <div class="d-flex align-items-center mb-4">
                    <span class="bg-success bg-opacity-10 text-success rounded-circle p-2 me-3">
                        <i class="ti ti-map-pin fs-5"></i>
                    </span>
                    <h5 class="fw-bold mb-0">Kontak & Domisili</h5>
                </div>

                <div class="row g-4">
                    <div class="col-md-6">
                        <div class="form-floating">
                            {{ Form::text('no_hp', null, ['class' => 'form-control bg-light-subtle border-light shadow-none fw-medium', 'placeholder' => 'No HP', 'required', 'id' => 'no_hp']) }}
                            {{ Form::label('no_hp', 'Nomor HP (Aktif)') }}
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-floating">
                            {{ Form::text('no_wa', null, ['class' => 'form-control bg-light-subtle border-light shadow-none fw-medium', 'placeholder' => 'No WA', 'id' => 'no_wa']) }}
                            {{ Form::label('no_wa', 'Nomor WhatsApp') }}
                        </div>
                    </div>

                    <div class="col-12">
                        <div class="form-floating">
                            {{ Form::textarea('alamat', null, ['class' => 'form-control bg-light-subtle border-light shadow-none fw-medium', 'placeholder' => 'Alamat', 'style' => 'height: 100px', 'required', 'id' => 'alamat']) }}
                            {{ Form::label('alamat', 'Alamat Lengkap (Jalan, RT/RW, Kel/Desa, Kec)') }}
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="form-floating">
                            <select id="provinces"
                                class="form-select bg-light-subtle border-light shadow-none fw-medium">
                                <option value="{{ $datadiri->provinces ?? '-' }}">
                                    {{ $datadiri->provinces ?? 'Pilih Provinsi' }}</option>
                            </select>
                            {{ Form::label('provinces', 'Provinsi') }}
                            <input type="hidden" name="provinces" id="dataProvince"
                                value="{{ $datadiri->provinces ?? '-' }}">
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="form-floating">
                            <select name="cities" id="cities"
                                class="form-select bg-light-subtle border-light shadow-none fw-medium">
                                <option value="{{ $datadiri->cities ?? '-' }}">{{ $datadiri->cities ?? 'Pilih Kota' }}
                                </option>
                            </select>
                            {{ Form::label('cities', 'Kota/Kabupaten') }}
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="form-floating">
                            <select class="form-select bg-light-subtle border-light shadow-none fw-medium"
                                name="status_rumah" id="status_rumah">
                                <option value="" disabled selected>Pilih Status</option>
                                @foreach (\App\Constants\DatadiriConst::StatusRumah as $d)
                                    <option value="{{ $d }}"
                                        {{ $datadiri && $datadiri->status_rumah == $d ? 'selected' : '' }}>
                                        {{ $d }}</option>
                                @endforeach
                            </select>
                            {{ Form::label('status_rumah', 'Status Rumah') }}
                        </div>
                    </div>
                </div>
            </div>

            <hr class="border-light my-5">

            <!-- Section: Data Fisik & Kendaraan -->
            <div class="row g-5">
                <!-- Data Fisik -->
                <div class="col-lg-6">
                    <div class="d-flex align-items-center mb-4">
                        <span class="bg-danger bg-opacity-10 text-danger rounded-circle p-2 me-3">
                            <i class="ti ti-heart-rate-monitor fs-5"></i>
                        </span>
                        <h5 class="fw-bold mb-0">Data Fisik</h5>
                    </div>

                    <div class="row g-3">
                        <div class="col-md-4">
                            <div class="bg-light-subtle rounded-3 p-3 text-center border border-light">
                                <label class="small text-muted mb-2 d-block">Gol. Darah</label>
                                <select class="form-select border-0 bg-white shadow-sm text-center fw-bold"
                                    name="golongan_darah" id="golongan_darah">
                                    <option value="" disabled selected>-</option>
                                    @foreach (\App\Constants\DatadiriConst::GolonganDarah as $d)
                                        <option value="{{ $d }}"
                                            {{ $datadiri && $datadiri->golongan_darah == $d ? 'selected' : '' }}>
                                            {{ $d }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="bg-light-subtle rounded-3 p-3 text-center border border-light">
                                <label class="small text-muted mb-2 d-block">Tinggi (cm)</label>
                                {{ Form::number('tinggi_badan', null, ['class' => 'form-control border-0 bg-white shadow-sm text-center fw-bold', 'placeholder' => '0']) }}
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="bg-light-subtle rounded-3 p-3 text-center border border-light">
                                <label class="small text-muted mb-2 d-block">Berat (kg)</label>
                                {{ Form::number('berat_badan', null, ['class' => 'form-control border-0 bg-white shadow-sm text-center fw-bold', 'placeholder' => '0']) }}
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Dokumen & Kendaraan -->
                <div class="col-lg-6">
                    <div class="d-flex align-items-center mb-4">
                        <span class="bg-warning bg-opacity-10 text-warning rounded-circle p-2 me-3">
                            <i class="ti ti-car fs-5"></i>
                        </span>
                        <h5 class="fw-bold mb-0">Kendaraan & SIM</h5>
                    </div>

                    <div class="d-flex flex-column gap-3">
                        <!-- Kendaraan -->
                        <div>
                            <label class="small fw-bold text-muted text-uppercase mb-2">Kepemilikan Kendaraan</label>
                            <div class="d-flex flex-wrap gap-2">
                                @foreach (\App\Constants\DatadiriConst::Kendaraan as $d)
                                    <input type="checkbox" class="btn-check" name="kendaraan[]"
                                        value="{{ $d }}" id="vehicle_{{ $d }}"
                                        {{ $datadiri && in_array($d, json_decode($datadiri->kendaraan ?? '[]') ?? []) ? 'checked' : '' }}>
                                    <label class="btn btn-outline-secondary rounded-pill btn-sm px-3"
                                        for="vehicle_{{ $d }}">{{ $d }}</label>
                                @endforeach
                            </div>
                        </div>

                        <!-- SIM -->
                        <div>
                            <label class="small fw-bold text-muted text-uppercase mb-2">Kepemilikan SIM</label>
                            <div class="d-flex flex-wrap gap-2">
                                @foreach (\App\Constants\DatadiriConst::SIM as $d)
                                    <input type="checkbox" class="btn-check" name="sim[]"
                                        value="{{ $d }}" id="sim_{{ $d }}"
                                        {{ $datadiri && in_array($d, json_decode($datadiri->sim ?? '[]') ?? []) ? 'checked' : '' }}>
                                    <label class="btn btn-outline-secondary rounded-pill btn-sm px-3"
                                        for="sim_{{ $d }}">{{ $d }}</label>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="mt-5 pt-3 border-top">
                <button type="submit"
                    class="btn btn-primary rounded-pill px-5 py-3 fw-bold shadow-lg hover-scale w-100 w-md-auto">
                    <i class="ti ti-device-floppy me-2"></i> Simpan Perubahan
                </button>
            </div>

            {{ Form::close() }}
        </div>
    </div>

    <!-- Hobi Section -->
    <div class="row g-4 mb-4">
        <div class="col-12">
            <div class="card border-0 shadow-sm rounded-4 overflow-hidden bg-white">
                <div
                    class="card-header bg-white p-4 border-bottom-0 d-flex justify-content-between align-items-center">
                    <div class="d-flex align-items-center">
                        <span class="bg-info bg-opacity-10 text-info rounded-circle p-2 me-3">
                            <i class="ti ti-ball-football fs-5"></i>
                        </span>
                        <div>
                            <h5 class="fw-bold mb-0">Hobi & Minat</h5>
                            <p class="text-muted small mb-0">Aktivitas di waktu luang</p>
                        </div>
                    </div>
                    <a href="{{ route('dataolahragas.create') }}"
                        class="btn btn-sm btn-light text-primary fw-bold rounded-pill px-3 hover-primary">
                        <i class="ti ti-plus me-1"></i> Tambah
                    </a>
                </div>
                <div class="card-body p-4 pt-0">
                    <div class="row g-3">
                        @forelse ($dataolahragas as $dataolahraga)
                            <div class="col-md-6 col-lg-4">
                                <div
                                    class="p-3 rounded-3 border border-light-subtle bg-light-subtle position-relative h-100">
                                    <div class="d-flex justify-content-between align-items-start">
                                        <div>
                                            <h6 class="fw-bold text-dark mb-1">{{ $dataolahraga->olahraga }}</h6>
                                            <span
                                                class="badge bg-white border text-dark rounded-pill">{{ $dataolahraga->level }}</span>
                                        </div>
                                        <div class="dropdown">
                                            <button class="btn btn-sm btn-icon btn-ghost-secondary rounded-circle"
                                                type="button" data-bs-toggle="dropdown">
                                                <i class="ti ti-dots-vertical"></i>
                                            </button>
                                            <ul class="dropdown-menu dropdown-menu-end shadow-sm border-0">
                                                <li><a class="dropdown-item"
                                                        href="{{ route('dataolahragas.edit', [Crypt::encryptString($dataolahraga->id)]) }}"><i
                                                            class="ti ti-pencil me-2"></i> Edit</a></li>
                                                <li>
                                                    {!! Form::open([
                                                        'method' => 'DELETE',
                                                        'route' => ['dataolahragas.destroy', Crypt::encryptString($dataolahraga->id)],
                                                    ]) !!}
                                                    <button type="submit" class="dropdown-item text-danger"
                                                        onclick="return confirm('Hapus hobi ini?')"><i
                                                            class="ti ti-trash me-2"></i> Hapus</button>
                                                    {!! Form::close() !!}
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @empty
                            <div class="col-12 text-center py-5">
                                <div class="bg-light-subtle rounded-circle d-inline-flex p-3 mb-3 text-muted">
                                    <i class="ti ti-ball-football-off fs-1"></i>
                                </div>
                                <p class="text-muted">Belum ada data hobi ditambahkan.</p>
                            </div>
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Riwayat Kesehatan Section -->
    <div class="row g-4 mb-4">
        <div class="col-12">
            <div class="card border-0 shadow-sm rounded-4 overflow-hidden bg-white">
                <div
                    class="card-header bg-white p-4 border-bottom-0 d-flex justify-content-between align-items-center">
                    <div class="d-flex align-items-center">
                        <span class="bg-danger bg-opacity-10 text-danger rounded-circle p-2 me-3">
                            <i class="ti ti-activity-heartbeat fs-5"></i>
                        </span>
                        <div>
                            <h5 class="fw-bold mb-0">Riwayat Kesehatan</h5>
                            <p class="text-muted small mb-0">Catatan kondisi medis</p>
                        </div>
                    </div>
                    <a href="{{ route('datakesehatans.create') }}"
                        class="btn btn-sm btn-light text-danger fw-bold rounded-pill px-3 hover-danger">
                        <i class="ti ti-plus me-1"></i> Tambah
                    </a>
                </div>
                <div class="card-body p-4 pt-0">
                    <div class="row g-3">
                        @forelse ($datakesehatans as $datakesehatan)
                            <div class="col-md-6">
                                <div
                                    class="d-flex align-items-center p-3 rounded-3 border border-light-subtle bg-white h-100 shadow-sm hover-lift transition-all">
                                    <div class="flex-shrink-0 me-3">
                                        @if ($datakesehatan->keterangan == 'Berat' || $datakesehatan->keterangan == 'Bahaya')
                                            <span class="bg-danger text-white rounded-circle p-2 d-flex"><i
                                                    class="ti ti-alert-triangle"></i></span>
                                        @elseif($datakesehatan->keterangan == 'Sedang')
                                            <span class="bg-warning text-white rounded-circle p-2 d-flex"><i
                                                    class="ti ti-alert-circle"></i></span>
                                        @else
                                            <span class="bg-success text-white rounded-circle p-2 d-flex"><i
                                                    class="ti ti-check"></i></span>
                                        @endif
                                    </div>
                                    <div class="flex-grow-1">
                                        <h6 class="fw-bold mb-0">{{ $datakesehatan->kesehatan }}</h6>
                                        <small class="text-muted">Tingkat: {{ $datakesehatan->keterangan }}</small>
                                    </div>
                                    <div class="flex-shrink-0 ms-2">
                                        <div class="dropdown">
                                            <button class="btn btn-sm btn-link text-muted" type="button"
                                                data-bs-toggle="dropdown"><i class="ti ti-dots"></i></button>
                                            <ul class="dropdown-menu dropdown-menu-end border-0 shadow-sm">
                                                <li><a class="dropdown-item"
                                                        href="{{ route('datakesehatans.edit', [Crypt::encryptString($datakesehatan->id)]) }}">Edit</a>
                                                </li>
                                                <li>
                                                    {!! Form::open([
                                                        'method' => 'DELETE',
                                                        'route' => ['datakesehatans.destroy', Crypt::encryptString($datakesehatan->id)],
                                                    ]) !!}
                                                    <button type="submit" class="dropdown-item text-danger"
                                                        onclick="return confirm('Hapus?')">Hapus</button>
                                                    {!! Form::close() !!}
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @empty
                            <div class="col-12 text-center py-5">
                                <div
                                    class="d-inline-flex bg-success bg-opacity-10 text-success rounded-circle p-3 mb-3">
                                    <i class="ti ti-heart-check fs-1"></i>
                                </div>
                                <p class="text-muted fw-medium">Tidak ada riwayat penyakit. Anda sehat!</p>
                            </div>
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Data Peminatan Section -->
    <div class="card border-0 shadow-sm rounded-4 overflow-hidden bg-white">
        <div class="card-header bg-white p-4 border-bottom-0 d-flex justify-content-between align-items-center">
            <div class="d-flex align-items-center">
                <span class="bg-warning bg-opacity-10 text-warning rounded-circle p-2 me-3">
                    <i class="ti ti-briefcase fs-5"></i>
                </span>
                <div>
                    <h5 class="fw-bold mb-0">Bidang Peminatan</h5>
                    <p class="text-muted small mb-0">Posisi atau bidang yang diminati</p>
                </div>
            </div>
            <a href="{{ route('datapeminatans.create') }}"
                class="btn btn-sm btn-light text-warning fw-bold rounded-pill px-3 hover-warning">
                <i class="ti ti-plus me-1"></i> Tambah
            </a>
        </div>
        <div class="card-body p-4 pt-0">
            @if ($datapeminatans->count() > 0)
                <div class="d-flex flex-wrap gap-2">
                    @foreach ($datapeminatans as $datapeminatan)
                        <div
                            class="badge bg-warning bg-opacity-10 text-dark border border-warning border-opacity-25 rounded-pill px-3 py-2 d-flex align-items-center gap-2">
                            <span>{{ $datapeminatan->field->field_name }}</span>
                            {!! Form::open([
                                'method' => 'DELETE',
                                'route' => ['datapeminatans.destroy', Crypt::encryptString($datapeminatan->id)],
                                'class' => 'd-flex align-items-center',
                            ]) !!}
                            <button type="submit" class="btn btn-link p-0 text-muted hover-danger"
                                onclick="return confirm('Hapus peminatan ini?')" style="line-height: 1;"><i
                                    class="ti ti-x"></i></button>
                            {!! Form::close() !!}
                        </div>
                    @endforeach
                </div>
            @else
                <div class="text-center py-4 text-muted">
                    <i class="ti ti-briefcase-off fs-3 d-block mb-2 text-opacity-50 text-dark"></i>
                    Belum ada bidang peminatan.
                </div>
            @endif
        </div>
    </div>

</div>
