<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

class StaticController extends Controller
{
    public function home()
    {
        return Inertia::render('Welcome', [
            'canLogin' => Route::has('login'),
            'canRegister' => Route::has('register'),
            'Categories' => Category::all(),
            'Randompost' => Post::inRandomOrder()->limit(3)->get(),
        ]);
    }


    public function about()
    {
        return Inertia::render('About', [
            'canLogin' => Route::has('login'),
            'canRegister' => Route::has('register'),
            'Categories' => Category::all(),
            'Randompost' => Post::inRandomOrder()->limit(3)->get(),
        ]);
    }
    public function portfolio()
    {
        return Inertia::render('Portfolio', [
            'canLogin' => Route::has('login'),
            'canRegister' => Route::has('register'),
            'Categories' => Category::all(),
            'Randompost' => Post::inRandomOrder()->limit(3)->get(),
        ]);
    }
}
