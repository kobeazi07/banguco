<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;

Route::get('/', [HomeController::class, 'home'])->name('HalamanHome');
Route::get('/tentang', [HomeController::class, 'about'])->name('HalamanAbout');
Route::get('/layanan', [HomeController::class, 'layanan'])->name('HalamanLayanan');

Route::get('/admin', [AdminController::class, 'halamanlogin'])->name('HalamanLogin');
Route::post('/login', [AdminController::class, 'login'])->name('login');
Route::post('/logout', [AdminController::class, 'user_logout'])->name('Logout');

Route::middleware(['auth', 'role:Admin'])->group(function () {
    Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('HalamanDashboard');
    Route::post('/edit_setting/{id}', [AdminController::class, 'edit_setting'])->name('Edit_setting');

    Route::get('/about', [AdminController::class, 'about'])->name('HalamanAdminAbout');
    Route::post('/tambah_about', [AdminController::class, 'tambah_about'])->name('Tambah_About');
    Route::post('/edit_about/{id}', [AdminController::class, 'edit_about'])->name('Edit_About');
    // Route::delete('/about/{about}', [AdminController::class, 'destroy'])->name('About.destroy');

    Route::get('admin_faq', [AdminController::class, 'admin_faq'])->name('HalamanAdminFaq');
    Route::post('/tambah_faq', [AdminController::class, 'tambah_faq'])->name('Tambah_Faq');
    Route::post('/edit_faq/{id}', [AdminController::class, 'edit_faq'])->name('Edit_Faq');
    Route::delete('/faq/{faq}', [AdminController::class, 'faq_destroy'])->name('faq.destroy');
});
