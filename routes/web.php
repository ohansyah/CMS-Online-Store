<?php

/**
 * Admin CMS Controller
 */
use App\Http\Controllers\Admin\BannerController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\DashboardController as AdminDashboard;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\UserController as AdminUser;

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

use App\Http\Controllers\App\BannerController as AppBanner;
use App\Http\Controllers\App\HomeController as AppHome;
use App\Http\Controllers\App\ProductController as AppProduct;
use Illuminate\Support\Facades\Route;

Auth::routes();

Route::get('/', [AppHome::class, 'index'])->name('app.home.index');

Route::prefix('banner')->group(function () {
    Route::get('/', [AppBanner::class, 'index'])->name('app.banner.index');
    Route::get('/{banner}', [AppBanner::class, 'show'])->name('app.banner.show');
});

Route::prefix('product')->group(function () {
    Route::get('/', [AppProduct::class, 'index'])->name('app.product.index');
    Route::get('/{product}', [AppProduct::class, 'show'])->name('app.product.show');
});

Route::prefix('admin')->group(function () {
    Route::get('/dashboard', [AdminDashboard::class, 'index'])->name('dashboard');
    Route::get('/profile', [AdminUser::class, 'profile'])->name('admin.profile');
    Route::put('/profile', [AdminUser::class, 'update'])->name('admin.update');
    Route::post('/password/update', [AdminUser::class, 'updatePassword'])->name('admin.password.update');

    // banner
    Route::get('banner/datatable', [BannerController::class, 'datatable'])->name('banner.datatables');
    Route::resource('banner', BannerController::class);

    // category
    Route::get('category/datatable', [CategoryController::class, 'datatable'])->name('category.datatables');
    Route::resource('category', CategoryController::class);

    // product
    Route::get('product/datatable', [ProductController::class, 'datatable'])->name('product.datatables');
    Route::resource('product', ProductController::class);
});
