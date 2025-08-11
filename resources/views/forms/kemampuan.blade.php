<div class="tab-pane fade show" id="pills-kemampuan" role="tabpanel" aria-labelledby="pills-account-tab" tabindex="0">
    <div class="card glass-card border-0 rounded-4 overflow-hidden">
        <div class="card-header bg-gradient-skills py-3">
            <div class="d-flex justify-content-between align-items-center">
                <div>
                    <h5 class="mb-0 fw-semibold text-white"><i class="fas fa-star me-2"></i> Kemampuan</h5>
                </div>
                <a href="{{ url('datakemampuans/create') }}" class="btn btn-sm btn-light rounded-pill hover-lift">
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
                            <th class="text-uppercase fw-light text-white">Kemampuan</th>
                            <th class="text-uppercase fw-light text-white">Level</th>
                            <th class="text-end pe-4 text-uppercase fw-light text-white">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($datakemampuans as $i => $datakemampuan)
                            <tr class="hover-glow">
                                <td class="ps-4 text-warning fw-bold">{{ $i+1 }}</td>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <div class="icon-circle bg-warning-soft me-2">
                                            <i class="fas fa-certificate text-warning"></i>
                                        </div>
                                        <span>{{ $datakemampuan->kemampuan }}</span>
                                    </div>
                                </td>
                                <td>
                                    <div class="progress bg-dark-4" style="height: 8px;">
                                        <div class="progress-bar bg-warning"
                                             role="progressbar"
                                             style="width: {{ $datakemampuan->level * 20 }}%"
                                             aria-valuenow="{{ $datakemampuan->level * 20 }}"
                                             aria-valuemin="0"
                                             aria-valuemax="100">
                                        </div>
                                    </div>
                                    <small class="text-warning">{{ str_repeat('★', $datakemampuan->level) }}{{ str_repeat('☆', 5 - $datakemampuan->level) }}</small>
                                </td>
                                <td class="text-end pe-4">
                                    <div class="d-flex justify-content-end gap-2">
                                        <a href="{{ route('datakemampuans.edit', [Crypt::encryptString($datakemampuan->id)]) }}"
                                           class="btn btn-sm btn-icon btn-outline-primary rounded-circle hover-lift">
                                            <i class="fas fa-pen fs-5"></i>
                                        </a>
                                        {!! Form::open(['method' => 'DELETE', 'route' => ['datakemampuans.destroy', Crypt::encryptString($datakemampuan->id)]]) !!}
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
    .bg-gradient-skills {
        background: linear-gradient(135deg, #f59e0b 0%, #f97316 100%);
    }

    .bg-warning-soft {
        background-color: rgba(245, 158, 11, 0.1);
    }

    /* Level indicator styles */
    .progress {
        width: 100px;
        border-radius: 4px;
    }

    .progress-bar {
        border-radius: 4px;
    }

    /* Star rating */
    .text-warning {
        color: #f59e0b !important;
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

    @media (max-width: 992px) {
        .table-responsive {
            overflow-x: auto;
            -webkit-overflow-scrolling: touch;
        }

        .table td, .table th {
            white-space: nowrap;
        }

        .progress {
            width: 80px;
        }
    }
</style>
