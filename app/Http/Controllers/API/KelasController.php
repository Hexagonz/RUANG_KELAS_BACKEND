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
        // Mengambil semua data kelas beserta fasilitasnya
        $kelas = Kelas::with('fasilitas')->get();

        // Kembalikan respon JSON dengan data kelas dan fasilitas
        return response()->json([
            'status' => 'success',
            'data' => $kelas,
        ], 200);
    }

    // Create a new class
    public function CreateKelas(CreateKelasRequest $request)
    {
        // Validasi data dan proses penyimpanan
        $data = $request->validated();

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

        // Simpan kelas
        $kelas = Kelas::create($data);

        // Menambahkan fasilitas ke kelas jika ada
        if (isset($data['fasilitas'])) {
            $kelas->fasilitas()->attach($data['fasilitas']);
        }

        return response()->json([
            'status' => 'success',
            'message' => 'Kelas berhasil ditambahkan',
            'data' => $kelas->load('fasilitas')
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

        // Mengupdate data kelas
        $kelas->update([
            'nama_kelas' => $data['nama_kelas'] ?? $kelas->nama_kelas,
            'lokasi' => $data['lokasi'] ?? $kelas->lokasi,
            'status' => $data['status'] ?? $kelas->status,
            'kapasitas' => $data['kapasitas'] ?? $kelas->kapasitas,
            'image_1' => $data['image_1'] ?? $kelas->image_1,
            'image_2' => $data['image_2'] ?? $kelas->image_2,
            'image_3' => $data['image_3'] ?? $kelas->image_3,
        ]);

        // Mengupdate fasilitas
        if (isset($data['fasilitas'])) {
            // Dapatkan ID fasilitas yang baru dari data yang dikirimkan
            $newFasilitasIds = $data['fasilitas'];

            // Gunakan sync untuk mengupdate fasilitas
            $kelas->fasilitas()->sync($newFasilitasIds);
        }

        // Kembalikan respon JSON setelah update berhasil
        return response()->json([
            'status' => 'success',
            'message' => 'Kelas berhasil diperbarui.',
            'data' => $kelas->load('fasilitas'), // Mengambil fasilitas terbaru
        ], 200);
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
        $kelas = Kelas::where('index_kelas', '=', $id_kelas);
        if (!$kelas) {
            return response()->json(['message' => 'Kelas not found'], 404);
        }
        $kelas->delete();

        // Logic for borrowing  the class
        return response()->json(['message' => 'Kelas borrowed successfully', 'data' => $kelas], 200);
    }

    public function MelihatKelas($id_kelas)
    {
        $kelas = Kelas::where('index_kelas', '=', $id_kelas);

        if (!$kelas) {
            return response()->json(['message' => 'kelas not found'], 404);
        }

        return response()->json(['data' => $kelas], 200);
    }
}
