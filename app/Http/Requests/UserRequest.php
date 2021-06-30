<?php

namespace App\Http\Requests;

class UserRequest extends BaseRequest
{
    public function rules()
    {
        return [
            'name' => ['required', 'between:3,50', 'alpha'],
            'email' => ['required', 'email', 'between:6,100', "unique:users,email,{$this->user->id}"],
            'password' => ['required', 'between:6,25'],
        ];
    }
}
