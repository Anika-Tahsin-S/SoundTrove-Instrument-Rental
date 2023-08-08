@extends('layouts.admin')

@section('content')
<div class="card">
    <div class="card-header">
        <h4>Edit or Update Upcoming Products</h4>
    </div>
    <div class="card-body">
        <form action="{{url('update-up-prod/'.$upproducts->id)}}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="">Name</label>
                    <input type="text" value="{{ $upproducts->name }}" class="form-control" name="name">
                </div>
                <div class="col-md-12 mb-3">
                    <label for="">Small Description</label>
                    <input type="text" value="{{ $upproducts->small_desc }}" class="form-control" name="small_desc">

                </div>
                <div class="col-md-16">
                    <button type="submit" class="btn btn-primary">EDIT</button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection
