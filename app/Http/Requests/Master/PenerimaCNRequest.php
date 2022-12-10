<?php

namespace App\Http\Requests\Master;

use Illuminate\Foundation\Http\FormRequest;

class PenerimaCNRequest extends FormRequest
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
            'penerimacn_id' => 'nullable',
            'customer_id' => 'nullable',
            'customer_nama' => 'required',
            'penerima_cn' => 'required|min:3',
            'jabatan_cn' => 'nullable',
            'unit_cn' => 'nullable',
            'keterangan' => 'nullable'
        ];
    }

    public function messages()
    {
        return [
            'customer_nama.required' => 'Customer harus diisi.',
        ];
    }
}
