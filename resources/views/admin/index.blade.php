@extends('layouts.admin')

@section('content')
    <div class="card">
        <div class="card-body">
            <h1>Admin Pannel</h1>
        </div>
    </div>
    <div class="card">
        <div class="card-header header-h">
            <h4>Registered Users</h4>
        </div>
        <div class="card-body">
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Contact no.</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                        <tr>
                            <td>{{ $user->id }}</td>
                            <td>{{ $user->name.' '.$user->lname }}</td>
                            <td>{{ $user->email }}</td>
                            <td>{{ $user->phone }}</td>
                            <td>
                                <a href="{{ url('users/view-user/' . $user->id) }}"class="btn btn-primary btn-sm">View</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <div class="card">
        <div class="card-header header-h">
            <h4>Pending Requests </h4>
        </div>
        <div class="card-body">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Rent Request Date</th>
                        <th>Tracking Number</th>
                        <th>Total Rent Cost</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($orders as $item)
                        <tr>
                            <td>{{ date('d-m-y', strtotime($item->created_at)) }}</td>
                            <td>{{ $item->track_no }}</td>
                            <td>{{ $item->total }}</td>
                            <td>{{ $item->o_status == "0"? 'pending': 'completed' }}</td>
                            <td>
                                <a href="{{ url('orders/view-order/'.$item->id) }}" class="btn btn-primary">view</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
