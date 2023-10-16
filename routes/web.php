<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\EmployeController;
use App\Http\Controllers\LocationController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\SailController;
use App\Http\Controllers\TicketController;
use App\Models\Member;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/',[DashboardController::class, 'index']);


Route::controller(LocationController::class)->group(function () {
    Route::get('/location', 'index')->middleware('auth');
    Route::post('/location',  'store');
    Route::put('/location', 'update');
    Route::delete('/location/{location}', 'destroy');
});

Route::controller(TicketController::class)->group(function () {
    Route::get('/ticket', 'index')->middleware('auth');
    Route::delete('/ticket/{ticket}', 'destroy');
    Route::get('/ticket/create', 'create');
    Route::put('/ticket', 'update');
    Route::post('/ticket/create', 'store');
});

Route::controller(AuthController::class)->group(function () {
    Route::post('/register', 'register_member');
    Route::post('/login', 'login');
    Route::get('/credential', 'credential');
    Route::get('/logout',  'logout');
    Route::get('/register', 'showRegister')->middleware('guest');
    Route::get('/login',  'showLogin')->name('login')->middleware('guest');
});
Route::get('/boking', [MemberController::class, 'index']);
Route::get('/ticket/boking/{id}', [MemberController::class, 'show'])->middleware('auth');
Route::post('/ticket/boking', [MemberController::class, 'boking'])->middleware('auth');

Route::get('/employe', [EmployeController::class, 'index'])->middleware(['auth', 'employe']);
Route::get('/employe/{user}', [AuthController::class, 'showUser'])->middleware(['auth', 'employe']);
Route::post('/employe', [AuthController::class, 'registerEmploye'])->middleware(['auth', 'employe']);
Route::put('/employe/edit-user', [AuthController::class, 'editUser'])->middleware(['auth', 'employe']);
Route::put('/employe/edit-password', [AuthController::class, 'editPassword'])->middleware(['auth', 'employe']);


Route::get('/member/{user}', [AuthController::class, 'showUser'])->middleware(['auth']);
Route::put('/member/edit-user', [AuthController::class, 'editUser'])->middleware('auth');
Route::put('/member/edit-password', [AuthController::class, 'editPassword'])->middleware('auth');


Route::get('/sail', [SailController::class, 'index']);

Route::get('/sail/accept/{id}', [SailController::class, 'accept']);
Route::get('/sail/reject/{id}', [SailController::class, 'reject']);
Route::get('/sail/ticket', [SailController::class, 'ticket']);