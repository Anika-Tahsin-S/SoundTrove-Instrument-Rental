<?php

namespace App\Http\Controllers\Front;

use App\Models\Order;
use App\Models\Review;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class ReviewController extends Controller
{
    public function add($product_url)
    {
        $product = Product::where('custom_url', $product_url)->where('status', '0')->first();
        if ($product) {
            $product_id = $product->id;
            $review = Review::where('user_id', Auth::id())->where('prod_id', $product_id)->first();
            if ($review) {
                return view('frontend.reviews.edit', compact('review'));
            } else {
                $verified_purchase = Order::where('orders.user_id', Auth::id())->join('order_items', 'orders.id', 'order_items.order_id')->where('order_items.product_id', $product_id)->get();
                return view('frontend.reviews.index', compact('product', 'verified_purchase'));
            }

            $verified_purchase = Order::where('orders.user_id', Auth::id())->join('order_items', 'orders.id', 'order_items.order_id')->where('order_items.product_id', $product_id)->get();
            return view('frontend.reviews.index', compact('product', 'verified_purchase'));
        } else {
            return redirect()->back()->with('status', "Link Doesn't Exist");
        }
    }
    public function create(Request $request)
    {
        $product_id = $request->input('product_id');
        $product = Product::where('id', $product_id)->where('status', '0')->first();
        if ($product) {
            $user_review = $request->input('user_review');
            $new_review = Review::create([
                'user_id' => Auth::id(),
                'prod_id' => $product_id,
                'user_review' => $user_review,
            ]);
            $category_url = $product->category->custom_url;
            $product_url = $product->custom_url;
            if ($new_review) {
                return redirect('category/' . $category_url . '/' . $product_url)->with('status', 'Thank you For leaving with a Review');
            }
        } else {
            return redirect()->back()->with('status', 'The Link is Dead');
        }
    }
    public function edit($product_url)
    {
        $product = Product::where('custom_url', $product_url)->where('status', '0')->first();
        if ($product) {
            $product_id = $product->id;
            // $verified_purchase = Order::where('orders.user_id', Auth::id())->join('order_items', 'orders.id', 'order_items.order_id')->where('order_items.product_id', $product_id)->get();
            $review = Review::where('user_id', Auth::id())->where('prod_id', $product_id)->first();
            if ($review) {
                return view('frontend.reviews.edit', compact('review'));
            } else {
                return redirect()->back()->with('status', "I am Dead");
            }
        } else {
            return redirect()->back()->with('status', "I am Deadx2");
        }
    }
    public function update(Request $request)
    {
        $user_review = $request->input('user_review');
        if ($user_review != '') {
            $review_id = $request->input('review_id');
            $review = Review::where('id', $review_id)->where('user_id', Auth::id())->first();
            if ($review) {
                $review->user_review = $request->input('user_review');
                $review->update();
                return redirect('category/' . $review->product->category->custom_url . '/' . $review->product->custom_url)->with('status', 'Review Updated');
            } else {
                return redirect()->back()->with('status', "I am Deadx3");
            }
        } else {
            return redirect()->back()->with('status', "Sheesh!! Not an empty Review Again!");
        }
    }
}
