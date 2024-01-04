@extends('layout.app')

@section('content')
    <div class="mx-5 my-3 d-flex gap-2">
        <div class="column-1 w-75 border h-100 shadow-sm rounded">
            <table class="table ">
                <thead>
                    <tr>
                        <th>S.no</th>
                        <th>Product</th>
                        <th>Price</th>
                        <th>Quantity</th>
                        <th>Subtotal</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="align-middle">
                        <td>1</td>
                        <td class="">
                            <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSr-FZy9FMrqd0KgPLXQvlftYiIXbkNJTFdwA&usqp=CAU"
                                alt="" width="50px" style="display: inline-block">
                            <span>watch </span>
                        </td>
                        <td>
                            $78
                        </td>
                        <td class="d-flex align-items-center ">
                            <button class="btn fs-3">+</button>
                            <span class="fs-5">2</span>
                            <button class="btn fs-3">-</button>
                        </td>
                        <td>
                            $156
                        </td>
                        <td>
                            <button class="bg-danger px-1 text-white rounded">X</button>
                        </td>
                    </tr>
                    <tr class="align-middle">
                        <td>1</td>
                        <td>
                            <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSr-FZy9FMrqd0KgPLXQvlftYiIXbkNJTFdwA&usqp=CAU"
                                alt="" width="50px" style="display: inline-block">
                            <span>watch </span>
                        </td>
                        <td>
                            $78
                        </td>
                        <td class="d-flex align-items-center ">
                            <button class="btn fs-3">+</button>
                            <span class="fs-5">2</span>
                            <button class="btn fs-3">-</button>
                        </td>
                        <td>
                            $156
                        </td>
                        <td>
                            <button class="bg-danger px-1 text-white rounded">X</button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="column-2 w-25 border shadow-sm p-2 d-flex align-items-center rounded" style="height: 400px">
            <div class=" w-100">
                <h5 class="fs-5 fw-bold">Cart Total</h5>
                <div class="d-flex mt-4 ">
                    <p>Subtotal</p>
                    <p class="ms-auto">$156</p>
                </div>
                <hr class="my-2 text-secondary">
                <div class="d-flex mt-4">
                    <p>Sipping chart</p>
                    <p class="ms-auto">$8</p>
                </div>
                <hr class="my-2 text-secondary">
                <div class="d-flex mt-4">
                    <p>Total </p>
                    <p class="ms-auto fw-bold ">$164</p>
                </div>
                <x-button class="w-100 my-2">Proceed to checkout</x-button>
            </div>


        </div>
    </div>
@endsection
