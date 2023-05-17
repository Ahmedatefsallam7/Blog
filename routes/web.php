<?php

use App\Http\Controllers\categoriesController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SettingsController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\Website\IndexController;
use Illuminate\Support\Facades\Gate;
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

Route::get('/', function () {
    return view('auth.login');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


Route::middleware(['auth', 'checkUserStatus'])->group(function () {

    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    // Route::get('/dashboard', [IndexController::class, 'index'])->name('index');


    Route::controller(SettingsController::class)->group(function () {
        Route::get('settings', 'index')->name('settings');
        Route::post('settings/update/{setting}', 'update')->name('settingUpdate');
    });

    Route::controller(UserController::class)->group(function () {
        Route::get('users', 'index')->name('allUsers');
        Route::get('user/create', 'create')->name('createUser');
        Route::post('user/store', 'store')->name('storeUser');
        Route::get('user/{id}/edit', 'edit')->name('editUser');
        Route::put('user/{id}/update', 'update')->name('updateUser');
        Route::delete('user/{id}/delete', 'destroy')->name('deleteUser');
    });

    Route::controller(categoriesController::class)->group(function () {
        Route::get('all/categories', 'index')->name('allCategories');
        Route::get('add/category', 'create')->name('createCategory');
        Route::post('store/category', 'store')->name('storeCategory');
        Route::put('update/category', 'update')->name('updateCateg');
        Route::delete('delete/category', 'destroy')->name('deleteCateg');
    });

    Route::controller(PostController::class)->group(function () {
        Route::get('posts', 'index')->name('posts');
        Route::get('add-post', 'create')->name('addpost');
        Route::post('store/post', 'store')->name('postStore');
        Route::get('edit/post/{id}', 'edit')->name('editPost');
        Route::put('update/post/{id}', 'update')->name('updatePost');
        Route::delete('destroy/post', 'destroy')->name('deletePost');
    });
});

require __DIR__ . '/auth.php';