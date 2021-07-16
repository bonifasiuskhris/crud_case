<?php

use App\Http\Controllers\ComponentController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\PeriodController;
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

Route::middleware(['auth'])->group(function () {
    Route::get('/', function () {
        return view('index');
    });
    Route::get('/dashboard', function () {
        return view('dashboard');
    });

    Route::resources([
        'periods' => PeriodController::class,
        'employees' => EmployeeController::class,
        'component' => ComponentController::class,
    ]);
});



require __DIR__.'/auth.php';
