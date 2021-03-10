<?php

namespace App\Http\Requests\Admin;

use System\Request\Request;

class CategoryRequest extends Request{
    public function rules()
    {
        return[
          'name'=>'required|max:191',
          'parent_is'=>'exists:categories,id'
        ];
    }
}
