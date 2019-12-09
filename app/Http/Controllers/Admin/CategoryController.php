<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Category;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{
    private $category;

    public function __construct(Category $category)
    {
        $this->category = $category;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = $this->category->where('parent_id', 0)->get();
        return view('backend.category.list-category')->with('categories', $categories);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = $this->category->where('parent_id', 0)->get();
        return view('backend.category.add-category')->with('categories', $categories);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $category = $this->category;
        if ($category->create($request->all())) {
            $request->session()->flash('success', 'Tạo mới danh mục thành công');
            return redirect()->route('admin.categories.index');
        } else {
            $request->session()->flash('error', 'Tạo mới danh mục thất bại');
            return back();
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
        $category = $this->category->findOrFail($id);
        // dd($category);
        $categories = DB::table('categories')->where('parent_id', '=', 0)->where('id', '!=', $id)->get();
        // dd($categories);
        return view('backend.category.edit-category', compact('categories', 'category'));
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
        $category = $this->category->findOrFail($id);
        if ($category->update($request->all())) {
            $request->session()->flash('success', 'Chỉnh sửa danh mục thành công');
            return redirect()->route('admin.categories.index');
        } else {
            $request->session()->flash('error', 'Chỉnh sửa danh mục thất bại');
            return back();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $category = $this->category->findOrFail($request->category_id);
        if ($category->delete()) {
            $request->session()->flash('success', 'Xóa danh mục thành công');
            return back();
        } else {
            $request->session()->flash('error', 'Xóa danh mục thất bại');
            return back();
        }
    }
}
