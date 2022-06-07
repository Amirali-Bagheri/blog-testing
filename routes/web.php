<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PostsController;
use App\Http\Controllers\SiteController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [SiteController::class, 'index'])->name('blog.index');
Route::get('/post/{slug}', [PostsController::class, 'show'])->name('blog.single');

Route::prefix('dashboard')->middleware(['auth'])->group(function(){

    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

    Route::get('/posts/create', [PostsController::class, 'create'])->name('dashboard.posts.create');
    Route::post('/posts/store', [PostsController::class, 'store'])->name('dashboard.posts.store');
    Route::get('/posts/edit', [PostsController::class, 'edit'])->name('dashboard.posts.edit');
    Route::post('/posts/update', [PostsController::class, 'update'])->name('dashboard.posts.update');
    Route::delete('/posts/destroy', [PostsController::class, 'destroy'])->name('dashboard.posts.destroy');
});

require __DIR__ . '/auth.php';
