<?php

use App\Http\Controllers\dashboardController;
use Illuminate\Support\Facades\Route;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;
use App\Http\Controllers\loginController;
use App\Http\Controllers\eventController;
use App\Http\Controllers\organizerController;
use App\Http\Controllers\partnerController;
use App\Http\Controllers\profileController;
use App\Http\Controllers\ribController;

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
    return view('front_end.layouts.app');
});
Route::middleware(['web'])->group(function () {
    Route::get('/login', [loginController::class, 'index'])->name('login');
    Route::post('/check', [loginController::class, 'check'])->name('loginValide');
});
Route::get('/admin',[dashboardController::class, 'index'])->middleware('auth')->name('dashboard');
Route::get('/admin/modulator',[dashboardController::class, 'showAll'])->name('modulator');
Route::post('/admin/addModulator',[dashboardController::class, 'store'])->name('createModulator');
Route::get('/admin/editModulator/{updatedUser_id}',[dashboardController::class, 'edit'])->name('editModulator');
Route::post('/admin/updateModulator/{updatedUser_id}',[dashboardController::class, 'update'])->name('updateModulator');
Route::get('/admin//delete/{deletedUser_id}',[dashboardController::class,'destroy'])->name('deleteUser');
Route::post('/logout', [dashboardController::class,'logout'])->name('logout');

//Event
Route::get('/admin/event',[eventController::class, 'index'])->name('event');
Route::get('/admin/event/addEvent',[eventController::class, 'create'])->name('addEvent');
Route::post('/admin/event/store',[eventController::class, 'store'])->name('storeEvent');
Route::get('/admin/event/edit/{update_id}',[eventController::class, 'edit'])->name('editEvent');
Route::post('/admin/event/update/{update_id}',[eventController::class, 'update'])->name('updateEvent');
Route::get('/admin/event/delete/{delete_id}',[eventController::class, 'destroy'])->name('deleteEvent');




//Rib

Route::get('/admin/event/organizerWithNewRib',[ribController::class, 'create'])->name('createRib');
Route::post('/admin/event/storeRib', [ribController::class, 'store'])->name('storeRib');
Route::get('/admin/event/test',[ribController::class, 'index'])->name('indexRib');

//Organizer
Route::get('/admin/organizer',[organizerController::class, 'index'])->name('organizer');
Route::get('/admin/organizer/create',[organizerController::class, 'create'])->name('addOrganizer');
Route::post('/admin/organizer/store',[organizerController::class, 'store'])->name('storeOrganizer');
Route::get('/admin/organizer/edit/{update_id}',[organizerController::class, 'edit'])->name('editOrganizer');
Route::post('/admin/organizer/Update/{update_id}',[organizerController::class, 'update'])->name('updateOrganizer');
Route::get('/admin/organizer/delete/{delete_id}',[organizerController::class, 'destroy'])->name('deleteOrganizer');

//partner
Route::get('/admin/partner',[partnerController::class, 'index'])->name('partner');
Route::get('/admin/partner/create',[partnerController::class, 'create'])->name('addPartner');
Route::post('/admin/partner/store',[partnerController::class, 'store'])->name('storePartner');
Route::get('/admin/partner/edit/{update_id}',[partnerController::class, 'edit'])->name('editPartner');
Route::post('/admin/partner/Update/{update_id}',[partnerController::class, 'update'])->name('updatePartner');
Route::get('/admin/partner/delete/{delete_id}',[partnerController::class, 'destroy'])->name('deletePartner');

//profile
Route::get('/admin/profil',[profileController::class, 'index'])->middleware('auth')->name('profile');
Route::post('/admin/profile/update/{update_id}',[profileController::class, 'update'])->name('updateProfile');


