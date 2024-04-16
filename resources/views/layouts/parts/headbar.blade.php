<!-- Header Start -->
<header class="app-header">
    <nav class="navbar navbar-expand-xl navbar-light container-fluid px-0">
        <ul class="navbar-nav">
            <li class="nav-item d-block d-xl-none">
                <a class="nav-link sidebartoggler ms-n3" id="sidebarCollapse" href="javascript:void(0)">
                    <i class="ti ti-menu-2"></i>
                </a>
            </li>
            <li class="nav-item d-none d-xl-block">
                <a href="{{url('/')}}" class="text-nowrap nav-link">
                    <img src="{{asset('package/dist/images/logos/logo.png')}}" class="dark-logo" width="300" alt="" />
                    <img src="{{asset('package/dist/images/logos/logo.png')}}" class="light-logo" width="300" alt="" />
                </a>
            </li>
        </ul>
        @if(Auth::user()->role == 'admin')
        <ul class="navbar-nav quick-links d-none d-xl-flex">
            <li class="nav-item dropdown hover-dd d-none d-xl-block">
                <a class="nav-link" href="javascript:void(0)" data-bs-toggle="dropdown">Apps<span class="mt-1"><i class="ti ti-chevron-down"></i></span></a>
                <div class="dropdown-menu dropdown-menu-nav dropdown-menu-animate-up py-0">
                    <div class="row">
                        <div class="col-8">
                            <div class=" ps-7 pt-7">
                                <div class="border-bottom">
                                    <div class="row">
                                        <div class="col-6">
                                            <div class="position-relative">
                                                <a href="{{url('projects')}}" class="d-flex align-items-center pb-9 position-relative    ">
                                                    <div class="bg-light rounded-1 me-3 p-6 d-flex align-items-center justify-content-center">
                                                        <img src="{{asset('package/dist/images/svgs/icon-dd-chat.svg')}}" alt="" class="img-fluid" width="24" height="24">
                                                    </div>
                                                    <div class="d-inline-block">
                                                        <h6 class="mb-1 fw-semibold bg-hover-primary">Projects</h6>
                                                        <span class="fs-2 d-block text-dark">Manage all projects</span>
                                                    </div>
                                                </a>
                                                <a href="{{url('exams')}}" class="d-flex align-items-center pb-9 position-relative    ">
                                                    <div class="bg-light rounded-1 me-3 p-6 d-flex align-items-center justify-content-center">
                                                        <img src="{{asset('package/dist/images/svgs/icon-dd-invoice.svg')}}" alt="" class="img-fluid" width="24" height="24">
                                                    </div>
                                                    <div class="d-inline-block">
                                                        <h6 class="mb-1 fw-semibold bg-hover-primary">Exams</h6>
                                                        <span class="fs-2 d-block text-dark">Manage all exams</span>
                                                    </div>
                                                </a>
                                                <a href="{{url('qnas')}}" class="d-flex align-items-center pb-9 position-relative    ">
                                                    <div class="bg-light rounded-1 me-3 p-6 d-flex align-items-center justify-content-center">
                                                        <img src="{{asset('package/dist/images/svgs/icon-dd-mobile.svg')}}" alt="" class="img-fluid" width="24" height="24">
                                                    </div>
                                                    <div class="d-inline-block">
                                                        <h6 class="mb-1 fw-semibold bg-hover-primary">QnA</h6>
                                                        <span class="fs-2 d-block text-dark">Manage all QnA</span>
                                                    </div>
                                                </a>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="position-relative">
                                                <a href="./app-contact.html" class="d-flex align-items-center pb-9 position-relative    ">
                                                    <div class="bg-light rounded-1 me-3 p-6 d-flex align-items-center justify-content-center">
                                                        <img src="{{asset('package/dist/images/svgs/icon-dd-lifebuoy.svg')}}" alt="" class="img-fluid" width="24" height="24">
                                                    </div>
                                                    <div class="d-inline-block">
                                                        <h6 class="mb-1 fw-semibold bg-hover-primary">Users</h6>
                                                        <span class="fs-2 d-block text-dark">Add new contact</span>
                                                    </div>
                                                </a>
                                                <a href="./app-notes.html" class="d-flex align-items-center pb-9 position-relative    ">
                                                    <div class="bg-light rounded-1 me-3 p-6 d-flex align-items-center justify-content-center">
                                                        <img src="{{asset('package/dist/images/svgs/icon-dd-application.svg')}}" alt="" class="img-fluid" width="24" height="24">
                                                    </div>
                                                    <div class="d-inline-block">
                                                        <h6 class="mb-1 fw-semibold bg-hover-primary">Activity Log</h6>
                                                        <span class="fs-2 d-block text-dark">To-do and Daily tasks</span>
                                                    </div>
                                                </a>

                                                <a href="{{url('ranks')}}" class="d-flex align-items-center pb-9 position-relative    ">
                                                    <div class="bg-light rounded-1 me-3 p-6 d-flex align-items-center justify-content-center">
                                                        <img src="{{asset('package/dist/images/svgs/icon-dd-message-box.svg')}}" alt="" class="img-fluid" width="24" height="24">
                                                    </div>
                                                    <div class="d-inline-block">
                                                        <h6 class="mb-1 fw-semibold bg-hover-primary">Rank Detail</h6>
                                                        <span class="fs-2 d-block text-dark">Get new emails</span>
                                                    </div>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row align-items-center py-3">
                                    <div class="col-8">
                                        <a class="fw-semibold text-dark d-flex align-items-center lh-1 " href="#"><i class="ti ti-help fs-6 me-2"></i>Frequently Asked Questions</a>
                                    </div>
                                    <div class="col-4">
                                        <div class="d-flex justify-content-end pe-4">
                                            <button class="btn btn-primary">Check</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-4 ms-n4">
                            <div class="position-relative p-7 border-start h-100">
                                <h5 class="fs-5 mb-9 fw-semibold">Transaction</h5>
                                <ul class="">
                                    <li class="mb-3">
                                        <a class="fw-semibold text-dark bg-hover-primary    " href="./page-pricing.html">Project Transaction</a>
                                    </li>
                                    <li class="mb-3">
                                        <a class="fw-semibold text-dark bg-hover-primary    " href="./authentication-login.html">Exam Transaction</a>
                                    </li>
                                    <li class="mb-3">
                                        <a class="fw-semibold text-dark bg-hover-primary    " href="./authentication-register.html">QnA Transaction</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </li>
            @if(false)
            <li class="nav-item dropdown-hover d-none d-xl-block">
                <a class="nav-link" href="app-chat.html">Chat</a>
            </li>
            <li class="nav-item dropdown-hover d-none d-xl-block">
                <a class="nav-link" href="app-calendar.html">Calendar</a>
            </li>
            <li class="nav-item dropdown-hover d-none d-xl-block">
                <a class="nav-link" href="app-email.html">Email</a>
            </li>
            @endif
        </ul>
        @endif
        <div class="d-block d-xl-none">
            <a href="{{url('/')}}" class="text-nowrap nav-link">
                <img src="{{asset('package/dist/images/logos/logo.png')}}" width="300" alt="" />
            </a>
        </div>
        <button class="navbar-toggler p-0 border-0" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="p-2">
                <i class="ti ti-dots fs-7"></i>
            </span>
        </button>
        <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
            <div class="d-flex align-items-center justify-content-between px-0 px-xl-8">
                <a href="javascript:void(0)" class="nav-link round-40 p-1 ps-0 d-flex d-xl-none align-items-center justify-content-center" type="button" data-bs-toggle="offcanvas" data-bs-target="#mobilenavbar" aria-controls="offcanvasWithBothOptions">
                    <i class="ti ti-align-justified fs-7"></i>
                </a>
                <ul class="navbar-nav flex-row ms-auto align-items-center justify-content-center">
                    <li class="nav-item dropdown">
                        <a class="nav-link pe-0" href="javascript:void(0)" id="drop1" data-bs-toggle="dropdown" aria-expanded="false">
                            <div class="d-flex align-items-center">
                                <div class="user-profile-img">
                                    <img src="{{asset('package/dist/images/profile/user-1.jpg')}}" class="rounded-circle" width="35" height="35" alt="" />
                                </div>
                            </div>
                        </a>

                        <div class="dropdown-menu content-dd dropdown-menu-end dropdown-menu-animate-up" aria-labelledby="drop1">
                            <div class="profile-dropdown position-relative" data-simplebar>
                                <div class="py-3 px-7 pb-0">
                                    <h5 class="mb-0 fs-5 fw-semibold">User Profile</h5>
                                </div>
                                <div class="d-flex align-items-center py-9 mx-7 border-bottom">
                                    <img src="{{asset('package/dist/images/profile/user-1.jpg')}}" class="rounded-circle" width="80" height="80" alt="" />
                                    <div class="ms-3">
                                        <h5 class="mb-1 fs-3">{{Auth::user()->name}}</h5>
                                        <span class="mb-1 d-block text-dark">{{Auth::user()->ktp}}</span>
                                        <p class="mb-0 d-flex text-dark align-items-center gap-2">
                                            <i class="ti ti-mail fs-4"></i> {{Auth::user()->nohp}}
                                        </p>
                                    </div>
                                </div>
                                @if(false)
                                <div class="message-body">
                                    <a href="./page-user-profile.html" class="py-8 px-7 mt-8 d-flex align-items-center">
                                        <span class="d-flex align-items-center justify-content-center bg-light rounded-1 p-6">
                                            <img src="{{asset('package/dist/images/svgs/icon-account.svg')}}" alt="" width="24" height="24">
                                        </span>
                                        <div class="w-75 d-inline-block v-middle ps-3">
                                            <h6 class="mb-1 bg-hover-primary fw-semibold"> My Profile </h6>
                                            <span class="d-block text-dark">Account Settings</span>
                                        </div>
                                    </a>
                                    <a href="./app-email.html" class="py-8 px-7 d-flex align-items-center">
                                        <span class="d-flex align-items-center justify-content-center bg-light rounded-1 p-6">
                                            <img src="{{asset('package/dist/images/svgs/icon-inbox.svg')}}" alt="" width="24" height="24">
                                        </span>
                                        <div class="w-75 d-inline-block v-middle ps-3">
                                            <h6 class="mb-1 bg-hover-primary fw-semibold">My Inbox</h6>
                                            <span class="d-block text-dark">Messages & Emails</span>
                                        </div>
                                    </a>
                                    <a href="./app-notes.html" class="py-8 px-7 d-flex align-items-center">
                                        <span class="d-flex align-items-center justify-content-center bg-light rounded-1 p-6">
                                            <img src="{{asset('package/dist/images/svgs/icon-tasks.svg')}}" alt="" width="24" height="24">
                                        </span>
                                        <div class="w-75 d-inline-block v-middle ps-3">
                                            <h6 class="mb-1 bg-hover-primary fw-semibold">My Task</h6>
                                            <span class="d-block text-dark">To-do and Daily Tasks</span>
                                        </div>
                                    </a>
                                </div>
                                @endif
                                <div class="d-grid py-4 px-7 pt-8">
                                    <a class="btn btn-outline-primary" href="{{ route('logout') }}" onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();"><i class="dropdown-item-icon mdi mdi-power text-primary me-2"></i>Sign Out</a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST">
                                        @csrf
                                    </form>
                                </div>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</header>
<!-- Header End -->