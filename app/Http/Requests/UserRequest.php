<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
        return [
            'nombre'            => "required|string|min:3|regex:/^[\pL\s\-]+$/u",
            'apellidos'         => "required|string|min:3|regex:/^[\pL\s\-]+$/u",
            'direccion'         => "min:5",
            'email'             => "required|email|unique:users",
            'password'          => "required|string|min:4|confirmed",
        ];
    }
}
