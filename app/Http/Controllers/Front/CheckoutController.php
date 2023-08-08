<?php

namespace App\Http\Controllers\Front;

use App\Models\Cart;
use App\Models\User;
use App\Models\Order;
use App\Models\Product;
use App\Models\OrderItem;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class CheckoutController extends Controller
{
    public function index()
    {
        $old_cartitems = Cart::where('user_id', Auth::id())->get();
        foreach ($old_cartitems as $items) {
            if (!Product::where('id', $items->product_id)->where('qty', '>=', $items->product_qty)->exists()) {
                $remove_item = Cart::where('user_id', Auth::id())->where('product_id', $items->product_id)->first();
                $remove_item->delete();
            }
        }
        $cart_items = Cart::where('user_id', Auth::id())->get();
        return view('frontend.checkout', compact('cart_items'));
    }

    public function place_order(Request $request)
    {
        $order = new Order();
        $order->user_id = Auth::id();
        $order->total = $request->input('total');
        $order->fname = $request->input('fname');
        $order->email = $request->input('email');
        $order->phone = $request->input('phone');

        $total = 0;
        $cartitems_total = Cart::where('user_id', Auth::id())->get();
        foreach ($cartitems_total as $prod) {
            $price = $prod->products->selling_price * $prod->product_qty * $prod->product_rent_days;
            $total += $price;
        }
        $order->total = $total;

        $order->track_no = 'Ikaz' . rand(1111, 9999);
        $order->save();

        $cart_items = Cart::where('user_id', Auth::id())->get();
        foreach ($cart_items as $item) {
            OrderItem::create([
                'order_id' => $order->id,
                'product_id' => $item->product_id,
                'qty' => $item->product_qty,
                'rdays' => $item->product_rent_days,
                'price' => $item->products->selling_price * $item->product_qty * $item->product_rent_days,
            ]);
            $prod = Product::where('id', $item->product_id)->first();
            $prod->qty = $prod->qty - $item->product_qty;
            $prod->update();
        }
        if (Auth::user()->address1 == NULL) {
            $user = User::where('id', Auth::id())->first();

            $user->name = $request->input('fname');
            $user->phone = $request->input('phone');
            $user->update();
        }
        $ordereditems = Cart::where('user_id', Auth::id())->get();
        Cart::destroy($ordereditems);
        return redirect('/')->with('status', "Order is placed, Thank you");
    }
}
