<html lang="en">

<head>
    <meta charset="utf-8">
    <title>LinkExpired | NPAV CyberSec-Ai</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="{{ url('/public/assets/images/logo/ic-ssd.png') }}" type="image/x-icon">
    <link rel="shortcut icon" href="{{ url('/public/assets/images/logo/ic-ssd.png') }}" type="image/x-icon">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600;700;800;900&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="https://unpkg.com/@icon/themify-icons/themify-icons.css">
    <link rel="stylesheet" href="{{ url('/public/assets/vendor/fontawesome/css/all.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ url('/public/assets/vendor/flag-icons-master/flag-icon.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ url('/public/assets/vendor/bootstrap/bootstrap.min.css') }}">
    <link rel="preload" as="style" href="{{ url('/public/build/assets/style-BVr_C8ru.css') }}" />
    <link rel="stylesheet" href="{{ url('/public/build/assets/style-BVr_C8ru.css') }}" />
    <style type="text/css">
        .authentication-bg {
            background-size: cover;
            background-repeat: no-repeat;
            background-image: url("./public/assets/images/background/bg-2.png");
            /* display: -webkit-box;
            display: -ms-flexbox; */
            display: flex;
            -webkit-box-align: center;
            -ms-flex-align: center;
            align-items: center;
            -webkit-box-pack: center;
            -ms-flex-pack: center;
            justify-content: center;
        }
    </style>
</head>

<body>
    <div class="min-vh-100 d-flex align-items-center justify-content-center bg-light-">
        <div class="card shadow-lg border-0 rounded-4 p-5 text-center" style="max-width: 500px;">

            <div class="mb-3">
                <svg xmlns="http://www.w3.org/2000/svg" width="80" height="80" fill="none"
                    viewBox="0 0 24 24">
                    <circle cx="12" cy="12" r="11" stroke="#dc3545" stroke-width="2" fill="none" />
                    <line x1="8" y1="8" x2="16" y2="16" stroke="#dc3545" stroke-width="2"
                        stroke-linecap="round" />
                    <line x1="16" y1="8" x2="8" y2="16" stroke="#dc3545" stroke-width="2"
                        stroke-linecap="round" />
                </svg>

            </div>

            <h4 class="fw-bold text-dark">Whoops, that’s an expired link</h4>
            <p class="text-muted mt-2">
                For security reasons, password reset links expire after a short time.
                If you still need to reset your password, you can request a new reset email below.
            </p>

            <a href="{{ url('/forgot-password') }}" class="btn btn-primary btn-lg mt-3 px-4 fw-semibold">
                Request a new reset email
            </a>

            <div class="mt-4">
                <small class="text-muted">
                    Already remember your password?
                    <a href="{{ url('/') }}" class="text-decoration-none fw-semibold">Log in here</a>
                </small>
            </div>
        </div>
    </div>


    <script src="{{ url('/public/assets/js/jquery-3.6.3.min.js') }}"></script>
</body>

</html>
