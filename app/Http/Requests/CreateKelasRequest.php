<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class CreateKelasRequest extends FormRequest
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
            'nama_kelas' => 'required|in:A,B,C,D,E',
            'lokasi' => 'required|in:Teori,LAB',
            'status' => 'required|in:Tersedia,Tidak Tersedia',
            'id_fasilitas' => 'required|exists:fasilitas,id_fasilitas',
            'image_1' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:10240',
            'image_2' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:10240',
            'image_3' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:10240',
        ];
    }

    protected function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(response()->json([
            'status' => 'error',
            'errors' => $validator->errors()
        ], 422));
    }
}
