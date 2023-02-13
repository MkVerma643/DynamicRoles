<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PermissionController;

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
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('roles', [RoleController::class, 'index'])->name('roles.index');
    Route::post('roles', [RoleController::class, 'store'])->name('roles.store');
    Route::get('roles/create', [RoleController::class, 'create'])->name('roles.create');
    Route::get('roles/{item}', [RoleController::class, 'show'])->name('roles.show');
    Route::put('roles/{item}', [RoleController::class, 'update'])->name('roles.update');
    Route::delete('roles/{item}', [RoleController::class, 'destroy'])->name('roles.destroy');
    Route::get('roles/{item}/edit', [RoleController::class, 'edit'])->name('roles.edit');

    Route::get('permissions', [PermissionController::class, 'index'])->name('permissions.index');
    Route::post('permissions', [PermissionController::class, 'store'])->name('permissions.store');
    Route::get('permissions/create', [PermissionController::class, 'create'])->name('permissions.create');
    Route::get('permissions/{item}', [PermissionController::class, 'show'])->name('permissions.show');
    Route::put('permissions/{item}', [PermissionController::class, 'update'])->name('permissions.update');
    Route::delete('permissions/{item}', [PermissionController::class, 'destroy'])->name('permissions.destroy');
    Route::get('permissions/{item}/edit', [PermissionController::class, 'edit'])->name('permissions.edit');

});

require __DIR__.'/auth.php';



Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
