<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/save-data-json', [\App\Http\Controllers\PtkformtransactionsController::class, 'saveDataJson']);

Route::get('/vacancies', [\App\Http\Controllers\VacancyApiController::class, 'listVacancies']);
Route::get('/vacancies/{id}/participants', [\App\Http\Controllers\VacancyApiController::class, 'listParticipants']);
Route::post('/participants/{id}/ai-score', [\App\Http\Controllers\VacancyApiController::class, 'updateAiScore']);
Route::post('/participants/{id}/status', [\App\Http\Controllers\VacancyApiController::class, 'updateStatus']);

Route::group(['middleware' => ['is-ipg']], function () {

});
