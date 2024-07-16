<?php
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\InstallmentController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\EventOrganizerController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\EventBookingController;
use App\Http\Controllers\PricingController;
use App\Models\Event;
use App\Http\Controllers\MpesaController;
use App\Http\Controllers\PurchaseController;

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
})->name('welcome');
Route::post('/pay', [MpesaController::class, 'stk'])->name('pay');
Route::post('/process-installment-payment', [PaymentController::class, 'processInstallmentPayment'])->name('process.installment.payment');

Route::get('home', [HomeController::class, 'index'])->name('home');
Route::get('about', [HomeController::class, 'about'])->name('about');
Route::post('/pricing', function () {
    return view('pricing');
})->name('pricing');
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');
Route::get('/lockscreen', function () {
    return view('lockscreen');
})->name('lockscreen');

Route::get('/booking/success', function () {
    return view('booking-success');
})->name('booking.success');

Route::middleware(['auth'])->group(function () {
    Route::get('/my-purchases', [App\Http\Controllers\PurchaseController::class, 'index'])->name('my.purchases');
});
Route::post('/wishlist/add/{eventId}', [App\Http\Controllers\WishlistController::class, 'add'])->name('wishlist.add');
Route::post('/wishlist/remove/{eventId}', [App\Http\Controllers\WishlistController::class, 'remove'])->name('wishlist.remove');

Route::get('/events/search', [EventController::class, 'search'])->name('events.search');

Route::get('/installment/details/{eventId}/{installmentPlan}', [InstallmentController::class, 'showInstallmentDetails'])->name('installment.details');
Route::get('/payment', [PaymentController::class, 'showPaymentForm'])->name('payment');
Route::post('/process-payment', [PaymentController::class, 'processPayment'])->name('process-payment');
Route::post('/payment', [PaymentController::class, 'showPaymentForm'])->name('payment');

// Auth Routes
Route::get('register', [RegisteredUserController::class, 'create'])->name('register');
Route::post('register', [RegisteredUserController::class, 'store']);
Route::get('login', [AuthenticatedSessionController::class, 'create'])->name('login');
Route::post('login', [AuthenticatedSessionController::class, 'store'])->name('login');
Route::post('logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');

// Profile Routes
Route::middleware(['auth'])->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Event Organizer Routes
Route::middleware(['auth:event_organizer'])->group(function () {
    Route::get('event-organizer/dashboard', [EventOrganizerController::class, 'dashboard'])->name('event-organizer.dashboard');
    Route::resource('events', EventController::class);
});

// Event Booking Routes
Route::get('events/{event}/book', [EventBookingController::class, 'showBookingForm'])->name('events.book');
Route::post('events/{event}/book', [EventBookingController::class, 'processBooking'])->name('events.book.process');
Route::get('events/{event}/book/success', function (Event $event) {
    return view('booking-success', compact('event'));
})->name('events.book.success');

// Route to handle showing the login form for event organizers
Route::get('event-organizer/login', [AuthenticatedSessionController::class, 'create'])->name('event-organizer.login');
Route::post('event-organizer/login', [AuthenticatedSessionController::class, 'store']);
Route::post('event-organizer/logout', [AuthenticatedSessionController::class, 'destroy'])->name('event-organizer.logout');



Route::get('/pricing', [PricingController::class, 'showPricing'])->name('pricing');

// Require additional auth routes
// require __DIR__.'/auth.php';
