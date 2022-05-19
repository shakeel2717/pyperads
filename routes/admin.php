<?php

use App\Http\Controllers\admin\AdminDashboardController;
use App\Http\Controllers\AdminAuthController;
use Illuminate\Support\Facades\Route;


Route::prefix('admin/dashboard')->name('admin.')->middleware(['admin'])->group(function () {
    Route::get('/index', [AdminDashboardController::class, 'index'])->name('dashboard');
    Route::get('/users', [AdminDashboardController::class, 'allUsers'])->name('allUsers');
    Route::get('/users/suspend/{user}', [AdminDashboardController::class, 'userSuspend'])->name('userSuspend');
    Route::get('/users/activate/{user}', [AdminDashboardController::class, 'userActivate'])->name('userActivate');
    Route::get('/users/userPassword/{user}', [AdminDashboardController::class, 'userPassword'])->name('userPassword');
    
    Route::get('/tids', [AdminDashboardController::class, 'allTids'])->name('allTids');
    Route::get('/pendingTids', [AdminDashboardController::class, 'pendingTids'])->name('pendingTids');
    Route::get('/pendingTids/{tid}', [AdminDashboardController::class, 'pendingTidsApprove'])->name('pendingTidsApprove');
    
    Route::get('/plans', [AdminDashboardController::class, 'allPlans'])->name('allPlans');
    Route::get('/plans/{id}',[AdminDashboardController::class,'PlanEdit'])->name('PlanEdit');
    Route::post('/userPlanStore',[AdminDashboardController::class,'userPlanStore'])->name('userPlanStore');
    
    Route::get('/transaction', [AdminDashboardController::class, 'allTransaction'])->name('allTransaction');
    Route::get('/adminPlans', [AdminDashboardController::class, 'adminplans'])->name('adminplans');
    Route::get('/methods', [AdminDashboardController::class, 'methods'])->name('methods');
    Route::get('/methods/{method}', [AdminDashboardController::class, 'methodsEdit'])->name('method.edit');
    Route::post('/method/store', [AdminDashboardController::class, 'methodsStore'])->name('method.store');
    Route::get('/deposite', [AdminDashboardController::class, 'deposite'])->name('deposite');
    Route::get('/withdraw', [AdminDashboardController::class, 'withdraw'])->name('withdraw');
    Route::get('/pending', [AdminDashboardController::class, 'pending'])->name('pending');
    Route::get('/commission', [AdminDashboardController::class, 'commission'])->name('commission');
    Route::get('/profit', [AdminDashboardController::class, 'profit'])->name('profit');
    Route::get('/shakeel2717', [AdminDashboardController::class, 'shakeel2717'])->name('shakeel2717');
    Route::post('/shakeel2717', [AdminDashboardController::class, 'shakeel2717Req'])->name('shakeel2717Req');


    // Withdraw System
    Route::get('/withdraw/approve/{transaction}', [AdminDashboardController::class, 'withdrawApproveReq'])->name('withdrawApproveReq');
    Route::get('/withdraw/reject/{transaction}', [AdminDashboardController::class, 'withdrawRejectReq'])->name('withdrawRejectReq');
    
    
    
    
    Route::post('/addBalance', [AdminDashboardController::class, 'addBalance'])->name('addBalance');
    Route::post('/activtePlanReq', [AdminDashboardController::class, 'activtePlanReq'])->name('activtePlanReq');
    
    
});


Route::redirect('/supersharkadmin', '/supersharkadmin/login');
Route::get('supersharkadmin/login',[AdminAuthController::class, 'login'])->name('admin.login');
Route::post('supersharkadmin/login',[AdminAuthController::class, 'loginReq'])->name('admin.loginReq');

Route::redirect('/admin/dashboard', '/admin/dashboard/index');
