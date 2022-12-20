<?php

namespace App\Http\Requests\Master;

use Illuminate\Foundation\Http\FormRequest;

class PegawaiSalesAreaRequest extends FormRequest
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
            'pegawai_sales_area_id' => 'nullable',
            'pegawai_id' => 'required',
            'pegawai_nama' => 'required',
            'nama' => 'required',
            'dataDetail' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'dataDetail.required' => 'Kota / Kabupaten Belum diinputkan'
        ];
    }
}
