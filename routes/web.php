<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AnalisaController;
use App\Http\Controllers\AnalisaLanjutanController;
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
});
