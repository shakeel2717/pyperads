<?php

use App\Http\Controllers\BlockChainController;
use App\Http\Controllers\LandingController;
use App\Http\Controllers\PlanController;
use App\Http\Controllers\TidController;
use App\Http\Controllers\user\UserDashboardController;
use App\Http\Controllers\user\WalletController;
use App\Http\Controllers\user\WithdrawController;
use Illuminate\Support\Facades\Route;


Route::name('landing.')->group(function () {
    Route::get('/', [LandingController::class, 'index'])->name('index');
    Route::get('/pricing', [LandingController::class, 'pricing'])->name('pricing');
});

Route::redirect('/user/dashboard', '/user/dashboard/index');

Route::prefix('user/dashboard')->name('user.')->middleware(['auth', 'user'])->group(function () {
    Route::get('/index', [UserDashboardController::class, 'index'])->name('dashboard');
    Route::resource('plan', PlanController::class);
    Route::resource('tid', TidController::class);
    Route::resource('wallet', WalletController::class);
    Route::resource('withdraw', WithdrawController::class);
    Route::get('/history', [UserDashboardController::class, 'history'])->name('history');
    Route::get('/refer/history', [UserDashboardController::class, 'referHistory'])->name('referHistory');
    Route::get('/blockchain', [BlockChainController::class, 'index'])->name('blockchain');
});


require __DIR__ . '/auth.php';
require __DIR__ . '/admin.php';
require __DIR__ . '/socialite.php';
