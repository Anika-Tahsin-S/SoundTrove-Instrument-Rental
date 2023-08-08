<!-- product index -->
@extends('layouts.front')
@section('title')
    Products of {{ $category->name }}
@endsection

@section('content')
    <div class="py-3 mb-4 shadow-sm bg-warning border-top">
        <div class="container">
            <a href="{{ url('category') }}">
                Collections
            </a> /
            <a href="{{ url('category/' . $category->custom_url) }}">
                {{ $category->name }}
            </a>
        </div>
    </div>

    <div class="py-5">
        <div class="container">
            <div class="row">
                <h2>{{ $category->name }}</h2>
                @foreach ($products as $item)
                    <div class="col-md-3 mb-3">
                        <div class="card">
                            <a href="{{ url('category/' . $category->custom_url . '/' . $item->custom_url) }}"
                                class=''>
                                <img class="pro-image" src="{{ asset('assets/uploads/products/' . $item->product_image) }}"
                                    alt="Image of the Product">
                                <div class="card-body">
                                    <h5>{{ $item->name }}</h5>
                                    <span class="float-start">{{ $item->selling_price }}</span>
                                    <span class="float-end"><s>{{ $item->original_price }}</s></span>
                                </div>
                            </a>

                        </div>
                    </div>
                @endforeach

            </div>
        </div>
    </div>
@endsection
