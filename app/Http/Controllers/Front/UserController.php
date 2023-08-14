<?php

namespace App\Http\Controllers\Front;

use App\Models\Order;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function index()
    {
        $orders = Order::where('user_id', Auth::id())->get();
        return view('frontend.orders.index',compact('orders'));
    }
    public function view($id)
    {
        $orders = Order::where('id',$id)->where('user_id',Auth::id())->first();
        return view('frontend.orders.view',compact('orders'));
    }

    
//     // attempt to add use function
//     public function add()
//     {
//         return view('admin.users.add');
//     }
//     public function insert(Request $request)
//     {
//         $user = new ADD_User();
//         $user->name = $request->input('Name');
//         $user->email = $request->input('Email');
//         $user->phone = $request->input('Contact No.');
//         // $user->status = $request->input('status') == True ? '1' : '0';
//         $user->save();
//         return redirect('/dashboard')->with('status', 'User sucessfully added');
//     }//
}
