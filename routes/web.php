<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DashboardPenggunaController;
use App\Http\Controllers\DashboardSuperadminController;
use App\Http\Controllers\DesaController;
use App\Http\Controllers\NomorSuratController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PendaftaranDesaController;
use App\Http\Controllers\PrajuruDesaController;
use App\Http\Controllers\PrajuruBanjarController;
use App\Http\Controllers\SuratKeluarController;
use App\Http\Controllers\SuratKeluarPanitiaController;
use App\Http\Controllers\DusunController;



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

    return view('landing-page');
});

//Auth
Route::get('/login', [AuthController::class, 'index'])->name('login');
Route::post('/loginsession', [AuthController::class, 'loginsession'])->name('loginsession');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

// Middleware Admin
Route::group(['middleware' => ['auth','cek_login:Bendesa, Admin']], function () {
    route::get('/admin', [DashboardController::class, 'index'])->name('admin');
});

// Route::group(['middleware' => ['auth', 'cek_login:Kepala Desa']], function () {
//     route::get('/kades', [DashboardController::class, 'index'])->name('kades');
// });

Route::group(['middleware' => ['auth', 'cek_login:Kelihan Banjar Adat']], function () {
    route::get('/banjar', [DashboardController::class, 'index'])->name('kelihan-banjar');
});

// Middleware Superadmin
Route::group(['middleware' => ['auth', 'cek_login:Super Admin']], function () {
    route::get('/superadmin', [DashboardSuperadminController::class, 'index'])->name('superadmin');
    route::get('/superadmin/desa/konfirmasi/{id}', [DashboardSuperadminController::class, 'edit'])->name('konfirm-pendaftaran-desa');
    route::get('/superadmin/desa/detail/{id}', [DashboardSuperadminController::class, 'show'])->name('detail-desa');
    route::get('/superadmin/desa/berhasil/{id}', [DashboardSuperadminController::class, 'update'])->name('pendaftaran-desa-berhasil');
    route::post('/superadmin/desa/tolak', [DashboardSuperadminController::class, 'tolak'])->name('pendaftaran-desa-ditolak');
    route::get('/superadmin/desa/detail/tolak/{id}', [DashboardSuperadminController::class, 'showtolak'])->name('detail-desa-tolak');
});

// //Middleware User
Route::group(['middleware' => ['auth', 'cek_login:Krama']], function () {
    route::get('/krama', [DashboardPenggunaController::class, 'index'])->name('krama');
});

Route::get('/master-data', function () {
    return view('superadmin.masterdata.master-data');
});

//Pendaftaran Desa
Route::get('/desaadat/create', [PendaftaranDesaController::class, 'create'])->name('create-desa-adat');
Route::post('/desaadat/create/getkabupaten', [PendaftaranDesaController::class, 'getkabupaten'])->name('get-kabupaten');
Route::post('/desaadat/create/getkecamatan', [PendaftaranDesaController::class, 'getkecamatan'])->name('get-kecamatan');
Route::post('/desaadat/create/getdesaadat', [PendaftaranDesaController::class, 'getdesaadat'])->name('get-desa-adat');
Route::post('/desaadat/create/caridata', [PendaftaranDesaController::class, 'loaddata'])->name('caridata');
Route::post('/desaadat/save', [PendaftaranDesaController::class, 'save'])->name('save-desa-adat');
Route::get('/desaadat/create/success', [PendaftaranDesaController::class, 'success'])->name('daftar-desa-sukses');

//Desa
Route::get('/desa', [DesaController::class, 'index'])->name('desa');
Route::post('/desa/add', [DesaController::class, 'store'])->name('add-desa');
Route::get('/desa/edit/{id}', [DesaController::class, 'edit'])->name('edit-desa');
Route::post('/desa/update/{id}', [DesaController::class, 'update'])->name('update-desa');
Route::get('/desa/delete/{id}', [DesaController::class, 'destroy'])->name('delete-desa');


//Nomor Surat
Route::get('/nomor-surat', [NomorSuratController::class, 'index'])->name('nomor-surat');
Route::get('/nomor-surat/create', [NomorSuratController::class, 'create'])->name('create-nomor-surat');
Route::post('/nomor-surat/add', [NomorSuratController::class, 'store'])->name('add-update-nomor-surat');
Route::post('/nomor-surat/edit', [NomorSuratController::class, 'edit'])->name('edit-nomor-surat');
Route::post('/nomor-surat/update/{id}', [NomorSuratController::class, 'update'])->name('update-nomor-surat');
Route::get('/nomor-surat/delete/{id}', [NomorSuratController::class, 'destroy'])->name('delete-nomor-surat');

