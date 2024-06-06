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
            'Categories' => Category::all(),
            'Randompost' => Post::inRandomOrder()->limit(3)->get(),
        ]);
    }


    public function about()
    {
        return Inertia::render('About', [
            'Categories' => Category::all(),
            'Randompost' => Post::inRandomOrder()->limit(3)->get(),
        ]);
    }
    public function portfolio()
    {
        return Inertia::render('Portfolio', [
            'Categories' => Category::all(),
            'Randompost' => Post::inRandomOrder()->limit(3)->get(),
        ]);
    }
    public function birthday()
    {
        return Inertia::render('Tools/Birthdate');
    }
    public function periodictable()
    {
        return Inertia::render('Tools/Periodic');
    }
    public function contact()
    {
        return Inertia::render('Contact');
    }
}
