<?php

namespace App\Http\Controllers\Backend;

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
            return redirect()->route('admin.products.index')->with('success', 'Create product successly');
        } else {

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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
