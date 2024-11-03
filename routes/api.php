<?php

use App\Http\Controllers\API\DosenController;
use App\Http\Controllers\API\FasilitasController;
use App\Http\Controllers\API\JadwalController;
use App\Http\Controllers\API\KelasController;
use App\Http\Controllers\API\MataKuliahController;
use App\Http\Controllers\API\RegisterController;
use App\Http\Controllers\Api\ResetPasswordController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\LoginController;
use App\Http\Controllers\API\LogoutController;
use App\Http\Controllers\API\UserController;
use App\Http\Middleware\RoleMiddleware;
// Mengambil data pengguna yang sedang login

// Rute untuk registrasi
Route::post('/register', [RegisterController::class, 'register']);

// Rute untuk login
Route::post('/login', [LoginController::class, 'login']);

// Rute untuk logout
Route::middleware('auth:sanctum')->post('/logout', [LogoutController::class, 'logout']);
Route::middleware(['auth:sanctum', RoleMiddleware::class . ':1'])->get('/users', [UserController::class, 'index']);
Route::middleware(['auth:sanctum', RoleMiddleware::class . ':1'])->put('/reset-password', [ResetPasswordController::class, 'resetPassword']);
Route::middleware(['auth:sanctum', RoleMiddleware::class . ':1'])->delete('/delete-user/{id}', [UserController::class, 'delete']);
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return response()->json($request->user()); // Mengembalikan data pengguna yang sedang login
});

// Dosen
Route::get('/dosen', [DosenController::class, 'dosen']);
Route::post('/create-dosen', [DosenController::class, 'CreateDosen']);
Route::put('/update-dosen/{id_dosen}', [DosenController::class, 'UpdateDosen']);
Route::delete('/delete-dosen/{id_dosen}', [DosenController::class, 'DeleteDosen']);
Route::get('/melihat-dosen/{id_dosen}', [DosenController::class, 'MelihatDosen']);

// Jadwal
Route::get('/jadwal', [JadwalController::class, 'Jadwal']);
Route::post('/create-jadwal', [JadwalController::class, 'CreateJadwal']);
Route::put('/update-jadwal/{id_jadwal}', [JadwalController::class, 'UpdateJadwal']);
Route::delete('/delete-jadwal/{id_jadwal}', [JadwalController::class, 'DeleteJadwal']);
Route::get('/melihat-jadwal/{id}', [JadwalController::class, 'MelihatJadwal']);

// Fasilitas
Route::get('/fasilitas', [FasilitasController::class, 'Fasilitas']);
Route::post('/create-fasilitas', [FasilitasController::class, 'CreateFasilitas']);
Route::get('/melihat-fasilitas/{id_fasilitas}', [FasilitasController::class, 'MelihatFasilitas']);
Route::put('/update-fasilitas/{id_fasilitas}', [FasilitasController::class, 'UpdateFasilitas']);
Route::delete('/delete-fasilitas/{id_fasilitas}', [FasilitasController::class, 'DeleteFasilitas']);

// Kelas
Route::get('/kelas', [KelasController::class, 'Kelas']);
Route::post('/create-kelas', [KelasController::class, 'CreateKelas']);
Route::post('/update-kelas/{id_kelas}', [KelasController::class, 'UpdateKelas']);
Route::delete('/delete-kelas-fasilitas/{id}', [KelasController::class, 'DeleteKelasWithFasilitas']);
Route::delete('/delete-kelas/{id_kelas}', [KelasController::class, 'DeleteKelas']);
Route::get('/borrow-kelas/{id_kelas}', [KelasController::class, 'PinjamKelas']);

// Mata Kuliah
Route::get('/mata-kuliah', [MataKuliahController::class, 'MataKuliah']);
Route::post('/create-mata-kuliah', [MataKuliahController::class, 'CreateMataKuliah']);
Route::put('/update-mata-kuliah/{id_matkul}', [MataKuliahController::class, 'UpdateMataKuliah']);
Route::delete('/delete-mata-kuliah/{id_matkul}', [MataKuliahController::class, 'DeleteMataKuliah']);
Route::get('/melihat-mata-kuliah/{id_matkul}', [MataKuliahController::class, 'MelihatMataKuliah']);
