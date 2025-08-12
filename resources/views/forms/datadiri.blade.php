<div class="tab-pane fade show active" id="pills-account" role="tabpanel" aria-labelledby="pills-account-tab" tabindex="0">
    <!-- Personal Data Card -->
    <div class="card border-0 shadow-sm overflow-hidden mb-4">
        <div class="card-header bg-transparent py-3 border-bottom">
            <div class="d-flex justify-content-between align-items-center">
                <div>
                    <h5 class="mb-0 fw-semibold text-primary">Data Diri</h5>
                    <p class="text-muted mb-0 small">(*) Wajib diisi</p>
                </div>
                <div class="bg-primary bg-opacity-10 p-2 rounded">
                    <i class="ti ti-user-circle text-primary"></i>
                </div>
            </div>
        </div>

        <div class="card-body p-4">
            @if ($errors->any())
                <div class="alert alert-danger border-0 bg-danger-soft mb-4">
                    <div class="d-flex align-items-center">
                        <i class="ti ti-alert-circle me-2"></i>
                        <div>
                            @foreach ($errors->all() as $error)
                                <div>{{ $error }}</div>
                            @endforeach
                        </div>
                    </div>
                </div>
            @endif

            {{ Form::model($datadiri, ['url' => ['datadiris/store', Auth::user()->id], 'method' => 'POST', 'class' => 'needs-validation', 'novalidate']) }}

            <div class="row g-4">
                <!-- Name Field -->
                <div class="col-12">
                    <div class="form-floating">
                        {{ Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Nama Lengkap', 'required']) }}
                        {{ Form::label('name', 'Nama Lengkap (*)', ['class' => 'form-label']) }}
                        <div class="invalid-feedback">Harap isi nama lengkap</div>
                    </div>
                </div>

                <!-- KTP and Religion -->
                <div class="col-md-6">
                    <div class="form-floating">
                        {{ Form::text('ktp', null, ['class' => 'form-control', 'placeholder' => 'Nomor KTP', 'required']) }}
                        {{ Form::label('ktp', 'KTP (*)', ['class' => 'form-label']) }}
                        <div class="invalid-feedback">Harap isi nomor KTP</div>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-floating">
                        <select class="form-select" name="agama" id="agama" required>
                            <option value="" disabled selected>Pilih Agama</option>
                            @foreach (\App\Constants\DatadiriConst::Agama as $d)
                                <option value="{{ $d }}"
                                    {{ $datadiri && $datadiri->agama == $d ? 'selected' : '' }}>
                                    {{ $d }}
                                </option>
                            @endforeach
                        </select>
                        {{ Form::label('agama', 'Agama (*)', ['class' => 'form-label']) }}
                        <div class="invalid-feedback">Harap pilih agama</div>
                    </div>
                </div>

                <!-- Personal Details -->
                <div class="col-md-4">
                    <div class="form-floating">
                        <select class="form-select" name="gender" required>
                            <option value="" disabled selected>Pilih Gender</option>
                            <option value="1" {{ $datadiri && $datadiri->gender == 1 ? 'selected' : '' }}>
                                Laki-laki</option>
                            <option value="0" {{ $datadiri && $datadiri->gender == 0 ? 'selected' : '' }}>
                                Perempuan</option>
                        </select>
                        {{ Form::label('gender', 'Gender (*)', ['class' => 'form-label']) }}
                        <div class="invalid-feedback">Harap pilih gender</div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="form-floating">
                        {{ Form::text('tempat_lahir', null, ['class' => 'form-control', 'placeholder' => 'Tempat Lahir', 'required']) }}
                        {{ Form::label('tempat_lahir', 'Tempat Lahir (*)', ['class' => 'form-label']) }}
                        <div class="invalid-feedback">Harap isi tempat lahir</div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="form-floating">
                        {{ Form::date('tanggal_lahir', null, ['class' => 'form-control', 'required']) }}
                        {{ Form::label('tanggal_lahir', 'Tanggal Lahir (*)', ['class' => 'form-label']) }}
                        <div class="invalid-feedback">Harap isi tanggal lahir</div>
                    </div>
                </div>

                <!-- Contact Information -->
                <div class="col-md-6">
                    <div class="form-floating">
                        {{ Form::text('no_hp', null, ['class' => 'form-control', 'placeholder' => 'Nomor HP', 'required']) }}
                        {{ Form::label('no_hp', 'No. HP (*)', ['class' => 'form-label']) }}
                        <div class="invalid-feedback">Harap isi nomor HP</div>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-floating">
                        {{ Form::text('no_wa', null, ['class' => 'form-control', 'placeholder' => 'Nomor WA']) }}
                        {{ Form::label('no_wa', 'No. WA (*)', ['class' => 'form-label']) }}
                    </div>
                </div>

                <!-- Address Section -->
                <div class="col-md-4">
                    <div class="form-floating h-100">
                        {{ Form::textarea('alamat', null, ['class' => 'form-control h-100', 'placeholder' => 'Alamat', 'style' => 'height: 100%', 'required']) }}
                        {{ Form::label('alamat', 'Alamat (*)', ['class' => 'form-label']) }}
                        <div class="invalid-feedback">Harap isi alamat</div>
                    </div>
                </div>

                <div class="col-md-8">
                    <div class="row g-3">
                        <div class="col-md-6">
                            <div class="form-floating">
                                <select id="provinces" class="form-select">
                                    <option idProv="" value="{{ $datadiri->provinces ?? '-' }}">
                                        {{ $datadiri->provinces ?? 'Pilih Provinsi' }}
                                    </option>
                                </select>
                                {{ Form::label('provinces', 'Provinsi', ['class' => 'form-label']) }}
                                <input type="hidden" name="provinces" id="dataProvince"
                                    value="{{ $datadiri->provinces ?? '-' }}">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-floating">
                                <select name="cities" id="cities" class="form-select">
                                    <option value="{{ $datadiri->cities ?? '-' }}">
                                        {{ $datadiri->cities ?? 'Pilih Kota' }}</option>
                                </select>
                                {{ Form::label('cities', 'Kota', ['class' => 'form-label']) }}
                            </div>
                        </div>

                        <div class="col-12">
                            <div class="form-floating">
                                <select class="form-select" name="status_rumah">
                                    <option value="" disabled selected>Pilih Status Tempat Tinggal</option>
                                    @foreach (\App\Constants\DatadiriConst::StatusRumah as $d)
                                        <option value="{{ $d }}"
                                            {{ $datadiri && $datadiri->status_rumah == $d ? 'selected' : '' }}>
                                            {{ $d }}
                                        </option>
                                    @endforeach
                                </select>
                                {{ Form::label('status_rumah', 'Status Tempat Tinggal', ['class' => 'form-label']) }}
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Physical Information -->
                <div class="col-md-4">
                    <div class="form-floating">
                        <select class="form-select" name="golongan_darah">
                            <option value="" disabled selected>Pilih Golongan Darah</option>
                            @foreach (\App\Constants\DatadiriConst::GolonganDarah as $d)
                                <option value="{{ $d }}"
                                    {{ $datadiri && $datadiri->golongan_darah == $d ? 'selected' : '' }}>
                                    {{ $d }}
                                </option>
                            @endforeach
                        </select>
                        {{ Form::label('golongan_darah', 'Golongan Darah', ['class' => 'form-label']) }}
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="form-floating">
                        {{ Form::number('tinggi_badan', null, ['class' => 'form-control', 'placeholder' => 'Tinggi Badan (cm)']) }}
                        {{ Form::label('tinggi_badan', 'Tinggi Badan (cm)', ['class' => 'form-label']) }}
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="form-floating">
                        {{ Form::number('berat_badan', null, ['class' => 'form-control', 'placeholder' => 'Berat Badan (kg)']) }}
                        {{ Form::label('berat_badan', 'Berat Badan (kg)', ['class' => 'form-label']) }}
                    </div>
                </div>

                <!-- Vehicle and License -->
                <div class="col-md-6">
                    <div class="card border-1 border-primary bg-light-subtle p-3 h-100">
                        <h6 class="mb-3 fw-semibold">Kendaraan</h6>
                        @foreach (\App\Constants\DatadiriConst::Kendaraan as $d)
                            <div class="form-check form-check-inline mb-2">
                                <input name="kendaraan[]" value="{{ $d }}" type="checkbox"
                                    class="form-check-input" id="kendaraan{{ $d }}"
                                    {{ $datadiri && in_array($d, json_decode($datadiri->kendaraan)) ? 'checked' : '' }}>
                                <label class="form-check-label"
                                    for="kendaraan{{ $d }}">{{ $d }}</label>
                            </div>
                        @endforeach
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="card border-1 border-primary bg-light-subtle p-3 h-100">
                        <h6 class="mb-3 fw-semibold">SIM (Surat Izin Mengemudi)</h6>
                        @foreach (\App\Constants\DatadiriConst::SIM as $d)
                            <div class="form-check form-check-inline mb-2">
                                <input name="sim[]" value="{{ $d }}" type="checkbox"
                                    class="form-check-input" id="sim{{ $d }}"
                                    {{ $datadiri && in_array($d, json_decode($datadiri->sim)) ? 'checked' : '' }}>
                                <label class="form-check-label"
                                    for="sim{{ $d }}">{{ $d }}</label>
                            </div>
                        @endforeach
                    </div>
                </div>

                <!-- Submit Button -->
                <div class="col-12 text-end mt-4">
                    <button type="submit" class="next-btn-cyber px-4 py-2 text-dark">
                        Simpan Data Diri <i class="ti ti-device-floppy me-2"></i>
                    </button>
                </div>
            </div>
            {{ Form::close() }}
        </div>
    </div>

    <!-- Hobbies Section -->
    <div class="card glass-card border-0 rounded-4 overflow-hidden mt-4">
        <div class="card-header bg-gradient-primary py-3">
            <div class="d-flex justify-content-between align-items-center">
                <div>
                    <h5 class="mb-0 fw-semibold text-white"><i class="fas fa-running me-2"></i> Hobi</h5>
                </div>
                <a href="{{ route('dataolahragas.create') }}" class="btn btn-sm btn-light rounded-pill hover-lift">
                    <i class="fas fa-plus me-1"></i> Tambah Hobi
                </a>
            </div>
        </div>
        <div class="card-body p-0 bg-dark-2">
            <div class="table-responsive">
                <table class="table table-dark table-hover mb-0 table-borderless">
                    <thead class="bg-dark-3">
                        <tr>
                            <th class="ps-4 text-uppercase fw-light text-white">No</th>
                            <th class="text-uppercase fw-light text-white">Hobi</th>
                            <th class="text-uppercase fw-light text-white">Level</th>
                            <th class="text-end pe-4 text-uppercase fw-light text-white">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($dataolahragas as $i => $dataolahraga)
                            <tr class="hover-glow">
                                <td class="ps-4 text-primary fw-bold">{{ $i + 1 }}</td>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <div class="icon-circle bg-primary-soft me-3">
                                            <i class="fas fa-running text-primary"></i>
                                        </div>
                                        <span>{{ $dataolahraga->olahraga }}</span>
                                    </div>
                                </td>
                                <td>
                                    <div class="progress bg-dark-4" style="height: 6px;">
                                        <div class="progress-bar bg-{{ $dataolahraga->level == 'Pemula' ? 'info' : ($dataolahraga->level == 'Menengah' ? 'warning' : 'success') }}"
                                            role="progressbar"
                                            style="width: {{ $dataolahraga->level == 'Pemula' ? '30%' : ($dataolahraga->level == 'Menengah' ? '60%' : '90%') }}"
                                            aria-valuenow="{{ $dataolahraga->level == 'Pemula' ? '30' : ($dataolahraga->level == 'Menengah' ? '60' : '90') }}"
                                            aria-valuemin="0" aria-valuemax="100">
                                        </div>
                                    </div>
                                    <small class="text-white">{{ $dataolahraga->level }}</small>
                                </td>
                                <td class="text-end pe-4">
                                    <div class="d-flex justify-content-end gap-2">
                                        <a href="{{ route('dataolahragas.edit', [Crypt::encryptString($dataolahraga->id)]) }}"
                                            class="btn btn-sm btn-icon btn-outline-primary rounded-circle hover-lift">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        {!! Form::open([
                                            'method' => 'DELETE',
                                            'route' => ['dataolahragas.destroy', Crypt::encryptString($dataolahraga->id)],
                                        ]) !!}
                                        <button type="submit"
                                            class="btn btn-sm btn-icon btn-outline-danger rounded-circle hover-lift">
                                            <i class="fas fa-trash"></i>
                                        </button>
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

    <!-- Health History Section -->
    <div class="card glass-card border-0 rounded-4 overflow-hidden mt-4">
        <div class="card-header bg-gradient-info py-3">
            <div class="d-flex justify-content-between align-items-center">
                <div>
                    <h5 class="mb-0 fw-semibold text-white"><i class="fas fa-heartbeat me-2"></i> Riwayat Kesehatan
                    </h5>
                </div>
                <a href="{{ route('datakesehatans.create') }}" class="btn btn-sm btn-light rounded-pill hover-lift">
                    <i class="fas fa-plus me-1"></i> Tambah Riwayat
                </a>
            </div>
        </div>
        <div class="card-body p-0 bg-dark-2">
            <div class="table-responsive">
                <table class="table table-dark table-hover mb-0 table-borderless">
                    <thead class="bg-dark-3">
                        <tr>
                            <th class="ps-4 text-uppercase fw-light text-white">No</th>
                            <th class="text-uppercase fw-light text-white">Riwayat Kesehatan</th>
                            <th class="text-uppercase fw-light text-white">Keterangan</th>
                            <th class="text-end pe-4 text-uppercase fw-light text-white">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($datakesehatans as $i => $datakesehatan)
                            <tr class="hover-glow">
                                <td class="ps-4 text-info fw-bold">{{ $i + 1 }}</td>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <div class="icon-circle bg-info-soft me-3">
                                            <i class="fas fa-heartbeat text-info"></i>
                                        </div>
                                        <span>{{ $datakesehatan->kesehatan }}</span>
                                    </div>
                                </td>
                                <td>
                                    <span
                                        class="badge bg-{{ $datakesehatan->keterangan == 'Ringan' ? 'success' : ($datakesehatan->keterangan == 'Sedang' ? 'warning' : 'danger') }}">
                                        {{ $datakesehatan->keterangan }}
                                    </span>
                                </td>
                                <td class="text-end pe-4">
                                    <div class="d-flex justify-content-end gap-2">
                                        <a href="{{ route('datakesehatans.edit', [Crypt::encryptString($datakesehatan->id)]) }}"
                                            class="btn btn-sm btn-icon btn-outline-primary rounded-circle hover-lift">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        {!! Form::open([
                                            'method' => 'DELETE',
                                            'route' => ['datakesehatans.destroy', Crypt::encryptString($datakesehatan->id)],
                                        ]) !!}
                                        <button type="submit"
                                            class="btn btn-sm btn-icon btn-outline-danger rounded-circle hover-lift">
                                            <i class="fas fa-trash"></i>
                                        </button>
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

    <!-- Interest Section -->
    <div class="card glass-card border-0 rounded-4 overflow-hidden mt-4">
        <div class="card-header bg-gradient-purple py-3">
            <div class="d-flex justify-content-between align-items-center">
                <div>
                    <h5 class="mb-0 fw-semibold text-white"><i class="fas fa-star me-2"></i> Data Peminatan</h5>
                    <p class="text-white-50 mb-0 small">Maksimal data adalah 3</p>
                </div>
                <a href="{{ route('datapeminatans.create') }}" class="btn btn-sm btn-light rounded-pill hover-lift">
                    <i class="fas fa-plus me-1"></i> Tambah Peminatan
                </a>
            </div>
        </div>
        <div class="card-body p-0 bg-dark-2">
            <div class="table-responsive">
                <table class="table table-dark table-hover mb-0 table-borderless">
                    <thead class="bg-dark-3">
                        <tr>
                            <th class="ps-4 text-uppercase fw-light text-white">No</th>
                            <th class="text-uppercase fw-light text-white">Field</th>
                            <th class="text-end pe-4 text-uppercase fw-light text-white">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($datapeminatans as $i => $datapeminatan)
                            <tr class="hover-glow">
                                <td class="ps-4 text-purple fw-bold">{{ $i + 1 }}</td>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <div class="icon-circle bg-purple-soft me-3">
                                            <i class="fas fa-star text-purple"></i>
                                        </div>
                                        <span>{{ $datapeminatan->field->field_name }}</span>
                                    </div>
                                </td>
                                <td class="text-end pe-4">
                                    <div class="d-flex justify-content-end gap-2">
                                        {!! Form::open([
                                            'method' => 'DELETE',
                                            'route' => ['datapeminatans.destroy', Crypt::encryptString($datapeminatan->id)],
                                        ]) !!}
                                        <button type="submit"
                                            class="btn btn-sm btn-icon btn-outline-danger rounded-circle hover-lift">
                                            <i class="fas fa-trash"></i>
                                        </button>
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

    <!-- Add this CSS to your stylesheet -->
    <style>
        :root {
            --bg-dark: #0f172a;
            --bg-dark-2: #1e293b;
            --bg-dark-3: #334155;
            --bg-dark-4: #475569;

            --primary: #3b82f6;
            --primary-soft: rgba(59, 130, 246, 0.1);

            --info: #06b6d4;
            --info-soft: rgba(6, 182, 212, 0.1);

            --purple: #8b5cf6;
            --purple-soft: rgba(139, 92, 246, 0.1);
        }

        .glass-card {
            background: rgba(15, 23, 42, 0.7);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.1);
        }

        .bg-dark-2 {
            background-color: var(--bg-dark-2);
        }

        .bg-dark-3 {
            background-color: var(--bg-dark-3);
        }

        .bg-dark-4 {
            background-color: var(--bg-dark-4);
        }

        .bg-gradient-primary {
            background: linear-gradient(135deg, #3b82f6 0%, #1d4ed8 100%);
        }

        .bg-gradient-info {
            background: linear-gradient(135deg, #06b6d4 0%, #0e7490 100%);
        }

        .bg-gradient-purple {
            background: linear-gradient(135deg, #8b5cf6 0%, #6d28d9 100%);
        }

        .hover-lift {
            transition: all 0.2s ease;
        }

        .hover-lift:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
        }

        .hover-glow:hover {
            box-shadow: 0 0 15px rgba(59, 130, 246, 0.3);
        }

        .icon-circle {
            width: 36px;
            height: 36px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .table-borderless td,
        .table-borderless th {
            border: none;
        }

        .rounded-4 {
            border-radius: 1rem !important;
        }

        .text-purple {
            color: var(--purple);
        }

        .bg-purple-soft {
            background-color: var(--purple-soft);
        }
    </style>
</div>

<script>
    var dataProvince = [];
    $(document).ready(function() {
        // Fetch provinces
        $.getJSON('https://www.emsifa.com/api-wilayah-indonesia/api/provinces.json', function(data) {
            dataProvince = data;
            var provincesDropdown = $('#provinces');
            provincesDropdown.empty();
            provincesDropdown.append($('<option>', {
                value: '',
                text: 'Pilih Provinsi'
            }));

            $.each(data, function(index, province) {
                provincesDropdown.append($('<option>', {
                    value: index,
                    text: province.name
                }));
            });

            // Set selected value if exists
            if ("{{ $datadiri->provinces ?? '' }}" !== "") {
                provincesDropdown.val(data.findIndex(p => p.name ===
                    "{{ $datadiri->provinces ?? '' }}"));
            }
        });

        // Handle province selection
        $('#provinces').change(function() {
            var index = $(this).val();
            var provinceId = dataProvince[index].id;
            $('#dataProvince').val(dataProvince[index].name);

            if (provinceId) {
                // Fetch cities based on selected province
                $.getJSON(
                    `https://www.emsifa.com/api-wilayah-indonesia/api/regencies/${provinceId}.json`,
                    function(data) {
                        var citiesDropdown = $('#cities');
                        citiesDropdown.empty();
                        citiesDropdown.append($('<option>', {
                            value: '',
                            text: 'Pilih Kota'
                        }));

                        $.each(data, function(index, city) {
                            citiesDropdown.append($('<option>', {
                                value: city.name,
                                text: city.name
                            }));
                        });

                        // Set selected value if exists
                        if ("{{ $datadiri->cities ?? '' }}" !== "") {
                            citiesDropdown.val("{{ $datadiri->cities ?? '' }}");
                        }
                    });
            } else {
                $('#cities').empty().append($('<option>', {
                    value: '',
                    text: 'Pilih Kota'
                }));
            }
        });

        // Form validation
        (function() {
            'use strict'
            var forms = document.querySelectorAll('.needs-validation')
            Array.prototype.slice.call(forms)
                .forEach(function(form) {
                    form.addEventListener('submit', function(event) {
                        if (!form.checkValidity()) {
                            event.preventDefault()
                            event.stopPropagation()
                        }
                        form.classList.add('was-validated')
                    }, false)
                })
        })()
    });
</script>
