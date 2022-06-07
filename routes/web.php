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

Route::get('/dashboard', [DashboardController::class, 'index'])->middleware(['auth'])->name('dashboard');

require __DIR__ . '/auth.php';
