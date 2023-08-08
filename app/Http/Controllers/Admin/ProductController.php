<?php

namespace App\Http\Controllers\Admin;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Support\Facades\File;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();
        return view('admin.product.index', compact('products'));
    }

    public function add()
    {
        $category = Category::all();
        return view('admin.product.add', compact('category'));
    }
    public function insert(Request $request)
    {
        $products = new Product();
        if ($request->hasFile('product_image')) {
            $file = $request->file('product_image');
            $ext = $file->getClientOriginalExtension();
            $filename = time() . '.' . $ext;
            $file->move('assets/uploads/products/', $filename);
            $products->product_image = $filename;
        }
        $products->category_id = $request->input('category_id');
        $products->name = $request->input('name');
        $products->description = $request->input('description');
        $products->custom_url = $request->input('custom_url');
        $products->small_description = $request->input('small_description');
        

        $products->original_price = $request->input('original_price');
        $products->tax = $request->input('tax');
        $products->selling_price = $request->input('selling_price');
        $products->qty = $request->input('qty');

        $products->status = $request->input('status') == True ? '1' : '0';
        $products->popular = $request->input('popular') == True ? '1' : '0';

        $products->meta_title = $request->input('meta_title');
        $products->meta_description = $request->input('meta_description');
        $products->meta_keywords = $request->input('meta_keywords');
        $products->save();
        return redirect('/products')->with('status', 'The Product is sucessfully added');
    }
    public function edit($id)
    {
        $products = Product::find($id);
        return view('admin.product.edit', compact('products'));
    }
    public function update(Request $request, $id)
    {
        $products = Product::find($id);
        if ($request->hasFile('product_image')) {
            $path = 'assets/uploads/products/' . $products->product_image;
            if (File::exists($path)) {
                File::delete($path);
            }
            $file = $request->file('product_image');
            $ext = $file->getClientOriginalExtension();
            $filename = time() . '.' . $ext;
            $file->move('assets/uploads/products', $filename);
            $products->product_image = $filename;
        }
        $products->name = $request->input('name');
        $products->description = $request->input('description');
        $products->custom_url = $request->input('custom_url');
        $products->small_description = $request->input('small_description');
        

        $products->original_price = $request->input('original_price');
        $products->tax = $request->input('tax');
        $products->selling_price = $request->input('selling_price');
        $products->qty = $request->input('qty');

        $products->status = $request->input('status') == True ? '1' : '0';
        $products->popular = $request->input('popular') == True ? '1' : '0';

        $products->meta_title = $request->input('meta_title');
        $products->meta_description = $request->input('meta_description');
        $products->meta_keywords = $request->input('meta_keywords');
        $products->update();
        return redirect('/products')->with('status', 'The Product is sucessfully updated');
    }
    public function del($id)
    {
        $products = Product::find($id);
        if ($products->product_image) {
            $path = 'assets/uploads/product/' . $products->product_image;
            if (File::exists($path)) {
                File::delete($path);
            }
        }
        $products->delete();
        return redirect('/products')->with('status', 'Product sucessfully Deleted');
    }
}