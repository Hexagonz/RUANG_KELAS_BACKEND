<?php

namespace App\Http\Controllers\API;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Log;

class LoginController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function login(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                "nomor_induk" => "required",
                "password" => "required",
            ]);

            if ($validator->fails()) {
                return response()->json($validator->errors(), 422);
            }

            $user = User::where("nomor_induk", '=',$request->nomor_induk)->first();

            if (!$user) {
                return response()->json([
                    'status' => 422,
                    'message' => 'Nim atau Password Salah.',
                ], 422);
            }

            if (!Hash::check($request->password, $user->password)) {
                return response()->json([
                    'status' => 422,
                    'message' => 'Nim atau Password Salah.',
                ], 422);
            }

            // Create a Sanctum token for the user
            $token = $user->createToken('auth_token')->plainTextToken;

            return response()->json([
                'message' => 'Login anda Berhasil',
                'status' => 200,
                'user'    => $user,
                'token'   => $token
            ], 200);
        } catch (\Throwable $t) {
            Log::error('Error during login: ' . $t->getMessage(), [
                'exception' => $t,
                'request' => $request->all()
            ]);
            return response()->json([
                "error" => "Terjadi kesalahan pada server",
                "message" => $t->getMessage() // Menampilkan pesan error untuk debugging
            ], 500);
        }
    }
}
