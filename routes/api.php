<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TestController;

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

Route::get('test', function (){
    return response()->json([
        'txt' => 'It Works!'
    ]);
});

Route::group(['middleware' => 'apicheck'], function (){
Route::post('test', [TestController::class, 'posted']);
Route::get('test/{id}', [TestController::class, 'retrieve']);
});