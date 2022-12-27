<?php

namespace App\Http\Requests\Pembelian;

use Illuminate\Foundation\Http\FormRequest;

class PembelianPreorderRequest extends FormRequest
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
            'pembelian_preorder_id' => 'nullable',
            'pembelian_quotation_id' => 'nullable',
            'tgl_pembelian_po' => 'required',
            'supplier_id' => 'required',
            'user_id' => 'required',
            'status' => 'nullable',
            'total_barang' => 'required',
            'ppn' => 'nullable',
            'biaya_lain' => 'nullable',
            'total_bayar' => 'required',
            'keterangan' => 'nullable'
        ];
    }
}
