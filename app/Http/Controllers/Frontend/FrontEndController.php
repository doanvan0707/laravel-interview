<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
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

    public function addToCart($id)
    {
        $product = Product::findOrFail($id);
        return view('frontend.product.cart', compact('product'));
    }
}
