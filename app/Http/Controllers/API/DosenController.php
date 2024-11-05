<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Mata_kuliah;
use App\Models\Jadwal;
use App\Models\Dosen;
use Illuminate\Support\Facades\Validator;

class DosenController extends Controller
{
    public function Dosen()
    {
        $dosen = Dosen::all();
        return response()->json([
            'status' => 'succses',
            'data' => $dosen
        ], 200);

    }

    public function CreateDosen(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nip' => 'required|string|min:12|max:12',
            'nama_dosen' => 'required',
        ]);

        if ($validator->fails()){
            return response()->json([
                'status' => 'error',
                'errors' => $validator->errors()
            ], 422);
        }

        $data = Dosen::where("nip","=",$request->nip)->first();
        if($data) {
            return response()->json([
                'status' => 'error',
                'errors' => [
                    "nip" => ['NIP dosen telah ada']
                ]
            ],422);
        }

        $dosen = Dosen::create($request->all());
        return response()->json([
            'status' => 'succses',
            'data' => $dosen, 'message' => 'Dosen created successfully'
        ], 201);
    }

    public function UpdateDosen(Request $request, $id)
    {
        $dosen = Dosen::find($id);
        if (!$dosen){
            return response()->json([
                'status' => 'error',
                'message' => 'Dosen not found'
            ], 404);
        }

        $validator = Validator::make($request->all(), [
            'nip' => 'sometimes|string|min:12|max:12',
            'nama_dosen' => 'sometimes',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $dosen->update($request->all());
        return response()->json([
            'status' => 'succses',
            'data' => $dosen, 
            'message' => 'Dosen updated successfully'
        ], 200);
    }

    public function DeleteDosen($id) // Tambahkan $id
    {
        $dosen = Dosen::find($id);
        if (!$dosen) {
            return response()->json([
                'status' => 'error',
                'message' => 'Dosen not found'
            ], 404);
        }

        $matkuls = Mata_kuliah::where('id_dosen', '=', $id)->get();
    
        foreach ($matkuls as $matkul) {
            // Hapus semua jadwal yang terkait dengan mata kuliah ini
            $jadwals = Jadwal::where('id_matkul', '=', $matkul->id_matkul)->get();
            foreach ($jadwals as $jadwal) {
                $jadwal->delete();
            }
            $matkul->delete();
        }

        $dosen->delete();
        return response()->json([
            'status' => 'succses',
            'message' => 'Dosen deleted successfully'
        ], 200);
    }

    public function MelihatDosen($id_dosen)
    {
        $dosen = Dosen::find($id_dosen);
        if (!$dosen) {
            return response()->json([
                'status' => 'error',
                'message' => 'Dosen not found'
            ], 404);
        }
        return response()->json([
            'status' => 'succses',
            'data' => $dosen
        ], 200);
    }
}
    