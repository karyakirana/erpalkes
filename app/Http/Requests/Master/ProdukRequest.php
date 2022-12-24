<?php

namespace App\Http\Requests\Master;

use Illuminate\Foundation\Http\FormRequest;

class ProdukRequest extends FormRequest
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
            'produk_id' => 'nullable',
            'produk_sub_kategori_id' => 'required',
            'nama_produk' => 'required',
            'merk' => 'required',
            'tipe' => 'required',
            'satuan_beli' => 'required',
            'satuan_jual' => 'required',
            'harga' => 'required',
            'buffer_stock' => 'nullable|int',
            'minimum_stock' => 'nullable|int',
            'keterangan' => 'nullable',

            'dataImage' => 'nullable|array',
            'dataHarga' => 'nullable|array',
            'dataKemasan' => 'nullable|array'

        ];
    }

    public function messages()
    {
        return [
            'nama_produk' => 'Nama produk harus diisi.'
        ];
    }
}
