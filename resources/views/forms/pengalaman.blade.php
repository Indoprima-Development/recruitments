<div class="tab-pane fade show" id="pills-pengalaman" role="tabpanel" aria-labelledby="pills-account-tab" tabindex="0">
    <div class="card glass-card border-0 rounded-4 overflow-hidden">
        <div class="card-header bg-gradient-experience py-3">
            <div class="d-flex justify-content-between align-items-center">
                <div>
                    <h5 class="mb-0 fw-semibold text-white"><i class="fas fa-briefcase me-2"></i> Pengalaman Kerja</h5>
                </div>
                <a href="{{ url('datapengalamankerjas/create') }}" class="btn btn-sm btn-light rounded-pill hover-lift">
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
                            <th class="text-uppercase fw-light text-white">Instansi</th>
                            <th class="text-uppercase fw-light text-white">Jabatan</th>
                            <th class="text-uppercase fw-light text-white">Gaji</th>
                            <th class="text-uppercase fw-light text-white">Periode</th>
                            <th class="text-uppercase fw-light text-white">Alasan Keluar</th>
                            <th class="text-uppercase fw-light text-white">Surat</th>
                            <th class="text-end pe-4 text-uppercase fw-light text-white">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($datapengalamankerjas as $no => $datapengalamankerja)
                            <tr class="hover-glow">
                                <td class="ps-4 text-info fw-bold">{{ $no + 1 }}</td>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <div class="icon-circle bg-purple-soft me-2">
                                            <i class="fas fa-building text-purple"></i>
                                        </div>
                                        <span>{{ $datapengalamankerja->perusahaan }}</span>
                                    </div>
                                </td>
                                <td>
                                    <div class="d-flex flex-column">
                                        <small class="text-white-50">Awal: {{ $datapengalamankerja->jabatan_awal }}</small>
                                        <span class="text-white">Akhir: {{ $datapengalamankerja->jabatan_terakhir }}</span>
                                    </div>
                                </td>
                                <td>
                                    <div class="d-flex flex-column">
                                        <small class="text-white-50">{{ FormatNumberWithDots($datapengalamankerja->gaji_awal) }}</small>
                                        <span class="text-white">{{ FormatNumberWithDots($datapengalamankerja->gaji_akhir) }}</span>
                                    </div>
                                </td>
                                <td>
                                    <div class="d-flex flex-column">
                                        <small class="text-white-50">{{ $datapengalamankerja->date_start }}</small>
                                        <span class="text-white">{{ $datapengalamankerja->date_end }}</span>
                                    </div>
                                </td>
                                <td>
                                    <span class="d-inline-block text-truncate" style="max-width: 150px;"
                                          data-bs-toggle="tooltip" data-bs-placement="top"
                                          title="{{ $datapengalamankerja->alasan_keluar }}">
                                        {{ $datapengalamankerja->alasan_keluar }}
                                    </span>
                                </td>
                                <td>
                                    @if ($datapengalamankerja->surat_pengalaman != '-')
                                        <a class="btn btn-sm btn-outline-success rounded-circle hover-lift" target="_blank"
                                            href="{{ url($datapengalamankerja->surat_pengalaman) }}">
                                            <i class="fas fa-file"></i>
                                        </a>
                                    @else
                                        <span class="text-white-50">-</span>
                                    @endif
                                </td>
                                <td class="text-end pe-4">
                                    <div class="d-flex justify-content-end gap-2">
                                        <a href="{{ route('datapengalamankerjas.edit', [Crypt::encryptString($datapengalamankerja->id)]) }}"
                                           class="btn btn-sm btn-icon btn-outline-primary rounded-circle hover-lift">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        {!! Form::open(['method' => 'DELETE', 'route' => ['datapengalamankerjas.destroy', Crypt::encryptString($datapengalamankerja->id)]]) !!}
                                        <button type="submit" class="btn btn-sm btn-icon btn-outline-danger rounded-circle hover-lift">
                                            <i class="fas fa-trash"></i>
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
    .bg-gradient-experience {
        background: linear-gradient(135deg, #8b5cf6 0%, #6366f1 100%);
    }

    .bg-purple-soft {
        background-color: rgba(139, 92, 246, 0.1);
    }

    .text-purple {
        color: #8b5cf6;
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
    }
</style>
