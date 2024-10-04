<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Jadwal;

class JadwalController extends Controller
{
    public function Jadwal()
    {
        $jadwal = Jadwal::with(['mata_kuliah:id_matkul,nama_matkul', 'kelas:id_kelas,nama_kelas', 'waktu:id_waktu'])
                         ->get();
        return response()->json(['data' => $jadwal], 200);
    }

    public function CreateJadwal(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'id_matkul' => 'required|exists:mata_kuliah,id_matkul',
            'id_kelas' => 'required|exists:kelas,id_kelas',
            'id_waktu' => 'required|exists:waktu,id_waktu',
            'kelas' => 'required|string',
            'semester' => 'required|string',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $jadwal = Jadwal::create($request->all());

        return response()->json(['message' => 'Jadwal created successfully', 'data' => $jadwal], 201);
    }

    // Melihat Jadwal Berdasarkan ID
    public function MelihatJadwal($id)
    {
        $jadwal = Jadwal::with(['mata_kuliah:id_matkul,nama_matkul', 'kelas:id_kelas,nama_kelas', 'waktu:id_waktu'])
                        ->find($id);
        
        if (!$jadwal) {
            return response()->json(['message' => 'Jadwal not found'], 404);
        }

        return response()->json(['data' => $jadwal], 200);
    }

    // Update Jadwal Berdasarkan ID
    public function UpdateJadwal(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'id_matkul' => 'required|exists:mata_kuliah,id_matkul',
            'id_kelas' => 'required|exists:kelas,id_kelas',
            'id_waktu' => 'required|exists:waktu,id_waktu',
            'kelas' => 'required|string',
            'semester' => 'required|string',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $jadwal = Jadwal::find($id);

        if (!$jadwal) {
            return response()->json(['message' => 'Jadwal not found'], 404);
        }

        $jadwal->update($request->all());

        return response()->json(['message' => 'Jadwal updated successfully', 'data' => $jadwal], 200);
    }

    // Delete Jadwal Berdasarkan ID
    public function DeleteJadwal($id)
    {
        $jadwal = Jadwal::find($id);

        if (!$jadwal) {
            return response()->json(['message' => 'Jadwal not found'], 404);
        }

        $jadwal->delete();

        return response()->json(['message' => 'Jadwal deleted successfully'], 200);
    }
}
