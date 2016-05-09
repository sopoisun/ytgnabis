<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class SettingRequest extends Request
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
            'phone'         => 'required',
            'email'         => 'required|email',
            'facebook'      => 'required',
            'twitter'       => 'required',
            'g_plus'        => 'required',
            'youtube'       => 'required',
            'instagram'     => 'required',
            'map_latitude'  => 'required',
            'map_longitude' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'phone.required'            => 'Phone tidak boleh kosong',
            'email.required'            => 'Email tidak boleh kosong',
            'email.email'               => 'Input harus email',
            'facebook_fans.required'    => 'Facebook tidak boleh kosong',
            'twitter.required'          => 'Twitter tidak boleh kosong',
            'g_plus.required'           => 'Google plus tidak boleh kosong',
            'youtube.required'          => 'Youtube tidak boleh kosong',
            'instagram.required'        => 'Instagram tidak boleh kosong',
            'map_latitude.required'     => 'Map latitude tidak boleh kosong.',
            'map_longitude.required'    => 'Map longitude tidak boleh kosong.',
        ];
    }
}
