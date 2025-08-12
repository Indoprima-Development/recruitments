<div class="tab-pane fade show" id="pills-organisasi" role="tabpanel" aria-labelledby="pills-account-tab" tabindex="0">
    <div class="card glass-card border-0 rounded-4 overflow-hidden">
        <div class="card-header bg-gradient-organization py-3">
            <div class="d-flex justify-content-between align-items-center">
                <div>
                    <h5 class="mb-0 fw-semibold text-white"><i class="fas fa-sitemap me-2"></i> Pengalaman Organisasi</h5>
                </div>
                <a href="{{ route('dataorganisasis.create') }}" class="btn btn-sm btn-light rounded-pill hover-lift">
                    <i class="fas fa-plus me-1"></i> Tambah Data
                </a>
            </div>
        </div>
        <div class="card-body p-0 bg-dark-2">
            <div class="table-responsive">
                <table class="table table-dark table-hover mb-0 table-borderless">
                    <thead class="bg-dark-3">
                        <tr>
                            <th class="ps-4 text-uppercase fw-light text-white">No</th>
                            <th class="text-uppercase fw-light text-white">Organisasi</th>
                            <th class="text-uppercase fw-light text-white">Tingkat</th>
                            <th class="text-uppercase fw-light text-white">Jabatan</th>
                            <th class="text-uppercase fw-light text-white">Periode</th>
                            <th class="text-end pe-4 text-uppercase fw-light text-white">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($dataorganisasis as $i => $dataorganisasi)
                            <tr class="hover-glow">
                                <td class="ps-4 text-info fw-bold">{{ $i+1 }}</td>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <div class="icon-circle bg-info-soft me-2">
                                            <i class="fas fa-sitemap text-info"></i>
                                        </div>
                                        <span>{{ $dataorganisasi->nama_organisasi }}</span>
                                    </div>
                                </td>
                                <td>
                                    <span class="badge bg-dark-4">{{ $dataorganisasi->tingkat }}</span>
                                </td>
                                <td>{{ $dataorganisasi->jabatan }}</td>
                                <td>
                                    <div class="d-flex flex-column">
                                        <small class="text-white-50">{{ $dataorganisasi->start_date }}</small>
                                        <span class="text-white">{{ $dataorganisasi->end_date }}</span>
                                    </div>
                                </td>
                                <td class="text-end pe-4">
                                    <div class="d-flex justify-content-end gap-2">
                                        {!! Form::open(['method' => 'DELETE', 'route' => ['dataorganisasis.destroy', Crypt::encryptString($dataorganisasi->id)]]) !!}
                                        <button type="submit" class="btn btn-sm btn-icon btn-outline-danger rounded-circle hover-lift">
                                            <i class="fas fa-trash fs-5"></i>
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

<style>
    .bg-gradient-organization {
        background: linear-gradient(135deg, #3b82f6 0%, #6366f1 100%);
    }

    .bg-info-soft {
        background-color: rgba(59, 130, 246, 0.1);
    }

    /* Consistent with previous styling */
    .hover-glow:hover {
        background-color: rgba(255, 255, 255, 0.03);
    }

    .icon-circle {
        width: 32px;
        height: 32px;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .bg-dark-2 {
        background-color: #1e293b;
    }

    .bg-dark-3 {
        background-color: #0f172a;
    }

    .bg-dark-4 {
        background-color: #334155;
    }

    @media (max-width: 992px) {
        .table-responsive {
            overflow-x: auto;
            -webkit-overflow-scrolling: touch;
        }

        .table td, .table th {
            white-space: nowrap;
        }
    }
</style>
