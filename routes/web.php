<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AnalisaController;
use App\Http\Controllers\AnalisaLanjutanController;
use App\Http\Controllers\AuthenticationController;
use App\Http\Controllers\BillingController;
use App\Http\Controllers\FileUploadController;
use App\Http\Controllers\FileUploadLanjutanController;
use App\Http\Controllers\KlausulController;
use App\Http\Controllers\KlausulAuditController;
use App\Http\Controllers\PembayaranController;
use App\Http\Controllers\PeriodeController;
use App\Http\Controllers\PutusanAuditController;
use App\Http\Controllers\ResponTemuanController;
use App\Http\Controllers\StandarController;
use App\Http\Controllers\SubKlausulController;
use App\Http\Controllers\SubKlausulAuditController;
use App\Http\Controllers\TemuanController;
use App\Http\Controllers\TimAuditorController;
use App\Http\Controllers\UnitController;
use App\Http\Controllers\UnitAuditController;
use App\Http\Controllers\UserController;

use App\Http\Controllers\GeneralController;
use App\Http\Controllers\SubmisiController;


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


Route::middleware(['web', 'auth'])->group(function () {

    // Your protected routes here
});
Route::get('/', function () {
    return view('dashboard');
});

Route::get('/login', [AuthenticationController::class, 'show'])->name('login');
Route::post('/login', [AuthenticationController::class, 'login']);
Route::post('/logout', [AuthenticationController::class, 'logout'])->name('logout');

// ============== UNIT
Route::get('/unit_index', [UnitController::class, 'index']);
Route::get('/unit_create', [UnitController::class, 'create']);
Route::post('/unit_create', [UnitController::class, 'store']);
Route::get('/unit_edit/{unit}', [UnitController::class, 'edit']);
Route::post('/unit_update/{unit}', [UnitController::class, 'update']);
// Route::get('/unit_destroy/{unit}', [UnitController::class, 'destroy']);
Route::get('/unit_detail/{unit}', [UnitController::class, 'show']);

// ============== PERIODE
Route::get('/periode_index', [PeriodeController::class, 'index']);
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

Route::post('/unitaudit_select/{unitAudit}', [UnitAuditController::class, 'select']);
Route::post('/unitaudit_unselect', [UnitAuditController::class, 'unselect']);

// ============== SUBMISI
Route::get('/submisi_index', [SubmisiController::class, 'index']);

// ============== ANALISA & TEMUAN
Route::get('/analisa_index', [AnalisaController::class, 'index']);
Route::post('/analisa_create/{subKlausulAudit}', [AnalisaController::class, 'create']); //include create Temuan
Route::post('/analisa_create', [AnalisaController::class, 'store']); //include create Temuan
Route::get('/temuan_index', [TemuanController::class, 'index']);




// ============== AUDITEE
Route::get('/pembayaran_index', [PembayaranController::class, 'index']);
Route::get('/pembayaran_create/{id_billing}', [PembayaranController::class, 'create']);
Route::post('/pembayaran_create', [PembayaranController::class, 'store']);

Route::get('/billing_index', function () {
    return view('billing_index');
});

