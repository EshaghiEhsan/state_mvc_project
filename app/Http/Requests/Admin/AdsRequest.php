<?php

namespace App\Http\Requests\Admin;

use System\Request\Request;

class AdsRequest extends Request{

    public function rules()
    {
        if(methodField()=='put') {
            return [
                'title' => 'required|max:191',
                'description' => 'required|max:1000',
                'address' => 'required|max:191',
                'amount' => 'required|max:191',
                'floor' => 'required||max:191',
                'year' => 'required|number',
                'image' => 'file|mimes:jpg,jpeg,png,gif',
                'storeroom' => 'required|number',
                'balcony' => 'required|number',
                'room' => 'required|number',
                'parking' => 'required|number',
                'toilet' => 'required|max:191',
                'tag' => 'required|max:191',
                'cat_id' => 'required|exist:categories,id',
                'sell_status' => 'required|number',
                'type' => 'required|number',
            ];
        }
        else{
            return [
                'title' => 'required|max:191',
                'description' => 'required|max:1000',
                'address' => 'required|max:191',
                'amount' => 'required|max:191',
                'floor' => 'required||max:191',
                'year' => 'required|number',
                'image' => 'required|file|mimes:jpg,jpeg,png,gif',
                'storeroom' => 'required|number',
                'balcony' => 'required|number',
                'room' => 'required|number',
                'parking' => 'required|number',
                'toilet' => 'required|max:191',
                'tag' => 'required|max:191',
                'cat_id' => 'required|exist:categories,id',
                'sell_status' => 'required|number',
                'type' => 'required|number',
            ];
        }
    }
}
