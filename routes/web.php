<?php

use App\Http\Controllers\PostController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\StaticController;
use App\Models\Post;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', [StaticController::class, 'home'])->name("home");

Route::get('/about', [StaticController::class, 'about'])->name("about");

Route::get('/contact', function () {
    return Inertia::render('Contact', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
    ]);
})->name("contact");

Route::get('/codespace', [PostController::class, 'index'])->name("codespace");
Route::get('/single/{slug}', [PostController::class, 'show'])->name("single");

Route::get('/portfolio', [StaticController::class, 'portfolio'])->name("portfolio");



Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
