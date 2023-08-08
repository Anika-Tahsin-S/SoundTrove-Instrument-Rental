@extends('layouts.front')
@section('title')
    My Wishlist
@endsection

@section('content')
    <div class="py-3 mb-4 shadow-sm bg-warning border-top">
        <div class="container">
            <h6 class="mb-0">
                <a href="{{ url('/') }}">
                    Home
                </a> |
                <a href="{{ url('wishlist') }}">
                    Wishlist
                </a>
            </h6>
        </div>
    </div>
    <div class="container my-6">
        <div class="card shadow ">
            <div class="card-body"></div>
                @if($wishlist -> count()>0)
                
                
                @foreach ($wishlist as $item)
                    <div class="row product_data">
                        <div class="col-md-2 my-auto">
                            <img src="{{ asset('assets/uploads/products/' . $item->products->product_image) }}"
                                alt="Image of the Product" class="cart-img">
                        </div>
                        <div class="col-md-2 my-auto">
                            <h6>{{ $item->products->name }}</h6>
                        </div>
                        <div class="col-md-2 my-auto">
                            <h6>Tk. {{ $item->products->selling_price }}</h6>
                        </div>
                        <div class="col-md-2">
                            <input type="hidden" class="product_id" value="{{ $item->product_id }}">
                            @if ($item->products->qty >= $item->product_qty)
                                
                                <label for="Quantity">Quantity</label>
                                <div class="input-group text-center mb-3" style="width:130px;">
                                    <button class="input-group-text decrease-btn">-</button>
                                    <input type="text" name="quantity" class="form-control qty-inp text-center"
                                        value='{{ 1 }}'>
                                    <button class="input-group-text increase-btn">+</button>
                                </div>
                                <label for="Quantity">Rent for (days) </label>
                                <div class="input-group text-center mb-3" style="width:130px;">
                                    <button class="input-group-text decrease-btnn">-</button>
                                    <input type="text" name="days" class="form-control day-inp text-center"
                                        value='{{ 1 }}'>
                                    <button class="input-group-text increase-btnn">+</button>
                                </div>
                                
                            @else
                                <h6>Out of Stock</h6>
                            @endif
                        </div>
                        <div class="col-md-2 my-auto">
                            <button class="btn btn-success addToCartBtn"> Add to Cart <i class="fa fa-shopping-cart"></i> </button>
                        </div>
                        <div class="col-md-2 my-auto">
                            <button class="btn btn-danger delete-wish-item"> <i class="fa fa-trash"></i> Remove</button>
                        </div>
                    </div>
                @endforeach
             

                @else
                    <div class="card-body text-center">
                        <h2>There are no products in your Wishlist</h2>
                        <h2><i class="fa fa-shopping-cart"></i></h2>
                        <a href="{{ url('category') }}" class="btn btn-outline-primary float-end">Continue shopping</a>
                    </div>
                @endif
            </div>
        </div>
    </div>
@endsection
