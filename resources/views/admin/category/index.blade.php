@extends('layouts.admin')

@section('content')
<div class="card">
    <div class="card-header">
        <h4>Category Section</h4>
        <hr>
        <a href="{{ url('add-category')}}" class="btn" style="color:white; background-color:crimson">
        <i class="material-icons">add</i> Add</a>
    </div>
    <div class="card-body">
        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>Category Id</th>
                    <th>Name</th>
                    <th>Description</th>
                    <th>Image</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($categoryz as $item)
                <tr>
                    <td>{{ $item->id }}</td>
                    <td>{{ $item->name }}</td>
                    <td>{{ $item->description }}</td>
                    <td>
                        <img src="{{ asset('assets/uploads/category/'.$item->image)}}" class="image-category" alt="Image">
                    </td>
                    <td>
                        <a href="{{ url('edit-category/'.$item->id) }}" class="btn btn-primary">Edit</a>
                        <a href="{{ url('delete-category/'.$item->id) }}" class="btn btn-danger">Delete</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection