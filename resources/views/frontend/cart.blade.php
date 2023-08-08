@extends('layouts.front')
@section('title')
    My Cart
@endsection

@section('content')
    <div class="py-3 mb-4 shadow-sm bg-warning border-top">
        <div class="container">
            <h6 class="mb-0">
                <a href="{{ url('/') }}">
                    Home
                </a> /
                <a href="{{ url('cart') }}">
                    Cart
                </a>
            </h6>
        </div>
    </div>
    <div class="container my-5">
        <div class="card shadow ">
            @if ($cartItems->count()>0)
            <div class="card-body">
                @php
                    $total = 0;
                @endphp
                @foreach ($cartItems as $item)
                    <div class="row product_data">
                        <div class="col-md-2">
                            <img src="{{ asset('assets/uploads/products/' . $item->products->product_image) }}"
                                alt="Image of the Product" class="cart-img">
                        </div>
                        <div class="col-md-4">
                            <h6>{{ $item->products->name }}</h6>
                        </div>
                        <div class="col-md-2">
                            <h6>Tk. {{ $item->products->selling_price }}</h6>
                        </div>
                        <div class="col-md-2">
                            <input type="hidden" class="product_id" value="{{ $item->product_id }}">
                            <input type="hidden" class="product_id" value="{{ $item->product_rent_days }}">
                            @if ($item->products->qty >= $item->product_qty)
                                <label for="Quantity">Quantity</label>
                                <div class="input-group text-center mb-3" style="width:130px;">
                                    <button class="input-group-text changeQty decrease-btn">-</button>
                                    <input type="text" name="quantity" class="form-control qty-inp text-center"
                                        value='{{ $item->product_qty }}'>
                                    <button class="input-group-text changeQty increase-btn">+</button>
                                </div>
                                <label for="Quantity">Rent for (days) </label>
                                <div class="input-group text-center mb-3" style="width:130px;">
                                    <button class="input-group-text changeQty decrease-btnn">-</button>
                                    <input type="text" name="days" class="form-control day-inp text-center"
                                        value='{{ $item->product_rent_days}}'>
                                    <button class="input-group-text changeQty increase-btnn">+</button>
                                </div>
                                @php
                                    $total += $item->products->selling_price * $item->product_qty * $item->product_rent_days;
                                    // $item->total = $total;
                                @endphp
                            @else
                                <h6>Out of Stock</h6>
                            @endif
                        </div>
                        <div class="col-md-2 my-auto ">
                            <button class="btn btn-danger delete-cart-item"> <i class="fa fa-trash"></i> Delete</button>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="card-footer">
                <h6>Total Price: {{ $total }}</h6>
                <a href="{{ url('checkout') }}" class="btn btn-outline-success float-end">Proceed to Checkout</a>
            </div>

            @else
                <div class="card-body text-center">
                    <h2>Your cart is Empty</h2>
                    <h2><i class="fa fa-shopping-cart"></i></h2>
                    <a href="{{ url('category') }}" class="btn btn-outline-primary float-end">Continue shopping</a>
                </div>

            @endif
        </div>
    </div>
@endsection
