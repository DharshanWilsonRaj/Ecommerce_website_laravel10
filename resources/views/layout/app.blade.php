<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Ecommerce</title>
    {{-- bootstrap css --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('assets/css/home.css') }}">
    @notifyCss

    <style>
        .navbar a {
            padding: 2px;
            border-bottom: 1px solid transparent
        }

        .navbar a.active {
            padding: 2px;
            border-bottom: 1px solid white
        }
    </style>
</head>

<body>
    <div style="z-index: 999;  position: relative;">
        <x-notify::notify />
    </div>
    <div class="layout_container">
        <div class=" d-flex text-white align-items-center p-3 px-5 shadow" style="background: #15121E">
            <h3 class=" fs-3 fw-bold">Ecommerce</h5>
                <div class="ms-auto ">
                    <ul class="d-flex gap-3 navbar ">
                        <li>
                            <a href="{{ route('home') }}" class="fw-bold {{ request()->is('/') ? 'active' : '' }}">Home</a>

                        </li>
                        <li>
                            <a href="{{ route('cart') }}"
                                class="fw-bold {{ Str::contains(request()->url(), '/cart') ? 'active' : '' }}">Cart
                            </a>
                        </li>
                        @auth
                            <li>
                                <a href=""
                                    class="fw-bold {{ Str::contains(request()->url(), '/cart') ? 'active' : '' }}">Profile
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('logout') }}" class="fw-bold ">Logout </a>
                            </li>
                        @else
                            <li>
                                <a href="{{ route('login') }}" class="fw-bold ">SignIn </a>
                            </li>
                            <li>
                                <a href="{{ route('register') }}" class="fw-bold ">SignUp </a>
                            </li>
                        @endauth
                    </ul>
                </div>
        </div>
        @yield('content')
    </div>

    {{-- bootstrap js --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
    @notifyJs
</body>

</html>
