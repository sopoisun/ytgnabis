<?php

namespace App\Http\Requests;

use App\Http\Requests\SeoRequest;

class KecamatanRequest extends SeoRequest
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
            'map_lat'   => 'required',
            'map_long'  => 'required',
        ];

        $rules += $this->seoRules();

        return $rules;
    }

    public function messages()
    {
        $messages = [
            'name.required'     => 'Nama kecamatan tidak boleh kosong.',
            'map_lat.required'  => 'Map latitude tidak boleh kosong.',
            'map_long.required' => 'Map longitude tidak boleh kosong.',
        ];

        $messages += $this->seoMessages();

        return $messages;
    }
}
