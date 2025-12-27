<div class="tab-pane fade" id="pills-pengalaman" role="tabpanel" aria-labelledby="pills-pengalaman-tab" tabindex="0">

    <!-- Hero Section -->
    <div class="mb-4">
        <h4 class="fw-bolder text-dark mb-1">Pengalaman Kerja</h4>
        <p class="text-muted small">Riwayat pekerjaan profesional dan pengalaman karir Anda.</p>
    </div>

    <!-- Main Card -->
    <div class="card border-0 shadow-sm rounded-4 overflow-hidden bg-white">
        <div class="card-header bg-white p-4 d-flex justify-content-between align-items-center border-bottom-0">
            <div class="d-flex align-items-center">
                <span class="bg-primary bg-opacity-10 text-primary rounded-circle p-2 me-3">
                    <i class="ti ti-briefcase fs-5"></i>
                </span>
                <div>
                    <h5 class="fw-bold mb-0">Riwayat Karir</h5>
                    <p class="text-muted small mb-0">Daftar perusahaan dan jabatan</p>
                </div>
            </div>
            <a href="{{ url('datapengalamankerjas/create') }}"
                class="btn btn-sm btn-outline-primary rounded-pill px-3 fw-bold hover-primary">
                <i class="ti ti-plus me-1"></i> Tambah
            </a>
        </div>

        <div class="card-body p-4 pt-0">
            @if (count($datapengalamankerjas) > 0)
                <div class="position-relative ps-3 ps-md-4 py-2">
                    <!-- Timeline Line -->
                    <div
                        class="position-absolute top-0 bottom-0 start-0 border-start border-2 border-primary border-opacity-25 ms-2 ms-md-2">
                    </div>

                    <div class="d-flex flex-column gap-5">
                        @foreach ($datapengalamankerjas as $d)
                            <div class="position-relative ps-4 text-decoration-none d-block">
                                <!-- Timeline Dot -->
                                <div class="position-absolute top-0 start-0 translate-middle-x bg-white border border-4 border-primary rounded-circle shadow-sm"
                                    style="width: 18px; height: 18px; margin-top: 6px; margin-left: -1px;"></div>

                                <div
                                    class="card border border-light-subtle shadow-sm rounded-4 transition-all hover-lift overflow-hidden">
                                    <div
                                        class="card-header bg-light-subtle border-bottom-0 p-3 p-md-4 d-flex justify-content-between align-items-start gap-3">
                                        <div>
                                            <h5 class="fw-bold text-dark mb-1">{{ $d->perusahaan }}</h5>
                                            <div class="d-flex align-items-center gap-2 text-muted small">
                                                <i class="ti ti-calendar-time"></i>
                                                <span>{{ $d->date_start }} - {{ $d->date_end }}</span>
                                            </div>
                                        </div>
                                        <div class="dropdown">
                                            <button class="btn btn-sm btn-icon btn-ghost-secondary rounded-circle"
                                                type="button" data-bs-toggle="dropdown">
                                                <i class="ti ti-dots-vertical"></i>
                                            </button>
                                            <ul class="dropdown-menu dropdown-menu-end shadow-sm border-0">
                                                <li><a class="dropdown-item"
                                                        href="{{ route('datapengalamankerjas.edit', [Crypt::encryptString($d->id)]) }}">Edit</a>
                                                </li>
                                                <li>
                                                    {!! Form::open([
                                                        'method' => 'DELETE',
                                                        'route' => ['datapengalamankerjas.destroy', Crypt::encryptString($d->id)],
                                                    ]) !!}
                                                    <button type="submit" class="dropdown-item text-danger"
                                                        onclick="return confirm('Hapus data ini?')">Hapus</button>
                                                    {!! Form::close() !!}
                                                </li>
                                            </ul>
                                        </div>
                                    </div>

                                    <div class="card-body p-3 p-md-4 pt-2">
                                        <div class="row g-4">
                                            <div class="col-md-6 border-end-md border-light">
                                                <div class="mb-3">
                                                    <label
                                                        class="small text-muted text-uppercase fw-bold mb-1">Jabatan</label>
                                                    <div
                                                        class="d-flex justify-content-between align-items-center bg-light rounded-3 p-2">
                                                        <div>
                                                            <small class="d-block text-muted">Awal</small>
                                                            <span
                                                                class="fw-medium text-dark">{{ $d->jabatan_awal }}</span>
                                                        </div>
                                                        <i class="ti ti-arrow-right text-muted"></i>
                                                        <div class="text-end">
                                                            <small class="d-block text-muted">Akhir</small>
                                                            <span
                                                                class="fw-medium text-dark">{{ $d->jabatan_terakhir }}</span>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div>
                                                    <label
                                                        class="small text-muted text-uppercase fw-bold mb-1">Gaji</label>
                                                    <div class="d-flex flex-column gap-1">
                                                        <div class="d-flex justify-content-between">
                                                            <span class="text-muted small">Awal:</span>
                                                            <span
                                                                class="fw-medium text-dark">{{ FormatNumberWithDots($d->gaji_awal) }}</span>
                                                        </div>
                                                        <div class="d-flex justify-content-between">
                                                            <span class="text-muted small">Akhir:</span>
                                                            <span
                                                                class="fw-bold text-success">{{ FormatNumberWithDots($d->gaji_akhir) }}</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <label class="small text-muted text-uppercase fw-bold mb-1">Alasan
                                                        Keluar</label>
                                                    <p class="mb-0 text-dark bg-light rounded-3 p-3 small">
                                                        {{ $d->alasan_keluar }}</p>
                                                </div>

                                                <div>
                                                    <label
                                                        class="small text-muted text-uppercase fw-bold mb-1">Dokumen</label>
                                                    @if ($d->surat_pengalaman != '-')
                                                        <a href="{{ url($d->surat_pengalaman) }}" target="_blank"
                                                            class="btn btn-outline-success btn-sm w-100 rounded-pill d-flex align-items-center justify-content-center gap-2">
                                                            <i class="ti ti-file-certificate"></i> Lihat Surat
                                                            Pengalaman
                                                        </a>
                                                    @else
                                                        <div class="text-muted small fst-italic"><i
                                                                class="ti ti-file-off me-1"></i> Tidak ada dokumen</div>
                                                    @endif
                                                </div>
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
                        <i class="ti ti-briefcase-off fs-1"></i>
                    </div>
                    <p class="text-muted">Belum ada pengalaman kerja yang ditambahkan.</p>
                </div>
            @endif
        </div>
    </div>
</div>
