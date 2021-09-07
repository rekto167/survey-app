<?php

use App\Http\Controllers\ReportsController;
use App\Http\Controllers\PersonalisesController;
use App\Http\Controllers\ChartsController;
use App\Http\Controllers\SurveyController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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

// Route::get('/', function () {
//     return view('index');
// });
Route::get('/', [SurveyController::class, 'survey']);
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

/*
Bagian admin :
 - Untuk melihat grafik chart kepuasan pelanggan
 - Mengatur judul header, logo header, banner static dan banner running text pada survey
 - Mencetak laporan berdasarkan chart bulanan, mingguan, tahunan, berbentuk excel
*/
Route::get('/dashboard', [SurveyController::class, 'dashboard']);
Route::get('/chart', [ChartsController::class, 'index']);
Route::get('/chart/bulanan', [ChartsController::class, 'bulanan']);
Route::get('/chart/tahunan', [ChartsController::class, 'tahunan']);

Route::get('/pengaturan', [SurveyController::class, 'index']);
Route::get('/pengaturan/tambah', [SurveyController::class, 'create']);
Route::post('/pengaturan/tambah', [SurveyController::class, 'store']);
Route::get('/pengaturan/ubah/{survey}', [SurveyController::class, 'edit']);
Route::post('/pengaturan/ubah/{survey}', [SurveyController::class, 'update']);
Route::get('/pengaturan/hapus/{id}', [SurveyController::class, 'destroy']);

Route::get('/emot1', [ReportsController::class, 'getvalue']);
Route::get('/emot2', [ReportsController::class, 'getValue']);
Route::get('/emot3', [ReportsController::class, 'getValue']);
Route::get('/emot4', [ReportsController::class, 'getValue']);

// personalises
Route::get('/personalisasi', [PersonalisesController::class, 'index']);
Route::get('/personalisasi/tambah', [PersonalisesController::class, 'create']);
Route::post('/personalisasi/tambah', [PersonalisesController::class, 'store']);
Route::get('/personalisasi/ubah/{id}', [PersonalisesController::class, 'edit']);
Route::post('/personalisasi/ubah/{id}', [PersonalisesController::class, 'update']);
Route::get('/personalisasi/hapus/{id}', [PersonalisesController::class, 'destroy']);

// cetak mingguan
Route::get('/cetak', [ReportsController::class, 'index']);
Route::get('/cetak/mingguan', [ReportsController::class, 'mingguanindex']);
Route::get('/cetak/mingguan/cetakxlsx', [ReportsController::class, 'cetakmingguanxlsx']);
Route::get('/cetak/mingguan/cetakpdf', [ReportsController::class, 'cetakmingguanpdf']);
// cetak bulanan
Route::get('/cetak/bulanan', [ReportsController::class, 'bulananindex']);
Route::get('/cetak/bulanan/cetakxlsx', [ReportsController::class, 'cetakbulananxlsx']);
Route::get('/cetak/bulanan/cetakpdf', [ReportsController::class, 'cetakbulananpdf']);
// cetak tahunan
Route::get('/cetak/tahunan', [ReportsController::class, 'tahunanindex']);
Route::get('/cetak/tahunan/cetakxlsx', [ReportsController::class, 'cetaktahunanxlsx']);
Route::get('/cetak/tahunan/cetakpdf', [ReportsController::class, 'cetaktahunanpdf']);
