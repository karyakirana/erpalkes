<?php

namespace App\Http\Requests\Pembelian;

use Illuminate\Foundation\Http\FormRequest;

class PembelianRequest extends FormRequest
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
            'pembelian_po_id' => 'nullable',
            'tgl_nota' => 'required|date:d-M-Y',
            'tgl_tempo' => 'nullable|date:d-M-Y',
            'supplier_id' => 'required',
            'user_id' => 'required',
            'status' => 'required',
            'total_barang' => 'required|numeric',
            'ppn' => 'nullable|numeric',
            'biaya_lain' => 'nullable|numeric',
            'total_bayar' => 'required|numeric',
            'keterangan' => 'nullable'
        ];
    }
}
