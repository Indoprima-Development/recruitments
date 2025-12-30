<style>
    .app-header {
        background: rgba(255, 255, 255, 0.85);
        backdrop-filter: blur(20px);
        -webkit-backdrop-filter: blur(20px);
        border-bottom: 1px solid rgba(255, 255, 255, 0.3);
        box-shadow: 0 4px 30px rgba(0, 0, 0, 0.03);
        position: fixed;
        top: 0;
        width: 100%;
        z-index: 1020;
        transition: all 0.3s ease;
    }

    .navbar-collapse {
        margin-right: 20px;
    }
</style>

<header class="app-header">
    <nav class="navbar navbar-expand-lg navbar-light">
        <ul class="navbar-nav flex-row align-items-center">
            <li class="nav-item d-block d-xl-none">
                <a class="nav-link sidebartoggler nav-icon-hover-bg rounded-circle" id="headerCollapse"
                    href="javascript:void(0)">
                    <i class="ti ti-menu-2"></i>
                </a>
            </li>
        </ul>

        <div class="navbar-collapse justify-content-end px-0" id="navbarNav">
            <ul class="navbar-nav flex-row ms-auto align-items-center justify-content-end">
                <li class="nav-item dropdown">
                    <a class="nav-link pe-0" href="javascript:void(0)" id="drop1" data-bs-toggle="dropdown"
                        aria-expanded="false">
                        <div class="d-flex align-items-center">
                            <div class="user-profile-img">
                                @if (Auth::user()->photo)
                                    <img src="{{ asset(Auth::user()->photo) }}" class="rounded-circle object-fit-cover"
                                        width="35" height="35" alt="" />
                                @else
                                    <div class="rounded-circle bg-primary text-white d-flex align-items-center justify-content-center fw-bold"
                                        style="width: 35px; height: 35px; font-size: 0.9rem;">
                                        {{ substr(Auth::user()->name, 0, 1) }}
                                    </div>
                                @endif
                            </div>
                        </div>
                    </a>
                    <div class="dropdown-menu content-dd dropdown-menu-end dropdown-menu-animate-up"
                        aria-labelledby="drop1">
                        <div class="profile-dropdown position-relative" data-simplebar>
                            <div class="py-3 px-7 pb-0">
                                <h5 class="mb-0 fs-5 fw-semibold">User Profile</h5>
                            </div>
                            <div class="d-flex align-items-center py-9 mx-7 border-bottom">
                                @if (Auth::user()->photo)
                                    <img src="{{ asset(Auth::user()->photo) }}" class="rounded-circle object-fit-cover"
                                        width="80" height="80" alt="" />
                                @else
                                    <div class="rounded-circle bg-primary text-white d-flex align-items-center justify-content-center fw-bold"
                                        style="width: 80px; height: 80px; font-size: 2rem;">
                                        {{ substr(Auth::user()->name, 0, 1) }}
                                    </div>
                                @endif
                                <div class="ms-3">
                                    <h5 class="mb-1 fs-3">{{ Auth::user()->name }}</h5>
                                    <span class="mb-1 d-block text-dark">{{ Auth::user()->role }}</span>
                                    <p class="mb-0 d-flex text-dark align-items-center gap-2">
                                        <i class="ti ti-mail fs-4"></i> {{ Auth::user()->email }}
                                    </p>
                                </div>
                            </div>
                            <div class="message-body">
                                <a href="{{ url('/') }}" class="py-8 px-7 mt-8 d-flex align-items-center">
                                    <span
                                        class="d-flex align-items-center justify-content-center bg-light rounded-1 p-6">
                                        <i class="ti ti-home fs-6 text-primary"></i>
                                    </span>
                                    <div class="w-75 d-inline-block v-middle ps-3">
                                        <h6 class="mb-1 bg-hover-primary fw-semibold">Home</h6>
                                        <span class="d-block text-dark">Go to Landing Page</span>
                                    </div>
                                </a>

                                @if (Auth::user()->role == 'ADMIN')
                                    <a href="{{ url('home') }}" class="py-8 px-7 d-flex align-items-center">
                                        <span
                                            class="d-flex align-items-center justify-content-center bg-light rounded-1 p-6">
                                            <i class="ti ti-layout-dashboard fs-6 text-primary"></i>
                                        </span>
                                        <div class="w-75 d-inline-block v-middle ps-3">
                                            <h6 class="mb-1 bg-hover-primary fw-semibold">Admin Page</h6>
                                            <span class="d-block text-dark">Manage System</span>
                                        </div>
                                    </a>
                                @endif

                                <a href="{{ url('forms') }}" class="py-8 px-7 d-flex align-items-center">
                                    <span
                                        class="d-flex align-items-center justify-content-center bg-light rounded-1 p-6">
                                        <img src="{{ asset('package/dist/images/svgs/icon-account.svg') }}"
                                            alt="" width="24" height="24">
                                    </span>
                                    <div class="w-75 d-inline-block v-middle ps-3">
                                        <h6 class="mb-1 bg-hover-primary fw-semibold">My CV / Profile</h6>
                                        <span class="d-block text-dark">Account Settings</span>
                                    </div>
                                </a>

                                <a href="{{ route('password.change') }}" class="py-8 px-7 d-flex align-items-center">
                                    <span
                                        class="d-flex align-items-center justify-content-center bg-light rounded-1 p-6">
                                        <i class="ti ti-key fs-6 text-primary"></i>
                                    </span>
                                    <div class="w-75 d-inline-block v-middle ps-3">
                                        <h6 class="mb-1 bg-hover-primary fw-semibold">Change Password</h6>
                                        <span class="d-block text-dark">Update Password</span>
                                    </div>
                                </a>
                            </div>
                            <div class="d-grid py-4 px-7 pt-8">
                                <a href="{{ route('logout') }}"
                                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                                    class="btn btn-outline-primary">Log Out</a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </div>
                        </div>
                    </div>
                </li>
            </ul>
        </div>
    </nav>
</header>
