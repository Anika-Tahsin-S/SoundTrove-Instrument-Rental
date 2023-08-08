@extends('layouts.front')

@section('title')
    My Rents
@endsection

@section('content')
    <div class="container py-5">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header colour">
                        <h4>Rent items View
                           <a href="{{ url('my-orders') }}" class="btn btn-warning float-end">Back<a>
                        </h4>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-4 ord-details">
                                <h4>Shipping Details</h4>
                                <hr>
                                <label for="">First Name</label>
                                <div class="border ">{{ $orders->fname }}</div>
                                <label for="">Email</label>
                                <div class="border ">{{ $orders->email }}</div>
                                <label for="">Contact No.</label>
                                <div class="border ">{{ $orders->phone }}</div>

                            </div>
                            <div class="col-md-8">
                                <h4>Rent Details</h4>
                                <hr>
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>Qunatity</th>
                                            <th>Rent Days</th>
                                            <th>Image</th>
                                            <th>Item Total</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($orders->orderItems as $item)
                                            <tr>
                                                <td>{{ $item->products->name }}</td>
                                                <td>{{ $item->qty }}</td>
                                                <td>{{ $item->rdays }}</td>
                                                <td>
                                                    <img
                                                        src="{{ asset('assets/uploads/products/' . $item->products->product_image) }}"
                                                        width = "140px" alt="Image Of the Product">
                                                </td>
                                                <td>{{ $item->price }}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                <h4 class="px-2"> Total Rent Cost: <span class="float-end">{{ $orders->total }} BDT</span> </h4>
                            </div>
                        </div>

                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
