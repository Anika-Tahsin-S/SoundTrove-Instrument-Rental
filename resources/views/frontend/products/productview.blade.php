@extends('layouts.front')

@section('title')
    {{ $products->name }}
@endsection

@section('content')
    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form action="{{ url('add-rating') }}" method="POST">
                    @csrf
                    <input type="hidden" name="product_id" value="{{ $products->id }}">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Rate {{ $products->name }}</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="rating-css">
                            <div class="star-icon">
                                <input type="radio" value="1" name="product_rating" checked id="rating1">
                                <label for="rating1" class="fa fa-star"></label>
                                <input type="radio" value="2" name="product_rating" id="rating2">
                                <label for="rating2" class="fa fa-star"></label>
                                <input type="radio" value="3" name="product_rating" id="rating3">
                                <label for="rating3" class="fa fa-star"></label>
                                <input type="radio" value="4" name="product_rating" id="rating4">
                                <label for="rating4" class="fa fa-star"></label>
                                <input type="radio" value="5" name="product_rating" id="rating5">
                                <label for="rating5" class="fa fa-star"></label>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="py-3 mb-4 shadow-sm bg-warning border-top">
        <div class="container">
            <h6 class="mb-0">
                <a href="{{ url('category') }}">
                    Collections
                </a> /
                <a href="{{ url('category/' . $products->category->custom_url) }}">
                    {{ $products->category->name }}
                </a> /
                <a href="{{ url('category/' . $products->category->custom_url . '/' . $products->custom_url) }}">
                    {{ $products->name }}
                </a>
            </h6>
        </div>
    </div>
    <div class="container">
        <div class="card shadow product_data">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-4 border-right">
                        <img src="{{ asset('assets/uploads/products/' . $products->product_image) }}" class="pro-image"
                            alt="Image of the Product">
                    </div>
                    <div class="col-md-8">
                        <h2 class="mb-0">
                            {{ $products->name }}
                            @if ($products->popular == '1')
                                <label style="font-size:.8rem"
                                    class="float-end badge bg-danger trending_tag">
                                    Trending
                                    <!--{{ $products->popular == '1' ? 'Popular' : '' }}-->
                                </label>
                            @endif

                        </h2>
                        <hr>
                        <label class="me-3">Rent cost: <s>Tk. {{ $products->original_price }}</s></label>
                        <label class="fw-bold">Tk. {{ $products->selling_price }}</label>
                        @php
                            $ratenum = number_format($rating_value);
                        @endphp
                        <div class="rating">
                            @for ($i = 1; $i <= $ratenum; $i++)
                                <i class="fa fa-star checked"></i>
                            @endfor
                            @for ($j = $ratenum + 1; $j <= 5; $j++)
                                <i class="fa fa-star"></i>
                            @endfor
                            <span>
                                @if ($ratings->count() <= 0)
                                    No Ratings yet
                                @else
                                    {{ $ratings->count() }} Ratings
                                @endif

                            </span>
                        </div>
                        <p class="mt-3">
                            {!! $products->small_description !!}
                        </p>
                        <hr>
                        @if ($products->qty > 0)
                            <label class="badge bg-success">In Stock</label>
                        @else
                            <label class="badge bg-danger">Out of Stock</label>
                        @endif
                        <div class="row mt-2">
                            <div class="col-md-2">
                                <input type="hidden" value="{{ $products->id }}" class="product_id" />
                                <label for="Quantity">Quantity</label>
                                <div class="input-group text-center mb-3">
                                    <button class="input-group-text decrease-btn">-</button>
                                    <input type="text" name="quantity " value="1"
                                        class="form-control qty-inp text-center " />
                                    <button class="input-group-text increase-btn">+</button>
                                </div>
                                <label for="Quantity">Rent for (days) </label>
                                <div class="input-group text-center mb-3">
                                    <button class="input-group-text decrease-btnn">-</button>
                                    <input type="text" name="days " value="1"
                                        class="form-control day-inp text-center " />
                                    <button class="input-group-text increase-btnn">+</button>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-10">
                            <br />
                            <button type="button" class="btn addToWishlist btn-success me-3  float-lg-start">Add to Wishlist <i
                                    class="fa fa-heart"></i> </button>
                            @if ($products->qty > 0)
                                <button type="button" class="btn addToCartBtn btn-primary me-3 float-lg-start">Add to
                                    Cart
                                    <i class="fa fa-shopping-cart"></i> </button>
                            @endif
                        </div>
                    </div>
                    <hr>
                    <h3>Description</h3>
                    <p class="des-p mt-3">
                        {!! $products->description !!}
                    </p>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <button type="button" class="btn btn-primary py-2" data-bs-toggle="modal"
                            data-bs-target="#exampleModal">
                            Rate this Product
                        </button>
                        <a href='{{ url('add-review/' . $products->custom_url . '/userreview') }}'
                            class="btn btn-link py-2">
                            Write A review
                        </a>
                    </div>
                    <div class="com-md-8 py-2 float-end">
                        @foreach ($reviews as $review)
                            <div class="user-review">
                                <label>{{ $review->users->name . ' ' . $review->users->lname }}</label>
                                @if ($review->user_id == Auth::id())
                                    <a href="{{ url('edit-review/' . $products->custom_url . '/userreview') }}"
                                        class="btn btn-outline-primary">edit</a>
                                @endif
                                <br>
                                @php
                                    $rating = App\Models\Rating::where('prod_id', $products->id)
                                        ->where('user_id', $review->users->id)
                                        ->first();
                                @endphp
                                @if ($rating)
                                    @php
                                        $user_rated = $rating->stars_rated;
                                    @endphp
                                    @for ($i = 1; $i <= $user_rated; $i++)
                                        <i class="fa fa-star checked"></i>
                                    @endfor
                                    @for ($j = $user_rated + 1; $j <= 5; $j++)
                                        <i class="fa fa-star"></i>
                                    @endfor
                                @endif
                                <br>
                                <small>Reviewed on {{ $review->created_at->format('d M Y') }}</small>
                                <p>
                                    {{ $review->user_review }}
                                </p>
                            </div>
                        @endforeach

                    </div>


                </div>
            </div>
        </div>
    </div>

@endsection

{{-- @section('scripts')

@endsection --}}

