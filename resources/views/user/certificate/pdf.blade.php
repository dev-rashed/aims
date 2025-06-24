<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@100..900&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
    <style>
        * {
            padding: 0;
            margin: 0;
        }
        body {
            width: 21cm;
            height: 29.7cm;
            font-family: "Roboto", sans-serif;
            font-weight: 400;
            background-color: #f7f7f7;
            margin: auto;
        }
        h1, h2, h3, h4, h5, h6 {
            font-family: "Outfit", sans-serif;
            font-weight: 600;
        }
        .fw-100 {
            font-weight: 100;
        }
        .fw-200 {
            font-weight: 200;
        }
        .fw-300 {
            font-weight: 300;
        }
        .fw-400 {
            font-weight: 400;
        }
        .fw-500 {
            font-weight: 500;
        }
        .fw-600 {
            font-weight: 600;
        }
        .fw-700 {
            font-weight: 700;
        }
        .fw-800 {
            font-weight: 800;
        }
        .fw-900 {
            font-weight: 900;
        }
        .fs-14 {
            font-size: 14px;
        }
        .mb-3 {
            margin-bottom: 12px;
        }
        .mb-4 {
            margin-bottom: 16px;
        }
        .wrapper {
            width: 100%;
            height: 100%;
            margin: auto;
            background-color: #fff;
        }
        .relative {
            position: relative;
        }
        .text-center {
            text-align: center;
        }
        .align-left {
            width: 33.333%;
        }
        .align-right {
            width: 66.33%;
            align-self: center;
        }
        .certificate-type {
            position: absolute;
            top: 16%;
            left: -55.5%;
            background: #fff;
            transform: rotate(270deg);
            text-align: center;
            padding: 11px;
            width: 402px;
        }
        .certificate-type h1 {
            color: #075C89;
            font-size: 60px;
        }
        .certificate-type h3 {
            color: {{ $color }};
            font-size: 27px;
            font-weight: 400;
            letter-spacing: 2px;
            text-transform: uppercase;
        }
        .details {
            margin-top: 50px;
        }
        .details p {
            margin-bottom: 24px;
            font-size: 18px;
        }
        .footer {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-top: 90px;
        }
        @page {
            size: A4;
            margin: 1in;
        }
        @media print {
            * {
                padding: 0;
                margin: 0;
            }
            body {
                width: 21cm;
                height: 29.7cm; /* A4 dimensions */
                margin: 0; /* Remove browser default margins */
                padding: 0; /* Avoid content overflow */
                overflow: hidden; /* Prevent overflow to a second page */
            }
            .wrapper {
                width: 100%;
                height: 100%;
                background-color: #fff;
                display: flex;
                flex-direction: column;
                justify-content: space-between; /* Ensure content is spaced correctly */
            }
            .footer {
                position: static; /* Avoid fixed positioning */
                margin-top: auto; /* Push to the bottom if necessary */
            }
        }
    </style>
</head>
<body>
    <div class="wrapper">
        <div style="display: flex; height: 20cm">
            <div class="relative align-left">
                <img src="{{ Vite::image('pdf-left.png') }}" style="height: 100%" alt="" srcset="">
                <div class="certificate-type">
                    <h1>CERTIFICATE</h1>
                    <h3>OF {{ auth()->user()->therapist?->membershipPlan?->name }}</h3>
                </div>
            </div>

            <div class="align-right text-center">
                <div>
                    <img src="{{ Vite::image('pdf-logo.png') }}" alt="" srcset="">
                </div>
                <div class="details">
                    <p>This is to certify that</p>
                    <p class="fw-500">{{ auth()->user()->full_name }}</p>
                    <p>Was granted the status of</p>
                    <p class="fw-500">{{ config('app.name') }} {{ auth()->user()->therapist?->membershipPlan?->name }}</p>
                    <p>on the</p>
                    <p>{{ date('jS F Y', strtotime(auth()->user()->therapist?->membership_start_date)) }}</p>
                </div>
            </div>
        </div>

        <div class="footer">
            <div style="padding: 40px">
                <div>
                    <p class="fs-14 mb-3">AIMS Reference Number</p>
                    <p class="fs-14 mb-3 fw-500">{{ auth()->user()->therapist?->member_id }}</p>
                    <p class="fs-14">Expiry: {{ date('jS F Y', strtotime(auth()->user()->therapist?->membership_expire)) }}</p>
                </div>
                <div style="margin-top: 26px">
                    <img src="{{ Vite::image('signature.jpg') }}" style="width: 120px">
                    <p class="fs-14">AIMS Chair</p>
                </div>
            </div>

            <div class="relative">
                <img src="{{ Vite::image('pdf-right-bottom.png') }}" width="250px" alt="" srcset="">
                <div style="position: absolute; top: 130px; left: 30px;">
                    <div class="fs-14" style="color: #075C89;">
                        <p>The Whitechapel Centre</p>
                        <p>Unit F2</p>
                        <p>85 Myrdle St</p>
                        <p>London E1 1HL</p>
                    </div>
                    <div class="fs-14" style="margin-top: 16px; color: #606060;">
                        <p>Registered in UK and Wales</p>
                        <p>9288737685</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        window.onload = function() {
            window.print()
        }
    </script>
</body>
</html>
