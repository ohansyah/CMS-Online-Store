<?php

use App\Http\Controllers\Admin\BannerController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\DashboardController as AdminDashboard;
use App\Http\Controllers\Admin\GeneralSettingController;
use App\Http\Controllers\Admin\HotDealsController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\UserController as AdminUser;
use App\Http\Controllers\App\BannerController as AppBanner;
use App\Http\Controllers\App\HomeController as AppHome;
use App\Http\Controllers\App\ProductController as AppProduct;
use App\Http\Controllers\Auth\LoginController;
use Illuminate\Support\Facades\Route;
use Spatie\Health\Http\Controllers\HealthCheckResultsController;

/*
|--------------------------------------------------------------------------
| AUTHENTICATION Routes
|--------------------------------------------------------------------------
 */
// Auth::routes();
Route::get('login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('login', [LoginController::class, 'login']);
Route::post('logout', [LoginController::class, 'logout'])->name('logout');

/*
|--------------------------------------------------------------------------
| WEB APP Routes
|--------------------------------------------------------------------------
 */
Route::get('/', [AppHome::class, 'index'])->name('app.home.index');

Route::prefix('banner')->group(function () {
    Route::get('/', [AppBanner::class, 'index'])->name('app.banner.index');
    Route::get('/{banner}', [AppBanner::class, 'show'])->name('app.banner.show');
});

Route::prefix('product')->group(function () {
    Route::get('/', [AppProduct::class, 'index'])->name('app.product.index');
    Route::get('/{product}', [AppProduct::class, 'show'])->name('app.product.show');
});

/*
|--------------------------------------------------------------------------
| ADMIN Routes
|--------------------------------------------------------------------------
 */
Route::prefix('admin')->group(function () {
    Route::get('/dashboard', [AdminDashboard::class, 'index'])->name('dashboard');
    Route::get('/profile', [AdminUser::class, 'profile'])->name('admin.profile');
    Route::put('/profile', [AdminUser::class, 'update'])->name('admin.update');
    Route::post('/password/update', [AdminUser::class, 'updatePassword'])->name('admin.password.update');

    /*
    |--------------------------------------------------------------------------
    | FEATURED
    |--------------------------------------------------------------------------
     */
    // banner
    Route::get('banner/datatable', [BannerController::class, 'datatable'])->name('banner.datatables');
    Route::resource('banner', BannerController::class);

    // hot-deals
    Route::get('hot-deals/datatable', [HotDealsController::class, 'datatable'])->name('hot-deals.datatables');
    Route::resource('hot-deals', HotDealsController::class);

    /*
    |--------------------------------------------------------------------------
    | MASTER DATA
    |--------------------------------------------------------------------------
     */
    // category
    Route::get('category/datatable', [CategoryController::class, 'datatable'])->name('category.datatables');
    Route::resource('category', CategoryController::class);

    // product
    Route::get('product/datatable', [ProductController::class, 'datatable'])->name('product.datatables');
    Route::resource('product', ProductController::class);

    /*
    |--------------------------------------------------------------------------
    | SYSTEM
    |--------------------------------------------------------------------------
     */
    // general setting
    Route::get('general-setting/datatable', [GeneralSettingController::class, 'datatable'])->name('general-setting.datatables');
    Route::resource('general-setting', GeneralSettingController::class);
});

/*
|--------------------------------------------------------------------------
| SPATIE Routes
|--------------------------------------------------------------------------
 */
Route::get('health', HealthCheckResultsController::class)->middleware('auth');
Route::get('health?fresh', HealthCheckResultsController::class)->middleware('auth')->name('health-check');
