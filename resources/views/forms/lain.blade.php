<div class="tab-pane fade" id="pills-lain" role="tabpanel" aria-labelledby="pills-security-tab" tabindex="0">
    <div class="row g-4">
        <!-- Hobi Card -->
        <div class="col-md-4 d-flex align-items-stretch">
            <div class="card glass-card border-0 rounded-4 overflow-hidden w-100 hover-lift">
                <div class="card-header bg-gradient-hobi py-3">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h5 class="mb-0 fw-semibold text-white"><i class="fas fa-running me-2"></i> Hobi</h5>
                        </div>
                        <a href="{{ route('dataolahragas.create') }}" class="btn btn-sm btn-light rounded-pill hover-lift">
                            <i class="fas fa-plus me-1"></i> Tambah
                        </a>
                    </div>
                </div>
                <div class="card-body bg-dark-2">
                    <div class="d-flex align-items-center justify-content-center" style="min-height: 100px;">
                        <i class="fas fa-running display-4 text-success opacity-25"></i>
                    </div>
                    <p class="text-center text-white-50 mt-3 mb-0 small">Tambahkan hobi Anda</p>
                </div>
            </div>
        </div>

        <!-- Referensi Card -->
        <div class="col-md-4 d-flex align-items-stretch">
            <div class="card glass-card border-0 rounded-4 overflow-hidden w-100 hover-lift">
                <div class="card-header bg-gradient-referensi py-3">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h5 class="mb-0 fw-semibold text-white"><i class="fas fa-handshake me-2"></i> Referensi</h5>
                        </div>
                        <a href="{{ route('datadetails.create') }}" class="btn btn-sm btn-light rounded-pill hover-lift">
                            <i class="fas fa-plus me-1"></i> Tambah
                        </a>
                    </div>
                </div>
                <div class="card-body bg-dark-2">
                    <div class="d-flex align-items-center justify-content-center" style="min-height: 100px;">
                        <i class="fas fa-handshake display-4 text-primary opacity-25"></i>
                    </div>
                    <p class="text-center text-white-50 mt-3 mb-0 small">Tambahkan referensi</p>
                </div>
            </div>
        </div>

        <!-- Kesehatan Card -->
        <div class="col-md-4 d-flex align-items-stretch">
            <div class="card glass-card border-0 rounded-4 overflow-hidden w-100 hover-lift">
                <div class="card-header bg-gradient-kesehatan py-3">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h5 class="mb-0 fw-semibold text-white"><i class="fas fa-heartbeat me-2"></i> Kesehatan</h5>
                        </div>
                        <a href="{{ route('datakesehatans.create') }}" class="btn btn-sm btn-light rounded-pill hover-lift">
                            <i class="fas fa-plus me-1"></i> Tambah
                        </a>
                    </div>
                </div>
                <div class="card-body bg-dark-2">
                    <div class="d-flex align-items-center justify-content-center" style="min-height: 100px;">
                        <i class="fas fa-heartbeat display-4 text-danger opacity-25"></i>
                    </div>
                    <p class="text-center text-white-50 mt-3 mb-0 small">Riwayat kesehatan</p>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    .bg-gradient-hobi {
        background: linear-gradient(135deg, #10b981 0%, #3b82f6 100%);
    }

    .bg-gradient-referensi {
        background: linear-gradient(135deg, #f59e0b 0%, #f97316 100%);
    }

    .bg-gradient-kesehatan {
        background: linear-gradient(135deg, #ef4444 0%, #d946ef 100%);
    }

    /* Consistent with previous styling */
    .glass-card {
        transition: all 0.3s ease;
        background: rgba(255, 255, 255, 0.03);
        backdrop-filter: blur(10px);
    }

    .hover-lift {
        transition: transform 0.2s ease, box-shadow 0.2s ease;
    }

    .hover-lift:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 20px rgba(0, 0, 0, 0.2);
    }

    .bg-dark-2 {
        background-color: #1e293b;
    }

    @media (max-width: 768px) {
        .col-md-4 {
            margin-bottom: 1rem;
        }
    }
</style>
