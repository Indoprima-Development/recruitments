<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginRegisterController;
use App\Http\Controllers\DatadetailsController;
use App\Http\Controllers\ExamsController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProjectsController;
use App\Http\Controllers\QnasController;
use App\Http\Controllers\FormsController;
use App\Http\Controllers\DatadirisController;
use App\Http\Controllers\DatapendidikanformalsController;
use App\Http\Controllers\DatapendidikannonformalsController;
use App\Http\Controllers\DatakeluargasController;
use App\Http\Controllers\DatakemampuansController;
use App\Http\Controllers\DatakesehatansController;
use App\Http\Controllers\DataolahragasController;
use App\Http\Controllers\DatapengalamankerjasController;
use App\Http\Controllers\DataorganisasisController;
use App\Http\Controllers\DatapeminatansController;
use App\Http\Controllers\DivisionsController;
use App\Http\Controllers\DepartmentsController;
use App\Http\Controllers\SectionsController;
use App\Http\Controllers\JobtitlesController;
use App\Http\Controllers\EducationController;
use App\Http\Controllers\MajorsController;
use App\Http\Controllers\LocationsController;
use App\Http\Controllers\FieldsController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\PtkformsController;
use App\Http\Controllers\PtkfieldsController;
use App\Http\Controllers\PtkformtransactionsController;

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
use Illuminate\Support\Facades\Mail;
use App\Mail\SendEmail;

Route::get('/send-email', function () {
    $data = [
        'name' => 'Syahrizal As',
        'body' => 'Testing Kirim Email di Santri Koding'
    ];

    Mail::to('findryankpradana@gmail.com')->send(new SendEmail($data));
});

Route::prefix('auth')->group(function () {
    Route::controller(LoginRegisterController::class)->group(function () {
        Route::get('/register', 'register')->name('register');
        Route::post('/store', 'store')->name('store');
        Route::get('/login', 'login')->name('login');
        Route::post('/authenticate', 'authenticate')->name('authenticate');
    });
});
Route::get('/emails/konfirmation', [MainController::class, 'konfirmation']);

Route::get('/',                 [MainController::class, 'index']);
Route::get('/vacancies',        [MainController::class, 'vacancy']);
Route::get('/vacancies/{id}',   [MainController::class, 'showVacancy']);

//FIX

Route::middleware(['web', 'auth', 'isadmin'])->group(function () {
    //HOME
    Route::controller(HomeController::class)->group(function () {
        Route::get('/home', 'home');
        Route::get('/rank-test-by-project/{project_id}', 'rankTestByProjectId');
        Route::get('/rank-test/{exam_id}', 'rankTest');
    });

    Route::resource('/divisions', DivisionsController::class);
    Route::resource('/departments', DepartmentsController::class);
    Route::resource('/sections', SectionsController::class);
    Route::resource('/jobtitles', JobtitlesController::class);
    Route::resource('/education', EducationController::class);
    Route::resource('/majors', MajorsController::class);
    Route::resource('/locations', LocationsController::class);
    Route::resource('/fields', FieldsController::class);

    // PTKFORMS
    Route::resource('/ptkforms', PtkformsController::class);
    Route::controller(PtkformsController::class)->group(function () {
        Route::post('/ptkforms/change-status/{id}', 'changeStatus');
        Route::get('/ptkforms/destroy/{id}', 'destroy');
    });

    Route::resource('/ptkfields', PtkfieldsController::class);

    //PROJECT
    Route::resource('/projects', ProjectsController::class);
    Route::controller(ProjectsController::class)->group(function () {
        Route::get('/projects/{id}/exams', 'examsByProjectId');
    });

    //EXAM
    Route::resource('/exams', ExamsController::class);
    Route::controller(ExamsController::class)->group(function () {
        Route::get('/exams/{id}/qnas', 'qnasByExamId');
    });

    //QNA
    Route::resource('/qnas', QnasController::class);
    Route::controller(QnasController::class)->group(function () {
        Route::post('/qnas-upload-image', 'qnaUploadImage');
    });

    Route::resource('/ptkformtransactions', PtkformtransactionsController::class);
    Route::controller(PtkformtransactionsController::class)->group(function () {
        Route::get('/ptkformtransactions/{status}/data', 'dataByStatus');
        Route::post('/ptkformtransactions/change-status', 'changeStatus');
    });
});

Route::group(['middleware' => ['auth']], function () {
    Route::post('/logout', [LoginRegisterController::class, 'logout'])->name('logout');

    Route::controller(HomeController::class)->group(function () {
        Route::get('/dashboard', 'index')->name('dashboard');
        Route::get('/examination/{project_id}', 'examination');
        Route::get('/qna/{exam_id}', 'qna');
        Route::get('/qna-transaction/{code}', 'qnaTransaction');
        Route::get('/submit-test/{exam_id}', 'submitTest');
        Route::get('/rank-test-by-project/{project_id}', 'rankTestByProjectId');
        Route::get('/rank-test/{exam_id}', 'rankTest');
        Route::get('/update-time-remaining/{exam_id}', 'updateTimeRemaining');
        Route::get('exam-histories', 'examHistories');
        Route::get('off-vacancy/{id}', 'offVacancy');
        Route::get('exam-users', 'examUsers');
    });

    // Formulir
    Route::resource('/forms', FormsController::class);
    Route::controller(FormsController::class)->group(function () {
        Route::get('/forms/show/{id}', 'show');
    });

    Route::get('/datadiris/data-all-users', [DatadirisController::class, 'dataAllUsers']);
    Route::post('/datadiris/store/{id}', [DatadirisController::class, 'store']);
    Route::post('/datadiris/pernyataan/{id}', [DatadirisController::class, 'pernyataan']);
    Route::post('/datadiris/photo', [DatadirisController::class, 'photo']);
    Route::post('/datadiris/cv', [DatadirisController::class, 'cv']);
    Route::get('/datadiris/data-users/{id}', [DatadirisController::class, 'dataUserById']);

    Route::resource('datapendidikanformals', DatapendidikanformalsController::class);
    Route::resource('datapendidikannonformals', DatapendidikannonformalsController::class);
    Route::resource('datakeluargas', DatakeluargasController::class);
    Route::resource('datapengalamankerjas', DatapengalamankerjasController::class);
    Route::resource('datakemampuans', DatakemampuansController::class);
    Route::resource('dataorganisasis', DataorganisasisController::class);
    Route::resource('dataolahragas', DataolahragasController::class);
    Route::resource('datadetails', DatadetailsController::class);
    Route::resource('datakesehatans', DatakesehatansController::class);
    Route::resource('datapeminatans', DatapeminatansController::class);
});
