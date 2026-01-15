<html lang="en">

<head>
    <meta charset="utf-8">
    <title>ResetPassword | NPAV CyberSec-Ai</title>
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
            background-image: url("{{ asset('public/assets/images/background/bg-2.png') }}");
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
    <div class="authentication-bg min-vh-100">
        <div class="bg-overlay bg-light"></div>
        <div class="container mt-5 d-flex justify-content-center">
            <div class="col-md-5">
                <div class="card p-4">
                    <div class="row text-center mb-3">
                        <a href="javascript:void(0)" class="d-block auth-logo">
                            <img src="{{ url('/public/assets/images/logo/npav-cyber-sec-1.png') }}" alt="#"
                                class="dark-logo" style="width: 225px;height: auto;">
                    </div>
                    <h2 class="mb-4 text-center">Reset Your Password</h2>

                    @if ($errors->any())
                        <div class="alert alert-light-border-danger">
                            <ul class="mb-0">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    @if (session('status'))
                        <div class="alert alert-light-border-success">{{ session('status') }}</div>
                    @endif

                    <form action="{{ url('/reset-password/update') }}" method="POST" autocomplete="off">
                        @csrf
                        <input type="hidden" name="token" value="{{ $token }}">

                        <div class="mb-3">
                            <label for="email" class="form-label">Email Address</label>
                            <input type="email" class="form-control" id="email" name="email"
                                value="{{ old('email', $email) }}" required readonly>
                        </div>

                        <div class="mb-3">
                            <label for="password" class="form-label">New Password</label>
                            <input type="password" class="form-control" id="password" name="password" required
                                autocomplete="new-password" placeholder="Enter new password">
                        </div>

                        <div class="mb-3">
                            <label for="password_confirmation" class="form-label">Confirm New Password</label>
                            <input type="password" class="form-control" id="password_confirmation"
                                name="password_confirmation" required autocomplete="new-password"
                                placeholder="Confirm new password">
                        </div>

                        <button type="submit" class="btn btn-primary w-100">Reset Password</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="{{ url('/public/assets/js/jquery-3.6.3.min.js') }}"></script>
</body>

</html>
