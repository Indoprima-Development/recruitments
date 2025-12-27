<div class="tab-pane fade" id="pills-pendidikan" role="tabpanel" aria-labelledby="pills-pendidikan-tab" tabindex="0">

    <!-- Hero Section -->
    <div class="mb-4">
        <h4 class="fw-bolder text-dark mb-1">Riwayat Pendidikan</h4>
        <p class="text-muted small">Informasi kualifikasi pendidikan formal dan non-formal Anda.</p>
    </div>

    <!-- Pendidikan Formal -->
    <div class="card border-0 shadow-sm rounded-4 overflow-hidden mb-5 bg-white">
        <div class="card-header bg-white p-4 d-flex justify-content-between align-items-center border-bottom-0">
            <div class="d-flex align-items-center">
                <span class="bg-primary bg-opacity-10 text-primary rounded-circle p-2 me-3">
                    <i class="ti ti-school fs-5"></i>
                </span>
                <div>
                    <h5 class="fw-bold mb-0">Pendidikan Formal</h5>
                    <p class="text-muted small mb-0">Riwayat sekolah dan universitas</p>
                </div>
            </div>
            <a href="{{ url('datapendidikanformals/create') }}"
                class="btn btn-sm btn-outline-primary rounded-pill px-3 fw-bold hover-primary">
                <i class="ti ti-plus me-1"></i> Tambah
            </a>
        </div>
        <div class="card-body p-4 pt-0">
            @if (count($datapendidikanformals) > 0)
                <div class="position-relative ps-3 ps-md-4 py-2">
                    <!-- Timeline Line -->
                    <div
                        class="position-absolute top-0 bottom-0 start-0 border-start border-2 border-primary border-opacity-25 ms-2 ms-md-2">
                    </div>

                    <div class="d-flex flex-column gap-4">
                        @foreach ($datapendidikanformals as $d)
                            <div class="position-relative ps-4 text-decoration-none d-block group-hover-bg">
                                <!-- Timeline Dot -->
                                <div class="position-absolute top-0 start-0 translate-middle-x bg-white border border-4 border-primary rounded-circle"
                                    style="width: 16px; height: 16px; margin-top: 6px; margin-left: -1px;"></div>

                                <div
                                    class="card border border-light-subtle shadow-sm rounded-4 transition-all hover-lift">
                                    <div class="card-body p-3 p-md-4">
                                        <div class="d-flex flex-column flex-md-row justify-content-between gap-3">
                                            <div>
                                                <div class="d-flex align-items-center gap-2 mb-2">
                                                    <span
                                                        class="badge bg-primary bg-opacity-10 text-primary rounded-pill">{{ $d->tingkat }}</span>
                                                    <span class="text-muted small"><i class="ti ti-calendar me-1"></i>
                                                        Lulus: {{ $d->lulus_tahun }}</span>
                                                </div>
                                                <h5 class="fw-bold text-dark mb-1">{{ $d->instansi }}</h5>
                                                <p class="text-muted mb-2">{{ $d->jurusan }}</p>

                                                @if ($d->nilai)
                                                    <div
                                                        class="d-inline-flex align-items-center bg-light rounded-pill px-3 py-1 mt-1">
                                                        <small class="fw-bold text-dark me-2">Nilai:</small>
                                                        <div class="progress" style="width: 60px; height: 6px;">
                                                            <div class="progress-bar bg-{{ $d->nilai >= 3.0 ? 'success' : 'warning' }}"
                                                                role="progressbar"
                                                                style="width: {{ ($d->nilai / 4) * 100 }}%"></div>
                                                        </div>
                                                        <small class="fw-bold ms-2">{{ $d->nilai }}</small>
                                                    </div>
                                                @endif
                                            </div>

                                            <div class="d-flex align-items-start justify-content-end gap-2 text-nowrap">
                                                <a href="{{ route('datapendidikanformals.edit', [Crypt::encryptString($d->id)]) }}"
                                                    class="btn btn-sm btn-icon btn-light text-primary rounded-circle"
                                                    title="Edit">
                                                    <i class="ti ti-pencil"></i>
                                                </a>
                                                {!! Form::open([
                                                    'method' => 'DELETE',
                                                    'route' => ['datapendidikanformals.destroy', Crypt::encryptString($d->id)],
                                                ]) !!}
                                                <button type="submit"
                                                    class="btn btn-sm btn-icon btn-light text-danger rounded-circle"
                                                    onclick="return confirm('Hapus data ini?')" title="Hapus">
                                                    <i class="ti ti-trash"></i>
                                                </button>
                                                {!! Form::close() !!}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            @else
                <div class="text-center py-5">
                    <div class="d-inline-flex bg-primary bg-opacity-10 text-primary rounded-circle p-3 mb-3">
                        <i class="ti ti-school-off fs-1"></i>
                    </div>
                    <p class="text-muted">Belum ada data pendidikan formal.</p>
                </div>
            @endif
        </div>
    </div>

    <!-- Pendidikan Non Formal -->
    <div class="card border-0 shadow-sm rounded-4 overflow-hidden bg-white">
        <div class="card-header bg-white p-4 d-flex justify-content-between align-items-center border-bottom-0">
            <div class="d-flex align-items-center">
                <span class="bg-warning bg-opacity-10 text-warning rounded-circle p-2 me-3">
                    <i class="ti ti-certificate fs-5"></i>
                </span>
                <div>
                    <h5 class="fw-bold mb-0">Pendidikan Non Formal</h5>
                    <p class="text-muted small mb-0">Kursus, Seminar, dan Pelatihan</p>
                </div>
            </div>
            <a href="{{ url('datapendidikannonformals/create') }}"
                class="btn btn-sm btn-outline-warning rounded-pill px-3 fw-bold hover-warning">
                <i class="ti ti-plus me-1"></i> Tambah
            </a>
        </div>
        <div class="card-body p-4 pt-0">
            @if (count($datapendidikannonformals) > 0)
                <div class="row g-3">
                    @foreach ($datapendidikannonformals as $d)
                        <div class="col-md-6">
                            <div
                                class="card h-100 border border-light-subtle shadow-none bg-light-subtle rounded-4 hover-shadow transition-all">
                                <div class="card-body p-4">
                                    <div class="d-flex justify-content-between align-items-start mb-3">
                                        <div class="badge bg-white border text-warning rounded-pill shadow-sm">
                                            <i class="ti ti-bookmark me-1"></i> {{ $d->jenis }}
                                        </div>
                                        <div class="dropdown">
                                            <button class="btn btn-sm btn-link text-muted p-0" type="button"
                                                data-bs-toggle="dropdown">
                                                <i class="ti ti-dots-vertical"></i>
                                            </button>
                                            <ul class="dropdown-menu dropdown-menu-end border-0 shadow-sm">
                                                <li><a class="dropdown-item"
                                                        href="{{ route('datapendidikannonformals.edit', [Crypt::encryptString($d->id)]) }}">Edit</a>
                                                </li>
                                                <li>
                                                    {!! Form::open([
                                                        'method' => 'DELETE',
                                                        'route' => ['datapendidikannonformals.destroy', Crypt::encryptString($d->id)],
                                                    ]) !!}
                                                    <button type="submit" class="dropdown-item text-danger"
                                                        onclick="return confirm('Hapus?')">Hapus</button>
                                                    {!! Form::close() !!}
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <h6 class="fw-bold text-dark mb-1">{{ $d->tingkat }}</h6> <!-- Topik as title -->
                                    <p class="text-muted small mb-3">{{ $d->instansi }}</p>

                                    <div
                                        class="d-flex align-items-center gap-2 text-muted small border-top pt-3 border-light">
                                        <i class="ti ti-calendar-event"></i>
                                        <span>{{ $d->date_start }} - {{ $d->date_end }}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @else
                <div class="text-center py-5">
                    <div class="d-inline-flex bg-warning bg-opacity-10 text-warning rounded-circle p-3 mb-3">
                        <i class="ti ti-certificate-off fs-1"></i>
                    </div>
                    <p class="text-muted">Belum ada data pelatihan/seminar.</p>
                </div>
            @endif
        </div>
    </div>
</div>
