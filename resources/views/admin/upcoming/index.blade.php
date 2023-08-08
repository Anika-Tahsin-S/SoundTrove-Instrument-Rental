@extends('layouts.admin')

@section('content')
<div class="card">
    <div class="card-header">
        <h4>Upcoming Product Section</h4>
        <hr>
        <a href="{{ url('add-up')}}" class="btn" style="color:white; background-color:crimson">
        <i class="material-icons">add</i> Add</a>
    </div>
    <div class="card-body">
        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th style="text-align: center">Name</th>
                    <th style="text-align: center">Small Description</th>
                    <th style="text-align: center">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($upcomingz as $item)
                <tr>
                    <td style="text-align: center">{{ $item->name }}</td>
                    <td style="text-align: center">{{ $item->small_desc}}</td>
                    <td style="text-align: center">
                        <a href="{{ url('edit-up-prod/'.$item->id) }}" class="btn btn-primary">Edit</a>
                        <a href="{{ url('delete-up-prod/'.$item->id) }}" class="btn btn-danger">Delete</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
