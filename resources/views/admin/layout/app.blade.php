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

    <style>
        .sidebar a {
            padding: 10px 5px;
            color: black
        }

        .sidebar a.active {
            background: #bcbcbc;
        }

        .sidebar a.hover {
            background: #bcbcbc;
        }
    </style>
</head>



<body>
    <x-notify::notify />
    <div class="layout_container d-flex ">
        <div class="sidebar bg-light p-2 d-flex flex-column gap-2" style="width: 15% ; height:100vh">
            <a href="{{ route('admin.dashboard') }}"
                class="{{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">Dashboard</a>
            <a href="{{ route('admin.products') }}"
                class="{{ request()->routeIs('admin.products') ? 'active' : '' }}">Products</a>
            <a href="{{ route('admin.orders') }}"
                class="{{ request()->routeIs('admin.orders') ? 'active' : '' }}">Orders</a>
            <a href="{{ route('profile') }}"
                class="{{ request()->routeIs('profile') ? 'active' : '' }}">Profile</a>

            <a href="{{ route('logout') }}">Logout</a>
        </div>

        <div style="width:85%">
            @yield('content')
        </div>
    </div>


    {{-- bootstrap js --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
    @notifyJs
</body>

</html>
