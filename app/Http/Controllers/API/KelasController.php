<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateKelasRequest;
use App\Models\Kelas;
use App\Http\Requests\CreateKelasRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class KelasController extends Controller
{
    // Get all classes
    public function Kelas()
    {
        $kelas = Kelas::join('fasilitas','fasilitas.id_fasilitas','=','kelas.id_fasilitas')
        ->orderBy('index_kelas', 'asc')
        ->get();;

        return response()->json([
            'status' => 'succses',
            'data' => $kelas
        ], 200);
    }

    // Create a new class
    public function CreateKelas(CreateKelasRequest $request)
    {
        // Data sudah divalidasi
        $data = $request->validated();
        $check = Kelas::where('nama_kelas','=',$request->nama_kelas);
        if(!$check) {
            return response()->json([
                "status" => 'error',
                "message" => 'Kelas ' . $request->nama_kelas . ' Sudah Ada'
            ],422);
        }
        // Proses upload gambar
        if ($request->hasFile('image_1')) {
            $data['image_1'] = $request->file('image_1')->store('uploads', 'public');
        }
        if ($request->hasFile('image_2')) {
            $data['image_2'] = $request->file('image_2')->store('uploads', 'public');
        }
        if ($request->hasFile('image_3')) {
            $data['image_3'] = $request->file('image_3')->store('uploads', 'public');
        }
        $dt = Kelas::where('nama_kelas','=',$request->nama_kelas)
        ->where('id_fasilitas','=',$request->id_fasilitas)->first();
        if($dt){
            $dt->update();
            return response()->json([
                'status' => 'success',
                'message' => 'Kelas berhasil diupdate',
                'data' => $dt
            ], 201);
        }
        $kelas = Kelas::create($data); // Simpan data yang sudah diproses
        return response()->json([
            'status' => 'success',
            'message' => 'Kelas berhasil ditambahkan',
            'data' => $kelas
        ], 201);
    }
    // Update class details
    public function UpdateKelas(UpdateKelasRequest $request, $id_kelas)
    {
        // Cari data kelas berdasarkan ID
        $kelas = Kelas::find($id_kelas);

        if (!$kelas) {
            return response()->json(['status' => 'error', 'message' => 'Data tidak ditemukan'], 404);
        }
        // Mengambil data yang divalidasi
        $data = $request->validated();
    
        // Proses upload gambar, jika ada file yang diupload
        if ($request->hasFile('image_1')) {
            $data['image_1'] = $request->file('image_1')->store('uploads', 'public');
        }
        if ($request->hasFile('image_2')) {
            $data['image_2'] = $request->file('image_2')->store('uploads', 'public');
        }
        if ($request->hasFile('image_3')) {
            $data['image_3'] = $request->file('image_3')->store('uploads', 'public');
        }
    
        // Mengupdate data kelas dengan data yang baru atau tetap menggunakan data lama jika tidak ada perubahan
        $kelas->update([
            'nama_kelas' => $data['nama_kelas'] ?? $kelas->nama_kelas,
            'lokasi' => $data['lokasi'] ?? $kelas->lokasi,
            'status' => $data['status'] ?? $kelas->status,
            'kapasitas' => $data['kapasitas'] ?? $kelas->kapasitas,
            'id_fasilitas' => $data['id_fasilitas'] ?? $kelas->id_fasilitas,
            'image_1' => $data['image_1'] ?? $kelas->image_1,
            'image_2' => $data['image_2'] ?? $kelas->image_2,
            'image_3' => $data['image_3'] ?? $kelas->image_3,
        ]);

        // Kembalikan respon JSON setelah update berhasil
        return response()->json([
            'status' => 'success',
            'message' => 'Kelas berhasil diperbarui.',
            'data' => $kelas
        ], 200);
    }
    
    // Delete a class
    public function DeleteKelas($id_kelas)
    {
        
        $kelas = Kelas::where('index_kelas','=',$id_kelas);
        if (!$kelas) {
            return response()->json(['message' => 'Kelas not found'], 404);
        }

        $kelas->delete();
        return response()->json(['message' => 'Kelas deleted successfully'], 200);
    }

    
    public function DeleteKelasWithFasilitas(Request $request, $id)
    {
        // Validasi input
        $validator = Validator::make($request->all(), [
            'nama_kelas' => 'required|string',
        ]);
    
        // Periksa apakah validasi gagal
        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }
    
        // Mencari kelas berdasarkan id_fasilitas dan nama_kelas
        $fasilitas = Kelas::where('id_fasilitas', $id)
            ->where('nama_kelas', $request->nama_kelas)
            ->first();
    
        // Jika kelas tidak ditemukan
        if (!$fasilitas) {
            return response()->json(['message' => 'Kelas not found'], 404);
        }
    
        // Menghapus kelas
        $fasilitas->delete();
    
        return response()->json(['message' => 'Kelas & Fasilitas deleted successfully'], 200);
    }

    // Borrow a class
    public function PinjamKelas($id_kelas)
    {
        $kelas = Kelas::where('index_kelas','=',$id_kelas);
        if (!$kelas) {
            return response()->json(['message' => 'Kelas not found'], 404);
        }
        $kelas->delete();

        // Logic for borrowing  the class
        return response()->json(['message' => 'Kelas borrowed successfully', 'data' => $kelas], 200);
    }

    public function MelihatKelas($id_kelas)
    {
        $kelas = Kelas::where('index_kelas','=',$id_kelas);

        if (!$kelas) {
            return response()->json(['message' => 'kelas not found'], 404);
        }

        return response()->json(['data' => $kelas], 200);
    }
}
