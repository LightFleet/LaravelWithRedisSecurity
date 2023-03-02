<?php

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::group(['middleware' => ['auth.basic']], function()
{
    Route::get('/sms', [\App\Modules\TestModule\Infrastructure\Sms\Controllers\Api\SmsController::class, 'list']);
    Route::get('/checkAuth', [\App\Modules\Security\Api\Controllers\SecurityController::class, 'checkAuth']);
    Route::post('/user/register', [\App\Modules\Security\Api\Controllers\SecurityController::class, 'register']);
    Route::get('/currentUser', [\App\Modules\Security\Api\Controllers\SecurityController::class, 'userInfo']);
    Route::get('/logout', [\App\Modules\Security\Api\Controllers\SecurityController::class, 'logout']);
});
