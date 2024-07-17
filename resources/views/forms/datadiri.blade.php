<div class="tab-pane fade show active" id="pills-account" role="tabpanel" aria-labelledby="pills-account-tab" tabindex="0">
    <div class="row mb-2 text-end">
        <div class="col-6"></div>
        <div class="col-3 d-flex align-items-stretch">
            <a href="{{ route('dataolahragas.create') }}" class="btn btn-success text-white w-100 card-hover">
                <h6 class="text-white mb-2">+ Hobi</h6>
            </a>
        </div>

        <div class="col-3 d-flex align-items-stretch">
            <a href="{{ route('datakesehatans.create') }}" class="btn btn-danger text-white w-100 card-hover">
                <h6 class="text-white mb-2">+ Riwayat Kesehatan</h6>
            </a>
        </div>
    </div>

    <div class="card w-100 position-relative overflow-hidden mb-0">
        <div class="card-body p-4">
            @if ($errors->any())
                <div class="alert alert-danger">
                    @foreach ($errors->all() as $error)
                        {{ $error }} <br>
                    @endforeach
                </div>
            @endif

            {{ Form::model($datadiri, ['url' => ['datadiris/store', Auth::user()->id], 'method' => 'POST']) }}
            <div class="row">
                <div class="col-sm-12 col-md-8">
                    <h5 class="card-title fw-semibold">Data Diri</h5>
                    <p class="card-subtitle mb-4">(*) Required</p>
                </div>
            </div>
            <div class="row">
                <div class="mb-3 col-12">
                    {{ Form::label('name', 'Nama Lengkap (*)', ['class' => 'form-label']) }}
                    {{ Form::text('name', null, ['class' => 'form-control']) }}
                </div>

                <div class="mb-3 col-sm-12 col-md-6">
                    {{ Form::label('ktp', 'KTP (*)', ['class' => 'form-label']) }}
                    {{ Form::text('ktp', null, ['class' => 'form-control']) }}
                </div>

                <div class="mb-3 col-sm-12 col-md-6">
                    {{ Form::label('agama', 'Agama  (*)', ['class' => 'form-label']) }}
                    <select class="form-select" name="agama">
                        @foreach (\App\Constants\DatadiriConst::Agama as $d)
                            <option value="{{ $d }}"
                                {{ $datadiri && $datadiri->agama == $d ? 'selected' : '' }}>
                                {{ $d }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-3 col-sm-12 col-md-4">
                    {{ Form::label('gender', 'Gender  (*)', ['class' => 'form-label']) }}
                    <select class="form-select" name="gender">
                        <option value="1">Laki - laki</option>
                        <option value="0">Perempuan</option>
                    </select>
                </div>
                <div class="mb-3 col-sm-12 col-md-4">
                    {{ Form::label('tempat_lahir', 'Tempat Lahir  (*)', ['class' => 'form-label']) }}
                    {{ Form::text('tempat_lahir', null, ['class' => 'form-control']) }}
                </div>
                <div class="mb-3 col-sm-12 col-md-4">
                    {{ Form::label('tanggal_lahir', 'Tanggal Lahir  (*)', ['class' => 'form-label']) }}
                    {{ Form::date('tanggal_lahir', null, ['class' => 'form-control']) }}
                </div>

                <div class="mb-3 col-sm-12 col-md-6">
                    {{ Form::label('no_hp', 'No. HP (*)', ['class' => 'form-label']) }}
                    {{ Form::text('no_hp', null, ['class' => 'form-control']) }}
                </div>
                <div class="mb-3 col-sm-12 col-md-6">
                    {{ Form::label('no_wa', 'No. WA (*)', ['class' => 'form-label']) }}
                    {{ Form::text('no_wa', null, ['class' => 'form-control']) }}
                </div>
                <div class="mb-3 col-4">
                    {{ Form::label('alamat', 'Alamat (*)', ['class' => 'form-label']) }}
                    {{ Form::textarea('alamat', null, ['class' => 'form-control']) }}
                </div>
                <div class="col-8">
                    <div class="row">
                        <div class="mb-3 col-6">
                            {{ Form::label('provinsi', 'Provinsi', ['class' => 'form-label']) }}
                            <select id="provinces" class="form-select">
                                <option idProv="" value="{{ $datadiri->provinces ?? '-' }}">
                                    {{ $datadiri->provinces ?? '-' }}</option>
                            </select>
                            <input type="hidden" name="provinces" id="dataProvince"
                                value="{{ $datadiri->provinces ?? '-' }}">
                        </div>
                        <div class="mb-3 col-6">
                            {{ Form::label('kota', 'Kota', ['class' => 'form-label']) }}
                            <select name="cities" id="cities" class="form-select">
                                <option value="{{ $datadiri->cities ?? '-' }}">{{ $datadiri->cities ?? '-' }}</option>
                            </select>
                        </div>
                        <div class="mb-3 col-12">
                            {{ Form::label('status_rumah', 'Status Tempat Tinggal', ['class' => 'form-label']) }}
                            <select class="form-select" name="status_rumah">
                                @foreach (\App\Constants\DatadiriConst::StatusRumah as $d)
                                    <option value="{{ $d }}"
                                        {{ $datadiri && $datadiri->status_rumah == $d ? 'selected' : '' }}>
                                        {{ $d }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>

                <div class="mb-3 col-sm-12 col-md-4">
                    {{ Form::label('golongan_darah', 'Golongan Darah', ['class' => 'form-label']) }}
                    <select class="form-select" name="golongan_darah">
                        @foreach (\App\Constants\DatadiriConst::GolonganDarah as $d)
                            <option value="{{ $d }}"
                                {{ $datadiri && $datadiri->golongan_darah == $d ? 'selected' : '' }}>
                                {{ $d }}
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

                <div class="col-12 text-end">
                    {{ Form::submit('Simpan Data Diri', ['class' => 'btn btn-primary']) }}
                </div>
            </div>
            {{ Form::close() }}
        </div>
    </div>

    <div class="card mt-2">
        <div class="card-body">
            <div class="row">
                <h4>Hobi</h4>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Hobi</th>
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
                                            class="btn btn-sm btn-primary">Edit</a>
                                        {!! Form::open(['method' => 'DELETE', 'route' => ['dataolahragas.destroy', $dataolahraga->id]]) !!}
                                        {!! Form::submit('Delete', ['class' => 'btn btn-sm btn-danger']) !!}
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
        </div>
    </div>

    <div class="card mt-2">
        <div class="card-body">
            <div class="row">
                <h4>Riwayat Kesehatan</h4>
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
                                <td>{{ $i + 1 }}</td>
                                <td>{{ $datakesehatan->kesehatan }}</td>
                                <td>{{ $datakesehatan->keterangan }}</td>

                                <td>
                                    <div class="d-flex gap-2">
                                        <a href="{{ route('datakesehatans.show', [$datakesehatan->id]) }}"
                                            class="btn btn-info">Show</a>
                                        <a href="{{ route('datakesehatans.edit', [$datakesehatan->id]) }}"
                                            class="btn btn-sm btn-primary">Edit</a>
                                        {!! Form::open(['method' => 'DELETE', 'route' => ['datakesehatans.destroy', $datakesehatan->id]]) !!}
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

<script>
    var dataProvince = [];
    $(document).ready(function() {
        // Fetch provinces
        $.getJSON('https://www.emsifa.com/api-wilayah-indonesia/api/provinces.json', function(data) {
            // console.log(data)
            dataProvince = data
            var provincesDropdown = $('#provinces');

            $.each(data, function(index, province) {
                var option = $('<option></option>')
                    .attr('value', index)
                    .text(province.name);
                $('#provinces').append(option);
            });
        });

        // Handle province selection
        $('#provinces').change(function() {
            var index = $(this).val();
            var provinceId = dataProvince[index].id
            $('#dataProvince').val(dataProvince[index].name)
            if (provinceId) {
                // Fetch cities based on selected province
                $.getJSON(
                    `https://www.emsifa.com/api-wilayah-indonesia/api/regencies/${provinceId}.json`,
                    function(data) {
                        var citiesDropdown = $('#cities');
                        citiesDropdown.empty(); // Clear previous options
                        citiesDropdown.append($('<option>', {
                            value: '',
                            text: 'Select City'
                        }));
                        $.each(data, function(index, city) {
                            citiesDropdown.append($('<option>', {
                                value: city.name,
                                text: city.name
                            }));
                        });
                    });
            } else {
                $('#cities').empty().append($('<option>', {
                    value: '',
                    text: 'Select City'
                })); // Reset cities dropdown
            }
        });
    });
</script>
