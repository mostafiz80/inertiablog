<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\PostController as AdminPostController;
use App\Http\Controllers\Admin\UsersController;
use App\Http\Controllers\PortfolioController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\StaticController;
use App\Models\Post;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', [StaticController::class, 'home'])->name("home");
Route::get('/about', [StaticController::class, 'about'])->name("about");
Route::get('/portfolio', [PortfolioController::class, 'index'])->name("portfolio");
Route::get('/birthday-tool', [StaticController::class, 'birthday'])->name("birthday-tool");
Route::get('/periodic', [StaticController::class, 'periodictable'])->name("periodic-table");
Route::get('/contact', [StaticController::class, 'contact'])->name("contact");

Route::get('/codespace', [PostController::class, 'index'])->name("codespace");
Route::get('/single/{slug}', [PostController::class, 'show'])->name("single");


// Admin user
Route::get('/admin/dashboard', [AdminController::class, 'index'])->middleware(['auth', 'verified', 'Admin'])->name('admin.dashboard');
Route::get('/admin', [AdminController::class, 'index'])->middleware(['auth', 'verified', 'Admin'])->name('admin.dashboard');
Route::middleware(['auth', 'verified', 'Admin'])->resource('/admin/users', UsersController::class);
Route::middleware(['auth', 'verified', 'Admin'])->resource('/admin/posts', AdminPostController::class);
Route::middleware(['auth', 'verified', 'Admin'])->resource('/admin/categories', CategoryController::class);


Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
