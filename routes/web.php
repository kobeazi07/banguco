<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;

Route::get('/', [HomeController::class, 'home'])->name('HalamanHome');
Route::get('/tentang', [HomeController::class, 'about'])->name('HalamanAbout');
Route::get('/layanan', [HomeController::class, 'layanan'])->name('HalamanLayanan');
Route::get('/blog', [HomeController::class, 'blog'])->name('HalamanBlog');
Route::get('/dblog/{blog:slug}', [HomeController::class, 'dblog'])->name('HalamanDBlog');
Route::get('/admin', [AdminController::class, 'halamanlogin'])->name('HalamanLogin');
Route::post('/login', [AdminController::class, 'login'])->name('login');
Route::post('/logout', [AdminController::class, 'user_logout'])->name('Logout');

Route::middleware(['auth', 'role:Admin'])->group(function () {
    Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('HalamanDashboard');
    Route::post('/edit_setting/{id}', [AdminController::class, 'edit_setting'])->name('Edit_setting');
    Route::get('/profiladmin', [AdminController::class, 'profiladmin'])->name('HalamanPorfiladmin');
    Route::post('/edit_profiladmin/{id}', [AdminController::class, 'edit_profiladmin'])->name('Edit_profiladmin');
    Route::get('/about', [AdminController::class, 'about'])->name('HalamanAdminAbout');
    Route::post('/tambah_about', [AdminController::class, 'tambah_about'])->name('Tambah_About');
    Route::post('/edit_about/{id}', [AdminController::class, 'edit_about'])->name('Edit_About');
    // Route::delete('/about/{about}', [AdminController::class, 'destroy'])->name('About.destroy');

    Route::get('admin_faq', [AdminController::class, 'admin_faq'])->name('HalamanAdminFaq');
    Route::post('/tambah_faq', [AdminController::class, 'tambah_faq'])->name('Tambah_Faq');
    Route::post('/edit_faq/{id}', [AdminController::class, 'edit_faq'])->name('Edit_Faq');
    Route::delete('/faq/{faq}', [AdminController::class, 'faq_destroy'])->name('faq.destroy');

    Route::get('admin_blog', [AdminController::class, 'admin_blog'])->name('HalamanAdminBlog');
    Route::post('/tambah_blog', [AdminController::class, 'tambah_blog'])->name('Tambah_Blog');
    Route::post('/edit_blog/{id}', [AdminController::class, 'edit_blog'])->name('Edit_Blog');
    Route::delete('/blog/{blog}', [AdminController::class, 'blog_destroy'])->name('blog.destroy');
});
