<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.blog.posts.viewposts', ['posts' => Post::orderBy("created_at", "desc")->paginate(10)]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        return view('admin.blog.posts.createpostform', ['categories' => Category::orderBy('created_at', 'desc')->get()]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'post_title' => 'required|unique:posts|max:255',
            'post_slug' => 'required|unique:posts|max:255',
            'post_content' => 'required',
            'category_id' => 'required',
            'post_thumbnail' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $post = new Post();
        $file_name = time() . '.' . request()->post_thumbnail->getClientOriginalExtension();
        request()->post_thumbnail->move(public_path('images/post'), $file_name);

        $post->post_title = $request->post_title;
        $post->post_slug = $request->post_slug;
        $post->post_content = $request->post_content;
        $post->category_id = $request->category_id;
        $post->user_id = Auth()->user()->id;
        $post->post_thumbnail = $file_name;

        $post->save();
        return redirect()->route('posts.create')->with('success', 'Post Created Successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $post)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        //
    }
}
