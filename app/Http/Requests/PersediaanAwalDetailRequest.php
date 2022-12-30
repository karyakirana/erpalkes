<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PersediaanAwalDetailRequest extends FormRequest
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
            'produk_id' => 'required',
            'produk_nama' => 'required',
            'batch' => 'nullable',
            'tgl_expired' => 'nullable|date:d-M-Y',
            'harga' => 'required|numeric',
            'jumlah' => 'required|numeric',
            'sub_total' => 'required'
        ];
    }
}
