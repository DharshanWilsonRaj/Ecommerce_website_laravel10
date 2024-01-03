<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Ecommerce</title>
    {{-- bootstrap css --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    {{-- fontawesome cdn --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" />

    {{-- dataTable --}}
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.1/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.11.4/css/dataTables.bootstrap5.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
    <script src="https://cdn.datatables.net/1.11.4/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
    <script src="https://cdn.datatables.net/1.11.4/js/dataTables.bootstrap5.min.js"></script>

    @notifyCss

    <style>
        .sidebar a {
            padding: 10px 5px;
            color: black;
            border-radius: 5px;
        }

        .sidebar a.active {
            background: #15121E;
            color: white
        }

        .sidebar a:hover {
            background: #221d2e;
            color: white
        }
    </style>
</head>



<body>
    <div style="z-index: 999; position: relative;    ">
        <x-notify::notify />
    </div>
    <div class="layout_container d-flex ">
        <div class="sidebar bg-light p-2 d-flex flex-column gap-2" style="width: 15% ; height:100vh">
            <a href="{{ route('admin.dashboard') }}"
                class="{{ Str::contains(request()->url(), '/admin/dashboard') ? 'active' : '' }}">
                <i class="fa-solid fa-chart-line mx-1"></i>Dashboard
            </a>

            <a href="{{ route('admin.products') }}"
                class="{{ Str::contains(request()->url(), '/admin/products') ? 'active' : '' }}">
                <i class="fa-solid fa-store mx-1"></i>Products
            </a>

            <a href="{{ route('admin.orders') }}"
                class="{{ Str::contains(request()->url(), '/admin/orders') ? 'active' : '' }}">
                <i class="fa-solid fa-truck-fast  mx-1"></i>Orders
            </a>

            <a href="{{ route('admin.profile') }}"
                class="{{ Str::contains(request()->url(), '/admin/profile') ? 'active' : '' }}">
                <i class="fa-regular fa-user  mx-1"></i>Profile
            </a>

            <a href="{{ route('logout') }}"><i class="fa-solid fa-right-from-bracket  mx-1"></i>Logout</a>
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
