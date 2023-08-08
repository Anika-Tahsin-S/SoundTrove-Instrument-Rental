@extends('layouts.front')
@section('title')
    Write A review
@endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="com-md-12">
                <div class="card">
                    <div class="card-body">
                        @if ($verified_purchase->count() > 0)
                            <h5>You are Writing a Review for {{ $product->name }}</h5>
                            <form action="{{ url('add-review') }}" method="POST">
                                @csrf
                                <input type="hidden" name="product_id" value="{{ $product->id }}">
                                <textarea class="form-control" name="user_review" row="5" placeholder="Write A Review"></textarea>
                                <button type="submit" class='btn btn-primary mt-2'>Submit</button>
                            </form>
                        @else
                            <div class="alert alert-danger">
                                <h5>You Are not Eligible to Review thius product</h5>
                                <p>
                                    For more Accurate information and Reviews,
                                    Only users who bought before can Review!!
                                </p>
                            </div>
                            <a href="{{ url('/') }}"class='btn btn-primary mt-2 float-end'>Go to Home Page</a>
                        @endif

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
