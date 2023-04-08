<?php

use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('admin.dashboard');
})->name('admin.dashboard');

Route::get('/users', [UserController::class, 'index'])
    ->name('admin.users.index');

Route::get('/users/create', [UserController::class, 'create'])
    ->name('admin.users.create');

Route::get('/roles', [RoleController::class, 'index'])
    ->name('admin.roles.index');