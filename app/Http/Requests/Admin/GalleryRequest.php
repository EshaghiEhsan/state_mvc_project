<?php

namespace App\Http\Requests\Admin;

use System\Request\Request;

class GalleryRequest extends Request{
    public function rules()
    {
        return[
            'image' => 'required|file|mimes:jpg,jpeg,png,gif',
        ];
    }
}
