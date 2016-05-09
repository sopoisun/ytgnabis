<?php

namespace App\Http\Requests;

use App\Http\Requests\SeoRequest;

class PageRequest extends SeoRequest
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
            'page_title'        => 'required',
            'show_in_menu'      => 'required',
            'seo.controller'    => 'required',
            'seo.function'      => 'required',
        ];

        $rules += $this->seoRules();

        return $rules;
    }

    public function messages()
    {
        $messages = [
            'page_title.required'       => 'Page title tidak boleh kosong',
            'show_in_menu.required'     => 'Show in menu boleh kosong.',
            'seo.controller.required'   => 'Controller tidak boleh kosong.',
            'seo.function.required'     => 'Function tidak boleh kosong.',
        ];

        $messages += $this->seoMessages();

        return $messages;
    }
}
