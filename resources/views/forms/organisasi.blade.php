<div class="tab-pane fade" id="pills-organisasi" role="tabpanel" aria-labelledby="pills-organisasi-tab" tabindex="0">

    <!-- Hero Section -->
    <div class="mb-4">
        <h4 class="fw-bolder text-dark mb-1">Pengalaman Organisasi</h4>
        <p class="text-muted small">Riwayat keikutsertaan dalam organisasi sosial atau kampus.</p>
    </div>

    <!-- Main Card -->
    <div class="card border-0 shadow-sm rounded-4 overflow-hidden bg-white">
        <div class="card-header bg-white p-4 d-flex justify-content-between align-items-center border-bottom-0">
            <div class="d-flex align-items-center">
                <span class="bg-primary bg-opacity-10 text-primary rounded-circle p-2 me-3">
                    <i class="ti ti-sitemap fs-5"></i>
                </span>
                <div>
                    <h5 class="fw-bold mb-0">Riwayat Organisasi</h5>
                    <p class="text-muted small mb-0">Organisasi yang pernah diikuti</p>
                </div>
            </div>
            <a href="{{ route('dataorganisasis.create') }}"
                class="btn btn-sm btn-outline-primary rounded-pill px-3 fw-bold hover-primary">
                <i class="ti ti-plus me-1"></i> Tambah
            </a>
        </div>

        <div class="card-body p-4 pt-0">
            @if (count($dataorganisasis) > 0)
                <div class="position-relative ps-3 ps-md-4 py-2">
                    <!-- Timeline Line -->
                    <div
                        class="position-absolute top-0 bottom-0 start-0 border-start border-2 border-primary border-opacity-25 ms-2 ms-md-2">
                    </div>

                    <div class="d-flex flex-column gap-4">
                        @foreach ($dataorganisasis as $d)
                            <div class="position-relative ps-4 text-decoration-none d-block">
                                <!-- Timeline Dot -->
                                <div class="position-absolute top-0 start-0 translate-middle-x bg-white border border-4 border-primary rounded-circle shadow-sm"
                                    style="width: 16px; height: 16px; margin-top: 6px; margin-left: -1px;"></div>

                                <div
                                    class="card border border-light-subtle shadow-sm rounded-4 transition-all hover-lift">
                                    <div class="card-body p-3 p-md-4">
                                        <div class="d-flex flex-column flex-md-row justify-content-between gap-3">
                                            <div>
                                                <div class="d-flex align-items-center gap-2 mb-2">
                                                    <span
                                                        class="badge bg-primary bg-opacity-10 text-primary rounded-pill">{{ $d->tingkat }}</span>
                                                    <span class="text-muted small"><i
                                                            class="ti ti-calendar-event me-1"></i> {{ $d->start_date }}
                                                        - {{ $d->end_date }}</span>
                                                </div>
                                                <h5 class="fw-bold text-dark mb-1">{{ $d->nama_organisasi }}</h5>
                                                <div class="d-flex align-items-center text-muted">
                                                    <i class="ti ti-user-check me-2"></i>
                                                    <span class="fw-medium text-dark">{{ $d->jabatan }}</span>
                                                </div>
                                            </div>

                                            <div class="d-flex align-items-start justify-content-end gap-2">
                                                <div class="dropdown">
                                                    <button
                                                        class="btn btn-sm btn-icon btn-ghost-secondary rounded-circle"
                                                        type="button" data-bs-toggle="dropdown">
                                                        <i class="ti ti-dots-vertical"></i>
                                                    </button>
                                                    <ul class="dropdown-menu dropdown-menu-end border-0 shadow-sm">
                                                        <li>
                                                            {!! Form::open(['method' => 'DELETE', 'route' => ['dataorganisasis.destroy', Crypt::encryptString($d->id)]]) !!}
                                                            <button type="submit" class="dropdown-item text-danger"
                                                                onclick="return confirm('Hapus data ini?')">Hapus</button>
                                                            {!! Form::close() !!}
                                                        </li>
                                                    </ul>
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
                        <i class="ti ti-sitemap-off fs-1"></i>
                    </div>
                    <p class="text-muted">Belum ada data organisasi ditambahkan.</p>
                </div>
            @endif
        </div>
    </div>
</div>
