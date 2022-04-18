<?php

namespace App\Http\Requests;

use App\Services\Request\ApiRequest;

class RegistrationRequest extends ApiRequest
{


    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required|regex:/^[a-zA-Zа-яА-Я]+$/u',
            'email' => 'required|email',
            'password' => 'required|min:5|max:50|confirmed'
        ];
    }
}
