<?php

use App\Http\Controllers\ContactController;
use App\Http\Controllers\CountriesController;
use App\Http\Controllers\MotherController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RescueBabyController;
use App\Http\Controllers\WelcomeController;
use App\Http\Controllers\DonationController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ChildController;
use App\Http\Controllers\PaymentController;
use App\Models\Sponsor;
use App\Models\SponsorChild;

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



Route::get('/', [WelcomeController::class, 'index']);

Route::get('/home', function () {
    return redirect('/');
})->name('home');

Route::resource('babies', RescueBabyController::class);
Route::resource('child', ChildController::class);
Route::resource('donate', DonationController::class);

Route::get("/donate", [DonationController::class, "index"])->name("donate");

Route::get("finishPayment", [PaymentController::class, "finishPayment"])->name("finishPayment");
Route::get("cancelPayment", [PaymentController::class, "cancelPayment"])->name("cancelPayment");

//child
// Route::get('children', [ChildController::class, 'ajaxChildren'])->name('fetchChildren');

//Route::get('children', [ChildController::class, 'index']);
//Route::get('/children/ajax', 'ChildController@ajaxChildren');

Route::resource('countries', CountriesController::class);

Route::post("sponsorMore",[ChildController::class, "sponsorMore"])->name("sponsorMore");


Route::get('/countries', [CountriesController::class, 'fetchAndStore'])->name('countries.fetchAndStore');
//mother routes
Route::resource('mother', MotherController::class);

Route::get('/contact', [ContactController::class, 'index'])->name('contact');

Route::get('/dashboard', function () {
    //  dd("am here");
    //  SponsorChild
    $email  = auth()->user()->email;
    $sponsor_id = Sponsor::where('email', $email)->first()->id;
    
    $children = SponsorChild::where('sponsor_id', $sponsor_id)->with('child')->get();

    return view('dashboard', compact('children'));
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
