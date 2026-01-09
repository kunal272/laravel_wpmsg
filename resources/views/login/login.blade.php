<!DOCTYPE html>
<html lang="en">

<head>
    <meta name="csrf-token" content="bKUqHsiYkjjfoziB2YXyLk3spQJWjVhwp54Ll3zJ">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description"
        content="Edmin admin is super flexible, powerful, clean &amp; modern responsive bootstrap admin template with unlimited possibilities.">
    <meta name="keywords"
        content="admin template, Edmin admin template, best javascript admin, dashboard template, bootstrap admin template, responsive admin template, web app">
    <meta name="author" content="pixelstrap">
    <title>AutoNew | Login</title>
    <!-- Favicon icon-->
    <link rel="icon" href="{{ url('/public/assets/images/favicon/auto-new-ic.png') }}" type="image/x-icon">
    <link rel="shortcut icon" href="{{ url('/public/assets/images/favicon/auto-new-ic.png') }}" type="image/x-icon">
    <!-- Google font-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin="">
    <link
        href="https://fonts.googleapis.com/css2?family=Outfit:wght@100;200;300;400;500;600;700;800;900&amp;display=swap"
        rel="stylesheet">

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
</head>

<body>
    <!-- tap on top starts-->
    <div class="tap-top">
        <svg class="feather">
            <use href="{{ url('/public/assets/svg/feather-icons/dist/feather-sprite.svg#arrow-up') }}">
            </use>
        </svg>
    </div>
    <!-- tap on tapS ends-->

    <!-- page-wrapper Start-->
    <div class="page-wrapper compact-wrapper" id="pageWrapper">
        <div class="container-fluid p-0">
            <div class="row m-0">
                <div class="col-12 p-0">
                    <div class="login-card login-dark">
                        <div>

                            <div class="login-main border-sm border-primary">
                                <div>
                                    <a class="logo" href="{{ url('/public/admin/default-dashboard') }}"><img
                                            class="img-fluid for-light"
                                            src="{{ url('/public/assets/images/logo/autonew-1.png') }}"
                                            alt="looginpage"><img class="img-fluid for-dark m-auto"
                                            src="{{ url('/public/assets/images/logo/autonew-2.png') }}" alt="logo">
                                    </a>
                                </div>
                                <div class="info">
                                    @if (Session::has('success'))
                                        <h5 class="" style="color: green;text-align:center">
                                            {{ Session::get('success') }}
                                        </h5>
                                    @elseif(Session::has('error'))
                                        <h5 class="" style="color: red;text-align:center">
                                            {{ Session::get('error') }}
                                        </h5>
                                    @endif
                                </div>
                                <form class="theme-form" method="POST" action="{{ url('/CheckLogin') }}">
                                    @csrf
                                    <h2 class="text-center">Sign in to account</h2>
                                    <p class="text-center">Enter your email &amp; password to login</p>

                                    <div class="form-group">
                                        <label class="col-form-label">Email Address</label>
                                        <input class="form-control " name="username" type="username" required
                                            placeholder="Test@gmail.com" autocomplete="username" autofocus>

                                    </div>

                                    <div class="form-group">
                                        <label class="col-form-label">Password</label>
                                        <div class="form-input position-relative">
                                            <input class="form-control " type="password" name="password" required
                                                placeholder="*********" autocomplete="current-password">
                                            <div class="show-hide"><span class="show"> </span></div>
                                        </div>
                                    </div>

                                    <div class="form-group mb-0 checkbox-checked">
                                        {{-- <a class="form-check checkbox-solid-info"
                                            href="{{ url('/password/reset') }}">Forgot
                                            password?</a> --}}
                                        <div class="text-end mt-3">
                                            <button class="btn btn-primary btn-block w-100 text-white"
                                                type="submit">Sign
                                                in</button>
                                        </div>
                                    </div>
                                </form>

                                <div class="text-center">
                                    <ul class="list-inline border-top pt-2">
                                        <li class="list-inline-item">
                                            <a href="https://www.facebook.com/NetProtectorNpav/" target="_blank"
                                                class="h2 text-primary">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                    viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                    class="feather feather-facebook">
                                                    <path
                                                        d="M18 2h-3a5 5 0 0 0-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 0 1 1-1h3z">
                                                    </path>
                                                </svg>
                                            </a>
                                        </li>
                                        <li class="list-inline-item">
                                            <a href="https://in.linkedin.com/company/netprotectorantivirus"
                                                target="_blank" class="h2" style="color: #0077b5;">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                    viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                    class="feather feather-linkedin">
                                                    <path
                                                        d="M16 8a6 6 0 0 1 6 6v7h-4v-7a2 2 0 0 0-2-2 2 2 0 0 0-2 2v7h-4v-7a6 6 0 0 1 6-6z">
                                                    </path>
                                                    <rect x="2" y="9" width="4" height="12"></rect>
                                                    <circle cx="4" cy="4" r="2"></circle>
                                                </svg>
                                            </a>
                                        </li>
                                        <li class="list-inline-item">
                                            <a href="https://www.youtube.com/channel/UCQ8Ka-PVZ08DAzahAdI_dfw"
                                                target="_blank" class="h2 text-danger">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                    viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                    class="feather feather-youtube">
                                                    <path
                                                        d="M22.54 6.42a2.78 2.78 0 0 0-1.94-2C18.88 4 12 4 12 4s-6.88 0-8.6.46a2.78 2.78 0 0 0-1.94 2A29 29 0 0 0 1 11.75a29 29 0 0 0 .46 5.33A2.78 2.78 0 0 0 3.4 19c1.72.46 8.6.46 8.6.46s6.88 0 8.6-.46a2.78 2.78 0 0 0 1.94-2 29 29 0 0 0 .46-5.25 29 29 0 0 0-.46-5.33z">
                                                    </path>
                                                    <polygon points="9.75 15.02 15.5 11.75 9.75 8.48 9.75 15.02">
                                                    </polygon>
                                                </svg>
                                            </a>
                                        </li>
                                        <li class="list-inline-item">
                                            <a href="https://twitter.com/netprotector" target="_blank" class="h2"
                                                style="color: #1da1f2;">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                    viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                    class="feather feather-twitter">
                                                    <path
                                                        d="M23 3a10.9 10.9 0 0 1-3.14 1.53 4.48 4.48 0 0 0-7.86 3v1A10.66 10.66 0 0 1 3 4s-4 9 5 13a11.64 11.64 0 0 1-7 2c9 5 20 0 20-11.5a4.5 4.5 0 0 0-.08-.83A7.72 7.72 0 0 0 23 3z">
                                                    </path>
                                                </svg>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- page-wrapper end-->

    <!-- jquery-->
    <script src="{{ url('/public/assets/js/vendors/jquery/dist/jquery.min.js') }}"></script>

    <!-- bootstrap js-->
    <script src="{{ url('/public/assets/js/vendors/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ url('/public/assets/js/config.js') }}"></script>

    <script src="{{ url('/public/assets/js/password.js') }}"></script>

    <!-- custom script -->
    <script src="{{ url('/public/assets/js/script.js') }}"></script>
</body>

</html>
