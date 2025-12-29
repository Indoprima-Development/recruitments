<!-- Sidebar Start -->
<aside class="left-sidebar">
    <!-- Sidebar scroll-->
    <div>
        <div class="brand-logo d-flex align-items-center justify-content-between p-4">
            <a href="{{ url('/') }}" class="text-nowrap logo-img">
                <img src="{{ asset('photo/white-logo.png') }}" width="180" alt="" />
            </a>
        </div>
        <!-- Sidebar navigation-->
        <nav class="sidebar-nav scroll-sidebar" data-simplebar="">
            <ul id="sidebarnav">

                <!-- Home -->
                <li class="nav-small-cap">
                    <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
                    <span class="hide-menu">Home</span>
                </li>

                <li class="sidebar-item">
                    <a class="sidebar-link" href="{{ url('/') }}" aria-expanded="false">
                        <span><i class="ti ti-world"></i></span>
                        <span class="hide-menu">Public Site</span>
                    </a>
                </li>

                @if (Auth::check())
                    <li class="sidebar-item">
                        <a class="sidebar-link" href="{{ url('dashboard') }}" aria-expanded="false">
                            <span><i class="ti ti-layout-dashboard"></i></span>
                            <span class="hide-menu">Dashboard User</span>
                        </a>
                    </li>

                    @if (Auth::user()->role == 'ADMIN')
                        <li class="sidebar-item">
                            <a class="sidebar-link" href="{{ url('home') }}" aria-expanded="false">
                                <span><i class="ti ti-chart-pie"></i></span>
                                <span class="hide-menu">Dashboard Admin</span>
                            </a>
                        </li>

                        <li class="sidebar-item">
                            <a class="sidebar-link" href="{{ route('analytics.index') }}" aria-expanded="false">
                                <span><i class="ti ti-chart-bar"></i></span>
                                <span class="hide-menu">Talent Analytics</span>
                            </a>
                        </li>

                        <li class="sidebar-item">
                            <a class="sidebar-link" href="{{ url('vacancies') }}" aria-expanded="false">
                                <span><i class="ti ti-briefcase"></i></span>
                                <span class="hide-menu">Manage Vacancies</span>
                            </a>
                        </li>

                        <!-- Master Data -->
                        <li class="nav-small-cap">
                            <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
                            <span class="hide-menu">Master Data</span>
                        </li>

                        <li class="sidebar-item">
                            <a class="sidebar-link has-arrow" href="javascript:void(0)" aria-expanded="false">
                                <span><i class="ti ti-database"></i></span>
                                <span class="hide-menu">Organization</span>
                            </a>
                            <ul aria-expanded="false" class="collapse first-level">
                                <li class="sidebar-item">
                                    <a href="{{ url('divisions') }}" class="sidebar-link">
                                        <div class="round-16 d-flex align-items-center justify-content-center">
                                            <i class="ti ti-circle"></i>
                                        </div>
                                        <span class="hide-menu">Divisions</span>
                                    </a>
                                </li>
                                <li class="sidebar-item">
                                    <a href="{{ url('departments') }}" class="sidebar-link">
                                        <div class="round-16 d-flex align-items-center justify-content-center">
                                            <i class="ti ti-circle"></i>
                                        </div>
                                        <span class="hide-menu">Departments</span>
                                    </a>
                                </li>
                                <li class="sidebar-item">
                                    <a href="{{ url('sections') }}" class="sidebar-link">
                                        <div class="round-16 d-flex align-items-center justify-content-center">
                                            <i class="ti ti-circle"></i>
                                        </div>
                                        <span class="hide-menu">Sections</span>
                                    </a>
                                </li>
                                <li class="sidebar-item">
                                    <a href="{{ url('jobtitles') }}" class="sidebar-link">
                                        <div class="round-16 d-flex align-items-center justify-content-center">
                                            <i class="ti ti-circle"></i>
                                        </div>
                                        <span class="hide-menu">Job Titles</span>
                                    </a>
                                </li>
                                <li class="sidebar-item">
                                    <a href="{{ url('locations') }}" class="sidebar-link">
                                        <div class="round-16 d-flex align-items-center justify-content-center">
                                            <i class="ti ti-circle"></i>
                                        </div>
                                        <span class="hide-menu">Locations</span>
                                    </a>
                                </li>
                            </ul>
                        </li>

                        <li class="sidebar-item">
                            <a class="sidebar-link has-arrow" href="javascript:void(0)" aria-expanded="false">
                                <span><i class="ti ti-school"></i></span>
                                <span class="hide-menu">Education & Skills</span>
                            </a>
                            <ul aria-expanded="false" class="collapse first-level">
                                <li class="sidebar-item">
                                    <a href="{{ url('education') }}" class="sidebar-link">
                                        <div class="round-16 d-flex align-items-center justify-content-center">
                                            <i class="ti ti-circle"></i>
                                        </div>
                                        <span class="hide-menu">Education Levels</span>
                                    </a>
                                </li>
                                <li class="sidebar-item">
                                    <a href="{{ url('majors') }}" class="sidebar-link">
                                        <div class="round-16 d-flex align-items-center justify-content-center">
                                            <i class="ti ti-circle"></i>
                                        </div>
                                        <span class="hide-menu">Majors</span>
                                    </a>
                                </li>
                                <li class="sidebar-item">
                                    <a href="{{ url('fields') }}" class="sidebar-link">
                                        <div class="round-16 d-flex align-items-center justify-content-center">
                                            <i class="ti ti-circle"></i>
                                        </div>
                                        <span class="hide-menu">Fields (Exp.)</span>
                                    </a>
                                </li>
                            </ul>
                        </li>

                        <!-- Recruitment -->
                        <li class="nav-small-cap">
                            <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
                            <span class="hide-menu">Recruitment</span>
                        </li>

                        <li class="sidebar-item">
                            <a class="sidebar-link" href="{{ route('ptkforms.index') }}" aria-expanded="false">
                                <span><i class="ti ti-file-description"></i></span>
                                <span class="hide-menu">PTK Forms (Manage)</span>
                            </a>
                        </li>

                        <li class="sidebar-item">
                            <a class="sidebar-link" href="{{ url('vacancies') }}" aria-expanded="false">
                                <span><i class="ti ti-briefcase"></i></span>
                                <span class="hide-menu">Job Vacancies</span>
                            </a>
                        </li>

                        <li class="sidebar-item">
                            <a class="sidebar-link has-arrow" href="javascript:void(0)" aria-expanded="false">
                                <span><i class="ti ti-clipboard-list"></i></span>
                                <span class="hide-menu">Assessments</span>
                            </a>
                            <ul aria-expanded="false" class="collapse first-level">
                                <li class="sidebar-item">
                                    <a href="{{ url('projects') }}" class="sidebar-link">
                                        <div class="round-16 d-flex align-items-center justify-content-center">
                                            <i class="ti ti-circle"></i>
                                        </div>
                                        <span class="hide-menu">Projects</span>
                                    </a>
                                </li>
                                <li class="sidebar-item">
                                    <a href="{{ url('exams') }}" class="sidebar-link">
                                        <div class="round-16 d-flex align-items-center justify-content-center">
                                            <i class="ti ti-circle"></i>
                                        </div>
                                        <span class="hide-menu">Exams</span>
                                    </a>
                                </li>
                                <li class="sidebar-item">
                                    <a href="{{ url('qnas') }}" class="sidebar-link">
                                        <div class="round-16 d-flex align-items-center justify-content-center">
                                            <i class="ti ti-circle"></i>
                                        </div>
                                        <span class="hide-menu">QnA Bank</span>
                                    </a>
                                </li>
                            </ul>
                        </li>

                        <!-- History -->
                        <li class="nav-small-cap">
                            <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
                            <span class="hide-menu">Reports & History</span>
                        </li>

                        <li class="sidebar-item">
                            <a class="sidebar-link" href="{{ url('exam-histories') }}" aria-expanded="false">
                                <span><i class="ti ti-history"></i></span>
                                <span class="hide-menu">Exam History</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link" href="{{ url('exam-users') }}" aria-expanded="false">
                                <span><i class="ti ti-users"></i></span>
                                <span class="hide-menu">User Accounts</span>
                            </a>
                        </li>
                    @endif

                    <!-- User Features (Available to all logged in) -->
                    <li class="nav-small-cap">
                        <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
                        <span class="hide-menu">My Profile</span>
                    </li>
                    <li class="sidebar-item">
                        <a class="sidebar-link" href="{{ url('forms') }}" aria-expanded="false">
                            <span><i class="ti ti-user-circle"></i></span>
                            <span class="hide-menu">My CV / Profile</span>
                        </a>
                    </li>
                    <li class="sidebar-item mb-5">
                        <a class="sidebar-link" href="{{ route('logout') }}"
                            onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            <span><i class="ti ti-logout"></i></span>
                            <span class="hide-menu">Logout</span>
                        </a>
                    </li>
                @else
                    <li class="nav-small-cap">
                        <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
                        <span class="hide-menu">Authentication</span>
                    </li>
                    <li class="sidebar-item">
                        <a class="sidebar-link" href="{{ url('auth/login') }}" aria-expanded="false">
                            <span><i class="ti ti-login"></i></span>
                            <span class="hide-menu">Login</span>
                        </a>
                    </li>
                    <li class="sidebar-item">
                        <a class="sidebar-link" href="{{ url('auth/register') }}" aria-expanded="false">
                            <span><i class="ti ti-user-plus"></i></span>
                            <span class="hide-menu">Register</span>
                        </a>
                    </li>
                @endif
            </ul>
        </nav>
        <!-- End Sidebar navigation -->
    </div>
    <!-- End Sidebar scroll-->
</aside>
<!-- Sidebar End -->
