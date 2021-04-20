<?php

namespace App\Http\Controllers;
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
})->name('index');

/////////////////////////ROUTE DRIVER //////////////////////////////////////
Route::get('/driver', 'App\Http\Controllers\DriverController@listDriver');

////////////////////////ROUTE HR //////////////////////////////////////

Route::get('/HR',[HRController::class, 'initHRView'])->name('indexHR');

Route::get('/deleteEmploye/{idEmploye}', [HRController::class, 'deleteEmploye'])->name('initDeleteEmploye');

Route::get('/initFormEmploye/{idEmploye}', [HRController::class, 'initFormEmploye'])->name('initUpdateEmploye');

Route::get('/createEmploye', [HRController::class, 'initCreateFormEmploye'])->name('createHREmploye');

Route::post('/updateEmploye', [HRController::class, 'updateEmploye'])->name('updateHREmploye');

/////////////////////////ROUTE HOTLINER //////////////////////////////////////
Route::get('/hotliner',[HotlinerController::class, 'addCourseInfoForm']);

Route::post('/paiement',[HotlinerController::class, 'clientPaiement']);

Route::get('/confirmation',[HotlinerController::class, 'formulValidation']);

Route::post('/confirmation',[HotlinerController::class, 'formulValidation']);

///////////////////////////////////////////////////////////////////////////////////

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
