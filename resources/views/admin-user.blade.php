@extends('layouts.front')
@section('title')
    My Profile
@endsection

<!-- navbar  -->
@section('content')
<div class="page-wrapper">
    <div class="content container">
        <div class="page-header">
            <div class="row">
                <div class="col">
                    <h3>
                        <div class="p-3 mb-2 bg-secondary bg-gradient text-white">Profile</div>
                        
                    </h3>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ url('/')}}">Dashboard</a></li>
                        <li class="breadcrumb-item active">Profile</li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="profile-header">
                    <div class="row align-items-center">
                        <div class="col-auto profile-image">
                        <h2 data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                        {{ Auth::user()->name }}
                        </h2>
                        </div>
                        <div class="col ms-md-n2 profile-user-info">
                            <h4 class="user-name mb-0">{{ Session::get('name') }}</h4>
                            
                        </div>
                        <style>
                            .btn-light-purple {
                                background-color: #adb5bd   ; /* Light purple color */
                                color: white; /* Text color */
                                /* You can add more styles here, like border, hover effects, etc. */
                            }
                        </style>

                        <div class="col-auto profile-btn">
                            <a href="" class="btn btn-light-purple">Edit</a>
                            <a href="{{ url('/') }}" class="btn btn-light-purple">Back</a>

                        </div>
                    </div>
                </div>
                <div class="profile-menu">
                    <ul class="nav nav-tabs nav-tabs-solid">
                        <li class="nav-item">
                            <a class="nav-link active" data-bs-toggle="tab" href="#per_details_tab">About</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-bs-toggle="tab" href="#password_tab">Password</a>
                        </li>
                    </ul>
                </div>
                <div class="tab-content profile-tab-cont">

                    <div class="tab-pane fade show active" id="per_details_tab">
                        <div class="row">
                            <div class="col-lg-9">
                                <div class="card">
                                    <div class="card-header header-h">
                                        <h4>Personal Details</h4>
                                    </div>

                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-4 mt-3">
                                            <label for="">Name</label>
                                            <div class="p-2 border">{{Auth::user()->name}}</div>
                                        </div>
                                        <div class="col-md-4 mt-3">
                                            <label for="">Email</label>
                                            <div class="p-2 border">{{Auth::user()->email}}</div>
                                        </div>
                                        


                                    </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3">

                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="card-title d-flex justify-content-between">
                                            <span>Account Status</span>
                                        </h5>
                                        <!-- <button class="btn btn-success" type="button"><i class="fe fe-check-verified"></i> Active</button> -->
                                        <style>
                                            .profile-btn {
                                                margin-bottom: 5px; /* Adjust the spacing as needed */
                                            }
                                        </style>

                                        <div class="row align-items-center">
                                            <div class="col-auto profile-btn">
                                                <a href="{{ url('cart') }}" class="btn btn-info">Cart</a>
                                            </div>
                                            
                                            <div class="col-auto profile-btn">
                                                <a href="{{ url('wishlist') }}" class="btn btn-info">wishlist</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>

                    <div id="password_tab" class="tab-pane fade">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Change Password</h5>
                                <div class="row">
                                    <div class="col-md-10 col-lg-6">
                                        <form action="{{ __('Reset Password') }}" method="POST">
                                            @csrf
                                            <div class="form-group">
                                                <label>Old Password</label>
                                                <input type="password" class="form-control @error('current_password') is-invalid @enderror" name="current_password" value="{{ old('current_password') }}">
                                                @error('current_password')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                           
                                            <div class="form-group">
                                                <label>New Password</label>
                                                <input type="password" class="form-control @error('new_password') is-invalid @enderror" name="new_password" value="{{ old('new_password') }}">
                                                @error('new_password')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label>Confirm Password</label>
                                                <input type="password" class="form-control @error('new_confirm_password') is-invalid @enderror" name="new_confirm_password" value="{{ old('new_confirm_password') }}">
                                                @error('new_confirm_password')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                            <button type="submit" class="btn btn-primary">Save Changes</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection



