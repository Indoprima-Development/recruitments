<div class="tab-pane fade show" id="pills-keluarga" role="tabpanel" aria-labelledby="pills-account-tab" tabindex="0">
    <div class="card glass-card border-0 rounded-4 overflow-hidden">
        <div class="card-header bg-gradient-family py-3">
            <div class="d-flex justify-content-between align-items-center">
                <div>
                    <h5 class="mb-0 fw-semibold text-white"><i class="fas fa-users me-2"></i> Data Keluarga</h5>
                </div>
                <a href="{{ url('datakeluargas/create') }}" class="btn btn-sm btn-light rounded-pill hover-lift">
                    <i class="fas fa-plus me-1"></i> Tambah Anggota
                </a>
            </div>
        </div>
        <div class="card-body p-0 bg-dark-2">
            <div class="table-responsive">
                <table class="table table-dark table-hover mb-0 table-borderless">
                    <thead class="bg-dark-3">
                        <tr>
                            <th class="ps-4 text-uppercase fw-light text-white">No</th>
                            <th class="text-uppercase fw-light text-white">Hubungan</th>
                            <th class="text-uppercase fw-light text-white">Nama</th>
                            <th class="text-uppercase fw-light text-white">TTL</th>
                            <th class="text-uppercase fw-light text-white">Pekerjaan</th>
                            <th class="text-uppercase fw-light text-white">Alamat</th>
                            <th class="text-end pe-4 text-uppercase fw-light text-white">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($datakeluargas as $i => $datakeluarga)
                            <tr class="hover-glow">
                                <td class="ps-4 text-info fw-bold">{{ $i+1 }}</td>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <div class="icon-circle bg-info-soft me-2">
                                            <i class="fas fa-{{
                                                $datakeluarga->status_hubungan == 'Ayah' ? 'male' :
                                                ($datakeluarga->status_hubungan == 'Ibu' ? 'female' :
                                                ($datakeluarga->status_hubungan == 'Suami' ? 'ring' :
                                                ($datakeluarga->status_hubungan == 'Istri' ? 'ring' : 'user')))
                                            }} text-info"></i>
                                        </div>
                                        <span>{{ $datakeluarga->status_hubungan }}</span>
                                    </div>
                                </td>
                                <td>{{ $datakeluarga->nama_keluarga }}</td>
                                <td>
                                    <div class="d-flex flex-column">
                                        <span>{{ $datakeluarga->tempat_lahir_keluarga }}</span>
                                        <small class="text-white">{{ $datakeluarga->tanggal_lahir_keluarga }}</small>
                                    </div>
                                </td>
                                <td>
                                    <span class="badge bg-dark-4">{{ $datakeluarga->pekerjaan }}</span>
                                </td>
                                <td>
                                    <span class="d-inline-block text-truncate" style="max-width: 150px;"
                                          data-bs-toggle="tooltip" data-bs-placement="top"
                                          title="{{ $datakeluarga->alamat }}">
                                        {{ $datakeluarga->alamat }}
                                    </span>
                                </td>
                                <td class="text-end pe-4">
                                    <div class="d-flex justify-content-end gap-2">
                                        <a href="{{ route('datakeluargas.edit', [Crypt::encryptString($datakeluarga->id)]) }}"
                                           class="btn btn-sm btn-icon btn-outline-primary rounded-circle hover-lift">
                                            <i class="fas fa-pen fs-5"></i>
                                        </a>
                                        {!! Form::open(['method' => 'DELETE', 'route' => ['datakeluargas.destroy', Crypt::encryptString($datakeluarga->id)]]) !!}
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
    .bg-gradient-family {
        background: linear-gradient(135deg, #10b981 0%, #3b82f6 100%);
    }

    /* Tooltip styling */
    .tooltip {
        --bs-tooltip-bg: var(--bg-dark-3);
        --bs-tooltip-color: white;
    }

    /* Responsive adjustments */
    @media (max-width: 992px) {
        .table-responsive {
            overflow-x: auto;
            -webkit-overflow-scrolling: touch;
        }

        .icon-circle {
            width: 28px;
            height: 28px;
            margin-right: 0.5rem;
        }

        .table td, .table th {
            white-space: nowrap;
        }
    }
</style>
