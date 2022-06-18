<?php

use App\Http\Controllers\ApiControllers\AuthApiController;
use App\Http\Controllers\ApiControllers\ProfilcompanyApiController;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
//Public Route
Route::post('v1/register/user', [AuthController::class, 'register']);
Route::post('/v1/login/user', [AuthApiController::class, 'login']);

// Private Route
Route::group(['middleware' => ['auth:sanctum']], function () {
    Route::get('/user', function (Request $request) {
        return $request->user();
    });
    Route::get('/v1/profilcompany', [ProfilcompanyApiController::class, 'index']);
    Route::get('/v1/users', [AuthApiController::class, 'allUser']);
});
