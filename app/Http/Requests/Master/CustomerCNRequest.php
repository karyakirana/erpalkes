<?php

namespace App\Http\Requests\Master;

use Illuminate\Foundation\Http\FormRequest;

class CustomerCNRequest extends FormRequest
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
            'customer_id' => 'required',
            'customer_nama' => 'required',
            'user_id' => 'required',
            'penerima_cn' => 'required',
            'jabatan_cn' => 'required',
            'unit_cn' => 'nullable',
            'keterangan' => 'nullable'
        ];
    }
}
