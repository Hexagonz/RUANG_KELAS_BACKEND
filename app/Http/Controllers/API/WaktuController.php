<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Waktu;
use Illuminate\Support\Facades\Validator;

class WaktuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function Waktu()
    {
        $waktu = Waktu::all();
        return response()->json(['data' => $waktu], 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function CreateWaktu(Request $request)
    {
        $validator = Validator::make($request->all(), [
            // 'id_waktu' => 'required|unique:waktu',
            'waktu_mulai' => 'required|date_format:H:i:s',
            'waktu_selesai' => 'required|date_format:H:i:s|after:waktu_mulai',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $waktu = Waktu::create($request->all());
        return response()->json(['data' => $waktu, 'message' => 'Waktu created successfully'], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function MelihatWaktu($id)
    {
        $waktu = Waktu::find($id);
        if (!$waktu) {
            return response()->json(['message' => 'Waktu not found'], 404);
        }
        return response()->json(['data' => $waktu], 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function UpdateWaktu(Request $request, $id)
    {
        $waktu = Waktu::find($id);
        if (!$waktu) {
            return response()->json(['message' => 'Waktu not found'], 404);
        }

        $validator = Validator::make($request->all(), [
            'waktu_mulai' => 'required|date_format:H:i:s',
            'waktu_selesai' => 'required|date_format:H:i:s|after:waktu_mulai',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $waktu->update($request->all());
        return response()->json(['data' => $waktu, 'message' => 'Waktu updated successfully'], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function DeleteWaktu($id)
    {
        $waktu = Waktu::find($id);
        if (!$waktu) {
            return response()->json(['message' => 'Waktu not found'], 404);
        }
        $waktu->delete();
        return response()->json(['message' => 'Waktu deleted successfully'], 200);
    }
}