//Prajuru Desa Adat
Route::get('/prajuru/desaadat', [PrajuruDesaController::class, 'index'])->name('prajuru-desa-adat');
Route::get('/prajuru/desaadat/create', [PrajuruDesaController::class, 'create'])->name('create-prajuru-desa-adat');
Route::post('/prajuru/desaadat/create/getpassword', [PendaftaranDesaController::class, 'getpassword'])->name('get-password');
Route::post('/prajuru/desaadat/add', [PrajuruDesaController::class, 'store'])->name('add-prajuru-desa-adat');
Route::get('/prajuru/desaadat/edit/{id}', [PrajuruDesaController::class, 'edit'])->name('edit-prajuru-desa-adat');
Route::post('/prajuru/desaadat/update/{id}', [PrajuruDesaController::class, 'update'])->name('update-prajuru-desa-adat');
Route::get('/prajuru/desaadat/nonaktif/{id}', [PrajuruDesaController::class, 'nonaktif'])->name('nonaktif-prajuru-desa-adat');
Route::get('/prajuru/desaadat/detail/{id}', [PrajuruDesaController::class, 'detail'])->name('detail-prajuru-desa-adat');

//Prajuru Banjar Adat
Route::get('/prajuru/banjaradat', [PrajuruBanjarController::class, 'index'])->name('prajuru-banjar-adat');
Route::get('/prajuru/banjaradat/create', [PrajuruBanjarController::class, 'create'])->name('create-prajuru-banjar-adat');
Route::post('/prajuru/banjaradat/add', [PrajuruBanjarController::class, 'store'])->name('add-prajuru-banjar-adat');
Route::get('/prajuru/banjaradat/edit/{id}', [PrajuruBanjarController::class, 'edit'])->name('edit-prajuru-banjar-adat');
Route::post('/prajuru/banjaradat/update/{id}', [PrajuruBanjarController::class, 'update'])->name('update-prajuru-banjar-adat');
Route::get('/prajuru/banjaradat/nonaktif/{id}', [PrajuruBanjarController::class, 'nonaktif'])->name('nonaktif-prajuru-banjar-adat');
Route::get('/prajuru/banjaradat/detail/{id}', [PrajuruBanjarController::class, 'detail'])->name('detail-prajuru-banjar-adat');

//Profile
Route::get('/profile/show/{id}', [UserController::class, 'show'])->name('show-profile');
Route::get('/profile/edit/{id}', [UserController::class, 'edit'])->name('edit-profile');
Route::post('profile/crop', [UserController::class, 'crop'])->name('crop-picture');
Route::post('/profile/update/{id}', [UserController::class, 'update'])->name('update-profile');

//Surat Keluar
Route::get('/surat/keluar', [SuratKeluarController::class, 'index'])->name('dashboard-surat-keluar');
Route::get('/surat/keluar/panitia', [SuratKeluarPanitiaController::class, 'index'])->name('home-surat-keluar-panitia');
Route::get('/surat/keluar/panitia/create', [SuratKeluarPanitiaController::class, 'create'])->name('create-surat-keluar-panitia');
Route::post('/surat/keluar/panitia/add', [SuratKeluarPanitiaController::class, 'store'])->name('add-surat-keluar-panitia');
Route::get('/surat/keluar/panitia/edit/{id}', [SuratKeluarPanitiaController::class, 'edit'])->name('edit-surat-keluar-panitia');
Route::post('/surat/keluar/panitia/update/{id}', [SuratKeluarPanitiaController::class, 'update'])->name('update-surat-keluar-panitia');
Route::get('/surat/keluar/panitia/detail/waiting/{id}', [SuratKeluarPanitiaController::class, 'show'])->name('detail-surat-keluar-panitia');
Route::get('/surat/keluar/panitia/detail/inprogress/{id}', [SuratKeluarPanitiaController::class, 'showinprogress'])->name('detail-surat-keluar-panitia-inprogress');
Route::get('/surat/keluar/panitia/lepihan/{id}', [SuratKeluarPanitiaController::class, 'showlepihan'])->name('lampiran-surat-keluar-panitia');
Route::get('/surat/keluar/panitia/cetak/{id}', [SuratKeluarPanitiaController::class, 'cetak'])->name('cetak-surat-keluar-panitia');
Route::get('/surat/keluar/panitia/response/inprogress/{id}', [SuratKeluarPanitiaController::class, 'inprogress'])->name('inprogress-surat-keluar-panitia');
