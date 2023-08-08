@extends('layouts.admin')

@section('content')
    <div class="card">
        <div class="card-header header-h">
            <h4>Registered Users
        </div>
        <div class="card-body">
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th >Id</th>
                        <th style="text-align: center">Name</th>
                        <th style="text-align: center">Email</th>
                        <th style="text-align: center">Contact no.</th>
                        <th style="text-align: center">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                        <tr>
                            <td style="text-align: center">{{ $user->id }}</td>
                            <td style="text-align: center">{{ $user->name.' '.$user->lname }}</td>
                            <td style="text-align: center">{{ $user->email }}</td>
                            <td style="text-align: center">{{ $user->phone }}</td>
                            <td style="text-align: center">
                                <a href="{{ url('users/view-user/' . $user->id) }}"class="btn btn-primary btn-sm">View</a>
                                <a href="{{ url('delete-users/' . $user->id) }}"class="btn btn-danger btn-sm">Ban</a>
                            </td>

                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
