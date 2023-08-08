<?php

namespace App\Http\Controllers\Admin;

use App\Models\UpcomingProducts;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UpcomingProductController extends Controller
{
    public function index()
    {
        $upcomingz = UpcomingProducts::all();
        return view('admin.upcoming.index', compact('upcomingz'));
    }
    public function add()
    {
        return view('admin.upcoming.addup');
    }
    public function insert(Request $request)
    {
        $upproducts = new UpcomingProducts();
        $upproducts->name = $request->input('name');
        $upproducts->small_desc = $request->input('small_desc');
        $upproducts->save();

        return redirect('up-products')->with('status', 'The Upcoming Product is sucessfully added');
    }

    public function edit($id)
    {
        $upproducts = UpcomingProducts::find($id);
        return view('admin.upcoming.editup', compact('upproducts'));
    }
    public function update(Request $request, $id)
    {
        $upproducts = UpcomingProducts::find($id);


        $upproducts->name = $request->input('name');
        $upproducts->small_desc = $request->input('small_desc');
        $upproducts->update();
        return redirect('up-products')->with('status', 'Upcoming product sucessfully updated');
    }
    public function del($id)
    {
        $upproducts = UpcomingProducts::find($id);
        $upproducts->delete();
        return redirect('up-products')->with('status', 'Upcoming product sucessfully Deleted');
    }

}
