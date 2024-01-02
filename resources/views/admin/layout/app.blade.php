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

    {{-- datatable --}}
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" />
    <link href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.10.21/css/dataTables.bootstrap4.min.css" rel="stylesheet">

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
    <x-notify::notify />
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

            <a href="{{ route('profile') }}"
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

    {{-- datatable --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.7/js/dataTables.bootstrap4.min.js"></script>

    @notifyJs



    {{-- <script type="text/javascript">
        $(function() {
            var table = $('#myTable').DataTable({
                processing: true,
                serverSide: true,
                // ajax: "{{ route('student_table.ajax') }}",
                columns: [{
                        data: 'id',
                        name: 'id'
                    },
                    {
                        data: 'image',
                        name: 'image'
                    },
                    {
                        data: 'name',
                        name: 'name'
                    },
                    {
                        data: 'price',
                        name: 'price'
                    },
                    {
                        data: 'stocks',
                        name: 'stocks'
                    },

                ]
            });
        });
    </script> --}}
</body>

</html>
