<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class BusinessRequest extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name'      => 'required',
            'address'   => 'required',
            'map_lat'   => 'required',
            'map_long'  => 'required',
            'phone'     => 'required',
            'categories'=> 'required',
        ];
    }

    public function messages()
    {
        return [
            'name.required'     => 'Nama perusahaan tidak boleh kosong.',
            'address.required'  => 'Alamat perusahaan tidak boleh kosong.',
            'map_lat.required'  => 'Lintang peta tidak boleh kosong.',
            'map_long.required' => 'Bujur peta tidak boleh kosong.',
            'phone.required'    => 'Telpon tidak boleh kosong.',
            'categories.required'=> 'Kategori tidak boleh kosong.',
        ];
    }
}
