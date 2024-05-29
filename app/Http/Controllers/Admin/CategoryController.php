<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.blog.category.viewcategory', [
            'categories' => Category::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.blog.category.viewcategory', [
            'categories' => Category::all(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'description' => ['required'],
            'icon' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'category_slug' => ['required', 'string', 'max:255'],
        ]);

        $category_slug = Str::limit($request->category_slug, 40, '');
        $file_name = time() . '.' . $request->icon->extension();
        request()->icon->move(public_path('images/category'), $file_name);



        $category = new Category();
        $category->name = $request->name;
        $category->description = $request->description;
        $category->icon = $file_name;
        $category->category_slug = $category_slug;
        if ($category->save()) {
            return redirect()->route('categories.create')->with('success', 'Category Created Successfully');
        }

    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(int $id)
    {
        return view('admin.blog.category.editcategory', [
            'scategory' => Category::findOrFail($id),
            'categories' => Category::all(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $category)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        //
    }
}
