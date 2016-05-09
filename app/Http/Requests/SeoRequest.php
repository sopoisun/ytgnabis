<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class SeoRequest extends Request
{
    protected function seoRules()
    {
        $rules = [
            'seo.site_title'    => 'required',
        ];

        if ( $this->segment(count(explode('/', $this->path()))) == 'add' ) {
            $rules += [
                'seo.permalink' => 'required|unique:seos,permalink',
            ];
        }

        return $rules;
    }

    public function seoMessages()
    {
        return [
            'seo.site_title.required'   => 'Judul Web tidak boleh kosong.',
            'seo.permalink.required'    => 'Permalink tidak boleh kosong.',
            'seo.permalink.unique'      => 'Permalink sudah dipakai.',
        ];
    }
}
