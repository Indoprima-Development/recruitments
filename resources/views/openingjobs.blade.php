<!DOCTYPE html>
<html lang="en">

<head>
    <!-- --------------------------------------------------- -->
    <!-- Title -->
    <!-- --------------------------------------------------- -->
    <title>Recruitment</title>

    <!-- --------------------------------------------------- -->
    <!-- Required Meta Tag -->
    <!-- --------------------------------------------------- -->
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="handheldfriendly" content="true" />
    <meta name="MobileOptimized" content="width" />
    <meta name="description" content="Mordenize" />
    <meta name="author" content="" />
    <meta name="keywords" content="Mordenize" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />

    <!-- --------------------------------------------------- -->
    <!-- Favicon -->
    <!-- --------------------------------------------------- -->
    <link rel="shortcut icon" type="image/png" href="{{ asset('package/dist/images/logos/favicon.ico') }}" />

    <!-- --------------------------------------------------- -->
    <!-- Owl Carousel -->
    <!-- --------------------------------------------------- -->
    <link rel="stylesheet" href="{{ asset('package/dist/libs/owl.carousel/dist/assets/owl.carousel.min.css') }}">

    <!-- --------------------------------------------------- -->
    <!-- Prism Js -->
    <!-- --------------------------------------------------- -->
    <link rel="stylesheet" href="{{ asset('package/dist/libs/prismjs/themes/prism-okaidia.min.css') }}">

    <!-- --------------------------------------------------- -->
    <!-- Core Css -->
    <!-- --------------------------------------------------- -->

    <link id="themeColors" rel="stylesheet" href="{{ asset('package/dist/css/style.min.css') }}" />
</head>

