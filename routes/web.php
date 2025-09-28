<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Web\AuthController;
use App\Http\Controllers\Web\VenteController;
use App\Http\Controllers\Web\AvarieController;
use App\Http\Controllers\Web\ResumeController;
use App\Http\Controllers\Web\DepenseController;
use App\Http\Controllers\Web\ProduitController;
use App\Http\Controllers\Web\DashboardController;
use App\Http\Controllers\Web\StockInitialController;
use App\Http\Controllers\Web\ReapprovisionnementController;

// Routes protégées par auth
Route::middleware('auth')->group(function () {
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

    Route::resource('produits', ProduitController::class);
    Route::resource('ventes', VenteController::class);
    Route::resource('reapprovisionnements', ReapprovisionnementController::class);
    Route::resource('avaries', AvarieController::class);
    Route::resource('depenses', DepenseController::class);
    Route::resource('resume', ResumeController::class)->only(['index']);
    Route::resource('stock_initials', StockInitialController::class);

    Route::get('/vente/recap', [VenteController::class, 'recap'])->name('vente.recap');

    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
});
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login.form');
Route::post('/login', [AuthController::class, 'login'])->name('login');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
