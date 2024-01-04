@extends('admin.layout.app')

@section('content')
    <div class="bg-light d-flex align-items-center p-3 justify-content-between">
        <p class="fs-3">Products</p>
        <x-username-display />
    </div>
    <div class="my-2 mx-3">
        <div class="d-flex my-3">
            <div class="ms-auto">
                <a href="{{ route('admin.product.add') }}">
                    <x-button> Add Products</x-button>
                </a>
            </div>
        </div>
        <table id="myTable" class="table table-hover mt-3">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Image</th>
                    <th scope="col">Name</th>
                    <th scope="col">Price $</th>
                    <th scope="col">Stocks</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>
            </tbody>
        </table>
    </div>

    <script type="text/javascript">
        $(function() {
            let table = $('#myTable').DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{ route('admin.products') }}",
                pageLength: 5,
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
