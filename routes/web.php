<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DashboardDAAAController;
use App\Http\Controllers\DashboardKepalaProdiController;
use App\Http\Controllers\DashboardMahasiswaController;
use App\Http\Controllers\DashboardPebimbingController;
use App\Http\Controllers\DashboardPengujiController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\mskategoripenilaianController;
use App\Http\Controllers\mspebimbingpengujiController;
use App\Http\Controllers\mspenggunaController;
use App\Models\mspebimbingpenguji;
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

    
});
//Mahasiswa
Route::get('/DashboardMahasiswa', [DashboardMahasiswaController::class, 'index'])->name('DashboardMahasiswa.index');
Route::get('/DashboardPesyaratan_Pendaftaran', [DashboardMahasiswaController::class, 'Pesyaratan_Pendaftaran'])->name('DashboardPesyaratan_Pendaftaran.Pesyaratan_Pendaftaran');
Route::get('/DashboardPendaftaran_Sidang', [DashboardMahasiswaController::class, 'Pendaftaran_Sidang'])->name('DashboardPendaftaran_Sidang.Pendaftaran_Sidang');
Route::get('/DashboardHasil_Sidang', [DashboardMahasiswaController::class, 'Hasil_sidang'])->name('DashboardHasil_Sidang.Hasil_sidang');
//DAA
Route::get('/DashboardDAAA', [DashboardDAAAController::class, 'index'])->name('DashboardDAAA.index');
Route::get('/DashboardUndangan', [DashboardDAAAController::class, 'Undangan'])->name('DashboardUndangan.Undangan');
//Pebimbing
Route::get('/DashboardPebimbing', [DashboardPebimbingController::class, 'index'])->name('DashboardPebimbing.index');
Route::get('/Dashboardhasilsidang', [DashboardPebimbingController::class, 'hasilSidang'])->name('Dashboardhasilsidang.hasilSidang');
Route::get('/DashboardSidang_BAP_SIdang', [DashboardPebimbingController::class, 'Sidang_bap_ta'])->name('DashboardSidang_BAP_SIdang.Sidang_bap_ta');
Route::get('/DashboardUndangansidang', [DashboardPebimbingController::class, 'Undangan_sidang'])->name('DashboardUndangansidang.Undangan_sidang');
//Pengunji
Route::get('/DashboardPenguji', [DashboardPengujiController::class, 'index'])->name('DashboardPenguji.index');
Route::get('/DashboardhasilSidang', [DashboardPengujiController::class, 'hasil_sidang'])->name('DashboardhasilSidang.hasil_sidang');
Route::get('/DashboardhBAPsidangTA', [DashboardPengujiController::class, 'BAP_sidang_TA'])->name('DashboardhBAPsidangTA.BAP_sidang_TA');
Route::get('/DashboardhForm_sidang_ta', [DashboardPengujiController::class, 'Form_Penilaian'])->name('DashboardhForm_sidang_ta.Form_Penilaian');
Route::get('/DashboardhPenilaian_sidang_ta', [DashboardPengujiController::class, 'Penilaian_Sidang_TA'])->name('DashboardhPenilaian_sidang_ta.Penilaian_Sidang_TA');
//Kepala Prodi
Route::get('/DashboardKepalaProdi', [DashboardKepalaProdiController::class, 'index'])->name('DashboardKepalaProdi.index');
Route::get('/DashboardHasil_sidang_Mahasiswa', [DashboardKepalaProdiController::class, 'Hasilsidang'])->name('DashboardHasil_sidang_Mahasiswa.Hasilsidang');
Route::get('/DashboardGrafik_data', [DashboardKepalaProdiController::class, 'grafik_data'])->name('DashboardGrafik_data.grafik_data');

//Koordinator TA
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard.index');
Route::get('/dashboardKelola_tahun_ajaran', [DashboardController::class, 'Kelola_tahun_ajaran'])->name('dashboardKelola_tahun_ajaran.Kelola_tahun_ajaran');
Route::get('/dashboardKTamabah_tahun_ajaran', [DashboardController::class, 'Create_tahun_ajaran'])->name('dashboardKTamabah_tahun_ajaran.Create_tahun_ajaran');
Route::post('/dashboardKInsert_tahun_ajaran', [DashboardController::class, 'insertdata_tahun_ajaran'])->name('dashboardKInsert_tahun_ajaran.insertdata_tahun_ajaran');
Route::get('/dashboardKEdit_tahun_ajaran/{thn_id}', [DashboardController::class, 'Edit_tahun_ajaran'])->name('dashboardKEdit_tahun_ajaran.Edit_tahun_ajaran');
Route::post('/updatedata_tahun_ajaran/{thn_id}', [DashboardController::class, 'updatedata_tahun_ajaran'])->name('updatedata_tahun_ajaran.updatedata_tahun_ajaran');
Route::get('/delete_tahun_ajaran/{thn_id}', [DashboardController::class, 'delete_tahun_ajaran'])->name('delete_tahun_ajaran.delete_tahun_ajaran');

