<?php

namespace App\Http\Controllers\Front;

use App\Models\Order;
use App\Models\Rating;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class RatingController extends Controller
{
    public function add(Request $request)
    {
        $stars_rated = $request->input('product_rating');
        $product_id = $request->input('product_id');

        $product_check = Product::where('id', $product_id)->where('status', '0')->first();
        if ($product_check) {
            $verified_purchase = Order::where('orders.user_id', Auth::id())->join('order_items', 'orders.id', 'order_items.order_id')->where('order_items.product_id', $product_id)->get();
            if ($verified_purchase->count() > 0) {
                $rated = Rating::where('user_id', Auth::id())->where('prod_id', $product_id)->first();
                if ($rated) {

                    $rated->stars_rated = $stars_rated;
                    $rated->update();
                } else {
                    Rating::create([
                        'user_id' => Auth::id(),
                        'prod_id' => $product_id,
                        'stars_rated' => $stars_rated,
                    ]);
                }
                return redirect()->back()->with('status', "Rated!!, Thank you.");
            } else {
                return redirect()->back()->with('status', "You Need to Purchase this product first to Rate this Product");
            }
        } else {
            return redirect()->back()->with('status', "Link is Broken");
        }
    }
}
