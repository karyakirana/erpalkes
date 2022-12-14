<?php

namespace App\Http\Requests\Master;

use Illuminate\Foundation\Http\FormRequest;

class KategoriSubKategoriRequest extends FormRequest
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
            'produk_kategori_id' => 'required',
            'produk_kategori_nama' => 'required|min:3',
            'produk_kategori_keterangan' => 'nullable',
            'produk_sub_kategori_id' => 'required',
            'produk_sub_kategori_nama' => 'required|min:3',
            'produk_sub_kategori_keterangan' => 'nullable'
        ];
    }
}
