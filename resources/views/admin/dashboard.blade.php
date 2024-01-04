@extends('admin.layout.app')

@section('content')
    <div class="mx-2">
        <div class="bg-light d-flex align-items-center p-3 justify-content-between ">
            <p class="fs-3">Dashboard</p>
            <x-username-display />
        </div>


        <div class="d-flex mt-4 gap-2">
            <div class="flex-grow-1 bg-light p-3 rounded border shadow-sm">
                <p>Number of Products</p>
                <strong class="fs-4">14715</strong>
            </div>

            <div class="flex-grow-1  bg-light p-3 rounded border shadow-sm">
                <p> Top selling products</p>
                <strong class="fs-4">1855</strong>
            </div>

            <div class="flex-grow-1 bg-light p-3 rounded border shadow-sm">
                <p> Number of orders</p>
                <strong class="fs-4">145</strong>
            </div>

            <div class="col-2 bg-light p-3 rounded border shadow-sm">
                <p> Number of shipped</p>
                <strong class="fs-4">53</strong>
            </div>
            <div class="col-2 bg-light p-3 rounded border shadow-sm">
                <p> Number of delivered</p>
                <strong class="fs-4">87</strong>
            </div>
        </div>

        <div class="char_container mt-4 d-flex gap-3">
            <img src="{{ url('/product_images/chart_bar.gif') }}" alt="chart_bar" class="image-fluid rounded "
                style="height: 300px;  filter: grayscale(70%); box-shadow: 5px 5px 10px rgba(0, 0, 0, 0.5) ,
                -2px -2px 10px rgba(0, 0, 0, 0.5);"
                width="600px">
            <img src="{{ url('/product_images/chart_candle.gif') }}" alt="chart_candle" class="image-fluid rounded"
                style="height: 300px ;  filter: grayscale(70%); box-shadow: 5px 5px 10px rgba(0, 0, 0, 0.5) ,
                -2px -2px 10px rgba(0, 0, 0, 0.5);"
                width="600px">
        </div>
    </div>
@endsection
