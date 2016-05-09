<?php

namespace App\Http\Requests;

use App\Http\Requests\SeoRequest;

class PostRequest extends SeoRequest
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
            'post_title'        => 'required',
            'post_category_id'  => 'required|exists:post_categories,id',
        ];

        $rules += $this->seoRules();

        return $rules;
    }

    public function messages()
    {
        $messages = [
            'post_title.required'       => 'Post Title tidak boleh kosong.',
            'post_category_id.required' => 'Kategori tidak boleh kosong.',
            'post_category_id.exists'   => 'Kategori tidak ada dalam database.',
        ];

        $messages += $this->seoMessages();

        return $messages;
    }
}
