<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\CampaignController;
use App\Http\Controllers\DonasiController;
use App\Http\Controllers\PenggalangCampaignController;
use App\Http\Controllers\AdminDashboardController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\HomeController;

//Route regis
Route::get('/register', [RegisterController::class, 'show'])->name('register');
Route::post('/register', [RegisterController::class, 'register'])->name('register.submit');

//Route Login 
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login'])->name('login.submit');

Route::get('/penggalang/home', fn () => view('penggalang.homePenggalang'))->name('penggalang.home');
Route::get('/donatur/home', [HomeController::class, 'home'])->name('donatur.home');


Route::get('/campaign/{id}', [CampaignController::class, 'show'])->name('campaign.show');
Route::get('/', [HomeController::class, 'index'])->name('home');


Route::post('/donasi/{id}', [DonasiController::class, 'store'])->name('donasi.store')->middleware('auth');


Route::middleware(['auth', 'role:penggalang'])->group(function () {
    Route::get('/campaign/create', [CampaignController::class, 'create'])->name('campaign.create');
    Route::post('/campaign', [CampaignController::class, 'store'])->name('campaign.store');
});


Route::middleware('auth')->prefix('penggalang')->name('penggalang.')->group(function () {
    Route::get('/campaign', [PenggalangCampaignController::class, 'index'])->name('campaign.index');
    Route::get('/campaign/create', [PenggalangCampaignController::class, 'create'])->name('campaign.create');
    Route::post('/campaign', [PenggalangCampaignController::class, 'store'])->name('campaign.store');
    Route::get('/campaign/{id}/edit', [PenggalangCampaignController::class, 'edit'])->name('campaign.edit');
    Route::put('/campaign/{id}', [PenggalangCampaignController::class, 'update'])->name('campaign.update');
    Route::delete('/campaign/{id}', [PenggalangCampaignController::class, 'destroy'])->name('campaign.destroy');
});


Route::middleware(['auth'])->group(function () {
    Route::get('/admin/dashboard', [AdminDashboardController::class, 'index'])->name('admin.dashboard');
    Route::post('/admin/campaign/{id}/setujui', [AdminDashboardController::class, 'setujui'])->name('admin.campaign.setujui');
    Route::post('/admin/campaign/{id}/tolak', [AdminDashboardController::class, 'tolak'])->name('admin.campaign.tolak');
    Route::delete('/admin/campaign/{id}', [AdminDashboardController::class, 'hapus'])->name('admin.campaign.hapus');
});

Route::get('/admin/home', [AdminDashboardController::class, 'index'])->name('admin.home');

Route::get('/admin/campaigns', [AdminController::class, 'reviewCampaigns'])->name('admin.campaigns');
Route::post('/admin/campaigns/{id}/approve', [AdminController::class, 'approveCampaign'])->name('admin.campaigns.approve');
Route::post('/admin/campaigns/{id}/reject', [AdminController::class, 'rejectCampaign'])->name('admin.campaigns.reject');
Route::get('/admin/campaigns/review', [AdminController::class, 'reviewCampaigns'])->name('admin.campaigns.review');
Route::post('/admin/campaigns/{id}/update-status', [AdminController::class, 'updateCampaignStatus'])->name('admin.campaigns.updateStatus');

Route::post('/logout', function () {
    Auth::logout();
    return redirect('/login')->with('success', 'Berhasil logout.');
})->name('logout');

Route::get('/admin/users', [AdminController::class, 'manageUsers'])->name('admin.users');

Route::get('/admin/dashboard', [AdminDashboardController::class, 'index'])->name('admin.dashboard');

Route::get('/contact', function(){
    return view('pages.contact');
})->name('contact');

Route::get('/donary', function(){
    return view('layout.master');
})->name('master');

Route::get('/daftar-campaign',[CampaignController::class, 'index'])->name('campaigns');

Route::get('/charts', function(){
    return view('admin.charts');
})->name('charts');

Route::get('/forms', function(){
    return view('admin.forms');
})->name('forms');

Route::get('/penggalang', function(){
    return view('penggalang.homePenggalang');
})->name('homePenggalang');

Route::get('/contact-penggalang', function(){
    return view('penggalang.contactPenggalang');
})->name('contactPenggalang');

Route::get('/forgot-password', function(){
    return view('forgotPassword');
})->name('forgot');
