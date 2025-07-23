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
                    <i class="ti ti-user-circle fs-5 text-primary"></i>
                </div>
            </div>
        </div>

        <div class="card-body p-4">
            @if ($errors->any())
                <div class="alert alert-danger border-0 bg-danger-soft mb-4">
                    <div class="d-flex align-items-center">
                        <i class="ti ti-alert-circle fs-5 me-2"></i>
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
                                <option value="{{ $d }}" {{ $datadiri && $datadiri->agama == $d ? 'selected' : '' }}>
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
                            <option value="1" {{ $datadiri && $datadiri->gender == 1 ? 'selected' : '' }}>Laki-laki</option>
                            <option value="0" {{ $datadiri && $datadiri->gender == 0 ? 'selected' : '' }}>Perempuan</option>
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
                                <input type="hidden" name="provinces" id="dataProvince" value="{{ $datadiri->provinces ?? '-' }}">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-floating">
                                <select name="cities" id="cities" class="form-select">
                                    <option value="{{ $datadiri->cities ?? '-' }}">{{ $datadiri->cities ?? 'Pilih Kota' }}</option>
                                </select>
                                {{ Form::label('cities', 'Kota', ['class' => 'form-label']) }}
                            </div>
                        </div>

                        <div class="col-12">
                            <div class="form-floating">
                                <select class="form-select" name="status_rumah">
                                    <option value="" disabled selected>Pilih Status Tempat Tinggal</option>
                                    @foreach (\App\Constants\DatadiriConst::StatusRumah as $d)
                                        <option value="{{ $d }}" {{ $datadiri && $datadiri->status_rumah == $d ? 'selected' : '' }}>
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
                                <option value="{{ $d }}" {{ $datadiri && $datadiri->golongan_darah == $d ? 'selected' : '' }}>
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
                    <div class="card border-0 bg-light-subtle p-3 h-100">
                        <h6 class="mb-3 fw-semibold">Kendaraan</h6>
                        @foreach (\App\Constants\DatadiriConst::Kendaraan as $d)
                            <div class="form-check form-check-inline mb-2">
                                <input name="kendaraan[]" value="{{ $d }}" type="checkbox"
                                    class="form-check-input" id="kendaraan{{ $d }}"
                                    {{ $datadiri && in_array($d, json_decode($datadiri->kendaraan)) ? 'checked' : '' }}>
                                <label class="form-check-label" for="kendaraan{{ $d }}">{{ $d }}</label>
                            </div>
                        @endforeach
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="card border-0 bg-light-subtle p-3 h-100">
                        <h6 class="mb-3 fw-semibold">SIM (Surat Izin Mengemudi)</h6>
                        @foreach (\App\Constants\DatadiriConst::SIM as $d)
                            <div class="form-check form-check-inline mb-2">
                                <input name="sim[]" value="{{ $d }}" type="checkbox"
                                    class="form-check-input" id="sim{{ $d }}"
                                    {{ $datadiri && in_array($d, json_decode($datadiri->sim)) ? 'checked' : '' }}>
                                <label class="form-check-label" for="sim{{ $d }}">{{ $d }}</label>
                            </div>
                        @endforeach
                    </div>
                </div>

                <!-- Submit Button -->
                <div class="col-12 text-end mt-4">
                    <button type="submit" class="btn btn-primary px-4 py-2 rounded-pill">
                        <i class="ti ti-device-floppy me-2"></i> Simpan Data Diri
                    </button>
                </div>
            </div>
            {{ Form::close() }}
        </div>
    </div>

    <!-- Hobbies Section -->
    <div class="card border-0 shadow-sm mt-4">
        <div class="card-header bg-transparent py-3 border-bottom">
            <div class="d-flex justify-content-between align-items-center">
                <div>
                    <h5 class="mb-0 fw-semibold">Hobi</h5>
                </div>
                <a href="{{ route('dataolahragas.create') }}" class="btn btn-sm btn-primary rounded-pill">
                    <i class="ti ti-plus me-1"></i> Tambah Hobi
                </a>
            </div>
        </div>
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-hover mb-0">
                    <thead class="table-light">
                        <tr>
                            <th class="ps-4">No</th>
                            <th>Hobi</th>
                            <th>Level</th>
                            <th class="text-end pe-4">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($dataolahragas as $i => $dataolahraga)
                            <tr>
                                <td class="ps-4">{{ $i + 1 }}</td>
                                <td>{{ $dataolahraga->olahraga }}</td>
                                <td>{{ $dataolahraga->level }}</td>
                                <td class="text-end pe-4">
                                    <div class="d-flex justify-content-end gap-2">
                                        <a href="{{ route('dataolahragas.edit', [$dataolahraga->id]) }}"
                                           class="btn btn-sm btn-outline-primary rounded-circle p-1">
                                            <i class="ti ti-edit fs-4"></i>
                                        </a>
                                        {!! Form::open(['method' => 'DELETE', 'route' => ['dataolahragas.destroy', $dataolahraga->id]]) !!}
                                        <button type="submit" class="btn btn-sm btn-outline-danger rounded-circle p-1">
                                            <i class="ti ti-trash fs-4"></i>
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
    <div class="card border-0 shadow-sm mt-4">
        <div class="card-header bg-transparent py-3 border-bottom">
            <div class="d-flex justify-content-between align-items-center">
                <div>
                    <h5 class="mb-0 fw-semibold">Riwayat Kesehatan</h5>
                </div>
                <a href="{{ route('datakesehatans.create') }}" class="btn btn-sm btn-primary rounded-pill">
                    <i class="ti ti-plus me-1"></i> Tambah Riwayat
                </a>
            </div>
        </div>
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-hover mb-0">
                    <thead class="table-light">
                        <tr>
                            <th class="ps-4">No</th>
                            <th>Riwayat Kesehatan</th>
                            <th>Keterangan</th>
                            <th class="text-end pe-4">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($datakesehatans as $i => $datakesehatan)
                            <tr>
                                <td class="ps-4">{{ $i + 1 }}</td>
                                <td>{{ $datakesehatan->kesehatan }}</td>
                                <td>{{ $datakesehatan->keterangan }}</td>
                                <td class="text-end pe-4">
                                    <div class="d-flex justify-content-end gap-2">
                                        <a href="{{ route('datakesehatans.show', [$datakesehatan->id]) }}"
                                           class="btn btn-sm btn-outline-info rounded-circle p-1">
                                            <i class="ti ti-eye fs-4"></i>
                                        </a>
                                        <a href="{{ route('datakesehatans.edit', [$datakesehatan->id]) }}"
                                           class="btn btn-sm btn-outline-primary rounded-circle p-1">
                                            <i class="ti ti-edit fs-4"></i>
                                        </a>
                                        {!! Form::open(['method' => 'DELETE', 'route' => ['datakesehatans.destroy', $datakesehatan->id]]) !!}
                                        <button type="submit" class="btn btn-sm btn-outline-danger rounded-circle p-1">
                                            <i class="ti ti-trash fs-4"></i>
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
    <div class="card border-0 shadow-sm mt-4">
        <div class="card-header bg-transparent py-3 border-bottom">
            <div class="d-flex justify-content-between align-items-center">
                <div>
                    <h5 class="mb-0 fw-semibold">Data Peminatan</h5>
                    <p class="text-muted mb-0 small">Maksimal data adalah 3</p>
                </div>
                <a href="{{ route('datapeminatans.create') }}" class="btn btn-sm btn-primary rounded-pill">
                    <i class="ti ti-plus me-1"></i> Tambah Peminatan
                </a>
            </div>
        </div>
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-hover mb-0">
                    <thead class="table-light">
                        <tr>
                            <th class="ps-4">No</th>
                            <th>Field</th>
                            <th class="text-end pe-4">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($datapeminatans as $i => $datapeminatan)
                            <tr>
                                <td class="ps-4">{{ $i+1 }}</td>
                                <td>{{ $datapeminatan->field->field_name }}</td>
                                <td class="text-end pe-4">
                                    <div class="d-flex justify-content-end gap-2">
                                        <a href="{{ route('datapeminatans.edit', [$datapeminatan->id]) }}"
                                           class="btn btn-sm btn-outline-primary rounded-circle p-1">
                                            <i class="ti ti-edit fs-4"></i>
                                        </a>
                                        {!! Form::open(['method' => 'DELETE','route' => ['datapeminatans.destroy', $datapeminatan->id]]) !!}
                                        <button type="submit" class="btn btn-sm btn-outline-danger rounded-circle p-1">
                                            <i class="ti ti-trash fs-4"></i>
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
</div>

<!-- Custom CSS for this design -->
<style>
    .form-floating > .form-control:not(:placeholder-shown) ~ label,
    .form-floating > .form-control:focus ~ label,
    .form-floating > .form-select ~ label {
        transform: scale(0.85) translateY(-0.8rem) translateX(0.15rem);
        opacity: 0.8;
    }

    .card-hover:hover {
        transform: translateY(-2px);
        transition: all 0.3s ease;
        box-shadow: 0 6px 12px rgba(0,0,0,0.1);
    }

    .btn-rounded {
        border-radius: 50px;
    }

    .table-hover tbody tr:hover {
        background-color: rgba(var(--bs-primary-rgb), 0.05);
    }

    .bg-danger-soft {
        background-color: rgba(var(--bs-danger-rgb), 0.1);
    }
</style>

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
            if("{{ $datadiri->provinces ?? '' }}" !== "") {
                provincesDropdown.val(data.findIndex(p => p.name === "{{ $datadiri->provinces ?? '' }}"));
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
                        if("{{ $datadiri->cities ?? '' }}" !== "") {
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
