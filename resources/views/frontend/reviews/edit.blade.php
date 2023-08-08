@extends('layouts.front')
@section('title')
    Edit the review
@endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="com-md-12">
                <div class="card">
                    <div class="card-body">
                        <h5>You are Writing a Review for {{ $review->product->name }}</h5>
                        <form action="{{ url('update-review') }}" method="POST">
                            @csrf
                            @method('PUT')
                            <input type="hidden" name="review_id" value="{{ $review->id }}">
                            <textarea class="form-control" name="user_review" row="5" placeholder="Write A Review">{{ $review->user_review }}</textarea>
                            <button type="submit" class='btn btn-primary mt-2'>Update</button>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
