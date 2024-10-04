<?php

namespace App\Http\Controllers\API;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    /**
     * Handle the registration of new users.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function register(Request $request)
    {
        // Validasi input
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'nomor_induk' => 'required|string|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
            'role' => 'required|integer|in:1,2' // Role harus 1 atau 2 (admin atau user biasa)
        ]);

        // Jika validasi gagal
        if ($validator->fails()) {
            return response()->json([
                'status' => 'error',
                'errors' => $validator->errors(),
            ], 422);
        }

        // Buat user baru
        $user = User::create([
            'name' => $request->name,
            'nomor_induk' => $request->nomor_induk,
            'password' => Hash::make($request->password),
            'role' => $request->role, // Role sesuai input, 1 (admin) atau 2 (user biasa)
        ]);

        // Kembalikan response JSON
        return response()->json([
            'status' => 'success',
            'message' => 'User berhasil didaftarkan',
            'user' => $user,
        ], 201);
    }
}
