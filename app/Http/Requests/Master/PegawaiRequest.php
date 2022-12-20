<?php

namespace App\Http\Requests\Master;

use Illuminate\Foundation\Http\FormRequest;

class PegawaiRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'nama' => 'required|min:3',
            'status' => 'required',
            'gender' => 'required',
            'telepon' => 'required',
            'email' => 'nullable|email',
            'npwp' => 'nullable|min:5',
            'jabatan_id' => 'required',
            'alamat' => 'required|min:5',
            'regencies_id' => 'nullable',
            'regencies_name' => 'required',
            'keterangan' => 'nullable'
        ];
    }

    public function messages()
    {
        return [
            'regencies_name.required' => 'Kota / Kabupaten harus diisi.'
        ];
    }
}
