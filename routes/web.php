<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LockScreenController;
use App\Http\Controllers\EventBookingController;
use App\Http\Controllers\EventController;
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
Route::get('/events/{event}/book', [EventBookingController::class, 'showBookingForm'])->name('events.book');
Route::post('/events/{event}/book', [EventBookingController::class, 'processBooking'])->name('events.book.process');
Route::get('/events', [EventController::class, 'showEvents'])->name('events.index');
Route::get('/', function () {
    return view('welcome');
});


Route::get('home', [HomeController::class, 'index'])->name('home');
Route::get('about', [HomeController::class, 'about'])->name('about');


// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// require __DIR__.'/auth.php';
