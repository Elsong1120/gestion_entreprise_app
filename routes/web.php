<?php

use App\Http\Controllers\ChatController;
use App\Http\Controllers\SocialiteController;
use App\Http\Controllers\ProfilcompanyController;

use Illuminate\Support\Facades\Route;

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
    return view('welcome');
});

Auth::routes();

//Socialite route
//The page where we present the redirection links to the providers
Route::get("login-register", [SocialiteController::class, 'loginRegister']);

//redirection link to the provider
Route::get("redirect/{provider}", [SocialiteController::class, 'redirect'])->name('socialite.redirect');

// the callback to the provider
Route::get("callback/{provider}", [SocialiteController::class, 'callback'])->name('socialite.callback');

Route::get('/home', function () {
    return view('home');
})->name('home')->middleware('auth');
Route::get('/profilcompany', [ProfilcompanyController::class, 'index'])->name('allProfilcompany')->middleware('auth');
Route::get('/chat', [ChatController::class, 'index'])->name('chats')->middleware('auth');
