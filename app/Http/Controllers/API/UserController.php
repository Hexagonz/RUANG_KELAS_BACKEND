<?php

namespace App\Http\Controllers\API;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = User::all();
        return response()->json([
            "data" => $user
        ], 200);
    }
    public function delete(Request $request, $id)
    {

        $user = User::find($id);
        if($request->user()->role == $user->role) {
            return response()->json([
                'status' => 'error',
                'errors' => 'Tidak Bisa Menghapus Diri Sendiri'
            ],422);
        }
        if(!$user) {
            return response()->json([
                'status' => 'error',
                'errors' => 'user tidak ditemukan'
            ],422);
        }
        $user->delete();
        return response()->json([
            'status' => 'succses',
            'message' => 'User berhasil dihapus',
            "data" => $user
        ], 200);
    }

}