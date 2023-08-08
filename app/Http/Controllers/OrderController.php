<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::where('o_status','0')->get();
        return view('admin.orders.index',compact('orders'));
    }
    public function viewOrder($id)
    {
        $orders = Order::where('id',$id)->first();
        return view('admin.orders.view',compact('orders'));
    }
    public function update(Request $request, $id)
    {
        $orders = Order::find($id);
        $orders->o_status = $request->input('order_status');
        $orders->update();
        return redirect('orders')->with('status',"Order Updated Sucessfully");
    }
    public function ordHistory()
    {
        $orders = Order::where('o_status','1')->get();
        return view('admin.orders.history',compact('orders'));//
    }
}
