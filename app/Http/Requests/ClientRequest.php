<?php

namespace App\Http\Requests;

class ClientRequest extends BaseRequest
{
    public function rules()
    {
        return [
            'document' => ['required', 'numeric', 'digits_between:6,12', "unique:clients,document,{$this->client->id}"],
            'name' => ['required', 'between:3,50', 'alpha'],
            'email' => ['required', 'email', 'between:6,100'],
            'address' => ['required', 'between:3,50'],
        ];
    }
}
