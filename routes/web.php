<?php

use Inertia\Inertia;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Auth\Admin\AdminAuthenticatedSessionController;

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


Route::get('/dashboard', function () {
  return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
  Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
  Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
  Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';

// my codes
Route::get('/', [ProductController::class, 'index'])
  ->name('public.welcome');

Route::get('/products/{product}', [ProductController::class, 'show'])
  ->name('public.products.show');

Route::get('/cart', function () {
  return Inertia::render('Public/Cart');
})
  ->name('cart');

Route::get('/admin/session/create', [AdminAuthenticatedSessionController::class, 'create'])
  ->name('admin.session.create');

Route::post('/admin/session', [AdminAuthenticatedSessionController::class, 'store'])
  ->name('admin.session.store');

Route::middleware('admin')->group(function () {
  Route::get('/admin/dashboard', function () {
    return Inertia::render('Admin/Dashboard');
  })
  ->name('admin.dashboard');
  
  Route::get('/admin/products', [ProductController::class, 'index'])
  ->name('admin.products.index');
  
  Route::get('/admin/products/create', [ProductController::class, 'create'])
  ->name('admin.products.create');
  
  Route::post('/admin/products', [ProductController::class, 'store'])
  ->name('admin.products.store');
  
  Route::get('/admin/products/{product}/edit', [ProductController::class, 'edit'])
  ->name('admin.products.edit');
  
  Route::put('/admin/products/{product}', [ProductController::class, 'update'])
  ->name('admin.products.update');
  
  Route::delete('/admin/products/{product}', [ProductController::class, 'destroy'])
  ->name('admin.products.destroy');

  Route::delete('/admin/session', [AdminAuthenticatedSessionController::class, 'destroy'])
    ->name('admin.session.destroy');
});