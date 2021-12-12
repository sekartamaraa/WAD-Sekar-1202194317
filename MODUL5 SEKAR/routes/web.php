<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\PatientController;
use App\Http\Controllers\VaccineController;
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

Route::get('/', [HomeController::class, 'index'])->name('welcome');

Route::get('/vaccine', [VaccineController::class, 'index'])->name('vaccine.index');
Route::get('/vaccine/add', [VaccineController::class, 'add'])->name('vaccine.add');
Route::post('/vaccine/insert', [VaccineController::class, 'insert'])->name('vaccine.insert');
Route::get('/vaccine/edit/{vaccine:id}', [VaccineController::class, 'edit'])->name('vaccine.edit');
Route::put('/vaccine/update/{vaccine:id}', [VaccineController::class, 'update'])->name('vaccine.update');
Route::get('/vaccine/delete/{vaccine:id}', [VaccineController::class, 'delete'])->name('vaccine.delete');
Route::delete('/vaccine/destroy/{vaccine:id}', [VaccineController::class, 'destroy'])->name('vaccine.destroy');

Route::get('/patient', [PatientController::class, 'index'])->name('patient.index');
Route::get('/patient/vaccine', [PatientController::class, 'vaccine'])->name('patient.vaccine');
Route::get('/patient/add/{vaccine:id}', [PatientController::class, 'add'])->name('patient.add');
Route::post('/patient/insert/{vaccine:id}', [PatientController::class, 'insert'])->name('patient.insert');
Route::get('/patient/edit/{patient:id}', [PatientController::class, 'edit'])->name('patient.edit');
Route::put('/patient/update/{patient:id}', [PatientController::class, 'update'])->name('patient.update');
Route::get('/patient/delete/{patient:id}', [PatientController::class, 'delete'])->name('patient.delete');
Route::delete('/patient/destroy/{patient:id}', [PatientController::class, 'destroy'])->name('patient.destroy');
