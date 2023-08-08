@extends('layouts.admin')

@section('content')
<div class="card">
    <div class="card-header">
        <h4>Add Upcoming Product</h4>
    </div>
    <div class="card-body">
        <form action="{{url('insert-up')}}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="">Name</label>
                    <input type="text" class="form-control" name="name">
                </div>
                <div class="col-md-12 mb-3">
                    <label for="">Small Description</label>
                    <textarea name="small_desc" rows="3" class="form-control"></textarea>
                </div>
                <div class="col-md-12">
                    <button type="submit" class="btn btn-primary">Publish</button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection
