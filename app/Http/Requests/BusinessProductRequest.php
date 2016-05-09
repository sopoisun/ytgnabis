<?php

namespace App\Http\Requests;

use App\Http\Requests\SeoRequest;

class BusinessProductRequest extends SeoRequest
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
            'business_id'   => 'required|exists:businesses,id',
            'name'          => 'required',
            'price'         => 'required|string|integer',
            'image'         => 'image|mimes:jpeg,png',
        ];

        if( $this->get('state') == 'new' ){
            $rules['image'] = 'required|image|mimes:jpeg,png';
        }

        $rules += $this->seoRules();

        return $rules;
    }

    public function messages()
    {
        $messages = [
            'business_id.required'  => 'Nama bisnis tidak boleh kosong.',
            'business_id.exists'    => 'Bisnis tidak ada dalam database.',
            'name.required'         => 'Nama produk tidak boleh kosong',
            'price.required'        => 'Harga tidak boleh kosong.',
            'price.integer'         => 'Harga harus angka',
            'image.required'        => 'Image tidak boleh kosong.',
            'image.image'           => 'Image harus gambar.',
            'image.mimes'           => 'Image harus format jpg atau png',
        ];

        $messages += $this->seoMessages();

        return $messages;
    }
}
