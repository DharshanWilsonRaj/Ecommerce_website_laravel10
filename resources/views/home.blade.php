@extends('layout.app')

@section('content')
    <div class="container d-flex justify-content-center mt-5">
        <div class="row justify-content-evenly ">
            @foreach ($products as $product)
                <div class="product card col-2 mb-4 mx-1 ">
                    @if ($product->image)
                        <img src="{{ $product->image }}" alt="{{ $product->name }}" class="img-fluid rounded mx-auto d-block"
                            style="height: 150px; width:200px">
                    @endif
                    <h2 class="text-center">{{ $product->name }}</h2>
                    <p class="fs-5 fw-bold text-center">Price: ${{ $product->price }}</p>
                </div>
            @endforeach

        </div>
    </div>
@endsection
