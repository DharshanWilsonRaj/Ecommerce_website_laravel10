<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Ecommerce</title>
    {{-- bootstrap css --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    @notifyCss
</head>

<body>
    <x-notify::notify />
    <div class="layout_container">
        <div class="bg-light d-flex align-items-center p-2 px-4">
            <h5>Ecommerce</h5>
            <div class="ms-auto ">
                <ul class="d-flex gap-3">
                    <li><a href="">Cart</a></li>
                    <li><a href="">Profile</a></li>
                    <li><a href="{{route('login')}}">Login</a></li>
                    <li><a  href="{{route('register')}}">Register</a></li>
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
