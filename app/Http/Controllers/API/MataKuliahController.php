<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Mata_kuliah;
use Illuminate\Support\Facades\Validator;

class MataKuliahController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function MataKuliah()
    {
        $mataKuliah = Mata_kuliah::all();
        return response()->json(['data' => $mataKuliah], 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function CreateMataKuliah(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nama_matkul' => 'required|string|max:255',
            'sks' => 'required|string',
            'id_dosen' => 'required|exists:dosens,id_dosen|unique:mata_kuliah',
            'hari' => 'required|date',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $mataKuliah = Mata_kuliah::create($request->all());
        return response()->json(['data' => $mataKuliah, 'message' => 'Mata Kuliah created successfully'], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function MelihatMataKuliah($id)
    {
        $mataKuliah = Mata_kuliah::find($id);
        if (!$mataKuliah) {
            return response()->json(['message' => 'Mata Kuliah not found'], 404);
        }
        return response()->json(['data' => $mataKuliah], 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function UpdateMataKuliah(Request $request, $id)
    {
        $mataKuliah = Mata_kuliah::find($id);
        if (!$mataKuliah) {
            return response()->json(['message' => 'Mata Kuliah not found'], 404);
        }

        $validator = Validator::make($request->all(), [
            'nama_matkul' => 'required|string|max:255',
            'sks' => 'required|string',
            'id_dosen' => 'required|exists:dosens,id_dosen|unique:mata_kuliah,id_dosen,' . $id . ',id_matkul',
            'hari' => 'required|date',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $mataKuliah->update($request->all());
        return response()->json(['data' => $mataKuliah, 'message' => 'Mata Kuliah updated successfully'], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function DeleteMataKuliah($id)
    {
        $mataKuliah = Mata_kuliah::find($id);
        if (!$mataKuliah) {
            return response()->json(['message' => 'Mata Kuliah not found'], 404);
        }
        $mataKuliah->delete();
        return response()->json(['message' => 'Mata Kuliah deleted successfully'], 200);
    }
}