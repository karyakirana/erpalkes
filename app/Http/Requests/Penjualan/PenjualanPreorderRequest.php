<?php

namespace App\Http\Requests\Penjualan;

use Illuminate\Foundation\Http\FormRequest;

class PenjualanPreorderRequest extends FormRequest
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
            'penjualan_preorder_id' => 'nullable',
            'penjualan_quotation_id' => 'nullable',
            'tgl_preorder' => 'required',
            'customer_id' => 'required',
            'user_id' => 'required',
            'status' => 'nullable',
            'total_barang' => 'required',
            'total_ppn' => 'nullable',
            'total_biaya_lain' => 'nullable',
            'total_bayar' => 'required',
            'keterangan' => 'nullable'
        ];
    }
}
