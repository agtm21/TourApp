<?php

use App\Http\Controllers\AdminPageController;
use App\Http\Controllers\HomepageController;
use App\Http\Controllers\HomepagenelController as ControllersHomepagenelController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ManagePackageController;
use App\Http\Controllers\Nelayan\HomepagenelController;
use App\Http\Controllers\PaymentTopups;
use App\Http\Controllers\RegistrationController;
use App\Http\Controllers\UserProfileController;
use Faker\Guesser\Name;
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

// Route::prefix('{locale}')->where(['locale' => '[a-zA-Z]{2}'])->middleware('setlocale')->group(function () {

// });

Route::get('/', function () {
    if ($locale = session('locale')) {
        app()->setLocale($locale);
    }
    return view('Landing');
    // return redirect(app()->getLocale());
});

// Route::get('/booking', function () {
//     return view('Booking');
// });

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

// Route::get('/homepage', function () {
//     return view('homepage');
// });

// Route::get('/homepagenel', function () {
//     return view('homepagenel');
// });

// ADMIN PAGE
Route::get('/adminpage', function () {
    return view('Adminlayouts.adminpage');
})->name('adminpage');

Route::controller([UserProfileController::class])->group(function () {
    Route::get('/profile/admin/{uuid}', [UserProfileController::class, 'admin'])->middleware('role:admin');
    Route::get('/profile/traveler/{uuid}', [UserProfileController::class, 'traveler'])->middleware('role:traveler');
    Route::get('/profile/nelayan', [UserProfileController::class, 'nelayan'])->middleware('role:nelayan');
    Route::post('/update/{id}', [UserProfileController::class, 'update']);
});

Route::controller([ManagePackageController::class])->middleware('role:admin')->group(function () {
    Route::resource('manage', ManagePackageController::class);
    Route::get('managepackage', [ManagePackageController::class, 'index']);
    Route::get('create', [ManagePackageController::class, 'create']);
    Route::get('edit/{id}', [ManagePackageController::class, 'edit']);
});
// Admin Group Controller
Route::controller([AdminPageController::class])->middleware('role:admin')->group(function () {
    Route::resource('/Admin', AdminPageController::class)->middleware('role:admin');
    Route::get('/adminpage', [AdminPageController::class, 'index'])->middleware('role:admin')->name('adminpage');
    Route::get('/datauser', [AdminPageController::class, 'datauser'])->middleware('role:admin');
    Route::delete('Adminlayouts/datauser/{id}', [AdminPageController::class, 'destroy']);
    Route::get('managebooking', [AdminPageController::class, 'managebooking']);
    Route::get('nelayanbook/{id}', [AdminPageController::class, 'nelayanbook']);
    // Route::get('/managepackage', [AdminPageController::class, 'managepackage']);
    //Route::post('/edit', [AdminPageController::class, 'edit, $data->id'])->middleware('auth', 'authuser:admin');
    Route::post('/confirm/nelayan', [AdminPageController::class, 'konfirmasi_order'])->middleware('role:admin');
    Route::get('/create', [AdminPageController::class, 'create'])->middleware('role:admin');
    Route::post('/logout', [AdminPageController::class, 'logout']);
});


Route::get('landing/langs/{locale}', [HomepageController::class, 'langs']);
// Homepage role as traveler Controller
Route::controller([HomepageController::class])->middleware('role:traveler')->group(function () {
    Route::get('/homepage', [HomepageController::class, 'index']);
    Route::post('/logout', [HomepageController::class, 'logout']);
    // Route::post('/process', [HomepageController::class], 'processPayment');
    Route::get('/penyewaan', [HomepageController::class, 'penyewaan']);
    Route::get('/prosespenyewaan/{id}', [HomepageController::class, 'orderpaket']);
    Route::get('/langs/{locale}', [HomepageController::class, 'langs']);

    // Route::get('/topup', [HomepageController::class, 'topup']);
    Route::get('/history', [HomepageController::class, 'history']);
    Route::post('/confirm', [HomepageController::class, 'konfirmasipaket']);
    Route::get('/search', [HomepageController::class, 'index']);
    Route::get('/about', [HomepageController::class, 'about']);
    Route::post('/kritiksaran', [HomepageController::class, 'kritik']);
    Route::get('/notificationorder', [HomepageController::class, 'notificationorder']);
});

Route::controller([ControllersHomepagenelController::class])->middleware('role:nelayan')->group(function () {
    Route::get('/nelayan/homepage', [ControllersHomepagenelController::class, 'index']);
    Route::get('/nelayan/order', [ControllersHomepagenelController::class, 'Order']);
    Route::post('/nelayan/confirmorder', [ControllersHomepagenelController::class, 'ConfirmOrder']);
    Route::get('/logout', [ControllersHomepagenelController::class, 'logout']);
    Route::get('/notifications/{notification}/read', [ControllersHomepagenelController::class, 'markAsRead']);
});
// middleware untuk membatasi page dan mencegah page dibuka melalu url langsung dan mengharuskan adanya login

// Group Controller : route yang sama ada dalam 1 controller bisa dijadikan grup
Route::controller(LoginController::class)->group(function () {
    Route::get('/login', 'index')->name('login');
    Route::post('/login', 'grab_data');
    Route::get('/login/langs/{locale}', 'langs');
});

Route::controller(RegistrationController::class)->group(function () {
    Route::get('/register', 'index_signup');
    Route::post('/register', 'store_data');
    Route::get('/register', 'index_nel');
    Route::get('/register/langs/{locale}');
});

Route::controller(PaymentTopups::class)->group(function () {
    Route::get('/topup', 'Topups');
    Route::post('/prosesTopup', 'prosesTopup');
});
