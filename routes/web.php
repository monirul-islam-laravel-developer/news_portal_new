<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\SliderController;
use App\Http\Controllers\PrivacyController;
use App\Http\Controllers\SubCategoryController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\ContactUsController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\ReporterController;

use App\Models\RoleRoute;

function getRoleName($routeName)
{
    $routesData = RoleRoute::where('route_name', $routeName)->get();
    $result = [];
    foreach ($routesData as $routeData) {
        array_push($result, $routeData->role_name);
    }
    return $result;
}
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


Route::get('/', [HomeController::class, 'index'])->name('home');


Route::get('/error', function () {
    return view('errors.404');
});


Route::get('/privacy-policy', [PrivacyController::class, 'page_view'])->name('privacy.view');
Route::get('/terms-and-condition', [PrivacyController::class, 'condition_page_view'])->name('condition.view');

Route::prefix('profile')->group(function () {
    Route::get('/', [HomeController::class, 'profileView'])->name('profile.view');
});


Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
        Route::middleware(['roles'])->group(function () {
            Route::group(['prefix' => 'role', 'as' => 'role.'], function(){
                Route::get('/add', [RoleController::class, 'index'])->name('add');
                Route::post('/new', [RoleController::class, 'create'])->name('new');
                Route::get('/manage', [RoleController::class, 'manage'])->name('manage');
                Route::get('/edit/{id}', [RoleController::class, 'edit'])->name('edit');
                Route::post('/update/{id}', [RoleController::class, 'update'])->name('update');
                Route::get('/delete/{id}', [RoleController::class, 'delete'])->name('delete');
            });

            Route::prefix('user')->group(function () {
                Route::get('/add', [UserController::class, 'index'])->name('user.add');
                Route::post('/new', [UserController::class, 'create'])->name('user.new');
                Route::get('/manage', [UserController::class, 'manage'])->name('user.manage');
                Route::get('/edit/{id}', [UserController::class, 'edit'])->name('user.edit');
                Route::post('/update/{id}', [UserController::class, 'update'])->name('user.update');
                Route::get('/delete/{id}', [UserController::class, 'delete'])->name('user.delete');
            });
            Route::prefix('slider')->group(function () {
                Route::get('/add', [SliderController::class, 'index'])->name('slider.add');
                Route::post('/new', [SliderController::class, 'create'])->name('slider.new');
                Route::get('/manage', [SliderController::class, 'manage'])->name('slider.manage');
                Route::get('/edit/{id}', [SliderController::class, 'edit'])->name('slider.edit');
                Route::post('/update/{id}', [SliderController::class, 'update'])->name('slider.update');
                Route::get('/delete/{id}', [SliderController::class, 'delete'])->name('slider.delete');
            });
            Route::prefix('category')->group(function () {
                Route::get('/add', [CategoryController::class, 'index'])->name('category.add');
                Route::post('/new', [CategoryController::class, 'create'])->name('category.new');
                Route::get('/manage', [CategoryController::class, 'manage'])->name('category.manage');
                Route::get('/edit/{id}/{slug}', [CategoryController::class, 'edit'])->name('category.edit');
                Route::post('/update/{id}', [CategoryController::class, 'update'])->name('category.update');
                Route::post('/delete/{id}', [CategoryController::class, 'delete'])->name('category.delete');
            });

            Route::prefix('subCategory')->group(function () {
                Route::get('/add', [SubCategoryController::class, 'index'])->name('subcategory.add');
                Route::post('/new', [SubCategoryController::class, 'create'])->name('subcategory.new');
                Route::get('/manage', [SubCategoryController::class, 'manage'])->name('subcategory.manage');
                Route::get('/edit/{id}/{slug}', [SubCategoryController::class, 'edit'])->name('subcategory.edit');
                Route::post('/update/{id}/{slug}', [SubCategoryController::class, 'update'])->name('subcategory.update');
                Route::post('/delete/{id}', [SubCategoryController::class, 'delete'])->name('subcategory.delete');
            });
            Route::prefix('reporter')->group(function () {
                Route::get('/add', [ReporterController::class, 'index'])->name('reporter.add');
                Route::post('/new', [ReporterController::class, 'create'])->name('reporter.new');
                Route::get('/manage', [ReporterController::class, 'manage'])->name('reporter.manage');
                Route::get('/edit/{id}/{slug}', [ReporterController::class, 'edit'])->name('reporter.edit');
                Route::post('/update/{id}/{slug}', [ReporterController::class, 'update'])->name('reporter.update');
                Route::post('/delete/{id}', [ReporterController::class, 'delete'])->name('reporter.delete');
            });
            Route::prefix('aboutus')->group(function () {
                Route::get('/add', [AboutController::class, 'index'])->name('about.add');
                Route::post('/new', [AboutController::class, 'create'])->name('about.new');
                Route::post('/update/{id}', [AboutController::class, 'update'])->name('about.update');
            });

            Route::prefix('privacy')->group(function () {
                Route::get('/add', [PrivacyController::class, 'index'])->name('privacy.add');
                Route::post('/new', [PrivacyController::class, 'create'])->name('privacy.new');
                Route::get('/manage', [PrivacyController::class, 'manage'])->name('privacy.manage');
                Route::get('/edit/{id}', [PrivacyController::class, 'edit'])->name('privacy.edit');
                Route::post('/update/{id}', [PrivacyController::class, 'update'])->name('privacy.update');
                Route::post('/delete/{id}', [PrivacyController::class, 'delete'])->name('privacy.delete');
            });
            Route::prefix('contact')->group(function () {
                Route::get('/add', [ContactUsController::class, 'index'])->name('cantact.add');
                Route::post('/new', [ContactUsController::class, 'create'])->name('cantact.new');
                Route::get('/manage', [ContactUsController::class, 'manage'])->name('cantact.manage');
                Route::get('/edit/{id}', [ContactUsController::class, 'edit'])->name('cantact.edit');
                Route::post('/update/{id}', [ContactUsController::class, 'update'])->name('cantact.update');
                Route::post('/delete/{id}', [ContactUsController::class, 'delete'])->name('cantact.delete');
            });
            Route::prefix('Blog')->group(function () {
                Route::get('/add', [BlogController::class, 'index'])->name('blog.add');
                Route::post('/new', [BlogController::class, 'create'])->name('blog.new');
                Route::get('/manage', [BlogController::class, 'manage'])->name('blog.manage');
                Route::get('/edit/{id}/{slug}', [BlogController::class, 'edit'])->name('blog.edit');
                Route::post('/update/{id}', [BlogController::class, 'update'])->name('blog.update');
                Route::post('/delete/{id}', [BlogController::class, 'delete'])->name('blog.delete');
            });
        });
    });

