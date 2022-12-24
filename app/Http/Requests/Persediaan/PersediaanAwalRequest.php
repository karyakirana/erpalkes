<?php

namespace App\Http\Requests\Persediaan;

use Illuminate\Foundation\Http\FormRequest;

class PersediaanAwalRequest extends FormRequest
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
            'persediaan_awal_id' => 'nullable',
            'kondisi' => 'required',
            'gudang_id' => 'required',
            'user_id' => 'required',
            'total_barang' => 'required',
            'total_nominal' => 'required',
            'keterangan' => 'nullable'
        ];
    }
}
