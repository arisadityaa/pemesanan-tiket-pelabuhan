<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\EmployeController;
use App\Http\Controllers\LocationController;
use App\Http\Controllers\MemberController;
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
    Route::get('/ticket', 'index');
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
Route::get('/boking/{id}', [MemberController::class, 'boking']);
Route::get('/ticket/boking/', [MemberController::class, 'show']);

Route::get('/employe', [EmployeController::class, 'index'])->middleware('auth');
Route::get('/employe/{user}', [AuthController::class, 'showUser']);
Route::post('/employe', [AuthController::class, 'registerEmploye']);
Route::put('/employe/edit-user', [AuthController::class, 'editUser']);
Route::put('/employe/edit-password', [AuthController::class, 'editPassword']);







Route::get('/member/{user}', [AuthController::class, 'showUser']);
Route::put('/member/edit-user', [AuthController::class, 'editUser']);
Route::put('/member/edit-password', [AuthController::class, 'editPassword']);
