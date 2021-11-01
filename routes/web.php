<?php

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
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get("/workers/add", [\App\Http\Controllers\Workers::class, 'add']);
Route::get('/workers', [\App\Http\Controllers\Workers::class, 'list']);
Route::get('/add/salary/{id}', [\App\Http\Controllers\Workers::class, 'addSalary']);
Route::get('/calculate/{id}', [\App\Http\Controllers\Workers::class, 'calculate']);
Route::get('/all/calculate', [\App\Http\Controllers\Workers::class, 'calculateAll']);
Route::post("add-salary", [\App\Http\Controllers\SalariesController::class, 'add']);
Route::get("works", [\App\Http\Controllers\WorksController::class, "index"]);
Route::post("work-edit", [\App\Http\Controllers\WorksController::class, 'edit']);
Route::get("prepayment/{id}", [\App\Http\Controllers\PrepaymentsController::class, 'index']);
