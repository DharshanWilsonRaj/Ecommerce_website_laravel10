@extends('admin.layout.app')

@section('content')
    <p class="fw-bold text-center mt-3 fs-4">Add Product</p>
    <div class="d-flex align-items-center justify-content-center p-3">

        <form method="post" action="{{ route('admin.product.store')}}" class="row" enctype="multipart/form-data">
            @csrf
            <div class="mb-3 col-6">
                <label class="form-label">Product Name</label>
                <input type="text" class="form-control" name="name" value="{{ old('name') }}">
                @error('name')
                    <div id="error" class="error text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3 col-6">
                <label class="form-label">Price</label>
                <input type="number" class="form-control" name="price" value="{{ old('price') }}">
                @error('price')
                    <div id="error" class="error text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label class="form-label">Description</label>
                <textarea class="form-control" name="description">{{ old('description') }}</textarea>
                @error('description')
                    <div id="error" class="error text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label class="form-label">No of stocks</label>
                <input type="number" class="form-control" name="stocks" value="{{ old('stocks') }}">
                @error('stocks')
                    <div id="error" class="error text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label class="form-label">Image</label>
                <input type="file" name="image" accept="image/*" required>
                @error('image')
                    <div id="error" class="error text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="d-flex">
                <x-button class="w-100"> Add Products</x-button>
            </div>
        </form>
    </div>
@endsection
