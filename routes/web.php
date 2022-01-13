<?php

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
   return redirect('login');
});
Route::get('/tesClear',function (){
    return view('map_clean_testing');
});

Auth::routes();
Route::group(['middleware' => ['auth']], function () {
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

    Route::resource('roles', App\Http\Controllers\RoleController::class);

    Route::resource('permissions', App\Http\Controllers\PermissionController::class);

    Route::resource('users', App\Http\Controllers\UserController::class);

    Route::get('profil', [App\Http\Controllers\UserController::class, 'profil'])->name('profil');
    Route::get('editProfil/{id}', [App\Http\Controllers\UserController::class, 'editProfiles']);
    Route::patch('updateProfile/{id}', [App\Http\Controllers\UserController::class, 'updateProfile']);

    Route::resource('features', \App\Http\Controllers\FeatureController::class);

    Route::resource('anggotas', App\Http\Controllers\AnggotaController::class);

    Route::resource('persils', App\Http\Controllers\PersilController::class);

    Route::resource('petaPersils', App\Http\Controllers\PetaPersilController::class);

    Route::resource('karyawans', App\Http\Controllers\KaryawanController::class);

    Route::resource('penguruses', App\Http\Controllers\PengurusController::class);

    Route::resource('pks', App\Http\Controllers\PksController::class);

    Route::resource('mitras', App\Http\Controllers\MitraController::class);

    Route::resource('asets', App\Http\Controllers\AsetController::class);

    Route::resource('transports', App\Http\Controllers\TransportController::class);

    Route::resource('drivers', App\Http\Controllers\DriverController::class);

    Route::resource('kontraks', App\Http\Controllers\KontrakController::class);

    Route::resource('barangs', App\Http\Controllers\BarangController::class);

    Route::resource('pembelianBarangs', App\Http\Controllers\PembelianBarangController::class);

    Route::resource('barangSaprodis', App\Http\Controllers\BarangSaprodiController::class);

    Route::resource('penjualanSaprodis', App\Http\Controllers\PenjualanSaprodiController::class);

    Route::resource('hargas', App\Http\Controllers\HargaController::class);

    Route::resource('spbs', App\Http\Controllers\SpbController::class);

    Route::resource('penjualanTbs', App\Http\Controllers\PenjualanTbsController::class);

    Route::resource('gajiPetanis', App\Http\Controllers\GajiPetaniController::class);

    Route::resource('gajiKaryawans', App\Http\Controllers\GajiKaryawanController::class);

    Route::resource('neracaSimpanPinjams', App\Http\Controllers\NeracaSimpanPinjamController::class);

    Route::resource('neracaKeuangans', App\Http\Controllers\NeracaKeuanganController::class);

    Route::resource('laporanPanens', App\Http\Controllers\LaporanPanenController::class);

    Route::resource('konfliks', App\Http\Controllers\KonflikController::class);

    Route::resource('kelolaLingkungans', App\Http\Controllers\KelolaLingkunganController::class);

    Route::resource('pemeliharaans', App\Http\Controllers\PemeliharaanController::class);

    Route::resource('pelatihans', App\Http\Controllers\PelatihanController::class);

    Route::resource('jenisBarangs', App\Http\Controllers\JenisBarangController::class);

    Route::resource('jenisBarangSaprodis', App\Http\Controllers\JenisBarangSaprodiController::class);

    Route::resource('kategoriPekerjas', App\Http\Controllers\KategoriPekerjaController::class);

    Route::resource('kategoriBahanPemeliharaans', App\Http\Controllers\KategoriBahanPemeliharaanController::class);

    Route::resource('kategoriPemeliharaans', App\Http\Controllers\KategoriPemeliharaanController::class);

    Route::resource('bahanPemeliharaans', App\Http\Controllers\BahanPemeliharaanController::class);

    Route::resource('koperasis', App\Http\Controllers\KoperasiController::class);

    Route::resource('sTDBProfiles', App\Http\Controllers\STDBProfileController::class);
    Route::resource('sTDBStatuses', App\Http\Controllers\STDBStatusController::class);
    Route::resource('sTDBPersils', App\Http\Controllers\STDBPersilController::class);
    Route::resource('sTDBRegisters', App\Http\Controllers\STDBRegisterController::class);
    Route::resource('sTDBDetailRegisters', App\Http\Controllers\STDBDetailRegisterController::class);
    Route::resource('sTDBRegisterStatuses', App\Http\Controllers\STDBRegisterHasSTDBStatusController::class);
    Route::get('sTDBRegisters/verify/{id}', [App\Http\Controllers\STDBRegisterController::class,'getVerify'])->name('sTDBRegisters.verify');
    Route::post('sTDBRegisters/verify', [App\Http\Controllers\STDBRegisterController::class,'verified'])->name('sTDBRegisters.verified');
    Route::get('sTDBRegisters/print/{id}', [App\Http\Controllers\STDBRegisterController::class,'cetakSTDB'])->name('sTDBRegisters.print');
});
