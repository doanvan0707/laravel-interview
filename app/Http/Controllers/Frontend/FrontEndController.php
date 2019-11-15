<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Http\Controllers\Controller;
use App\Category;
use App\Product;
use App\Post;


class FrontEndController extends Controller
{
    public function index()
    {
        $products = Product::all();
        return view('frontend.home.index', compact('products'));
    }

    public function getDetailProduct($id) 
    {
        $product = Product::findOrFail($id);
        $products = Product::where('id', '<>', $id)->get();
        return view('frontend.product.detail-product', compact('product', 'products'));
    }

    public function addToCart(Request $request, $id)
    {
        $product = Product::findOrFail($id);
        if (!$product) {
            abort(404);
        }
        $cart = session()->get('cart');

        // if cart is empty this the first product
        if (!$cart) {
            $cart = [
                $id => [
                    'name' => $product->name,
                    'quantity' => 1,
                    'price' => $product->price,
                    'image' => $product->image
                ]
            ];
            session()->put('cart', $cart);
            return back()->with('success', 'Them san pham vao gio hang thanh cong');
        }

        // if cart not empty then check if this product exits then increment quantity
        if (isset($cart[$id])) {
            $cart[$id]['quantity']++;
            session()->put('cart', $cart);
            return back()->with('success', 'Them san pham vao gio hang thanh cong');
        }

        // if item not exist in cart then add to cart with quantity = 1
        $cart[$id] = [
            'name' => $product->name,
            'quantity' => 1,
            'price' => $product->price,
            'image' => $product->image
        ];

        session()->put('cart', $cart);

        return back()->with('success', 'Them san pham vao gio hang thanh cong');
    }

    public function showAllCart()
    {
        return view('frontend.product.cart');
    }
}
