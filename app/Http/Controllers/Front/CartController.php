<?php

namespace App\Http\Controllers\Front;

use App\Models\Cart;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function add(Request $request)
    {
        $product_id = $request->input('product_id');
        $product_qty = $request->input('product_qty');
        $product_rent_days = $request->input('product_rent_days');

        if (Auth::check()) {
            $product_check = Product::where('id', $product_id)->first();

            if ($product_check) {
                if (Cart::where('product_id', $product_id)->where('user_id', Auth::id())->exists()) {
                    return response()->json(['status' => $product_check->name . " already added to Cart"]);
                } else {
                    $cartItem = new Cart();
                    $cartItem->product_id = $product_id;
                    $cartItem->user_id = Auth::id();
                    $cartItem->product_qty = $product_qty;
                    $cartItem->product_rent_days = $product_rent_days;
                    $cartItem->save();
                    return response()->json(['status' => $product_check->name . " added To cart"]);
                }
            }
        } else {
            return response()->json(['status' => "You Must be Logged In to Continue"]);
        }
    }
    public function viewcart()
    {
        $cartItems = Cart::where('user_id',Auth::id())->get();
        return view('frontend.cart',compact('cartItems'));
    }
    public function delete(Request $request)
    {
        if (Auth::check()) {
            $product_id = $request->input('product_id');
            if(Cart::where('product_id',$product_id)->where('user_id',Auth::id())->exists()){
                $cartitem = Cart::where('product_id',$product_id)->where('user_id',Auth::id())->first();
                $cartitem->delete();
                return response()->json(['status' => "Deleted Item from Cart Successfully"]);
            }
        }
        else{
            return response()->json(['status' => "You Must be Logged In to Continue"]);
        }
    }
    public function update(Request $request)
    {
        $product_id = $request->input('product_id');
        $product_qty = $request->input('product_qty');
        $product_rent_days = $request->input('product_rent_days');

        if(Auth::check()){
            if(Cart::where('product_id',$product_id)->where('user_id',Auth::id())->exists()){
                $cart = Cart::where('product_id',$product_id)->where('user_id',Auth::id())->first();
                $cart->product_qty = $product_qty;
                $cart->product_rent_days = $product_rent_days;
                $cart->update();
                return response()->json(['status' => "Updated Successfully"]);
            }
        }
    }
    public function cartcount()//
    {
        $cartcount = Cart::where('user_id',Auth::id())->count();
        return response()->json(['count' => $cartcount]);
    }

}
