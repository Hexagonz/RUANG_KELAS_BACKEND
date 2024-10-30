<?php

namespace App\Http\Controllers\Api;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Validator;

class ResetPasswordController extends Controller
{
    public function resetPassword(Request $request) {
        $validator = Validator::make($request->all(), [
            'name' => 'sometimes|required',
            'nomor_induk' => 'required', // Hapus sometimes supaya nomor_induk wajib
            'password' => 'sometimes|confirmed'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 'error',
                'errors' => $validator->errors()
            ], 422);
        }

        $user = User::where('nomor_induk', '=',$request->nomor_induk)->first();
        
        if (!$user) {
            return response()->json([
                'status' => 'error',
                'message' => 'User not found'
            ], 404);
        }

        // Update password user
        $user->password = Hash::make($request->password);
        $user->save();

        return response()->json([
            'status' => 'success',
            'message' => 'Password berhasil direset',
            'data' => $user->password
        ], 200);
    }
}
