<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AnalisaController;
use App\Http\Controllers\AnalisaLanjutanController;
use App\Http\Controllers\AuthenticationController;
use App\Http\Controllers\BillingController;
use App\Http\Controllers\DashboardController;
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
Route::get('/', [DashboardController::class, 'index']);

Route::get('/login', [AuthenticationController::class, 'show'])->name('login');
Route::get('/actions', [AuthenticationController::class, 'actions']);
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


// ============== PROSES UTAMA AUDIT
Route::get('/submisi_index', [SubmisiController::class, 'index_audit']);
Route::get('/submisilanjutan_index', [SubmisiController::class, 'index_postaudit']);
Route::get('/finalisasiaudit_index', [SubmisiController::class, 'index_auditfinalization']);
Route::post('/putusanaudit_create', [PutusanAuditController::class, 'create']);
Route::post('/putusanaudit_store', [PutusanAuditController::class, 'store']);

Route::get('/submisi_index_auditee', [SubmisiController::class, 'index_audit_auditee']);
Route::get('/fileupload_index', [FileUploadController::class, 'index']);
Route::post('/fileupload_create/{subKlausulAudit}', [FileUploadController::class, 'create']);
Route::post('/fileupload_store', [FileUploadController::class, 'store']);
Route::get('/submisilanjutan_index_auditee', [SubmisiController::class, 'index_postaudit_auditee']);

Route::get('/fileuploadlanjutan_index', [FileUploadLanjutanController::class, 'index']);
Route::post('/fileuploadlanjutan_create/{responTemuan}', [FileUploadLanjutanController::class, 'create']);
Route::post('/fileuploadlanjutan_store', [FileUploadLanjutanController::class, 'store']);
Route::get('/finalisasiaudit_hasil', [SubmisiController::class, 'hasil_audit']);


// ============== ANALISA, ANALISA LANJUTAN, & TEMUAN
Route::get('/analisa_index', [AnalisaController::class, 'index']);
Route::post('/analisa_create/{subKlausulAudit}', [AnalisaController::class, 'create']); //include create Temuan
Route::post('/analisa_create', [AnalisaController::class, 'store']); //include create Temuan
Route::get('/temuan_index', [TemuanController::class, 'index']);
Route::get('/analisalanjutan_index', [AnalisaLanjutanController::class, 'index']);
Route::post('/analisalanjutan_create/{responTemuan}', [AnalisaLanjutanController::class, 'create']);
Route::post('/analisalanjutan_create', [AnalisaLanjutanController::class, 'store']);

Route::get('/analisa_index_auditee', [AnalisaController::class, 'index_auditee']);
Route::get('/temuan_index_auditee', [TemuanController::class, 'index_auditee']);



// ============== RESPON TEMUAN
Route::get('/respontemuan_index', [ResponTemuanController::class, 'index']);
Route::get('/respontemuan_index_auditee', [ResponTemuanController::class, 'index_auditee']);
Route::post('/respontemuan_create/{temuan}', [ResponTemuanController::class, 'create']);
Route::post('/respontemuan_store', [ResponTemuanController::class, 'store']);


// ============== AUDITEE
Route::get('/pembayaran_index', [PembayaranController::class, 'index']);
Route::get('/pembayaran_create/{id_billing}', [PembayaranController::class, 'create']);
Route::post('/pembayaran_create', [PembayaranController::class, 'store']);

Route::get('/billing_index', function () {
    return view('billing_index');
});

