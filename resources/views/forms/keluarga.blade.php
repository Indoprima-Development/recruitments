<div class="tab-pane fade" id="pills-keluarga" role="tabpanel" aria-labelledby="pills-keluarga-tab" tabindex="0">

    <!-- Hero Section -->
    <div class="mb-4">
        <h4 class="fw-bolder text-dark mb-1">Data Keluarga</h4>
        <p class="text-muted small">Informasi anggota keluarga inti Anda.</p>
    </div>

    <!-- Main Card -->
    <div class="card border-0 shadow-sm rounded-4 overflow-hidden bg-white">
        <div class="card-header bg-white p-4 d-flex justify-content-between align-items-center border-bottom-0">
            <div class="d-flex align-items-center">
                <span class="bg-success bg-opacity-10 text-success rounded-circle p-2 me-3">
                    <i class="ti ti-users fs-5"></i>
                </span>
                <div>
                    <h5 class="fw-bold mb-0">Anggota Keluarga</h5>
                    <p class="text-muted small mb-0">Daftar keluarga yang terdaftar</p>
                </div>
            </div>
            <a href="{{ url('datakeluargas/create') }}"
                class="btn btn-sm btn-outline-success rounded-pill px-3 fw-bold hover-success">
                <i class="ti ti-plus me-1"></i> Tambah
            </a>
        </div>

        <div class="card-body p-4 pt-0">
            @if (count($datakeluargas) > 0)
                <div class="row g-3">
                    @foreach ($datakeluargas as $d)
                        <div class="col-md-6 col-xl-4">
                            <div
                                class="card h-100 border border-light-subtle shadow-none bg-light-subtle rounded-4 hover-shadow transition-all position-relative overflow-hidden">
                                <!-- Decorative Top Line -->
                                <div class="position-absolute top-0 start-0 w-100 h-1 bg-success opacity-50"></div>

                                <div class="card-body p-4">
                                    <div class="d-flex justify-content-between align-items-start mb-3">
                                        <span
                                            class="badge bg-white text-success border border-success border-opacity-25 rounded-pill shadow-sm px-3 py-2">
                                            {{ $d->status_hubungan }}
                                        </span>
                                        <div class="dropdown">
                                            <button class="btn btn-sm btn-link text-muted p-0" type="button"
                                                data-bs-toggle="dropdown">
                                                <i class="ti ti-dots-vertical"></i>
                                            </button>
                                            <ul class="dropdown-menu dropdown-menu-end border-0 shadow-sm">
                                                <li><a class="dropdown-item"
                                                        href="{{ route('datakeluargas.edit', [Crypt::encryptString($d->id)]) }}">Edit</a>
                                                </li>
                                                <li>
                                                    {!! Form::open(['method' => 'DELETE', 'route' => ['datakeluargas.destroy', Crypt::encryptString($d->id)]]) !!}
                                                    <button type="submit" class="dropdown-item text-danger"
                                                        onclick="return confirm('Hapus data ini?')">Hapus</button>
                                                    {!! Form::close() !!}
                                                </li>
                                            </ul>
                                        </div>
                                    </div>

                                    <div class="text-center mb-4">
                                        <div
                                            class="d-inline-flex align-items-center justify-content-center bg-white rounded-circle shadow-sm border border-light-subtle p-3 mb-3 text-success">
                                            <i
                                                class="ti ti-{{ $d->status_hubungan == 'Ayah'
                                                    ? 'man'
                                                    : ($d->status_hubungan == 'Ibu'
                                                        ? 'woman'
                                                        : ($d->status_hubungan == 'Suami'
                                                            ? 'friends'
                                                            : ($d->status_hubungan == 'Istri'
                                                                ? 'friends'
                                                                : 'user'))) }} fs-3"></i>
                                        </div>
                                        <h5 class="fw-bold text-dark mb-1">{{ $d->nama_keluarga }}</h5>
                                        <p class="text-muted small mb-0">{{ $d->pekerjaan }}</p>
                                    </div>

                                    <div class="vstack gap-2 border-top border-light-subtle pt-3">
                                        <div class="d-flex align-items-center gap-2 text-muted small">
                                            <i class="ti ti-calendar me-1"></i>
                                            <div class="d-flex flex-column text-break">
                                                <span>{{ $d->tempat_lahir_keluarga }},
                                                    {{ $d->tanggal_lahir_keluarga }}</span>
                                            </div>
                                        </div>
                                        <div class="d-flex align-items-start gap-2 text-muted small">
                                            <i class="ti ti-map-pin me-1 mt-1"></i>
                                            <span class="text-break">{{ $d->alamat }}</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @else
                <div class="text-center py-5">
                    <div class="d-inline-flex bg-success bg-opacity-10 text-success rounded-circle p-3 mb-3">
                        <i class="ti ti-users-plus fs-1"></i>
                    </div>
                    <p class="text-muted">Belum ada data keluarga ditambahkan.</p>
                </div>
            @endif
        </div>
    </div>
</div>
