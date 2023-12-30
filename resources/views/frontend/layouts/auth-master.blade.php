<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }} | @yield('title')</title>

    <link rel="icon" type="image/png" href="{{ asset('frontend') }}/img/logo.png">

    <link href="{{ asset('frontend') }}/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="{{ asset('frontend') }}/vendor/slick/slick/slick.css" rel="stylesheet">
    <link href="{{ asset('frontend') }}/vendor/slick/slick/slick-theme.css" rel="stylesheet">
    <link href="{{ asset('frontend') }}/vendor/icofont/icofont.min.css" rel="stylesheet">
    <link href="{{ asset('frontend') }}/vendor/icons/css/materialdesignicons.min.css" rel="stylesheet" type="text/css">
    <link href="{{ asset('frontend') }}/css/style.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
</head>
<body class="bg-light">
    <div class="py-4">
        <div class="container">
            <div class="row position-relative">
                <!-- Sidebar Left Start -->
                <aside class="col-lg-6 col-sm-12">
                    <div class="ps-0 m-none fix-sidebar">
                        <div class="side-trend lg-none">
                            <div class="sticky-sidebar2 mt-3">
                                <div class="main-content mt-5">
                                    <a href="{{ route('index') }}" class="text-decoration-none">
                                        <h5 class="text-center text-info">{{ config('app.name', 'Laravel') }}</h5>
                                    </a>

                                    <img src="{{ asset('frontend') }}/img/auth.png" class="img-fluid w-100 my-5" alt="{{ config('app.name', 'Laravel') }}">
                                </div>
                            </div>
                        </div>
                    </div>
                </aside>
                <!-- Sidebar Left End -->

                <!-- Sidebar Right Start -->
                <aside class="col-lg-6 col-sm-12">
                    <div class="ps-0 m-none fix-sidebar">
                        <div class="side-trend lg-none">
                            <div class="sticky-sidebar2 mt-3">
                                <!-- Content Start -->
                                @yield('content')
                                <!-- Content End -->
                            </div>
                        </div>
                    </div>
                </aside>
                <!-- Sidebar Right End -->
            </div>
        </div>
    </div>

    <script src="{{ asset('frontend') }}/vendor/jquery/jquery.min.js"></script>
    <script src="{{ asset('frontend') }}/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('frontend') }}/js/custom.js"></script>
    <script src="{{ asset('frontend') }}/vendor/slick/slick/slick.min.js"></script>
    <script src="{{ asset('frontend') }}/js/rocket-loader.min.js" data-cf-settings="3a51f4ea14090e051aa8d211-|49" defer></script><script defer src="https://static.cloudflareinsights.com/beacon.min.js/v8b253dfea2ab4077af8c6f58422dfbfd1689876627854" integrity="sha512-bjgnUKX4azu3dLTVtie9u6TKqgx29RBwfj3QXYt5EKfWM/9hPSAI/4qcV5NACjwAo8UtTeWefx6Zq5PHcMm7Tg==" data-cf-beacon='{"rayId":"80fdf8d63fab5fb6","version":"2023.8.0","r":1,"b":1,"token":"dd471ab1978346bbb991feaa79e6ce5c","si":100}' crossorigin="anonymous"></script>
</body>
</html>
