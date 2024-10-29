<!-- Sidebar Start -->
<aside class="left-sidebar">

    <!-- Sidebar scroll-->
    <div>
        <!-- Sidebar navigation-->
        <nav class="sidebar-nav scroll-sidebar container-fluid">
            <ul id="sidebarnav">
                <!-- ============================= -->
                <!-- Home -->
                <!-- ============================= -->
                <li class="nav-small-cap">
                    <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
                    <span class="hide-menu">Home</span>
                </li>
                <!-- =================== -->
                <!-- Dashboard -->
                <!-- =================== -->
                <li class="sidebar-item">
                    <a class="sidebar-link has-arrow" href="{{url('/')}}" aria-expanded="false">
                        <span>
                            <i class="ti ti-layout-dashboard"></i>
                        </span>
                        <span class="hide-menu">Dashboard</span>
                    </a>
                    <ul aria-expanded="false" class="collapse first-level">
                        <li class="sidebar-item">
                            <a href="{{url('/')}}" class="sidebar-link">
                                <i class="ti ti-helicopter-landing"></i>
                                <span class="hide-menu">Landing Page</span>
                            </a>
                        </li>

                        <li class="sidebar-item">
                            <a href="{{url('home')}}" class="sidebar-link">
                                <i class="ti ti-home"></i>
                                <span class="hide-menu">Home</span>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="nav-small-cap">
                    <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
                    <span class="hide-menu">Job Vacancy</span>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link" href="{{url('vacancies')}}" aria-expanded="false">
                        <span>
                            <i class="ti ti-briefcase"></i>
                        </span>
                        <span class="hide-menu">Job Vacancy</span>
                    </a>
                </li>
                @if(Auth::user()->role == 'ADMIN')
                <li class="nav-small-cap">
                    <i class="ti ti-brand-databricks nav-small-cap-icon fs-4"></i>
                    <span class="hide-menu">Master Data</span>
                </li>

                <li class="sidebar-item">
                    <a class="sidebar-link has-arrow" href="#" aria-expanded="false">
                        <span>
                            <i class="ti ti-database"></i>
                        </span>
                        <span class="hide-menu">Master Data</span>
                    </a>
                    <ul aria-expanded="false" class="collapse first-level">
                        <li class="sidebar-item">
                            <a href="{{url('divisions')}}" class="sidebar-link">
                                <i class="ti ti-building"></i>
                                <span class="hide-menu">Divisi</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a href="{{url('departments')}}" class="sidebar-link">
                                <i class="ti ti-building-skyscraper"></i>
                                <span class="hide-menu">Department</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a href="{{url('sections')}}" class="sidebar-link">
                                <i class="ti ti-building-warehouse"></i>
                                <span class="hide-menu">Sections</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a href="{{url('jobtitles')}}" class="sidebar-link">
                                <i class="ti ti-tool"></i>
                                <span class="hide-menu">Jobtitles</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a href="{{url('education')}}" class="sidebar-link">
                                <i class="ti ti-medal"></i>
                                <span class="hide-menu">Education</span>
                            </a>
                        </li>

                        <li class="sidebar-item">
                            <a href="{{url('majors')}}" class="sidebar-link">
                                <i class="ti ti-medal-2"></i>
                                <span class="hide-menu">Majors</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a href="{{url('locations')}}" class="sidebar-link">
                                <i class="ti ti-map-pin"></i>
                                <span class="hide-menu">Locations</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a href="{{url('fields')}}" class="sidebar-link">
                                <i class="ti ti-radar-2"></i>
                                <span class="hide-menu">Fields</span>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="sidebar-item">
                    <a class="sidebar-link has-arrow" href="#" aria-expanded="false">
                        <span>
                            <i class="ti ti-flask-2"></i>
                        </span>
                        <span class="hide-menu">Master Quiz</span>
                    </a>
                    <ul aria-expanded="false" class="collapse first-level">
                        <li class="sidebar-item">
                            <a href="{{url('projects')}}" class="sidebar-link">
                                <i class="ti ti-brand-dribbble"></i>
                                <span class="hide-menu">Project</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a href="{{url('exams')}}" class="sidebar-link">
                                <i class="ti ti-presentation"></i>
                                <span class="hide-menu">Exam</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a href="{{url('qnas')}}" class="sidebar-link">
                                <i class="ti ti-brand-superhuman"></i>
                                <span class="hide-menu">QnA</span>
                            </a>
                        </li>
                    </ul>
                </li>
                @endif

                <li class="nav-small-cap">
                    <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
                    <span class="hide-menu">Exams</span>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link has-arrow" href="javascript:void(0)" aria-expanded="false">
                        <span>
                            <i class="ti ti-mailbox"></i>
                        </span>
                        <span class="hide-menu">Exams</span>
                    </a>
                    <ul aria-expanded="false" class="collapse first-level">
                        <li class="sidebar-item">
                            <a href="{{url('exam-histories')}}" class="sidebar-link">
                                <i class="ti ti-presentation"></i>
                                <span class="hide-menu">History</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a href="{{url('exam-users')}}" class="sidebar-link">
                                <i class="ti ti-presentation"></i>
                                <span class="hide-menu">Exams</span>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="nav-small-cap">
                    <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
                    <span class="hide-menu">Profile</span>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link has-arrow" href="javascript:void(0)" aria-expanded="false">
                        <span>
                            <i class="ti ti-users"></i>
                        </span>
                        <span class="hide-menu">Account</span>
                    </a>
                    <ul aria-expanded="false" class="collapse first-level">
                        <li class="sidebar-item">
                            <a href="{{url('forms')}}" class="sidebar-link">
                                <i class="ti ti-device-cctv"></i>
                                <span class="hide-menu">CV</span>
                            </a>
                        </li>
                    </ul>
                </li>

                @if(false)
                <!-- ============================= -->
                <!-- PAGES -->
                <!-- ============================= -->
                <li class="nav-small-cap">
                    <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
                    <span class="hide-menu">PAGES</span>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link has-arrow" href="javascript:void(0)" aria-expanded="false">
                        <span>
                            <i class="ti ti-notebook"></i>
                        </span>
                        <span class="hide-menu">Pages</span>
                    </a>
                    <ul aria-expanded="false" class="collapse first-level">
                        <li class="sidebar-item">
                            <a href="page-faq.html" class="sidebar-link">
                                <i class="ti ti-help"></i>
                                <span class="hide-menu">FAQ</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a href="page-account-settings.html" class="sidebar-link">
                                <i class="ti ti-user-circle"></i>
                                <span class="hide-menu">Account Setting</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a href="page-pricing.html" class="sidebar-link">
                                <i class="ti ti-currency-dollar"></i>
                                <span class="hide-menu">Pricing</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a href="widgets-cards.html" class="sidebar-link">
                                <i class="ti ti-cards"></i>
                                <span class="hide-menu">Card</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a href="widgets-banners.html" class="sidebar-link">
                                <i class="ti ti-ad"></i>
                                <span class="hide-menu">Banner</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a href="widgets-charts.html" class="sidebar-link">
                                <i class="ti ti-chart-bar"></i>
                                <span class="hide-menu">Charts</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a href="../../../landingpage/index.html" class="sidebar-link">
                                <i class="ti ti-app-window"></i>
                                <span class="hide-menu">Landing Page</span>
                            </a>
                        </li>
                    </ul>
                </li>
                <!-- ============================= -->
                <!-- UI -->
                <!-- ============================= -->
                <li class="nav-small-cap">
                    <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
                    <span class="hide-menu">UI</span>
                </li>
                <!-- =================== -->
                <!-- UI Elements -->
                <!-- =================== -->
                <li class="sidebar-item mega-dropdown">
                    <a class="sidebar-link has-arrow" href="#" aria-expanded="false">
                        <span class="rounded-3">
                            <i class="ti ti-layout-grid"></i>
                        </span>
                        <span class="hide-menu">UI Elements</span>
                    </a>
                    <ul aria-expanded="false" class="collapse first-level">
                        <li class="sidebar-item">
                            <a href="./ui-accordian.html" class="sidebar-link">
                                <i class="ti ti-circle"></i>
                                <span class="hide-menu">Accordian</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a href="./ui-badge.html" class="sidebar-link">
                                <i class="ti ti-circle"></i>
                                <span class="hide-menu">Badge</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a href="./ui-buttons.html" class="sidebar-link">
                                <i class="ti ti-circle"></i>
                                <span class="hide-menu">Buttons</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a href="./ui-dropdowns.html" class="sidebar-link">
                                <i class="ti ti-circle"></i>
                                <span class="hide-menu">Dropdowns</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a href="./ui-modals.html" class="sidebar-link">
                                <i class="ti ti-circle"></i>
                                <span class="hide-menu">Modals</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a href="./ui-tab.html" class="sidebar-link">
                                <i class="ti ti-circle"></i>
                                <span class="hide-menu">Tab</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a href="./ui-tooltip-popover.html" class="sidebar-link">
                                <i class="ti ti-circle"></i>
                                <span class="hide-menu">Tooltip & Popover</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a href="./ui-notification.html" class="sidebar-link">
                                <i class="ti ti-circle"></i>
                                <span class="hide-menu">Notification</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a href="./ui-progressbar.html" class="sidebar-link">
                                <i class="ti ti-circle"></i>
                                <span class="hide-menu">Progressbar</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a href="./ui-pagination.html" class="sidebar-link">
                                <i class="ti ti-circle"></i>
                                <span class="hide-menu">Pagination</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a href="./ui-typography.html" class="sidebar-link">
                                <i class="ti ti-circle"></i>
                                <span class="hide-menu">Typography</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a href="./ui-bootstrap-ui.html" class="sidebar-link">
                                <i class="ti ti-circle"></i>
                                <span class="hide-menu">Bootstrap UI</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a href="./ui-breadcrumb.html" class="sidebar-link">
                                <i class="ti ti-circle"></i>
                                <span class="hide-menu">Breadcrumb</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a href="./ui-offcanvas.html" class="sidebar-link">
                                <i class="ti ti-circle"></i>
                                <span class="hide-menu">Offcanvas</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a href="./ui-lists.html" class="sidebar-link">
                                <i class="ti ti-circle"></i>
                                <span class="hide-menu">Lists</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a href="./ui-grid.html" class="sidebar-link">
                                <i class="ti ti-circle"></i>
                                <span class="hide-menu">Grid</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a href="./ui-carousel.html" class="sidebar-link">
                                <i class="ti ti-circle"></i>
                                <span class="hide-menu">Carousel</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a href="./ui-scrollspy.html" class="sidebar-link">
                                <i class="ti ti-circle"></i>
                                <span class="hide-menu">Scrollspy</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a href="./ui-spinner.html" class="sidebar-link">
                                <i class="ti ti-circle"></i>
                                <span class="hide-menu">Spinner</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a href="./ui-link.html" class="sidebar-link">
                                <i class="ti ti-circle"></i>
                                <span class="hide-menu">Link</span>
                            </a>
                        </li>
                    </ul>
                </li>
                <!-- ============================= -->
                <!-- Forms -->
                <!-- ============================= -->
                <li class="nav-small-cap">
                    <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
                    <span class="hide-menu">Forms</span>
                </li>
                <!-- =================== -->
                <!-- Forms -->
                <!-- =================== -->
                <li class="sidebar-item">
                    <a class="sidebar-link two-column has-arrow" href="#" aria-expanded="false">
                        <span class="rounded-3">
                            <i class="ti ti-file-text"></i>
                        </span>
                        <span class="hide-menu">Forms</span>
                    </a>
                    <ul aria-expanded="false" class="collapse first-level">
                        <!-- form elements -->
                        <li class="sidebar-item">
                            <a href="./form-inputs.html" class="sidebar-link">
                                <i class="ti ti-circle"></i>
                                <span class="hide-menu">Forms Input</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a href="./form-input-groups.html" class="sidebar-link">
                                <i class="ti ti-circle"></i>
                                <span class="hide-menu">Input Groups</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a href="./form-input-grid.html" class="sidebar-link">
                                <i class="ti ti-circle"></i>
                                <span class="hide-menu">Input Grid</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a href="./form-checkbox-radio.html" class="sidebar-link">
                                <i class="ti ti-circle"></i>
                                <span class="hide-menu">Checkbox & Radios</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a href="./form-bootstrap-touchspin.html" class="sidebar-link">
                                <i class="ti ti-circle"></i>
                                <span class="hide-menu">Bootstrap Touchspin</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a href="./form-bootstrap-switch.html" class="sidebar-link">
                                <i class="ti ti-circle"></i>
                                <span class="hide-menu">Bootstrap Switch</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a href="./form-select2.html" class="sidebar-link">
                                <i class="ti ti-circle"></i>
                                <span class="hide-menu">Select2</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a href="./form-dual-listbox.html" class="sidebar-link">
                                <i class="ti ti-circle"></i>
                                <span class="hide-menu">Dual Listbox</span>
                            </a>
                        </li>
                        <!-- form inputs -->
                        <li class="sidebar-item">
                            <a href="./form-basic.html" class="sidebar-link">
                                <i class="ti ti-circle"></i>
                                <span class="hide-menu">Basic Form</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a href="./form-vertical.html" class="sidebar-link">
                                <i class="ti ti-circle"></i>
                                <span class="hide-menu">Form Vertical</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a href="./form-horizontal.html" class="sidebar-link">
                                <i class="ti ti-circle"></i>
                                <span class="hide-menu">Form Horizontal</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a href="./form-actions.html" class="sidebar-link">
                                <i class="ti ti-circle"></i>
                                <span class="hide-menu">Form Actions</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a href="./form-row-separator.html" class="sidebar-link">
                                <i class="ti ti-circle"></i>
                                <span class="hide-menu">Row Separator</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a href="./form-bordered.html" class="sidebar-link">
                                <i class="ti ti-circle"></i>
                                <span class="hide-menu">Form Bordered</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a href="./form-detail.html" class="sidebar-link">
                                <i class="ti ti-circle"></i>
                                <span class="hide-menu">Form Detail</span>
                            </a>
                        </li>
                        <!-- form wizard -->
                        <li class="sidebar-item">
                            <a href="./form-wizard.html" class="sidebar-link">
                                <i class="ti ti-circle"></i>
                                <span class="hide-menu">Form Wizard</span>
                            </a>
                        </li>
                        <!-- Quill Editor -->
                        <li class="sidebar-item">
                            <a href="./form-editor-quill.html" class="sidebar-link">
                                <i class="ti ti-circle"></i>
                                <span class="hide-menu">Quill Editor</span>
                            </a>
                        </li>
                    </ul>
                </li>
                <!-- ============================= -->
                <!-- Tables -->
                <!-- ============================= -->
                <li class="nav-small-cap">
                    <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
                    <span class="hide-menu">Tables</span>
                </li>
                <!-- =================== -->
                <!-- Bootstrap Table -->
                <!-- =================== -->
                <li class="sidebar-item">
                    <a class="sidebar-link has-arrow" href="#" aria-expanded="false">
                        <span class="rounded-3">
                            <i class="ti ti-layout-sidebar"></i>
                        </span>
                        <span class="hide-menu">Tables</span>
                    </a>
                    <ul aria-expanded="false" class="collapse first-level">
                        <li class="sidebar-item">
                            <a href="./table-basic.html" class="sidebar-link">
                                <i class="ti ti-circle"></i>
                                <span class="hide-menu">Basic Table</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a href="./table-dark-basic.html" class="sidebar-link">
                                <i class="ti ti-circle"></i>
                                <span class="hide-menu">Dark Basic Table</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a href="./table-sizing.html" class="sidebar-link">
                                <i class="ti ti-circle"></i>
                                <span class="hide-menu">Sizing Table</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a href="./table-layout-coloured.html" class="sidebar-link">
                                <i class="ti ti-circle"></i>
                                <span class="hide-menu">Coloured Table</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a href="./table-datatable-basic.html" class="sidebar-link">
                                <i class="ti ti-circle"></i>
                                <span class="hide-menu">Basic Initialisation</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a href="./table-datatable-api.html" class="sidebar-link">
                                <i class="ti ti-circle"></i>
                                <span class="hide-menu">API</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a href="./table-datatable-advanced.html" class="sidebar-link">
                                <i class="ti ti-circle"></i>
                                <span class="hide-menu">Advanced Initialisation</span>
                            </a>
                        </li>
                    </ul>
                </li>
                <!-- ============================= -->
                <!-- Charts -->
                <!-- ============================= -->
                <li class="nav-small-cap">
                    <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
                    <span class="hide-menu">Charts</span>
                </li>
                <!-- ============================= -->
                <!-- Icons -->
                <!-- ============================= -->
                <li class="nav-small-cap">
                    <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
                    <span class="hide-menu">Icons</span>
                </li>
                <!-- =================== -->
                <!-- Tabler Icon -->
                <!-- =================== -->
                <li class="sidebar-item">
                    <a class="sidebar-link sidebar-link" href="./icon-tabler.html" aria-expanded="false">
                        <span class="rounded-3">
                            <i class="ti ti-archive"></i>
                        </span>
                        <span class="hide-menu">Tabler Icon</span>
                    </a>
                </li>
                @endif
            </ul>
            <div class="unlimited-access hide-menu bg-light-primary position-relative my-7 rounded d-block d-lg-none">
                <div class="d-flex">
                    <div class="unlimited-access-title">
                        <h6 class="fw-semibold fs-4 mb-6 text-dark w-85">Unlimited Access</h6>
                        <button class="btn btn-primary fs-2 fw-semibold lh-sm">Signup</button>
                    </div>
                    <div class="unlimited-access-img">
                        <img src="{{asset('package/dist/images/backgrounds/rocket.png')}}" alt="" class="img-fluid">
                    </div>
                </div>
            </div>
        </nav>
        <!-- End Sidebar navigation -->
    </div>
    <!-- End Sidebar scroll-->


    <div class="fixed-profile p-3 bg-light-secondary rounded sidebar-ad mt-3 mx-9 d-block d-lg-none">
        <div class="hstack gap-3 justify-content-between">
            <div class="john-img">
                <img src="{{asset('package/dist/images/profile/user-1.jpg')}}" class="rounded-circle" width="42" height="42" alt="">
            </div>
            <div class="john-title">
                <h6 class="mb-0 fs-4">John Doe</h6>
                <span class="fs-2">Designer</span>
            </div>
            <button class="border-0 bg-transparent text-primary ms-2" tabindex="0" type="button" aria-label="logout" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="logout">
                <i class="ti ti-power fs-6"></i>
            </button>
        </div>
    </div>
</aside>
<!-- Sidebar End -->
