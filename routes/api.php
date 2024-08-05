<?php

use App\Http\Controllers\PotensiPermasalahanController;
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

Route::get('/getAllDataPotensiPermasalahanDesa', [PotensiPermasalahanController::class, 'getAllData']);

Route::get('/getDataPotensiPermasalahanDesa/{id}', [PotensiPermasalahanController::class, 'getData']);

Route::post('/editStatusPermasalahanSudah/{id}', [PotensiPermasalahanController::class, 'editStatusSudah']);

Route::post('/editStatusPermasalahanBelum/{id}', [PotensiPermasalahanController::class, 'editStatusBelum']);
