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
                    @forelse ($carts as $cart)
                        <tr class="align-middle">
                            <td>1</td>
                            <td class="d-flex align-items-center">
                                <img src="{{ $cart->image }}" alt="" width="70px" style="display: inline-block">
                                <span class="ms-2">{{ $cart->product_name }}</span>
                            </td>
                            <td>{{ $cart->price }}</td>
                            <td class="">

                                <button class="fw-bold fs-4 p-0 mx-2  my-2"
                                    onclick="updateQuantity({{ $cart->id }} ,'add')">-</button>
                                <span class=" fs-4" id="quantity-{{ $cart->id }}">{{ $cart->quantity }}</span>
                                <button class="fw-bold fs-4 p-0 mx-2 my-2"
                                    onclick="updateQuantity({{ $cart->id }} ,'add')">+</button>
                            </td>
                            <td id="product_subtotal" id="product_subtotal">${{ $cart->subtotal }}
                            </td>
                            <td>
                                <button class="bg-danger px-1 text-white rounded"
                                    onclick="removeCartItem({{ $cart->id }})">
                                    <i class="fa-solid fa-trash-can"></i>
                                </button>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td class="text-center" colspan="6">No data</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        <div class="column-2 w-25 border shadow-sm p-2 d-flex align-items-center rounded" style="height: 400px">
            <div class=" w-100">
                <h5 class="fs-5 fw-bold">Cart Total</h5>
                <div class="d-flex mt-4 ">
                    <p>Subtotal</p>
                    <p class="ms-auto" id="subtotal">$156</p>
                </div>
                <hr class="my-2 text-secondary">
                <div class="d-flex mt-4">
                    <p>Sipping chart</p>
                    <p class="ms-auto" id="shippingCost">$8</p>
                </div>
                <hr class="my-2 text-secondary">
                <div class="d-flex mt-4">
                    <p>Total </p>
                    <p class="ms-auto fw-bold " id="totalCost">$164</p>
                </div>
                <x-button class="w-100 my-2">Proceed to checkout</x-button>
            </div>


        </div>
    </div>

    <script>
        function updateQuantity(cartId, action) {
            quantity = $(`#quantity`);
            product_subtotal = $('#product_subtotal');
            $.ajax({
                url: `/update-cart/${cartId}/${action}`,
                type: 'GET',
                dataType: "json",
                success: function(data) {
                    quantity.text(data.quantity);
                    product_subtotal.text(`$${data.subtotal}`);
                }
            });
        }
    </script>
@endsection
