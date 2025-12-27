<div class="tab-pane fade" id="pills-kemampuan" role="tabpanel" aria-labelledby="pills-kemampuan-tab" tabindex="0">

    <!-- Hero Section -->
    <div class="mb-4">
        <h4 class="fw-bolder text-dark mb-1">Keahlian & Kompetensi</h4>
        <p class="text-muted small">Daftar keterampilan dan tingkat keahlian Anda.</p>
    </div>

    <!-- Main Card -->
    <div class="card border-0 shadow-sm rounded-4 overflow-hidden bg-white">
        <div class="card-header bg-white p-4 d-flex justify-content-between align-items-center border-bottom-0">
            <div class="d-flex align-items-center">
                <span class="bg-warning bg-opacity-10 text-warning rounded-circle p-2 me-3">
                    <i class="ti ti-bulb fs-5"></i>
                </span>
                <div>
                    <h5 class="fw-bold mb-0">Daftar Kemampuan</h5>
                    <p class="text-muted small mb-0">Hard skill & soft skill</p>
                </div>
            </div>
            <a href="{{ url('datakemampuans/create') }}"
                class="btn btn-sm btn-outline-warning rounded-pill px-3 fw-bold hover-warning">
                <i class="ti ti-plus me-1"></i> Tambah
            </a>
        </div>

        <div class="card-body p-4 pt-0">
            @if (count($datakemampuans) > 0)
                <div class="row g-3">
                    @foreach ($datakemampuans as $d)
                        @php
                            $levelVal = 3;
                            $levelColor = 'success';
                            if ($d->level == 'Basic') {
                                $levelVal = 1;
                                $levelColor = 'secondary';
                            } elseif ($d->level == 'Middle') {
                                $levelVal = 2;
                                $levelColor = 'info';
                            } else {
                                $levelVal = 3;
                                $levelColor = 'success';
                            }
                        @endphp
                        <div class="col-md-6 col-lg-4">
                            <div
                                class="p-3 border border-light-subtle rounded-4 h-100 bg-white shadow-sm hover-lift transition-all position-relative overflow-hidden group-hover-border">
                                <div class="d-flex justify-content-between align-items-center mb-2">
                                    <h6 class="fw-bold text-dark mb-0 text-truncate pe-2">{{ $d->kemampuan }}</h6>

                                    <div class="dropdown">
                                        <button class="btn btn-sm btn-link text-muted p-0" type="button"
                                            data-bs-toggle="dropdown">
                                            <i class="ti ti-dots"></i>
                                        </button>
                                        <ul class="dropdown-menu dropdown-menu-end border-0 shadow-sm">
                                            <li>
                                                {!! Form::open(['method' => 'DELETE', 'route' => ['datakemampuans.destroy', Crypt::encryptString($d->id)]]) !!}
                                                <button type="submit" class="dropdown-item text-danger"
                                                    onclick="return confirm('Hapus data ini?')">Hapus</button>
                                                {!! Form::close() !!}
                                            </li>
                                        </ul>
                                    </div>
                                </div>

                                <span
                                    class="badge bg-{{ $levelColor }} bg-opacity-10 text-{{ $levelColor }} rounded-pill mb-3 small">{{ $d->level }}</span>

                                <div class="d-flex align-items-center gap-2">
                                    <div class="progress flex-grow-1 bg-light" style="height: 6px;">
                                        <div class="progress-bar bg-{{ $levelColor }}" role="progressbar"
                                            style="width: {{ $levelVal * 33.33 }}%"></div>
                                    </div>
                                    <div class="text-warning small" style="white-space: nowrap;">
                                        @for ($star = 0; $star < $levelVal; $star++)
                                            <i class="ti ti-star-filled"></i>
                                        @endfor
                                        @for ($star = $levelVal; $star < 3; $star++)
                                            <i class="ti ti-star"></i>
                                        @endfor
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @else
                <div class="text-center py-5">
                    <div class="d-inline-flex bg-warning bg-opacity-10 text-warning rounded-circle p-3 mb-3">
                        <i class="ti ti-bulb-off fs-1"></i>
                    </div>
                    <p class="text-muted">Belum ada kemampuan ditambahkan.</p>
                </div>
            @endif
        </div>
    </div>
</div>
