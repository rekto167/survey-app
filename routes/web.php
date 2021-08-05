<?php

use App\Http\Controllers\ReportsController;
use App\Http\Controllers\SurveyController;
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
    return view('index');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

/*
Bagian admin :
 - Untuk melihat grafik chart kepuasan pelanggan
 - Mengatur judul header, logo header, banner static dan banner running text pada survey
 - Mencetak laporan berdasarkan chart bulanan, mingguan, tahunan, berbentuk excel
*/
Route::get('/dashboard', function (){
    return view('admin/dashboard');
});

Route::get('/pengaturan', [SurveyController::class, 'index']);
Route::get('/pengaturan/tambah', [SurveyController::class, 'create']);
Route::post('/pengaturan/tambah', [SurveyController::class, 'store']);
Route::get('/pengaturan/ubah/{survey}', [SurveyController::class, 'edit']);
Route::post('/pengaturan/ubah/{survey}', [SurveyController::class, 'update']);

Route::get('/emot1', [ReportsController::class, 'getvalue']);
Route::get('/emot2', [ReportsController::class, 'getValue']);
Route::get('/emot3', [ReportsController::class, 'getValue']);
Route::get('/emot4', [ReportsController::class, 'getValue']);
Route::get('/emot5', [ReportsController::class, 'getValue']);
