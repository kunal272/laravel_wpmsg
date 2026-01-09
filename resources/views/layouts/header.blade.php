<!DOCTYPE html>
<html lang="en">

<head>

    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description"
        content="Edmin admin is super flexible, powerful, clean &amp; modern responsive bootstrap admin template with unlimited possibilities.">
    <meta name="keywords"
        content="admin template, Edmin admin template, best javascript admin, dashboard template, bootstrap admin template, responsive admin template, web app">
    <meta name="author" content="pixelstrap">
    <title>Portal | @yield('title')</title>
    <!-- Favicon icon-->
    <link rel="icon" href="{{ url('/public/assets/images/favicon/auto-new-ic.png') }}" type="image/x-icon">
    <link rel="shortcut icon" href="{{ url('/public/assets/images/favicon/auto-new-ic.png') }}" type="image/x-icon">
    <!-- Google font-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin="">
    <link
        href="https://fonts.googleapis.com/css2?family=Outfit:wght@100;200;300;400;500;600;700;800;900&amp;display=swap"
        rel="stylesheet">
    <script>
        const baseUrl = "{{ url('/') }}";
    </script>
    <!-- Font awesome icon css -->
    <!-- Font awesome icon css -->
    <link rel="stylesheet" href="{{ url('/public/assets/css/vendors/@fortawesome/fontawesome-free/css/all.min.css') }}">
    <link rel="stylesheet"
        href="{{ url('/public/assets/css/vendors/@fortawesome/fontawesome-free/css/fontawesome.css') }}">
    <link rel="stylesheet" href="{{ url('/public/assets/css/vendors/@fortawesome/fontawesome-free/css/brands.css') }}">
    <link rel="stylesheet" href="{{ url('/public/assets/css/vendors/@fortawesome/fontawesome-free/css/solid.css') }}">
    <link rel="stylesheet" href="{{ url('/public/assets/css/vendors/@fortawesome/fontawesome-free/css/regular.css') }}">

    <!-- Ico Icon css -->
    <link rel="stylesheet" type="text/css" href="{{ url('/public/assets/css/vendors/@icon/icofont/icofont.css') }}">

    <!-- Flag Icon css -->
    <link rel="stylesheet" type="text/css" href="{{ url('/public/assets/css/vendors/flag-icon.css') }}">

    <link rel="stylesheet" type="text/css" href="{{ url('/public/assets/css/vendors/prism.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ url('/public/assets/css/vendors/scrollbar.css') }}">
    <!-- SELECT2 CSS -->
    <link rel="stylesheet" type="text/css" href="{{ url('/public/assets/css/vendors/select2/select2.min.css') }}">

    <link rel="stylesheet" type="text/css"
        href="{{ url('/public/assets/css/vendors/apexcharts/dist/apexcharts.css') }}">
    <link rel="stylesheet" type="text/css"
        href="{{ url('/public/assets/css/vendors/simple-datatables/dist/style.css') }}">

    <link rel="stylesheet" type="text/css"
        href="{{ url('/public/assets/css/vendors/datatable/jquery.dataTables.min.css') }}">

    <link rel="stylesheet" href="https://cdn.datatables.net/fixedcolumns/4.3.0/css/fixedColumns.dataTables.min.css">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">

    <!-- MonthSelect Plugin (for year picker grid) -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/plugins/monthSelect/style.css">

    <!-- Themify Icon css -->
    <link rel="stylesheet" type="text/css"
        href="{{ url('/public/assets/css/vendors/themify-icons/themify-icons/css/themify.css') }}">

    <!-- Animation css -->
    <link rel="stylesheet" type="text/css" href="{{ url('/public/assets/css/vendors/animate.css/animate.css') }}">

    <!-- Whether Icon css-->
    <link rel="stylesheet" type="text/css"
        href="{{ url('/public/assets/css/vendors/weather-icons/css/weather-icons.min.css') }}">

    <!-- App css-->
    <link rel="preload" as="style" href="{{ url('/public/build/assets/style-BQ9xLEwC.css') }}" />
    <link rel="stylesheet" href="{{ url('/public/build/assets/style-BQ9xLEwC.css') }}" data-navigate-track="reload" />
    <link id="color" rel="stylesheet" href="{{ url('/public/assets/css/color-1.css') }}" media="screen">

    <!-- Toastr css -->
    <link rel="stylesheet" type="text/css" href="{{ url('/public/assets/css/vendors/toastr.min.css') }}">

    @yield('style')
</head>

