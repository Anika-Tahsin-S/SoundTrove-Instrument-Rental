<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }
    /** admin-user profile section */
    public function userProfile()
    {
        return view('admin-user');
    }

    // public function index()
    // {
    //     $orders = Order::where('user_id', Auth::id())->get();
    //     return view('frontend.orders.index',compact('orders'));
    // }
}
