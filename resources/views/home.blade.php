@extends('layout.app')

@section('content')
    <div class="container d-flex mt-5">
        <div class="row">
            @foreach ($products as $product)
                <div class="product border col-2 mx-3 mb-2 p-2 rounded shadow-sm">
                    @if ($product->image)
                        <img src="{{ $product->image }}" alt="{{ $product->name }}" class="img-fluid rounded mx-auto d-block"
                            style="height: 150px; width:200px">
                    @endif
                    <h2 class="text-center mt-2">{{ $product->name }}</h2>
                    <p class="fs-5 fw-bold text-center">Price: ${{ $product->price }}</p>
                    <a href="{{ route('addCart', ['id' => $product->id]) }}">
                        <x-button class="w-100 my-2">Add to cart</x-button>
                    </a>
                </div>
            @endforeach
        </div>
    </div>
@endsection
