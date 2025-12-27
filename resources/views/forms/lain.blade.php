<div class="tab-pane fade" id="pills-lain" role="tabpanel" aria-labelledby="pills-lain-tab" tabindex="0">

    <!-- Hero Section -->
    <div class="mb-4">
        <h4 class="fw-bolder text-dark mb-1">Informasi Lainnya</h4>
        <p class="text-muted small">Tambahkan data pendukung lainnya seperti Hobi, Referensi, dan Kesehatan.</p>
    </div>

    <div class="row g-4">
        <!-- Hobi Card -->
        <div class="col-md-4">
            <div
                class="card h-100 border-0 shadow-sm rounded-4 overflow-hidden bg-white hover-up transition-all group-card">
                <div class="card-body p-4 text-center d-flex flex-column align-items-center justify-content-center">
                    <div class="mb-4 p-3 rounded-circle bg-success bg-opacity-10 text-success position-relative">
                        <i class="ti ti-run fs-1"></i>
                        <span
                            class="position-absolute top-0 start-100 translate-middle p-2 bg-success border border-light rounded-circle">
                            <span class="visually-hidden">New alerts</span>
                        </span>
                    </div>
                    <h5 class="fw-bold text-dark mb-2">Hobi & Minat</h5>
                    <p class="text-muted small mb-4">Tambahkan aktivitas dan hobi yang Anda gemari.</p>
                    <a href="{{ route('dataolahragas.create') }}"
                        class="btn btn-outline-success rounded-pill px-4 fw-bold w-100 mt-auto hover-scale">
                        <i class="ti ti-plus me-1"></i> Tambah Hobi
                    </a>
                </div>
            </div>
        </div>

        <!-- Referensi Card -->
        <div class="col-md-4">
            <div
                class="card h-100 border-0 shadow-sm rounded-4 overflow-hidden bg-white hover-up transition-all group-card">
                <div class="card-body p-4 text-center d-flex flex-column align-items-center justify-content-center">
                    <div class="mb-4 p-3 rounded-circle bg-primary bg-opacity-10 text-primary position-relative">
                        <i class="ti ti-user-check fs-1"></i>
                    </div>
                    <h5 class="fw-bold text-dark mb-2">Referensi Kerja</h5>
                    <p class="text-muted small mb-4">Tambahkan referensi dari tempat kerja sebelumnya.</p>
                    <a href="{{ route('datadetails.create') }}"
                        class="btn btn-outline-primary rounded-pill px-4 fw-bold w-100 mt-auto hover-scale">
                        <i class="ti ti-plus me-1"></i> Tambah Referensi
                    </a>
                </div>
            </div>
        </div>

        <!-- Kesehatan Card -->
        <div class="col-md-4">
            <div
                class="card h-100 border-0 shadow-sm rounded-4 overflow-hidden bg-white hover-up transition-all group-card">
                <div class="card-body p-4 text-center d-flex flex-column align-items-center justify-content-center">
                    <div class="mb-4 p-3 rounded-circle bg-danger bg-opacity-10 text-danger position-relative">
                        <i class="ti ti-heartbeat fs-1"></i>
                    </div>
                    <h5 class="fw-bold text-dark mb-2">Riwayat Kesehatan</h5>
                    <p class="text-muted small mb-4">Tambahkan catatan kondisi kesehatan atau riwayat medis.</p>
                    <a href="{{ route('datakesehatans.create') }}"
                        class="btn btn-outline-danger rounded-pill px-4 fw-bold w-100 mt-auto hover-scale">
                        <i class="ti ti-plus me-1"></i> Tambah Riwayat
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
