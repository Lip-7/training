<?php

use App\Http\Controllers\ApartmentController;
use App\Http\Controllers\SponsorshipController;
use App\Http\Controllers\VisitController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::resource("apartments", ApartmentController::class)->parameters(["apartments" => "apartment:slug"]);

Route::resource('sponsorships', SponsorshipController::class)->parameters(['sponsorships' => 'sponsorship:slug']);
Route::get('/visits', [VisitController::class, 'index'])->name('visits.index');

// Route::get('/sponsorships/{sponsorship}', SponsorshipController::class, 'SponsorshipController@show')->name('sponsorships.show');
