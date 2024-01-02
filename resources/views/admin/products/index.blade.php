@extends('admin.layout.app')

@section('content')
    <div class="bg-light d-flex align-items-center p-3 justify-content-between">
        <p class="fs-3">Products</p>
        <x-username-display />
    </div>
    <div class="m-1 mx-3">
        <div class="d-flex">
            <div class="ms-auto">
                <a href="{{ route('admin.product.add') }}">
                    <x-button> Add Products</x-button>
                </a>
            </div>
        </div>
        <table class="table table-hover mt-2">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Image</th>
                    <th scope="col">Name</th>
                    <th scope="col">Price</th>
                    <th scope="col">Stocks</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
        </table>
    </div>
@endsection
