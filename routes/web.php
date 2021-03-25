<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\profileController;
use App\Http\Controllers\BuyProductController;
use App\Http\Controllers\paymentController;
use Laravel\Socialite\Facades\Socialite;
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
Route::middleware(['web'])->group(function () {
	
Route::get('/', [ProductController::class, 'index']);
Route::get('/InsertProduct',function(){
	return view('InsertProduct');
});

Route::post('ProductInsert',[ProductController::class, 'store'])->name('ProductInsert');
Route::get('/MenTopWear/{id}',[ProductController::class, 'show'])->name('MenTopWear');
Route::get('/Account',function(){
	return view("Login/Account");
});
Route::post('SignUpAction',[profileController::class, 'store'])->name('SignUpAction');


Route::get('/verifyPhone',function(){
	return view('Login/verify');
});
Route::post('/VerifyPhone',[profileController::class, 'Verify'])->name('VerifyPhone');
// 
Route::post('/VerifyPhoneLater',[profileController::class, 'VerifyLater'])->name('VerifyPhoneLater');

// Socialite 
// Google

Route::get('Google/auth/redirect', [profileController::class, 'redirectToProvider']);
Route::get('Google/auth/callback',[profileController::class, 'handleProviderCallback']);
Route::get('/GoogleData', function(){
	return view('Login/GoogleSignIn');
});
Route::post('/GoogleDataSubmit',[profileController::class, 'googleDataStore'])->name('GoogleDataSubmit');


// Socialite 
// Facebbok

Route::get('facebook/auth/redirect', function () {
    return Socialite::driver('facebook')
    ->stateless()->redirect();
    
});

Route::get('facebook/auth/callback', function () {
    $user = Socialite::driver('facebook')->stateless()->user();
    echo "<pre>";
    print_r($user);
});

// 
Route::post('/LoginAction',[profileController::class, 'Login'])->name('LoginAction');
Route::get('/LogoutAction',[profileController::class, 'Logout'])->name('LogoutAction');


// Cart

Route::get('MenTopWear/CartAction/{id}',[BuyProductController::class, 'CartAction']);
Route::get('/RemoveCartData/{id}',[BuyProductController::class, 'RemoveCart'])->name('RemoveData');
Route::get('/ViewCart',[BuyProductController::class, 'ViewCart']);
Route::get('/CartVerify',[BuyProductController::class, 'CartVerifyFun']);

//Cart FinalVerification
Route::post('FinalVerification',[BuyProductController::class, 'FinalVeriFun'])->name('FinalVerification');


// Payment

Route::get('/PaymentHome',function(){
	return view('Payment/paymentHome');
});

Route::get('/payment',[paymentController::class, 'paymentSubmit']);

// 

Route::get('/instamozo_redirect',[paymentController::class, 'instamozo_redirect']);
});