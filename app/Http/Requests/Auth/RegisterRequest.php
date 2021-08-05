<?php

namespace App\Http\Requests\Auth;

use System\Request\Request;

class RegisterRequest extends Request{

    protected function rules()
    {
        return[
            'email'=>'required|max:64|email|unique:users,email',
            'password'=>'required|min:8|confirmed',
            'first_name'=>'required|max:191',
            'last_name'=>'required|max:191',
            'avatar'=>'required|file|mimes:jpg,jpeg,png|max:2048'
        ];
    }
}