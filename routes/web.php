<?php

use App\Http\Controllers\PeriodeController;
use App\Http\Controllers\StandarController;
use App\Http\Controllers\UnitAuditController;
use App\Http\Controllers\UnitController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
    return view('dashboard');
});

// ============== UNIT
Route::get('/unit_index', [UnitController::class, 'index']);
Route::get('/unit_create', [UnitController::class, 'create']);
Route::post('/unit_create', [UnitController::class, 'store']);
Route::get('/unit_edit/{unit}', [UnitController::class, 'edit']);
Route::post('/unit_update/{unit}', [UnitController::class, 'update']);
// Route::get('/unit_destroy/{unit}', [UnitController::class, 'destroy']);
Route::get('/unit_detail/{unit}', [UnitController::class, 'show']);

// ============== AUDITOR
Route::group([
    'prefix' => 'auditor',
    'as' => 'auditor.'
], function()
{
    Route::resource('standar', StandarController::class);
    Route::resource('unit-audit', UnitAuditController::class);
});

// ============== PERIODE
Route::get('/periode_index', [PeriodeController::class, 'index'])
->name('periode.index');
Route::get('/periode_create', [PeriodeController::class, 'create']);
Route::post('/periode_create', [PeriodeController::class, 'store']);
Route::get('/periode_edit/{periode}', [PeriodeController::class, 'edit']);
Route::post('/periode_update/{periode}', [PeriodeController::class, 'update']);
// Route::get('/periode_destroy/{periode}', [PeriodeController::class, 'destroy']);
Route::get('/periode_detail/{periode}', [PeriodeController::class, 'show']);

// ============== UNIT AUDIT
Route::get('/unitaudit_index', [UnitAuditController::class, 'index']);
Route::get('/unitaudit_create', [UnitAuditController::class, 'create']);
Route::post('/unitaudit_create', [UnitAuditController::class, 'store']);
Route::get('/unitaudit_edit/{unit}', [UnitAuditController::class, 'edit']);
Route::post('/unitaudit_update/{unit}', [UnitAuditController::class, 'update']);
// Route::get('/unitaudit_destroy/{unit}', [UnitAuditController::class, 'destroy']);
Route::get('/unitaudit_detail/{unit}', [UnitAuditController::class, 'show']);



Route::get('/billing_index', function () {
    return view('billing_index');
});

Route::get('/analisa_index', function () {
    return view('analisa_index');
});
