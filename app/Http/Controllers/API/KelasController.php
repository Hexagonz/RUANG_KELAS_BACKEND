<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Kelas;
use Illuminate\Support\Facades\Validator;

class KelasController extends Controller
{
    // Get all classes
    public function Kelas()
    {
        $kelas = Kelas::all();
        return response()->json(['data' => $kelas], 200);
    }

    // Create a new class
    public function CreateKelas(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nama_kelas' => 'required|string|max:255',
            'lokasi' => 'required|string|max:255',
            'status' => 'required|in:Available,Not Available',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $kelas = Kelas::create($request->all());
        return response()->json(['data' => $kelas, 'message' => 'Kelas created successfully'], 201);
    }

    // Update class details
    public function UpdateKelas(Request $request, $id_kelas)
    {
        $kelas = Kelas::find($id_kelas);
        if (!$kelas) {
            return response()->json(['message' => 'Kelas not found'], 404);
        }

        $validator = Validator::make($request->all(), [
            'nama_kelas' => 'required|string|min:5|max:5',
            'lokasi' => 'required|string|max:100',
            'status' => 'required|in:Available,Not Available',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $kelas->update($request->all());
        return response()->json(['data' => $kelas, 'message' => 'Kelas updated successfully'], 200);
    }

    // Delete a class
    public function DeleteKelas($id_kelas)
    {
        $kelas = Kelas::find($id_kelas);
        if (!$kelas) {
            return response()->json(['message' => 'Kelas not found'], 404);
        }

        $kelas->delete();
        return response()->json(['message' => 'Kelas deleted successfully'], 200);
    }

    // Borrow a class
    public function PinjamKelas($id_kelas)
    {
        $kelas = Kelas::find($id_kelas);
        if (!$kelas) {
            return response()->json(['message' => 'Kelas not found'], 404);
        }

        if ($kelas->status == 'Not Available') {
            return response()->json(['message' => 'Kelas tidak Tersedia untuk di Pinjam'], 403);
        }

        // Logic for borrowing the class
        return response()->json(['message' => 'Kelas borrowed successfully', 'data' => $kelas], 200);
    }

    public function MelihatKelas($id_kelas)
    {
        $kelas = Kelas::find($id_kelas);

        if (!$kelas) {
            return response()->json(['message' => 'kelas not found'], 404);
        }

        return response()->json(['data' => $kelas], 200);
    }
}
