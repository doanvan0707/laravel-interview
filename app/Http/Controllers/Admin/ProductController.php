<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Category;
use App\Product;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::all();
        return view('backend.product.list-product', compact('products', $products));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::where('parent_id','<>', 0)->get();
        return view('backend.product.add-product', compact('categories', $categories));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if ($request->hasFile('image')) {
            $file = $request->image;
            $fileName = $file->getClientOriginalName();
            $data = [
                'name' => $request->name,
                'image' => $fileName,
                'description' => $request->description,
                'category_id' => $request->category_id,
                'screen' => $request->screen,
                'system' => $request->system,
                'fcamera' => $request->fcamera,
                'bcamera' => $request->bcamera,
                'price' => $request->price,
                'cpu' => $request->cpu,
                'ram' => $request->ram,
                'rom' => $request->rom,
                'smenory' => $request->smenory,
                'pin' => $request->pin,
                'quantity' => $request->quantity,
            ];
        }

        $products = new Product();
        $products->create($data);
        if ($products) {
            if ($request->hasFile('image')) {
                $file = $request->image;
                $fileName = $file->getClientOriginalName();
                $file->move('uploads', $fileName);
            }
            notify()->success('True');
            return redirect()->route('admin.products.index')->with('success', 'Create product successly');
        } else {
            notify()->success('False');
            return redirect()->route('admin.products.index')->with('error', 'Create product failure');;
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = Product::findOrFail($id);
        $categories = Category::where('parent_id','<>', 0)->get();
        return view('backend.product.edit-product', compact('product', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $product = Product::findOrFail($id);
        $product->name = $request->name;
        if ($request->hasFile('image')) {
            $file = $request->image;
            $fileName = $file->getClientOriginalName();
            $file->move('uploads', $fileName);
            $product->image = $fileName;
        }
        $product->description = $request->description;
        $product->category_id = $request->category_id;
        $product->screen = $request->screen;
        $product->system = $request->system;
        $product->fcamera = $request->fcamera;
        $product->bcamera = $request->bcamera;
        $product->price = $request->price;
        $product->cpu = $request->cpu;
        $product->ram = $request->ram;
        $product->rom = $request->rom;
        $product->smenory = $request->smenory;
        $product->pin = $request->pin;
        $product->quantity = $request->quantity;
        $product->save();
        if ($product->save()) {
            return redirect()->route('admin.products.index')->with('success', 'Update product successly');
        } else {

            return redirect()->route('admin.products.index')->with('error', 'Update product failure');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        if ($product->delete()) {
            return redirect()->route('admin.products.index')->with('success', 'Delete product successly');
        } else {
            return redirect()->route('admin.products.index')->with('error', 'Delete product failure');
        }
    }
}
