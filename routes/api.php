<?php

use App\Http\Controllers\API\DosenController;
use App\Http\Controllers\API\FasilitasController;
use App\Http\Controllers\API\JadwalController;
use App\Http\Controllers\API\KelasController;
use App\Http\Controllers\API\RegisterController;
use App\Http\Controllers\API\WaktuController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\LoginController;
use App\Http\Controllers\API\LogoutController;


Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::post('/register', [RegisterController::class, 'register']);
Route::post('/login', [LoginController::class, 'login']);
// Route::post("/logout", [LogoutController::class, 'logout']);
Route::middleware('auth:sanctum')->post('/logout', [LogoutController::class , 'logout']);


//waktu
Route::get('/Waktu', [WaktuController::class, 'Waktu']);
Route::post('/create-waktu',[WaktuController::class, 'CreateWaktu']);
Route::put('/update-waktu/{id_waktu}', [WaktuController::class, 'UpdateWaktu']);
Route::delete('/delete-waktu/{id_waktu}', [WaktuController::class, 'DeleteWaktu']);
Route::get('/melihat-waktu', [WaktuController::class, 'MelihatWaktu']);

//Dosen
Route::get('/Dosen', [DosenController::class, 'dosen']);
Route::post('/create-dosen', [DosenController::class, 'CreateDosen']);
Route::put('/update-dosen/{id_dosen}', [DosenController::class, 'UpdateDosen']);
Route::delete('/delete-dosen/{id_dosen}', [DosenController::class, 'DeleteDosen']);
Route::get('/melihat-dosen/{id_dosen}', [DosenController::class, 'MelihatDosen']);

//Jadwal
Route::get('/Jadwal', [JadwalController::class, 'Jadwal']);
Route::post('/create-jadwal', [JadwalController::class, 'CreateJadwal']);
Route::put('/update-jadwal/{id_jadwal}', [JadwalController::class, 'UpdateJadwal']);
Route::delete('delete-jadwal/{id_jadwal}', [JadwalController::class, 'DeleteJadwal']);
Route::get('/melihat-jadwal/{id}', [JadwalController::class, 'MelihatJadwal']);

//fasilitas
Route::get('/Fasilitas', [FasilitasController::class, 'Fasilitas']);
Route::post('/create-fasilitas', [FasilitasController::class, 'CreateFasilitas']);
Route::get('/melihat-fasilitas/{id_fasilitas}', [FasilitasController::class, 'MelihatFasilitas']);
Route::put('/update-fasilitas/{id_fasilitas}', [FasilitasController::class, 'UpdateFasilitas']);
Route::delete('/delete-fasilitas/{id_fasilitas}', [FasilitasController::class, 'DeleteFasilitas']);

//kelas
Route::get('/kelas', [KelasController::class, 'index']);
Route::post('/create-kelas', [KelasController::class, 'CreateKelas']);
Route::put('/update-kelas/{id_kelas}', [KelasController::class, 'UpdateKelas']);
Route::delete('/delete-kelas/{id_kelas}', [KelasController::class, 'DeleteKelas']);
Route::post('/borrow-kelas/{id_kelas}', [KelasController::class, 'PinjamKelas']);



