<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ControllerDashboard;
use App\Http\Controllers\ControllerLogin;
use App\Http\Controllers\ControllerDataPelamar;
use App\Http\Controllers\ControllerDataDaftarPelamar;

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

//Dashboard
Route::get('/viewuser', [ControllerDashboard::class, 'viewuser']);
Route::get('/inputuser', [ControllerDashboard::class, 'inputuser']);
Route::post('/saveuser', [ControllerDashboard::class, 'saveuser']);
Route::get('/edituser/{id}', [ControllerDashboard::class, 'edituser']);
Route::post('/updateuser/{id}', [ControllerDashboard::class, 'updateuser']);
Route::get('/deleteuser/{id}', [ControllerDashboard::class, 'deleteuser']);
Route::get('/cobainput', [ControllerDashboard::class, 'cobainput']);
Route::get('/dashboardadmin', [ControllerDashboard::class, 'dashboardadmin']);

//dashboard dan user
Route::get('/dashboard', [ControllerDashboard::class, 'dashboard'])->middleware('auth');
Route::get('/thema', [ControllerDashboard::class, 'thema']);

//datapelamar
Route::get('/viewdatapelamar', [ControllerDataPelamar::class, 'viewdatapelamar'])->middleware('auth');
Route::get('/inputdatapelamar', [ControllerDataPelamar::class, 'inputdatapelamar'])->middleware('auth');
Route::get('/editdatapelamar/{id}', [ControllerDataPelamar::class, 'editdatapelamar']);
Route::post('/updatedatapelamar/{id}', [ControllerDataPelamar::class, 'updatedatapelamar']);
Route::get('/deletedatapelamar/{id}', [ControllerDataPelamar::class, 'deletedatapelamar']);
Route::post('/savedatapelamar', [ControllerDataPelamar::class, 'savedatapelamar']);

//datadaftarpelamar
Route::get('/viewdatadaftarpelamar', [ControllerDataDaftarPelamar::class, 'viewdatadaftarpelamar'])->middleware('auth');
Route::get('/inputdatadaftarpelamar', [ControllerDataDaftarPelamar::class, 'inputdatadaftarpelamar'])->middleware('auth');
Route::get('/editdatadaftarpelamar/{id}', [ControllerDataDaftarPelamar::class, 'editdatadaftarpelamar']);
Route::post('/updatedatadaftarpelamar/{id}', [ControllerDataDaftarPelamar::class, 'updatedatadaftarpelamar']);
Route::get('/accdatadaftarpelamar/{id}', [ControllerDataDaftarPelamar::class, 'accdatadaftarpelamar']);
Route::get('/noaccdatadaftarpelamar/{id}', [ControllerDataDaftarPelamar::class, 'noaccdatadaftarpelamar']);
Route::get('/deletedatadaftarpelamar/{id}', [ControllerDataDaftarPelamar::class, 'deletedatadaftarpelamar']);
Route::post('/savedatadaftarpelamar', [ControllerDataDaftarPelamar::class, 'savedatadaftarpelamar']);

//login
Route::get('/login', [ControllerLogin::class, 'login'])->name('login');
Route::post('/proseslogin', [ControllerLogin::class, 'proseslogin']);
Route::get('/logout', [ControllerLogin::class, 'logout']);
