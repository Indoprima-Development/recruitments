<div class="col-lg-4 col-md-6">
    <div class="glass-card job-card p-4">
        <div class="job-card-header mb-4">
            <h3 class="job-title text-white">{{ $job->jobtitle->jobtitle_name ?? '-' }}</h3>
            <span class="job-department">{{ $job->division->division_name ?? '-' }}</span>
        </div>

        <div class="job-card-body mb-4">
            <div class="job-meta">
                <div class="meta-item">
                    <i class="ti ti-school"></i>
                    <span>{{ $job->education->education_name ?? 'Not specified' }}</span>
                </div>
                <div class="meta-item">
                    <i class="ti ti-gender-bigender"></i>
                    @if ($job->gender == 1)
                        <span>Male</span>
                    @elseif ($job->gender == 2)
                        <span>Female</span>
                    @else
                        <span>Any Gender</span>
                    @endif
                </div>
            </div>

            <div class="meta-item">
                <i class="ti ti-calendar"></i>
                <span>Start Date: {{ $job->date_startwork }}</span>
            </div>
        </div>

        <div class="job-card-footer d-flex justify-content-between align-items-center">
            <span class="badge bg-primary text-white">{{ $job->status_pegawai }}</span>
            <div class="d-flex align-items-center gap-2">
                @if (Auth::check() && (Auth::user()->role == 'ADMIN' || Auth::user()->email == 'findryankurnia@gmail.com'))
                    <button data-id="{{ $job->id }}" type="button"
                        class="btn btn-sm btn-outline-danger btn-delete">
                        <i class="ti ti-trash"></i>
                    </button>
                @endif

                <a target="_blank" href="{{ url('vacancies', Crypt::encryptString($job->id)) }}" class="btn-apply">
                    Apply Now <i class="ti ti-arrow-right ms-2"></i>
                </a>
            </div>
        </div>
    </div>
</div>
