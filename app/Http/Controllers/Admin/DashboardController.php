<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

use function Ramsey\Uuid\v1;

class DashboardController extends Controller
{
    public function users()
    {
        $users=User::all();
        return view('admin.users.index',compact('users'));
    }
    public function users_view($id)
    {
        $users = User::find($id);
        return view('admin.users.view',compact('users'));
    }
    public function delUser($id)
    {
        $users = User::find($id);
        $users -> delete();
        return redirect('/dashboard')->with('status', 'User Successfully Banned');
    }

}
