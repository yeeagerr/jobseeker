<?php

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\CompanyAuthContoller;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\JobController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get("/job", [JobController::class, 'index'])->name('job');


Route::middleware(["UserCompany", "isVerified", "no-cache"])->group(function () {
    Route::prefix("user")->group(function () {
        Route::get("/profile", [UserController::class, 'profile'])->name('user.profile');
        Route::get('/profile/edit', [UserController::class, 'show_edit'])->name('profile.edit');
        Route::patch('/profile/update', [UserController::class, 'update'])->name('profile.update');
    });
    Route::prefix('company')->group(function () {
        Route::get("/profile", [CompanyController::class, "profile"])->name('company.profile');
        Route::get("/profile/edit", [CompanyController::class, "show_edit"])->name("company.edit");
        Route::put("/profile/edit", [CompanyController::class, "update"])->name("company.update");
    });

    Route::prefix('job')->group(function () {
        Route::get("/create", [JobController::class, "job"])->name('company.job');
        Route::post("/create", [JobController::class, "store"])->name('company.job_store');
    });
});

Route::prefix('company')->group(function () {
    Route::get('/', [CompanyController::class, 'index'])->name('company');
    Route::get('/login', [CompanyAuthContoller::class, 'show_login'])->name('company.login');
    Route::post('/login', [CompanyAuthContoller::class, 'store'])->name('company.login');
});
// Route::get('/', [CompanyController::class, 'home'])->middleware('auth:company');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware(['auth', 'isVerified'])->group(function () {
    Route::get('/profileBreeze', [ProfileController::class, 'edit']);
    Route::delete('/profileBreeze', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::delete('logout/{id}', [UserController::class, 'destroy'])
        ->name('delete.account');
});

require __DIR__ . '/auth.php';
