<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Order;

use function Ramsey\Uuid\v1;

class FrontendController extends Controller
{
    public function index()
    {
        $users=User::all();
        $orders = Order::where('o_status','0')->get();
        return view('admin.index',compact('users', 'orders'));
    }
}

