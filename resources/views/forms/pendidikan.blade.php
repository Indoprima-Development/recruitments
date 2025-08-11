<div class="tab-pane fade show" id="pills-pendidikan" role="tabpanel" aria-labelledby="pills-account-tab" tabindex="0">
    <!-- Pendidikan Formal Section -->
    <div class="card glass-card border-0 rounded-4 overflow-hidden mb-4">
        <div class="card-header bg-gradient-education py-3">
            <div class="d-flex justify-content-between align-items-center">
                <div>
                    <h5 class="mb-0 fw-semibold text-white"><i class="fas fa-graduation-cap me-2"></i> Pendidikan Formal</h5>
                </div>
                <a href="{{ url('datapendidikanformals/create') }}" class="btn btn-sm btn-light rounded-pill hover-lift">
                    <i class="fas fa-plus me-1"></i> Tambah Pendidikan
                </a>
            </div>
        </div>
        <div class="card-body p-0 bg-dark-2">
            <div class="table-responsive">
                <table class="table table-dark table-hover mb-0 table-borderless">
                    <thead class="bg-dark-3">
                        <tr>
                            <th class="ps-4 text-uppercase fw-light text-white">No</th>
                            <th class="text-uppercase fw-light text-white">Tingkat</th>
                            <th class="text-uppercase fw-light text-white">Instansi</th>
                            <th class="text-uppercase fw-light text-white">Jurusan</th>
                            <th class="text-uppercase fw-light text-white">Lulus</th>
                            <th class="text-uppercase fw-light text-white">Nilai</th>
                            <th class="text-end pe-4 text-uppercase fw-light text-white">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($datapendidikanformals as $no => $datapendidikanformal)
                            <tr class="hover-glow">
                                <td class="ps-4 text-primary fw-bold">{{ $no+1 }}</td>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <div class="icon-circle bg-primary-soft me-3">
                                            <i class="fas fa-{{ $datapendidikanformal->tingkat == 'SD' ? 'school' : ($datapendidikanformal->tingkat == 'SMP' ? 'book-open' : ($datapendidikanformal->tingkat == 'SMA' ? 'university' : 'graduation-cap')) }} text-primary"></i>
                                        </div>
                                        <span>{{ $datapendidikanformal->tingkat }}</span>
                                    </div>
                                </td>
                                <td>{{ $datapendidikanformal->instansi }}</td>
                                <td>{{ $datapendidikanformal->jurusan }}</td>
                                <td>
                                    <span class="badge bg-dark-4">{{ $datapendidikanformal->lulus_tahun }}</span>
                                </td>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <div class="progress bg-dark-4 flex-grow-1 me-2" style="height: 6px;">
                                            <div class="progress-bar bg-{{ $datapendidikanformal->nilai >= 80 ? 'success' : ($datapendidikanformal->nilai >= 60 ? 'warning' : 'danger') }}"
                                                 role="progressbar"
                                                 style="width: {{ $datapendidikanformal->nilai }}%"
                                                 aria-valuenow="{{ $datapendidikanformal->nilai }}"
                                                 aria-valuemin="0"
                                                 aria-valuemax="100">
                                            </div>
                                        </div>
                                        <small class="text-white">{{ $datapendidikanformal->nilai }}</small>
                                    </div>
                                </td>
                                <td class="text-end pe-4">
                                    <div class="d-flex justify-content-end gap-2">
                                        <a href="{{ route('datapendidikanformals.edit', [Crypt::encryptString($datapendidikanformal->id)]) }}"
                                           class="btn btn-sm btn-icon btn-outline-primary rounded-circle hover-lift">
                                            <i class="fas fa-pen fs-5"></i>
                                        </a>
                                        {!! Form::open(['method' => 'DELETE', 'route' => ['datapendidikanformals.destroy', Crypt::encryptString($datapendidikanformal->id)]]) !!}
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

    <!-- Pendidikan Non Formal Section -->
    <div class="card glass-card border-0 rounded-4 overflow-hidden">
        <div class="card-header bg-gradient-workshop py-3">
            <div class="d-flex justify-content-between align-items-center">
                <div>
                    <h5 class="mb-0 fw-semibold text-white"><i class="fas fa-certificate me-2"></i> Pendidikan Non Formal</h5>
                </div>
                <a href="{{ url('datapendidikannonformals/create') }}" class="btn btn-sm btn-light rounded-pill hover-lift">
                    <i class="fas fa-plus me-1"></i> Tambah Pendidikan
                </a>
            </div>
        </div>
        <div class="card-body p-0 bg-dark-2">
            <div class="table-responsive">
                <table class="table table-dark table-hover mb-0 table-borderless">
                    <thead class="bg-dark-3">
                        <tr>
                            <th class="ps-4 text-uppercase fw-light text-white">No</th>
                            <th class="text-uppercase fw-light text-white">Jenis</th>
                            <th class="text-uppercase fw-light text-white">Topik</th>
                            <th class="text-uppercase fw-light text-white">Instansi</th>
                            <th class="text-uppercase fw-light text-white">Periode</th>
                            <th class="text-end pe-4 text-uppercase fw-light text-white">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($datapendidikannonformals as $no => $datapendidikannonformal)
                            <tr class="hover-glow">
                                <td class="ps-4 text-warning fw-bold">{{ $no+1 }}</td>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <div class="icon-circle bg-warning-soft me-3">
                                            <i class="fas fa-{{ $datapendidikannonformal->jenis == 'Workshop' ? 'laptop-code' : 'chalkboard-teacher' }} text-warning"></i>
                                        </div>
                                        <span>{{ $datapendidikannonformal->jenis }}</span>
                                    </div>
                                </td>
                                <td>{{ $datapendidikannonformal->tingkat }}</td>
                                <td>{{ $datapendidikannonformal->instansi }}</td>
                                <td>
                                    <div class="d-flex flex-column">
                                        <small class="text-white">Mulai: {{ $datapendidikannonformal->date_start }}</small>
                                        <small class="text-white">Selesai: {{ $datapendidikannonformal->date_end }}</small>
                                    </div>
                                </td>
                                <td class="text-end pe-4">
                                    <div class="d-flex justify-content-end gap-2">
                                        <a href="{{ route('datapendidikannonformals.edit', [Crypt::encryptString($datapendidikannonformal->id)]) }}"
                                           class="btn btn-sm btn-icon btn-outline-primary rounded-circle hover-lift">
                                            <i class="fas fa-pen fs-5"></i>
                                        </a>
                                        {!! Form::open(['method' => 'DELETE', 'route' => ['datapendidikannonformals.destroy', Crypt::encryptString($datapendidikannonformal->id)]]) !!}
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
    .bg-gradient-education {
        background: linear-gradient(135deg, #6366f1 0%, #8b5cf6 100%);
    }

    .bg-gradient-workshop {
        background: linear-gradient(135deg, #f59e0b 0%, #f97316 100%);
    }

    .bg-warning-soft {
        background-color: rgba(245, 158, 11, 0.1);
    }

    .text-warning {
        color: #f59e0b;
    }

    /* Add these to your existing CSS from previous design */
    .education-timeline {
        position: relative;
        padding-left: 30px;
    }

    .education-timeline::before {
        content: '';
        position: absolute;
        left: 10px;
        top: 0;
        bottom: 0;
        width: 2px;
        background: linear-gradient(to bottom, #3b82f6, #8b5cf6);
    }

    .timeline-item {
        position: relative;
        padding-bottom: 20px;
    }

    .timeline-item::before {
        content: '';
        position: absolute;
        left: -30px;
        top: 5px;
        width: 12px;
        height: 12px;
        border-radius: 50%;
        background: #3b82f6;
        border: 2px solid #1e293b;
    }
</style>
