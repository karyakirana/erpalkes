<?php

namespace App\Http\Requests\Penjualan;

use Illuminate\Foundation\Http\FormRequest;

class PenjualanRequest extends FormRequest
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
            'tgl_penjualan' => 'required|date:d-M-Y',
            'tgl_tempo' => 'nullable|date:d-M-Y',
            'tipe' => 'required',
            'customer_id' => 'required',
            'sales_id' => 'required',
            'sales_nama' => 'required',
            'user_id' => 'required',
            'status' => 'required',
            'total_barang' => 'required|numeric',
            'total_ppn' => 'nullable|numeric',
            'total_biaya_lain' => 'nullable|numeric',
            'total_bayar' => 'required|numeric',
            'keterangan' => 'nullable'
        ];
    }
}
