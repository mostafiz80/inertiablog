<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        return Inertia::render('Codespace', [
            'posts' => Post::with('category')->get(),
        ]);

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post, $slug)
    {
        $post = Post::where('post_slug', $slug)->with('category', 'user')->firstOrFail();
        return Inertia::render('Single', [
            'post' => $post,
            'comments' => Comment::where('post_id', $post->id)->with('user')->get(),
            'count' => $post->comments()->count(),
        ]);
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
