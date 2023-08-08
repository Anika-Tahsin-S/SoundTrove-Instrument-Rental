@extends('layouts.admin')

@section('title')
    'Dashbord'
@endsection

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header header-h">
                    <h4>User Details
                        <a href="{{ url('users') }}" class="btn btn-warning float-right"> Back</a>
                    </h4>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-4 mt-3">
                            <label for="">Role</label>
                            <div class="p-2 border">{{$users->role_as=='0'? 'User':'Admin' }}</div>
                        </div>
                        <div class="col-md-4 mt-3">
                            <label for="">Name</label>
                            <div class="p-2 border">{{$users->name}}</div>
                        </div>
                        <div class="col-md-4 mt-3">
                            <label for="">Email</label>
                            <div class="p-2 border">{{$users->email}}</div>
                        </div>
                        <div class="col-md-4 mt-3">
                            <label for="">Contact No.</label>
                            <div class="p-2 border">{{$users->phone}}</div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
