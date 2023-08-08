@extends('layouts.admin')

@section('content')
<div class="card">
    <div class="card-header">
        <h4>Edit or Update Category</h4>
    </div>
    <div class="card-body">
        <form action="{{url('update-category/'.$category->id)}}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="">Name</label>
                    <input type="text" value="{{ $category->name }}" class="form-control" name="name">
                </div>
                <div class="col-md-6 mb-3">
                    <label for="">Custom URL</label>
                    <input type="text" value="{{ $category->custom_url }}" class="form-control" name="custom_url">
                </div>
                <div class="col-md-12 mb-3">
                    <label for="">Description</label>
                    <textarea name="description" rows="3" class="form-control">{{ $category->description }}</textarea>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="">Status</label>
                    <input type="checkbox" {{ $category->status == 1 ? 'checked':'' }} name="status">
                </div>
                <div class="col-md-6 mb-3">
                    <label for="">Popular</label>
                    <input type="checkbox" {{ $category->is_popular == 1 ? 'checked':'' }} name="is_popular">
                </div>

                <div class="col-md-12 mb-3">
                    <label for="">Meta Title</label>
                    <input type="text" value="{{ $category->meta_title }}" class="form-control" name="meta_title">
                </div>
                <div class="col-md-12 mb-3">
                    <label for="">Meta Keywords</label>
                    <textarea name="meta_keywords" rows="3"
                        class="form-control">{{ $category->meta_keywords }}</textarea>
                </div>
                <div class="col-md-12 mb-3">
                    <label for="">Meta Description</label>
                    <textarea name="meta_description" rows="3"
                        class="form-control">{{ $category->meta_description }}</textarea>
                </div>

                @if($category->image)
                <img src="{{ asset('assets/uploads/category/'.$category->image) }}" class="image-category"
                    alt="No Image">
                @endif
                <div class="col-md-12">
                    <input type="file" name="image" class="form-control">
                </div>
                <div class="col-md-16">
                    <button type="submit" class="btn btn-primary">EDIT</button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection