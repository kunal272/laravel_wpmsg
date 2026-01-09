<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css"
        integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }

        .container-fluid {
            width: 100%;
            margin: 0 auto;
        }

        .header {
            background-color: #f8f8f8;
            padding: 9px;
            text-align: center;
            border-bottom: 1px solid #dddddd;
        }

        .content {
            padding: 20px;
        }

        .footer {
            background-color: #f8f8f8;
            padding: 10px;
            text-align: center;
            border-top: 1px solid #dddddd;
            font-size: 12px;
            color: #888888;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th,
        td {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
        }

        th {
            background-color: #f2f2f2;
        }

        .table-responsive {
            width: 100%;
            overflow-x: auto;
        }

        .text-center {
            text-align: center;
        }

        @media screen and (max-width: 740px) {
            .container-fluid {
                width: auto !important;
            }
        }

        .mt-4 {
            margin-top: -20px !important;
        }

        .mt-2 {
            margin-top: 32px !important;
        }
    </style>
</head>

<body>
    <div class="container-fluid">
        <div class="row mb-4 mt-4">
            <div class="col-md-5"></div>
            <div class="col-md-2 text-center">
                <img class="imglogo" src="https://portal2.npav.net/public/backend/assets/logo.png" width="100"
                    height="auto" alt="Logo" title="Logo" />
            </div>
            <div class="col-md-5"></div>
        </div>
        <div class="header">
            <h1 class="ms-0"> {!! $title !!} </h1>
        </div>
        <div class="content">
            {!! $data !!}
        </div>
        <div class="footer">

            <a target="_blank" href="https://www.facebook.com/NetProtectorNpav/" style="text-decoration: none;">
                <img vspace="0" hspace="0"
                    style="padding: 0; margin: 0; outline: none; text-decoration: none; -ms-interpolation-mode: bicubic; border: none; display: inline-block; color: #000000;"
                    alt="F" title="Facebook" width="44" height="44"
                    src="https://raw.githubusercontent.com/konsav/email-templates/master/images/social-icons/facebook.png" />
            </a>

            <!-- ICON 2 -->

            <a target="_blank" href="https://twitter.com/netprotector/" style="text-decoration: none;">
                <img vspace="0" hspace="0"
                    style="padding: 0; margin: 0; outline: none; text-decoration: none; -ms-interpolation-mode: bicubic; border: none; display: inline-block; color: #000000;"
                    alt="T" title="Twitter" width="44" height="44"
                    src="https://raw.githubusercontent.com/konsav/email-templates/master/images/social-icons/twitter.png" />
            </a>

            <!-- ICON 3 -->

            <a target="_blank" href="https://www.youtube.com/channel/UCQ8Ka-PVZ08DAzahAdI_dfw/videos"
                style="text-decoration: none;">
                <img vspace="0" hspace="0"
                    style="padding: 0; margin: 0; outline: none; text-decoration: none; -ms-interpolation-mode: bicubic; border: none; display: inline-block; color: #000000;"
                    alt="G" title="Google Plus" width="44" height="44"
                    src="https://raw.githubusercontent.com/konsav/email-templates/master/images/social-icons/googleplus.png" />
            </a>

            <!-- ICON 4 -->

            <a target="_blank" href="https://www.instagram.com/netprotector/" style="text-decoration: none;">
                <img vspace="0" hspace="0"
                    style="padding: 0; margin: 0; outline: none; text-decoration: none; -ms-interpolation-mode: bicubic; border: none; display: inline-block; color: #000000;"
                    alt="I" title="Instagram" width="44" height="44"
                    src="https://raw.githubusercontent.com/konsav/email-templates/master/images/social-icons/instagram.png" />
            </a>

        </div>
    </div>
</body>

</html>
