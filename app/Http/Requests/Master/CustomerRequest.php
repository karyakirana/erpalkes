<?php

namespace App\Http\Requests\Master;

use Illuminate\Foundation\Http\FormRequest;

class CustomerRequest extends FormRequest
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
            'customer_id' => 'nullable',
            'kode' => 'nullable',
            'status' => 'required',
            'jenis_instansi' => 'required',
            'nama_customer' => 'required|min:3',
            'telepon' => 'nullable',
            'email' => 'nullable|email',
            'npwp' => 'nullable',
            'sales_id' => 'nullable',
            'alamat' => 'nullable',
            'regencies_id' => 'nullable',
            'regencies_name' => 'required',
            'diskon' => 'nullable|numeric',
            'keterangan' => 'nullable'
        ];
    }

    public function messages()
    {
        return [
            'regencies_name.required' => 'Kota harus diisi.'
        ];
    }
}
