@extends('admin.layout.app')

@section('content')
    <p class="fw-bold text-center mt-3 fs-4">Update Product</p>
    <div class="d-flex align-items-center justify-content-center p-3">

        <form method="post" action="{{ route('product.update', ['id' => $product->id]) }}" class="row"
            enctype="multipart/form-data">
            @csrf
            <div class="mb-3 col-6">
                <label class="form-label">Product Name</label>
                <input type="text" class="form-control" name="name" value="{{ $product->name }}">
                @error('name')
                    <div id="error" class="error text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3 col-6">
                <label class="form-label">Price</label>
                <input type="number" class="form-control" name="price" value="{{ $product->price }}">
                @error('price')
                    <div id="error" class="error text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label class="form-label">Description</label>
                <textarea class="form-control" name="description">{{ $product->description }}</textarea>
                @error('description')
                    <div id="error" class="error text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label class="form-label">No of stocks</label>
                <input type="number" class="form-control" name="stocks" value="{{ $product->stocks }}">
                @error('stocks')
                    <div id="error" class="error text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="border ms-3 mb-2 d-flex align-center justify-center"
                style="max-width: 150px;object-fit:cover; position: relative;" id="img_container">
                <img src="" style="width: 100px" id="product_image">
                <button type="button"
                    class="p-2 border bg-danger text-light d-flex align-items-center btn text-danger fs-6"
                    style="position: absolute; top: 0; right: 0; height:20px" onclick="removeImg()"
                    id="remove_btn">x</button>
            </div>

            <div class="mb-3" id="img_picker">
                <label class="form-label">Image</label>
                <input type="file" name="image" accept="image/*" required>
                @error('image')
                    <div id="error" class="error text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="d-flex">
                <x-button class="w-100">Update</x-button>
            </div>
        </form>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            setImage();
            let img_picker = document.getElementById('img_picker');
            let img_container = document.getElementById('img_container');
            let remove_btn = document.getElementById('remove_btn');
            img_picker.style.display = 'none';
        });

        function setImage() {
            let product_image = document.getElementById('product_image');
            product_image.src = "{{ $product->image }}";
        }

        function removeImg() {
            product_image.src = "";
            img_picker.style.display = 'block';
            img_container.remove();
            remove_btn.remove();
        }
    </script>
@endsection
