@extends('layouts.admin')

@section('content')
<div class="card">
    <div class="card-header">
        <h4>Edit or Update Product</h4>
    </div>
    <div class="card-body">
        <form action="{{url('update-product/'.$products->id)}}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="row">
                <div class="col-md-12 mb-3">
                    <select class="form-select">
                        <option value="">{{ $products->category->name }}</option>
                    </select>
                </div>
                <div class=" col-md-6 mb-3">
                    <label for="">Name</label>
                    <input type="text" value="{{ $products->name }}" class=" form-control" name="name">
                </div>
                <div class="col-md-6 mb-3">
                    <label for="">Custom URL</label>
                    <input type="text" class="form-control" value="{{ $products->custom_url }}" name="custom_url">
                </div>
                <div class="col-md-12 mb-3">
                    <label for="">Description</label>
                    <textarea name="description" rows="3" value=""
                        class="form-control">{{ $products->description }}</textarea>
                </div>
                <div class="col-md-12 mb-3">
                    <label for="">Small Description</label>
                    <textarea name="small_description" rows="3"
                        class="form-control">{{ $products->small_description }}</textarea>
                </div>


                <div class="col-md-6 mb-3">
                    <label for="">Original Rent Cost</label>
                    <input type="number" class="form-control" value="{{ $products->original_price }}"
                        name="original_price">
                </div>
                <div class="col-md-6 mb-3">
                    <label for="">Tax</label>
                    <input type="number" class="form-control" value="{{ $products->tax }}" name="tax">
                </div>
                <div class="col-md-6 mb-3">
                    <label for="">Rent Cost</label>
                    <input type="number" class="form-control" value="{{ $products->selling_price }}"
                        name="selling_price">
                </div>
                <div class="col-md-6 mb-3">
                    <label for="">Quantity</label>
                    <input type="number" class="form-control" value="{{ $products->qty }}" name="qty">
                </div>

                <div class="col-md-6 mb-3">
                    <label for="">Hide</label>
                    <input type="checkbox" {{ $products->status == 1 ? 'checked':'' }} name="status">
                </div>
                <div class="col-md-6 mb-3">
                    <label for="">Popular</label>
                    <input type="checkbox" {{ $products->popular == 1 ? 'checked':'' }} name="popular">
                </div>

                <div class="col-md-12 mb-3">
                    <label for="">Meta Title</label>
                    <input type="text" value="{{ $products->meta_title }}" class="form-control" name="meta_title">
                </div>
                <div class="col-md-12 mb-3">
                    <label for="">Meta Keywords</label>
                    <textarea name="meta_keywords" rows="1"
                        class="form-control">{{ $products->meta_keywords }}</textarea>
                </div>
                <div class="col-md-12 mb-3">
                    <label for="">Meta Description</label>
                    <textarea name="meta_description" rows="1"
                        class="form-control">{{ $products->meta_description }}</textarea>
                </div>

                @if($products->product_image)
                <img src="{{ asset('assets/uploads/products/'.$products->product_image) }}" class="image-category"
                    alt="No Image">
                @endif
                <div class="col-md-12">
                    <input type="file" name="product_image" class="form-control">
                </div>

                <div class="col-md-12">
                    <button type="submit" class="btn btn-primary">EDIT</button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection

