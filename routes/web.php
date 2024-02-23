<?php

use App\Http\Controllers\AnnouncementController;
use App\Http\Controllers\FrontController;
use App\Http\Controllers\RevisorController;
use App\Models\Announcement;
use Illuminate\Support\Facades\Route;

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

//? FrontController
Route::get('/', [FrontController::class, 'welcome'])->name('welcome');
Route::get('/categoria/{category}', [FrontController::class, 'categoryShow'])->name('categoryShow');
Route::get('/lavora-con-noi', [FrontController::class, 'workWithUs'])->name('workWithUs');



//? AnnouncementController
Route::get('/nuovo/annuncio', [AnnouncementController::class, 'createAnnouncement'])->middleware('auth')->name('announcements.create');
Route::get('/dettaglio/annuncio/{announcement}', [AnnouncementController::class, 'showAnnouncement'])->name('announcements.show');
Route::get('/tutti/annunci', [AnnouncementController::class, 'indexAnnouncement'])->name('announcements.index');

//? Home revisore
Route::get('/revisor/home', [RevisorController::class, 'index'])->middleware('isRevisor')->name('revisor.index');

//? Accetta annuncio
Route::patch('/accetta/annuncio/{announcement}', [RevisorController::class, 'acceptAnnouncement'])->middleware('isRevisor')->name('revisor.accept_announcement');

//? Rifiuta annuncio
Route::patch('/rifiuta/annuncio/{announcement}', [RevisorController::class, 'rejectAnnouncement'])->middleware('isRevisor')->name('revisor.reject_announcement');

//? Richiedi di diventare Revisore
Route::get('/lavora-con-noi/diventa-revisore', [RevisorController::class, 'becomeRevisor'])->middleware('auth')->name('become.revisor');

//? Rendi un utente Revisore
Route::get('/rendi/revisore/{user}', [RevisorController::class, 'makeRevisor'])->name('make.revisor');

//* Ricerca annuncio
Route::get('/ricerca/annuncio', [AnnouncementController::class, 'searchAnnouncements'])->name('announcements.search');

//! Cambio lingua 
Route::post('/lingua/{lang}', [FrontController::class, 'setLocale'])->name('setLocale');
