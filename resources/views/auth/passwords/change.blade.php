@extends('layouts.default')

@section('content2')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-6 col-lg-5">
                <div class="card border-0 shadow-lg rounded-4 overflow-hidden"
                    style="background: rgba(255, 255, 255, 0.95); backdrop-filter: blur(10px);">
                    <div class="card-header bg-primary bg-gradient p-4 text-center">
                        <h4 class="mb-0 text-white fw-bold"><i class="ti ti-lock me-2"></i> Ganti Password</h4>
                        <p class="mb-0 text-white-50 small">Amankan akun Anda dengan password baru</p>
                    </div>
                    <div class="card-body p-4 p-md-5">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        <form method="POST" action="{{ route('password.change.update') }}">
                            @csrf

                            <div class="mb-4">
                                <label for="current_password" class="form-label fw-semibold text-dark">Password Saat
                                    Ini</label>
                                <div class="input-group">
                                    <span class="input-group-text bg-light border-end-0 rounded-start-3 ps-3">
                                        <i class="ti ti-key text-muted"></i>
                                    </span>
                                    <input id="current_password" type="password"
                                        class="form-control border-start-0 ps-2 @error('current_password') is-invalid @enderror"
                                        name="current_password" required autocomplete="current-password"
                                        placeholder="Masukkan password lama">
                                    @error('current_password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="mb-4">
                                <label for="new_password" class="form-label fw-semibold text-dark">Password Baru</label>
                                <div class="input-group">
                                    <span class="input-group-text bg-light border-end-0 rounded-start-3 ps-3">
                                        <i class="ti ti-lock text-muted"></i>
                                    </span>
                                    <input id="new_password" type="password"
                                        class="form-control border-start-0 ps-2 @error('new_password') is-invalid @enderror"
                                        name="new_password" required autocomplete="new-password"
                                        placeholder="Minimal 8 karakter">
                                    @error('new_password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="mb-5">
                                <label for="new_password_confirmation" class="form-label fw-semibold text-dark">Konfirmasi
                                    Password Baru</label>
                                <div class="input-group">
                                    <span class="input-group-text bg-light border-end-0 rounded-start-3 ps-3">
                                        <i class="ti ti-lock-check text-muted"></i>
                                    </span>
                                    <input id="new_password_confirmation" type="password"
                                        class="form-control border-start-0 ps-2" name="new_password_confirmation" required
                                        autocomplete="new-password" placeholder="Ulangi password baru">
                                </div>
                            </div>

                            <div class="d-grid gap-2">
                                <button type="submit"
                                    class="btn btn-primary btn-lg rounded-pill fw-bold shadow-sm hover-scale transition-all">
                                    <i class="ti ti-device-floppy me-2"></i> Simpan Password Baru
                                </button>
                                <a href="{{ url()->previous() }}"
                                    class="btn btn-light btn-lg rounded-pill fw-semibold text-muted hover-bg-light mt-2">
                                    Batal
                                </a>
                            </div>
                        </form>
                    </div>
                </div>

                <div class="text-center mt-4">
                    <p class="text-muted small">
                        <i class="ti ti-shield-check text-success me-1"></i>
                        Password Anda dilindungi dengan enkripsi yang aman.
                    </p>
                </div>
            </div>
        </div>
    </div>
@endsection
