<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ManagementController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Authentication\SigninController;

Route::get('/signin', [SigninController::class, 'showSigninForm'])->name('signin');
Route::post('/signin', [SigninController::class, 'authenticate']);
Route::post('/signout', [SigninController::class, 'signout'])->name('signout');


Route::middleware(['auth', 'role:member'])->group(function () {
    Route::get('/member/profile', [ProfileController::class, 'editProfile'])->name('member.profile.edit');
    Route::post('/member/update', [ProfileController::class, 'updateProfile'])->name('member.profile.update');
});

Route::middleware(['auth', 'role:administrator'])->group(function () {
    Route::get('/administrator/manage/{id}', [ManagementController::class, 'editUser'])->name('administrator.user.edit');
    Route::post('/administrator/update/{id}', [ManagementController::class, 'updateUser'])->name('administrator.user.update');
});
Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
