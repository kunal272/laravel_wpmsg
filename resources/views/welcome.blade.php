<!DOCTYPE html>
<html lang="en">

<head>

    <meta name="csrf-token" content="4DLvIWv06eGoHVbFBYn3x7CxS2tz1MsTeuInqwP2">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description"
        content="Edmin admin is super flexible, powerful, clean &amp; modern responsive bootstrap admin template with unlimited possibilities.">
    <meta name="keywords"
        content="admin template, Edmin admin template, best javascript admin, dashboard template, bootstrap admin template, responsive admin template, web app">
    <meta name="author" content="pixelstrap">
    <title>Edmin - Premium Admin Template</title>
    <!-- Favicon icon-->
    <link rel="icon" href="{{ url('/public/assets/images/favicon/favicon.png') }}" type="image/x-icon">
    <link rel="shortcut icon" href="{{ url('/public/assets/images/favicon/favicon.png') }}" type="image/x-icon">
    <!-- Google font-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin="">
    <link
        href="https://fonts.googleapis.com/css2?family=Outfit:wght@100;200;300;400;500;600;700;800;900&amp;display=swap"
        rel="stylesheet">

    <script>
        var baseUrl = "{{ url('/') }}";
    </script> <!-- Font awesome icon css -->
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
    <link rel="stylesheet" type="text/css"
        href="{{ url('/public/assets/css/vendors/apexcharts/dist/apexcharts.css') }}">
    <link rel="stylesheet" type="text/css"
        href="{{ url('/public/assets/css/vendors/simple-datatables/dist/style.css') }}">

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
    <main class="page-wrapper compact-wrapper" id="pageWrapper">

        <!-- Page header start -->
        <header class="page-header row">
            <div class="logo-wrapper d-flex align-items-center col-auto"><a
                    href="https://larathemes.pixelstrap.com/edmin/admin/default-dashboard"><img class="for-light"
                        src="https://larathemes.pixelstrap.com/edmin/assets/images/logo/logo.png" alt="logo"><img
                        class="for-dark" src="https://larathemes.pixelstrap.com/edmin/assets/images/logo/dark-logo.png"
                        alt="logo"></a><a class="close-btn" href="javascript:void(0)">
                    <div class="toggle-sidebar">
                        <div class="line"></div>
                        <div class="line"></div>
                        <div class="line"></div>
                    </div>
                </a></div>
            <div class="page-main-header col">
                <div class="header-left d-lg-block d-none">
                    <form class="search-form mb-0">
                        <div class="input-group"><span class="input-group-text pe-0">
                                <svg class="search-bg svg-color">
                                    <use href="{{ url('/public/assets/svg/iconly-sprite.svg') }}#Search">
                                    </use>
                                </svg></span>
                            <input class="form-control" type="text" placeholder="Search anything...">
                        </div>
                    </form>
                </div>
                <div class="nav-right">
                    <ul class="header-right">
                        <li class="modes d-flex"><a class="dark-mode">
                                <svg class="svg-color">
                                    <use href="{{ url('/public/assets/svg/iconly-sprite.svg') }}#Moon">
                                    </use>
                                </svg></a></li>
                        <li class="serchinput d-lg-none d-flex"><a class="search-mode">
                                <svg class="svg-color">
                                    <use href="{{ url('/public/assets/svg/iconly-sprite.svg') }}#Search">
                                    </use>
                                </svg></a>
                            <div class="form-group search-form">
                                <input type="text" placeholder="Search here...">
                            </div>
                        </li>
                        <!-- Notification menu-->
                        <li class="custom-dropdown"><a href="javascript:void(0)">
                                <svg class="svg-color circle-color">
                                    <use href="{{ url('/public/assets/svg/iconly-sprite.svg') }}#Bell">
                                    </use>
                                </svg></a><span class="badge rounded-pill badge-secondary">3</span>
                            <div class="custom-menu notification-dropdown py-0 overflow-hidden">
                                <h5 class="title bg-primary-light">Notifications <a
                                        href="https://larathemes.pixelstrap.com/edmin/admin/chat-private"><span
                                            class="font-primary">View</span></a></h5>
                                <ul class="activity-update">
                                    <li class="d-flex align-items-center b-l-primary">
                                        <div class="flex-grow-1"> <span>Just Now</span><a
                                                href="https://larathemes.pixelstrap.com/edmin/admin/chat-private">
                                                <h5>What`s the project report update?</h5>
                                            </a>
                                            <h6>Rick Novak</h6>
                                        </div>
                                        <div class="flex-shrink-0"> <img class="b-r-15 img-40"
                                                src="https://larathemes.pixelstrap.com/edmin/assets/images/avatar/10.jpg"
                                                alt=""></div>
                                    </li>
                                    <li class="d-flex align-items-center b-l-secondary">
                                        <div class="flex-grow-1"> <span>12:47 am</span><a
                                                href="https://larathemes.pixelstrap.com/edmin/admin/chat-private">
                                                <h5>James created changelog page</h5>
                                            </a>
                                            <h6>Susan Connor</h6>
                                        </div>
                                        <div class="flex-shrink-0"> <img class="b-r-15 img-40"
                                                src="https://larathemes.pixelstrap.com/edmin/assets/images/avatar/4.jpg"
                                                alt=""></div>
                                    </li>
                                    <li class="d-flex align-items-center b-l-tertiary">
                                        <div class="flex-grow-1"> <span>06:10 pm</span><a
                                                href="https://larathemes.pixelstrap.com/edmin/admin/chat-private">
                                                <h5>Polly edited Contact page</h5>
                                            </a>
                                            <h6>Roger Lum</h6>
                                        </div>
                                        <div class="flex-shrink-0"> <img class="b-r-15 img-40"
                                                src="https://larathemes.pixelstrap.com/edmin/assets/images/avatar/1.jpg"
                                                alt=""></div>
                                    </li>
                                    <li class="mt-3 d-flex justify-content-center">
                                        <div class="button-group"><a class="btn btn-secondary"
                                                href="https://larathemes.pixelstrap.com/edmin/admin/chat-private">All
                                                Notification</a></div>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <!-- Bookmark menu-->
                        <li class="custom-dropdown"><a href="javascript:void(0)">
                                <svg class="svg-color">
                                    <use href="{{ url('/public/assets/svg/iconly-sprite.svg') }}#Star">
                                    </use>
                                </svg></a>
                            <div class="custom-menu bookmark-dropdown py-0 overflow-hidden">
                                <h5 class="title bg-primary-light">Bookmark</h5>
                                <ul>
                                    <li>
                                        <form class="mb-3">
                                            <div class="input-group">
                                                <input class="form-control" type="text"
                                                    placeholder="Search Bookmark..."><span class="input-group-text">
                                                    <svg class="svg-color">
                                                        <use
                                                            href="{{ url('/public/assets/svg/iconly-sprite.svg') }}#Search">
                                                        </use>
                                                    </svg></span>
                                            </div>
                                        </form>
                                    </li>
                                    <li class="d-flex align-items-center bg-light-primary">
                                        <div class="flex-shrink-0 me-2"><a
                                                href="https://larathemes.pixelstrap.com/edmin/admin/default-dashboard">
                                                <svg class="svg-color stroke-primary">
                                                    <use
                                                        href="{{ url('/public/assets/svg/iconly-sprite.svg') }}#Home">
                                                    </use>
                                                </svg></a></div>
                                        <div class="d-flex justify-content-between align-items-center w-100"><a
                                                href="https://larathemes.pixelstrap.com/edmin/admin/default-dashboard">Dashboard</a>
                                            <svg class="svg-color icon-star">
                                                <use href="{{ url('/public/assets/svg/iconly-sprite.svg') }}#Star">
                                                </use>
                                            </svg>
                                        </div>
                                    </li>
                                    <li class="d-flex align-items-center bg-light-secondary">
                                        <div class="flex-shrink-0 me-2"><a
                                                href="https://larathemes.pixelstrap.com/edmin/admin/to-do">
                                                <svg class="svg-color stroke-secondary">
                                                    <use href="{{ url('/public/assets/svg/iconly-sprite.svg') }}#Pie">
                                                    </use>
                                                </svg></a></div>
                                        <div class="d-flex justify-content-between align-items-center w-100"><a
                                                href="https://larathemes.pixelstrap.com/edmin/admin/to-do">To-do</a>
                                            <svg class="svg-color icon-star">
                                                <use href="{{ url('/public/assets/svg/iconly-sprite.svg') }}#Star">
                                                </use>
                                            </svg>
                                        </div>
                                    </li>
                                    <li class="d-flex align-items-center bg-light-tertiary">
                                        <div class="flex-shrink-0 me-2"><a
                                                href="https://larathemes.pixelstrap.com/edmin/admin/chart-apex">
                                                <svg class="svg-color stroke-tertiary">
                                                    <use
                                                        href="{{ url('/public/assets/svg/iconly-sprite.svg') }}#Chart">
                                                    </use>
                                                </svg></a></div>
                                        <div class="d-flex justify-content-between align-items-center w-100"><a
                                                href="https://larathemes.pixelstrap.com/edmin/admin/chart-apex">Chart</a>
                                            <svg class="svg-color icon-star">
                                                <use href="{{ url('/public/assets/svg/iconly-sprite.svg') }}#Star">
                                                </use>
                                            </svg>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <!-- Cart menu-->
                        <li class="custom-dropdown"><a href="javascript:void(0)">
                                <svg class="svg-color">
                                    <use href="{{ url('/public/assets/svg/iconly-sprite.svg') }}#Bag">
                                    </use>
                                </svg></a>
                            <div class="custom-menu cart-dropdown py-0 overflow-hidden">
                                <h5 class="title bg-primary-light">Cart<span>Total : <span
                                            class="font-primary">4350.9</span></span></h5>
                                <ul>
                                    <li class="cartbox d-flex bg-light-primary">
                                        <div class="flex-shrink-0 border-primary"><img
                                                src="https://larathemes.pixelstrap.com/edmin/assets/images/dashboard2/product/1.png"
                                                alt="">
                                        </div>
                                        <div class="touchpin-details"><a
                                                href="https://larathemes.pixelstrap.com/edmin/admin/cart">
                                                <h5>Apple Computers</h5>
                                            </a><span>$2600.00</span>
                                            <div class="touchspin-wrapper">
                                                <button class="decrement-touchspin btn-touchspin">
                                                    <svg class="svg-color">
                                                        <use
                                                            href="{{ url('/public/assets/svg/iconly-sprite.svg') }}#minus">
                                                        </use>
                                                    </svg>
                                                </button>
                                                <input class="form-control input-touchspin bg-light-primary"
                                                    type="number" value="5">
                                                <button class="increment-touchspin btn-touchspin">
                                                    <svg class="svg-color">
                                                        <use
                                                            href="{{ url('/public/assets/svg/iconly-sprite.svg') }}#plus">
                                                        </use>
                                                    </svg>
                                                </button>
                                            </div>
                                            <button class="btn btn-close"></button>
                                        </div>
                                    </li>
                                    <li class="cartbox d-flex bg-light-secondary">
                                        <div class="flex-shrink-0 border-secondary"><img
                                                src="https://larathemes.pixelstrap.com/edmin/assets/images/dashboard2/product/2.png"
                                                alt="">
                                        </div>
                                        <div class="touchpin-details"><a
                                                href="https://larathemes.pixelstrap.com/edmin/admin/cart">
                                                <h5>Microwave</h5>
                                            </a><span>$1450.45</span>
                                            <div class="touchspin-wrapper">
                                                <button class="decrement-touchspin btn-touchspin">
                                                    <svg class="svg-color">
                                                        <use
                                                            href="{{ url('/public/assets/svg/iconly-sprite.svg') }}#minus">
                                                        </use>
                                                    </svg>
                                                </button>
                                                <input class="form-control input-touchspin bg-light-secondary"
                                                    type="number" value="5">
                                                <button class="increment-touchspin btn-touchspin">
                                                    <svg class="svg-color">
                                                        <use
                                                            href="{{ url('/public/assets/svg/iconly-sprite.svg') }}#plus">
                                                        </use>
                                                    </svg>
                                                </button>
                                            </div>
                                            <button class="btn btn-close"></button>
                                        </div>
                                    </li>
                                    <li class="cartbox d-flex bg-light-tertiary">
                                        <div class="flex-shrink-0 border-tertiary"><img
                                                src="https://larathemes.pixelstrap.com/edmin/assets/images/dashboard2/product/3.png"
                                                alt="">
                                        </div>
                                        <div class="touchpin-details"><a
                                                href="https://larathemes.pixelstrap.com/edmin/admin/cart">
                                                <h5>Mackup Kit</h5>
                                            </a><span>$300.45</span>
                                            <div class="touchspin-wrapper">
                                                <button class="decrement-touchspin btn-touchspin">
                                                    <svg class="svg-color">
                                                        <use
                                                            href="{{ url('/public/assets/svg/iconly-sprite.svg') }}#minus">
                                                        </use>
                                                    </svg>
                                                </button>
                                                <input class="form-control input-touchspin bg-light-tertiary"
                                                    type="number" value="5">
                                                <button class="increment-touchspin btn-touchspin">
                                                    <svg class="svg-color">
                                                        <use
                                                            href="{{ url('/public/assets/svg/iconly-sprite.svg') }}#plus">
                                                        </use>
                                                    </svg>
                                                </button>
                                            </div>
                                            <button class="btn btn-close"></button>
                                        </div>
                                    </li>
                                    <li class="mt-3 p-0 d-flex justify-content-center">
                                        <div><a class="btn btn-secondary"
                                                href="https://larathemes.pixelstrap.com/edmin/admin/checkout">Checkout</a>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <!-- Bookmark menu-->
                        <li class="custom-dropdown"><a href="javascript:void(0)">
                                <svg class="svg-color">
                                    <use href="{{ url('/public/assets/svg/iconly-sprite.svg') }}#Message">
                                    </use>
                                </svg></a><span class="badge rounded-pill badge-tertiary">3</span>
                            <div class="custom-menu message-dropdown py-0 overflow-hidden">
                                <h5 class="title bg-primary-light">Messages</h5>
                                <ul>
                                    <li class="d-flex b-t-primary">
                                        <div class="d-block"><a
                                                href="https://larathemes.pixelstrap.com/edmin/admin/letter-box">
                                                <h5>Design meeting</h5>
                                            </a>
                                            <h6>
                                                <svg class="feather me-1">
                                                    <use
                                                        href="{{ url('/public/assets/svg/feather-icons/dist/feather-sprite.svg') }}#clock">
                                                    </use>
                                                </svg><span>Just Now</span>
                                            </h6>
                                        </div>
                                        <div class="badge badge-light-danger">
                                            <svg class="feather me-1">
                                                <use
                                                    href="{{ url('/public/assets/svg/feather-icons/dist/feather-sprite.svg') }}#clock">
                                                </use>
                                            </svg><span>Open</span>
                                        </div>
                                    </li>
                                    <li class="d-flex b-t-secondary">
                                        <div class="d-block"><a
                                                href="https://larathemes.pixelstrap.com/edmin/admin/letter-box">
                                                <h5>Weekly scurm Meeting</h5>
                                            </a>
                                            <h6>
                                                <svg class="feather me-1">
                                                    <use
                                                        href="{{ url('/public/assets/svg/feather-icons/dist/feather-sprite.svg') }}#clock">
                                                    </use>
                                                </svg><span>1 Hour Ago</span>
                                            </h6>
                                        </div>
                                        <div class="badge badge-light-danger">
                                            <svg class="feather me-1">
                                                <use
                                                    href="{{ url('/public/assets/svg/feather-icons/dist/feather-sprite.svg') }}#clock">
                                                </use>
                                            </svg><span>Open</span>
                                        </div>
                                    </li>
                                    <li class="d-flex b-t-tertiary">
                                        <div class="d-block"><a
                                                href="https://larathemes.pixelstrap.com/edmin/admin/letter-box">
                                                <h5>Check your login page</h5>
                                            </a>
                                            <h6>
                                                <svg class="feather me-1">
                                                    <use
                                                        href="{{ url('/public/assets/svg/feather-icons/dist/feather-sprite.svg') }}#clock">
                                                    </use>
                                                </svg><span>2 Hour Ago</span>
                                            </h6>
                                        </div>
                                        <div class="badge badge-light-success">
                                            <svg class="feather me-1">
                                                <use
                                                    href="{{ url('/public/assets/svg/feather-icons/dist/feather-sprite.svg') }}#clock">
                                                </use>
                                            </svg><span>Closed</span>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <li class="profile-dropdown custom-dropdown">
                            <div class="d-flex align-items-center"><img
                                    src="https://larathemes.pixelstrap.com/edmin/assets/images/profile.png"
                                    alt="">
                                <div class="flex-grow-1">
                                    <h5>John</h5>
                                    <span>admin</span>
                                </div>
                            </div>
                            <div class="custom-menu overflow-hidden">
                                <ul>
                                    <li class="d-flex">
                                        <svg class="svg-color">
                                            <use href="{{ url('/public/assets/svg/iconly-sprite.svg') }}#Profile">
                                            </use>
                                        </svg><a class="ms-2"
                                            href="https://larathemes.pixelstrap.com/edmin/admin/edit-profile">My
                                            Profile</a>
                                    </li>
                                    <li class="d-flex">
                                        <svg class="svg-color">
                                            <use href="{{ url('/public/assets/svg/iconly-sprite.svg') }}#Message">
                                            </use>
                                        </svg><a class="ms-2"
                                            href="https://larathemes.pixelstrap.com/edmin/admin/letter-box">Inbox</a>
                                    </li>
                                    <li class="d-flex">
                                        <svg class="svg-color">
                                            <use href="{{ url('/public/assets/svg/iconly-sprite.svg') }}#Document">
                                            </use>
                                        </svg><a class="ms-2"
                                            href="https://larathemes.pixelstrap.com/edmin/admin/to-do">Task</a>
                                    </li>
                                    <li class="d-flex">
                                        <svg class="svg-color">
                                            <use href="{{ url('/public/assets/svg/iconly-sprite.svg') }}#Login">
                                            </use>
                                        </svg><a class="ms-2" href="https://larathemes.pixelstrap.com/edmin/logout"
                                            onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Log
                                            Out</a>
                                        <form action="https://larathemes.pixelstrap.com/edmin/logout" method="POST"
                                            class="d-none" id="logout-form">
                                            <input type="hidden" name="_token"
                                                value="4DLvIWv06eGoHVbFBYn3x7CxS2tz1MsTeuInqwP2" autocomplete="off">
                                        </form>
                                    </li>
                                </ul>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </header>
        <!-- Page header end-->

        <!-- Page Body Start-->
        <div class="page-body-wrapper">

            <!-- Page sidebar start-->
            <div class="overlay"></div>
            <aside class="page-sidebar" data-sidebar-layout="stroke-svg">
                <div class="left-arrow" id="left-arrow">
                    <svg class="feather">
                        <use href="{{ url('/public/assets/svg/feather-icons/dist/feather-sprite.svg') }}#arrow-left">
                        </use>
                    </svg>
                </div>
                <div id="sidebar-menu">
                    <ul class="sidebar-menu" id="simple-bar">
                        <li class="pin-title sidebar-list p-0">
                            <h5 class="sidebar-main-title">Pinned</h5>
                        </li>
                        <li class="line pin-line"></li>
                        <li class="sidebar-main-title">General</li>
                        <li class="sidebar-list">
                            <svg class="pinned-icon">
                                <use href="{{ url('/public/assets/svg/iconly-sprite.svg') }}#Pin">
                                </use>
                            </svg><a class="sidebar-link" href="javascript:void(0)">
                                <svg class="stroke-icon">
                                    <use href="{{ url('/public/assets/svg/iconly-sprite.svg') }}#Home">
                                    </use>
                                </svg><span>Dashboard</span>
                                <div class="badge badge-primary rounded-pill">3</div>
                                <svg class="feather">
                                    <use
                                        href="{{ url('/public/assets/svg/feather-icons/dist/feather-sprite.svg') }}#chevron-right">
                                    </use>
                                </svg>
                            </a>
                            <ul class="sidebar-submenu">
                                <li><a href="https://larathemes.pixelstrap.com/edmin/admin/default-dashboard">
                                        <svg class="svg-menu">
                                            <use href="{{ url('/public/assets/svg/iconly-sprite.svg') }}#right-3">
                                            </use>
                                        </svg>Default</a></li>
                                <li><a href="https://larathemes.pixelstrap.com/edmin/admin/ecommerce-dashboard">
                                        <svg class="svg-menu">
                                            <use href="{{ url('/public/assets/svg/iconly-sprite.svg') }}#right-3">
                                            </use>
                                        </svg>Ecommerce</a></li>
                                <li><a href="https://larathemes.pixelstrap.com/edmin/admin/project-dashboard">
                                        <svg class="svg-menu">
                                            <use href="{{ url('/public/assets/svg/iconly-sprite.svg') }}#right-3">
                                            </use>
                                        </svg>Project</a></li>
                            </ul>
                        </li>
                        <li class="sidebar-list">
                            <svg class="pinned-icon">
                                <use href="{{ url('/public/assets/svg/iconly-sprite.svg') }}#Pin">
                                </use>
                            </svg><a class="sidebar-link" href="javascript:void(0)">
                                <svg class="stroke-icon">
                                    <use href="{{ url('/public/assets/svg/iconly-sprite.svg') }}#Document">
                                    </use>
                                </svg><span>Laravel Example</span>
                                <svg class="feather">
                                    <use
                                        href="{{ url('/public/assets/svg/feather-icons/dist/feather-sprite.svg') }}#chevron-right">
                                    </use>
                                </svg></a>
                            <ul class="sidebar-submenu">
                                <li><a href="https://larathemes.pixelstrap.com/edmin/admin/role">
                                        <svg class="svg-menu">
                                            <use href="{{ url('/public/assets/svg/iconly-sprite.svg') }}#right-3">
                                            </use>
                                        </svg>Roles Management
                                    </a>
                                </li>
                                <li><a href="https://larathemes.pixelstrap.com/edmin/admin/user">
                                        <svg class="svg-menu">
                                            <use href="{{ url('/public/assets/svg/iconly-sprite.svg') }}#right-3">
                                            </use>
                                        </svg>Users Management
                                    </a>
                                </li>
                                <li><a href="https://larathemes.pixelstrap.com/edmin/admin/blog">
                                        <svg class="svg-menu">
                                            <use href="{{ url('/public/assets/svg/iconly-sprite.svg') }}#right-3">
                                            </use>
                                        </svg>Blogs Management
                                    </a>
                                </li>
                                <li><a href="https://larathemes.pixelstrap.com/edmin/admin/category">
                                        <svg class="svg-menu">
                                            <use href="{{ url('/public/assets/svg/iconly-sprite.svg') }}#right-3">
                                            </use>
                                        </svg>Categories Management
                                    </a>
                                </li>
                                <li><a href="https://larathemes.pixelstrap.com/edmin/admin/tag">
                                        <svg class="svg-menu">
                                            <use href="{{ url('/public/assets/svg/iconly-sprite.svg') }}#right-3">
                                            </use>
                                        </svg>Tags Management
                                    </a>
                                </li>
                                <li><a href="https://larathemes.pixelstrap.com/edmin/admin/page">
                                        <svg class="svg-menu">
                                            <use href="{{ url('/public/assets/svg/iconly-sprite.svg') }}#right-3">
                                            </use>
                                        </svg>Pages Management
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="sidebar-list">
                            <svg class="pinned-icon">
                                <use href="{{ url('/public/assets/svg/iconly-sprite.svg') }}#Pin">
                                </use>
                            </svg><a class="sidebar-link" href="javascript:void(0)">
                                <svg class="stroke-icon">
                                    <use href="{{ url('/public/assets/svg/iconly-sprite.svg') }}#Pie">
                                    </use>
                                </svg><span>Widgets</span>
                                <svg class="feather">
                                    <use
                                        href="{{ url('/public/assets/svg/feather-icons/dist/feather-sprite.svg') }}#chevron-right">
                                    </use>
                                </svg></a>
                            <ul class="sidebar-submenu">
                                <li><a href="https://larathemes.pixelstrap.com/edmin/admin/general-widget">
                                        <svg class="svg-menu">
                                            <use href="{{ url('/public/assets/svg/iconly-sprite.svg') }}#right-3">
                                            </use>
                                        </svg>General</a></li>
                                <li><a href="https://larathemes.pixelstrap.com/edmin/admin/chart-widget">
                                        <svg class="svg-menu">
                                            <use href="{{ url('/public/assets/svg/iconly-sprite.svg') }}#right-3">
                                            </use>
                                        </svg>Chart</a></li>
                            </ul>
                        </li>
                        <li class="sidebar-list">
                            <svg class="pinned-icon">
                                <use href="{{ url('/public/assets/svg/iconly-sprite.svg') }}#Pin">
                                </use>
                            </svg><a class="sidebar-link" href="javascript:void(0)">
                                <svg class="stroke-icon">
                                    <use href="{{ url('/public/assets/svg/iconly-sprite.svg') }}#Document">
                                    </use>
                                </svg><span>Page Layout</span>
                                <svg class="feather">
                                    <use
                                        href="{{ url('/public/assets/svg/feather-icons/dist/feather-sprite.svg') }}#chevron-right">
                                    </use>
                                </svg></a>
                            <ul class="sidebar-submenu">
                                <li><a href="https://larathemes.pixelstrap.com/edmin/admin/box-layout">
                                        <svg class="svg-menu">
                                            <use href="{{ url('/public/assets/svg/iconly-sprite.svg') }}#right-3">
                                            </use>
                                        </svg>Box Layout</a>
                                </li>
                                <li><a href="https://larathemes.pixelstrap.com/edmin/admin/rtl-layout">
                                        <svg class="svg-menu">
                                            <use href="{{ url('/public/assets/svg/iconly-sprite.svg') }}#right-3">
                                            </use>
                                        </svg>RTL</a>
                                </li>
                                <li>
                                    <a href="https://larathemes.pixelstrap.com/edmin/admin/dark-layout">
                                        <svg class="svg-menu">
                                            <use href="{{ url('/public/assets/svg/iconly-sprite.svg') }}#right-3">
                                            </use>
                                        </svg>Dark</a>
                                </li>
                            </ul>
                        </li>
                        <li class="line"> </li>
                        <li class="sidebar-main-title">Applications</li>
                        <li class="sidebar-list">
                            <svg class="pinned-icon">
                                <use href="{{ url('/public/assets/svg/iconly-sprite.svg') }}#Pin">
                                </use>
                            </svg><a class="sidebar-link" href="javascript:void(0)">
                                <svg class="stroke-icon">
                                    <use href="{{ url('/public/assets/svg/iconly-sprite.svg') }}#Info-circle">
                                    </use>
                                </svg><span>Project</span>
                                <svg class="feather">
                                    <use
                                        href="{{ url('/public/assets/svg/feather-icons/dist/feather-sprite.svg') }}#chevron-right">
                                    </use>
                                </svg></a>
                            <ul class="sidebar-submenu">
                                <li><a href="https://larathemes.pixelstrap.com/edmin/admin/project-list">
                                        <svg class="svg-menu">
                                            <use href="{{ url('/public/assets/svg/iconly-sprite.svg') }}#right-3">
                                            </use>
                                        </svg>Project List</a></li>
                                <li> <a href="https://larathemes.pixelstrap.com/edmin/admin/project-create">
                                        <svg class="svg-menu">
                                            <use href="{{ url('/public/assets/svg/iconly-sprite.svg') }}#right-3">
                                            </use>
                                        </svg>Create New</a></li>
                            </ul>
                        </li>
                        <li class="sidebar-list">
                            <svg class="pinned-icon">
                                <use href="{{ url('/public/assets/svg/iconly-sprite.svg') }}#Pin">
                                </use>
                            </svg><a class="sidebar-link"
                                href="https://larathemes.pixelstrap.com/edmin/admin/file-manager">
                                <svg class="stroke-icon">
                                    <use href="{{ url('/public/assets/svg/iconly-sprite.svg') }}#Paper">
                                    </use>
                                </svg><span>File Manager</span></a>
                        </li>
                        <li class="sidebar-list">
                            <svg class="pinned-icon">
                                <use href="{{ url('/public/assets/svg/iconly-sprite.svg') }}#Pin">
                                </use>
                            </svg><a class="sidebar-link" href="https://larathemes.pixelstrap.com/edmin/admin/kanban">
                                <svg class="stroke-icon">
                                    <use href="{{ url('/public/assets/svg/iconly-sprite.svg') }}#Wallet">
                                    </use>
                                </svg><span>Kanban Board</span></a>
                        </li>
                        <li class="sidebar-list">
                            <svg class="pinned-icon">
                                <use href="{{ url('/public/assets/svg/iconly-sprite.svg') }}#Pin">
                                </use>
                            </svg><a class="sidebar-link" href="javascript:void(0)">
                                <svg class="stroke-icon">
                                    <use href="{{ url('/public/assets/svg/iconly-sprite.svg') }}#Bag">
                                    </use>
                                </svg><span>Ecommerce</span>
                                <svg class="feather">
                                    <use
                                        href="{{ url('/public/assets/svg/feather-icons/dist/feather-sprite.svg') }}#chevron-right">
                                    </use>
                                </svg></a>
                            <ul class="sidebar-submenu">
                                <li><a href="https://larathemes.pixelstrap.com/edmin/admin/products">
                                        <svg class="svg-menu">
                                            <use href="{{ url('/public/assets/svg/iconly-sprite.svg') }}#right-3">
                                            </use>
                                        </svg>Product</a></li>
                                <li><a href="https://larathemes.pixelstrap.com/edmin/admin/product-page">
                                        <svg class="svg-menu">
                                            <use href="{{ url('/public/assets/svg/iconly-sprite.svg') }}#right-3">
                                            </use>
                                        </svg>Product Page </a></li>
                                <li><a href="https://larathemes.pixelstrap.com/edmin/admin/add-products">
                                        <svg class="svg-menu">
                                            <use href="{{ url('/public/assets/svg/iconly-sprite.svg') }}#right-3">
                                            </use>
                                        </svg>Add Product </a></li>
                                <li><a href="https://larathemes.pixelstrap.com/edmin/admin/list-products">
                                        <svg class="svg-menu">
                                            <use href="{{ url('/public/assets/svg/iconly-sprite.svg') }}#right-3">
                                            </use>
                                        </svg>Product List</a></li>
                                <li><a href="https://larathemes.pixelstrap.com/edmin/admin/payment-details">
                                        <svg class="svg-menu">
                                            <use href="{{ url('/public/assets/svg/iconly-sprite.svg') }}#right-3">
                                            </use>
                                        </svg>Payment Details </a></li>
                                <li><a href="https://larathemes.pixelstrap.com/edmin/admin/order-history">
                                        <svg class="svg-menu">
                                            <use href="{{ url('/public/assets/svg/iconly-sprite.svg') }}#right-3">
                                            </use>
                                        </svg>Order History </a></li>
                                <li><a class="submenu-title" href="javascript:void(0)">
                                        <svg class="svg-menu">
                                            <use href="{{ url('/public/assets/svg/iconly-sprite.svg') }}#right-3">
                                            </use>
                                        </svg>Invoice
                                        <svg class="feather">
                                            <use
                                                href="{{ url('/public/assets/svg/feather-icons/dist/feather-sprite.svg') }}#chevron-right">
                                            </use>
                                        </svg></a>
                                    <ul class="according-submenu">
                                        <li><a href="https://larathemes.pixelstrap.com/edmin/admin/invoice-1">
                                                Invoice-1</a></li>
                                        <li><a href="https://larathemes.pixelstrap.com/edmin/admin/invoice-2">
                                                Invoice-2</a></li>
                                        <li><a href="https://larathemes.pixelstrap.com/edmin/admin/invoice-3">
                                                Invoice-3</a></li>
                                        <li><a href="https://larathemes.pixelstrap.com/edmin/admin/invoice-4">
                                                Invoice-4</a></li>
                                        <li><a href="https://larathemes.pixelstrap.com/edmin/admin/invoice-5">
                                                Invoice-5</a></li>
                                        <li><a href="https://larathemes.pixelstrap.com/edmin/admin/invoice-6">
                                                Invoice-6</a></li>
                                    </ul>
                                </li>
                                <li><a href="https://larathemes.pixelstrap.com/edmin/admin/cart">
                                        <svg class="svg-menu">
                                            <use href="{{ url('/public/assets/svg/iconly-sprite.svg') }}#right-3">
                                            </use>
                                        </svg>Cart </a></li>
                                <li><a href="https://larathemes.pixelstrap.com/edmin/admin/list-wish">
                                        <svg class="svg-menu">
                                            <use href="{{ url('/public/assets/svg/iconly-sprite.svg') }}#right-3">
                                            </use>
                                        </svg>Wishlist </a></li>
                                <li><a href="https://larathemes.pixelstrap.com/edmin/admin/checkout">
                                        <svg class="svg-menu">
                                            <use href="{{ url('/public/assets/svg/iconly-sprite.svg') }}#right-3">
                                            </use>
                                        </svg>Checkout </a></li>
                                <li><a href="https://larathemes.pixelstrap.com/edmin/admin/pricing">
                                        <svg class="svg-menu">
                                            <use href="{{ url('/public/assets/svg/iconly-sprite.svg') }}#right-3">
                                            </use>
                                        </svg>Pricing</a></li>
                            </ul>
                        </li>
                        <li class="sidebar-list">
                            <svg class="pinned-icon">
                                <use href="{{ url('/public/assets/svg/iconly-sprite.svg') }}#Pin">
                                </use>
                            </svg><a class="sidebar-link"
                                href="https://larathemes.pixelstrap.com/edmin/admin/letter-box">
                                <svg class="stroke-icon">
                                    <use href="{{ url('/public/assets/svg/iconly-sprite.svg') }}#Message">
                                    </use>
                                </svg><span>Letter Box</span></a>
                        </li>
                        <li class="sidebar-list">
                            <svg class="pinned-icon">
                                <use href="{{ url('/public/assets/svg/iconly-sprite.svg') }}#Pin">
                                </use>
                            </svg><a class="sidebar-link" href="javascript:void(0)">
                                <svg class="stroke-icon">
                                    <use href="{{ url('/public/assets/svg/iconly-sprite.svg') }}#Chat">
                                    </use>
                                </svg><span>Chat</span>
                                <svg class="feather">
                                    <use
                                        href="{{ url('/public/assets/svg/feather-icons/dist/feather-sprite.svg') }}#chevron-right">
                                    </use>
                                </svg></a>
                            <ul class="sidebar-submenu">
                                <li><a href="https://larathemes.pixelstrap.com/edmin/admin/chat-private">
                                        <svg class="svg-menu">
                                            <use href="{{ url('/public/assets/svg/iconly-sprite.svg') }}#right-3">
                                            </use>
                                        </svg>Private Chat</a></li>
                                <li><a href="https://larathemes.pixelstrap.com/edmin/admin/chat-group">
                                        <svg class="svg-menu">
                                            <use href="{{ url('/public/assets/svg/iconly-sprite.svg') }}#right-3">
                                            </use>
                                        </svg>Group Chat</a></li>
                            </ul>
                        </li>
                        <li class="sidebar-list">
                            <svg class="pinned-icon">
                                <use href="{{ url('/public/assets/svg/iconly-sprite.svg') }}#Pin">
                                </use>
                            </svg><a class="sidebar-link" href="javascript:void(0)">
                                <svg class="stroke-icon">
                                    <use href="{{ url('/public/assets/svg/iconly-sprite.svg') }}#Profile">
                                    </use>
                                </svg><span>Users</span>
                                <svg class="feather">
                                    <use
                                        href="{{ url('/public/assets/svg/feather-icons/dist/feather-sprite.svg') }}#chevron-right">
                                    </use>
                                </svg></a>
                            <ul class="sidebar-submenu">
                                <li><a href="https://larathemes.pixelstrap.com/edmin/admin/profile">
                                        <svg class="svg-menu">
                                            <use href="{{ url('/public/assets/svg/iconly-sprite.svg') }}#right-3">
                                            </use>
                                        </svg>User Profile</a></li>
                                <li><a href="https://larathemes.pixelstrap.com/edmin/admin/cards">
                                        <svg class="svg-menu">
                                            <use href="{{ url('/public/assets/svg/iconly-sprite.svg') }}#right-3">
                                            </use>
                                        </svg>User Cards</a></li>
                            </ul>
                        </li>
                        <li class="sidebar-list">
                            <svg class="pinned-icon">
                                <use href="{{ url('/public/assets/svg/iconly-sprite.svg') }}#Pin">
                                </use>
                            </svg><a class="sidebar-link"
                                href="https://larathemes.pixelstrap.com/edmin/admin/bookmark">
                                <svg class="stroke-icon">
                                    <use href="{{ url('/public/assets/svg/iconly-sprite.svg') }}#Bookmark">
                                    </use>
                                </svg><span>Bookmarks</span></a>
                        </li>
                        <li class="sidebar-list">
                            <svg class="pinned-icon">
                                <use href="{{ url('/public/assets/svg/iconly-sprite.svg') }}#Pin">
                                </use>
                            </svg><a class="sidebar-link"
                                href="https://larathemes.pixelstrap.com/edmin/admin/contacts">
                                <svg class="stroke-icon">
                                    <use href="{{ url('/public/assets/svg/iconly-sprite.svg') }}#Contacts">
                                    </use>
                                </svg><span>Contacts</span></a>
                        </li>
                        <li class="sidebar-list">
                            <svg class="pinned-icon">
                                <use href="{{ url('/public/assets/svg/iconly-sprite.svg') }}#Pin">
                                </use>
                            </svg><a class="sidebar-link" href="https://larathemes.pixelstrap.com/edmin/admin/task">
                                <svg class="stroke-icon">
                                    <use href="{{ url('/public/assets/svg/iconly-sprite.svg') }}#Tick-square">
                                    </use>
                                </svg><span>Tasks </span></a>
                        </li>
                        <li class="sidebar-list">
                            <svg class="pinned-icon">
                                <use href="{{ url('/public/assets/svg/iconly-sprite.svg') }}#Pin">
                                </use>
                            </svg><a class="sidebar-link"
                                href="https://larathemes.pixelstrap.com/edmin/admin/calendar-basic">
                                <svg class="stroke-icon">
                                    <use href="{{ url('/public/assets/svg/iconly-sprite.svg') }}#Calendar">
                                    </use>
                                </svg><span>Calendar</span></a>
                        </li>
                        <li class="sidebar-list">
                            <svg class="pinned-icon">
                                <use href="{{ url('/public/assets/svg/iconly-sprite.svg') }}#Pin">
                                </use>
                            </svg><a class="sidebar-link"
                                href="https://larathemes.pixelstrap.com/edmin/admin/social-app">
                                <svg class="stroke-icon">
                                    <use href="{{ url('/public/assets/svg/iconly-sprite.svg') }}#Camera">
                                    </use>
                                </svg><span>Social App </span></a>
                        </li>
                        <li class="sidebar-list">
                            <svg class="pinned-icon">
                                <use href="{{ url('/public/assets/svg/iconly-sprite.svg') }}#Pin">
                                </use>
                            </svg><a class="sidebar-link" href="https://larathemes.pixelstrap.com/edmin/admin/to-do">
                                <svg class="stroke-icon">
                                    <use href="{{ url('/public/assets/svg/iconly-sprite.svg') }}#Edit">
                                    </use>
                                </svg><span>To-Do </span></a>
                        </li>
                        <li class="sidebar-list">
                            <svg class="pinned-icon">
                                <use href="{{ url('/public/assets/svg/iconly-sprite.svg') }}#Pin">
                                </use>
                            </svg><a class="sidebar-link" href="https://larathemes.pixelstrap.com/edmin/admin/search">
                                <svg class="stroke-icon">
                                    <use href="{{ url('/public/assets/svg/iconly-sprite.svg') }}#Search">
                                    </use>
                                </svg><span>Search Result</span></a>
                        </li>
                        <li class="line"></li>
                        <li class="sidebar-main-title">Components</li>
                        <li class="sidebar-list">
                            <svg class="pinned-icon">
                                <use href="{{ url('/public/assets/svg/iconly-sprite.svg') }}#Pin">
                                </use>
                            </svg><a class="sidebar-link"
                                href="https://larathemes.pixelstrap.com/edmin/admin/buttons">
                                <svg class="stroke-icon">
                                    <use href="{{ url('/public/assets/svg/iconly-sprite.svg') }}#More-box">
                                    </use>
                                </svg><span>Buttons </span></a>
                        </li>
                        <li class="sidebar-list">
                            <svg class="pinned-icon">
                                <use href="{{ url('/public/assets/svg/iconly-sprite.svg') }}#Pin">
                                </use>
                            </svg><a class="sidebar-link" href="javascript:void(0)">
                                <svg class="stroke-icon">
                                    <use href="{{ url('/public/assets/svg/iconly-sprite.svg') }}#Folder">
                                    </use>
                                </svg><span>Ui Kits</span>
                                <svg class="feather">
                                    <use
                                        href="{{ url('/public/assets/svg/feather-icons/dist/feather-sprite.svg') }}#chevron-right">
                                    </use>
                                </svg></a>
                            <ul class="sidebar-submenu">
                                <li><a href="https://larathemes.pixelstrap.com/edmin/admin/typography">
                                        <svg class="svg-menu">
                                            <use href="{{ url('/public/assets/svg/iconly-sprite.svg') }}#right-3">
                                            </use>
                                        </svg>Typography</a></li>
                                <li><a href="https://larathemes.pixelstrap.com/edmin/admin/avatars">
                                        <svg class="svg-menu">
                                            <use href="{{ url('/public/assets/svg/iconly-sprite.svg') }}#right-3">
                                            </use>
                                        </svg>Avatars</a></li>
                                <li><a href="https://larathemes.pixelstrap.com/edmin/admin/grid">
                                        <svg class="svg-menu">
                                            <use href="{{ url('/public/assets/svg/iconly-sprite.svg') }}#right-3">
                                            </use>
                                        </svg>Grid</a></li>
                                <li><a href="https://larathemes.pixelstrap.com/edmin/admin/helper-classes">
                                        <svg class="svg-menu">
                                            <use href="{{ url('/public/assets/svg/iconly-sprite.svg') }}#right-3">
                                            </use>
                                        </svg>Helper Classes</a></li>
                                <li><a href="https://larathemes.pixelstrap.com/edmin/admin/pills-tag">
                                        <svg class="svg-menu">
                                            <use href="{{ url('/public/assets/svg/iconly-sprite.svg') }}#right-3">
                                            </use>
                                        </svg>Tag & Pills</a></li>
                                <li><a href="https://larathemes.pixelstrap.com/edmin/admin/progress-bar">
                                        <svg class="svg-menu">
                                            <use href="{{ url('/public/assets/svg/iconly-sprite.svg') }}#right-3">
                                            </use>
                                        </svg>Progress</a></li>
                                <li><a href="https://larathemes.pixelstrap.com/edmin/admin/popover">
                                        <svg class="svg-menu">
                                            <use href="{{ url('/public/assets/svg/iconly-sprite.svg') }}#right-3">
                                            </use>
                                        </svg>Popover</a></li>
                                <li><a href="https://larathemes.pixelstrap.com/edmin/admin/tooltip">
                                        <svg class="svg-menu">
                                            <use href="{{ url('/public/assets/svg/iconly-sprite.svg') }}#right-3">
                                            </use>
                                        </svg>Tooltip</a></li>
                                <li><a href="https://larathemes.pixelstrap.com/edmin/admin/alert">
                                        <svg class="svg-menu">
                                            <use href="{{ url('/public/assets/svg/iconly-sprite.svg') }}#right-3">
                                            </use>
                                        </svg>Alert</a></li>
                                <li><a href="https://larathemes.pixelstrap.com/edmin/admin/modal">
                                        <svg class="svg-menu">
                                            <use href="{{ url('/public/assets/svg/iconly-sprite.svg') }}#right-3">
                                            </use>
                                        </svg>Modal</a></li>
                                <li><a href="https://larathemes.pixelstrap.com/edmin/admin/dropdown">
                                        <svg class="svg-menu">
                                            <use href="{{ url('/public/assets/svg/iconly-sprite.svg') }}#right-3">
                                            </use>
                                        </svg>Dropdown</a></li>
                                <li><a href="https://larathemes.pixelstrap.com/edmin/admin/according">
                                        <svg class="svg-menu">
                                            <use href="{{ url('/public/assets/svg/iconly-sprite.svg') }}#right-3">
                                            </use>
                                        </svg>Accordion</a></li>
                                <li><a href="https://larathemes.pixelstrap.com/edmin/admin/tabs">
                                        <svg class="svg-menu">
                                            <use href="{{ url('/public/assets/svg/iconly-sprite.svg') }}#right-3">
                                            </use>
                                        </svg>Tabs</a></li>
                                <li><a href="https://larathemes.pixelstrap.com/edmin/admin/list">
                                        <svg class="svg-menu">
                                            <use href="{{ url('/public/assets/svg/iconly-sprite.svg') }}#right-3">
                                            </use>
                                        </svg>Lists</a></li>
                            </ul>
                        </li>
                        <li class="sidebar-list">
                            <svg class="pinned-icon">
                                <use href="{{ url('/public/assets/svg/iconly-sprite.svg') }}#Pin">
                                </use>
                            </svg><a class="sidebar-link" href="javascript:void(0)">
                                <svg class="stroke-icon">
                                    <use href="{{ url('/public/assets/svg/iconly-sprite.svg') }}#Ticket-star">
                                    </use>
                                </svg><span>Bonus Ui</span>
                                <svg class="feather">
                                    <use
                                        href="{{ url('/public/assets/svg/feather-icons/dist/feather-sprite.svg') }}#chevron-right">
                                    </use>
                                </svg></a>
                            <ul class="sidebar-submenu">
                                <li><a href="https://larathemes.pixelstrap.com/edmin/admin/scrollable">
                                        <svg class="svg-menu">
                                            <use href="{{ url('/public/assets/svg/iconly-sprite.svg') }}#right-3">
                                            </use>
                                        </svg>Scrollable </a></li>
                                <li><a href="https://larathemes.pixelstrap.com/edmin/admin/breadcrumb">
                                        <svg class="svg-menu">
                                            <use href="{{ url('/public/assets/svg/iconly-sprite.svg') }}#right-3">
                                            </use>
                                        </svg>Breadcrumb</a></li>
                                <li><a href="https://larathemes.pixelstrap.com/edmin/admin/pagination">
                                        <svg class="svg-menu">
                                            <use href="{{ url('/public/assets/svg/iconly-sprite.svg') }}#right-3">
                                            </use>
                                        </svg>Pagination</a></li>
                                <li><a href="https://larathemes.pixelstrap.com/edmin/admin/ribbons">
                                        <svg class="svg-menu">
                                            <use href="{{ url('/public/assets/svg/iconly-sprite.svg') }}#right-3">
                                            </use>
                                        </svg>Ribbons</a></li>
                                <li><a href="https://larathemes.pixelstrap.com/edmin/admin/tree">
                                        <svg class="svg-menu">
                                            <use href="{{ url('/public/assets/svg/iconly-sprite.svg') }}#right-3">
                                            </use>
                                        </svg>Tree View</a></li>
                                <li><a href="https://larathemes.pixelstrap.com/edmin/admin/toasts">
                                        <svg class="svg-menu">
                                            <use href="{{ url('/public/assets/svg/iconly-sprite.svg') }}#right-3">
                                            </use>
                                        </svg>Toast</a></li>
                                <li><a href="https://larathemes.pixelstrap.com/edmin/admin/rating">
                                        <svg class="svg-menu">
                                            <use href="{{ url('/public/assets/svg/iconly-sprite.svg') }}#right-3">
                                            </use>
                                        </svg>Rating</a></li>
                                <li><a href="https://larathemes.pixelstrap.com/edmin/admin/dropzone">
                                        <svg class="svg-menu">
                                            <use href="{{ url('/public/assets/svg/iconly-sprite.svg') }}#right-3">
                                            </use>
                                        </svg>Dropzone</a></li>
                                <li><a href="https://larathemes.pixelstrap.com/edmin/admin/tour">
                                        <svg class="svg-menu">
                                            <use href="{{ url('/public/assets/svg/iconly-sprite.svg') }}#right-3">
                                            </use>
                                        </svg>Tour</a></li>
                                <li><a href="https://larathemes.pixelstrap.com/edmin/admin/sweet-alert2">
                                        <svg class="svg-menu">
                                            <use href="{{ url('/public/assets/svg/iconly-sprite.svg') }}#right-3">
                                            </use>
                                        </svg>Sweetalert2</a></li>
                                <li><a href="https://larathemes.pixelstrap.com/edmin/admin/animation-modal">
                                        <svg class="svg-menu">
                                            <use href="{{ url('/public/assets/svg/iconly-sprite.svg') }}#right-3">
                                            </use>
                                        </svg>Animated Modal</a></li>
                                <li><a href="https://larathemes.pixelstrap.com/edmin/admin/sliders">
                                        <svg class="svg-menu">
                                            <use href="{{ url('/public/assets/svg/iconly-sprite.svg') }}#right-3">
                                            </use>
                                        </svg>Slider</a></li>
                                <li><a href="https://larathemes.pixelstrap.com/edmin/admin/range-slider">
                                        <svg class="svg-menu">
                                            <use href="{{ url('/public/assets/svg/iconly-sprite.svg') }}#right-3">
                                            </use>
                                        </svg>Range Slider</a></li>
                                <li><a href="https://larathemes.pixelstrap.com/edmin/admin/image-cropper">
                                        <svg class="svg-menu">
                                            <use href="{{ url('/public/assets/svg/iconly-sprite.svg') }}#right-3">
                                            </use>
                                        </svg>Image Cropper</a></li>
                                <li><a href="https://larathemes.pixelstrap.com/edmin/admin/basic-card">
                                        <svg class="svg-menu">
                                            <use href="{{ url('/public/assets/svg/iconly-sprite.svg') }}#right-3">
                                            </use>
                                        </svg>Basic Card</a></li>
                                <li><a href="https://larathemes.pixelstrap.com/edmin/admin/creative-card">
                                        <svg class="svg-menu">
                                            <use href="{{ url('/public/assets/svg/iconly-sprite.svg') }}#right-3">
                                            </use>
                                        </svg>Creative Card</a></li>
                                <li><a href="https://larathemes.pixelstrap.com/edmin/admin/dragable-card">
                                        <svg class="svg-menu">
                                            <use href="{{ url('/public/assets/svg/iconly-sprite.svg') }}#right-3">
                                            </use>
                                        </svg>Draggable Card</a></li>
                                <li><a href="https://larathemes.pixelstrap.com/edmin/admin/timeline">
                                        <svg class="svg-menu">
                                            <use href="{{ url('/public/assets/svg/iconly-sprite.svg') }}#right-3">
                                            </use>
                                        </svg>Timeline</a></li>
                            </ul>
                        </li>
                        <li class="sidebar-list">
                            <svg class="pinned-icon">
                                <use href="{{ url('/public/assets/svg/iconly-sprite.svg') }}#Pin">
                                </use>
                            </svg><a class="sidebar-link" href="javascript:void(0)">
                                <svg class="stroke-icon">
                                    <use href="{{ url('/public/assets/svg/iconly-sprite.svg') }}#Category">
                                    </use>
                                </svg><span>Animation</span>
                                <svg class="feather">
                                    <use
                                        href="{{ url('/public/assets/svg/feather-icons/dist/feather-sprite.svg') }}#chevron-right">
                                    </use>
                                </svg></a>
                            <ul class="sidebar-submenu">
                                <li><a href="https://larathemes.pixelstrap.com/edmin/admin/wow">
                                        <svg class="svg-menu">
                                            <use href="{{ url('/public/assets/svg/iconly-sprite.svg') }}#right-3">
                                            </use>
                                        </svg>Wow Animation</a></li>
                                <li><a href="https://larathemes.pixelstrap.com/edmin/admin/aos">
                                        <svg class="svg-menu">
                                            <use href="{{ url('/public/assets/svg/iconly-sprite.svg') }}#right-3">
                                            </use>
                                        </svg>AOS Animation</a></li>
                            </ul>
                        </li>
                        <li class="sidebar-list">
                            <svg class="pinned-icon">
                                <use href="{{ url('/public/assets/svg/iconly-sprite.svg') }}#Pin">
                                </use>
                            </svg><a class="sidebar-link" href="javascript:void(0)">
                                <svg class="stroke-icon">
                                    <use href="{{ url('/public/assets/svg/iconly-sprite.svg') }}#Activity">
                                    </use>
                                </svg><span>Icons</span>
                                <svg class="feather">
                                    <use
                                        href="{{ url('/public/assets/svg/feather-icons/dist/feather-sprite.svg') }}#chevron-right">
                                    </use>
                                </svg></a>
                            <ul class="sidebar-submenu">
                                <li><a href="https://larathemes.pixelstrap.com/edmin/admin/flag-icon">
                                        <svg class="svg-menu">
                                            <use href="{{ url('/public/assets/svg/iconly-sprite.svg') }}#right-3">
                                            </use>
                                        </svg>Flag Icon</a></li>
                                <li><a href="https://larathemes.pixelstrap.com/edmin/admin/font-awesome">
                                        <svg class="svg-menu">
                                            <use href="{{ url('/public/assets/svg/iconly-sprite.svg') }}#right-3">
                                            </use>
                                        </svg>Fontawesome Icon</a></li>
                                <li><a href="https://larathemes.pixelstrap.com/edmin/admin/feather-icon">
                                        <svg class="svg-menu">
                                            <use href="{{ url('/public/assets/svg/iconly-sprite.svg') }}#right-3">
                                            </use>
                                        </svg>Feather Icon</a></li>
                                <li><a href="https://larathemes.pixelstrap.com/edmin/admin/iconly-icon">
                                        <svg class="svg-menu">
                                            <use href="{{ url('/public/assets/svg/iconly-sprite.svg') }}#right-3">
                                            </use>
                                        </svg>Iconly Icon</a></li>
                                <li><a href="https://larathemes.pixelstrap.com/edmin/admin/ico-icon">
                                        <svg class="svg-menu">
                                            <use href="{{ url('/public/assets/svg/iconly-sprite.svg') }}#right-3">
                                            </use>
                                        </svg>Ico Icon</a></li>
                                <li><a href="https://larathemes.pixelstrap.com/edmin/admin/themify-icon">
                                        <svg class="svg-menu">
                                            <use href="{{ url('/public/assets/svg/iconly-sprite.svg') }}#right-3">
                                            </use>
                                        </svg>Themify icon</a></li>
                                <li><a href="https://larathemes.pixelstrap.com/edmin/admin/whether-icon">
                                        <svg class="svg-menu">
                                            <use href="{{ url('/public/assets/svg/iconly-sprite.svg') }}#right-3">
                                            </use>
                                        </svg>Whether Icon</a></li>
                            </ul>
                        </li>
                        <li class="sidebar-list">
                            <svg class="pinned-icon">
                                <use href="{{ url('/public/assets/svg/iconly-sprite.svg') }}#Pin">
                                </use>
                            </svg><a class="sidebar-link" href="javascript:void(0)">
                                <svg class="stroke-icon">
                                    <use href="{{ url('/public/assets/svg/iconly-sprite.svg') }}#Chart">
                                    </use>
                                </svg><span>Charts</span>
                                <svg class="feather">
                                    <use
                                        href="{{ url('/public/assets/svg/feather-icons/dist/feather-sprite.svg') }}#chevron-right">
                                    </use>
                                </svg></a>
                            <ul class="sidebar-submenu">
                                <li><a href="https://larathemes.pixelstrap.com/edmin/admin/chart-apex">
                                        <svg class="svg-menu">
                                            <use href="{{ url('/public/assets/svg/iconly-sprite.svg') }}#right-3">
                                            </use>
                                        </svg>Apexchart</a></li>
                                <li><a href="https://larathemes.pixelstrap.com/edmin/admin/chartist">
                                        <svg class="svg-menu">
                                            <use href="{{ url('/public/assets/svg/iconly-sprite.svg') }}#right-3">
                                            </use>
                                        </svg>Chartist</a></li>
                                <li><a href="https://larathemes.pixelstrap.com/edmin/admin/chartjs">
                                        <svg class="svg-menu">
                                            <use href="{{ url('/public/assets/svg/iconly-sprite.svg') }}#right-3">
                                            </use>
                                        </svg>Chartjs</a></li>
                            </ul>
                        </li>
                        <li class="line"></li>
                        <li class="sidebar-main-title">Forms & table</li>
                        <li class="sidebar-list">
                            <svg class="pinned-icon">
                                <use href="{{ url('/public/assets/svg/iconly-sprite.svg') }}#Pin">
                                </use>
                            </svg><a class="sidebar-link" href="javascript:void(0)">
                                <svg class="stroke-icon">
                                    <use href="{{ url('/public/assets/svg/iconly-sprite.svg') }}#Filter">
                                    </use>
                                </svg><span>Form Controls</span>
                                <svg class="feather">
                                    <use
                                        href="{{ url('/public/assets/svg/feather-icons/dist/feather-sprite.svg') }}#chevron-right">
                                    </use>
                                </svg></a>
                            <ul class="sidebar-submenu">
                                <li><a href="https://larathemes.pixelstrap.com/edmin/admin/base-input">
                                        <svg class="svg-menu">
                                            <use href="{{ url('/public/assets/svg/iconly-sprite.svg') }}#right-3">
                                            </use>
                                        </svg>Base Input</a></li>
                                <li><a href="https://larathemes.pixelstrap.com/edmin/admin/radio-checkbox-control">
                                        <svg class="svg-menu">
                                            <use href="{{ url('/public/assets/svg/iconly-sprite.svg') }}#right-3">
                                            </use>
                                        </svg>Check & Radio Box</a></li>
                                <li><a href="https://larathemes.pixelstrap.com/edmin/admin/input-group">
                                        <svg class="svg-menu">
                                            <use href="{{ url('/public/assets/svg/iconly-sprite.svg') }}#right-3">
                                            </use>
                                        </svg>Input Groups</a></li>
                                <li><a href="https://larathemes.pixelstrap.com/edmin/admin/megaoptions">
                                        <svg class="svg-menu">
                                            <use href="{{ url('/public/assets/svg/iconly-sprite.svg') }}#right-3">
                                            </use>
                                        </svg>Mega Options</a></li>
                                <li><a href="https://larathemes.pixelstrap.com/edmin/admin/form-validation">
                                        <svg class="svg-menu">
                                            <use href="{{ url('/public/assets/svg/iconly-sprite.svg') }}#right-3">
                                            </use>
                                        </svg>Form validation</a></li>
                            </ul>
                        </li>
                        <li class="sidebar-list">
                            <svg class="pinned-icon">
                                <use href="{{ url('/public/assets/svg/iconly-sprite.svg') }}#Pin">
                                </use>
                            </svg><a class="sidebar-link" href="javascript:void(0)">
                                <svg class="stroke-icon">
                                    <use href="{{ url('/public/assets/svg/iconly-sprite.svg') }}#Scan">
                                    </use>
                                </svg><span>Form Widgets</span>
                                <svg class="feather">
                                    <use
                                        href="{{ url('/public/assets/svg/feather-icons/dist/feather-sprite.svg') }}#chevron-right">
                                    </use>
                                </svg></a>
                            <ul class="sidebar-submenu">
                                <li><a href="https://larathemes.pixelstrap.com/edmin/admin/datepicker">
                                        <svg class="svg-menu">
                                            <use href="{{ url('/public/assets/svg/iconly-sprite.svg') }}#right-3">
                                            </use>
                                        </svg>Date picker </a></li>
                                <li><a href="https://larathemes.pixelstrap.com/edmin/admin/touchspin">
                                        <svg class="svg-menu">
                                            <use href="{{ url('/public/assets/svg/iconly-sprite.svg') }}#right-3">
                                            </use>
                                        </svg>Touchspin</a></li>
                                <li><a href="https://larathemes.pixelstrap.com/edmin/admin/select2">
                                        <svg class="svg-menu">
                                            <use href="{{ url('/public/assets/svg/iconly-sprite.svg') }}#right-3">
                                            </use>
                                        </svg>select 2</a></li>
                                <li><a href="https://larathemes.pixelstrap.com/edmin/admin/switch">
                                        <svg class="svg-menu">
                                            <use href="{{ url('/public/assets/svg/iconly-sprite.svg') }}#right-3">
                                            </use>
                                        </svg>Switch</a></li>
                                <li><a href="https://larathemes.pixelstrap.com/edmin/admin/typeahead">
                                        <svg class="svg-menu">
                                            <use href="{{ url('/public/assets/svg/iconly-sprite.svg') }}#right-3">
                                            </use>
                                        </svg>Typeahead</a></li>
                                <li><a href="https://larathemes.pixelstrap.com/edmin/admin/clipboard">
                                        <svg class="svg-menu">
                                            <use href="{{ url('/public/assets/svg/iconly-sprite.svg') }}#right-3">
                                            </use>
                                        </svg>Clipboard</a></li>
                            </ul>
                        </li>
                        <li class="sidebar-list">
                            <svg class="pinned-icon">
                                <use href="{{ url('/public/assets/svg/iconly-sprite.svg') }}#Pin">
                                </use>
                            </svg><a class="sidebar-link" href="javascript:void(0)">
                                <svg class="stroke-icon">
                                    <use href="{{ url('/public/assets/svg/iconly-sprite.svg') }}#Icon-plus">
                                    </use>
                                </svg><span>Form Layout</span>
                                <svg class="feather">
                                    <use
                                        href="{{ url('/public/assets/svg/feather-icons/dist/feather-sprite.svg') }}#chevron-right">
                                    </use>
                                </svg></a>
                            <ul class="sidebar-submenu">
                                <li><a href="https://larathemes.pixelstrap.com/edmin/admin/form-wizard">
                                        <svg class="svg-menu">
                                            <use href="{{ url('/public/assets/svg/iconly-sprite.svg') }}#right-3">
                                            </use>
                                        </svg>Form wizard 1</a></li>
                                <li><a href="https://larathemes.pixelstrap.com/edmin/admin/two-form-wizard">
                                        <svg class="svg-menu">
                                            <use href="{{ url('/public/assets/svg/iconly-sprite.svg') }}#right-3">
                                            </use>
                                        </svg>Form wizard 2</a></li>
                                <li><a href="https://larathemes.pixelstrap.com/edmin/admin/two-factor">
                                        <svg class="svg-menu">
                                            <use href="{{ url('/public/assets/svg/iconly-sprite.svg') }}#right-3">
                                            </use>
                                        </svg>Two Factor</a></li>
                            </ul>
                        </li>
                        <li class="sidebar-list">
                            <svg class="pinned-icon">
                                <use href="{{ url('/public/assets/svg/iconly-sprite.svg') }}#Pin">
                                </use>
                            </svg><a class="sidebar-link" href="javascript:void(0)">
                                <svg class="stroke-icon">
                                    <use href="{{ url('/public/assets/svg/iconly-sprite.svg') }}#Edit-line">
                                    </use>
                                </svg><span>Tables</span>
                                <svg class="feather">
                                    <use
                                        href="{{ url('/public/assets/svg/feather-icons/dist/feather-sprite.svg') }}#chevron-right">
                                    </use>
                                </svg></a>
                            <ul class="sidebar-submenu">
                                <li><a class="submenu-title" href="javascript:void(0)">
                                        <svg class="svg-menu">
                                            <use href="{{ url('/public/assets/svg/iconly-sprite.svg') }}#right-3">
                                            </use>
                                        </svg>Bootstrap Table
                                        <svg class="feather">
                                            <use
                                                href="{{ url('/public/assets/svg/feather-icons/dist/feather-sprite.svg') }}#chevron-right">
                                            </use>
                                        </svg></a>
                                    <ul class="according-submenu">
                                        <li><a
                                                href="https://larathemes.pixelstrap.com/edmin/admin/bootstrap-basic-table">
                                                Basic Tables</a></li>
                                        <li><a href="https://larathemes.pixelstrap.com/edmin/admin/table-components">
                                                Table Components</a></li>
                                    </ul>
                                </li>
                                <li><a class="submenu-title" href="javascript:void(0)">
                                        <svg class="svg-menu">
                                            <use href="{{ url('/public/assets/svg/iconly-sprite.svg') }}#right-3">
                                            </use>
                                        </svg>Data Tables
                                        <svg class="feather">
                                            <use
                                                href="{{ url('/public/assets/svg/feather-icons/dist/feather-sprite.svg') }}#chevron-right">
                                            </use>
                                        </svg></a>
                                    <ul class="according-submenu">
                                        <li><a
                                                href="https://larathemes.pixelstrap.com/edmin/admin/datatable-basic-init">
                                                Basic Init</a></li>
                                        <li><a
                                                href="https://larathemes.pixelstrap.com/edmin/admin/datatable-advance-init">
                                                Advance Init</a></li>
                                        <li><a href="https://larathemes.pixelstrap.com/edmin/admin/datatable-api">
                                                API</a></li>
                                        <li><a
                                                href="https://larathemes.pixelstrap.com/edmin/admin/datatable-data-source">
                                                Data Sources</a></li>
                                    </ul>
                                </li>
                                <li><a href="https://larathemes.pixelstrap.com/edmin/admin/datatable-ext-autofill">
                                        <svg class="svg-menu">
                                            <use href="{{ url('/public/assets/svg/iconly-sprite.svg') }}#right-3">
                                            </use>
                                        </svg>Ex. Data Tables</a></li>
                                <li><a href="https://larathemes.pixelstrap.com/edmin/admin/jsgrid-table">
                                        <svg class="svg-menu">
                                            <use href="{{ url('/public/assets/svg/iconly-sprite.svg') }}#right-3">
                                            </use>
                                        </svg>Js Grid Table</a></li>
                            </ul>
                        </li>
                        <li class="line"> </li>
                        <li class="sidebar-main-title">Pages</li>
                        <li class="sidebar-list">
                            <svg class="pinned-icon">
                                <use href="{{ url('/public/assets/svg/iconly-sprite.svg') }}#Pin">
                                </use>
                            </svg><a class="sidebar-link"
                                href="https://larathemes.pixelstrap.com/edmin/admin/sample-page">
                                <svg class="stroke-icon">
                                    <use href="{{ url('/public/assets/svg/iconly-sprite.svg') }}#Paper-plus">
                                    </use>
                                </svg><span>Sample Page</span></a>
                        </li>
                        <li class="sidebar-list">
                            <svg class="pinned-icon">
                                <use href="{{ url('/public/assets/svg/iconly-sprite.svg') }}#Pin">
                                </use>
                            </svg><a class="sidebar-link"
                                href="https://larathemes.pixelstrap.com/edmin/admin/translate">
                                <svg class="stroke-icon">
                                    <use href="{{ url('/public/assets/svg/iconly-sprite.svg') }}#Play">
                                    </use>
                                </svg><span>Translate</span></a>
                        </li>
                        <li class="sidebar-list">
                            <svg class="pinned-icon">
                                <use href="{{ url('/public/assets/svg/iconly-sprite.svg') }}#Pin">
                                </use>
                            </svg><a class="sidebar-link" href="javascript:void(0)">
                                <svg class="stroke-icon">
                                    <use href="{{ url('/public/assets/svg/iconly-sprite.svg') }}#Password">
                                    </use>
                                </svg><span>Others</span>
                                <svg class="feather">
                                    <use
                                        href="{{ url('/public/assets/svg/feather-icons/dist/feather-sprite.svg') }}#chevron-right">
                                    </use>
                                </svg></a>
                            <ul class="sidebar-submenu">
                                <li><a class="submenu-title" href="javascript:void(0)">
                                        <svg class="svg-menu">
                                            <use href="{{ url('/public/assets/svg/iconly-sprite.svg') }}#right-3">
                                            </use>
                                        </svg>Error Page
                                        <svg class="feather">
                                            <use
                                                href="{{ url('/public/assets/svg/feather-icons/dist/feather-sprite.svg') }}#chevron-right">
                                            </use>
                                        </svg></a>
                                    <ul class="according-submenu">
                                        <li><a href="https://larathemes.pixelstrap.com/edmin/admin/error-page1">
                                                Error Page 1</a></li>
                                        <li><a href="https://larathemes.pixelstrap.com/edmin/admin/error-page2">
                                                Error Page 2</a></li>
                                        <li><a href="https://larathemes.pixelstrap.com/edmin/admin/error-page3">
                                                Error Page 3</a></li>
                                        <li><a href="https://larathemes.pixelstrap.com/edmin/admin/error-page4">
                                                Error Page 4</a></li>
                                        <li><a href="https://larathemes.pixelstrap.com/edmin/admin/error-page5">
                                                Error Page 5</a></li>
                                        <li><a href="https://larathemes.pixelstrap.com/edmin/admin/error-page6">
                                                Error Page 6</a></li>
                                    </ul>
                                </li>
                                <li><a class="submenu-title" href="javascript:void(0)">
                                        <svg class="svg-menu">
                                            <use href="{{ url('/public/assets/svg/iconly-sprite.svg') }}#right-3">
                                            </use>
                                        </svg>Authentication
                                        <svg class="feather">
                                            <use
                                                href="{{ url('/public/assets/svg/feather-icons/dist/feather-sprite.svg') }}#chevron-right">
                                            </use>
                                        </svg></a>
                                    <ul class="according-submenu">
                                        <li><a href="https://larathemes.pixelstrap.com/edmin/login">
                                                Login simple</a></li>
                                        <li><a href="https://larathemes.pixelstrap.com/edmin/admin/login-one">
                                                Login With Bg Image</a></li>
                                        <li><a href="https://larathemes.pixelstrap.com/edmin/admin/login-two">
                                                Login With Image Two</a></li>
                                        <li><a
                                                href="https://larathemes.pixelstrap.com/edmin/admin/login-bs-validation">
                                                Login With Validation</a></li>
                                        <li><a
                                                href="https://larathemes.pixelstrap.com/edmin/admin/login-bs-tt-validation">
                                                Login With Tooltip</a></li>
                                        <li><a
                                                href="https://larathemes.pixelstrap.com/edmin/admin/login-sa-validation">
                                                Login With Sweetalert</a></li>
                                        <li><a href="https://larathemes.pixelstrap.com/edmin/admin/sign-up">
                                                Register Simple</a></li>
                                        <li><a href="https://larathemes.pixelstrap.com/edmin/admin/sign-up-one">
                                                Register With Bg Image</a></li>
                                        <li><a href="https://larathemes.pixelstrap.com/edmin/admin/sign-up-two">
                                                Register With Image Two</a></li>
                                        <li><a href="https://larathemes.pixelstrap.com/edmin/admin/sign-up-wizard">
                                                Register Wizard</a></li>
                                        <li><a href="https://larathemes.pixelstrap.com/edmin/admin/unlock">
                                                Unlock User</a></li>
                                        <li><a href="https://larathemes.pixelstrap.com/edmin/admin/forget-password">
                                                Forget Password</a></li>
                                        <li><a href="https://larathemes.pixelstrap.com/edmin/admin/reset-password">
                                                Reset Password</a></li>
                                        <li><a href="https://larathemes.pixelstrap.com/edmin/admin/maintenance">
                                                Maintenance</a></li>
                                    </ul>
                                </li>
                                <li><a class="submenu-title" href="javascript:void(0)">
                                        <svg class="svg-menu">
                                            <use href="{{ url('/public/assets/svg/iconly-sprite.svg') }}#right-3">
                                            </use>
                                        </svg>Coming Soon
                                        <svg class="feather">
                                            <use
                                                href="{{ url('/public/assets/svg/feather-icons/dist/feather-sprite.svg') }}#chevron-right">
                                            </use>
                                        </svg></a>
                                    <ul class="according-submenu">
                                        <li><a href="https://larathemes.pixelstrap.com/edmin/admin/comingsoon">
                                                Coming Simple</a></li>
                                        <li><a
                                                href="https://larathemes.pixelstrap.com/edmin/admin/comingsoon-bg-video">
                                                Coming With Bg Video</a></li>
                                        <li><a href="https://larathemes.pixelstrap.com/edmin/admin/comingsoon-bg-img">
                                                Coming With Bg Image</a></li>
                                    </ul>
                                </li>
                                <li><a class="submenu-title" href="javascript:void(0)">
                                        <svg class="svg-menu">
                                            <use href="{{ url('/public/assets/svg/iconly-sprite.svg') }}#right-3">
                                            </use>
                                        </svg>Email Template
                                        <svg class="feather">
                                            <use
                                                href="{{ url('/public/assets/svg/feather-icons/dist/feather-sprite.svg') }}#chevron-right">
                                            </use>
                                        </svg></a>
                                    <ul class="according-submenu">
                                        <li><a href="https://larathemes.pixelstrap.com/edmin/admin/basic-template">
                                                Basic Email</a></li>
                                        <li><a href="https://larathemes.pixelstrap.com/edmin/admin/email-header">
                                                Basic With Header</a></li>
                                        <li><a href="https://larathemes.pixelstrap.com/edmin/admin/template-email">
                                                Ecomerce Template</a></li>
                                        <li><a href="https://larathemes.pixelstrap.com/edmin/admin/template-email-2">
                                                Email Template 2</a></li>
                                        <li><a
                                                href="https://larathemes.pixelstrap.com/edmin/admin/ecommerce-templates">
                                                Ecommerce Email</a></li>
                                        <li><a
                                                href="https://larathemes.pixelstrap.com/edmin/admin/email-order-success">
                                                Order Success </a></li>
                                    </ul>
                                </li>
                            </ul>
                        </li>
                        <li class="line"> </li>
                        <li class="sidebar-main-title">MISCELLANEOUS</li>
                        <li class="sidebar-list">
                            <svg class="pinned-icon">
                                <use href="{{ url('/public/assets/svg/iconly-sprite.svg') }}#Pin">
                                </use>
                            </svg><a class="sidebar-link" href="javascript:void(0)">
                                <svg class="stroke-icon">
                                    <use href="{{ url('/public/assets/svg/iconly-sprite.svg') }}#Gallery">
                                    </use>
                                </svg><span>Gallery</span>
                                <svg class="feather">
                                    <use
                                        href="{{ url('/public/assets/svg/feather-icons/dist/feather-sprite.svg') }}#chevron-right">
                                    </use>
                                </svg></a>
                            <ul class="sidebar-submenu">
                                <li><a href="https://larathemes.pixelstrap.com/edmin/admin/gallery">
                                        <svg class="svg-menu">
                                            <use href="{{ url('/public/assets/svg/iconly-sprite.svg') }}#right-3">
                                            </use>
                                        </svg>Gallery Grid</a></li>
                                <li><a href="https://larathemes.pixelstrap.com/edmin/admin/with-description">
                                        <svg class="svg-menu">
                                            <use href="{{ url('/public/assets/svg/iconly-sprite.svg') }}#right-3">
                                            </use>
                                        </svg>Gallery Grid Desc</a></li>
                                <li><a href="https://larathemes.pixelstrap.com/edmin/admin/masonry">
                                        <svg class="svg-menu">
                                            <use href="{{ url('/public/assets/svg/iconly-sprite.svg') }}#right-3">
                                            </use>
                                        </svg>Masonry Gallery</a></li>
                                <li><a href="https://larathemes.pixelstrap.com/edmin/admin/swith-disc-masonry">
                                        <svg class="svg-menu">
                                            <use href="{{ url('/public/assets/svg/iconly-sprite.svg') }}#right-3">
                                            </use>
                                        </svg>Masonry With Desc</a></li>
                                <li><a href="https://larathemes.pixelstrap.com/edmin/admin/hover">
                                        <svg class="svg-menu">
                                            <use href="{{ url('/public/assets/svg/iconly-sprite.svg') }}#right-3">
                                            </use>
                                        </svg>Hover Effects</a></li>
                            </ul>
                        </li>
                        <li class="sidebar-list">
                            <svg class="pinned-icon">
                                <use href="{{ url('/public/assets/svg/iconly-sprite.svg') }}#Pin">
                                </use>
                            </svg><a class="sidebar-link" href="javascript:void(0)">
                                <svg class="stroke-icon">
                                    <use href="{{ url('/public/assets/svg/iconly-sprite.svg') }}#Game">
                                    </use>
                                </svg><span>Blog</span>
                                <svg class="feather">
                                    <use
                                        href="{{ url('/public/assets/svg/feather-icons/dist/feather-sprite.svg') }}#chevron-right">
                                    </use>
                                </svg></a>
                            <ul class="sidebar-submenu">
                                <li><a href="https://larathemes.pixelstrap.com/edmin/admin/details-blog">
                                        <svg class="svg-menu">
                                            <use href="{{ url('/public/assets/svg/iconly-sprite.svg') }}#right-3">
                                            </use>
                                        </svg>Blog Details</a></li>
                                <li><a href="https://larathemes.pixelstrap.com/edmin/admin/single-blog">
                                        <svg class="svg-menu">
                                            <use href="{{ url('/public/assets/svg/iconly-sprite.svg') }}#right-3">
                                            </use>
                                        </svg>Blog Single</a></li>
                                <li><a href="https://larathemes.pixelstrap.com/edmin/admin/add-post">
                                        <svg class="svg-menu">
                                            <use href="{{ url('/public/assets/svg/iconly-sprite.svg') }}#right-3">
                                            </use>
                                        </svg>Add Post</a></li>
                            </ul>
                        </li>
                        <li class="sidebar-list">
                            <svg class="pinned-icon">
                                <use href="{{ url('/public/assets/svg/iconly-sprite.svg') }}#Pin">
                                </use>
                            </svg><a class="sidebar-link" href="https://larathemes.pixelstrap.com/edmin/admin/faq">
                                <svg class="stroke-icon">
                                    <use href="{{ url('/public/assets/svg/iconly-sprite.svg') }}#Danger">
                                    </use>
                                </svg><span>FAQ</span></a>
                        </li>
                        <li class="sidebar-list">
                            <svg class="pinned-icon">
                                <use href="{{ url('/public/assets/svg/iconly-sprite.svg') }}#Pin">
                                </use>
                            </svg><a class="sidebar-link" href="javascript:void(0)">
                                <svg class="stroke-icon">
                                    <use href="{{ url('/public/assets/svg/iconly-sprite.svg') }}#Filter-2">
                                    </use>
                                </svg><span>Job Search</span>
                                <svg class="feather">
                                    <use
                                        href="{{ url('/public/assets/svg/feather-icons/dist/feather-sprite.svg') }}#chevron-right">
                                    </use>
                                </svg></a>
                            <ul class="sidebar-submenu">
                                <li><a href="https://larathemes.pixelstrap.com/edmin/admin/job-cards-view">
                                        <svg class="svg-menu">
                                            <use href="{{ url('/public/assets/svg/iconly-sprite.svg') }}#right-3">
                                            </use>
                                        </svg>Cards View</a></li>
                                <li><a href="https://larathemes.pixelstrap.com/edmin/admin/job-list-view">
                                        <svg class="svg-menu">
                                            <use href="{{ url('/public/assets/svg/iconly-sprite.svg') }}#right-3">
                                            </use>
                                        </svg>List View</a></li>
                                <li><a href="https://larathemes.pixelstrap.com/edmin/admin/job-details">
                                        <svg class="svg-menu">
                                            <use href="{{ url('/public/assets/svg/iconly-sprite.svg') }}#right-3">
                                            </use>
                                        </svg>Job Details</a></li>
                                <li><a href="https://larathemes.pixelstrap.com/edmin/admin/job-apply">
                                        <svg class="svg-menu">
                                            <use href="{{ url('/public/assets/svg/iconly-sprite.svg') }}#right-3">
                                            </use>
                                        </svg>Apply</a></li>
                            </ul>
                        </li>
                        <li class="sidebar-list">
                            <svg class="pinned-icon">
                                <use href="{{ url('/public/assets/svg/iconly-sprite.svg') }}#Pin">
                                </use>
                            </svg><a class="sidebar-link" href="javascript:void(0)">
                                <svg class="stroke-icon">
                                    <use href="{{ url('/public/assets/svg/iconly-sprite.svg') }}#Work">
                                    </use>
                                </svg><span>Learning</span>
                                <svg class="feather">
                                    <use
                                        href="{{ url('/public/assets/svg/feather-icons/dist/feather-sprite.svg') }}#chevron-right">
                                    </use>
                                </svg></a>
                            <ul class="sidebar-submenu">
                                <li><a href="https://larathemes.pixelstrap.com/edmin/admin/learning-list-view">
                                        <svg class="svg-menu">
                                            <use href="{{ url('/public/assets/svg/iconly-sprite.svg') }}#right-3">
                                            </use>
                                        </svg>Learning List</a></li>
                                <li><a href="https://larathemes.pixelstrap.com/edmin/admin/learning-detailed">
                                        <svg class="svg-menu">
                                            <use href="{{ url('/public/assets/svg/iconly-sprite.svg') }}#right-3">
                                            </use>
                                        </svg>Detailed Course</a></li>
                            </ul>
                        </li>
                        <li class="sidebar-list">
                            <svg class="pinned-icon">
                                <use href="{{ url('/public/assets/svg/iconly-sprite.svg') }}#Pin">
                                </use>
                            </svg><a class="sidebar-link" href="javascript:void(0)">
                                <svg class="pinned-icon">
                                    <use href="{{ url('/public/assets/svg/iconly-sprite.svg') }}#Pin">
                                    </use>
                                </svg>
                                <svg class="stroke-icon">
                                    <use href="{{ url('/public/assets/svg/iconly-sprite.svg') }}#Discovery">
                                    </use>
                                </svg><span>Maps</span>
                                <svg class="feather">
                                    <use
                                        href="{{ url('/public/assets/svg/feather-icons/dist/feather-sprite.svg') }}#chevron-right">
                                    </use>
                                </svg></a>
                            <ul class="sidebar-submenu">
                                <li><a href="https://larathemes.pixelstrap.com/edmin/admin/data-map">
                                        <svg class="svg-menu">
                                            <use href="{{ url('/public/assets/svg/iconly-sprite.svg') }}#right-3">
                                            </use>
                                        </svg>Data Maps</a></li>
                                <li><a href="https://larathemes.pixelstrap.com/edmin/admin/vector-map">
                                        <svg class="svg-menu">
                                            <use href="{{ url('/public/assets/svg/iconly-sprite.svg') }}#right-3">
                                            </use>
                                        </svg>Vector Maps</a></li>
                            </ul>
                        </li>
                        <li class="sidebar-list">
                            <svg class="pinned-icon">
                                <use href="{{ url('/public/assets/svg/iconly-sprite.svg') }}#Pin">
                                </use>
                            </svg><a class="sidebar-link" href="javascript:void(0)">
                                <svg class="stroke-icon">
                                    <use href="{{ url('/public/assets/svg/iconly-sprite.svg') }}#Shield">
                                    </use>
                                </svg><span>Editors</span>
                                <svg class="feather">
                                    <use
                                        href="{{ url('/public/assets/svg/feather-icons/dist/feather-sprite.svg') }}#chevron-right">
                                    </use>
                                </svg></a>
                            <ul class="sidebar-submenu">
                                <li> <a href="https://larathemes.pixelstrap.com/edmin/admin/quill-editor">
                                        <svg class="svg-menu">
                                            <use href="{{ url('/public/assets/svg/iconly-sprite.svg') }}#right-3">
                                            </use>
                                        </svg>Quilljs Editor</a></li>
                                <li><a href="https://larathemes.pixelstrap.com/edmin/admin/ace-code-editor">
                                        <svg class="svg-menu">
                                            <use href="{{ url('/public/assets/svg/iconly-sprite.svg') }}#right-3">
                                            </use>
                                        </svg>ACE Code Editor</a></li>
                            </ul>
                        </li>
                        <li class="sidebar-list">
                            <svg class="pinned-icon">
                                <use href="{{ url('/public/assets/svg/iconly-sprite.svg') }}#Pin">
                                </use>
                            </svg><a class="sidebar-link"
                                href="https://larathemes.pixelstrap.com/edmin/admin/knowledgebase">
                                <svg class="stroke-icon">
                                    <use href="{{ url('/public/assets/svg/iconly-sprite.svg') }}#Setting">
                                    </use>
                                </svg><span>Knowledgebase</span></a>
                        </li>
                        <li class="sidebar-list">
                            <svg class="pinned-icon">
                                <use href="{{ url('/public/assets/svg/iconly-sprite.svg') }}#Pin">
                                </use>
                            </svg><a class="sidebar-link"
                                href="https://larathemes.pixelstrap.com/edmin/admin/support-ticket">
                                <svg class="stroke-icon">
                                    <use href="{{ url('/public/assets/svg/iconly-sprite.svg') }}#Ticket">
                                    </use>
                                </svg><span>Support Ticket</span></a>
                        </li>
                    </ul>
                </div>
                <div class="right-arrow" id="right-arrow">
                    <svg class="feather">
                        <use
                            href="{{ url('/public/assets/svg/feather-icons/dist/feather-sprite.svg') }}#arrow-right">
                        </use>
                    </svg>
                </div>
            </aside>
            <!-- Page sidebar end-->

            <div class="page-body">
                <div class="container-fluid">
                    <div class="row page-title">
                        <div class="col-sm-6">
                            <h3>Default dashboard</h3>
                        </div>
                        <div class="col-sm-6">
                            <nav>
                                <ol class="breadcrumb justify-content-sm-end align-items-center">
                                    <li class="breadcrumb-item"> <a
                                            href="https://larathemes.pixelstrap.com/edmin/admin/default-dashboard">
                                            <svg class="svg-color">
                                                {{-- <use href="{{ url('/public/assets/svg/iconly-sprite.svg') }}#Home">
                                                </use> --}}
                                            </svg></a></li>
                                    <li class="breadcrumb-item">Dashboard</li>
                                    <li class="breadcrumb-item active">Default</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
                <div class="container-fluid default-dashboard">
                    <div class="row">
                        <div class="col-sm-6 col-xl-4">
                            <div class="card profile-greeting card-hover">
                                <div class="card-body">
                                    <div class="img-overlay">
                                        <h1>Good day, Lena Miller</h1>
                                        <p>Welcome to the Edmin family! We are delighted that you have
                                            visited our dashboard.</p><a class="btn btn-primary"
                                            href="https://larathemes.pixelstrap.com/edmin/admin/pricing">Go
                                            Premium</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-xl-3">
                            <div class="card project-card">
                                <div class="card-header">
                                    <h4>Project Overview</h4>
                                    <div class="dropdown icon-dropdown">
                                        <button class="btn dropdown-toggle" id="userdropdown7" type="button"
                                            data-bs-toggle="dropdown" aria-expanded="false"><i
                                                class="icon-more-alt"></i></button>
                                        <div class="dropdown-menu dropdown-menu-end"
                                            aria-labelledby="userdropdown7"><a class="dropdown-item"
                                                href="#">Weekly</a><a class="dropdown-item"
                                                href="#">Monthly</a><a class="dropdown-item"
                                                href="#">Yearly</a></div>
                                    </div>
                                </div>
                                <div class="card-body pt-0">
                                    <h4>56<span class="ms-1">Project</span></h4>
                                    <div class="row align-items-center">
                                        <div class="col-5 custom-width">
                                            <div class="progress progress-striped-primary">
                                                <div class="progress-bar" style="width: 55%" role="progressbar"
                                                    aria-valuenow="10" aria-valuemin="0" aria-valuemax="100">
                                                </div>
                                            </div>
                                            <div class="progress progress-striped-secondary">
                                                <div class="progress-bar" style="width: 60%" role="progressbar"
                                                    aria-valuenow="10" aria-valuemin="0" aria-valuemax="100">
                                                </div>
                                            </div>
                                            <div class="progress progress-striped-tertiary">
                                                <div class="progress-bar" style="width: 45%" role="progressbar"
                                                    aria-valuenow="10" aria-valuemin="0" aria-valuemax="100">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-7 d-sm-none d-md-block">
                                            <ul class="overview-details">
                                                <li class="d-flex align-items-center">
                                                    <div class="circle-dot-primary"><span></span></div>
                                                    <h5>15<span class="font-light ms-1">Signed</span>
                                                    </h5>
                                                </li>
                                                <li class="d-flex align-items-center">
                                                    <div class="circle-dot-secondary"><span></span>
                                                    </div>
                                                    <h5>62<span class="font-light ms-1">Manager
                                                            Review</span></h5>
                                                </li>
                                                <li class="d-flex align-items-center">
                                                    <div class="circle-dot-tertiary"><span></span></div>
                                                    <h5>20<span class="font-light ms-1">Client
                                                            Review</span></h5>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <button class="view-btn btn bg-light d-block w-100 position-relative"
                                        type="button" data-bs-toggle="dropdown" aria-expanded="false">View
                                        project
                                        <svg class="feather">
                                            <use
                                                href="{{ url('/public/assets/svg/feather-icons/dist/feather-sprite.svg') }}#chevron-down">
                                            </use>
                                        </svg>
                                        <ul class="dropdown-menu dropdown-block">
                                            <li><a class="dropdown-item" href="#">Project</a></li>
                                            <li><a class="dropdown-item" href="#">Ecommerce</a>
                                            </li>
                                            <li><a class="dropdown-item" href="#">Crypto</a></li>
                                        </ul>
                                    </button>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-xl-2">
                            <div class="row">
                                <div class="col-6 col-sm-12">
                                    <div class="card client-card card-hover">
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-6 custom-width-1">
                                                    <h3 class="font-primary">457</h3>
                                                    <h5 class="f-w-600">Total Clients</h5>
                                                </div>
                                                <div class="col-6 custom-width-2">
                                                    <div class="client" id="client"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-6 col-sm-12">
                                    <div class="card client-card card-hover">
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-6 custom-width-1">
                                                    <h3 class="font-secondary">541</h3>
                                                    <h5 class="f-w-600">New Project</h5>
                                                </div>
                                                <div class="col-6 custom-width-2">
                                                    <div class="project" id="project"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-xl-3">
                            <div class="card investing-card">
                                <div class="card-header pb-0">
                                    <h4>Investing</h4>
                                    <div class="dropdown icon-dropdown">
                                        <button class="btn dropdown-toggle" id="userdropdown3" type="button"
                                            data-bs-toggle="dropdown" aria-expanded="false"><i
                                                class="icon-more-alt"></i></button>
                                        <div class="dropdown-menu dropdown-menu-end"
                                            aria-labelledby="userdropdown3"><a class="dropdown-item"
                                                href="#">Weekly</a><a class="dropdown-item"
                                                href="#">Monthly</a><a class="dropdown-item"
                                                href="#">Yearly</a></div>
                                    </div>
                                </div>
                                <div class="card-body p-0">
                                    <div class="investing" id="investing"></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-xl-6">
                            <!-- Invoice menu-->
                            <div class="card invoice-card">
                                <div class="card-header pb-0">
                                    <h4>All Invoices</h4>
                                    <div class="dropdown icon-dropdown">
                                        <button class="btn dropdown-toggle" id="userdropdown4" type="button"
                                            data-bs-toggle="dropdown" aria-expanded="false"><i
                                                class="icon-more-alt"></i></button>
                                        <div class="dropdown-menu dropdown-menu-end"
                                            aria-labelledby="userdropdown4"><a class="dropdown-item"
                                                href="#">Weekly</a><a class="dropdown-item"
                                                href="#">Monthly</a><a class="dropdown-item"
                                                href="#">Yearly</a></div>
                                    </div>
                                </div>
                                <div class="card-body invoice-table checkbox-checked">
                                    <div class="table-responsive">
                                        <table class="table" id="all-invoice">
                                            <thead>
                                                <tr>
                                                    <th class="form-check">
                                                        <input class="form-check-input" type="checkbox">
                                                    </th>
                                                    <th>Invoice Id</th>
                                                    <th>Client Name</th>
                                                    <th>Project</th>
                                                    <th>Created Date</th>
                                                    <th>Amount </th>
                                                    <th>Status</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>
                                                        <input class="form-check-input" type="checkbox">
                                                    </td>
                                                    <td>#IH63390</td>
                                                    <td>
                                                        <div class="d-flex align-items-center gap-2">
                                                            <div class="flex-shrink-0"><img class="b-r-10"
                                                                    src="https://larathemes.pixelstrap.com/edmin/assets/images/avatar/10.jpg"
                                                                    alt="">
                                                            </div>
                                                            <div class="flex-grow-1"><a
                                                                    href="https://larathemes.pixelstrap.com/edmin/admin/profile">
                                                                    <h6 class="f-w-500">Elle Amberson
                                                                    </h6>
                                                                </a><span
                                                                    class="font-light f-w-400 f-13">Elle34@gmail.com</span>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td>Website</td>
                                                    <td>10-10-2024</td>
                                                    <td>$5411.55</td>
                                                    <td>
                                                        <button
                                                            class="btn edge-btn f-13 w-100 btn-light-primary">Done</button>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <input class="form-check-input" type="checkbox">
                                                    </td>
                                                    <td>#F749U8</td>
                                                    <td>
                                                        <div class="d-flex align-items-center gap-2">
                                                            <div class="flex-shrink-0"><img class="b-r-10"
                                                                    src="https://larathemes.pixelstrap.com/edmin/assets/images/avatar/11.jpg"
                                                                    alt=""></div>
                                                            <div class="flex-grow-1"><a
                                                                    href="https://larathemes.pixelstrap.com/edmin/admin/profile">
                                                                    <h6 class="f-w-500">Anna Catmire
                                                                    </h6>
                                                                </a><span
                                                                    class="font-light f-w-400 f-13">Anna12@gmail.com</span>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td>Mobile App</td>
                                                    <td>15-09-2024</td>
                                                    <td>$6589.36</td>
                                                    <td>
                                                        <button
                                                            class="btn edge-btn f-13 w-100 btn-light-tertiary">Pending</button>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <input class="form-check-input" type="checkbox">
                                                    </td>
                                                    <td>#RT5094</td>
                                                    <td>
                                                        <div class="d-flex align-items-center gap-2">
                                                            <div class="flex-shrink-0"><img class="b-r-10"
                                                                    src="https://larathemes.pixelstrap.com/edmin/assets/images/avatar/1.jpg"
                                                                    alt=""></div>
                                                            <div class="flex-grow-1"><a
                                                                    href="https://larathemes.pixelstrap.com/edmin/admin/profile">
                                                                    <h6 class="f-w-500">Laura Dagson
                                                                    </h6>
                                                                </a><span
                                                                    class="font-light f-w-400 f-13">Laura@gmail.com</span>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td>Wordpress</td>
                                                    <td>23-05-2024</td>
                                                    <td>$9655.16</td>
                                                    <td>
                                                        <button
                                                            class="btn edge-btn f-13 w-100 btn-light-primary">Done</button>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <input class="form-check-input" type="checkbox">
                                                    </td>
                                                    <td>#PZ7384</td>
                                                    <td>
                                                        <div class="d-flex align-items-center gap-2">
                                                            <div class="flex-shrink-0"><img class="b-r-10"
                                                                    src="https://larathemes.pixelstrap.com/edmin/assets/images/avatar/3.jpg"
                                                                    alt=""></div>
                                                            <div class="flex-grow-1"><a
                                                                    href="https://larathemes.pixelstrap.com/edmin/admin/profile">
                                                                    <h6 class="f-w-500">Rachel Green
                                                                    </h6>
                                                                </a><span
                                                                    class="font-light f-w-400 f-13">Rache87@gmail.com</span>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td>Service</td>
                                                    <td>15-02-2024</td>
                                                    <td>$5984.62</td>
                                                    <td>
                                                        <button
                                                            class="btn edge-btn f-13 w-100 btn-light-danger">Overdue</button>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-xl-3">
                            <!-- invest menu-->
                            <div class="card invest-card">
                                <div class="card-header">
                                    <h4>Total Investment</h4>
                                    <div class="dropdown icon-dropdown">
                                        <button class="btn dropdown-toggle" id="userdropdown2" type="button"
                                            data-bs-toggle="dropdown" aria-expanded="false"><i
                                                class="icon-more-alt"></i></button>
                                        <div class="dropdown-menu dropdown-menu-end"
                                            aria-labelledby="userdropdown2"><a class="dropdown-item"
                                                href="#">Weekly</a><a class="dropdown-item"
                                                href="#">Monthly</a><a class="dropdown-item"
                                                href="#">Yearly</a></div>
                                    </div>
                                </div>
                                <div class="card-body p-0">
                                    <div id="investment"></div>
                                    <ul>
                                        <li>
                                            <h5>Total</h5>
                                            <h6>$ 34,4562</h6>
                                        </li>
                                        <li>
                                            <h5>Monthly</h5>
                                            <h6>$ 12,463</h6>
                                        </li>
                                        <li>
                                            <h5>Daily</h5>
                                            <h6>$ 5000</h6>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-xl-3">
                            <!-- Task menu-->
                            <div class="card task-card">
                                <div class="card-header pb-0">
                                    <h4>Task list</h4>
                                    <div class="dropdown icon-dropdown">
                                        <button class="btn dropdown-toggle" id="userdropdown" type="button"
                                            data-bs-toggle="dropdown" aria-expanded="false"><i
                                                class="icon-more-alt"></i></button>
                                        <div class="dropdown-menu dropdown-menu-end" aria-labelledby="userdropdown">
                                            <a class="dropdown-item" href="#">Weekly</a><a
                                                class="dropdown-item" href="#">Monthly</a><a
                                                class="dropdown-item" href="#">Yearly</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body filled-checkbox">
                                    <ul>
                                        <li class="d-flex line-primary">
                                            <div class="flex-shrink-0">
                                                <div class="form-check checkbox checkbox-solid-primary">
                                                    <input class="form-check-input" type="checkbox"
                                                        id="solid5">
                                                    <label class="form-check-label" for="solid5"></label>
                                                </div>
                                            </div>
                                            <div class="flex-grow-1"> <a
                                                    href="https://larathemes.pixelstrap.com/edmin/admin/task">
                                                    <h5 class="f-w-500">Task With dropdown menu</h5>
                                                </a>
                                                <h6>By Johnny</h6>
                                            </div>
                                            <div class="dropdown task-dropdown">
                                                <button class="btn dropdown-toggle" type="button"
                                                    data-bs-toggle="dropdown" aria-expanded="false"
                                                    id="dorpdown44">
                                                    <svg class="feather">
                                                        <use
                                                            href="{{ url('/public/assets/svg/feather-icons/dist/feather-sprite.svg') }}#more-horizontal">
                                                        </use>
                                                    </svg>
                                                </button>
                                                <div class="dropdown-menu dropdown-menu-end"
                                                    aria-labelledby="dorpdown44"><a class="dropdown-item"
                                                        href="#">Weekly</a><a class="dropdown-item"
                                                        href="#">Monthly</a><a class="dropdown-item"
                                                        href="#">Yearly</a>
                                                </div>
                                            </div>
                                        </li>
                                        <li class="d-flex line-secondary">
                                            <div class="flex-shrink-0">
                                                <div class="form-check checkbox checkbox-solid-primary">
                                                    <input class="form-check-input" type="checkbox"
                                                        id="solid4">
                                                    <label class="form-check-label" for="solid4"></label>
                                                </div>
                                            </div>
                                            <div class="flex-grow-1"> <a
                                                    href="https://larathemes.pixelstrap.com/edmin/admin/task">
                                                    <h5 class="f-w-500">Badge on the right task</h5>
                                                </a>
                                                <h6>This task has show on hover actions!</h6>
                                            </div>
                                            <div class="dropdown task-dropdown">
                                                <button class="btn dropdown-toggle" type="button"
                                                    data-bs-toggle="dropdown" aria-expanded="false"
                                                    id="dorpdown55">
                                                    <svg class="feather">
                                                        <use
                                                            href="{{ url('/public/assets/svg/feather-icons/dist/feather-sprite.svg') }}#more-horizontal">
                                                        </use>
                                                    </svg>
                                                </button>
                                                <div class="dropdown-menu dropdown-menu-end"
                                                    aria-labelledby="dorpdown55"><a class="dropdown-item"
                                                        href="#">Weekly</a><a class="dropdown-item"
                                                        href="#">Monthly</a><a class="dropdown-item"
                                                        href="#">Yearly</a>
                                                </div>
                                            </div>
                                        </li>
                                        <li class="d-flex line-tertiary">
                                            <div class="flex-shrink-0">
                                                <div class="form-check checkbox checkbox-solid-primary">
                                                    <input class="form-check-input" type="checkbox" checked
                                                        id="solid3">
                                                    <label class="form-check-label" for="solid3"></label>
                                                </div>
                                            </div>
                                            <div class="flex-grow-1"> <a
                                                    href="https://larathemes.pixelstrap.com/edmin/admin/task">
                                                    <h5 class="f-w-500">Wash the car</h5>
                                                </a>
                                                <h6>Written by bob</h6>
                                            </div>
                                            <div class="dropdown task-dropdown">
                                                <button class="btn dropdown-toggle" type="button"
                                                    data-bs-toggle="dropdown" aria-expanded="false"
                                                    id="dorpdown66">
                                                    <svg class="feather">
                                                        <use
                                                            href="{{ url('/public/assets/svg/feather-icons/dist/feather-sprite.svg') }}#more-horizontal">
                                                        </use>
                                                    </svg>
                                                </button>
                                                <div class="dropdown-menu dropdown-menu-end"
                                                    aria-labelledby="dorpdown66"><a class="dropdown-item"
                                                        href="#">Weekly</a><a class="dropdown-item"
                                                        href="#">Monthly</a><a class="dropdown-item"
                                                        href="#">Yearly</a>
                                                </div>
                                            </div>
                                        </li>
                                        <li class="d-flex line-primary">
                                            <div class="flex-shrink-0">
                                                <div class="form-check checkbox checkbox-solid-primary">
                                                    <input class="form-check-input" type="checkbox"
                                                        id="solid2">
                                                    <label class="form-check-label" for="solid2"></label>
                                                </div>
                                            </div>
                                            <div class="flex-grow-1"> <a
                                                    href="https://larathemes.pixelstrap.com/edmin/admin/task">
                                                    <h5 class="f-w-500">Go grocery shopping</h5>
                                                </a>
                                                <h6>A short description for this todo item</h6>
                                            </div>
                                            <div class="dropdown task-dropdown">
                                                <button class="btn dropdown-toggle" type="button"
                                                    data-bs-toggle="dropdown" aria-expanded="false"
                                                    id="dorpdown77">
                                                    <svg class="feather">
                                                        <use
                                                            href="{{ url('/public/assets/svg/feather-icons/dist/feather-sprite.svg') }}#more-horizontal">
                                                        </use>
                                                    </svg>
                                                </button>
                                                <div class="dropdown-menu dropdown-menu-end"
                                                    aria-labelledby="dorpdown77"><a class="dropdown-item"
                                                        href="#">Weekly</a><a class="dropdown-item"
                                                        href="#">Monthly</a><a class="dropdown-item"
                                                        href="#">Yearly</a>
                                                </div>
                                            </div>
                                        </li>
                                        <li class="d-flex line-secondary">
                                            <div class="flex-shrink-0">
                                                <div class="form-check checkbox checkbox-solid-primary">
                                                    <input class="form-check-input" type="checkbox"
                                                        id="solid1">
                                                    <label class="form-check-label" for="solid1"></label>
                                                </div>
                                            </div>
                                            <div class="flex-grow-1"> <a
                                                    href="https://larathemes.pixelstrap.com/edmin/admin/task">
                                                    <h5 class="f-w-500">Development Task</h5>
                                                </a>
                                                <h6>Finish react todo list app</h6>
                                            </div>
                                            <div class="dropdown task-dropdown">
                                                <button class="btn dropdown-toggle" type="button"
                                                    data-bs-toggle="dropdown" aria-expanded="false"
                                                    id="dropdown88">
                                                    <svg class="feather">
                                                        <use
                                                            href="{{ url('/public/assets/svg/feather-icons/dist/feather-sprite.svg') }}#more-horizontal">
                                                        </use>
                                                    </svg>
                                                </button>
                                                <div class="dropdown-menu dropdown-menu-end"
                                                    aria-labelledby="dropdown88"><a class="dropdown-item"
                                                        href="#">Weekly</a><a class="dropdown-item"
                                                        href="#">Monthly</a><a class="dropdown-item"
                                                        href="#">Yearly</a>
                                                </div>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-6 col-xl-7">
                            <div class="card">
                                <div class="card-header pb-0">
                                    <h4>Monthly Overview</h4>
                                    <div class="dropdown icon-dropdown">
                                        <button class="btn dropdown-toggle" id="userdropdown6" type="button"
                                            data-bs-toggle="dropdown" aria-expanded="false"><i
                                                class="icon-more-alt"></i></button>
                                        <div class="dropdown-menu dropdown-menu-end"
                                            aria-labelledby="userdropdown6"><a class="dropdown-item"
                                                href="#">Weekly</a><a class="dropdown-item"
                                                href="#">Monthly</a><a class="dropdown-item"
                                                href="#">Yearly</a></div>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="monthly-overview" id="monthly-overview"></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-xl-5">
                            <div class="card summary-card">
                                <div class="card-header pb-0">
                                    <h4>Task summary</h4>
                                    <div class="dropdown icon-dropdown">
                                        <button class="btn dropdown-toggle" id="userdropdown01" type="button"
                                            data-bs-toggle="dropdown" aria-expanded="false"><i
                                                class="icon-more-alt"></i></button>
                                        <div class="dropdown-menu dropdown-menu-end"
                                            aria-labelledby="userdropdown01"><a class="dropdown-item"
                                                href="#">Weekly</a><a class="dropdown-item"
                                                href="#">Monthly</a><a class="dropdown-item"
                                                href="#">Yearly</a></div>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-sm-8 custom-width-1">
                                            <div class="project-cost">
                                                <h5 class="font-light">
                                                    <svg class="svg-w-20 stroke-light me-2">
                                                        <use
                                                            href="{{ url('/public/assets/svg/iconly-sprite.svg') }}#Chart">
                                                        </use>
                                                    </svg>Estimated project cost
                                                </h5>
                                                <ul class="d-flex">
                                                    <li class="card-hover">
                                                        <div class="d-flex bg-light-primary flex-column">
                                                            <div class="flex-shrink-0 border-primary">
                                                                <svg class="svg-w-24 stroke-primary">
                                                                    <use
                                                                        href="{{ url('/public/assets/svg/iconly-sprite.svg') }}#Pie">
                                                                    </use>
                                                                </svg>
                                                            </div>
                                                            <div class="flex-grow-1">
                                                                <h6 class="f-w-500">Project</h6>
                                                                <h4 class="f-w-700">32</h4>
                                                            </div>
                                                        </div>
                                                    </li>
                                                    <li class="card-hover">
                                                        <div class="d-flex bg-light-secondary flex-column">
                                                            <div class="flex-shrink-0 border-secondary">
                                                                <svg class="svg-w-24 stroke-secondary">
                                                                    <use
                                                                        href="{{ url('/public/assets/svg/iconly-sprite.svg') }}#Category">
                                                                    </use>
                                                                </svg>
                                                            </div>
                                                            <div class="flex-grow-1">
                                                                <h6 class="f-w-500">Assigned</h6>
                                                                <h4 class="f-w-700">78</h4>
                                                            </div>
                                                        </div>
                                                    </li>
                                                    <li class="card-hover">
                                                        <div class="d-flex bg-light-tertiary flex-column">
                                                            <div class="flex-shrink-0 border-tertiary">
                                                                <svg class="svg-w-24 stroke-tertiary">
                                                                    <use
                                                                        href="{{ url('/public/assets/svg/iconly-sprite.svg') }}#Document">
                                                                    </use>
                                                                </svg>
                                                            </div>
                                                            <div class="flex-grow-1">
                                                                <h6 class="f-w-500">Completed</h6>
                                                                <h4 class="f-w-700">54</h4>
                                                            </div>
                                                        </div>
                                                    </li>
                                                </ul>
                                                <div class="task-bottom d-flex align-items-center gap-2">
                                                    <h5 class="font-light">Completion rate in terms of
                                                        time:</h5>
                                                    <h2 class="font-primary">83%</h2><span
                                                        class="badge bg-light f-14">
                                                        <svg class="svg-w-20 stroke-dark me-1">
                                                            <use
                                                                href="{{ url('/public/assets/svg/iconly-sprite.svg') }}#right-3">
                                                            </use>
                                                        </svg>3.4%</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-4 custom-width-2">
                                            <h5 class="font-light">
                                                <svg class="svg-w-20 stroke-light me-2">
                                                    <use
                                                        href="{{ url('/public/assets/svg/iconly-sprite.svg') }}#User">
                                                    </use>
                                                </svg>Our crew
                                            </h5>
                                            <div class="team-member">
                                                <h5 class="font-light mb-2">Team Members</h5>
                                                <div class="customers d-inline-block avatar-group">
                                                    <ul>
                                                        <li class="d-inline-block"><img class="img-40 b-r-8"
                                                                src="https://larathemes.pixelstrap.com/edmin/assets/images/user/13.jpg"
                                                                alt="#"></li>
                                                        <li class="d-inline-block"><img class="img-40 b-r-8"
                                                                src="https://larathemes.pixelstrap.com/edmin/assets/images/user/6.jpg"
                                                                alt="#"></li>
                                                        <li class="d-inline-block"><img class="img-40 b-r-8"
                                                                src="https://larathemes.pixelstrap.com/edmin/assets/images/user/3.jpg"
                                                                alt="#"></li>
                                                        <li class="d-inline-block"><span class="b-r-10">+4</span>
                                                        </li>
                                                    </ul>
                                                </div>
                                                <div class="d-flex bg-light">
                                                    <div class="flex-grow-1">
                                                        <h6 class="f-16 font-light">Hours</h6>
                                                        <h4>67</h4>
                                                    </div>
                                                    <div class="team-chart" id="team-chart"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-xl-4">
                            <!-- Bookmark menu-->
                            <div class="card">
                                <div class="card-header pb-0">
                                    <h4>Courses Highlighted</h4>
                                    <div class="dropdown icon-dropdown">
                                        <button class="btn dropdown-toggle" id="userdropdown1" type="button"
                                            data-bs-toggle="dropdown" aria-expanded="false"><i
                                                class="icon-more-alt"></i></button>
                                        <div class="dropdown-menu dropdown-menu-end"
                                            aria-labelledby="userdropdown1"><a class="dropdown-item"
                                                href="#">Weekly</a><a class="dropdown-item"
                                                href="#">Monthly</a><a class="dropdown-item"
                                                href="#">Yearly</a></div>
                                    </div>
                                </div>
                                <div class="card-body pt-0 course-table">
                                    <div class="table-responsive">
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th>Course name</th>
                                                    <th>Price</th>
                                                    <th>Type</th>
                                                    <th>Status</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>
                                                        <div class="d-flex align-items-center gap-2">
                                                            <div class="flex-shrink-0"><img
                                                                    src="https://larathemes.pixelstrap.com/edmin/assets/images/dashboard1/invest/01.jpg"
                                                                    alt="">
                                                            </div>
                                                            <div class="flex-grow-1"> <a
                                                                    href="https://larathemes.pixelstrap.com/edmin/admin/profile">
                                                                    <h6 class="f-w-500">Civil
                                                                        engineering</h6>
                                                                </a><span class="font-light f-w-400 f-13">20h
                                                                    10m</span></div>
                                                        </div>
                                                    </td>
                                                    <td>$150</td>
                                                    <td>UX/UI Design</td>
                                                    <td>
                                                        <button
                                                            class="btn edge-btn f-13 w-100 btn-light-primary">Done</button>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <div class="d-flex align-items-center gap-2">
                                                            <div class="flex-shrink-0"><img
                                                                    src="https://larathemes.pixelstrap.com/edmin/assets/images/dashboard1/invest/02.jpg"
                                                                    alt="">
                                                            </div>
                                                            <div class="flex-grow-1"> <a
                                                                    href="https://larathemes.pixelstrap.com/edmin/admin/profile">
                                                                    <h6 class="f-w-500">Web development
                                                                    </h6>
                                                                </a><span class="font-light f-w-400 f-13">12h
                                                                    05m</span></div>
                                                        </div>
                                                    </td>
                                                    <td>$156</td>
                                                    <td>Illustration</td>
                                                    <td>
                                                        <button
                                                            class="btn edge-btn f-13 w-100 btn-light-tertiary">Pending</button>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <div class="d-flex align-items-center gap-2">
                                                            <div class="flex-shrink-0"><img
                                                                    src="https://larathemes.pixelstrap.com/edmin/assets/images/dashboard1/invest/03.jpg"
                                                                    alt="">
                                                            </div>
                                                            <div class="flex-grow-1"> <a
                                                                    href="https://larathemes.pixelstrap.com/edmin/admin/profile">
                                                                    <h6 class="f-w-500">Computer
                                                                        science</h6>
                                                                </a><span class="font-light f-w-400 f-13">06h
                                                                    15m</span></div>
                                                        </div>
                                                    </td>
                                                    <td>$695</td>
                                                    <td>UX/UI Design</td>
                                                    <td>
                                                        <button
                                                            class="btn edge-btn f-13 w-100 btn-light-primary">Done</button>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <div class="d-flex align-items-center gap-2">
                                                            <div class="flex-shrink-0"><img
                                                                    src="https://larathemes.pixelstrap.com/edmin/assets/images/dashboard1/invest/04.jpg"
                                                                    alt="">
                                                            </div>
                                                            <div class="flex-grow-1"> <a
                                                                    href="https://larathemes.pixelstrap.com/edmin/admin/profile">
                                                                    <h6 class="f-w-500">Web designer
                                                                    </h6>
                                                                </a><span class="font-light f-w-400 f-13">04h
                                                                    30m</span></div>
                                                        </div>
                                                    </td>
                                                    <td>$364</td>
                                                    <td>Leadership</td>
                                                    <td>
                                                        <button
                                                            class="btn edge-btn f-13 w-100 btn-light-tertiary">Done</button>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-xl-3 order-1 order-xl-0">
                            <!-- Schedule menu-->
                            <div class="card schedule-card">
                                <div class="card-header pb-0">
                                    <h4 class="mb-2">Schedule Time</h4>
                                    <div class="dropdown icon-dropdown">
                                        <button class="btn dropdown-toggle" id="userdropdown8" type="button"
                                            data-bs-toggle="dropdown" aria-expanded="false"><i
                                                class="icon-more-alt"></i></button>
                                        <div class="dropdown-menu dropdown-menu-end"
                                            aria-labelledby="userdropdown8"><a class="dropdown-item"
                                                href="#">Weekly</a><a class="dropdown-item"
                                                href="#">Monthly</a><a class="dropdown-item"
                                                href="#">Yearly</a></div>
                                    </div>
                                </div>
                                <div class="card-body pt-0">
                                    <div class="d-flex justify-content-between mb-3">
                                        <h5>Aug 2024</h5>
                                        <div class="d-flex align-items-center gap-2 monthly-time">
                                            <h5 class="font-light">Month </h5>
                                            <h5 class="font-light">Year</h5>
                                        </div>
                                    </div>
                                    <ul class="schedule-wrapper nav nav-tabs" id="myTab" role="tablist">
                                        <li class="nav-item"><a class="nav-link active" id="mon-tab"
                                                data-bs-toggle="tab" href="#mon" role="tab"
                                                aria-controls="mon" aria-selected="false"><span>Mo
                                                </span>
                                                <h6>01</h6>
                                            </a></li>
                                        <li class="nav-item"><a class="nav-link" id="tue-tab"
                                                data-bs-toggle="tab" href="#tue" role="tab"
                                                aria-controls="tue" aria-selected="true"><span>Tu
                                                </span>
                                                <h6>02</h6>
                                            </a></li>
                                        <li class="nav-item"><a class="nav-link" id="wed-tab"
                                                data-bs-toggle="tab" href="#wed" role="tab"
                                                aria-controls="wed" aria-selected="false"><span>We
                                                </span>
                                                <h6>03</h6>
                                            </a></li>
                                        <li class="nav-item"><a class="nav-link" id="thu-tab"
                                                data-bs-toggle="tab" href="#thu" role="tab"
                                                aria-controls="thu" aria-selected="false"><span>Th
                                                </span>
                                                <h6>04</h6>
                                            </a></li>
                                        <li class="nav-item"><a class="nav-link" id="frd-tab"
                                                data-bs-toggle="tab" href="#frd" role="tab"
                                                aria-controls="frd" aria-selected="true"><span>Fr
                                                </span>
                                                <h6>05</h6>
                                            </a></li>
                                        <li class="nav-item"><a class="nav-link font-primary" id="sat-tab"
                                                data-bs-toggle="tab" href="#sat" role="tab"
                                                aria-controls="sat" aria-selected="false"><span>Sa
                                                </span>
                                                <h6>06</h6>
                                            </a></li>
                                    </ul>
                                    <div class="tab-content" id="myTabContent">
                                        <div class="tab-pane fade active show" id="mon" role="tabpanel"
                                            aria-labelledby="mon-tab">
                                            <ul class="activity-update">
                                                <li class="d-flex align-items-center b-l-primary">
                                                    <div class="flex-grow-1"> <span>10:00 to 10:20
                                                            am</span>
                                                        <h5>Mobile Application Release</h5>
                                                        <h6>Hannah</h6>
                                                    </div>
                                                    <div class="flex-shrink-0"> <img class="img-40 b-r-10"
                                                            src="https://larathemes.pixelstrap.com/edmin/assets/images/avatar/11.jpg"
                                                            alt=""></div>
                                                </li>
                                                <li class="d-flex align-items-center b-l-secondary">
                                                    <div class="flex-grow-1"> <span>12:00 to 01:45
                                                            am</span>
                                                        <h5>General Meeting</h5>
                                                        <h6>Madeleine Lisa</h6>
                                                    </div>
                                                    <div class="flex-shrink-0"> <img class="img-40 b-r-10"
                                                            src="https://larathemes.pixelstrap.com/edmin/assets/images/avatar/1.jpg"
                                                            alt=""></div>
                                                </li>
                                                <li class="d-flex align-items-center b-l-tertiary">
                                                    <div class="flex-grow-1"> <span>06:00 to 11:30
                                                            am</span>
                                                        <h5>Client Visit</h5>
                                                        <h6>Hemmings Edmunds</h6>
                                                    </div>
                                                    <div class="flex-shrink-0"> <img class="img-40 b-r-10"
                                                            src="https://larathemes.pixelstrap.com/edmin/assets/images/avatar/3.jpg"
                                                            alt=""></div>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="tab-pane fade" id="tue" role="tabpanel"
                                            aria-labelledby="tue-tab">
                                            <ul class="activity-update">
                                                <li class="d-flex align-items-center b-l-info">
                                                    <div class="flex-grow-1"> <span>12:00 to 02:20
                                                            am</span>
                                                        <h5>What`s the project report update?</h5>
                                                        <h6>Loie Fenter</h6>
                                                    </div>
                                                    <div class="flex-shrink-0"> <img class="img-40 b-r-10"
                                                            src="https://larathemes.pixelstrap.com/edmin/assets/images/avatar/2.jpg"
                                                            alt=""></div>
                                                </li>
                                                <li class="d-flex align-items-center b-l-success">
                                                    <div class="flex-grow-1"> <span>04:00 to 08:20
                                                            am</span>
                                                        <h5>James created changelog page</h5>
                                                        <h6>Anna Catmire</h6>
                                                    </div>
                                                    <div class="flex-shrink-0"> <img class="img-40 b-r-10"
                                                            src="https://larathemes.pixelstrap.com/edmin/assets/images/avatar/4.jpg"
                                                            alt=""></div>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="tab-pane fade" id="wed" role="tabpanel"
                                            aria-labelledby="wed-tab">
                                            <ul class="activity-update">
                                                <li class="d-flex align-items-center b-l-danger">
                                                    <div class="flex-grow-1"> <span>09:00 to 02:20
                                                            am</span>
                                                        <h5>Dima phizeg edited ACME 2.4</h5>
                                                        <h6>Susan Connor</h6>
                                                    </div>
                                                    <div class="flex-shrink-0"> <img class="img-40 b-r-10"
                                                            src="https://larathemes.pixelstrap.com/edmin/assets/images/avatar/5.jpg"
                                                            alt=""></div>
                                                </li>
                                                <li class="d-flex align-items-center b-l-dark">
                                                    <div class="flex-grow-1"> <span>10:00 to 01:45
                                                            am</span>
                                                        <h5>Complete the medical ui system idea.</h5>
                                                        <h6>Jeff Johnson</h6>
                                                    </div>
                                                    <div class="flex-shrink-0"> <img class="img-40 b-r-10"
                                                            src="https://larathemes.pixelstrap.com/edmin/assets/images/avatar/6.jpg"
                                                            alt=""></div>
                                                </li>
                                                <li class="d-flex align-items-center b-l-warning">
                                                    <div class="flex-grow-1"> <span>04:00 to 10:30
                                                            am</span>
                                                        <h5>Make a new landing page.</h5>
                                                        <h6>Roger Lum</h6>
                                                    </div>
                                                    <div class="flex-shrink-0"> <img class="img-40 b-r-10"
                                                            src="https://larathemes.pixelstrap.com/edmin/assets/images/avatar/9.jpg"
                                                            alt=""></div>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="tab-pane fade" id="thu" role="tabpanel"
                                            aria-labelledby="thu-tab">
                                            <ul class="activity-update">
                                                <li class="d-flex align-items-center b-l-primary">
                                                    <div class="flex-grow-1"> <span>10:00 to 10:20
                                                            am</span>
                                                        <h5>Mobile Application Release</h5>
                                                        <h6>Hannah</h6>
                                                    </div>
                                                    <div class="flex-shrink-0"> <img class="img-40 b-r-10"
                                                            src="https://larathemes.pixelstrap.com/edmin/assets/images/avatar/11.jpg"
                                                            alt=""></div>
                                                </li>
                                                <li class="d-flex align-items-center b-l-secondary">
                                                    <div class="flex-grow-1"> <span>12:00 to 01:45
                                                            am</span>
                                                        <h5>General Meeting</h5>
                                                        <h6>Madeleine Lisa</h6>
                                                    </div>
                                                    <div class="flex-shrink-0"> <img class="img-40 b-r-10"
                                                            src="https://larathemes.pixelstrap.com/edmin/assets/images/avatar/1.jpg"
                                                            alt=""></div>
                                                </li>
                                                <li class="d-flex align-items-center b-l-tertiary">
                                                    <div class="flex-grow-1"> <span>06:00 to 11:30
                                                            am</span>
                                                        <h5>Client Visit</h5>
                                                        <h6>Hemmings Edmunds</h6>
                                                    </div>
                                                    <div class="flex-shrink-0"> <img class="img-40 b-r-10"
                                                            src="https://larathemes.pixelstrap.com/edmin/assets/images/avatar/3.jpg"
                                                            alt=""></div>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="tab-pane fade" id="frd" role="tabpanel"
                                            aria-labelledby="frd-tab">
                                            <ul class="activity-update">
                                                <li class="d-flex align-items-center b-l-info">
                                                    <div class="flex-grow-1"> <span>12:00 to 02:20
                                                            am</span>
                                                        <h5>What`s the project report update?</h5>
                                                        <h6>Loie Fenter</h6>
                                                    </div>
                                                    <div class="flex-shrink-0"> <img class="img-40 b-r-10"
                                                            src="https://larathemes.pixelstrap.com/edmin/assets/images/avatar/2.jpg"
                                                            alt=""></div>
                                                </li>
                                                <li class="d-flex align-items-center b-l-success">
                                                    <div class="flex-grow-1"> <span>04:00 to 08:20
                                                            am</span>
                                                        <h5>James created changelog page</h5>
                                                        <h6>Anna Catmire</h6>
                                                    </div>
                                                    <div class="flex-shrink-0"> <img class="img-40 b-r-10"
                                                            src="https://larathemes.pixelstrap.com/edmin/assets/images/avatar/4.jpg"
                                                            alt=""></div>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="tab-pane fade" id="sat" role="tabpanel"
                                            aria-labelledby="sat-tab">
                                            <ul class="activity-update">
                                                <li class="d-flex align-items-center b-l-danger">
                                                    <div class="flex-grow-1"> <span>09:00 to 02:20
                                                            am</span>
                                                        <h5>Dima phizeg edited ACME 2.4</h5>
                                                        <h6>Susan Connor</h6>
                                                    </div>
                                                    <div class="flex-shrink-0"> <img class="img-40 b-r-10"
                                                            src="https://larathemes.pixelstrap.com/edmin/assets/images/avatar/5.jpg"
                                                            alt=""></div>
                                                </li>
                                                <li class="d-flex align-items-center b-l-dark">
                                                    <div class="flex-grow-1"> <span>10:00 to 01:45
                                                            am</span>
                                                        <h5>Complete the medical ui system idea.</h5>
                                                        <h6>Jeff Johnson</h6>
                                                    </div>
                                                    <div class="flex-shrink-0"> <img class="img-40 b-r-10"
                                                            src="https://larathemes.pixelstrap.com/edmin/assets/images/avatar/6.jpg"
                                                            alt=""></div>
                                                </li>
                                                <li class="d-flex align-items-center b-l-warning">
                                                    <div class="flex-grow-1"> <span>04:00 to 10:30
                                                            am</span>
                                                        <h5>Make a new landing page.</h5>
                                                        <h6>Roger Lum</h6>
                                                    </div>
                                                    <div class="flex-shrink-0"> <img class="img-40 b-r-10"
                                                            src="https://larathemes.pixelstrap.com/edmin/assets/images/avatar/9.jpg"
                                                            alt=""></div>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-12 col-xl-2 custom-margin">
                            <div class="row">
                                <div class="col-6 col-xl-12 col-lg-5">
                                    <div class="card visit-card card-hover">
                                        <div class="card-header pb-0">
                                            <h4>Total visit</h4>
                                            <div class="dropdown icon-dropdown">
                                                <button class="btn dropdown-toggle" id="userdropdown03"
                                                    type="button" data-bs-toggle="dropdown"
                                                    aria-expanded="false"><i class="icon-more-alt"></i></button>
                                                <div class="dropdown-menu dropdown-menu-end"
                                                    aria-labelledby="userdropdown03"><a class="dropdown-item"
                                                        href="#">Weekly</a><a class="dropdown-item"
                                                        href="#">Monthly</a><a class="dropdown-item"
                                                        href="#">Yearly</a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card-body pb-0">
                                            <ul class="d-flex justify-content-xl-between justify-content-evenly">
                                                <li>
                                                    <div class="badge bg-light-primary b-r-0">
                                                        <svg class="svg-menu me-1">
                                                            <use
                                                                href="{{ url('/public/assets/svg/iconly-sprite.svg') }}#mobile">
                                                            </use>
                                                        </svg>Mobile
                                                    </div>
                                                    <div class="d-block text-center mt-2">
                                                        <h6 class="f-w-500">68,9%</h6><span
                                                            class="font-light f-13">20,600</span>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="badge bg-light-secondary b-r-0">
                                                        <svg class="svg-menu me-1">
                                                            <use
                                                                href="{{ url('/public/assets/svg/iconly-sprite.svg') }}#desktop">
                                                            </use>
                                                        </svg>Desktop
                                                    </div>
                                                    <div class="d-block text-center mt-2">
                                                        <h6 class="f-w-500">13,4%</h6><span
                                                            class="font-light f-13">02,450</span>
                                                    </div>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="visit-chart"></div>
                                    </div>
                                </div>
                                <div class="col-6 col-xl-12 col-lg-7">
                                    <div class="card visit-card card-hover">
                                        <div class="card-header pb-0">
                                            <h4>Total Earning</h4>
                                            <div class="dropdown icon-dropdown">
                                                <button class="btn dropdown-toggle" id="userdropdown02"
                                                    type="button" data-bs-toggle="dropdown"
                                                    aria-expanded="false"><i class="icon-more-alt"></i></button>
                                                <div class="dropdown-menu dropdown-menu-end"
                                                    aria-labelledby="userdropdown02"><a class="dropdown-item"
                                                        href="#">Weekly</a><a class="dropdown-item"
                                                        href="#">Monthly</a><a class="dropdown-item"
                                                        href="#">Yearly</a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card-body py-0 total-earn">
                                            <h4 class="font-primary mt-1">Rp 30.000</h4>
                                            <p class="f-13 font-light">Compared to Rp 23.000 Yesterday
                                            </p>
                                            <div class="earn-chart" id="earn-chart"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-xl-3 custom-margin">
                            <div class="card notification-card">
                                <div class="card-header">
                                    <h4>Notifications</h4>
                                    <div class="dropdown icon-dropdown">
                                        <button class="btn dropdown-toggle" id="userdropdown5" type="button"
                                            data-bs-toggle="dropdown" aria-expanded="false"><i
                                                class="icon-more-alt"></i></button>
                                        <div class="dropdown-menu dropdown-menu-end"
                                            aria-labelledby="userdropdown5"><a class="dropdown-item"
                                                href="#">Weekly</a><a class="dropdown-item"
                                                href="#">Monthly</a><a class="dropdown-item"
                                                href="#">Yearly</a></div>
                                    </div>
                                </div>
                                <div class="card-body p-0">
                                    <div class="d-flex bg-light gap-3">
                                        <div class="flex-shrink-0"> <img class="img-40 b-r-15"
                                                src="https://larathemes.pixelstrap.com/edmin/assets/images/avatar/10.jpg"
                                                alt="Use1">
                                        </div>
                                        <div class="flex-grow-1"><a
                                                href="https://larathemes.pixelstrap.com/edmin/admin/profile">
                                                <h6>Polly edited Contact page</h6>
                                            </a><span>18 mins ago . Craftwork design</span></div>
                                        <div class="circle-dot-primary"><span></span></div>
                                    </div>
                                    <div class="d-flex gap-3">
                                        <div class="flex-shrink-0"> <span class="bg-secondary">KP</span></div>
                                        <div class="flex-grow-1"><a
                                                href="https://larathemes.pixelstrap.com/edmin/admin/profile">
                                                <h6>James left a comment on ACME 2.1</h6>
                                            </a><span>3 hours ago . ACME</span></div>
                                    </div>
                                    <div class="d-flex gap-3">
                                        <div class="flex-shrink-0"> <img class="img-40 b-r-15"
                                                src="https://larathemes.pixelstrap.com/edmin/assets/images/avatar/4.jpg"
                                                alt="Use2">
                                        </div>
                                        <div class="flex-grow-1"><a
                                                href="https://larathemes.pixelstrap.com/edmin/admin/profile">
                                                <h6>Mary shared the file isometric 2.0</h6>
                                            </a><span>4 hours ago . Craftwork Design</span>
                                            <div class="d-flex gap-2 p-0 mt-2">
                                                <button class="btn btn-outline-dark">Decline</button>
                                                <button class="btn btn-primary">Accept</button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="d-flex gap-3 bg-light">
                                        <div class="flex-shrink-0"> <span class="bg-tertiary">HS</span></div>
                                        <div class="flex-grow-1"><a
                                                href="https://larathemes.pixelstrap.com/edmin/admin/profile">
                                                <h6>Dima phizeg edited ACME 2.4</h6>
                                            </a><span>3 hours ago . ACME</span></div>
                                        <div class="circle-dot-primary"><span></span></div>
                                    </div>
                                    <div class="d-flex gap-3">
                                        <div class="flex-shrink-0"> <img class="img-40 b-r-15"
                                                src="https://larathemes.pixelstrap.com/edmin/assets/images/avatar/12.jpg"
                                                alt="Use3">
                                        </div>
                                        <div class="flex-grow-1"><a
                                                href="https://larathemes.pixelstrap.com/edmin/admin/profile">
                                                <h6>James created changelog page</h6>
                                            </a><span>3 hours ago . Blank</span></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- footer start-->
            <footer class="footer">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-6 footer-copyright">
                            <p class="mb-0">Copyright 2025 © Edmin theme by pixelstrap.</p>
                        </div>
                        <div class="col-md-6">
                            <p class="float-end mb-0">Hand crafted &amp; made with
                                <svg class="svg-color footer-icon">
                                    <use href="{{ url('/public/assets/svg/iconly-sprite.svg') }}#footer-heart">
                                    </use>
                                </svg>
                            </p>
                        </div>
                    </div>
                </div>
            </footer> <!-- footer end-->

        </div>
    </main>


    <!-- jquery-->
    <script src="{{ url('/public/assets/js/vendors/jquery/dist/jquery.min.js') }}"></script>

    <!-- bootstrap js-->
    <script src="{{ url('/public/assets/js/vendors/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ url('/public/assets/js/config.js') }}"></script>

    <!-- Sidebar js-->
    <script src="{{ url('/public/assets/js/sidebar.js') }}"></script>

    <script src="{{ url('/public/assets/js/vendors/apexcharts/dist/apexcharts.min.js') }}"></script>
    <script src="{{ url('/public/assets/js/vendors/chart.js/dist/chart.umd.js') }}"></script>
    <script src="{{ url('/public/assets/js/vendors/simple-datatables/dist/umd/simple-datatables.js') }}"></script>
    <script src="{{ url('/public/assets/js/dashboard/default.js') }}"></script>

    <!-- scrollbar js-->
    <script src="{{ url('/public/assets/js/scrollbar/simplebar.js') }}"></script>
    <script src="{{ url('/public/assets/js/scrollbar/custom.js') }}"></script>
    <script src="{{ url('/public/assets/js/select2/select2.full.min.js') }}"></script>

    <!-- validation -->
    <script src="{{ url('/public/assets/js/jquery.validate.min.js') }}"></script>

    <!-- customizer-->
    <script src="{{ url('/public/assets/js/theme-customizer/customizer.js') }}"></script>

    <!-- toastr -->
    <script src="{{ url('/public/assets/js/toastr.min.js') }}"></script>

    <!-- custom script -->
    <script src="{{ url('/public/assets/js/script.js') }}"></script>





    <script>
        $(document).ready(function() {
            $(document).on('change', '.toggle-status', function() {

                let status = $(this).prop('checked') ? 1 : 0;
                let url = $(this).data('route');
                let clickedToggle = $(this);
                $.ajax({
                    type: "PUT",
                    url: url,
                    data: {
                        status: status,
                        _token: '4DLvIWv06eGoHVbFBYn3x7CxS2tz1MsTeuInqwP2',
                    },
                    success: function(data) {
                        clickedToggle.prop('checked', status);
                        toastr.success("Status Updated Successfully");
                    },
                    error: function(xhr, status, error) {
                        console.log(error)
                    }
                });
            });
        });
    </script>

    <script>
        $(document).ready(function() {
            $('#country_code').select2({
                templateResult: function(data) {
                    if (!data.id) {
                        return data.text;
                    }
                    var $result = $('<span><img src="' + $(data.element).data('image') +
                        '" class="flag-img" /> +' + data.text.trim() + '</span>');
                    return $result;
                },
                templateSelection: function(selection) {
                    if (selection.text == ' ') {
                        return selection.text;
                    }
                    return ' + ' + selection.text;
                }
            });
        });
    </script>
    <script>
        $(document).ready(function() {
            $('.toastr-message').each(function() {
                var messageType = $(this).data('type');
                var messageText = $(this).text();
                toastr.options = {
                    "closeButton": false,
                    "progressBar": true,
                    "extendedTimeOut": 0,
                    "timeOut": 0,
                };

                switch (messageType) {
                    case 'success':
                        toastr.success(messageText);
                        break;
                    case 'error':
                        toastr.error(messageText);
                        break;
                    case 'info':
                        toastr.info(messageText);
                        break;
                    case 'warning':
                        toastr.warning(messageText);
                        break;
                    default:
                        toastr.info(messageText);
                }
            });
        });
    </script>


</body>

</html>
