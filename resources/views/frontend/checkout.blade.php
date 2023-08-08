@extends('layouts.front')
@section('title')
    Checkout
@endsection

@section('content')
    <div class="py-3 mb-4 shadow-sm bg-warning border-top">
        <div class="container">
            <h6 class="mb-0">
                <a href="{{ url('/') }}">
                    Home
                </a> /
                <a href="{{ url('checkout') }}">
                    Checkout
                </a>
            </h6>
        </div>
    </div>
    <div class="conatiner mt-5 cont">
        <form action="{{ url('place-order') }}" method="POST">
            {{ csrf_field() }}
            <div class="row">
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-body">
                            <h6>Basic Details</h6>
                            <hr>
                            <div class="row form-checkout">
                                <div class="col-md-6">
                                    <label for="firstname">First Name</label>
                                    <input type="text" name="fname" value="{{ Auth::user()->name }}" class="form-control firstname" placeholder="Enter First Name">
                                    <span id="fname_error" class=" war-text" ></span>
                                </div>

                                <div class="col-md-6">
                                    <label for="email">Email</label>
                                    <input type="email" name="email" value="{{ Auth::user()->email }}" class="form-control email" placeholder="Enter Email">
                                    <span id="email_error" class=" war-text" ></span>
                                </div>
                                <div class="col-md-6">
                                    <label for="">Contact Number</label>
                                    <input type="text" name="phone" value="{{ Auth::user()->phone }}" class="form-control phone" placeholder="Enter Contact Number">
                                    <span id="phone_error" class=" war-text" ></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-body">
                            <h6>Rent Detalis</h6>
                            <hr>
                            <table class="table table-striped table-bordered">
                                <tbody>
                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>Rent Cost</th>
                                            <th>Quantity</th>
                                            <th>Days</th>
                                            <th>Total Cost (Tk.)</th>
                                        </tr>
                                    </thead>
                                    @php
                                        $total = 0;
                                    @endphp
                                    @foreach ($cart_items as $item)
                                        <tr>
                                            <td>{{ $item->products->name }}</td>
                                            <td>{{ $item->products->selling_price }}</td>
                                            <td>{{ $item->product_qty }}</td>
                                            <td>{{ $item->product_rent_days }}</td>
                                            <td>{{ $item->products->selling_price * $item->product_qty * $item->product_rent_days }}</td>
                                        </tr>
                                        @php
                                            $total += $item->products->selling_price * $item->product_qty * $item->product_rent_days;
                                        @endphp
                                    @endforeach
                                </tbody>
                            </table>
                            <hr>
                            <h6>Total Price: <strong>Tk. {{ $total }}</strong></h6>
                            <button type="submit" class="btn btn-primary bg-success w-100">Place Rent Request | Cash on Rent</button>
                            <button type ='submit'class="btn btn-primary bg-danger w-100 mt-3 razorpay-btn">Pay With Bkash</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection

@section('scripts')

@endsection
