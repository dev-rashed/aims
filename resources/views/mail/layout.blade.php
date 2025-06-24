<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>@yield('title') - {{ config('app.name') }}</title>

    <style>
        * {
            box-sizing: border-box;
        }
        body {
            background-color: #fff;
            color: #000;
            font-family: 'Nunito', sans-serif;
        }
        .content {
            padding: 20px;
            max-width: 800px;
            margin: auto
        }
        .logo-area {
            text-align: center;
            margin-bottom: 20px;
        }
        /* .logo-area img {
            width: 50px;
        } */
        .details p {
            margin: 12px 0px;
            line-height: 24px;
        }

        .social {
            display: flex;
            align-items: center;
        }
        .social a {
            color: #000;
        }
        .social a:not(:first-child) {
            margin-left: 8px;
        }

    </style>
</head>
<body>
    <main class="content">

        <div class="logo-area">
            <img src="https://aimsonline.org/storage/app/public/setting/0yIiM8P1vk1EN5iV.svg" alt="Logo" />
        </div>

        @yield('content')

        <div>
            <p>
                @yield('regarding', 'Thank you,')
                <br/>
                <br/>
                <strong>{{ config('app.name') }}</strong>
            </p>
        </div>
    </main>
</body>
</html>
