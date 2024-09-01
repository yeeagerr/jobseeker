<?php

use App\Http\Controllers\Auth\CompanyAuthContoller;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\JobController;
use App\Http\Controllers\ProfilesController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get("/profile", [ProfilesController::class, 'index'])->name('profile');
Route::get("/job", [JobController::class, 'index'])->name('job');
Route::get('/testCrud', [ProfilesController::class, 'userCrud']);


Route::prefix('company')->group(function () {
    Route::get('/', [CompanyController::class, 'index'])->name('company');
    Route::get('/login', [CompanyAuthContoller::class, 'show_login'])->name('company.login');
    Route::post('/login', [CompanyAuthContoller::class, 'store'])->name('company.login');
});
// Route::get('/', [CompanyController::class, 'home'])->middleware('auth:company');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware(['auth', 'verified', 'auth:company'])->group(function () {
    Route::get('/profile/edit', [ProfilesController::class, 'show_edit'])->name('profile.edit');
    Route::get('/profileBreeze', [ProfileController::class, 'edit']);
    Route::patch('/profileBreeze', [ProfilesController::class, 'update'])->name('profile.update');
    Route::delete('/profileBreeze', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
