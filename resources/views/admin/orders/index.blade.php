@extends('admin.layout.app')

@section('content')
    <div class="bg-light p-3">
        <p class="fs-3">Orders</p>
    </div>

    <div>
        <table id="myTable" class="table table-hover mt-3">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Order ID</th>
                    <th scope="col">Product Name</th>
                    <th scope="col">Address</th>
                    <th scope="col">Date</th>
                    <th scope="col">Price</th>
                    <th scope="col">status</th>
                </tr>
            </thead>
            <tbody>
            </tbody>
        </table>
    </div>

    <script type="text/javascript">
        $(function() {
            let table = $('#').DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{ route('admin.products') }}",
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
                    {
                        data: 'actions',
                        name: 'actions'
                    },
                ].map(column => ({
                    ...column,
                    className: 'align-middle'
                })) // here i am using bootstrap class for align row items center
            });

        });
    </script>
@endsection