<body>

    <!-- tap to top starts-->
    <div class="tap-top">
        <svg class="feather">
            <use href="{{ url('/public/assets/svg/feather-icons/dist/feather-sprite.svg') }}#arrow-up">
            </use>
        </svg>
    </div>
    <!-- tap to tap ends-->

    <!-- loader starts-->
    <div class="loader-wrapper">
        <div class="loader"></div>
    </div>
    <!-- loader end-->

    <!-- page-wrapper Start-->
    <main class="page-wrapper horizontal-sidebar" id="pageWrapper">

        <!-- Page header start -->
        <header class="page-header row">
            <div class="logo-wrapper d-flex align-items-center col-auto"><a href=""><img class="for-light"
                        src="{{ url('/public/assets/images/logo/autonew-1.png') }}" alt="logo"><img
                        class="for-dark" src="{{ url('/public/assets/images/logo/autonew-2.png') }}"
                        alt="logo"></a><a class="close-btn" href="javascript:void(0)">
                    <div class="toggle-sidebar">
                        <div class="line"></div>
                        <div class="line"></div>
                        <div class="line"></div>
                    </div>
                </a></div>
            <div class="page-main-header col">
                <div class="header-left d-lg-block d-none">

                </div>
                <div class="nav-right">
                    <ul class="header-right">



                        {{-- <li class="d-flex align-items-center mx-2">
                            <img src="{{ url('/public/assets/images/logo/Npav-logo.svg') }}" alt="img"
                                width="100" height="52" class="rounded-circle">
                        </li> --}}

                        {{-- <p class="ms-3">|</p> --}}

                        {{-- <li class="dev-item mx-5" style="background-color: inherit;">
                            <a href="http://rt1.npav.net/dashboard?MainPrjId=2921" target="_blank">
                                <span
                                    class="d-inline-flex align-items-center rounded-pill border border-primary text-primary px-2 py-1"
                                    title="RT ID : 2921">
                                    <strong class="me-1">RT_ID</strong>
                                    <span>:</span>
                                    <span class="ms-1">2921</span>
                                </span>
                            </a>
                        </li> --}}

                        <li class="dev-item mx-5" style="background-color: inherit;">
                            <span
                                class="d-inline-flex align-items-center rounded-pill border border-info text-info px-2 py-1"
                                title="Developer">
                                <strong class="me-1">Developer</strong>
                                <span>:</span>
                                <span class="ms-1">KunalB</span>
                            </span>

                        </li>



                        <li class="modes d-flex custom-dropdown"><a class="dark-mode" href="javascript:void(0)">
                                <svg class="svg-color">
                                    <use href="{{ url('/public/assets/svg/iconly-sprite.svg') }}#Moon">
                                    </use>
                                </svg></a>
                        </li>


                        <li class="profile-dropdown custom-dropdown">
                            <div class="d-flex align-items-center"><img
                                    src="{{ url('/public/assets/images/icon/profile.png') }}" alt="">
                                <div class="flex-grow-1">
                                    <h5>{{ Auth::user()->username }}</h5>
                                    <span>{{ Auth::user()->access }}</span>
                                </div>
                            </div>
                            <div class="custom-menu overflow-hidden">
                                <ul>
                                    <li class="d-flex">
                                        <svg class="svg-color">
                                            <use href="{{ url('/public/assets/svg/iconly-sprite.svg') }}#Profile">
                                            </use>
                                        </svg><a class="ms-2" href="{{ url('/profile') }}">My
                                            Profile</a>
                                    </li>
                                    <li class="d-flex">
                                        <svg class="svg-color">
                                            <use href="{{ url('/public/assets/svg/iconly-sprite.svg') }}#Login">
                                            </use>
                                        </svg><a class="ms-2" href="{{ url('/logout') }}">Log
                                            Out</a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                    </ul>

                    <!-- PROFILE MODAL -->
                    {{-- <div class="modal fade" id="profileModallaptop1" tabindex="-1" data-bs-backdrop="static"
                        aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">

                                <div class="card social-profile mb-0">
                                    <div class="card-body text-center">

                                        <!-- Profile Photo -->
                                        <div class="social-img-wrap">
                                            <div class="social-img">
                                                <img src="{{ url('/public/assets/images/icon/profile.png') }}"
                                                    alt="profile">
                                            </div>

                                            <div class="edit-icon">
                                                <div class="icon">
                                                    <svg class="feather stroke-primary">
                                                        <use
                                                            href="{{ url('/public/assets/svg/feather-icons/dist/feather-sprite.svg') }}#check-circle">
                                                        </use>
                                                    </svg>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- USER DETAILS -->
                                        <div class="social-details mt-3">
                                            <h4 class="mb-1">{{ Auth::user()->username }}</h4>
                                            <span class="font-light">{{ Auth::user()->access }}</span>
                                        </div>

                                        <!-- TABLE DETAILS -->
                                        <div class="table-responsive text-center mt-4">
                                            <table class="table table-bordered text-start">

                                                <tr>
                                                    <th>Username</th>
                                                    <td>{{ Auth::user()->username }}</td>
                                                </tr>

                                                <tr>
                                                    <th>Access</th>
                                                    <td>{{ Auth::user()->access }}</td>
                                                </tr>

                                                <tr>
                                                    <th>IP</th>
                                                    <td>{{ Auth::user()->ip }}</td>
                                                </tr>

                                                <tr>
                                                    <th>Last Login</th>
                                                    <td>{{ Auth::user()->lastlogin }}</td>
                                                </tr>
                                            </table>
                                        </div>

                                        <!-- CLOSE BUTTON -->
                                        <div class="mt-3">
                                            <button class="btn btn-primary" data-bs-dismiss="modal">Close</button>
                                        </div>

                                    </div>
                                </div>

                            </div>
                        </div>
                    </div> --}}


                </div>
            </div>
        </header>
        <!-- Page header end-->

        <!-- Page Body Start-->
        <div class="page-body-wrapper">
