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
            'produk_sub_kategori' => 'required',
            'produk_kategori' => 'required',
            'kode' => 'nullable',
            'nama_produk' => 'required',
            'is_expired' => 'nullable',
            'tipe' => 'required',
            'satuan_beli' => 'required',
            'isi_kemasan' => 'required',
            'satuan_jual' => 'required',
            'harga' => 'required',
            'keterangan' => 'nullable'

        ];
    }

    public function messages()
    {
        return [
            'nama_produk' => 'Nama produk harus diisi.'
        ];
    }
}
