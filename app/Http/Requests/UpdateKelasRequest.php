<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class UpdateKelasRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'nama_kelas' => 'sometimes|required|in:TI 1,TI 2,TI 3,TI 4,TI 5,TI 6,TI 7,TI 8,TI 9,TI 10,TI 11,TI 12,TI 13,TI 14',
            'lokasi' => 'sometimes|required|in:Teori,LAB',
            'status' => 'sometimes|required|in:Tersedia,Tidak Tersedia',
            'kapasitas' => 'sometimes|required|numeric',
            'id_fasilitas' => 'sometimes|required|numeric|exists:fasilitas,id_fasilitas',
            'image_1' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:10240',
            'image_2' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:10240',
            'image_3' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:10240',
        ];
    }

    /**
     * Custom error messages for validation rules.
     */
    // public function messages(): array
    // {
    //     return [
    //         'nama_kelas.required' => 'Nama kelas harus diisi.',
    //         'nama_kelas.in' => 'Nama kelas tidak valid.',
    //         'lokasi.required' => 'Lokasi harus diisi.',
    //         'lokasi.in' => 'Lokasi tidak valid.',
    //         'status.required' => 'Status harus diisi.',
    //         'status.in' => 'Status tidak valid.',
    //         'id_fasilitas.required' => 'ID fasilitas harus diisi.',
    //         'id_fasilitas.numeric' => 'ID fasilitas harus berupa angka.',
    //         'id_fasilitas.exists' => 'ID fasilitas tidak ditemukan di database.',
    //         'image_1.image' => 'Gambar 1 harus berupa file gambar.',
    //         'image_1.mimes' => 'Gambar 1 harus berformat jpeg, png, jpg, gif, atau svg.',
    //         'image_1.max' => 'Ukuran Gambar 1 tidak boleh lebih dari 10 MB.',
    //         'image_2.image' => 'Gambar 2 harus berupa file gambar.',
    //         'image_2.mimes' => 'Gambar 2 harus berformat jpeg, png, jpg, gif, atau svg.',
    //         'image_2.max' => 'Ukuran Gambar 2 tidak boleh lebih dari 10 MB.',
    //         'image_3.image' => 'Gambar 3 harus berupa file gambar.',
    //         'image_3.mimes' => 'Gambar 3 harus berformat jpeg, png, jpg, gif, atau svg.',
    //         'image_3.max' => 'Ukuran Gambar 3 tidak boleh lebih dari 10 MB.',
    //     ];
    // }

    /**
     * Handle a failed validation attempt.
     */
    protected function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(response()->json([
            'status' => 'error',
            'errors' => $validator->errors()
        ], 422));
    }
}
