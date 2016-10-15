<?php

namespace App\Http\Requests;

use App\Http\Requests\SeoRequest;

class TourRequest extends SeoRequest
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
        $rules = [
            'name'      => 'required',
            'address'   => 'required',
            'map_lat'   => 'required',
            'map_long'  => 'required',
            'phone'     => 'required',
            'image'     => 'image|mimes:jpeg,png',
            'tiket'     => 'required|integer',
        ];

        $rules += $this->seoRules();

        return $rules;
    }

    public function messages()
    {
        $messages = [
            'name.required'     => 'Nama tempat wisata tidak boleh kosong.',
            'address.required'  => 'Alamat tempat wisata tidak boleh kosong.',
            'map_lat.required'  => 'Lintang peta tidak boleh kosong.',
            'map_long.required' => 'Bujur peta tidak boleh kosong.',
            'phone.required'    => 'Telpon tidak boleh kosong.',
            'image.image'        => 'Image harus gambar.',
            'image.mimes'        => 'Image harus format jpg atau png.',
            'tiket.required'     => 'Tiket tidak boleh kosong.',
            'tiket.integer'      => 'Input harus angka.',
        ];

        $messages += $this->seoMessages();

        return $messages;
    }
}
