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
        $jadwal = Jadwal::with('kelasz')->get();
        return response()->json(['data' => $jadwal], 200);
    }

    public function CreateJadwal(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'id_matkul' => 'required|exists:mata_kuliah,id_matkul',
            'ruang' => 'required|array',
            'ruang.*' => 'exists:kelas,id_kelas', // Validasi untuk masing-masing kelas
            'waktu_mulai' => 'required|string',
            'waktu_selesai' => 'required|string',
            'kelas' => 'required|string|in:A,B,C,D,E',
            'semester' => 'required|numeric|in:1,2,3,4,5,6',
            'hari' => 'required|string|in:Senin,Selasa,Rabu,Kamis,Jumat,Sabtu,Minggu',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $jadwal = Jadwal::create($request->except('kelas'));

        // Mengaitkan jadwal dengan kelas
        $jadwal->kelasz()->attach($request->ruang);

        return response()->json(['message' => 'Jadwal created successfully', 'data' => $jadwal->load('kelasz')], 201);
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
            'ruang' => 'required|array',
            'ruang.*' => 'exists:kelas,id_kelas', // Validasi untuk masing-masing kelas
            'waktu_mulai' => 'required|string',
            'waktu_selesai' => 'required|string',
            'kelas' => 'required|string|in:A,B,C,D,E',
            'semester' => 'required|numeric|in:1,2,3,4,5,6',
            'hari' => 'required|string|in:Senin,Selasa,Rabu,Kamis,Jumat,Sabtu,Minggu',
        ]);
    
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }
    
        $jadwal = Jadwal::find($id);
    
        if (!$jadwal) {
            return response()->json(['message' => 'Jadwal not found'], 404);
        }
    
        $jadwal->update($request->except('kelas'));
    
        if (count($request->ruang) === 1) {
            // Jika hanya ada satu ruang yang diupdate, gunakan syncWithoutDetaching
            $jadwal->kelasz()->syncWithoutDetaching($request->ruang);
        } else {
            // Jika lebih dari satu ruang, gunakan sync untuk sinkronisasi penuh
            $jadwal->kelasz()->sync($request->ruang);
        }
    
        return response()->json(['message' => 'Jadwal updated successfully', 'data' => $jadwal->load('kelasz')], 200);
    }
    

    // Delete Jadwal Berdasarkan ID
    public function DeleteJadwal($id)
    {
        $jadwal = Jadwal::find($id);

        if (!$jadwal) {
            return response()->json(['message' => 'Jadwal not found'], 404);
        }

        $jadwal->kelasz()->detach(); 
        $jadwal->delete();

        return response()->json(['message' => 'Jadwal deleted successfully'], 200);
    }
}
