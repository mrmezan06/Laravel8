<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Backend\AdminProfileController;


Route::get('/', function () {
    return view('welcome');
});

/* Admin Login Route */
Route::group(['prefix' => 'admin', 'middleware' => ['admin:admin']], function(){
    Route::get('/login', [AdminController::class, 'loginForm']);
    Route::post('/login', [AdminController::class, 'store'])->name('admin.login');
});

/* Admin Dashboard Route */
Route::middleware([
    'auth:sanctum,admin',
    'verified'
])->get('/admin/dashboard', function () {
        return view('admin.index');
    })->name('admin.dashboard');

// Admin Route

/* Logout Route */
Route::get('/admin/logout', [AdminController::class, 'destroy'])->name('admin.logout');
/* Profile Route */
Route::get('/admin/profile', [AdminProfileController::class, 'AdminProfile'])->name('admin.profile');
Route::get('/admin/profile/edit', [AdminProfileController::class, 'AdminProfileEdit'])->name('admin.profile.edit');
Route::post('/admin/profile/store', [AdminProfileController::class, 'AdminProfileStore'])->name('admin.profile.store');      
Route::get('/admin/change/password', [AdminProfileController::class, 'AdminChangePassword'])->name('admin.change.password');
Route::post('/update/change/password', [AdminProfileController::class, 'AdminUpdateChangePassword'])->name('update.change.password');      

Route::middleware([
    'auth:sanctum,web',
    'verified'
])->get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
