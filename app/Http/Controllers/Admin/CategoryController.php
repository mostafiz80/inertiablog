<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

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
            'category_image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'category_slug' => ['required', 'string', 'max:255'],
        ]);

        $category_slug = Str::limit($request->category_slug, 40, '');
        $file_name = time() . '.' . $request->category_image->extension();
        request()->category_image->move(public_path('images/category'), $file_name);



        $category = new Category();
        $category->name = $request->name;
        $category->description = $request->description;
        $category->category_image = $file_name;
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
    public function update(Request $request, int $id)
    {
        $category = Category::findOrFail($id);
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'description' => ['required'],
            'category_image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'category_slug' => ['required', 'string', 'max:255'],
        ]);

        if ($request->category_image) {
            $file_name = time() . '.' . $request->category_image->extension();
            request()->category_image->move(public_path('images/category'), $file_name);
            $category->category_image = $file_name;
        }


        $category->name = $request->name;
        $category->description = $request->description;
        $category_slug = Str::limit($request->category_slug, 40, '');
        $category->category_slug = $category_slug;
        if ($category->save()) {
            return redirect()->route('categories.create')->with('success', 'Category updated Successfully');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id)
    {
        $postcount = Post::where('category_id', $id)->count();
        if ($postcount == 0) {
            $deletecategory = Category::findOrFail($id);
            $deletecategory->delete();
            return redirect()->route('categories.create')->with('success', 'Category deleted');
        } else {
            return redirect()->route('categories.create')->with('error', 'Remove the posts associate the category');
        }
    }
}