Route::get('/dashboardaHasilsidang', [DashboardController::class, 'HASIL_SIDANG'])->name('dashboardaHasilsidang.HASIL_SIDANG');
Route::get('/dashboardaPenilaianSidangTa', [DashboardController::class, 'Penilaian_sidang_TA'])->name('dashboardaPenilaianSidangTa.Penilaian_sidang_TA');

Route::get('/dashboardaKelolaMahasiswa', [DashboardController::class, 'Kelola_Mahasiswa'])->name('dashboardaKelolaMahasiswa.Kelola_Mahasiswa');
Route::get('/dashboardTambahKelolaMahasiswa', [DashboardController::class, 'Create_Kelola_Mahasiswa'])->name('dashboardTambahKelolaMahasiswa.Create_Kelola_Mahasiswa');
Route::post('/dashboardinsertdataKelolaMahasiswa', [DashboardController::class, 'insertdata_Kelola_Mahasiswa'])->name('dashboardinsertdataKelolaMahasiswa.insertdata_Kelola_Mahasiswa');
Route::get('/dashboardEditKelolaMahasiswa/{mhs_username}', [DashboardController::class, 'Edit_kelola_Mahasiswa'])->name('dashboardEditKelolaMahasiswa.Edit_kelola_Mahasiswa');
Route::post('/dashboardUpdate_KelolaMahasiswa/{mhs_username}', [DashboardController::class, ' updatedata_Kelola_Mahasiswa'])->name('dashboardUpdate_KelolaMahasiswa. updatedata_Kelola_Mahasiswa');
Route::get('/dashboardDelete_KelolaMahasiswa/{mhs_username}', [DashboardController::class, 'delete_kelola_mahasiswa'])->name('dashboardDelete_KelolaMahasiswa.delete_kelola_mahasiswa');


Route::get('/kategori_penilaian', [mskategoripenilaianController::class, 'index'])->name('kategori_penilaian');
Route::get('/Create', [mskategoripenilaianController::class, 'Create'])->name('Create'); 
Route::post('/insertdata', [mskategoripenilaianController::class, 'insertdata'])->name('insertdata');
Route::get('/Edit/{mkp_id}', [mskategoripenilaianController::class, 'Edit'])->name('Edit'); 
Route::post('/updatedata/{mkp_id}', [mskategoripenilaianController::class, 'updatedata'])->name('updatedata');
Route::get('/delete/{mkp_id}', [mskategoripenilaianController::class, 'delete'])->name('delete');

Route::get('/Pebimbing_pengguna', [mspebimbingpengujiController::class, 'index'])->name('Pebimbing_pengguna');
Route::get('/Create_pebinbing_pengguna', [mspebimbingpengujiController::class, 'Create_pebinbing_pengguna'])->name('Create_pebinbing_pengguna'); 
Route::post('/insertdata_pebinbing_pengguna', [mspebimbingpengujiController::class, 'insertdata_pebinbing_pengguna'])->name('insertdata_pebinbing_pengguna');
Route::get('/Edit_pebinbing_pengguna/{pbn_id}', [mspebimbingpengujiController::class, 'Edit_pebinbing_pengguna'])->name('Edit_pebinbing_pengguna'); 
Route::post('/updatedata_pebinbing_pengguna/{pnb_id}', [mspebimbingpengujiController::class, 'updatedata_pebinbing_pengguna'])->name('updatedata_pebinbing_pengguna');
Route::get('/delete_pebinbing_pengguna/{pnb_id}', [mspebimbingpengujiController::class, 'delete_pebinbing_pengguna'])->name('delete_pebinbing_pengguna');



Route::get('/login', [mspenggunaController::class, 'login'])->name('login'); 
Route::post('/loginproses', [mspenggunaController::class, 'loginproses'])->name('loginproses'); 
Route::get('/register', [mspenggunaController::class, 'register'])->name('register'); 
Route::post('/registeruser', [mspenggunaController::class, 'registeruser'])->name('registeruser');
Route::get('/Indexregister', [mspenggunaController::class, 'Index_register'])->name('Indexregister.Index_register'); 
Route::get('/delete_Pengguna/{png_username}', [mspenggunaController::class, 'delete_pengguna'])->name('delete_Pengguna.delete_pengguna');

