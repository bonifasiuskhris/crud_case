<?php

use App\Http\Controllers\ComponentController;
use App\Http\Controllers\DashboardController;
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
    Route::get('/', [DashboardController::class, 'index'])->name('home');

    Route::prefix('payroll')->group(function () {
        Route::get('/create', [DashboardController::class, 'create']);
        Route::get('/employee_list', [DashboardController::class, 'employee_list']);
        Route::post('/store', [DashboardController::class, 'store']);
        Route::get('/edit', [DashboardController::class, 'edit']);
        Route::post('/update', [DashboardController::class, 'update']);
        Route::get('/delete', [DashboardController::class, 'destroy']);
    });

    Route::resources([
        'period' => PeriodController::class,
        'employee' => EmployeeController::class,
        'component' => ComponentController::class,
    ]);
});

require __DIR__.'/auth.php';