<body>
    <!-- --------------------------------------------------- -->
    <!-- Body Wrapper -->
    <!-- --------------------------------------------------- -->
    <div class="page-wrapper" id="main-wrapper" data-layout="horizontal" data-navbarbg="skin6" data-sidebartype="full"
        data-sidebar-position="fixed" data-header-position="fixed">
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
                        <a href="index.html" class="text-nowrap nav-link">
                            <img src="{{ asset('package/dist/images/logos/dark-logo.svg') }}" class="dark-logo"
                                width="180" alt="" />
                            <img src="{{ asset('package/dist/images/logos/light-logo.svg') }}" class="light-logo"
                                width="180" alt="" />
                        </a>
                    </li>
                    <li class="nav-item d-none d-xl-block">
                        <a class="nav-link nav-icon-hover" href="javascript:void(0)" data-bs-toggle="modal"
                            data-bs-target="#exampleModal">
                            <i class="ti ti-search"></i>
                        </a>
                    </li>
                </ul>
                <ul class="navbar-nav quick-links d-none d-xl-flex">
                    <li class="nav-item dropdown hover-dd d-none d-xl-block">
                        <a class="nav-link" href="javascript:void(0)" data-bs-toggle="dropdown">Apps<span
                                class="mt-1"><i class="ti ti-chevron-down"></i></span></a>
                        <div class="dropdown-menu dropdown-menu-nav dropdown-menu-animate-up py-0">
                            <div class="row">
                                <div class="col-8">
                                    <div class=" ps-7 pt-7">
                                        <div class="border-bottom">
                                            <div class="row">
                                                <div class="col-6">
                                                    <div class="position-relative">
                                                        <a href="./app-chat.html"
                                                            class="d-flex align-items-center pb-9 position-relative    ">
                                                            <div
                                                                class="bg-light rounded-1 me-3 p-6 d-flex align-items-center justify-content-center">
                                                                <img src="{{ asset('package/dist/images/svgs/icon-dd-chat.svg') }}"
                                                                    alt="" class="img-fluid" width="24"
                                                                    height="24">
                                                            </div>
                                                            <div class="d-inline-block">
                                                                <h6 class="mb-1 fw-semibold bg-hover-primary">Chat
                                                                    Application</h6>
                                                                <span class="fs-2 d-block text-dark">New messages
                                                                    arrived</span>
                                                            </div>
                                                        </a>
                                                        <a href="./app-invoice.html"
                                                            class="d-flex align-items-center pb-9 position-relative    ">
                                                            <div
                                                                class="bg-light rounded-1 me-3 p-6 d-flex align-items-center justify-content-center">
                                                                <img src="{{ asset('package/dist/images/svgs/icon-dd-invoice.svg') }}"
                                                                    alt="" class="img-fluid" width="24"
                                                                    height="24">
                                                            </div>
                                                            <div class="d-inline-block">
                                                                <h6 class="mb-1 fw-semibold bg-hover-primary">Invoice
                                                                    App</h6>
                                                                <span class="fs-2 d-block text-dark">Get latest
                                                                    invoice</span>
                                                            </div>
                                                        </a>
                                                        <a href="./app-contact2.html"
                                                            class="d-flex align-items-center pb-9 position-relative    ">
                                                            <div
                                                                class="bg-light rounded-1 me-3 p-6 d-flex align-items-center justify-content-center">
                                                                <img src="{{ asset('package/dist/images/svgs/icon-dd-mobile.svg') }}"
                                                                    alt="" class="img-fluid" width="24"
                                                                    height="24">
                                                            </div>
                                                            <div class="d-inline-block">
                                                                <h6 class="mb-1 fw-semibold bg-hover-primary">Contact
                                                                    Application</h6>
                                                                <span class="fs-2 d-block text-dark">2 Unsaved
                                                                    Contacts</span>
                                                            </div>
                                                        </a>
                                                        <a href="./app-email.html"
                                                            class="d-flex align-items-center pb-9 position-relative    ">
                                                            <div
                                                                class="bg-light rounded-1 me-3 p-6 d-flex align-items-center justify-content-center">
                                                                <img src="{{ asset('package/dist/images/svgs/icon-dd-message-box.svg') }}"
                                                                    alt="" class="img-fluid" width="24"
                                                                    height="24">
                                                            </div>
                                                            <div class="d-inline-block">
                                                                <h6 class="mb-1 fw-semibold bg-hover-primary">Email App
                                                                </h6>
                                                                <span class="fs-2 d-block text-dark">Get new
                                                                    emails</span>
                                                            </div>
                                                        </a>
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <div class="position-relative">
                                                        <a href="./page-user-profile.html"
                                                            class="d-flex align-items-center pb-9 position-relative    ">
                                                            <div
                                                                class="bg-light rounded-1 me-3 p-6 d-flex align-items-center justify-content-center">
                                                                <img src="{{ asset('package/dist/images/svgs/icon-dd-cart.svg') }}"
                                                                    alt="" class="img-fluid" width="24"
                                                                    height="24">
                                                            </div>
                                                            <div class="d-inline-block">
                                                                <h6 class="mb-1 fw-semibold bg-hover-primary">User
                                                                    Profile</h6>
                                                                <span class="fs-2 d-block text-dark">learn more
                                                                    information</span>
                                                            </div>
                                                        </a>
                                                        <a href="./app-calendar.html"
                                                            class="d-flex align-items-center pb-9 position-relative    ">
                                                            <div
                                                                class="bg-light rounded-1 me-3 p-6 d-flex align-items-center justify-content-center">
                                                                <img src="{{ asset('package/dist/images/svgs/icon-dd-date.svg') }}"
                                                                    alt="" class="img-fluid" width="24"
                                                                    height="24">
                                                            </div>
                                                            <div class="d-inline-block">
                                                                <h6 class="mb-1 fw-semibold bg-hover-primary">Calendar
                                                                    App</h6>
                                                                <span class="fs-2 d-block text-dark">Get dates</span>
                                                            </div>
                                                        </a>
                                                        <a href="./app-contact.html"
                                                            class="d-flex align-items-center pb-9 position-relative    ">
                                                            <div
                                                                class="bg-light rounded-1 me-3 p-6 d-flex align-items-center justify-content-center">
                                                                <img src="{{ asset('package/dist/images/svgs/icon-dd-lifebuoy.svg') }}"
                                                                    alt="" class="img-fluid" width="24"
                                                                    height="24">
                                                            </div>
                                                            <div class="d-inline-block">
                                                                <h6 class="mb-1 fw-semibold bg-hover-primary">Contact
                                                                    List Table</h6>
                                                                <span class="fs-2 d-block text-dark">Add new
                                                                    contact</span>
                                                            </div>
                                                        </a>
                                                        <a href="./app-notes.html"
                                                            class="d-flex align-items-center pb-9 position-relative    ">
                                                            <div
                                                                class="bg-light rounded-1 me-3 p-6 d-flex align-items-center justify-content-center">
                                                                <img src="{{ asset('package/dist/images/svgs/icon-dd-application.svg') }}"
                                                                    alt="" class="img-fluid" width="24"
                                                                    height="24">
                                                            </div>
                                                            <div class="d-inline-block">
                                                                <h6 class="mb-1 fw-semibold bg-hover-primary">Notes
                                                                    Application</h6>
                                                                <span class="fs-2 d-block text-dark">To-do and Daily
                                                                    tasks</span>
                                                            </div>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row align-items-center py-3">
                                            <div class="col-8">
                                                <a class="fw-semibold text-dark d-flex align-items-center lh-1 "
                                                    href="#"><i class="ti ti-help fs-6 me-2"></i>Frequently
                                                    Asked Questions</a>
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
                                        <h5 class="fs-5 mb-9 fw-semibold">Quick Links</h5>
                                        <ul class="">
                                            <li class="mb-3">
                                                <a class="fw-semibold text-dark bg-hover-primary    "
                                                    href="./page-pricing.html">Pricing Page</a>
                                            </li>
                                            <li class="mb-3">
                                                <a class="fw-semibold text-dark bg-hover-primary    "
                                                    href="./authentication-login.html">Authentication Design</a>
                                            </li>
                                            <li class="mb-3">
                                                <a class="fw-semibold text-dark bg-hover-primary    "
                                                    href="./authentication-register.html">Register Now</a>
                                            </li>
                                            <li class="mb-3">
                                                <a class="fw-semibold text-dark bg-hover-primary    "
                                                    href="authentication-error.html">404 Error Page</a>
                                            </li>
                                            <li class="mb-3">
                                                <a class="fw-semibold text-dark bg-hover-primary    "
                                                    href="./app-notes.html">Notes App</a>
                                            </li>
                                            <li class="mb-3">
                                                <a class="fw-semibold text-dark bg-hover-primary    "
                                                    href="./page-user-profile.html">User Application</a>
                                            </li>
                                            <li class="mb-3">
                                                <a class="fw-semibold text-dark bg-hover-primary    "
                                                    href="./page-account-settings.html">Account Settings</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>
                    <li class="nav-item dropdown-hover d-none d-xl-block">
                        <a class="nav-link" href="app-chat.html">Chat</a>
                    </li>
                    <li class="nav-item dropdown-hover d-none d-xl-block">
                        <a class="nav-link" href="app-calendar.html">Calendar</a>
                    </li>
                    <li class="nav-item dropdown-hover d-none d-xl-block">
                        <a class="nav-link" href="app-email.html">Email</a>
                    </li>
                </ul>
                <div class="d-block d-xl-none">
                    <a href="index.html" class="text-nowrap nav-link">
                        <img src="{{ asset('package/dist/images/logos/dark-logo.svg') }}" width="180"
                            alt="" />
                    </a>
                </div>
                <button class="navbar-toggler p-0 border-0" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <span class="p-2">
                        <i class="ti ti-dots fs-7"></i>
                    </span>
                </button>
                <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
                    <div class="d-flex align-items-center justify-content-between px-0 px-xl-8">
                        <a href="javascript:void(0)"
                            class="nav-link round-40 p-1 ps-0 d-flex d-xl-none align-items-center justify-content-center"
                            type="button" data-bs-toggle="offcanvas" data-bs-target="#mobilenavbar"
                            aria-controls="offcanvasWithBothOptions">
                            <i class="ti ti-align-justified fs-7"></i>
                        </a>
                        <ul class="navbar-nav flex-row ms-auto align-items-center justify-content-center">
                            <li class="nav-item dropdown">
                                <a class="nav-link nav-icon-hover" href="javascript:void(0)" id="drop2"
                                    data-bs-toggle="dropdown" aria-expanded="false">
                                    <img src="{{ asset('package/dist/images/svgs/icon-flag-en.svg') }}"
                                        alt="" class="rounded-circle object-fit-cover round-20">
                                </a>
                                <div class="dropdown-menu dropdown-menu-end dropdown-menu-animate-up"
                                    aria-labelledby="drop2">
                                    <div class="message-body" data-simplebar>
                                        <a href="javascript:void(0)"
                                            class="d-flex align-items-center gap-2 py-3 px-4 dropdown-item">
                                            <div class="position-relative">
                                                <img src="{{ asset('package/dist/images/svgs/icon-flag-en.svg') }}"
                                                    alt="" class="rounded-circle object-fit-cover round-20">
                                            </div>
                                            <p class="mb-0 fs-3">English (UK)</p>
                                        </a>
                                        <a href="javascript:void(0)"
                                            class="d-flex align-items-center gap-2 py-3 px-4 dropdown-item">
                                            <div class="position-relative">
                                                <img src="{{ asset('package/dist/images/svgs/icon-flag-cn.svg') }}"
                                                    alt="" class="rounded-circle object-fit-cover round-20">
                                            </div>
                                            <p class="mb-0 fs-3">中国人 (Chinese)</p>
                                        </a>
                                        <a href="javascript:void(0)"
                                            class="d-flex align-items-center gap-2 py-3 px-4 dropdown-item">
                                            <div class="position-relative">
                                                <img src="{{ asset('package/dist/images/svgs/icon-flag-fr.svg') }}"
                                                    alt="" class="rounded-circle object-fit-cover round-20">
                                            </div>
                                            <p class="mb-0 fs-3">français (French)</p>
                                        </a>
                                        <a href="javascript:void(0)"
                                            class="d-flex align-items-center gap-2 py-3 px-4 dropdown-item">
                                            <div class="position-relative">
                                                <img src="{{ asset('package/dist/images/svgs/icon-flag-sa.svg') }}"
                                                    alt="" class="rounded-circle object-fit-cover round-20">
                                            </div>
                                            <p class="mb-0 fs-3">عربي (Arabic)</p>
                                        </a>
                                    </div>
                                </div>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link notify-badge nav-icon-hover" href="javascript:void(0)"
                                    data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight"
                                    aria-controls="offcanvasRight">
                                    <i class="ti ti-basket"></i>
                                    <span class="badge rounded-pill bg-danger fs-2">2</span>
                                </a>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link nav-icon-hover" href="javascript:void(0)" id="drop2"
                                    data-bs-toggle="dropdown" aria-expanded="false">
                                    <i class="ti ti-bell-ringing"></i>
                                    <div class="notification bg-primary rounded-circle"></div>
                                </a>
                                <div class="dropdown-menu content-dd dropdown-menu-end dropdown-menu-animate-up"
                                    aria-labelledby="drop2">
                                    <div class="d-flex align-items-center justify-content-between py-3 px-7">
                                        <h5 class="mb-0 fs-5 fw-semibold">Notifications</h5>
                                        <span class="badge bg-primary rounded-4 px-3 py-1 lh-sm">5 new</span>
                                    </div>
                                    <div class="message-body" data-simplebar>
                                        <a href="javascript:void(0)"
                                            class="py-6 px-7 d-flex align-items-center dropdown-item">
                                            <span class="me-3">
                                                <img src="{{ asset('package/dist/images/profile/user-1.jpg') }}"
                                                    alt="user" class="rounded-circle" width="48"
                                                    height="48" />
                                            </span>
                                            <div class="w-75 d-inline-block v-middle">
                                                <h6 class="mb-1 fw-semibold">Roman Joined the Team!</h6>
                                                <span class="d-block">Congratulate him</span>
                                            </div>
                                        </a>
                                        <a href="javascript:void(0)"
                                            class="py-6 px-7 d-flex align-items-center dropdown-item">
                                            <span class="me-3">
                                                <img src="{{ asset('package/dist/images/profile/user-2.jpg') }}"
                                                    alt="user" class="rounded-circle" width="48"
                                                    height="48" />
                                            </span>
                                            <div class="w-75 d-inline-block v-middle">
                                                <h6 class="mb-1 fw-semibold">New message</h6>
                                                <span class="d-block">Salma sent you new message</span>
                                            </div>
                                        </a>
                                        <a href="javascript:void(0)"
                                            class="py-6 px-7 d-flex align-items-center dropdown-item">
                                            <span class="me-3">
                                                <img src="{{ asset('package/dist/images/profile/user-3.jpg') }}"
                                                    alt="user" class="rounded-circle" width="48"
                                                    height="48" />
                                            </span>
                                            <div class="w-75 d-inline-block v-middle">
                                                <h6 class="mb-1 fw-semibold">Bianca sent payment</h6>
                                                <span class="d-block">Check your earnings</span>
                                            </div>
                                        </a>
                                        <a href="javascript:void(0)"
                                            class="py-6 px-7 d-flex align-items-center dropdown-item">
                                            <span class="me-3">
                                                <img src="{{ asset('package/dist/images/profile/user-4.jpg') }}"
                                                    alt="user" class="rounded-circle" width="48"
                                                    height="48" />
                                            </span>
                                            <div class="w-75 d-inline-block v-middle">
                                                <h6 class="mb-1 fw-semibold">Jolly completed tasks</h6>
                                                <span class="d-block">Assign her new tasks</span>
                                            </div>
                                        </a>
                                        <a href="javascript:void(0)"
                                            class="py-6 px-7 d-flex align-items-center dropdown-item">
                                            <span class="me-3">
                                                <img src="{{ asset('package/dist/images/profile/user-5.jpg') }}"
                                                    alt="user" class="rounded-circle" width="48"
                                                    height="48" />
                                            </span>
                                            <div class="w-75 d-inline-block v-middle">
                                                <h6 class="mb-1 fw-semibold">John received payment</h6>
                                                <span class="d-block">$230 deducted from account</span>
                                            </div>
                                        </a>
                                        <a href="javascript:void(0)"
                                            class="py-6 px-7 d-flex align-items-center dropdown-item">
                                            <span class="me-3">
                                                <img src="{{ asset('package/dist/images/profile/user-1.jpg') }}"
                                                    alt="user" class="rounded-circle" width="48"
                                                    height="48" />
                                            </span>
                                            <div class="w-75 d-inline-block v-middle">
                                                <h6 class="mb-1 fw-semibold">Roman Joined the Team!</h6>
                                                <span class="d-block">Congratulate him</span>
                                            </div>
                                        </a>
                                    </div>
                                    <div class="py-6 px-7 mb-1">
                                        <button class="btn btn-outline-primary w-100"> See All Notifications </button>
                                    </div>
                                </div>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link pe-0" href="javascript:void(0)" id="drop1"
                                    data-bs-toggle="dropdown" aria-expanded="false">
                                    <div class="d-flex align-items-center">
                                        <div class="user-profile-img">
                                            <img src="{{ asset('package/dist/images/profile/user-1.jpg') }}"
                                                class="rounded-circle" width="35" height="35"
                                                alt="" />
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
                                            <img src="{{ asset('package/dist/images/profile/user-1.jpg') }}"
                                                class="rounded-circle" width="80" height="80"
                                                alt="" />
                                            <div class="ms-3">
                                                <h5 class="mb-1 fs-3">Mathew Anderson</h5>
                                                <span class="mb-1 d-block text-dark">Designer</span>
                                                <p class="mb-0 d-flex text-dark align-items-center gap-2">
                                                    <i class="ti ti-mail fs-4"></i> info@modernize.com
                                                </p>
                                            </div>
                                        </div>
                                        <div class="message-body">
                                            <a href="./page-user-profile.html"
                                                class="py-8 px-7 mt-8 d-flex align-items-center">
                                                <span
                                                    class="d-flex align-items-center justify-content-center bg-light rounded-1 p-6">
                                                    <img src="{{ asset('package/dist/images/svgs/icon-account.svg') }}"
                                                        alt="" width="24" height="24">
                                                </span>
                                                <div class="w-75 d-inline-block v-middle ps-3">
                                                    <h6 class="mb-1 bg-hover-primary fw-semibold"> My Profile </h6>
                                                    <span class="d-block text-dark">Account Settings</span>
                                                </div>
                                            </a>
                                            <a href="./app-email.html" class="py-8 px-7 d-flex align-items-center">
                                                <span
                                                    class="d-flex align-items-center justify-content-center bg-light rounded-1 p-6">
                                                    <img src="{{ asset('package/dist/images/svgs/icon-inbox.svg') }}"
                                                        alt="" width="24" height="24">
                                                </span>
                                                <div class="w-75 d-inline-block v-middle ps-3">
                                                    <h6 class="mb-1 bg-hover-primary fw-semibold">My Inbox</h6>
                                                    <span class="d-block text-dark">Messages & Emails</span>
                                                </div>
                                            </a>
                                            <a href="./app-notes.html" class="py-8 px-7 d-flex align-items-center">
                                                <span
                                                    class="d-flex align-items-center justify-content-center bg-light rounded-1 p-6">
                                                    <img src="{{ asset('package/dist/images/svgs/icon-tasks.svg') }}"
                                                        alt="" width="24" height="24">
                                                </span>
                                                <div class="w-75 d-inline-block v-middle ps-3">
                                                    <h6 class="mb-1 bg-hover-primary fw-semibold">My Task</h6>
                                                    <span class="d-block text-dark">To-do and Daily Tasks</span>
                                                </div>
                                            </a>
                                        </div>
                                        <div class="d-grid py-4 px-7 pt-8">
                                            <div
                                                class="upgrade-plan bg-light-primary position-relative overflow-hidden rounded-4 p-4 mb-9">
                                                <div class="row">
                                                    <div class="col-6">
                                                        <h5 class="fs-4 mb-3 w-50 fw-semibold text-dark">Unlimited
                                                            Access</h5>
                                                        <button class="btn btn-primary text-white">Upgrade</button>
                                                    </div>
                                                    <div class="col-6">
                                                        <div class="m-n4">
                                                            <img src="{{ asset('package/dist/images/backgrounds/unlimited-bg.png') }}"
                                                                alt="" class="w-100">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <a href="./authentication-login.html" class="btn btn-outline-primary">Log
                                                Out</a>
                                        </div>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
        </header>
        <!-- Sidebar End -->



        <!-- Main wrapper -->

        <div class="body-wrapper">
            <div class="container-fluid note-has-grid">
                <div class="card bg-primary shadow-none position-relative overflow-hidden">
                    <div class="card-body px-4 py-3">
                        <div class="row align-items-center">
                            <div class="col-9">
                                <h4 class="fw-semibold mb-8 text-white">Opening Jobs</h4>
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item">
                                            <a class="text-white "
                                                href="./index.html">Daftarkan segera diri anda</a>
                                        </li>
                                    </ol>
                                </nav>
                            </div>
                            <div class="col-3">
                                <div class="text-center mb-n5">
                                    <img src="{{ asset('package/dist/images/breadcrumb/ChatBc.png') }}"
                                        alt="" class="img-fluid mb-n4">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <ul class="nav nav-pills p-3 mb-3 rounded align-items-center card flex-row bg-light-primary">
                    <li class="nav-item">
                        <a href="javascript:void(0)"
                            class="
                      nav-link

                      note-link
                      d-flex
                      align-items-center
                      justify-content-center
                      active
                      px-3 px-md-3
                      me-0 me-md-2 text-body-color
                    "
                            id="all-category">
                            <i class="ti ti-list fill-white me-0 me-md-1"></i>
                            <span class="d-none d-md-block font-weight-medium">All Jobs</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="javascript:void(0)"
                            class="
                      nav-link

                      note-link
                      d-flex
                      align-items-center
                      justify-content-center
                      px-3 px-md-3
                      me-0 me-md-2 text-body-color
                    "
                            id="note-business">
                            <i class="ti ti-briefcase fill-white me-0 me-md-1"></i>
                            <span class="d-none d-md-block font-weight-medium">Staff</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="javascript:void(0)"
                            class="
                      nav-link

                      note-link
                      d-flex
                      align-items-center
                      justify-content-center
                      px-3 px-md-3
                      me-0 me-md-2 text-body-color
                    "
                            id="note-social">
                            <i class="ti ti-share fill-white me-0 me-md-1"></i>
                            <span class="d-none d-md-block font-weight-medium">Non Staff</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="javascript:void(0)"
                            class="
                      nav-link

                      note-link
                      d-flex
                      align-items-center
                      justify-content-center
                      px-3 px-md-3
                      me-0 me-md-2 text-body-color
                    "
                            id="note-important">
                            <i class="ti ti-star fill-white me-0 me-md-1"></i>
                            <span class="d-none d-md-block font-weight-medium">Internship</span>
                        </a>
                    </li>
                </ul>

                <div class="tab-content">
                    <div id="note-full-container" class="note-has-grid row">
                        @foreach ($jobs as $job)
                        <div class="col-md-4 single-note-item all-category hover-img">
                            <div class="card card-body bg-light-primary">
                                <span class="side-stick"></span>
                                <h6 class="note-title text-truncate w-75 mb-0"
                                    data-noteHeading="Book a Ticket for Movie">{{$job->jobtitle->jobtitle_name}}</h6>
                                <p class="note-date fs-2">Plant 5 Gresik</p>
                                <div class="note-content">
                                    <p>
                                        <i class="ti ti-edit btn btn-sm btn-dark"></i> {{$job->education->education_name}}
                                        &nbsp;&nbsp;&nbsp;
                                        <i class="ti ti-user btn btn-sm btn-dark"></i>
                                        @if ($job->gender == 1)
                                        Laki-laki
                                        @elseif ($job->gender == 2)
                                        Perempuan
                                        @else
                                        Laki-laki/Perempuan
                                        @endif
                                    </p>
                                    <i class="mb-1">Startwork : {{$job->date_startwork}}</i>&nbsp;
                                </div>
                                <div class="d-flex align-items-center mt-2">
                                    <a href="javascript:void(0)" class="btn bg-success btn-sm text-white">
                                        {{$job->status_pegawai}}
                                    </a>

                                    <div class="ms-auto">
                                        <div class="category-selector btn-group">
                                            <a class="btn btn-primary btn-sm"
                                                 href="{{url('opening-jobs',$job->id)}}" >
                                                <div class="category">
                                                    <span class="more-options text-white">
                                                        <i class="ti ti-edit"></i> Show & Apply
                                                    </span>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
        <div class="dark-transparent sidebartoggler"></div>
    </div>

    <!--  Shopping Cart -->
    <div class="offcanvas offcanvas-end shopping-cart" tabindex="-1" id="offcanvasRight"
        aria-labelledby="offcanvasRightLabel">
        <div class="offcanvas-header py-4">
            <h5 class="offcanvas-title fs-5 fw-semibold" id="offcanvasRightLabel">Shopping Cart</h5>
            <span class="badge bg-primary rounded-4 px-3 py-1 lh-sm">5 new</span>
        </div>
        <div class="offcanvas-body h-100 px-4 pt-0" data-simplebar>
            <ul class="mb-0">
                <li class="pb-7">
                    <div class="d-flex align-items-center">
                        <img src="{{ asset('package/dist/images/products/product-1.jpg') }}" width="95"
                            height="75" class="rounded-1 me-9 flex-shrink-0" alt="" />
                        <div>
                            <h6 class="mb-1">Supreme toys cooker</h6>
                            <p class="mb-0 text-muted fs-2">Kitchenware Item</p>
                            <div class="d-flex align-items-center justify-content-between mt-2">
                                <h6 class="fs-2 fw-semibold mb-0 text-muted">$250</h6>
                                <div class="input-group input-group-sm w-50">
                                    <button class="btn border-0 round-20 minus p-0 bg-light-success text-success "
                                        type="button" id="add1"> - </button>
                                    <input type="text"
                                        class="form-control round-20 bg-transparent text-muted fs-2 border-0  text-center qty"
                                        placeholder="" aria-label="Example text with button addon"
                                        aria-describedby="add1" value="1" />
                                    <button class="btn text-success bg-light-success  p-0 round-20 border-0 add"
                                        type="button" id="addo2"> + </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </li>
                <li class="pb-7">
                    <div class="d-flex align-items-center">
                        <img src="{{ asset('package/dist/images/products/product-2.jpg') }}" width="95"
                            height="75" class="rounded-1 me-9 flex-shrink-0" alt="" />
                        <div>
                            <h6 class="mb-1">Supreme toys cooker</h6>
                            <p class="mb-0 text-muted fs-2">Kitchenware Item</p>
                            <div class="d-flex align-items-center justify-content-between mt-2">
                                <h6 class="fs-2 fw-semibold mb-0 text-muted">$250</h6>
                                <div class="input-group input-group-sm w-50">
                                    <button class="btn border-0 round-20 minus p-0 bg-light-success text-success "
                                        type="button" id="add2"> - </button>
                                    <input type="text"
                                        class="form-control round-20 bg-transparent text-muted fs-2 border-0  text-center qty"
                                        placeholder="" aria-label="Example text with button addon"
                                        aria-describedby="add2" value="1" />
                                    <button class="btn text-success bg-light-success  p-0 round-20 border-0 add"
                                        type="button" id="addon34"> + </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </li>
                <li class="pb-7">
                    <div class="d-flex align-items-center">
                        <img src="{{ asset('package/dist/images/products/product-3.jpg') }}" width="95"
                            height="75" class="rounded-1 me-9 flex-shrink-0" alt="" />
                        <div>
                            <h6 class="mb-1">Supreme toys cooker</h6>
                            <p class="mb-0 text-muted fs-2">Kitchenware Item</p>
                            <div class="d-flex align-items-center justify-content-between mt-2">
                                <h6 class="fs-2 fw-semibold mb-0 text-muted">$250</h6>
                                <div class="input-group input-group-sm w-50">
                                    <button class="btn border-0 round-20 minus p-0 bg-light-success text-success "
                                        type="button" id="add3"> - </button>
                                    <input type="text"
                                        class="form-control round-20 bg-transparent text-muted fs-2 border-0  text-center qty"
                                        placeholder="" aria-label="Example text with button addon"
                                        aria-describedby="add3" value="1" />
                                    <button class="btn text-success bg-light-success  p-0 round-20 border-0 add"
                                        type="button" id="addon3"> + </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </li>
            </ul>
            <div class="align-bottom">
                <div class="d-flex align-items-center pb-7">
                    <span class="text-dark fs-3">Sub Total</span>
                    <div class="ms-auto">
                        <span class="text-dark fw-semibold fs-3">$2530</span>
                    </div>
                </div>
                <div class="d-flex align-items-center pb-7">
                    <span class="text-dark fs-3">Total</span>
                    <div class="ms-auto">
                        <span class="text-dark fw-semibold fs-3">$6830</span>
                    </div>
                </div>
                <a href="./eco-checkout.html" class="btn btn-outline-primary w-100">Go to shopping cart</a>
            </div>
        </div>
    </div>

    <!--  Mobilenavbar -->
    <div class="offcanvas offcanvas-start" data-bs-scroll="true" tabindex="-1" id="mobilenavbar"
        aria-labelledby="offcanvasWithBothOptionsLabel">
        <nav class="sidebar-nav scroll-sidebar">
            <div class="offcanvas-header justify-content-between">
                <img src="{{ asset('package/dist/images/logos/favicon.ico') }}" alt="" class="img-fluid">
                <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
            </div>
            <div class="offcanvas-body profile-dropdown mobile-navbar" data-simplebar="" data-simplebar>
                <ul id="sidebarnav">
                    <li class="sidebar-item">
                        <a class="sidebar-link has-arrow" href="javascript:void(0)" aria-expanded="false">
                            <span>
                                <i class="ti ti-apps"></i>
                            </span>
                            <span class="hide-menu">Apps</span>
                        </a>
                        <ul aria-expanded="false" class="collapse first-level my-3">
                            <li class="sidebar-item py-2">
                                <a href="#" class="d-flex align-items-center">
                                    <div
                                        class="bg-light rounded-1 me-3 p-6 d-flex align-items-center justify-content-center">
                                        <img src="{{ asset('package/dist/images/svgs/icon-dd-chat.svg') }}"
                                            alt="" class="img-fluid" width="24" height="24">
                                    </div>
                                    <div class="d-inline-block">
                                        <h6 class="mb-1 bg-hover-primary">Chat Application</h6>
                                        <span class="fs-2 d-block fw-normal text-muted">New messages arrived</span>
                                    </div>
                                </a>
                            </li>
                            <li class="sidebar-item py-2">
                                <a href="#" class="d-flex align-items-center">
                                    <div
                                        class="bg-light rounded-1 me-3 p-6 d-flex align-items-center justify-content-center">
                                        <img src="{{ asset('package/dist/images/svgs/icon-dd-invoice.svg') }}"
                                            alt="" class="img-fluid" width="24" height="24">
                                    </div>
                                    <div class="d-inline-block">
                                        <h6 class="mb-1 bg-hover-primary">Invoice App</h6>
                                        <span class="fs-2 d-block fw-normal text-muted">Get latest invoice</span>
                                    </div>
                                </a>
                            </li>
                            <li class="sidebar-item py-2">
                                <a href="#" class="d-flex align-items-center">
                                    <div
                                        class="bg-light rounded-1 me-3 p-6 d-flex align-items-center justify-content-center">
                                        <img src="{{ asset('package/dist/images/svgs/icon-dd-mobile.svg') }}"
                                            alt="" class="img-fluid" width="24" height="24">
                                    </div>
                                    <div class="d-inline-block">
                                        <h6 class="mb-1 bg-hover-primary">Contact Application</h6>
                                        <span class="fs-2 d-block fw-normal text-muted">2 Unsaved Contacts</span>
                                    </div>
                                </a>
                            </li>
                            <li class="sidebar-item py-2">
                                <a href="#" class="d-flex align-items-center">
                                    <div
                                        class="bg-light rounded-1 me-3 p-6 d-flex align-items-center justify-content-center">
                                        <img src="{{ asset('package/dist/images/svgs/icon-dd-message-box.svg') }}"
                                            alt="" class="img-fluid" width="24" height="24">
                                    </div>
                                    <div class="d-inline-block">
                                        <h6 class="mb-1 bg-hover-primary">Email App</h6>
                                        <span class="fs-2 d-block fw-normal text-muted">Get new emails</span>
                                    </div>
                                </a>
                            </li>
                            <li class="sidebar-item py-2">
                                <a href="#" class="d-flex align-items-center">
                                    <div
                                        class="bg-light rounded-1 me-3 p-6 d-flex align-items-center justify-content-center">
                                        <img src="{{ asset('package/dist/images/svgs/icon-dd-cart.svg') }}"
                                            alt="" class="img-fluid" width="24" height="24">
                                    </div>
                                    <div class="d-inline-block">
                                        <h6 class="mb-1 bg-hover-primary">User Profile</h6>
                                        <span class="fs-2 d-block fw-normal text-muted">learn more information</span>
                                    </div>
                                </a>
                            </li>
                            <li class="sidebar-item py-2">
                                <a href="#" class="d-flex align-items-center">
                                    <div
                                        class="bg-light rounded-1 me-3 p-6 d-flex align-items-center justify-content-center">
                                        <img src="{{ asset('package/dist/images/svgs/icon-dd-date.svg') }}"
                                            alt="" class="img-fluid" width="24" height="24">
                                    </div>
                                    <div class="d-inline-block">
                                        <h6 class="mb-1 bg-hover-primary">Calendar App</h6>
                                        <span class="fs-2 d-block fw-normal text-muted">Get dates</span>
                                    </div>
                                </a>
                            </li>
                            <li class="sidebar-item py-2">
                                <a href="#" class="d-flex align-items-center">
                                    <div
                                        class="bg-light rounded-1 me-3 p-6 d-flex align-items-center justify-content-center">
                                        <img src="{{ asset('package/dist/images/svgs/icon-dd-lifebuoy.svg') }}"
                                            alt="" class="img-fluid" width="24" height="24">
                                    </div>
                                    <div class="d-inline-block">
                                        <h6 class="mb-1 bg-hover-primary">Contact List Table</h6>
                                        <span class="fs-2 d-block fw-normal text-muted">Add new contact</span>
                                    </div>
                                </a>
                            </li>
                            <li class="sidebar-item py-2">
                                <a href="#" class="d-flex align-items-center">
                                    <div
                                        class="bg-light rounded-1 me-3 p-6 d-flex align-items-center justify-content-center">
                                        <img src="{{ asset('package/dist/images/svgs/icon-dd-application.svg') }}"
                                            alt="" class="img-fluid" width="24" height="24">
                                    </div>
                                    <div class="d-inline-block">
                                        <h6 class="mb-1 bg-hover-primary">Notes Application</h6>
                                        <span class="fs-2 d-block fw-normal text-muted">To-do and Daily tasks</span>
                                    </div>
                                </a>
                            </li>
                            <ul class="px-8 mt-7 mb-4">
                                <li class="sidebar-item mb-3">
                                    <h5 class="fs-5 fw-semibold">Quick Links</h5>
                                </li>
                                <li class="sidebar-item py-2">
                                    <a class="fw-semibold text-dark" href="#">Pricing Page</a>
                                </li>
                                <li class="sidebar-item py-2">
                                    <a class="fw-semibold text-dark" href="#">Authentication Design</a>
                                </li>
                                <li class="sidebar-item py-2">
                                    <a class="fw-semibold text-dark" href="#">Register Now</a>
                                </li>
                                <li class="sidebar-item py-2">
                                    <a class="fw-semibold text-dark" href="#">404 Error Page</a>
                                </li>
                                <li class="sidebar-item py-2">
                                    <a class="fw-semibold text-dark" href="#">Notes App</a>
                                </li>
                                <li class="sidebar-item py-2">
                                    <a class="fw-semibold text-dark" href="#">User Application</a>
                                </li>
                                <li class="sidebar-item py-2">
                                    <a class="fw-semibold text-dark" href="#">Account Settings</a>
                                </li>
                            </ul>
                        </ul>
                    </li>
                    <li class="sidebar-item">
                        <a class="sidebar-link" href="app-chat.html" aria-expanded="false">
                            <span>
                                <i class="ti ti-message-dots"></i>
                            </span>
                            <span class="hide-menu">Chat</span>
                        </a>
                    </li>
                    <li class="sidebar-item">
                        <a class="sidebar-link" href="app-calendar.html" aria-expanded="false">
                            <span>
                                <i class="ti ti-calendar"></i>
                            </span>
                            <span class="hide-menu">Calendar</span>
                        </a>
                    </li>
                    <li class="sidebar-item">
                        <a class="sidebar-link" href="app-email.html" aria-expanded="false">
                            <span>
                                <i class="ti ti-mail"></i>
                            </span>
                            <span class="hide-menu">Email</span>
                        </a>
                    </li>
                </ul>
            </div>
        </nav>
    </div>

    <!--  Search Bar -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable modal-lg">
            <div class="modal-content rounded-1">
                <div class="modal-header border-bottom">
                    <input type="search" class="form-control fs-3" placeholder="Search here" id="search" />
                    <span data-bs-dismiss="modal" class="lh-1 cursor-pointer">
                        <i class="ti ti-x fs-5 ms-3"></i>
                    </span>
                </div>
                <div class="modal-body message-body" data-simplebar="">
                    <h5 class="mb-0 fs-5 p-1">Quick Page Links</h5>
                    <ul class="list mb-0 py-2">
                        <li class="p-1 mb-1 bg-hover-light-black">
                            <a href="#">
                                <span class="fs-3 text-black fw-normal d-block">Modern</span>
                                <span class="fs-3 text-muted d-block">/dashboards/dashboard1</span>
                            </a>
                        </li>
                        <li class="p-1 mb-1 bg-hover-light-black">
                            <a href="#">
                                <span class="fs-3 text-black fw-normal d-block">Dashboard</span>
                                <span class="fs-3 text-muted d-block">/dashboards/dashboard2</span>
                            </a>
                        </li>
                        <li class="p-1 mb-1 bg-hover-light-black">
                            <a href="#">
                                <span class="fs-3 text-black fw-normal d-block">Contacts</span>
                                <span class="fs-3 text-muted d-block">/apps/contacts</span>
                            </a>
                        </li>
                        <li class="p-1 mb-1 bg-hover-light-black">
                            <a href="#">
                                <span class="fs-3 text-black fw-normal d-block">Posts</span>
                                <span class="fs-3 text-muted d-block">/apps/blog/posts</span>
                            </a>
                        </li>
                        <li class="p-1 mb-1 bg-hover-light-black">
                            <a href="#">
                                <span class="fs-3 text-black fw-normal d-block">Detail</span>
                                <span
                                    class="fs-3 text-muted d-block">/apps/blog/detail/streaming-video-way-before-it-was-cool-go-dark-tomorrow</span>
                            </a>
                        </li>
                        <li class="p-1 mb-1 bg-hover-light-black">
                            <a href="#">
                                <span class="fs-3 text-black fw-normal d-block">Shop</span>
                                <span class="fs-3 text-muted d-block">/apps/ecommerce/shop</span>
                            </a>
                        </li>
                        <li class="p-1 mb-1 bg-hover-light-black">
                            <a href="#">
                                <span class="fs-3 text-black fw-normal d-block">Modern</span>
                                <span class="fs-3 text-muted d-block">/dashboards/dashboard1</span>
                            </a>
                        </li>
                        <li class="p-1 mb-1 bg-hover-light-black">
                            <a href="#">
                                <span class="fs-3 text-black fw-normal d-block">Dashboard</span>
                                <span class="fs-3 text-muted d-block">/dashboards/dashboard2</span>
                            </a>
                        </li>
                        <li class="p-1 mb-1 bg-hover-light-black">
                            <a href="#">
                                <span class="fs-3 text-black fw-normal d-block">Contacts</span>
                                <span class="fs-3 text-muted d-block">/apps/contacts</span>
                            </a>
                        </li>
                        <li class="p-1 mb-1 bg-hover-light-black">
                            <a href="#">
                                <span class="fs-3 text-black fw-normal d-block">Posts</span>
                                <span class="fs-3 text-muted d-block">/apps/blog/posts</span>
                            </a>
                        </li>
                        <li class="p-1 mb-1 bg-hover-light-black">
                            <a href="#">
                                <span class="fs-3 text-black fw-normal d-block">Detail</span>
                                <span
                                    class="fs-3 text-muted d-block">/apps/blog/detail/streaming-video-way-before-it-was-cool-go-dark-tomorrow</span>
                            </a>
                        </li>
                        <li class="p-1 mb-1 bg-hover-light-black">
                            <a href="#">
                                <span class="fs-3 text-black fw-normal d-block">Shop</span>
                                <span class="fs-3 text-muted d-block">/apps/ecommerce/shop</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <!-- --------------------------------------------------- -->
    <!-- Customizer -->
    <!-- --------------------------------------------------- -->
    <button class="btn btn-primary p-3 rounded-circle d-flex align-items-center justify-content-center customizer-btn"
        type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasExample"
        aria-controls="offcanvasExample">
        <i class="ti ti-settings fs-7" data-bs-toggle="tooltip" data-bs-placement="top"
            data-bs-title="Settings"></i>
    </button>

    <div class="offcanvas offcanvas-end customizer" tabindex="-1" id="offcanvasExample"
        aria-labelledby="offcanvasExampleLabel" data-simplebar="">
        <div class="d-flex align-items-center justify-content-between p-3 border-bottom">
            <h4 class="offcanvas-title fw-semibold" id="offcanvasExampleLabel">Settings</h4>
            <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body p-4">
            <div class="theme-option pb-4">
                <h6 class="fw-semibold fs-4 mb-1">Theme Option</h6>
                <div class="d-flex align-items-center gap-3 my-3">
                    <a href="javascript:void(0)"
                        onclick="toggleTheme('{{ asset('package/dist/css/style.min.css') }}')"
                        class="rounded-2 p-9 customizer-box hover-img d-flex align-items-center gap-2 light-theme text-dark">
                        <i class="ti ti-brightness-up fs-7 text-primary"></i>
                        <span class="text-dark">Light</span>
                    </a>
                    <a href="javascript:void(0)"
                        onclick="toggleTheme('{{ asset('package/dist/css/style-dark.min.css') }}')"
                        class="rounded-2 p-9 customizer-box hover-img d-flex align-items-center gap-2 dark-theme text-dark">
                        <i class="ti ti-moon fs-7 "></i>
                        <span class="text-dark">Dark</span>
                    </a>
                </div>
            </div>
            <div class="theme-direction pb-4">
                <h6 class="fw-semibold fs-4 mb-1">Theme Direction</h6>
                <div class="d-flex align-items-center gap-3 my-3">
                    <a href="./index.html"
                        class="rounded-2 p-9 customizer-box hover-img d-flex align-items-center gap-2">
                        <i class="ti ti-text-direction-ltr fs-6 text-primary"></i>
                        <span class="text-dark">LTR</span>
                    </a>
                    <a href="../rtl/index.html"
                        class="rounded-2 p-9 customizer-box hover-img d-flex align-items-center gap-2">
                        <i class="ti ti-text-direction-rtl fs-6 text-dark"></i>
                        <span class="text-dark">RTL</span>
                    </a>
                </div>
            </div>
            <div class="theme-colors pb-4">
                <h6 class="fw-semibold fs-4 mb-1">Theme Colors</h6>
                <div class="d-flex align-items-center gap-3 my-3">
                    <ul class="list-unstyled mb-0 d-flex gap-3 flex-wrap change-colors">
                        <li
                            class="rounded-2 p-9 customizer-box hover-img d-flex align-items-center justify-content-center">
                            <a href="javascript:void(0)"
                                class="rounded-circle position-relative d-block customizer-bgcolor skin1-bluetheme-primary active-theme "
                                onclick="toggleTheme('{{ asset('package/dist/css/style.min.css') }}')"
                                data-color="blue_theme" data-bs-toggle="tooltip" data-bs-placement="top"
                                data-bs-title="BLUE_THEME"><i
                                    class="ti ti-check text-white d-flex align-items-center justify-content-center fs-5"></i></a>
                        </li>
                        <li
                            class="rounded-2 p-9 customizer-box hover-img d-flex align-items-center justify-content-center">
                            <a href="javascript:void(0)"
                                class="rounded-circle position-relative d-block customizer-bgcolor skin2-aquatheme-primary "
                                onclick="toggleTheme('{{ asset('package/dist/css/style-aqua.min.css') }}')"
                                data-color="aqua_theme" data-bs-toggle="tooltip" data-bs-placement="top"
                                data-bs-title="AQUA_THEME"><i
                                    class="ti ti-check  text-white d-flex align-items-center justify-content-center fs-5"></i></a>
                        </li>
                        <li
                            class="rounded-2 p-9 customizer-box hover-img d-flex align-items-center justify-content-center">
                            <a href="javascript:void(0)"
                                class="rounded-circle position-relative d-block customizer-bgcolor skin3-purpletheme-primary"
                                onclick="toggleTheme('{{ asset('package/dist/css/style-purple.min.css') }}')"
                                data-color="purple_theme" data-bs-toggle="tooltip" data-bs-placement="top"
                                data-bs-title="PURPLE_THEME"><i
                                    class="ti ti-check  text-white d-flex align-items-center justify-content-center fs-5"></i></a>
                        </li>
                        <li
                            class="rounded-2 p-9 customizer-box hover-img d-flex align-items-center justify-content-center">
                            <a href="javascript:void(0)"
                                class="rounded-circle position-relative d-block customizer-bgcolor skin4-greentheme-primary"
                                onclick="toggleTheme('{{ asset('package/dist/css/style-green.min.css') }}')"
                                data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="GREEN_THEME"><i
                                    class="ti ti-check  text-white d-flex align-items-center justify-content-center fs-5"></i></a>
                        </li>
                        <li
                            class="rounded-2 p-9 customizer-box hover-img d-flex align-items-center justify-content-center">
                            <a href="javascript:void(0)"
                                class="rounded-circle position-relative d-block customizer-bgcolor skin5-cyantheme-primary"
                                onclick="toggleTheme('{{ asset('package/dist/css/style-cyan.min.css') }}')"
                                data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="CYAN_THEME"><i
                                    class="ti ti-check  text-white d-flex align-items-center justify-content-center fs-5"></i></a>
                        </li>
                        <li
                            class="rounded-2 p-9 customizer-box hover-img d-flex align-items-center justify-content-center">
                            <a href="javascript:void(0)"
                                class="rounded-circle position-relative d-block customizer-bgcolor skin6-orangetheme-primary"
                                onclick="toggleTheme('{{ asset('package/dist/css/style-orange.min.css') }}')"
                                data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="ORANGE_THEME"><i
                                    class="ti ti-check  text-white d-flex align-items-center justify-content-center fs-5"></i></a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="layout-type pb-4">
                <h6 class="fw-semibold fs-4 mb-1">Layout Type</h6>
                <div class="d-flex align-items-center gap-3 my-3">
                    <a href="../main/index.html"
                        class="rounded-2 p-9 customizer-box hover-img d-flex align-items-center gap-2">
                        <i class="ti ti-layout-sidebar text-dark fs-6"></i>
                        <span class="text-dark">Vertical</span>
                    </a>
                    <a href="../horizontal/index.html"
                        class="rounded-2 p-9 customizer-box hover-img d-flex align-items-center gap-2">
                        <i class="ti ti-layout-navbar fs-6 text-primary"></i>
                        <span class="text-dark">Horizontal</span>
                    </a>
                </div>
            </div>
            <div class="container-option pb-4">
                <h6 class="fw-semibold fs-4 mb-1">Container Option</h6>
                <div class="d-flex align-items-center gap-3 my-3">
                    <a href="javascript:void(0)"
                        class="rounded-2 p-9 customizer-box hover-img d-flex align-items-center gap-2 boxed-width text-dark">
                        <i class="ti ti-layout-distribute-vertical fs-7 text-primary"></i>
                        <span class="text-dark">Boxed</span>
                    </a>
                    <a href="javascript:void(0)"
                        class="rounded-2 p-9 customizer-box hover-img d-flex align-items-center gap-2 full-width text-dark">
                        <i class="ti ti-layout-distribute-horizontal fs-7"></i>
                        <span class="text-dark">Full</span>
                    </a>
                </div>
            </div>
            <div class="card-with pb-4">
                <h6 class="fw-semibold fs-4 mb-1">Card With</h6>
                <div class="d-flex align-items-center gap-3 my-3">
                    <a href="javascript:void(0)"
                        class="rounded-2 p-9 customizer-box hover-img d-flex align-items-center gap-2 text-dark cardborder">
                        <i class="ti ti-border-outer fs-7"></i>
                        <span class="text-dark">Border</span>
                    </a>
                    <a href="javascript:void(0)"
                        class="rounded-2 p-9 customizer-box hover-img d-flex align-items-center gap-2 cardshadow">
                        <i class="ti ti-border-none fs-7"></i>
                        <span class="text-dark">Shadow</span>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <!-- ---------------------------------------------- -->
    <!-- Customizer -->
    <!-- ---------------------------------------------- -->

    <!-- ---------------------------------------------- -->
    <!-- Import Js Files -->
    <!-- ---------------------------------------------- -->
    <script src="{{ asset('package/dist/libs/jquery/dist/jquery.min.js') }}"></script>
    <script src="{{ asset('package/dist/libs/simplebar/dist/simplebar.min.js') }}"></script>
    <script src="{{ asset('package/dist/libs/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>

    <!-- ---------------------------------------------- -->
    <!-- core files -->
    <!-- ---------------------------------------------- -->
    <script src="{{ asset('package/dist/js/app.min.js') }}"></script>
    <script src="{{ asset('package/dist/js/app.horizontal.init.js') }}"></script>
    <script src="{{ asset('package/dist/js/app-style-switcher.js') }}"></script>
    <script src="{{ asset('package/dist/js/sidebarmenu.js') }}"></script>

    <script src="{{ asset('package/dist/js/custom.js') }}"></script>
    <script src="{{ asset('package/dist/libs/prismjs/prism.js') }}"></script>

    <!-- ---------------------------------------------- -->
    <!-- current page js files -->
    <!-- ---------------------------------------------- -->
    <script src="{{ asset('package/dist/js/apps/notes.js') }}"></script>
</body>

</html>
