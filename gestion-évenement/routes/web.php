<?php

use App\Http\Controllers\dashboardController;
use Illuminate\Support\Facades\Route;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;
use App\Http\Controllers\loginController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::middleware(['web'])->group(function () {
    Route::get('/admin', [loginController::class, 'index']);
    Route::post('/check', [loginController::class, 'check'])->name('loginValide');
});
Route::get('/admin/dashboard',[dashboardController::class, 'index'])->name('dashboard');
Route::get('/admin/modulator',[dashboardController::class, 'showAll'])->name('modulator');
Route::post('/admin/addModulator',[dashboardController::class, 'store'])->name('createModulator');
