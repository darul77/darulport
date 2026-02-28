<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\ExperienceController;
use App\Http\Controllers\PublicController;
use App\Http\Controllers\TestimonialController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\DashboardController;

/*
|--------------------------------------------------------------------------
| PUBLIC ROUTES (HALAMAN UTAMA PORTFOLIO)
|--------------------------------------------------------------------------
*/
Route::get('/', [PublicController::class, 'index'])->name('home');

/*
|--------------------------------------------------------------------------
| DASHBOARD (MEMBUTUHKAN LOGIN & VERIFIKASI EMAIL)
|--------------------------------------------------------------------------
*/
Route::get('/dashboard', [DashboardController::class, 'index'])
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

/*
|--------------------------------------------------------------------------
| ROUTES YANG MEMBUTUHKAN AUTHENTIKASI
|--------------------------------------------------------------------------
*/
Route::middleware('auth')->group(function () {

    /*
    |----------------------------------------------------------------------
    | PROFILE ROUTES
    |----------------------------------------------------------------------
    | - GET    /profile       -> edit form
    | - PATCH  /profile       -> update profile
    | - DELETE /profile       -> hapus akun
    */
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    /*
    |----------------------------------------------------------------------
    | RESOURCE ROUTES UNTUK PROJECTS, EXPERIENCES, TESTIMONIALS
    |----------------------------------------------------------------------
    | - otomatis membuat:
    |   index, create, store, show, edit, update, destroy
    */
    Route::resource('projects', ProjectController::class);
    Route::resource('experiences', ExperienceController::class);
    Route::resource('testimonials', TestimonialController::class);

    /*
    |----------------------------------------------------------------------
    | SETTINGS ROUTES (jika ada)
    |----------------------------------------------------------------------
    */
    Route::get('/settings', [SettingController::class, 'edit'])->name('settings.edit');
    Route::put('/settings', [SettingController::class, 'update'])->name('settings.update');
});

/*
|--------------------------------------------------------------------------
| AUTH ROUTES (LOGIN, REGISTER, PASSWORD RESET, EMAIL VERIFICATION)
|--------------------------------------------------------------------------
*/
require __DIR__.'/auth.php';