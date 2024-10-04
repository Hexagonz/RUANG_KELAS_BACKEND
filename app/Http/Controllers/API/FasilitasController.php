<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Fasilitas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class FasilitasController extends Controller
{
    // Function untuk mengambil semua data fasilitas
    public function Fasilitas()
    {
        $fasilitas = Fasilitas::all();
        return response()->json(['data' => $fasilitas], 200);
    }

    // Function untuk membuat fasilitas baru
    public function CreateFasilitas(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nama' => 'required|string|max:255',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $fasilitas = Fasilitas::create([
            'nama' => $request->nama,
        ]);

        return response()->json(['data' => $fasilitas, 'message' => 'Fasilitas created successfully'], 201);
    }

    // Function untuk menampilkan detail fasilitas berdasarkan ID
    public function MelihatFasilitas($id_fasilitas)
    {
        $fasilitas = Fasilitas::find($id_fasilitas);

        if (!$fasilitas) {
            return response()->json(['message' => 'Fasilitas not found'], 404);
        }

        return response()->json(
            ['data' => $fasilitas], 200);
    }

    // Function untuk mengupdate data fasilitas berdasarkan ID
    public function UpdateFasilitas(Request $request, $id_fasilitas)
    {
        $fasilitas = Fasilitas::find($id_fasilitas);

        if (!$fasilitas) {
            return response()->json(['message' => 'Fasilitas not found'], 404);
        }

        $validator = Validator::make($request->all(), [
            'nama' => 'required|string|max:255',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $fasilitas->update([
            'nama' => $request->nama,
        ]);

        return response()->json(['data' => $fasilitas, 'message' => 'Fasilitas updated successfully'], 200);
    }

    // Function untuk menghapus fasilitas berdasarkan ID
    public function DeleteFasilitas($id_fasilitas)
    {
        $fasilitas = Fasilitas::find($id_fasilitas);

        if (!$fasilitas) {
            return response()->json(['message' => 'Fasilitas not found'], 404);
        }

        $fasilitas->delete();
        return response()->json(['message' => 'Fasilitas deleted successfully'], 200);
    }
}