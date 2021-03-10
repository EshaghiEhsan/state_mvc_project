<?php

namespace App\Http\Requests\Admin;

use System\Request\Request;

class SlideRequest extends Request{

    public function rules()
    {
        if(methodField()=='put') {
            return [
                'title' => 'required|max:191',
                'body' => 'required',
                'url' => 'required|max:191',
                'image' => 'file|mimes:jpg,jpeg,png,gif',
                'amount' => 'required|max:191',
                'address' => 'required|max:191',
            ];
        }
        else{
            return [
                'title' => 'required|max:191',
                'body' => 'required',
                'url' => 'required|max:191',
                'image' => 'required|file|mimes:jpg,jpeg,png,gif',
                'amount' => 'required|max:191',
                'address' => 'required|max:191',
            ];
        }
    }
}