<div class="tab-pane fade" id="pills-pernyataan" role="tabpanel" aria-labelledby="pills-pernyataan-tab" tabindex="0">

    <!-- Hero Section -->
    <div class="mb-4">
        <h4 class="fw-bolder text-dark mb-1">Pernyataan & Referensi</h4>
        <p class="text-muted small">Lengkapi data ekspektasi kerja dan referensi profesional Anda.</p>
    </div>

    <!-- Ekspektasi Form -->
    <div class="card border-0 shadow-sm rounded-4 overflow-hidden bg-white mb-5">
        <div class="card-header bg-white p-4 border-bottom-0">
            <div class="d-flex align-items-center">
                <span class="bg-primary bg-opacity-10 text-primary rounded-circle p-2 me-3">
                    <i class="ti ti-file-description fs-5"></i>
                </span>
                <div>
                    <h5 class="fw-bold mb-0">Formulir Pernyataan</h5>
                    <p class="text-muted small mb-0">Ekspektasi gaji dan ketersediaan</p>
                </div>
            </div>
        </div>

        <div class="card-body p-4 pt-0">
            {{ Form::model($datadiri, ['url' => ['datadiris/pernyataan', Auth::user()->id], 'method' => 'POST', 'enctype' => 'multipart/form-data', 'id' => 'formPernyataan', 'class' => 'needs-validation']) }}

            <div class="row g-4">
                <div class="col-md-6">
                    <div class="form-floating">
                        {{ Form::number('ekspektasi_gaji', null, ['class' => 'form-control bg-light-subtle border-light shadow-none fw-medium', 'placeholder' => '0']) }}
                        {{ Form::label('ekspektasi_gaji', 'Ekspektasi Gaji (Rp)') }}
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-floating">
                        {{ Form::date('kesediaan_mulai_bekerja', null, ['class' => 'form-control bg-light-subtle border-light shadow-none fw-medium']) }}
                        {{ Form::label('kesediaan_mulai_bekerja', 'Kesediaan Mulai Bekerja') }}
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-floating">
                        {{ Form::text('fasilitas_harapan', null, ['class' => 'form-control bg-light-subtle border-light shadow-none fw-medium', 'placeholder' => '-']) }}
                        {{ Form::label('fasilitas_harapan', 'Fasilitas yang Diharapkan') }}
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-floating">
                        <select name="kesediaan_penempatan"
                            class="form-select bg-light-subtle border-light shadow-none fw-medium">
                            <option {{ $datadiri && $datadiri->kesediaan_penempatan == 1 ? 'selected' : '' }}
                                value="1">Bersedia</option>
                            <option {{ $datadiri && $datadiri->kesediaan_penempatan == 0 ? 'selected' : '' }}
                                value="0">Tidak Bersedia</option>
                        </select>
                        {{ Form::label('kesediaan_penempatan', 'Bersedia Ditempatkan di Seluruh Unit?') }}
                    </div>
                </div>

                {{ Form::hidden('keterangan_jabatan_terakhir', '-', ['class' => 'form-control']) }}

                <div class="col-12">
                    <label class="form-label fw-bold text-dark mb-2">Struktur Organisasi (Opsional)</label>
                    <div
                        class="p-3 border border-2 border-dashed border-light rounded-4 text-center bg-light-subtle hover-bg-light transition-all">
                        <input type="file" class="form-control d-none" id="orgChartInput"
                            name="image_jabatan_terakhir" accept="image/*" onchange="previewImage(this)">
                        <label for="orgChartInput" class="cursor-pointer d-block p-4">
                            <div class="mb-3">
                                <i class="ti ti-cloud-upload fs-1 text-muted opacity-50"></i>
                            </div>
                            <h6 class="fw-bold mb-1">Klik untuk upload gambar struktur</h6>
                            <small class="text-muted d-block">Maksimal 1 MB (JPG/PNG)</small>
                        </label>

                        <div id="imagePreview"
                            class="mt-3 {{ $datadiri && !empty($datadiri->image_jabatan_terakhir) && $datadiri->image_jabatan_terakhir != '-' ? '' : 'd-none' }}">
                            @if ($datadiri && !empty($datadiri->image_jabatan_terakhir) && $datadiri->image_jabatan_terakhir != '-')
                                @if (file_exists(public_path($datadiri->image_jabatan_terakhir)))
                                    <img src="{{ asset($datadiri->image_jabatan_terakhir) }}"
                                        class="img-fluid rounded-3 shadow-sm border" style="max-height: 200px;">
                                @else
                                    <img src="{{ asset('images/no-image.png') }}"
                                        class="img-fluid rounded-3 shadow-sm border" style="max-height: 200px;">
                                @endif
                            @else
                                <img src="" class="img-fluid rounded-3 shadow-sm border d-none"
                                    id="previewImgElement" style="max-height: 200px;">
                            @endif
                        </div>
                    </div>
                </div>

                <div class="col-12 mt-4 pt-3 border-top">
                    <button id="btnPernyataan" type="button"
                        class="btn btn-primary rounded-pill px-5 py-3 fw-bold shadow-lg w-100 w-md-auto hover-scale">
                        <i class="ti ti-device-floppy me-2"></i> Simpan Pernyataan
                    </button>
                    <p class="text-muted fst-italic small mt-3 mb-0 text-center text-md-start">
                        <i class="ti ti-info-circle me-1"></i> Dengan menyimpan, Anda menyatakan data yang diisi adalah
                        benar.
                    </p>
                </div>
            </div>
            {{ Form::close() }}
        </div>
    </div>

    <!-- Referensi Card -->
    <div class="card border-0 shadow-sm rounded-4 overflow-hidden bg-white">
        <div class="card-header bg-white p-4 d-flex justify-content-between align-items-center border-bottom-0">
            <div class="d-flex align-items-center">
                <span class="bg-success bg-opacity-10 text-success rounded-circle p-2 me-3">
                    <i class="ti ti-users fs-5"></i>
                </span>
                <div>
                    <h5 class="fw-bold mb-0">Referensi & Rekomendasi</h5>
                    <p class="text-muted small mb-0">Kontak profesional yang dapat dihubungi</p>
                </div>
            </div>
            <a href="{{ url('datadetails/create') }}"
                class="btn btn-sm btn-outline-success rounded-pill px-3 fw-bold hover-success">
                <i class="ti ti-plus me-1"></i> Tambah
            </a>
        </div>

        <div class="card-body p-4 pt-0">
            @if (count($datadetails) > 0)
                <div class="row g-3">
                    @foreach ($datadetails as $d)
                        <div class="col-md-6 col-xl-4">
                            <div
                                class="card h-100 border border-light-subtle shadow-none bg-light-subtle rounded-4 hover-shadow transition-all">
                                <div class="card-body p-4">
                                    <div class="d-flex justify-content-between align-items-start mb-3">
                                        <span
                                            class="badge bg-white text-dark border border-light-subtle rounded-pill shadow-sm px-3 py-2">
                                            {{ $d->tipe }}
                                        </span>
                                        <div class="dropdown">
                                            <button class="btn btn-sm btn-link text-muted p-0" type="button"
                                                data-bs-toggle="dropdown">
                                                <i class="ti ti-dots-vertical"></i>
                                            </button>
                                            <ul class="dropdown-menu dropdown-menu-end border-0 shadow-sm">
                                                <li><a class="dropdown-item"
                                                        href="{{ route('datadetails.edit', [Crypt::encryptString($d->id)]) }}">Edit</a>
                                                </li>
                                                <li>
                                                    {!! Form::open(['method' => 'DELETE', 'route' => ['datadetails.destroy', Crypt::encryptString($d->id)]]) !!}
                                                    <button type="submit" class="dropdown-item text-danger"
                                                        onclick="return confirm('Hapus data ini?')">Hapus</button>
                                                    {!! Form::close() !!}
                                                </li>
                                            </ul>
                                        </div>
                                    </div>

                                    <div class="text-center mb-0">
                                        <div
                                            class="avatar-placeholder mb-3 mx-auto bg-white rounded-circle shadow-sm p-3 d-inline-flex text-success">
                                            <i class="ti ti-user-star fs-2"></i>
                                        </div>
                                        <h5 class="fw-bold text-dark mb-1">{{ $d->nama }}</h5>
                                        <p class="text-primary fw-medium mb-1">{{ $d->jabatan }}</p>
                                        <p class="text-muted small mb-0">Hubungan: {{ $d->hubungan }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @else
                <div class="text-center py-5">
                    <div class="d-inline-flex bg-success bg-opacity-10 text-success rounded-circle p-3 mb-3">
                        <i class="ti ti-user-x fs-1"></i>
                    </div>
                    <p class="text-muted">Belum ada data referensi ditambahkan.</p>
                </div>
            @endif
        </div>
    </div>
</div>
