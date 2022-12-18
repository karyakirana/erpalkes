<?php

namespace App\Http\Requests\Master;

use Illuminate\Foundation\Http\FormRequest;

class GudangRequest extends FormRequest
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
            'gudang_id' => 'nullable',
            'nama' => 'required',
            'keterangan' => 'nullable'
        ];
    }
}
