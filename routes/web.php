<?php

use App\Http\Controllers\AdminPageController;
use App\Http\Controllers\HomepageController;

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegistrationController;
use GuzzleHttp\Middleware;

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

Route::get('/', function () {
    return view('Landing');
});

Route::get('/booking', function () {
    return view('Booking');
});

Route::get('/about', function () {
    return view('About');
});

Route::get('/signin', function () {
    return view('signin');
});
Route::get('/signup', function () {
    return view('signup');
});

Route::get('/signupnel', function () {
    return view('signupnel');
});

Route::get('/homepage', function () {
    return view('homepage');
});

// ADMIN PAGE
Route::get('/adminpage', function () {
    return view('adminpage');
})->name('adminpage');

Route::get('/profile', function () {
    return view('profile');
});
// Admin Group Controller
Route::controller([AdminPageController::class])->group(function () {
    Route::get('/adminpage', [AdminPageController::class, 'index'])->middleware('auth', 'authuser:admin')->name('adminpage');
    Route::post('/logout', [AdminPageController::class, 'logout']);
});
// Homepage role as traveler Controller
Route::controller([HomepageController::class])->group(function () {
    Route::get('/homepage', [HomepageController::class, 'index'])->middleware('auth', 'authuser:traveler')->name('tvlhomepage');
    Route::post('/logout', [HomepageController::class, 'logout']);
});

// middleware untuk membatasi page dan mencegah page dibuka melalu url langsung dan mengharuskan adanya login

// Group Controller : route yang sama ada dalam 1 controller bisa dijadikan grup
Route::controller(LoginController::class)->group(function () {
    Route::get('/login', 'index')->name('login');
    Route::post('/login', 'grab_data');
});

Route::controller(RegistrationController::class)->group(function () {
    Route::get('/register', 'index_signup');
    Route::post('/register', 'store_data');
    Route::get('/register', 'index_nel');
});
