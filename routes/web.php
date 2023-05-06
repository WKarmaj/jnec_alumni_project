<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;

use App\Http\Controllers\AdminController;

use App\Http\Controllers\SearchController;

use App\Http\Controllers\ViewAlumniController;

use App\Http\Livewire\FeedbackForm;

use App\Http\Controllers\FeedbackController;

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



Route::get('/',[HomeController::class,'index']);

Route::get('/home',[HomeController::class,'redirect']);

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

Route::get('/add_event_view',[AdminController::class,'addview']);

Route::get('/add_user',[AdminController::class,'adduser']);

Route::post('/adduser',[AdminController::class,'add_user']);

Route::post('/upload_event',[AdminController::class,'upload']);

Route::get('/view_event',[HomeController::class,'viewevent']);

Route::get('/view_alumni',[HomeController::class,'viewalumni']);

Route::get('search',[SearchController::class,'search']);

Route::get('/view_details',[AdminController::class,'viewdetails']);

Route::get('/deleteuser/{id}',[AdminController::class,'deleteuser']);

Route::get('/edit_event',[AdminController::class,'editevent']);

Route::get('/updateevent/{id}',[AdminController::class,'updateevent']);

Route::post('/editevents/{id}',[AdminController::class,'editevents']);

Route::get('/edit_event/{id}',[AdminController::class,'deleteevents']);

Route::get('/edit_department',[AdminController::class,'editdepartment']);

Route::post('/add_department',[AdminController::class,'adddepartment']);

Route::get('/add_programme',[AdminController::class,'addprogramme']);

Route::post('/upload_programme',[AdminController::class,'uploadprogramme']);

Route::get('view_details',[ViewAlumniController::class,'find']);

Route::post('/',[FeedbackController::class,'submitfeedback']);














