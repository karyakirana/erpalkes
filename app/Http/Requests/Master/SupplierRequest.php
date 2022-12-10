<?php

namespace App\Http\Requests\Master;

use Illuminate\Foundation\Http\FormRequest;

class SupplierRequest extends FormRequest
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
            'supplier_id' => 'nullable',
            'kode' => 'nullable',
            'nama_supplier' => 'required|min:3',
            'telepon' => 'nullable',
            'email' => 'nullable|email',
            'npwp' => 'nullable',
            'alamat' => 'required',
            'regencies_id' => 'required',
            'regencies_name' => 'nullable',
            'keterangan' => 'nullable'
        ];
    }

    public function messages()
    {
        return [
            'regencies_id.required' => 'Kota / Kabupaten harus diisi.'
        ];
    }
}
