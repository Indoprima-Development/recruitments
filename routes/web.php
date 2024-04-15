<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginRegisterController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProjectsController;

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

Route::prefix('auth')->group(function () {
    Route::controller(LoginRegisterController::class)->group(function () {
        Route::get('/register', 'register')->name('register');
        Route::post('/store', 'store')->name('store');
        Route::get('/login', 'login')->name('login');
        Route::post('/authenticate', 'authenticate')->name('authenticate');
    });
});

Route::group(['middleware' => ['web', 'auth']], function () {
    Route::get('/dashboard', [LoginRegisterController::class, 'dashboard'])->name('dashboard');
    Route::post('/logout', [LoginRegisterController::class, 'logout'])->name('logout');

    Route::controller(HomeController::class)->group(function () {
        Route::get('/', 'index');
        Route::get('/examination/{project_id}', 'examination');
        Route::get('/qna/{exam_id}', 'qna');
        Route::get('/qna-transaction/{code}', 'qnaTransaction');
        Route::get('/submit-test/{exam_id}', 'submitTest');
        Route::get('/rank-test/{exam_id}', 'rankTest');
        Route::get('/update-time-remaining/{exam_id}', 'updateTimeRemaining');
        Route::get('exam-histories', 'examHistories');
    });

    Route::resource('/projects',ProjectsController::class);
});
