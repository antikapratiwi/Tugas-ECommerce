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

use App\Http\Controllers\HomeController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\UserProfileController;
use App\Http\Controllers\ResetPassword;
use App\Http\Controllers\ChangePassword; 


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
    return view('pages.dashboard');
});

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



Route::get('/billing_index', function () {
    return view('billing_index');
});

Route::get('/analisa_index', function () {
    return view('analisa_index');
});

Route::get('/', function () {return redirect('/dashboard');})->middleware('auth');
	Route::get('/register', [RegisterController::class, 'create'])->middleware('guest')->name('register');
	Route::post('/register', [RegisterController::class, 'store'])->middleware('guest')->name('register.perform');
	Route::get('/login', [LoginController::class, 'show'])->middleware('guest')->name('login');
	Route::post('/login', [LoginController::class, 'login'])->middleware('guest')->name('login.perform');
	Route::get('/reset-password', [ResetPassword::class, 'show'])->middleware('guest')->name('reset-password');
	Route::post('/reset-password', [ResetPassword::class, 'send'])->middleware('guest')->name('reset.perform');
	Route::get('/change-password', [ChangePassword::class, 'show'])->middleware('guest')->name('change-password');
	Route::post('/change-password', [ChangePassword::class, 'update'])->middleware('guest')->name('change.perform');
	Route::get('/dashboard', [HomeController::class, 'index'])->name('home')->middleware('auth');
Route::group(['middleware' => 'auth'], function () {
	Route::get('/', function () { return view('pages.dashboard');});
	Route::get('/virtual-reality', [PageController::class, 'vr'])->name('virtual-reality');
	Route::get('/rtl', [PageController::class, 'rtl'])->name('rtl');
	Route::get('/profile', [UserProfileController::class, 'show'])->name('profile');
	Route::post('/profile', [UserProfileController::class, 'update'])->name('profile.update');
	Route::get('/profile-static', [PageController::class, 'profile'])->name('profile-static'); 
	Route::get('/sign-in-static', [PageController::class, 'signin'])->name('sign-in-static');
	Route::get('/sign-up-static', [PageController::class, 'signup'])->name('sign-up-static'); 
	Route::get('/{page}', [PageController::class, 'index'])->name('page');
	Route::post('logout', [LoginController::class, 'logout'])->name('logout');

    //Route::get('/upload-file-audit', function () {return view('upload-file-audit');});

	// Route::prefix('feedback')->name('feedback.')->group(function () {
	// 	Route::get('/', function () {return view('feedback');});
	// 	Route::get('/create', function () {return view('feedback-create');});
	// });
});
