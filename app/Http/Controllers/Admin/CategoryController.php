<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;
use Inertia\Inertia;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Inertia::render('Admin/Category/Viewcategories', [
            'categories' => Category::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return Inertia::render('Admin/Category/Add', [
            'categories' => Category::all(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', Rule::unique(Category::class), 'max:255'],
            'description' => ['required'],
            'category_image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'category_slug' => ['required', 'string', Rule::unique(Category::class), 'max:255'],
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
            // Save was successful
            $request->session()->flash('message', 'Category ' . $request->categoryName . ' created successfully.');
        } else {
            // Save failed
            $request->session()->flash('message', 'Category ' . $request->categoryName . ' created failed.');
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
    public function edit($category)
    {
        return Inertia::render('Admin/Category/Edit', [
            'singlecategory' => Category::findOrFail($category),
            'categories' => Category::all(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $category)
    {
        $categoryupdate = Category::findOrFail($category);

        $request->validate([
            'name' => ['string', 'max:255', Rule::unique('categories')->ignore($categoryupdate->id)],
            'description' => ['nullable', 'string'],
            'category_image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'category_slug' => ['string', 'max:255', Rule::unique('categories')->ignore($categoryupdate->id)],
        ]);


        $categoryupdate->name = $request->name;
        $categoryupdate->description = $request->description;
        $categoryupdate->category_slug = Str::limit($request->category_slug, 40);


        if ($request->hasFile('category_image')) {
            // Delete old image if exists
            if ($categoryupdate->category_image) {
                Storage::delete('public/images/category/' . $categoryupdate->category_image);
            }

            $file_name = time() . '.' . $request->category_image->extension();
            $request->category_image->move(public_path('images/category'), $file_name);
            $categoryupdate->category_image = $file_name;
        }



        if ($categoryupdate->update()) {
            $request->session()->flash('message', 'Category updated successfully.');
        }


    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, $category)
    {
        $postcount = Post::where('category_id', $category)->count();
        if ($postcount == 0) {
            $deletecategory = Category::findOrFail($category);
            $deletecategory->delete();
            $request->session()->flash('message', 'Category deleted successfully.');
        } else {
            $request->session()->flash('message', 'Category deleted failed. delete the post with this category');
        }
    }
}
